<?php
    $page = $page-4<1 ? 1 : $page-4;
    $fin = $page+8>$cpages ? $cpages : $page+8;
    for ($i=$page; $i<=$fin; $i++) {
        $pag = PUBLIC_PATH.'index/'.$i;


        echo '<a href="'.$pag.'" >'.$i.'</a> | ';
    };