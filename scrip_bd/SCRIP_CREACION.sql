/*
Nombre: Pablo Emilio Garcia
Fecha: 18/08/2018
Descripcion: scrip de la baase de datos  evaplus
*/


CREATE DATABASE evaplus
    WITH
    OWNER = evaplus
    ENCODING = 'UTF8'
    LC_COLLATE = 'Spanish_Spain.1252'
    LC_CTYPE = 'Spanish_Spain.1252'
    TABLESPACE = tb_evaplus
    CONNECTION LIMIT = -1;

CREATE TABLE parametro(
	aud_ffecha DATE NOT NULL,
	aud_cestado CHARACTER VARYING NOT NULL,
	aud_nIdUsuario BIGINT,
	id_parametro BIGINT NOT NULL,
	id_grupo BIGINT NOT NULL,
	grupo CHARACTER VARYING NOT NULL,
	detalle CHARACTER VARYING NOT NULL,
CHECK (id_parametro > 0),
CHECK (id_grupo > 0),
CONSTRAINT pk_parametro PRIMARY KEY (id_parametro)
);

CREATE TABLE programa(
	aud_ffecha DATE NOT NULL,
	aud_cestado CHARACTER VARYING NOT NULL,
	aud_nIdUsuario BIGINT,
	id_programa BIGINT NOT NULL,
	nombre_programa CHARACTER VARYING NOT NULL,
	estado_programa BOOLEAN NOT NULL,
CHECK (id_programa > 0),
CONSTRAINT pk_programa PRIMARY KEY (id_programa)
);
 CREATE TABLE rol(
	aud_ffecha DATE NOT NULL,
	aud_cestado CHARACTER VARYING NOT NULL,
	aud_nIdUsuario BIGINT,
	id_rol BIGSERIAL,
	estado_rol BOOLEAN NOT NULL,
	nombre_rol CHARACTER VARYING NOT NULL,
	descripcion_rol CHARACTER VARYING NOT NULL,
	CHECK (id_rol > 0),
	CONSTRAINT pk_id_rol PRIMARY KEY (id_rol)
 );
CREATE TABLE persona (
	aud_ffecha DATE NOT NULL,
	aud_cestado CHARACTER VARYING NOT NULL,
	aud_nIdUsuario BIGINT,
	id_persona BIGINT,
	id_tipo_documento BIGINT,
	estado_persona BOOLEAN NOT NULL,
	nombre_uno CHARACTER VARYING NOT NULL,
	nombre_dos CHARACTER VARYING,
	apellido_uno CHARACTER VARYING NOT NULL,
	apellido_dos CHARACTER VARYING,
	fecha_nacimiento DATE,
	telefono CHARACTER VARYING,
	correo_electronico CHARACTER VARYING,
	direccion CHARACTER VARYING,
	CHECK (id_persona > 0),
 CONSTRAINT pk_persona PRIMARY KEY (id_persona),
 CONSTRAINT fk_tipo_documento FOREIGN KEY (id_tipo_documento) REFERENCES parametro (id_parametro)
  );

CREATE TABLE credencial(
	aud_ffecha DATE NOT NULL,
	aud_cestado CHARACTER VARYING NOT NULL,
	aud_nIdUsuario BIGINT,
	id_credencial BIGSERIAL,
	estado_credencial BOOLEAN NOT NULL,
	credencial CHARACTER VARYING NOT NULL,
	fecha_aviso DATE NOT NULL,
	fecha_caducidad DATE NOT NULL,
	id_persona BIGINT NOT NULL,
	CHECK (id_credencial > 0),
	CONSTRAINT pk_credencial PRIMARY KEY (id_credencial),
	CONSTRAINT fk_persona FOREIGN KEY (id_persona) REFERENCES persona (id_persona)
);


