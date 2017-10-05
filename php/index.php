<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Carro</title>
    <link rel="stylesheet" href="">
    <script src="../js/jquery-3.2.1.js" type="text/javascript" charset="utf-8"></script>
    <script src="carro.js" type="text/javascript" charset="utf-8"></script>
    <style>
        .producto{
            height: 200px;
            width: 300px;
            background-color: #20F66C;
        }
    </style>
</head>
<body onload="getProducts()">
    <div class="producto">
        <input type="button" onclick="addProduct()" value="Comprar">
        <input type="button" onclick="getProducts()" value="Ver">
        <input type="button" onclick="destroyCarro()" value="Destroy">
        <input type="button" onclick="delItem()" value="Remove">
    </div>
    <div id="resultado">
        
    </div>
</body>
</html>