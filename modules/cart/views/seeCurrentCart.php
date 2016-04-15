<h2>Your shopping cart</h2>

<?php //$myCart->display(); ?>

<div style="overflow-x:auto;">
    <table class="table table-striped">

        <thead>
        <tr>
            <th>Name</th>
            <th>Picture</th>
            <th>Quantity</th>
            <th>Price</th>
            <th>Action</th>
        </tr>
        </thead>

        <?php if (!empty($_SESSION['cart_item'])) {
            foreach ($_SESSION['cart_item'] as $item) { ?>
                <tr>
                    <td><?php echo $item['name']; ?>
                    </td>
                    <td><img src="/ecommerce/images/<?php echo $item['picture']; ?>"
                             alt="picture product" width="100px"></td>
                    <td><?php echo $item['quantity']; ?>
                    </td>
                    <td><?php echo $item['price'] . ' $'; ?>
                    </td>
                    <td>
                        <a href="index.php?module=cart&amp;action=addToCart&amp;id_product=<?php echo $item['id']; ?>&amp;function=remove">
                            <button type="submit" class="btn btn-success">Remove</button>
                        </a>
                        <a href="index.php?module=cart&amp;action=addToCart&amp;function=unset">
                            <button type="submit" class="btn btn-success">Unset Cart</button>
                        </a>
                    </td>
                </tr>
            <?php }
        } else { ?>
            <p>You're cart is eventually empty !!!</p>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
        <?php } ?>

    </table>
</div>