CREATE TABLE persona_rol(
	aud_ffecha DATE NOT NULL,
	aud_cestado CHARACTER VARYING NOT NULL,
	aud_nIdUsuario BIGINT,
	id_rol BIGINT,
	id_persona BIGINT,
	CONSTRAINT pk_id_persona_rol PRIMARY KEY (id_rol, id_persona),
	CONSTRAINT fk_persona_rol FOREIGN KEY (id_persona) REFERENCES persona (id_persona),
	CONSTRAINT fk_rol_persona FOREIGN KEY (id_rol) REFERENCES rol (id_rol)
);
CREATE TABLE ficha (
	aud_ffecha DATE NOT NULL,
	aud_cestado CHARACTER VARYING NOT NULL,
	aud_nIdUsuario BIGINT,
	id_ficha BIGINT,
	id_programa BIGINT,
	estado_ficha BOOLEAN NOT NULL,
	fecha_inicio DATE NOT NULL,
	fecha_final DATE NOT NULL,
	id_jornada BIGINT NOT NULL,
	CHECK (id_ficha > 0),
	CONSTRAINT pk_ficha PRIMARY KEY (id_ficha),
	CONSTRAINT fk_jornada FOREIGN KEY (id_jornada) REFERENCES parametro (id_parametro),
	CONSTRAINT fk_programa FOREIGN KEY (id_programa) REFERENCES programa (id_programa)
);
CREATE TABLE banco_respuesta(
	aud_ffecha DATE NOT NULL,
	aud_cestado CHARACTER VARYING NOT NULL,
	aud_nIdUsuario BIGINT,
	id_respuesta BIGINT,
	descripcion CHARACTER VARYING NOT NULL,
	estado BOOLEAN,
	CONSTRAINT pk_banco_respuesta PRIMARY KEY (id_respuesta)
);
CREATE TABLE item_respuesta(
	aud_ffecha DATE NOT NULL,
	aud_cestado CHARACTER VARYING NOT NULL,
	aud_nIdUsuario BIGINT,
	id_item_respuesta BIGINT,
	id_respuesta BIGINT,
	id_tipo_respuesta BIGINT,
	descripcion CHARACTER VARYING NOT NULL,
	estado BOOLEAN,
	valor BIGINT,
	CONSTRAINT pk_item_respuesta PRIMARY KEY (id_item_respuesta),
	CONSTRAINT fk_banco_respuesta FOREIGN KEY (id_respuesta) REFERENCES banco_respuesta (id_respuesta),
	CONSTRAINT fk_tipo_respuesta FOREIGN KEY (id_tipo_respuesta) REFERENCES parametro (id_parametro)
);
CREATE TABLE formulario(
	aud_ffecha DATE NOT NULL,
	aud_cestado CHARACTER VARYING NOT NULL,
	aud_nIdUsuario BIGINT,
	id_formulario BIGINT,
	descripcion CHARACTER VARYING NOT NULL,
	estado BOOLEAN,
	CONSTRAINT pk_formulario PRIMARY KEY (id_formulario)
);
CREATE TABLE grupo_pregunta(
	aud_ffecha DATE NOT NULL,
	aud_cestado CHARACTER VARYING NOT NULL,
	aud_nIdUsuario BIGINT,
	id_grupo BIGINT,
	descripcion CHARACTER VARYING NOT NULL,
	estado BOOLEAN,
	CONSTRAINT pk_grupo_pregunta PRIMARY KEY (id_grupo)
);
CREATE TABLE banco_pregunta(
	aud_ffecha DATE NOT NULL,
	aud_cestado CHARACTER VARYING NOT NULL,
	aud_nIdUsuario BIGINT,
	id_grupo BIGINT,
	id_pregunta BIGINT,
	id_formulario BIGINT,
	id_respuesta BIGINT,
	descripcion CHARACTER VARYING NOT NULL,
	estado BOOLEAN,
	CONSTRAINT pk_banco_pregunta PRIMARY KEY (id_pregunta),
	CONSTRAINT fk_grupo FOREIGN KEY (id_grupo) REFERENCES grupo_pregunta (id_grupo),
	CONSTRAINT fk_respuesta FOREIGN KEY (id_respuesta) REFERENCES banco_respuesta (id_respuesta),
	CONSTRAINT fk_formulario FOREIGN KEY (id_formulario) REFERENCES formulario (id_formulario)
);
CREATE TABLE detalle_formulario(
	aud_ffecha DATE NOT NULL,
	aud_cestado CHARACTER VARYING NOT NULL,
	aud_nIdUsuario BIGINT,
	id_formulario BIGINT,
	id_pregunta BIGINT,
	estado BOOLEAN,
	CONSTRAINT pk_detalle_formulario PRIMARY KEY (id_formulario, id_pregunta),
	CONSTRAINT fk_formulario_detalle FOREIGN KEY (id_pregunta) REFERENCES banco_pregunta (id_pregunta)
);

