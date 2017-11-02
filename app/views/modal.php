<div class="source-code runnable">
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
</div>
<div class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 class="modal-title">Modal title</h4>
      </div>
      <div class="modal-body">
        <p>One fine body…</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<script type="text/javascript">
$(function(){
    $('.source-code').each(function(index){
        var $section = $(this);
        var code = $(this).html().replace('<!--', '').replace('-->', '');
        
        // Code preview
        var $codePreview = $('<pre class="prettyprint lang-javascript"></pre>');
        $codePreview.text(code);
        $section.html($codePreview);
        
        // Run code
        if($section.hasClass('runnable')){
            var $button = $('<button class="btn btn-primary">Run the code</button>');
            $button.on('click', {code: code}, function(event){
                console.log(event.data.code);
                eval(event.data.code);
            });
            $button.insertAfter($section);
            $('<div class="clearfix" style="margin-bottom: 10px;"></div>').insertAfter($button);
        }
    });
});
</script>


<!--
    BootstrapDialog.DEFAULT_TEXTS[BootstrapDialog.TYPE_DEFAULT] = 'Information';
    BootstrapDialog.DEFAULT_TEXTS[BootstrapDialog.TYPE_INFO] = 'Information';
    BootstrapDialog.DEFAULT_TEXTS[BootstrapDialog.TYPE_PRIMARY] = 'Information';
    BootstrapDialog.DEFAULT_TEXTS[BootstrapDialog.TYPE_SUCCESS] = 'Success';
    BootstrapDialog.DEFAULT_TEXTS[BootstrapDialog.TYPE_WARNING] = 'Warning';
    BootstrapDialog.DEFAULT_TEXTS[BootstrapDialog.TYPE_DANGER] = 'Danger';
    BootstrapDialog.DEFAULT_TEXTS['OK'] = 'OK';
    BootstrapDialog.DEFAULT_TEXTS['CANCEL'] = 'Cancel';
    BootstrapDialog.DEFAULT_TEXTS['CONFIRM'] = 'Confirmation';
-->