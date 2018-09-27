-- Role: evaplus

-- DROP ROLE evaplus;

CREATE ROLE evaplus LOGIN
  ENCRYPTED PASSWORD 'md545c70d3c0bd3e272bbcbaffb0ce5b8e7'
  SUPERUSER INHERIT CREATEDB CREATEROLE REPLICATION;

 -- Tablespace: tb_evaplus

-- DROP TABLESPACE tb_evaplus

CREATE TABLESPACE tb_evaplus
  OWNER evaplus
  LOCATION 'D:\\AppServ\\www\\Proyecto\\Db';
 
 -- Database: evaplus

-- DROP DATABASE evaplus;

CREATE DATABASE evaplus
  WITH OWNER = evaplus
       ENCODING = 'UTF8'
       TABLESPACE = tb_evaplus
       LC_COLLATE = 'Spanish_Spain.1252'
       LC_CTYPE = 'Spanish_Spain.1252'
       CONNECTION LIMIT = -1;

-- Function: public.fn_credencial(text, text)

-- DROP FUNCTION public.fn_credencial(text, text);

CREATE OR REPLACE FUNCTION public.fn_credencial(
    credencial text,
    actividad text)
  RETURNS text AS
$BODY$

declare vLongitud int;
declare vCaracter text;
declare vNumero text;
declare vCaracterRec text;
declare vContrasennia character varying;
declare vCaracterN int;
declare vCaracterT int;
declare vNum int;
declare i int;

begin

 if actividad = 'E' then
	vLongitud := character_length(credencial);
	for i in 1 .. vLongitud
	loop
	vCaracter := substr(credencial, i, 1);
		vCaracterN := ascii(vCaracter);
		vCaracterT := vCaracterN + 365;
		if i = 1 then
			vContrasennia := vCaracterT ;
		end if;
		if i > 1 then
			vContrasennia := vContrasennia || '-' || vCaracterT ;
		end if;
		
	end loop;
	return vContrasennia;
 end if;
 
 if actividad = 'D' then
	vNumero := '';  
	vContrasennia := '';
	credencial := credencial || '-';
	vLongitud := character_length(credencial);
	for i in 1 .. vLongitud
	loop	
	vCaracter := substr(credencial, i, 1);
		if (vCaracter != '-') then
			vNumero := vNumero || vCaracter ;
		end if;	
		if vCaracter = '-' then
			vNum :=cast(vNumero as int);
		vNum := vNum-365;
			vCaracterRec := CHR(vNum);
			vContrasennia := vContrasennia || vCaracterRec;
			vNumero := '';
		end if; 
	end loop;
	return vContrasennia;
 end if;

 end;
$BODY$
  LANGUAGE plpgsql VOLATILE
  COST 100;
ALTER FUNCTION public.fn_credencial(text, text)
  OWNER TO evaplus;
GRANT EXECUTE ON FUNCTION public.fn_credencial(text, text) TO evaplus;
REVOKE ALL ON FUNCTION public.fn_credencial(text, text) FROM public;
	   
-- Function: public.fn_fecha_credencial(text)

-- DROP FUNCTION public.fn_fecha_credencial(text);

CREATE OR REPLACE FUNCTION public.fn_fecha_credencial(tipo_fecha text)
  RETURNS date AS
$BODY$

declare vFcaducidad text ;
declare vFaviso text ;
declare vFcaducidad2 text ;
declare vFaviso2 text ;
declare vDiaCaduca character varying;
declare vDiaAviso character varying;

begin
vDiaCaduca := '90 days';
vDiaAviso := '80 days';

 if tipo_fecha = 'A' then
	vFaviso :='SELECT CAST(CAST(now() AS DATE) + CAST('||chr(39)||vDiaAviso||chr(39)||' AS INTERVAL) as date)';
	execute vFaviso into vFaviso2;
	return cast(vFaviso2 as date);
 end if;
 if tipo_fecha = 'C' then
	vFcaducidad :='SELECT CAST(CAST(now() AS DATE) + CAST('||chr(39)||vDiaCaduca||chr(39)||' AS INTERVAL)as date)';
	execute vFcaducidad into vFcaducidad2;
	return cast(vFcaducidad2 as date); 
 end if;

 end;
