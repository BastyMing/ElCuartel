<!DOCTYPE html>
<html lang="en">
<head>

<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<title>El Cuartel - <?php echo $pagename; ?></title>
<link href="css/style.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="js/jquery-2.0.3.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/jquery.printElement.js"></script>
<script type="text/javascript" src="js/symbiotic.js"></script>
<script type="text/javascript" src="../sym-app/js/sym-cart.js"></script>
<script type="text/javascript">
jQuery(document).ready(function($){
$("#sidebar .nav-links  .sidebar-header").siblings().hide();
$("#sidebar .nav-links  .sidebar-header").click(function(){
var shown = $(this).attr('data-shown');
if(shown != 'true'){
$(this).addClass('active-head');
$(this).parent().children('li').slideDown();
$(this).attr('data-shown','true');
}else{
$(this).siblings().slideUp();
$(this).removeClass('active-head');
$(this).attr('data-shown','false');
}
});

var thisdoc = "<?php echo basename($_SERVER['PHP_SELF']);?>";
$("#sidebar .nav-links a").each(function(){
var target = $(this).attr('href');
if(target == thisdoc){
$(this).parent().addClass("active");
$(this).parent().parent().children('li').show();
$(this).parent().parent().children('.sidebar-header').addClass('active-head');
$(this).parent().parent().children('.sidebar-header').attr('data-shown','true');
}
})

});
</script>
</head>
<body>
<?php $orders_new = $order->all('seen','no');
$num_new = count($orders_new);
?>
<div class="container-fluid">
<div class="row-fluid">
<div class="col-md-2" id='sidebar'>
<ul class="nav nav-links">
<li class="sidebar-header"><span class='glyphicon glyphicon-tasks'></span>&nbsp;Dashboard</li>
<li><a href="index.php" >Inicio</a></li>

<li><a href="../" >Volver a la pagina principal</a></li>
</ul>
<ul class="nav nav-links">
<li class="sidebar-header"><span class='glyphicon glyphicon-list-alt'></span>&nbsp;Ordenes</li>
<li><a href="orders.php" >Todas las ordenes</a></li>
<li><a href="orders-new.php" >Nuevas <?php if($num_new > 0){echo "<span class=\"badge\">".$num_new."</span>";}?></a></li>
<li><a href="order-details.php" >Buscar</a></li>
<li><a href="create-invoice.php" >crear facturas</a></li>
</ul>
<ul class="nav nav-links">
<li class="sidebar-header"><span class='glyphicon glyphicon-briefcase'></span>&nbsp;Productos</li>
<li><a href="products.php" >Todos los Productos</a></li>
<li><a href="product-add.php" >Añadir producto</a></li>
<li><a href="products-out.php" >Sin Stock</a></li>
<li><a href="categories.php" >Categorias</a></li>
<li><a href="category-add.php" >Añadir categoria</a></li>
</ul>

<?php if($user->is_admin(USER)){ ?>
<ul class="nav nav-links">
<li class="sidebar-header"><span class='glyphicon glyphicon-plane'></span>&nbsp;Envios</li>
<li><a href="shipping.php" >Configurar envios</a></li>
<li><a href="shipping-regions.php" >Regiones</a></li>
<li><a href="shipping-region-add.php" >Añadir region</a></li>
</ul>
<ul class="nav nav-links">
<li class="sidebar-header"><span class='glyphicon glyphicon-user'></span>&nbsp;Compradores</li>
<li><a href="customers.php" >Compradores</a></li>
<li><a href="customer-search.php" >Buscar</a></li>
</ul>
<ul class="nav nav-links">
<li class="sidebar-header"><span class='glyphicon glyphicon-cog'></span>&nbsp;Configuracion</li>
<li><a href="settings.php" >Configuracion de la pagina</a></li>
<li><a href="settings-admins.php" >Controlar administradores</a></li>
</ul>
<?php } ?>
</div>
<div class="col-md-10 col-md-offset-2 main-body">
<div class="page-header"><h1><?php echo $pagename; ?></h1></div>
<div class="alert alert-success" id="message" style="display:none;"></div>


<?php
if(isset($error)){
echo "<div class='alert alert-danger'>$error</div>";
}
if(isset($success)){
echo "<div class='alert alert-success'>$success</div>";
}

