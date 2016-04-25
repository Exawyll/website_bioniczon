<h2>Your shopping cart</h2>

<div style="overflow-x:auto;">

    <table class="table table-hover">

        <thead>
        <tr>
            <th>Name</th>
            <th>Picture</th>
            <th>Quantity</th>
            <th>Price</th>
            <th>Action</th>
        </tr>
        </thead>

        <?php if (isset($_SESSION['cart_item'])) {
            foreach ($_SESSION['cart_item'] as $item) { ?>
                <tr>
                    <td><?php echo $item['name']; ?>
                    </td>
                    <td><img src="/ecommerce/images/<?php echo $item['picture']; ?>"
                             alt="picture product" width="100px"></td>
                    <td>
                            <a href="index.php?module=cart&action=addToCart&id_product=<?php echo $item['id']; ?>&function=remove"><button>-</button></a>
                            <?php echo '<span class="quantity">' . $item['quantity'] . '</span>'; ?>
                            <a href="index.php?module=cart&action=addToCart&id_product=<?php echo $item['id']; ?>&function=add"><button>+</button></a>
                    </td>
                    <td><?php echo '<span class="price">' . $item['price'] . '</span>' . ' $'; ?>
                    </td>
                    <td>
                        <a href="index.php?module=cart&amp;action=addToCart&amp;id_product=<?php echo $item['id']; ?>&amp;function=remove">
                            <button type="submit" class="btn btn-danger"><img src="/ecommerce/images/delete.png"
                                                                              alt="bin"></button>
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
                <td></td>
            </tr>

        <?php } ?>

    </table>

    <p style="text-align: center; font-size: 30px;"><b>Total of your shopping cart : <input type="text" id="totalCart" disabled></b></p>

    <div style="float: right">
        <?php if (!empty($_SESSION['cart_item'])) { ?>
            <a href="index.php?module=cart&amp;action=orderTunnel&amp;function=address">
                <button class="btn btn-primary">Order <img src="/ecommerce/images/order.png" alt="order"></button>
            </a>
        <?php } else { ?>
                <button class="btn btn-danger cart">Order <img src="/ecommerce/images/order.png" alt="order" disabled>
                </button>
        <?php } ?>


    </div>


</div>

<script src="js/cart.js"></script>