$BODY$
  LANGUAGE plpgsql VOLATILE
  COST 100;
ALTER FUNCTION public.fn_fecha_credencial(text)
  OWNER TO evaplus;

-- Function: public.fn_id_tabla(text, text)

-- DROP FUNCTION public.fn_id_tabla(text, text);

CREATE OR REPLACE FUNCTION public.fn_id_tabla(
    tabla text,
    campo_unico text)
  RETURNS integer AS
$BODY$

declare Total int;
declare sqls text;
begin
 sqls:= 'select max(' || campo_unico || ') +1 as Valor from ' || tabla ||';';
 --PERFORM sqls;
 execute sqls into Total;
 if Total is null then
  Total:=1;
 end if;
 return Total;
end;

$BODY$
  LANGUAGE plpgsql VOLATILE
  COST 100;
ALTER FUNCTION public.fn_id_tabla(text, text)
  OWNER TO evaplus;

 -- Function: public.fn_insert_credencial(bigint, text)

-- DROP FUNCTION public.fn_insert_credencial(bigint, text);

CREATE OR REPLACE FUNCTION public.fn_insert_credencial(
    vid_persona bigint,
    vcontrasennia text)
  RETURNS boolean AS
$BODY$

begin
	update credencial
	   set estado_credencial = 'I'
	 where id_persona = vId_persona;
	   
	INSERT INTO public.credencial(aud_ffecha, aud_cestado, aud_nidusuario, id_credencial, estado_credencial, credencial, fecha_aviso, fecha_caducidad, id_persona) 
	                      VALUES (now(), 'A', vId_persona, fn_id_tabla('credencial','id_credencial'), 'A', fn_credencial( vContrasennia, 'E'), fn_fecha_credencial('A'), fn_fecha_credencial('C'), vId_persona);   
	return true;
 end;
$BODY$
  LANGUAGE plpgsql VOLATILE
  COST 100;
ALTER FUNCTION public.fn_insert_credencial(bigint, text)
  OWNER TO evaplus;

 -- Function: public.fn_parametro_grupo(character varying)

-- DROP FUNCTION public.fn_parametro_grupo(character varying);

CREATE OR REPLACE FUNCTION public.fn_parametro_grupo(nom_grupo character varying)
  RETURNS bigint AS
$BODY$

declare Total BIGINT;
begin
  Total:=(select distinct id_grupo from public.parametro where grupo = nom_grupo);
  if Total is null then 
   Total:=(select  max (id_grupo) +1 from public.parametro );
   if Total is null then 
    Total:= 1;
   end if;  
  end if;
 return Total;
end;

$BODY$
  LANGUAGE plpgsql VOLATILE
  COST 100;
ALTER FUNCTION public.fn_parametro_grupo(character varying)
  OWNER TO evaplus;

-- Function: public.fn_persona_iniciales(bigint)

-- DROP FUNCTION public.fn_persona_iniciales(bigint);

CREATE OR REPLACE FUNCTION public.fn_persona_iniciales(id_documento bigint)
  RETURNS text AS
$BODY$

declare nom_com text;
declare nom_com2 text;
begin
	nom_com :='select concat(substring(nombre_uno,1,1),substring(nombre_dos,1,1) , substring(apellido_uno,1,1) , substring(apellido_dos,1,1)) as nombre_completo from persona where id_persona = '||id_documento;
	execute nom_com into nom_com2;
 return nom_com2;
 end;
$BODY$
  LANGUAGE plpgsql VOLATILE
  COST 100;
ALTER FUNCTION public.fn_persona_iniciales(bigint)
  OWNER TO evaplus;

