

function getUrlVars(url) {
    var hash;
    var myJson = {};
    var hashes = url.slice(url.indexOf('?') + 1).split('&');
    for (var i = 0; i < hashes.length; i++) {
        hash = hashes[i].split('=');
        myJson[hash[0]] = hash[1];
    }
    return myJson;
}
function addProduct(form){
        var params = getUrlVars(form);
        var parametros = {
                "id"       : params.id,
                "cantidad" : params.cantidad,
                "action"   : "add"
        };
        enviar(parametros);
        getProducts();
        return false;
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
                url:   '/dashboard/ElCuartel/php/carro/c.php',
                type:  'post',
                beforeSend: function () {
                        $("#resultado").html("Procesando, espere por favor...");
                },
                success:  function (response) {
                        $("#resultado").html(response);
                }
        });
}