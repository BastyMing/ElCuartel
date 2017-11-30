<div class="panel panel-info">
     <div class="panel-heading">
        <h3 class="panel-title">Productos</h3>
      </div>
    <div class="panel-body detalle-producto">
        <?php if ($carro) { ?>
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
                        <td><button type="button" onclick="delItem(<?= $producto['id'] ?>)" class="btn btn-sm btn-danger eliminar-producto" id="id">Eliminar</button></td>
                    </tr>

                <?php if ($producto == end($carro)){ ?>
                    <tr>
                        <td colspan="3" rowspan="2"></td>
                        <td>Envío:</td>
                        <td><div class="align-right">$????</div></td>
                    </tr>
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
            <a href="carro/boleta" class="btn btn-info">Comprar</a>
        <?php }else{ ?>
            <div class="panel-body"> No hay productos agregados</div>
        <?php } ?>
    </div>
</div>