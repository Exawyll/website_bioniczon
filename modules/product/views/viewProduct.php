<h1>Products > Faces > <?php echo $product[1]; ?></h1>

<div class="container-fluid">
    <div class="row">
        <div class="col-xs-12 col-sm-6 col-md-6">
            <?php
            echo '<img src = "' . 'images/' . $product['picture'] . '" alt = "product" width = "100%" >';
            ?>
        </div>

        <div class="col-xs-12 col-sm-6 col-md-6">

            <p><?php echo $product['description']; ?></p>

            <h2><?php echo $product['price']; ?> $</h2>

            <?php if ($product['quantity'] > 0) { ?>

                <h3>Available now : <?php echo $product['quantity']; ?> in stock</h3>
                <a href="index.php?module=cart&amp;action=addToCart&amp;id_product=<?php echo $product['id']; ?>&amp;function=add">
                    <button class="btn btn-success">Add to cart</button>
                </a>

            <?php } else { ?>

                <h3>Not available now : <?php echo $product['quantity']; ?> in stock</h3>
                <a href="index.php?module=cart&amp;action=addToCart&amp;id_product=<?php echo $product['id']; ?>&amp;function=add">
                    <button class="btn btn-danger" disabled>Add to cart</button>
                </a>

            <?php } ?>

        </div>
    </div>
</div>
