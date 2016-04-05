<?php
require_once($_SERVER['DOCUMENT_ROOT'] . 'projet_eCommerce/views/header.php');
?>

    <form action="" method="post">
        <div class="form-group">
            <label for="name">Product name</label>
            <input type="text" class="form-control" id="name" placeholder="Product name" name="name">
        </div>
        <div class="form-group">
            <label for="quantity">Quantity</label>
            <input type="text" class="form-control" id="quantity" placeholder="quantity" name="quantity">
        </div>
        <div class="form-group">
            <label for="category">Category</label>
            <input type="text" class="form-control" id="category" placeholder="category" name="category">
        </div>

        <button type="submit" class="btn btn-success">Submit</button>
    </form>

<?php
require_once($_SERVER['DOCUMENT_ROOT'] . 'projet_eCommerce/views/footer.php');
?>