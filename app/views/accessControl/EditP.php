<div class='col-xl-6 thumbnail row' style="background-color:rgba(99,185,255,0.5)">
	<form method="POST" action="register">
		<!--correo-->
		<div class="form-group">
			<label for="oldpass">Contraseña anterior:</label>
			<input type="password" class="form-control" id="oldpass" name="oldpass" required>
			<label for="newpass">Contraseña:</label>
			<input type="password" class="form-control" id="newpass" name="newpass" required>
			<label for="cnewpass">Confirme contraseña:</label>
			<input type="password" class="form-control" id="cnewpass" name="cnewpass" required>
		</div>
		<button type="submit" class="btn btn-default" id="ing" name="ing">Registrar</button>
	</form>
</div>