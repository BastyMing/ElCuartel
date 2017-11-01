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
        url = "product/comprar"+"/"+params.id+"/"+params.cantidad;
        enviar(url, null, ()=>{
            alert("modal");
        });
        return false;
}

function destroyCarro(){
        url = "carro/DestroyCarro";
        enviar(url);
}
function delItem(id){
        url = "carro/RemoveItem/"+id;
        enviar(url,null,(res)=>{
            $(".container").html(res);
        });
}


function enviar(url=null, params=null, callback=false){
    var url = PUBLIC_PATH + url;
    $.ajax({
            data:  params,
            url:   url,
            type:  'post',
            success:  function (response) {
                if (callback(response)) {}
            }
    });
}