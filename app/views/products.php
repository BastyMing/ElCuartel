 <div class='col-md-12' style="height: 345px;">
<?php
if (isset($product)) {
  $product->img = $product->img ? $product->img : PUBLIC_PATH."img/sorry-image-not-available.png";
  $product->nombre = ucfirst(strtolower($product->nombre));
  echo "<div class='col-md-3'></div>
          <div class='col-md-6'>
            <div class='thumbnail'>
                <img src='$product->img' alt='...'>
                <form action='' method='POST' onsubmit='return addProduct(this)'>
                    <div class='caption'>
                        <h3>$product->nombre</h3>
                        <p>$product->precio</p>
                        <p>
                            <input hidden name='id' value='$product->codigo'>
                            <input type='number' name='cantidad' step='1' required>
                            <input class='btn btn-primary' type='submit' name='boton' value='Comprar'>
                        </p>
                    </div>
                </form>
            </div>
          </div>
        <div class='col-md-3'></div>";
  echo "<div id='resultado'></div>";
}
else
{
      while ($result = $products->fetch()){
        $result = ((object)$result);
        $result->img = $result->img ? $result->img : PUBLIC_PATH."img/sorry-image-not-available.png";
        $result->nombre = ucfirst(strtolower($result->nombre));


        echo '<a href="'.PUBLIC_PATH.'product/'.$result->codigo.'">';  ?>

        <div class='col-md-3' style="height: 355px;">
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