-- Function: public.fn_persona_nom_com(bigint)

-- DROP FUNCTION public.fn_persona_nom_com(bigint);

CREATE OR REPLACE FUNCTION public.fn_persona_nom_com(id_documento bigint)
  RETURNS text AS
$BODY$

declare nom_com text;
declare nom_com2 text;
begin
	nom_com :='select concat(nombre_uno, chr(32) ,nombre_dos ,chr(32), apellido_uno , chr(32)  , apellido_dos) as nombre_completo from persona where id_persona = '||id_documento;
	execute nom_com into nom_com2;
 return nom_com2;
 end;
$BODY$
  LANGUAGE plpgsql VOLATILE
  COST 100;
ALTER FUNCTION public.fn_persona_nom_com(bigint)
  OWNER TO evaplus;
 
 -- Table: public.aud_datos

-- DROP TABLE public.aud_datos;

CREATE TABLE public.aud_datos
(
  id_aud_datos bigint NOT NULL,
  fecha date,
  usuario bigint,
  movimiento bigint NOT NULL,
  campo1 bigint,
  campo2 bigint,
  campo3 bigint,
  campo4 bigint,
  campo5 bigint,
  campo6 bigint,
  campo7 bigint,
  campo8 bigint,
  campo9 bigint,
  campo10 bigint,
  campo11 character varying,
  campo12 character varying,
  campo13 character varying,
  campo14 character varying,
  campo15 character varying,
  campo16 character varying,
  campo17 character varying,
  campo18 character varying,
  campo19 character varying,
  campo20 character varying,
  campo21 boolean,
  campo22 boolean,
  campo23 boolean,
  campo24 boolean,
  campo25 boolean,
  campo26 boolean,
  campo27 boolean,
  campo28 boolean,
  campo29 boolean,
  campo30 boolean,
  campo31 date,
  campo32 date,
  campo33 date,
  campo34 date,
  campo35 date,
  campo36 date,
  campo37 date,
  campo38 date,
  campo39 date,
  campo40 date,
  CONSTRAINT pk_aud_datos PRIMARY KEY (id_aud_datos)
)
WITH (
  OIDS=FALSE
);
ALTER TABLE public.aud_datos
  OWNER TO evaplus;

-- Table: public.aud_estructura

-- DROP TABLE public.aud_estructura;

CREATE TABLE public.aud_estructura
(
  id_aud_estructura bigint NOT NULL,
  nombre_tabla character varying NOT NULL,
  campo_tabla character varying NOT NULL,
  tipo_dato character varying NOT NULL,
  nombre_campo_aud character varying NOT NULL,
  CONSTRAINT pk_aud_estructura PRIMARY KEY (id_aud_estructura)
)
WITH (
  OIDS=FALSE
);
ALTER TABLE public.aud_estructura
  OWNER TO evaplus;
  
-- Table: public.banco_pregunta

-- DROP TABLE public.banco_pregunta;

CREATE TABLE public.banco_pregunta
(
  id_grupo bigint,
  id_pregunta bigint NOT NULL,
  id_respuesta bigint,
  descripcion character varying NOT NULL,
  estado boolean,
  CONSTRAINT pk_banco_pregunta PRIMARY KEY (id_pregunta),
  CONSTRAINT fk_grupo FOREIGN KEY (id_grupo)
      REFERENCES public.grupo_pregunta (id_grupo) MATCH SIMPLE
      ON UPDATE NO ACTION ON DELETE NO ACTION,
  CONSTRAINT fk_respuesta FOREIGN KEY (id_respuesta)
      REFERENCES public.banco_respuesta (id_respuesta) MATCH SIMPLE
      ON UPDATE NO ACTION ON DELETE NO ACTION
)
WITH (
  OIDS=FALSE
);
ALTER TABLE public.banco_pregunta
  OWNER TO evaplus;

-- Table: public.banco_respuesta

