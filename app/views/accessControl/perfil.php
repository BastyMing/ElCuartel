<?php
	$i=0;
	$nombresParaElPerfil=["Nombre","Apellido","Rut","Fecha de nacimiento","Correo","Password","Nivel","Id","Fecha de Nacimiento",""];
	if($user){
	//el nombre es largo para no interrumpir a nadie XD ?>
	<div class='col-xl-6 thumbnail row' style="background-color:rgba(99,185,255,0.5)">
		<div class='col-md-8'>
		<?php foreach($user as $perfil){ ?>
			<?php if($nombresParaElPerfil[$i]!="" && $perfil != ""){ ?>
				<h1 class="bg-primary"><?= $nombresParaElPerfil[$i] ?> : <?= $perfil ?></h1>
			<?php }else{$imagen_perfil= $perfil ? $perfil : "no imagen";}
			 $i++;
			}
	} ?>
</div>
<br><br><br><div class='col-md-4 thumbnail' id='palafoto'></div></div>
<script> 
	<?php echo"var fotoaponer = '$imagen_perfil';" ?>
	fotoaponer = "<img src='"+fotoaponer+"'>";
	var paeditarlafoto = document.getElementById('palafoto');
	paeditarlafoto.innerHTML = fotoaponer;
</script>
<!-- no hay caso donde no este registrado, pues no aparece la opcion si no ingresa -->
