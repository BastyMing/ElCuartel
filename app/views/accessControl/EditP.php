<?php
if($user){ ?>
<div class='col-xl-6 thumbnail row' style="background-color:rgba(99,185,255,0.5)">
	<form method="POST" action="perfil/cambios">
		<!--correo-->
		<div class="form-group">
			<label for="oldpass">Correo:</label>
			<input type="text" class="form-control" id="correo" name="correo" value=<?php echo "'$user->email'"; ?> required>
			<label for="oldpass">Contraseña anterior:</label>
			<input type="password" class="form-control" id="oldpass" name="oldpass" required>
			<label for="newpass">Contraseña:</label>
			<input type="password" class="form-control" id="newpass" name="newpass" required>
			<label for="cnewpass">Confirme contraseña:</label>
			<input type="password" class="form-control" id="cnewpass" name="cnewpass" required>
		</div>
		<button type="submit" class="btn btn-default" id="ing" name="ing">Guardar cambios</button>
	</form>
</div>
<?php
} ?>