-- DROP TABLE public.banco_respuesta;

CREATE TABLE public.banco_respuesta
(
  id_respuesta bigint NOT NULL,
  descripcion character varying NOT NULL,
  estado boolean,
  CONSTRAINT pk_banco_respuesta PRIMARY KEY (id_respuesta)
)
WITH (
  OIDS=FALSE
);
ALTER TABLE public.banco_respuesta
  OWNER TO evaplus;

-- Table: public.credencial

-- DROP TABLE public.credencial;

CREATE TABLE public.credencial
(
  id_credencial bigint NOT NULL DEFAULT nextval('credencial_id_credencial_seq'::regclass),
  estado_credencial text NOT NULL,
  credencial character varying NOT NULL,
  fecha_aviso date NOT NULL,
  fecha_caducidad date NOT NULL,
  id_persona bigint NOT NULL,
  CONSTRAINT pk_credencial PRIMARY KEY (id_credencial),
  CONSTRAINT fk_persona FOREIGN KEY (id_persona)
      REFERENCES public.persona (id_persona) MATCH SIMPLE
      ON UPDATE NO ACTION ON DELETE NO ACTION,
  CONSTRAINT credencial_id_credencial_check CHECK (id_credencial > 0)
)
WITH (
  OIDS=FALSE
);
ALTER TABLE public.credencial
  OWNER TO evaplus;

-- Table: public.curso

-- DROP TABLE public.curso;

CREATE TABLE public.curso
(
  id_curso bigint NOT NULL,
  id_annio bigint NOT NULL,
  id_trimestre bigint NOT NULL,
  id_rol bigint NOT NULL,
  id_persona bigint NOT NULL,
  id_ficha bigint NOT NULL,
  CONSTRAINT pk_curso PRIMARY KEY (id_curso, id_annio, id_trimestre, id_rol, id_persona, id_ficha),
  CONSTRAINT fk_annio FOREIGN KEY (id_annio)
      REFERENCES public.parametro (id_parametro) MATCH SIMPLE
      ON UPDATE NO ACTION ON DELETE NO ACTION,
  CONSTRAINT fk_curso_ficha FOREIGN KEY (id_ficha)
      REFERENCES public.ficha (id_ficha) MATCH SIMPLE
      ON UPDATE NO ACTION ON DELETE NO ACTION,
  CONSTRAINT fk_curso_persona FOREIGN KEY (id_persona)
      REFERENCES public.persona (id_persona) MATCH SIMPLE
      ON UPDATE NO ACTION ON DELETE NO ACTION,
  CONSTRAINT fk_curso_rol FOREIGN KEY (id_rol)
      REFERENCES public.rol (id_rol) MATCH SIMPLE
      ON UPDATE NO ACTION ON DELETE NO ACTION,
  CONSTRAINT fk_trimestre FOREIGN KEY (id_trimestre)
      REFERENCES public.parametro (id_parametro) MATCH SIMPLE
      ON UPDATE NO ACTION ON DELETE NO ACTION,
  CONSTRAINT curso_id_annio_check CHECK (id_annio > 0),
  CONSTRAINT curso_id_persona_check CHECK (id_persona > 0),
  CONSTRAINT curso_id_rol_check CHECK (id_rol > 0),
  CONSTRAINT curso_id_trimestre_check CHECK (id_trimestre > 0)
)
WITH (
  OIDS=FALSE
);
ALTER TABLE public.curso
  OWNER TO evaplus;

 -- Table: public.detalle_formulario

-- DROP TABLE public.detalle_formulario;

CREATE TABLE public.detalle_formulario
(
  id_formulario bigint NOT NULL,
  id_pregunta bigint NOT NULL,
  estado boolean,
  CONSTRAINT pk_detalle_formulario PRIMARY KEY (id_formulario, id_pregunta),
  CONSTRAINT fk_formulario_detalle FOREIGN KEY (id_pregunta)
      REFERENCES public.banco_pregunta (id_pregunta) MATCH SIMPLE
      ON UPDATE NO ACTION ON DELETE NO ACTION
)
WITH (
  OIDS=FALSE
);
ALTER TABLE public.detalle_formulario
  OWNER TO evaplus;

