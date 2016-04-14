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

        <?php if (!empty($itemArray)) {
            foreach ($itemArray as $item) { var_dump($_SESSION['cart_item'])?>

                <tr>
                    <td><?php echo $item['name']; ?>
                    </td>
                    <td><img src="/ecommerce/images/<?php echo $item['picture']; ?>"
                             alt="picture product" width="100px"></td>
                    <td><?php echo $item['quantity']; ?>
                    </td>
                    <td><?php echo $item['price']; ?>
                    </td>
                    <td>
                        <button type="submit" class="btn btn-success">Buy</button>
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