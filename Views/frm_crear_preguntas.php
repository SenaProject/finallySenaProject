<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Crear Preguntas</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" media="screen" title="no title" charset="utf-8">
    </head>
    <body>
        <?php
        // require_once "../models/User.php";
        ?>
        <div class="container">
            <div class="col-lg-12">
                <h2 class="text-center text-primary">Crear Pregunta</h2>
                <form action="<?php
                // echo User::baseurl()
                ?>app/save.php" method="POST">
                    <label for="Grupo Pregunta">Grupo de Pregunta</label>
                    <div class="form-group input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-question-sign"></i></span>
                        <div class="form-group">
                            <select type="text" name="Grupo Pregunta" class="form-control" required >
                                <option selected value="0">Elige el grupo Pregunta</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="text">Descripcion</label>
                        <input type="text" name="Descripcion" value="" class="form-control" id="Descripcion" placeholder="Ingresar Pregunta" required="">
                    </div>
                    <label for="">Tipo de Respuesta</label>
                    <div class="form-group input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-question-sign"></i></span>
                        <div class="form-group">
                            <select type="text" name="" class="form-control" required >
                                <option selected value="0">Elige de Respuesta</option>
                                <option value="Opcion Multiple">De 1 a 5</option>
                                <option value="Lista desplegable">SI/NO</option>
                            </select>
                        </div>
                    </div>
                    <button type="submit" name="submit" class="btn btn-default" value="Save user">
                        <span class="glyphicon glyphicon-floppy-saved"></span> Guardar
                    </button>
                    <button type="reset" name="Reset" class="btn btn-default" value="reset">
                        <span class="glyphicon glyphicon-remove"></span> Cancelar
                    </button>
                </form>
            </div>
        </div>
    </body>
</html>
