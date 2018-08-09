/*
Nombre: Pablo Emilio Garcia
Fecha: 04/08/2018
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

CREATE TABLE persona (
	aud_ffecha DATE NOT NULL,
	aud_cestado CHARACTER VARYING NOT NULL,
	aud_nIdUsuario BIGINT,
	id_persona BIGINT,
	estado_persona BOOLEAN NOT NULL,
	nombre_uno CHARACTER VARYING NOT NULL,
	nombre_dos CHARACTER VARYING,
	apellido_uno CHARACTER VARYING NOT NULL,
	apellido_dos CHARACTER VARYING,
	fecha_nacimiento DATE NOT NULL,
	telefono CHARACTER VARYING,
	correo_electronico CHARACTER VARYING,
	direccion CHARACTER VARYING,
	tipo_contrato CHARACTER VARYING NOT NULL,
	CHECK (id_persona > 0),
 CONSTRAINT pk_persona PRIMARY KEY (id_persona)
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

CREATE TABLE persona_rol(
	aud_ffecha DATE NOT NULL,
	aud_cestado CHARACTER VARYING NOT NULL,
	aud_nIdUsuario BIGINT,
	id_rol BIGINT,
	id_persona BIGINT,
	CONSTRAINT pk_id_persona_rol PRIMARY KEY (id_rol, id_persona)
);
CREATE TABLE ficha (
	aud_ffecha DATE NOT NULL,
	aud_cestado CHARACTER VARYING NOT NULL,
	aud_nIdUsuario BIGINT,
	id_ficha BIGINT,
	estado_ficha BOOLEAN NOT NULL,
	fecha_inicio DATE NOT NULL,
	fecha_final DATE NOT NULL,
	jornada BIGINT NOT NULL,
	CHECK (id_ficha > 0),
	CONSTRAINT pk_ficha PRIMARY KEY (id_ficha)
);
CREATE TABLE programa(
	aud_ffecha DATE NOT NULL,
	aud_cestado CHARACTER VARYING NOT NULL,
	aud_nIdUsuario BIGINT,
	id_programa BIGINT NOT NULL,
	nombre_programa CHARACTER VARYING NOT NULL,
CHECK (id_programa > 0),
CONSTRAINT pk_programa PRIMARY KEY (id_programa)
);
CREATE TABLE parametro(
	aud_ffecha DATE NOT NULL,
	aud_cestado CHARACTER VARYING NOT NULL,
	aud_nIdUsuario BIGINT,
	id_parametro BIGINT,
	id_grupo BIGINT NOT NULL,
	grupo CHARACTER VARYING NOT NULL,
	detalle CHARACTER VARYING NOT NULL,
CHECK (id_parametro > 0),
CHECK (id_grupo > 0),
CONSTRAINT pk_parametro PRIMARY KEY (id_parametro, id_grupo)
);