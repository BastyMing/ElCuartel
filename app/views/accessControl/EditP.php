<?php
if($user){ ?>
<div class='col-xl-6 thumbnail row' style="background-color:rgba(99,185,255,0.5)">
	<form method="POST" action="profile/Cambios">
		<div class="form-group">
			<label for="email">Correo:</label>
			<input type="email" class="form-control" id="email" name="email" value="<?= $user->email ?>" required>
		</div>
		<div class="form-group">
			<label for="oldpass">Contraseña anterior:</label>
			<input type="password" class="form-control" id="oldpass" name="oldpass" required>
		</div>
		<div class="form-group">
			<label for="newpass">Contraseña:</label>
			<input type="password" class="form-control" id="newpass" name="newpass" required>
		</div>
		<div class="form-group">
			<label for="cnewpass">Confirme contraseña:</label>
			<input type="password" class="form-control" id="cnewpass" name="cnewpass" required>
		</div>
		<button type="submit" class="btn btn-default" id="ing" name="ing">Guardar cambios</button>
	</form>
</div>
<?php
} ?>