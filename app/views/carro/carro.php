<table class="table table-items text-success bg-warning">
    <thead class="bg-primary">
        <tr>
            <th></th>
            <th colspan="2">Artículo</th>
            <th><div class="align-center">Cantidad</div></th>
            <th><div class="align-right">Precio</div></th>
        </tr>
    </thead>
    <tbody>
        <?php 
        if($carro)
        {
            foreach($carro as $producto)
            {
                ?>
            <tr>
                <td>
                    <a title="Quitar Item" style="font-size: 3em;text-decoration: none;" class="glyphicon glyphicon-minus-sign" href="carro/RemoveItem/<?= $producto['id'] ?>">
                    </a>
                </td>
                <td>
                    <img src="https://image.freepik.com/iconos-gratis/contorno-llama-de-fuego_318-40671.jpg" alt="Image" height="50">
                </td>
                <td><?= $producto["nombre"] ?></td>
                <td>
                    <input type="text" disabled class="tiny-size" value="<?= $producto["cantidad"] ?>" >
                </td>
                <td><?= $producto["cantidad"]*$producto["precio"] ?></td>
            </tr>
            <?php
                if ($producto === end($carro)){ ?>
                    <tr>
                        <td colspan="3" rowspan="2"></td>
                        <td class="bg-danger">Envío:</td>
                        <td class="bg-danger"><div class="align-right">$????</div></td>
                    </tr>
                    <tr class="bg-danger">
                        <td>Subtotal:</td>
                        <td>
                            <div class="size-16 align-right"><?= $total ?></div>
                        </td>
                    </tr>
                <?php
                }
            }
        }else{
            echo "<tr>
                <td colspan='5' style='text-align:center;' rowspan='4'><h2>Sin articulos</h2></td>
            </tr>";
        }
        ?>
    </tbody>
</table>