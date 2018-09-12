<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>frm_banco_preguntas</title>
        <link href="css/frm_banco_preguntas_add.css" rel="stylesheet" type="text/css"/>
        <style type="text/css">
h2 { color: red; font-family: Arial; font-size: large; }
/*{ color: gray; font-family: Verdana; font-size: medium; }*/
label { color: black; font-family: Arial; }
</style>
    </head>
    <center>
    <body>
        <form class="contact_form" action="" method="post" name="contact_form" >
            <ul>
                <li>
                    <h2>Crear Pregunta</h2>
                    <span class="required_notification">* Denotes Required Field</span>
                </li>
                <li>
                    <label for="Grupo Pregunta">Grupo de Pregunta</label>
                    <select type="text" name="Grupo Pregunta" class="form-control" required="" >
                        <option selected value="0">Elige el grupo Pregunta</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                    </select>
                </li>
            </ul>
            <ul>
                <li>
                    <label for="text">Descripcion</label>
                    <textarea name="message" cols="40" rows="6" required ></textarea>
                </li>
                <li>
                    <label for="Grupo Pregunta">Tipo de Respuesta</label>
                    <select type="text" name="" class="form-control" required >
                        <option selected value="0">Elige de Respuesta</option>
                        <option value="Opcion Multiple">De 1 a 5</option>
                        <option value="Lista desplegable">SI/NO</option>
                    </select>
                </li>
                <li>
                    <button class="submit" type="submit">Guardar</button>
                    <button class="reset" type="reset">Cancelar</button>
                </li>
            </ul>
        </form>
    </body>
  </center>
</html>
