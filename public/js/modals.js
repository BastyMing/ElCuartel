function modalShop(){
    BootstrapDialog.show({
        title: 'Información',
        message: 'Producto agregado! \n ¿Quieres seguir comprando?',
        closable: true,
        draggable: false,
        buttons: [{
            label: 'Continuar comprando',
            cssClass: 'btn-primary',
            data: {
                js: 'btn-confirm',
                'user-id': '3'
            },
            action: function(){
                alert('Hi Orange!');
            }
        }, {
            icon: 'glyphicon glyphicon-shopping-cart',
            label: ' Pagar',
            cssClass: 'btn-success'
        }]
    });
}
function modalBuy(){
    BootstrapDialog.show({
        message: 'Producto agregado al carro',
        buttons: [{
            label: 'Close',
            action: function(dialogItself){
                dialogItself.close();
            }
        }]
    });
}