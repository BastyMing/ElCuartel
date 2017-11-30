<?php 
$productInfo = (object)["codigo"=>"",
                    "nombre"=>"",
                    "precio"=>"",
                    "tipo"=>"Seleccione",
                    "img"=>"",
                    "proveedor"=>"",
                    "button"=>"Agregar"];
$productInfo = (object) array_merge((array)$productInfo, (array)$datos);
 ?>

<form action="<?= PUBLIC_PATH ?>admin/product/create/" method="POST" accept-charset="utf-8">
        <div class="form-group">
            <label for="">Nombre</label>
            <input type="text" name="nombre" class="form-control" value="<?= $productInfo->nombre ?>" placeholder="Bebida" required>
        </div>
        <div class="form-group">
            <label for="">Precio</label>
            <input type="number" name="precio" min="0" max="999999" class="form-control" placeholder="$0000" value="<?= $productInfo->precio ?>" required>
        </div>
        <div class="form-group">
            <label for="">Tipo</label>
            <select class="form-control" name="tipo" required>
                <option><?= ucfirst(strtolower(Tipos::find($productInfo->tipo)->tipo)) ?></option>
                <?php
                $query = Tipos::findall();
                while ($valores = $query->fetch()) {
                    echo '<option value="'.$valores['id'].'">'.ucfirst(strtolower($valores['tipo'])).'</option>';
                }
                ?>
            </select>
        </div>
        <div class="form-group">
            <label for="">Imagen</label>
            <input type="text" name="imge" class="form-control" placeholder="www.image%jpg.com" value="<?= $productInfo->img ?>" required>
        </div>
        <div class="form-group">
            <label for="">Proveedor</label>
            <input type="text" name="prov" class="form-control" placeholder="Proveedor" value="<?= $productInfo->proveedor ?>" required>
        </div>
        <button type="submit" class="btn btn-default"><?= $productInfo->button ?></button>
    </form>