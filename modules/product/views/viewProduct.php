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
            <hr>
            <h4>Write a new comment</h4>

            <form action="index.php?module=product&amp;action=comment&amp;id_product=<?php echo $product['id']; ?>" method="post">
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" id="title" placeholder="title" name="title">
                </div>
                <div class="form-group">
                    <label for="author">Author</label>
                    <input type="text" class="form-control" id="author" placeholder="author" name="author">
                </div>
                <label for="comment">Comment</label>
                <textarea class="form-control" rows="3" id="comment" placeholder="Write a comment..."
                          name="comment"></textarea><br>

                <label for="rating">Finally give a mark</label>
                <div class="rating">
                    <span><input type="radio" name="rating" id="str5" value="5"><label for="str5"></label></span>
                    <span><input type="radio" name="rating" id="str4" value="4"><label for="str4"></label></span>
                    <span><input type="radio" name="rating" id="str3" value="3"><label for="str3"></label></span>
                    <span><input type="radio" name="rating" id="str2" value="2"><label for="str2"></label></span>
                    <span><input type="radio" name="rating" id="str1" value="1"><label for="str1"></label></span>
                </div>

                <button style="float: right;" type="submit" class="btn btn-default">Give your opinion</button>
            </form>

        </div>
    </div>
</div>
