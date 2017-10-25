 <div class='col-md-12' style="height: 345px;">
<?php

if (isset($product)) {
  $product->img = $product->img ? $product->img : PUBLIC_PATH."img/sorry-image-not-available.png";
  $product->nombre = ucfirst(strtolower($product->nombre));
  echo "<div class='col-md-3'></div>
        <div class='col-md-6' style='text-align:center;'>
          <div class='thumbnail'>
            <img src='$product->img' alt='...'>
            <div class='caption'>
              <strong> $product->nombre</strong>
              <p> $product->precio </p>
            </div>
          </div>
        </div>
        <div class='col-md-3'></div>";
}else{
      while ($result = $products->fetch()){
        $result = ((object)$result);

        echo '<a href="'.PUBLIC_PATH.'index/product/'.$result->codigo.'">';
        $result->img = $result->img ? $result->img : PUBLIC_PATH."img/sorry-image-not-available.png";
        $result->nombre = ucfirst(strtolower($result->nombre));
?>
        <div class='col-md-3'>
          <div class='thumbnail'>
            <img src=<?=$result->img?> alt='...'>
            <div class='caption'>
              <strong> <?=$result->nombre ?> </strong>
              <p> <?=$result->precio ?> </p>
            </div>
          </div>
        </div>
        </a>
<?php
    }
  }
    ?>
</div>