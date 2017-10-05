function addProduct(){
        var parametros = {
                "id"       : 14,
                "cantidad" : 3,
                "precio"   : 50,
                "nombre"   : "camisetas",
                "action"   : "add"
        };
        enviar(parametros);
        getProducts();
}


function getProducts(){
        var parametros = {
                "action"   : "get"
        };
        enviar(parametros);
}
function destroyCarro(){
        var parametros = {
                "action"   : "destroy"
        };
        enviar(parametros);
}
function delItem(){
        var parametros = {
                "action"   : "remove"
        };
        enviar(parametros);
}


function enviar(params){
        $.ajax({
                data:  params,
                url:   'c.php',
                type:  'post',
                beforeSend: function () {
                        $("#resultado").html("Procesando, espere por favor...");
                },
                success:  function (response) {
                        $("#resultado").html(response);
                }
        });
}