<div class="container-fluid">
    <div class="row">
        <div class="col-lg-6 col-sm-12 col-xs-12">
            <h3>Add a product to be sold</h3>

            <form class="form-group" method="post">
                <div class="form-group">
                    <label for="name">Product name</label>
                    <input type="text" class="form-control" id="name" placeholder="Product name" name="product_name">
                </div>
                <div class="form-group">
                    <label for="quantity">Quantity</label>
                    <input type="text" class="form-control" id="quantity" placeholder="quantity" name="quantity">
                </div>
                <div class="form-group">
                    <label for="price">Price ($)</label>
                    <input type="number" class="form-control" id="price" placeholder="price" name="price">
                </div>
                <div class="form-group">
                    <label for="category">Category</label>
                    <select class="form-control" id="category" name="category">
                        <?php foreach ($cat as $option) {
                            echo '<option>' . $option[0] . " - " . $option[1] . '</option>';
                        } ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="InputFile">Product picture</label>
                    <input type="file" id="InputFile" name="picture">
                </div>
                <div class="form-group">
                    <label for="description">Product description</label>
                    <textarea class="form-control" name="description" id="description" rows="3">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Enim laborum maxime molestiae qui voluptatem. Aliquid fugiat in ipsam repudiandae. Autem cum delectus, dolor dolorem eaque incidunt magnam quae reiciendis repudiandae?</textarea>
                </div>

                <button type="submit" class="btn">Submit</button>
            </form>
        </div>

        <div class="col-lg-6 col-sm-12 col-xs-1">
            <h3>Listing of all the products available</h3>

            <div style="overflow-x:auto;">
                <table class="table table-hover">

                    <thead>
                    <tr>
                        <th>id</th>
                        <th>name</th>
                        <th>quantity</th>
                        <th>category</th>
                        <th>Delete</th>
                    </tr>
                    </thead>

                    <?php foreach ($allProducts as $myarticle) { ?>
                        <tr>
                            <td><?php echo $myarticle['id']; ?></td>
                            <td><?php echo $myarticle['name']; ?></td>
                            <td><?php echo $myarticle['quantity']; ?></td>
                            <td><?php echo $cat[($myarticle['id_category'] - 1)][1]; ?></td>
                            <td><a href="index.php?module=backOffice&action="><img class="btn btn-danger" src="/ecommerce/images/delete.png" alt="bin" width="35%"></a></td>
                        </tr>
                    <?php } ?>
                </table>
            </div>
        </div>
    </div>
</div>



