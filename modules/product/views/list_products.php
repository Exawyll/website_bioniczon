<br>
<br>
<h3>Listing des articles</h3>

<div style="overflow-x:auto;">
    <table class="table table-striped">

        <thead>
        <tr>
            <th>id</th>
            <th>name</th>
            <th>quantity</th>
            <th>category</th>
            <th>More details</th>
        </tr>
        </thead>

        <?php foreach ($allProducts as $myarticle) { ?>
            <tr>
                <td><?php echo $myarticle['id']; ?></td>
                <td><?php echo $myarticle['name']; ?>
                </td>
                <td><?php echo $myarticle['quantity']; ?>
                </td>
                <td>
                    <?php echo $cat[($myarticle['id_category'] - 1)][1]; ?>
                </td>
                <td>
                    <button type="submit" class="btn btn-success"><a
                            href="index.php?module=product&amp;action=see_product&amp;id=<?php echo $myarticle['id']; ?>">details</a>
                    </button>
                </td>
            </tr>
        <?php } ?>

    </table>
</div>
