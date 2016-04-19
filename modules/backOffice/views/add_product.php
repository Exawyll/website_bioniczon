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
        <label for="category">Category</label>
        <select class="form-control" name="category">
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
        <label for="Text">Product description</label>
        <textarea class="form-control" id="exampleTextarea" rows="3">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Enim laborum maxime molestiae qui voluptatem. Aliquid fugiat in ipsam repudiandae. Autem cum delectus, dolor dolorem eaque incidunt magnam quae reiciendis repudiandae?</textarea>
    </div>

    <button type="submit" class="btn">Submit</button>
</form>

