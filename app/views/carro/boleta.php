<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<link rel="stylesheet" href="<?=PUBLIC_PATH?>css/bootstrap.css">
</head>
<body>
<div class="container">
<div class="col-md-8 thumbnail">
	<table class="table">
		<tbody>
			<tr class="bg-info text-white">
				<td>Datos cliente</td>
				<td></td>
			</tr>
			<tr>
				<td>Nombre</td>
				<td><?= $user->nombre?></td>
			</tr>
			<tr>
				<td>Rut</td>
				<td><?= $user->rut ?></td>
			</tr>
			<tr>
				<td>Direccion</td>
				<td>???</td>
			</tr>
			<tr class="bg-info text-white">
				<td>Boleta</td>
			</tr>
			<tr>
				<td>Total a Pagar</td>
				<td>$<?= $total ?></td>
			</tr>
			<tr>
				<td><img src="<?= PUBLIC_PATH ?>img/qr.png" alt="..."></td>
				<td></td>
			</tr>
		</tbody>
	</table>
	<table class="table">
                <thead>
                    <tr>
                        <th>Descripci&oacute;n</th>
                        <th>Cantidad</th>
                        <th>Precio</th>
                        <th>Subtotal</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach($carro as $producto){ ?>
                    <tr>
                        <td><?= $producto["nombre"] ?></td>
                        <td><?= $producto["cantidad"] ?></td>
                        <td>$<?= $producto["precio"] ?></td>
                        <td>$<?= $producto["cantidad"]*$producto["precio"] ?></td>
                    </tr>

                <?php if ($producto == end($carro)){ ?>
                    <tr>
                        <td>Total :</td>
                        <td>
                            <div class="size-16 align-right">$<?= $total ?></div>
                        </td>
                    </tr>
                <?php }
                } ?>
                </tbody>
            </table>
</div>
<script>
window.print();
</script>
</body>
</html>
