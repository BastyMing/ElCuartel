<?php

$userInfo = (object)["id"=>"",
                    "nombre"=>"",
                    "apellido"=>"",
                    "rut"=>"",
                    "date"=>"",
                    "correo"=>"",
                    "password"=>"",
                    "button"=>"Crear"];
$userInfo = (object) array_merge((array)$userInfo, (array)$datos);
?>
  <br><br><br>
  <div class="col-md-1"></div>
  <div class="col-md-4">
    <form method="POST" action="register">
      <div class="form-group">
        <label for="name">Nombre:</label>
        <input type="text" class="form-control" id="name" value="<?= $userInfo->nombre ?>" name="name" required>
      </div>
      <div class="form-group">
        <label for="apell">Apellido:</label>
        <input type="text" class="form-control" id="apell" value="<?= $userInfo->apellido ?>"  name="apell" required>
      </div>
      <div class="form-group">
        <label for="rut">RUN:</label>
        <input type="text" class="form-control" id="rut" value="<?= $userInfo->rut ?>" name="rut" required>
      </div>
      <div class='form-group'>
        <label for="date">Fecha de nacimiento:</label>
        <div class="input-group date" id="datetimepicker1">

          <input id="date" name="date" type='text' value="<?= $userInfo->date ?>" class="form-control" />
          <span class="input-group-addon">
              <span class="glyphicon glyphicon-calendar"></span>
          </span>

        </div>
      </div>
      <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" class="form-control" id="email" value="<?= $userInfo->correo ?>" name="email" required>
      </div>
      <div class="form-group">
        <label for="pwd">Clave:</label>
        <input type="password" class="form-control" id="pwd" name="pwd" required>
      </div>
      <button type="submit" class="btn btn-default" id="ing" name="ing"><?= $userInfo->button ?></button>
    </form>
  </div>
  <script type="text/javascript">
    $(function () {
      $('#datetimepicker1').datetimepicker({
        defaultDate: "1990-1-1",
        viewMode: 'years',
        format: 'YYYY-MM-DD'
      });
    });
  </script>