-- Table: public.evaluacion

-- DROP TABLE public.evaluacion;

CREATE TABLE public.evaluacion
(
  id_evaluacion bigint NOT NULL,
  estado boolean,
  fecha_inicio date,
  fecha_final date,
  CONSTRAINT pk_evaluacion PRIMARY KEY (id_evaluacion)
)
WITH (
  OIDS=FALSE
);
ALTER TABLE public.evaluacion
  OWNER TO evaplus;

-- Table: public.evaluacion_detalle

-- DROP TABLE public.evaluacion_detalle;

CREATE TABLE public.evaluacion_detalle
(
  id_evaluacion_detalle bigint NOT NULL,
  id_evaluacion bigint,
  id_formulario bigint,
  id_pregunta bigint,
  id_instructor bigint,
  id_aprendiz bigint,
  estado boolean,
  respuesta bigint,
  id_annio bigint,
  id_ficha bigint,
  id_trimestre bigint,
  CONSTRAINT pk_evaluacion_detalle PRIMARY KEY (id_evaluacion_detalle),
  CONSTRAINT fk_aprendiz FOREIGN KEY (id_aprendiz)
      REFERENCES public.persona (id_persona) MATCH SIMPLE
      ON UPDATE NO ACTION ON DELETE NO ACTION,
  CONSTRAINT fk_evaluacion FOREIGN KEY (id_evaluacion)
      REFERENCES public.evaluacion (id_evaluacion) MATCH SIMPLE
      ON UPDATE NO ACTION ON DELETE NO ACTION,
  CONSTRAINT fk_formulario_evalucion FOREIGN KEY (id_formulario)
      REFERENCES public.formulario (id_formulario) MATCH SIMPLE
      ON UPDATE NO ACTION ON DELETE NO ACTION,
  CONSTRAINT fk_instructor FOREIGN KEY (id_instructor)
      REFERENCES public.persona (id_persona) MATCH SIMPLE
      ON UPDATE NO ACTION ON DELETE NO ACTION,
  CONSTRAINT fk_pregunta_evaluacion FOREIGN KEY (id_pregunta, id_formulario)
      REFERENCES public.detalle_formulario (id_pregunta, id_formulario) MATCH SIMPLE
      ON UPDATE NO ACTION ON DELETE NO ACTION
)
WITH (
  OIDS=FALSE
);
ALTER TABLE public.evaluacion_detalle
  OWNER TO evaplus;

 -- Table: public.ficha

-- DROP TABLE public.ficha;

CREATE TABLE public.ficha
(
  id_ficha bigint NOT NULL,
  id_programa bigint,
  estado_ficha boolean NOT NULL,
  fecha_inicio date NOT NULL,
  fecha_final date NOT NULL,
  id_jornada bigint NOT NULL,
  CONSTRAINT pk_ficha PRIMARY KEY (id_ficha),
  CONSTRAINT fk_jornada FOREIGN KEY (id_jornada)
      REFERENCES public.parametro (id_parametro) MATCH SIMPLE
      ON UPDATE NO ACTION ON DELETE NO ACTION,
  CONSTRAINT fk_programa FOREIGN KEY (id_programa)
      REFERENCES public.programa (id_programa) MATCH SIMPLE
      ON UPDATE NO ACTION ON DELETE NO ACTION,
  CONSTRAINT ficha_id_ficha_check CHECK (id_ficha > 0)
)
WITH (
  OIDS=FALSE
);
ALTER TABLE public.ficha
  OWNER TO evaplus;

-- Table: public.ficha_persona_rol

-- DROP TABLE public.ficha_persona_rol;

