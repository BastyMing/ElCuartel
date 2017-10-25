<?php
require('conexion.php');

error_reporting(E_ALL ^ E_NOTICE);

$cantidad_resultados_por_pagina = 3;

if (isset($_GET["pagina"])) {
    if (is_string($_GET["pagina"])) {
         if (is_numeric($_GET["pagina"])) {
             if ($_GET["pagina"] == 1) {
                 header("Location: index.php");
                 die();
             } else {
                 $pagina = $_GET["pagina"];
            };
         } else {
             header("Location: index.php");
            die();
         };
    };

} else {
    $pagina = 1;
};

$empezar_desde = ($pagina-1) * $cantidad_resultados_por_pagina;
?>

<body>

<?php
$obtener_todo_BD = "SELECT * FROM mmv004";

$consulta_todo = mysqli_query($conexion, $obtener_todo_BD);

$total_registros = mysqli_num_rows($consulta_todo);

$total_paginas = ceil($total_registros / $cantidad_resultados_por_pagina); 

$consulta_resultados = mysqli_query($conexion, "
SELECT * FROM `mmv004` 
ORDER BY `mmv004`.`id` ASC 
LIMIT $empezar_desde, $cantidad_resultados_por_pagina");

while($datos = mysqli_fetch_array($consulta_resultados)) {
?>

<span class="persona">
<p><strong><?php echo $datos['nombre']; ?></strong> <br>
<?php echo $datos['edad']; ?></p>
</span>

<?php
};
?>

<hr>

<?php
//Crea un bucle donde $i es igual 1, y hasta que $i sea menor o igual a X, a sumar (1, 2, 3, etc.)
//Nota: X = $total_paginas
for ($i=1; $i<=$total_paginas; $i++) {
    //En el bucle, muestra la paginación
    echo "<a href='?pagina=".$i."'>".$i."</a> | ";
};
//echo
 ?>

</body>