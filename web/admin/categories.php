<?php 

$pagename = 'Categorias'; 
require_once('./include/admin-load.php');
$categories = $category->all();
// Pagination
$currpage = (isset($_GET['page'])) ? $_GET['page'] : 1;
$maxres = 25;
$num = count($categories);
$pages = $num / $maxres;
$pages = ceil($pages);
$start = ( $currpage - 1 ) * $maxres ;
$last = $start + $maxres -1;


if(!empty($product->msg)){
	$success = $product->msg;
	}
	if(!empty($product->error)){
	$error = $product->error;
	}

////////////////
require_once('./header.php');

?>
<ul class="nav nav-pills"><li>
<a href="category-add.php">Añadir categoria</a></li></ul>
<hr>
<?php if(empty($categories)){
?>
<h2 align='center'>No hay categories Añadidas</h2>
<?php
}else{?>
<div class="text-center"><ul class="pagination">
<?php 
$i='';
$count= 1;
echo "<li><a href=\"categories.php?page=1\">Primero</a></li>";
for($i = 1 ; $i<=$pages ; $i++){
if(($currpage - $i) <=3  && ($count <= 7)){

echo "<li><a href=\"categories.php?page=" . $i . "\">" . $i . "</a></li>";
$count = $count+1 ;
}
elseif($currpage==$i){
echo "<li><a href=\"categories.php?page=" . $i . "\">" . $i . "</a></li>";
$count = $count+ 1;

}
}
echo "<li><a href=\"categories.php?page=" . $pages . "\">Ultimo</a></li>";
?></ul></div>
<table class="table">
<thead>
<tr>
<th>ID</th>
<th>Nombre</th>
<th>Productos</th>
<th>Acciones</th>
</tr>
</thead>
<tbody>
<?php for($i = $start; $i <= $last; $i++) {
if (isset($categories[$i])){?>
<tr>
<td><?php echo $categories[$i]['id']; ?></td>
<td><?php echo $categories[$i]['name']; ?></td>
<td><a href="category-products.php?id=<?php echo $categories[$i]['id']; ?>" >Ver Productos</a></td>
<td><ul class="pagination"><li><a href="category-edit.php?category_id=<?php echo $categories[$i]['id']; ?>" title="Editar categoria"><i class="glyphicon glyphicon-pencil"></i></li><li></a><a href="category-remove.php?cat_id=<?php echo $categories[$i]['id']; ?>" title="Remover categoria"><i class="glyphicon glyphicon-trash"></i></a></li></ul></td>
</tr>
<?php }
}?>

</tbody></table>

<?php
}
require_once('./footer.php');

?>