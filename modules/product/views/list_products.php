<h3>Listing des articles</h3>

<table class="table table-striped">

    <thead>
    <tr>
        <th>id</th>
        <th>name</th>
        <th>quantity</th>
        <th>category</th>
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
                <?php echo $myarticle['id_category']; ?>
            </td>
            <td>
                <button type="submit" class="btn btn-success"><a
                        href="index.php?action=viewProduct&id=<?php echo $myarticle['id']; ?>">details</a></button>
            </td>
        </tr>
    <?php } ?>

</table>
