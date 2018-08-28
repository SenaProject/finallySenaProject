select bre.descripcion, ire.descripcion, ire.valor 
  from banco_respuesta bre 
 inner join item_respuesta ire on (bre.id_respuesta = ire.id_respuesta);
 
 SELECT gpr.descripcion, bpr.descripcion  , frm.descripcion, bre.descripcion
  FROM banco_pregunta bpr 
 INNER JOIN grupo_pregunta gpr ON (bpr.id_grupo = gpr.id_grupo)
 INNER JOIN formulario frm ON (bpr.id_formulario = frm.id_formulario)
 INNER JOIN banco_respuesta bre ON (bpr.id_respuesta = bre.id_respuesta)
 
 
 /*Aprendices e instructor activos */
 
 select apr.aprendiz, ins.instructor from (select perapr.id_persona as aprendiz , cur1.id_ficha
  from curso cur1 
 inner join persona perapr on (cur1.id_persona = perapr.id_persona and cur1.id_rol =1 )) as apr, 
 (select perins.id_persona as instructor , cur1.id_ficha	    
  from curso cur1 
 inner join persona perins on (cur1.id_persona = perins.id_persona and cur1.id_rol =2 )) as ins
 where apr.id_ficha = ins.id_ficha
 
 /*Aprendices activos */
 	select per.id_persona 
	  from persona per 
	 INNER JOIN curso cur ON (cur.id_persona = per.id_persona) 
	 where per.aud_cestado = 'A' 
	   and per.estado_persona = true 
	   and cur.id_rol = 1;
	/*Instructores activos */
	select per.id_persona 
	  from persona per 
	 INNER JOIN curso cur ON (cur.id_persona = per.id_persona) 
	 where per.aud_cestado = 'A' 
	   and per.estado_persona = true 
	   and cur.id_rol = 2;

select pro.nombre_programa, fic.id_ficha, fn_persona_nom_com(per.id_persona), rol.nombre_rol
  from programa pro 
 inner join ficha fic 
    on (fic.id_programa = pro.id_programa)
 inner join curso cur
    on (cur.id_ficha = fic.id_ficha)
 inner join persona per
    on (per.id_persona = cur.id_persona)
 inner join persona_rol prol
    on (prol.id_persona = per.id_persona)
 inner join rol rol
    on (rol.id_rol = prol.id_rol)	   