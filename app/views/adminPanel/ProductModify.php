<?php 
    if (empty($datos)) exit();
?>

<div id="lista" style="background-color: white;">
    <table id="tablabase">
        <thead>
            <tr>
                <th height="40" width="70">ID</th>
                <th height="40">Nombre</th>
                <th height="40">Precio</th>
                <th height="40">Tipo</th>
                <th height="40">Imagen</th>
                <th height="40">Proveedor</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php
               while ($product = $datos->fetch()){  
                $product = ((object)$product);?>
                    <tr>
                        <td><?= $product->codigo; ?></td>
                        <td><?= $product->nombre; ?></td>
                        <td><?= $product->precio; ?></td>
                        <td><?= $product->tipo; ?></td>
                        <td><?= $product->img; ?></td>
                        <td><?= $product->proveedor; ?></td>
                        <td>
                            <img src="./img/eliminar.png" class="opciones" alt="Eliminar">
                            <img src="./img/edit.png" class="opciones" alt="Editar">
                        </td>
                    </tr>
                  <?php }?>
        </tbody>
    </table>
</div>

<script>
    $(document).ready(function(){
        $('#tablabase').DataTable();
    });
</script>