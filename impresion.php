<?php 
require_once 'Config/conexion.php';
require_once 'Model/Producto.php';

$idventa = $_GET['id'];
$objProducto = new Producto();
$resultado_detalle = $objProducto->getDetalleVenta($idventa);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Carrito de Compras</title>

    <!-- Bootstrap -->
    <link href="libs/css/bootstrap.css" rel="stylesheet">
    <script src="libs/js/jquery.js"></script>
    <script src="libs/js/jquery-1.8.3.min.js"></script>
    <script src="libs/js/bootstrap.min.js"></script>
   	
    <script type="text/javascript" src="libs/ajax.js"></script>
	
	 <!-- Alertity -->
    <link rel="stylesheet" href="libs/js/alertify/themes/alertify.core.css" />
	<link rel="stylesheet" href="libs/js/alertify/themes/alertify.bootstrap.css" id="toggleCSS" />
    <script src="libs/js/alertify/lib/alertify.min.js"></script>
  </head>

  <body>
 	<div class="container">	
 		<div>
			<h1 class="text-center">Impresión</h1>
		</div>		
		<br/><br/>
		<div class="detalle-producto">
			<?php if(count($resultado_detalle)>0){?>
				<table class="table">
					<thead>
						<tr>
							<th class="text-center">Descripci&oacute;n</th>
							<th class="text-center">Cantidad</th>
							<th class="text-center">Precio</th>
							<th class="text-center">Subtotal</th>
						</tr>
					</thead>
					<tbody>
						<?php 
						$total = 0;
						while($detalle = $resultado_detalle->fetchObject()){ 
						?>
						<tr>
							<td><?php echo $detalle->producto;?></td>
							<td><?php echo $detalle->cantidad;?></td>
							<td><?php echo $detalle->precio;?></td>
							<td><?php echo round($detalle->cantidad*$detalle->precio,2);
							$total = $total + round($detalle->cantidad*$detalle->precio,2);
							?></td>
						</tr>
						<?php }?>
						<tr>
							<td colspan="3" class="text-right">TOTAL:</td>
							<td><?php echo $total;?></td>
						</tr>
					</tbody>
				</table>
			<?php }?>
		</div>
 	</div>
  </body>
<script>
window.print();
</script>
</html>
