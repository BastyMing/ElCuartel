<?php $i=0;$nombresParaElPerfil=["Nombre","Apellido","Rut","Fecha de nacimiento","Correo","Password","Nivel","Id","Fecha de Nacimiento"]; if($user){
//el nombre es largo para no interrumpir a nadie XD ?>
<div class='col-xl-6 thumbnail'>
	<?php foreach($user as $perfil){ if($perfil != ""){ ?>
			<p><?= $nombresParaElPerfil[$i] ?> : <?= $perfil ?></p>
		<?php }$i++; ?>
	<?php } ?>
</div>
<?php } else { ?>
	<p>no estas registrado</p>
<?php }?>