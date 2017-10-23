<?php 

require_once('./include/admin-load.php');
$products = $product->by_category($_REQUEST['id']);
$cat_details = $category->details($_REQUEST['id']);
$pagename = ucwords($cat_details['name']);
//Pagination
$currpage = (isset($_GET['page'])) ? $_GET['page'] : 1;
$maxres = 25;
$num = count($products);
$pages = $num / $maxres;
$pages = ceil($pages);
$start = ( $currpage - 1 ) * $maxres ;
$last = $start + $maxres -1;


require_once('./header.php');

?>
<?php if(empty($products)){
?>
<h2 align='center'>No Hay Productos en esta categoria.</h2>
<?php
}else{?>

<div class="text-center"><ul class="pagination">
<?php 
$i='';
$count= 1;
echo "<li><a href=\"category-products.php?id=".$_REQUEST['id']."&page=1\">Primero</a></li>";
for($i = 1 ; $i<=$pages ; $i++){
if(($currpage - $i) <=3  && ($count <= 7)){

echo "<li><a href=\"category-products.php?id=".$_REQUEST['id']."&page=" . $i . "\">" . $i . "</a></li>";
$count = $count+1 ;
}
elseif($currpage==$i){
echo "<li><a href=\"category-products.php?id=".$_REQUEST['id']."&page=" . $i . "\">" . $i . "</a></li>";
$count = $count+ 1;

}
}
echo "<li><a href=\"category-products.php?id=".$_REQUEST['id']."&page=" . $pages . "\">Ultimo</a></li>";
?></ul>
</div>

<table class="table table-hover">
<thead>
<tr>
<th>ID</th>
<th>Nombre</th>
<th>Precio Y envio (<?php echo $setting['currency_symbol']; ?>)</th>
<th>Opciones</th>
<th>Acciones</th>
</tr>
</thead>
<tbody>
<?php for($i = $start; $i <= $last; $i++) {
if (isset($products[$i])){
if(empty($products[$i]['shipping'])){
$products[$i]['shipping'] = '0';
}
$products[$i]['shipping_charge'] = ($products[$i]['shipping'] !='0')?$products[$i]['shipping']:'Free';
?>
<tr<?php if($products[$i]['stock'] <= 5 ){ echo " class='info'";}?>>
<td><?php echo $products[$i]['id']; ?></td>
<td><img class="img-thumbnail" src="<?php echo $setting['website_url']; ?>/images/products/small-<?php echo $products[$i]['image']; ?>" />&nbsp;<?php echo $products[$i]['name']; ?></td>
<td><?php echo $products[$i]['price'] ." + ".$products[$i]['shipping_charge']." = ".number_format(($products[$i]['shipping'] + $products[$i]['price']),2); ?></td>
<td>
<?php 
$options = $product->options($products[$i]['id']);

foreach ($options as $option){
echo $option['name'] . " - " . $setting['currency_symbol'] . " " . $option['price'] . "<br>";
 } ?>
</td>
<td><ul class="pagination"><li><a title="Añadir imagen" href="product-images.php?product_id=<?php echo $products[$i]['id']; ?>"><i class="glyphicon glyphicon-camera"></i></a></li><li><a href="product-update-options.php?product_id=<?php echo $products[$i]['id']; ?>" title="Añadir / Remover opciones"><i class="glyphicon glyphicon-plus"></i></a></li><li><a href="product-edit.php?product_id=<?php echo $products[$i]['id']; ?>" title="Editar Producto"><i class="glyphicon glyphicon-pencil"></i></a></li><li><a href="product-remove.php?product_id=<?php echo $products[$i]['id']; ?>" title="Remover Producto"><i class="glyphicon glyphicon-trash"></i></a></li></ul></td>
</tr>
<?php }
}?>

</tbody></table>

<?php
}
require_once('./footer.php');

?>