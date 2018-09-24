-- primero este

ALTER TABLE ONLY evaluacion_detalle DROP CONSTRAINT fk_pregunta_evaluacion;

-- segundo

ALTER TABLE evaluacion_detalle ADD CONSTRAINT fk_pregunta_evaluacion FOREIGN KEY (id_pregunta, id_formulario)
      REFERENCES public.detalle_formulario (id_pregunta, id_formulario ) MATCH SIMPLE
      ON UPDATE NO ACTION ON DELETE NO ACTION
