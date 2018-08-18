CREATE OR REPLACE FUNCTION public.fn_parametro_grupo(
	nom_grupo character varying)
    RETURNS bigint
    LANGUAGE 'plpgsql'

    COST 100
    VOLATILE 
AS $BODY$

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

$BODY$;

ALTER FUNCTION public.fn_parametro_grupo(character varying)
    OWNER TO evaplus;
	
	
/* funcion para id en todas las tablas*/

CREATE OR REPLACE FUNCTION public.fn_id_tabla(
	tabla text,
	campo_unico text)
    RETURNS int
    LANGUAGE 'plpgsql'

    COST 100
    VOLATILE 
AS $BODY$

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

$BODY$;

ALTER FUNCTION public.fn_id_tabla(text, text)
    OWNER TO evaplus;
/*funcion nombre completo */
CREATE OR REPLACE FUNCTION public.fn_persona_nom_com(
	id_documento bigint)
    RETURNS text
	
    LANGUAGE 'plpgsql'

    COST 100
    VOLATILE 
AS $BODY$

declare nom_com text;
declare nom_com2 text;
begin
	nom_com :='select concat(nombre_uno, chr(32) ,nombre_dos ,chr(32), apellido_uno , chr(32)  , apellido_dos) as nombre_completo from persona where id_persona = '||id_documento;
	execute nom_com into nom_com2;
 return nom_com2;
 end;
$BODY$;

ALTER FUNCTION public.fn_persona_nom_com( bigint)
    OWNER TO evaplus;

/*extrae las iniciales de las personas*/
CREATE OR REPLACE FUNCTION public.fn_persona_iniciales(
	id_documento bigint)
    RETURNS text
	
    LANGUAGE 'plpgsql'

    COST 100
    VOLATILE 
AS $BODY$

declare nom_com text;
declare nom_com2 text;
begin
	nom_com :='select concat(substring(nombre_uno,1,1),substring(nombre_dos,1,1) , substring(apellido_uno,1,1) , substring(apellido_dos,1,1)) as nombre_completo from persona where id_persona = '||id_documento;
	execute nom_com into nom_com2;
 return nom_com2;
 end;
$BODY$;

ALTER FUNCTION public.fn_persona_iniciales( bigint)
    OWNER TO evaplus;
CREATE OR REPLACE FUNCTION public.fn_fecha_credencial(
	tipo_fecha text)
    RETURNS date
	
    LANGUAGE 'plpgsql'

    COST 100
    VOLATILE 
AS $BODY$

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
$BODY$;

ALTER FUNCTION public.fn_fecha_credencial( text)
    OWNER TO evaplus;
/*encripta y desencripta contraseña version 1*/
-- FUNCTION: public.fn_credencial(text, text)

-- DROP FUNCTION public.fn_credencial(text, text);

CREATE OR REPLACE FUNCTION public.fn_credencial(
	credencial text,
	actividad text)
    RETURNS text
    LANGUAGE 'plpgsql'

    COST 100
    VOLATILE 
AS $BODY$

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

$BODY$;

ALTER FUNCTION public.fn_credencial(text, text)
    OWNER TO evaplus;

/*Cambia la contraseña*/
CREATE OR REPLACE FUNCTION public.fn_insert_credencial(vId_persona bigint, vContrasennia text)
    RETURNS boolean 
	
    LANGUAGE 'plpgsql'

    COST 100
    VOLATILE 
AS $BODY$

begin
	update credencial
	   set estado_credencial = 'I'
	 where id_persona = vId_persona;
	   
	INSERT INTO public.credencial(aud_ffecha, aud_cestado, aud_nidusuario, id_credencial, estado_credencial, credencial, fecha_aviso, fecha_caducidad, id_persona) 
	                      VALUES (now(), 'A', vId_persona, fn_id_tabla('credencial','id_credencial'), 'A', fn_credencial( vContrasennia, 'E'), fn_fecha_credencial('A'), fn_fecha_credencial('C'), vId_persona);   
	return true;
 end;
$BODY$;

ALTER FUNCTION public.fn_insert_credencial( bigint, text)
    OWNER TO evaplus;