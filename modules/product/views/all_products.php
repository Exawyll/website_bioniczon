<div class="products container-fluid">

    <h2 class="products__title">Articles > <?php echo $name ?></h2>

    <div class="row">

        <?php foreach ($allProducts as $product) {

            echo '<div class="col-md-4 col-sm-6 col-xs-12  " >';
            echo '<div class="product" >';
            echo '<a href="index.php?module=product&amp;action=see_product&amp;id_product=' . $product[0] . '">';
            echo '<div class="product__transform" >';
            echo '<img class="product__transform" src = "images/' . $product[4] . '" alt = "product" >';
            echo '</div >';

            echo '<h3 class="product__title" >' . $product[1] . '</a></h3 >';

            echo '<div class="product__title--cart"><a href="index.php?module=cart&amp;action=addToCart&amp;id_product=' . $product[0] . '&amp;function=add"><img src="images/cart.png" alt="icon for the cart" /></a></div>';

            echo '<h2>' . $product[6] . ' $</h2>';

            echo '<p class="product__description" >Lorem ipsum dolor sit amet, consectetur .</p >';

            echo '</div >';
            echo '</div >';
        } ?>


    </div>
</div>