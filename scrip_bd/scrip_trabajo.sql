CREATE OR REPLACE FUNCTION public.fn_credencial(
	id_persona bigint,
   character varying)
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
