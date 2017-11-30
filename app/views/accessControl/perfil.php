<?php
	$i=0;
	if(!empty($_GET['msj'])){$msj=$_GET['msj'];
		echo "<div class='col-xl-10 thumbnail row' style='background-color:rgba(200,200,240,1)'>
		<h1>aviso: $msj</h1>
		</div>";
	}

	if($user){
	//el nombre es largo para no interrumpir a nadie XD ?>
	<div class='col-xl-10 thumbnail row' style="background-color:rgba(240,240,255,0.9)">
		<h1>Tu perfil:</h1>
		<div class='col-md-4'><div class="thumbnail" id='palafoto'></div>
		<button onclick="location.href = '<?php echo SUB_FOLDER; ?>/profile/EditP'" action="EditP" id="staid" type="button" class="btn btn-primary" >cambiar pass</button><button onclick="location.href = '<?php echo SUB_FOLDER; ?>/profile/Ag'" action="Ag" id="staid2" type="button" class="btn btn-primary" >cambiar datos</button></div>

		<div class='col-md-8'>
			<table style="background-color: white;" class="table table-striped">
				<thead>
					<tr><td>Datos:</td><td></td></tr>
				</thead>
				<tbody>
					<tr>
						<td>Nombre:</td>
						<td><?= $user->nombre ?></td>
					</tr>
					<tr>
						<td>Apellido:</td>
						<td><?= $user->apellido ?></td>
					</tr>
					<tr>
						<td>Rut:</td>
						<td><?= $user->rut ?></td>
					</tr>
					<tr>
						<td>Fecha de nacimiento:</td>
						<td><?= $user->date ?></td>
					</tr>
					<tr>
						<td>Correo:</td>
						<td><?= $user->correo ?></td>
					</tr>
					<?php 
						if($user->celular){echo "<tr><td>Celular:</td><td>".$user->celular."</td></tr>";}
						if($user->abitabout){echo "<tr><td>Sobre mi:</td><td>".$user->abitabout."</td></tr>";}
					 ?>
				</tbody>
			</table>
		</div>
 </div>
 <?php $imagen_perfil = $user->img ? $user->img : SUB_FOLDER."/img/user-image-not-available.png"
  //$imagen_perfil = SUB_FOLDER."/img/user-image-not-available.png"?>
<script> 
	<?php echo"var fotoaponer = '$imagen_perfil';" ?>
	fotoaponer = "<img src='"+fotoaponer+"'>";
	var paeditarlafoto = document.getElementById('palafoto');
	paeditarlafoto.innerHTML = fotoaponer;
</script>
<?php } ?>
<!-- no hay caso donde no este registrado, pues no aparece la opcion si no ingresa -->
