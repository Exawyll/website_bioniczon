<?php
require_once ($_SERVER['DOCUMENT_ROOT'] . 'projet_eCommerce/views/header.php');
?>

<div class="container">
    <h1>Listing des articles</h1>
    <table class="table table-striped">
        <thead>
        <tr>
            <th>id</th>
            <th>name</th>
            <th>quantity</th>
            <th>category</th>
        </tr>
        </thead>

        <?php foreach ($returnedProduct as $monarticle) { ?>
            <tr>
                <td><?php echo $monarticle['id']; ?></td>
                <td><?php echo $monarticle['name']; ?>
                </td>
                <td><?php echo $monarticle['quantity']; ?>
                </td>
                <td>
                    <?php echo $monarticle['category']; ?>
                </td>
                <td>
                    <button type="submit" class="btn btn-success"><a
                            href="index.php?action=viewProduct&id=<?php echo $monarticle['id']; ?>">details</a></button>
                </td>
            </tr>
        <?php } ?>
    </table>
</div>

<?php
require_once ($_SERVER['DOCUMENT_ROOT'] . 'projet_eCommerce/views/footer.php');
?>