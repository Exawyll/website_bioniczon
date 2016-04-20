<h1>Products > Faces > <?php echo $product[1]; ?></h1>

<div class="container-fluid">
    <div class="row">
        <div class="col-xs-12 col-sm-6 col-md-6">
            <?php
            echo '<img src = "' . 'images/' . $product['picture'] . '" alt = "product" width = "100%" >';
            ?>
        </div>

        <div class="col-xs-12 col-sm-6 col-md-6">

            <div ng-app="store">

                <!--  Products Container  -->
                <div class="list-group" ng-controller="StoreController as store">
                    <!--  Product Container  -->
                    <div class="list-group-item" ng-controller="">

                        <!-- Tabs Go Here -->
                        <section ng-controller="TabController as tab">
                            <ul class="nav nav-pills">
                                <li ng-class="{ active:tab.isSet(1) }">
                                    <a href ng-click="tab.setTab(1)">Description</a>
                                </li>
                                <li ng-class="{ active:tab.isSet(2) }">
                                    <a href ng-click="tab.setTab(2)">Specs</a>
                                </li>
                                <li ng-class="{ active:tab.isSet(3) }">
                                    <a href ng-click="tab.setTab(3)">Reviews</a>
                                </li>
                            </ul>

                            <!--  Description Tab's Content  -->
                            <div ng-show="tab.isSet(1)">
                                <h4>Description</h4>
                                <blockquote>{{gem.description}}</blockquote>
                            </div>

                            <!--  Spec Tab's Content  -->
                            <div ng-show="tab.isSet(2)">

                                <!--  Spec Tab's Content  -->
                                <h4>Specs</h4>
                                <ul class="list-unstyled">
                                    <li>
                                        <strong>Name</strong>
                                        : {{product.name}}
                                    </li>
                                    <li>
                                        <strong>Quantity</strong>
                                        : {{product.quantity}}
                                    </li>
                                    <li>
                                        <strong>Price</strong>
                                        : {{product.price}}
                                    </li>
                                </ul>

                            </div>

                            <!--  Review Tab's Content  -->
                            <div ng-show="tab.isSet(3)">

                                <!--  Product Reviews List -->
                                <ul>
                                    <h4>Reviews</h4>
                                    <li ng-repeat="review in product.reviews">
                                        <blockquote>
                                            <strong>{{review.stars}} Stars</strong>
                                            {{review.body}}
                                            <cite class="clearfix">—{{review.author}}</cite>
                                        </blockquote>
                                    </li>
                                </ul>

                                <!--  Review Form -->
                                <form name="reviewForm" ng-controller="ReviewController as reviewCtrl"
                                      ng-submit="reviewCtrl.addReview(product)">

                                    <!--  Live Preview -->
                                    <blockquote>
                                        <strong>{{reviewCtrl.review.stars}} Stars</strong>
                                        {{reviewCtrl.review.body}}
                                        <cite class="clearfix">—{{reviewCtrl.review.author}}</cite>
                                    </blockquote>

                                    <!--  Review Form -->
                                    <h4>Submit a Review</h4>
                                    <fieldset class="form-group">
                                        <select ng-model="reviewCtrl.review.stars" class="form-control"
                                                ng-options="stars for stars in [5,4,3,2,1]" title="Stars">
                                            <option value>Rate the Product</option>
                                        </select>
                                    </fieldset>
                                    <fieldset class="form-group">
                                <textarea ng-model="reviewCtrl.review.body" class="form-control"
                                          placeholder="Write a short review of the product..."
                                          title="Review"></textarea>
                                    </fieldset>
                                    <fieldset class="form-group">
                                        <input ng-model="reviewCtrl.review.author" type="email" class="form-control"
                                               placeholder="jimmyDean@example.org" title="Email"/>
                                    </fieldset>
                                    <fieldset class="form-group">
                                        <input type="submit" class="btn btn-primary pull-right" value="Submit Review"/>
                                    </fieldset>
                                </form>


                            </div>

                        </section>


                    </div>

                </div>

                <!--<p><?php /*echo $product['description']; */ ?></p>

                <h2><?php /*echo $product['price']; */ ?> $</h2>

                <?php /*if ($product['quantity'] > 0) { */ ?>

                    <h3>Available now : <?php /*echo $product['quantity']; */ ?> in stock</h3>
                    <a href="index.php?module=cart&amp;action=addToCart&amp;id_product=<?php /*echo $product['id']; */ ?>&amp;function=add">
                        <button class="btn btn-success">Add to cart</button>
                    </a>

                <?php /*} else { */ ?>

                    <h3>Not available now : <?php /*echo $product['quantity']; */ ?> in stock</h3>
                    <a href="index.php?module=cart&amp;action=addToCart&amp;id_product=<?php /*echo $product['id']; */ ?>&amp;function=add">
                        <button class="btn btn-danger" disabled>Add to cart</button>
                    </a>

                <?php /*} */ ?>
                <hr>
                <h4>Write a new comment</h4>

                <form action="index.php?module=product&amp;action=comment&amp;id_product=<?php /*echo $product['id']; */ ?>"
                      method="post">
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" id="title" placeholder="title" name="title">
                    </div>
                    <div class="form-group">
                        <label for="author">Author</label>
                        <input type="text" class="form-control" id="author" placeholder="author" name="author">
                    </div>
                    <label for="comment">Comment</label>
                <textarea class="form-control" rows="3" id="comment" placeholder="Write a comment..."
                          name="comment"></textarea><br>

                    <label for="rating">Finally give a mark</label>
                    <div class="rating">
                        <span><input type="radio" name="rating" id="str5" value="5"><label for="str5"></label></span>
                        <span><input type="radio" name="rating" id="str4" value="4"><label for="str4"></label></span>
                        <span><input type="radio" name="rating" id="str3" value="3"><label for="str3"></label></span>
                        <span><input type="radio" name="rating" id="str2" value="2"><label for="str2"></label></span>
                        <span><input type="radio" name="rating" id="str1" value="1"><label for="str1"></label></span>
                    </div>

                    <button style="float: right;" type="submit" class="btn btn-default">Give your opinion</button>
                </form>
            </div>-->
            </div>
        </div>
    </div>