CREATE TABLE public.ficha_persona_rol
(
  id_ficha bigint NOT NULL,
  id_persona bigint NOT NULL,
  id_rol bigint NOT NULL,
  estado boolean,
  CONSTRAINT pk_id_ficha_persona_rol PRIMARY KEY (id_ficha, id_rol, id_persona),
  CONSTRAINT fk_persona_fpr FOREIGN KEY (id_persona)
      REFERENCES public.persona (id_persona) MATCH SIMPLE
      ON UPDATE NO ACTION ON DELETE NO ACTION,
  CONSTRAINT fk_rol_fpr FOREIGN KEY (id_rol)
      REFERENCES public.rol (id_rol) MATCH SIMPLE
      ON UPDATE NO ACTION ON DELETE NO ACTION
)
WITH (
  OIDS=FALSE
);
ALTER TABLE public.ficha_persona_rol
  OWNER TO evaplus;

-- Table: public.formulario

-- DROP TABLE public.formulario;

CREATE TABLE public.formulario
(
  id_formulario bigint NOT NULL,
  descripcion character varying NOT NULL,
  estado boolean,
  CONSTRAINT pk_formulario PRIMARY KEY (id_formulario)
)
WITH (
  OIDS=FALSE
);
ALTER TABLE public.formulario
  OWNER TO evaplus;

-- Table: public.grupo_pregunta

-- DROP TABLE public.grupo_pregunta;

CREATE TABLE public.grupo_pregunta
(
  id_grupo bigint NOT NULL,
  descripcion character varying NOT NULL,
  estado boolean,
  CONSTRAINT pk_grupo_pregunta PRIMARY KEY (id_grupo)
)
WITH (
  OIDS=FALSE
);
ALTER TABLE public.grupo_pregunta
  OWNER TO evaplus;
  
 -- Table: public.his_curso

-- DROP TABLE public.his_curso;

CREATE TABLE public.his_curso
(
  id_curso bigint,
  id_annio bigint,
  id_trimestre bigint,
  id_rol bigint,
  id_persona bigint,
  id_ficha bigint
)
WITH (
  OIDS=FALSE
);
ALTER TABLE public.his_curso
  OWNER TO evaplus;


-- Table: public.his_evaluacion_detalle

-- DROP TABLE public.his_evaluacion_detalle;

CREATE TABLE public.his_evaluacion_detalle
(
  id_evaluacion_detalle bigint,
  id_evaluacion bigint,
  id_formulario bigint,
  id_pregunta bigint,
  id_instructor bigint,
  id_aprendiz bigint,
  estado boolean,
  respuesta bigint
)
WITH (
  OIDS=FALSE
);
ALTER TABLE public.his_evaluacion_detalle
  OWNER TO evaplus;
  
  
-- Table: public.his_persona

-- DROP TABLE public.his_persona;

CREATE TABLE public.his_persona
(
  id_persona bigint,
  id_tipo_documento bigint,
  estado_persona boolean NOT NULL,
  nombre_uno character varying NOT NULL,
  nombre_dos character varying,
  apellido_uno character varying NOT NULL,
  apellido_dos character varying,
  fecha_nacimiento date,
  telefono character varying,
  correo_electronico character varying,
  direccion character varying
)
WITH (
  OIDS=FALSE
);
ALTER TABLE public.his_persona
  OWNER TO evaplus;


-- Table: public.item_respuesta

-- DROP TABLE public.item_respuesta;

CREATE TABLE public.item_respuesta
(
  id_item_respuesta bigint NOT NULL,
  id_respuesta bigint,
  id_tipo_respuesta bigint,
  descripcion character varying NOT NULL,
  estado boolean,
  valor bigint,
  CONSTRAINT pk_item_respuesta PRIMARY KEY (id_item_respuesta),
  CONSTRAINT fk_banco_respuesta FOREIGN KEY (id_respuesta)
      REFERENCES public.banco_respuesta (id_respuesta) MATCH SIMPLE
      ON UPDATE NO ACTION ON DELETE NO ACTION,
  CONSTRAINT fk_tipo_respuesta FOREIGN KEY (id_tipo_respuesta)
      REFERENCES public.parametro (id_parametro) MATCH SIMPLE
      ON UPDATE NO ACTION ON DELETE NO ACTION
)
WITH (
  OIDS=FALSE
);
ALTER TABLE public.item_respuesta
  OWNER TO evaplus;

