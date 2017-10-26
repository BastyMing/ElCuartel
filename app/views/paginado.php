<?php
    $pagei = $page-4<1 ? 1 : $page-4;
    $fin = $page+6>$cpages ? $cpages : $page+6;
    $pag = PUBLIC_PATH.'index/1';
    echo "<div class='col-md-12' id='pag'>
          <div class='text-center'><nav><ul class='pagination'><li class='disabled hidden-xs'><span><span aria-hidden='true'>P&aacute;gina $page de $cpages</span></span></li><li><a href='$pag' aria-label='Next'>&laquo;<span class='hidden-xs'> Primera</span></a></li>";
    for($i=$pagei;$i < $page;$i++){
    	$pag = PUBLIC_PATH.'index/'.$i;
    	echo '<li><a href="'.$pag.'">'.$i.'</a></li>';
    };
    echo "<li class='active'><span> $page <span class='sr-only'>(current)</span></span></li>";
    for ($i=$page+1; $i<=$fin; $i++) {
        $pag = PUBLIC_PATH.'index/'.$i;
        echo '<li><a href="'.$pag.'">'.$i.'</a></li>';
        //echo '<a href="'.$pag.'" >'.$i.'</a> | ';
    };
    $pag = PUBLIC_PATH.'index/'.$fin;
    echo "<li><a href='".$cpages."' aria-label='Last'><span class='hidden-xs'>&Uacute;ltima </span>&raquo;</a></li></ul></nav></div>";
/*


<li><a href='?pagina=".$pagina+1."' aria-label='Next'><span class='hidden-xs'>Siguiente </span>&rsaquo;</a></li>
 */