  <div class="col-md-7"></div>
  <div class="col-md-4">
  	<form method="POST" action="singup/register">
      <div class="form-group">
        <label for="name">Nombre:</label>
        <input type="text" class="form-control" id="email" name="name" required>
      </div>
      <div class="form-group">
        <label for="apell">Apellido:</label>
        <input type="text" class="form-control" id="apell" name="apell" required>
      </div>
      <div class="form-group">
        <label for="rut">RUN:</label>
        <input type="text" class="form-control" id="email" name="rut" required>
      </div>
      <div class='form-group'>
        <label for="date">Fecha de nacimiento:</label>
        <div class="input-group date" id="datetimepicker1">

          <input id="date" name="date" type='text' class="form-control" />
          <span class="input-group-addon">
              <span class="glyphicon glyphicon-calendar"></span>
          </span>

        </div>
      </div>
      <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" class="form-control" id="email" name="email" required>
      </div>
      <div class="form-group">
        <label for="pwd">Clave:</label>
        <input type="password" class="form-control" id="pwd" name="pwd" required>
      </div>
      <button type="submit" class="btn btn-default" id="ing" name="ing">Registrar</button>
    </form>
  </div>
  <script type="text/javascript">
    $("#datetimepicker1").datetimepicker({format: 'yyyy-mm-dd'});
  </script>