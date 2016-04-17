<h2>Your address(es)</h2>

<div class="container-fluid">
    <div class="row">

        <div class="col-lg-6">
            <?php foreach ($userAddress as $address) { ?>

                <p><b><?php echo $address['firstname'] . ' ' . $address['lastname']; ?></b></p>
                <p><?php echo $address['num'] . ' ' . $address['streetName']; ?></p>
                <p><?php echo $address['postalCode'] . ' ' . $address['city']; ?></p>

            <?php } ?>
        </div>

        <div class="col-lg-6">

            <?php echo $formAddress; ?>

        </div>

    </div>
</div>