<?php
    $pagei = $page-4<1 ? 1 : $page-4;
    $fin = $page+6>$cpages ? $cpages : $page+6;
    $pag = SUB_FOLDER.'index/1';
    echo "<div class='col-md-12' id='pag'>
          <div class='text-center'><nav><ul class='pagination'><li class='disabled hidden-xs'><span><span aria-hidden='true'>P&aacute;gina $page de $cpages</span></span></li><li><a href='$pag' aria-label='Next'>&laquo;<span class='hidden-xs'> Primera</span></a></li>";
    for($i=$pagei;$i < $fin;$i++){
        if($i!=$page){
    	   $pag = SUB_FOLDER.'index/'.$i;
    	   echo '<li><a href="'.$pag.'">'.$i.'</a></li>';
        }
        else{
            echo "<li class='active'><span> $page <span class='sr-only'>(current)</span></span></li>";
        }
    };
    $pag = SUB_FOLDER.'index/'.$fin;
    echo "<li><a href='".$cpages."' aria-label='Last'><span class='hidden-xs'>&Uacute;ltima </span>&raquo;</a></li></ul></nav></div><br><br><br>";
/*


<li><a href='?pagina=".$pagina+1."' aria-label='Next'><span class='hidden-xs'>Siguiente </span>&rsaquo;</a></li>
 */