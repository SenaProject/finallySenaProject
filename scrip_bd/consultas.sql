select bre.descripcion, ire.descripcion, ire.valor 
  from banco_respuesta bre 
 inner join item_respuesta ire on (bre.id_respuesta = ire.id_respuesta);
 
 SELECT gpr.descripcion, bpr.descripcion  , frm.descripcion, bre.descripcion
  FROM banco_pregunta bpr 
 INNER JOIN grupo_pregunta gpr ON (bpr.id_grupo = gpr.id_grupo)
 INNER JOIN formulario frm ON (bpr.id_formulario = frm.id_formulario)
 INNER JOIN banco_respuesta bre ON (bpr.id_respuesta = bre.id_respuesta)