<?php 
    if (empty($datos)) exit();
?>

<div id="lista" style="background-color: white;">
    <table id="tablabase">
        <thead>
            <tr>
                <th height="40" width="70">ID</th>
                <th height="40">Nombre</th>
                <th height="40">Apellido</th>
                <th height="40">Rut</th>
                <th height="40">Fecha de nacimiento</th>
                <th height="40">Correo</th>
                <th height="40">Password</th>
                <th height="40">nivel</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php
               while ($user = $datos->fetch()){  
                $user = ((object)$user);?>
                    <tr>
                        <td><?= $user->id; ?></td>
                        <td><?= $user->nombre; ?></td>
                        <td><?= $user->apellido; ?></td>
                        <td><?= $user->rut; ?></td>
                        <td><?= $user->date; ?></td>
                        <td><?= $user->correo; ?></td>
                        <td>Encrypted</td>
                        <td><?= $user->nivel; ?></td>
                        <td>
                            <a href="<?= SUB_FOLDER ?>admin/userdelete/<?= $user->correo ?>" class="btn btn-danger glyphicon glyphicon-remove" role="button"> Eliminar</a>
                            <a href="<?= SUB_FOLDER ?>admin/useredit/<?= $user->correo ?>" class="btn btn-info glyphicon glyphicon-pencil"> Editar</a>
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