-- Table: public.parametro

-- DROP TABLE public.parametro;

CREATE TABLE public.parametro
(
  id_parametro bigint NOT NULL,
  id_grupo bigint NOT NULL,
  grupo character varying NOT NULL,
  detalle character varying NOT NULL,
  CONSTRAINT pk_parametro PRIMARY KEY (id_parametro),
  CONSTRAINT parametro_id_grupo_check CHECK (id_grupo > 0),
  CONSTRAINT parametro_id_parametro_check CHECK (id_parametro > 0)
)
WITH (
  OIDS=FALSE
);
ALTER TABLE public.parametro
  OWNER TO evaplus;

-- Table: public.persona

-- DROP TABLE public.persona;

CREATE TABLE public.persona
(
  id_persona bigint NOT NULL,
  estado_persona boolean NOT NULL,
  nombre_uno character varying NOT NULL,
  nombre_dos character varying,
  apellido_uno character varying NOT NULL,
  apellido_dos character varying,
  fecha_nacimiento date NOT NULL,
  telefono character varying,
  correo_electronico character varying,
  direccion character varying,
  id_tipo_documento bigint,
  "Adm" boolean,
  CONSTRAINT pk_persona PRIMARY KEY (id_persona),
  CONSTRAINT persona_id_persona_check CHECK (id_persona > 0)
)
WITH (
  OIDS=FALSE
);
ALTER TABLE public.persona
  OWNER TO evaplus;
  

-- Table: public.persona_rol

-- DROP TABLE public.persona_rol;

CREATE TABLE public.persona_rol
(
  id_rol bigint NOT NULL,
  id_persona bigint NOT NULL,
  CONSTRAINT pk_id_persona_rol PRIMARY KEY (id_rol, id_persona),
  CONSTRAINT fk_persona_rol FOREIGN KEY (id_persona)
      REFERENCES public.persona (id_persona) MATCH SIMPLE
      ON UPDATE NO ACTION ON DELETE NO ACTION,
  CONSTRAINT fk_rol_persona FOREIGN KEY (id_rol)
      REFERENCES public.rol (id_rol) MATCH SIMPLE
      ON UPDATE NO ACTION ON DELETE NO ACTION
)
WITH (
  OIDS=FALSE
);
ALTER TABLE public.persona_rol
  OWNER TO evaplus;
  
 -- Table: public.programa

-- DROP TABLE public.programa;

CREATE TABLE public.programa
(
  id_programa bigint NOT NULL,
  nombre_programa character varying NOT NULL,
  estado_programa boolean NOT NULL,
  CONSTRAINT pk_programa PRIMARY KEY (id_programa),
  CONSTRAINT programa_id_programa_check CHECK (id_programa > 0)
)
WITH (
  OIDS=FALSE
);
ALTER TABLE public.programa
  OWNER TO evaplus;

 -- Table: public.rol

-- DROP TABLE public.rol;

CREATE TABLE public.rol
(
  id_rol bigint NOT NULL DEFAULT nextval('rol_id_rol_seq'::regclass),
  estado_rol boolean NOT NULL,
  nombre_rol character varying NOT NULL,
  descripcion_rol character varying NOT NULL,
  CONSTRAINT pk_id_rol PRIMARY KEY (id_rol),
  CONSTRAINT rol_id_rol_check CHECK (id_rol > 0)
)
WITH (
  OIDS=FALSE
);
ALTER TABLE public.rol
  OWNER TO evaplus;

  