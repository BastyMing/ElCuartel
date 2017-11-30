  <div class="col-xl-6 thumbnail  col-md-10" style="background-color:rgba(99,185,255,0.9)">
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
