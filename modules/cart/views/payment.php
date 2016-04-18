<h2>SUMMARY OF MY ORDER</h2>

<table class="table table-hover">

    <thead>
    <tr>
        <th>Name</th>
        <th>Picture</th>
        <th>Quantity</th>
        <th>Price</th>
    </tr>
    </thead>

    <?php foreach ($_SESSION['cart_item'] as $item) { ?>
        <tr>
            <td><?php echo $item['name']; ?>
            </td>
            <td><img src="/ecommerce/images/<?php echo $item['picture']; ?>"
                     alt="picture product" width="100px"></td>
            <td><?php echo '<span class="quantity">' . $item['quantity'] . '</span>'; ?>
            </td>
            <td><?php echo '<span class="price">' . $item['price'] . '</span>' . ' $'; ?>
            </td>

        </tr>
    <?php } ?>

</table>
<div style="text-align: right;" class="sum">
    <p><b>Excl. Tax : <input type="text" id="ht" disabled></b></p>
    <p><b>V.A.T : <input type="text" id="vat" disabled></b></p>
    <p><b>Incl. Tax : <input type="text" id="ttc" disabled></b></p>
    <p><b>Freight charges : <input type="text" id="freight_charges" disabled></b></p>
    <p><b>Total to pay : <input type="text" id="toPay" disabled></b></p>
</div>

<form style="text-align: right; action="" method="POST">
    <script
        src="https://checkout.stripe.com/checkout.js" class="stripe-button"
        data-key="pk_test_F4sqLylwCHefg6YreCWKnfEk"
        data-amount="2000"
        data-name="Demo Site"
        data-description="2 widgets ($20.00)"
        data-image="/128x128.png"
        data-locale="auto">
    </script>
</form>

<!--<form action="" method="POST" id="payment-form">-->
<!--    <span class="payment-errors"></span>-->
<!---->
<!--    <div class="form-row">-->
<!--        <label>-->
<!--            <span>Card Number</span>-->
<!--            <input type="text" size="20" data-stripe="number"/>-->
<!--        </label>-->
<!--    </div>-->
<!---->
<!--    <div class="form-row">-->
<!--        <label>-->
<!--            <span>CVC</span>-->
<!--            <input type="text" size="4" data-stripe="cvc"/>-->
<!--        </label>-->
<!--    </div>-->
<!---->
<!--    <div class="form-row">-->
<!--        <label>-->
<!--            <span>Expiration (MM/YYYY)</span>-->
<!--            <input type="text" size="2" data-stripe="exp-month"/>-->
<!--        </label>-->
<!--        <span> / </span>-->
<!--        <input type="text" size="4" data-stripe="exp-year"/>-->
<!--    </div>-->
<!---->
<!--    <button type="submit">Submit Payment</button>-->
<!--</form>-->