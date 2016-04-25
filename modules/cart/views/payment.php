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

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-4">
            <h3>Delivery Address</h3>
            <p><b><?php echo $addressDelivery['firstname'] . ' ' . $addressDelivery['lastname']; ?></b></p>
            <p><?php echo $addressDelivery['num'] . ' ' . $addressDelivery['streetName']; ?></p>
            <?php echo $addressDelivery['postalCode'] . ' ' . $addressDelivery['city']; ?>
        </div>

        <div class="col-lg-4">
            <h3>Billing Address</h3>
            <p><b><?php echo $billingAddress['firstname'] . ' ' . $billingAddress['lastname']; ?></b></p>
            <p><?php echo $billingAddress['num'] . ' ' . $billingAddress['streetName']; ?></p>
            <?php echo $billingAddress['postalCode'] . ' ' . $billingAddress['city']; ?>
        </div>

        <div class="col-lg-4">
            <div style="text-align: right;" class="sum">
                <p><b>Excl. Tax : <input type="text" id="ht"
                                         value="$ <?php echo round($_SESSION['toPay'] - (0.196 * $_SESSION['toPay']), 2); ?>"
                                         disabled></b></p>
                <p><b>V.A.T : <input type="text" id="vat" value="$ <?php echo round((0.196 * $_SESSION['toPay']), 2); ?>"
                                     disabled></b></p>
                <p><b>Incl. Tax : <input type="text" id="ttc" value="$ <?php echo round($_SESSION['toPay'], 2); ?>" disabled></b>
                </p>
                <p><b>Freight charges : <input type="text" id="freight_charges"
                                               value="$ <?php echo round((0.10 * $_SESSION['toPay']), 2); ?>" disabled></b></p>
                <p><b>Total to pay : <input type="text" id="toPay" value="$ <?php echo round(($_SESSION['toPay'] + (0.10 * $_SESSION['toPay'])), 2); ?>" disabled></b></p>
            </div>
        </div>
    </div>
</div>

<form action="index.php?module=cart&action=orderTunnel&function=order" method="POST" id="payment-form">
    <span class="payment-errors"></span>

    <div class="form-row form-group">
        <label>
            <span>Card Number</span>
            <input type="text" size="20" data-stripe="number"/>
        </label>
    </div>

    <div class="form-row form-group">
        <label>
            <span>CVC</span>
            <input type="text" size="4" data-stripe="cvc"/>
        </label>
    </div>

    <div class="form-row form-group">
        <label>
            <span>Expiration (MM/YYYY)</span>
            <input type="text" size="2" data-stripe="exp-month"/>
        </label>
        <span> / </span>
        <input type="text" size="4" data-stripe="exp-year"/>
    </div>

    <button type="submit btn btn-success">Submit Payment</button>
</form>