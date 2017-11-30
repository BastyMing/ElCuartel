<?php 
    if (empty($products)) exit();
?>

<div id="master">
    <div id="lista">
        <table border="1" id="tablabase">
            <thead>
                <tr>
                    <th height="40" width="70">ID</th><!--agregar una lista de cosas-->
                    <th height="40">Nombre</th>
                    <th height="40">Apellido</th>
                    <th height="40">Rut</th>
                    <th height="40">Fecha de nacimiento</th>
                    <th height="40">Correo</th>
                    <th height="40">Password</th>
                    <th height="40">nivel</th>
                </tr>
            </thead>
            <tbody>
                <?php
                   while ($result = $products->fetch()){  ?>
                        <tr>
                            <td><?php echo $row["id_productos"];?></td>
                            <td><?php echo $row["nombre_producto"];?></td>
                            <td width=200><?php tipo_prod($row["id_tipo_producto"]);?></td>
                            <td>
                                <img src="./img/eliminar.png" class="opciones" onClick="eliminar(<?php echo $row["id_productos"];?>);" alt="Eliminar">
                                <img src="./img/edit.png" class="opciones" onClick="editar(<?php echo $row["id_productos"];?>);" alt="Editar">
                            </td>
                        </tr>
                      <?php ;}?>
            </tbody>
        </table>
    </div>
    <div id="caja">
        <div id="options">
            <input class="boton" type="button" onClick="change('create')" value="CREAR">
            <input class="boton" type="button" onClick="change('update')" value="EDITAR">
        </div>
        <div id="create" style="display: none;">
            <p>REGISTRAR DATOS</p>
            <form id="frCREATE" accept-charset="utf-8">
              <!-- hay que cambibiar los formularios -->

              <div align="center">
                <input class="texto" id="x1" type="text" name="nombre_producto" value="" placeholder="Nombre producto" required>
                <br>
                <select class="texto" name="id_tipo_producto" id="x2" >
                    <option value="" disabled selected>Seleccione el tipo de producto</option>
                    <?php    
                    $z = "SELECT * FROM tipo_producto;";
                    $rs = mysql_query($z) or die($z."<br/><br/>".mysql_error());
                    while ( $row = mysql_fetch_array($rs) )
                    {
                        ?>
                    <option value="<?php echo $row['id_tipo_producto'] ?>"><?php echo $row['descripcion_tipo_producto']; ?></option>
                    <?php
                    }    
                    ?>
                </select>
                  
                <br>
                <!--Mejor listar id?-->
                <input class="boton" type="button" onClick="guardar();" name="" value="REGISTRAR">
                </div>
            </form>
        </div>
        <div id="update" style="display: none;">
            <p>EDITAR DATOS</p>
            <form id="frUPDATE">
                <input class="texto" type="text" name="id_productos" id="upd_id" value="" placeholder="ID producto"><br>
                <input class="texto" type="text" name="nombre_producto" id="upd_name" value="" placeholder="Cambiar nombre producto" required><br><!--buscar datos en db-->
                <select class="texto" name="id_tipo_producto" id="upd_id_t" value="" >
                    <option value="" disabled selected>Seleccione el tipo de producto</option>
                    <?php    
                    $z = "SELECT * FROM tipo_producto;";
                    $rs = mysql_query($z) or die($z."<br/><br/>".mysql_error());
                    while ( $row = mysql_fetch_array($rs) )
                    {
                        ?>
                    <option value="<?php echo $row['id_tipo_producto'] ?>"><?php echo $row['descripcion_tipo_producto']; ?></option>
                    <?php
                    }    
                    ?>
                </select>
                <input class="boton" type="button" onClick="guardar();" name="" value="Update">
                <input class="boton" type="reset" value="Clear">
            </form>
        </div>
    </div>
</div>