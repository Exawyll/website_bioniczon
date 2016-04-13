<h2>Your shopping cart</h2>

<?php //$myCart->display(); ?>

<div style="overflow-x:auto;">
    <table class="table table-striped">

        <thead>
        <tr>
            <th>Name</th>
            <th>Picture</th>
            <th>Quantity</th>
            <th>Action</th>
        </tr>
        </thead>

        <?php foreach ($myCart->getContent() as $myarticle) { ?>
            <tr>
                <td><?php echo $myarticle['name']; ?>
                </td>
                <td><img src="/ecommerce/images/<?php echo $myarticle['picture']; ?>" alt="picture product" width="100px"></td>
                <td><?php echo 1; ?>
                </td>
                <td>
                    <button type="submit" class="btn btn-success"><a
                            href="index.php?module=product&amp;action=see_product&amp;id=<?php echo $myarticle['id']; ?>">Buy</a>
                    </button>
                </td>
            </tr>
        <?php } ?>

    </table>
</div>