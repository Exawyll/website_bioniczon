<h1><?php echo $product[1]; ?></h1>
<div class="container">
    <div class="row">
        <div class="col-xs-12 col-sm-6 col-md-6">
            <?php
            echo '<img src = "' . 'images/' . $product[4] . '" alt = "product" width = "100%" >';
            ?>
        </div>

        <div class="col-xs-12 col-sm-6 col-md-6">
            <p><?php echo $product[5]; ?></p>
            <button class="btn btn-success">Add to cart</button>
        </div>
    </div>
</div>
