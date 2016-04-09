<div class="products container-fluid">

    <h2 class="products__title">Articles</h2>

    <?php foreach ($allProducts as $product) {

        echo '<div class="col-xs-12 col-sm-6 col-md-4" >';
        echo '<div class="product" >';

        echo '<div class="product__transform" >';
        echo '<img src = "' . 'images/' . $product[4] . '" alt = "product" width = "100%" >';
        echo '</div >';

        echo '<h3 class="product__title" >' . $product[1] . '</h3 >';

        echo '<p class="product__description" >Lorem ipsum dolor sit amet, consectetur .</p >';

        echo '</div >';
        echo '</div >';
    } ?>
</div>