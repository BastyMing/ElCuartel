<div class="panel panel-info">
	<table class="table">
		<tbody>
			<tr>
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
			<tr>
				<td>Boleta</td>
			</tr>
			<tr>
				<td>Total a Pagar</td>
				<td><?= $total ?></td>
			</tr>
			<tr>
				<td></td>
				<td></td>
			</tr>
		</tbody>
	</table>
</div>
<script>
window.print();
</script>