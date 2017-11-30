  <div class="col-md-7  col-sm-1" ></div>
  <div class="col-md-3 col-sm-11">
  	<form method="POST" action="Metertodo">
      <div class="form-group">
        <label for="img">Ulr Imagen:</label>
        <input type="text" class="form-control" id="img" name="img" maxlength="600"> 
      </div>
      <div class="form-group">
        <label for="ddc">Direccion:</label>
        <input type="text" class="form-control" id="ddc" name="ddc" maxlength="60" required>
      </div>
      <div class="form-group">
        <label for="cel">Celular:</label>
        <input type="text" class="form-control" id="cel" name="cel" maxlength="9" required>
      </div>
      <div class="form-group">
        <label for="abt">Sobre ti:</label>
        <input type="text" class="form-control" id="abt" name="abt" value="Escribe algo sobre ti." maxlength="400">
      </div>
      <button type="submit" class="btn btn-default" name="ing" id="ing">agregar datos</button>
    </form>

  </div>
