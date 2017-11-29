<?php
	$i=0;
	if($user){
	//el nombre es largo para no interrumpir a nadie XD ?>
	<div class='col-xl-10 thumbnail row' style="background-color:rgba(240,240,255,0.9)">
		<br> <br> <br> <div class='col-md-4 thumbnail' id='palafoto'></div>
		<button onclick="location.href = '<?php echo SUB_FOLDER; ?>/profile/EditP'" action="EditP" id="staid" type="button" class="btn btn-primary" >cambiar datos</button>
		<div class='col-md-8'>
			<table border="1 px">
				<caption>Datos</caption>
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
				</tbody>
			</table>
		</div>
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
