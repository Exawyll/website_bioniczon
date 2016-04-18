<div class="container-fluid">
    <div class="row">

        <div class="col-lg-6">

            <h2>New address</h2>
            <?php echo $formAddress; ?>

        </div>

        <div class="col-lg-6">

            <h2>Your delivery address(es)</h2>

            <form method="POST" action="index.php?module=cart&amp;action=orderTunnel&amp;function=payment">
                <?php foreach ($userAddress as $address) { ?>

                    <div class="radio">
                        <label>
                            <input type="radio" name="deliveryAddress" id="optionsRadios1" value="option<?php echo $address['id']; ?>" checked>
                            <b><?php echo $address['firstname'] . ' ' . $address['lastname']; ?></b><br>
                            <?php echo $address['num'] . ' ' . $address['streetName']; ?><br>
                            <?php echo $address['postalCode'] . ' ' . $address['city']; ?><br>
                        </label>
                    </div>

                <?php } ?>

                <h2>Your billing address(es)</h2>

                <?php foreach ($userAddress as $address) { ?>

                    <div class="radio">
                        <label>
                            <input type="radio" name="billingAddress" id="optionsRadios2" value="option<?php echo $address['id']; ?>" checked>
                            <b><?php echo $address['firstname'] . ' ' . $address['lastname']; ?></b><br>
                            <?php echo $address['num'] . ' ' . $address['streetName']; ?><br>
                            <?php echo $address['postalCode'] . ' ' . $address['city']; ?><br>
                        </label>
                    </div>

                <?php } ?>

                <div style="float: right">
<!--                    <a href="index.php?module=cart&amp;action=orderTunnel&amp;function=payment">-->
                        <button type="submit" class="btn btn-primary">Next... <img src="/ecommerce/images/order.png" alt="order"></button>

<!--                    </a>-->
            </form>

        </div>

    </div>

</div>
</div>