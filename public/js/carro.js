

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
        var params = $( form ).serialize();
        var params = getUrlVars(params);
        var formAction = $(form).attr("action");
        url = formAction+"/"+params.id+"/"+params.cantidad;
        enviar(url);
        getProducts();
        return false;
}


function getProducts(){
        url = "GetProducts";
        enviar(url);
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


function enviar(url=null, params){
        $.ajax({
                data:  params,
                url:   url,
                type:  'post',
                beforeSend: function () {
                        $("#resultado").html("Procesando, espere por favor...");
                },
                success:  function (response) {
                    console.log(response);
                        $("#resultado").html(response);
                }
        });
}