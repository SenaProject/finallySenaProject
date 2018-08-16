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