CREATE TABLE curso(
	aud_ffecha DATE NOT NULL,
	aud_cestado CHARACTER VARYING NOT NULL,
	aud_nIdUsuario BIGINT,
	id_curso BIGINT,
	id_annio BIGINT,
	id_trimestre BIGINT,
	id_rol BIGINT,
	id_persona BIGINT,
	id_ficha BIGINT,
CHECK (id_annio > 0),
CHECK (id_trimestre > 0),
CHECK (id_rol > 0),
CHECK (id_persona > 0),
CONSTRAINT pk_curso PRIMARY KEY (id_curso, id_annio, id_trimestre, id_rol, id_persona, id_ficha),
CONSTRAINT fk_annio FOREIGN KEY (id_annio) REFERENCES parametro (id_parametro),
CONSTRAINT fk_trimestre FOREIGN KEY (id_trimestre) REFERENCES parametro (id_parametro),
CONSTRAINT fk_curso_rol FOREIGN KEY (id_rol) REFERENCES rol (id_rol),
CONSTRAINT fk_curso_persona FOREIGN KEY (id_persona) REFERENCES persona (id_persona),
CONSTRAINT fk_curso_ficha FOREIGN KEY (id_ficha) REFERENCES ficha (id_ficha)
);

CREATE TABLE evaluacion(
	aud_ffecha DATE NOT NULL,
	aud_cestado CHARACTER VARYING NOT NULL,
	aud_nIdUsuario BIGINT,
	id_evaluacion BIGINT,
	estado BOOLEAN,
	fecha_inicio DATE,
	fecha_final DATE,
	CONSTRAINT pk_evaluacion PRIMARY KEY (id_evaluacion)
);

CREATE TABLE evaluacion_detalle(
	aud_ffecha DATE NOT NULL,
	aud_cestado CHARACTER VARYING NOT NULL,
	aud_nIdUsuario BIGINT,
	id_evaluacion_detalle BIGINT,
	id_evaluacion BIGINT,
	id_formulario BIGINT,
	id_pregunta BIGINT,
	id_instructor BIGINT,
	id_aprendiz BIGINT,
	estado BOOLEAN,
	respuesta BIGINT,
	CONSTRAINT pk_evaluacion_detalle PRIMARY KEY (id_evaluacion_detalle),
	CONSTRAINT fk_evaluacion FOREIGN KEY (id_evaluacion) REFERENCES evaluacion(id_evaluacion),
	CONSTRAINT fk_formulario_evalucion FOREIGN KEY (id_formulario) REFERENCES formulario (id_formulario),
	CONSTRAINT fk_pregunta_evaluacion FOREIGN KEY (id_pregunta, id_formulario) REFERENCES detalle_formulario(id_formulario, id_pregunta),
	CONSTRAINT fk_instructor FOREIGN KEY (id_instructor) REFERENCES persona (id_persona),
	CONSTRAINT fk_aprendiz FOREIGN KEY (id_aprendiz) REFERENCES persona (id_persona),
	CONSTRAINT fk_respuesta FOREIGN KEY (respuesta) REFERENCES item_respuesta (id_item_respuesta)
);