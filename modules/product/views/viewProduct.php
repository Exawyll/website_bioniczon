<h2><?php echo $product[1]; ?></h2>

<div class="container-fluid">
    <div class="row">
        <div class="col-xs-12 col-sm-6 col-md-6">
            <?php
            echo '<img src = "' . 'images/' . $product['picture'] . '" alt = "product" width = "60%" >';
            ?>
        </div>

        <div class="col-xs-12 col-sm-6 col-md-6">

            <div ng-app="store">

                <!--  Products Container  -->
                <div class="list-group" ng-controller="StoreController as store">
                    <!--  Product Container  -->
                    <div class="list-group-item">

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
                                <blockquote>{{store.products.description}}</blockquote>
                            </div>

                            <!--  Spec Tab's Content  -->
                            <div ng-show="tab.isSet(2)">

                                <!--  Spec Tab's Content  -->
                                <h4>Specs</h4>
                                <ul class="list-unstyled">
                                    <li>
                                        <strong>Name</strong>
                                        : {{store.products.name}}
                                    </li>
                                    <li>
                                        <strong>Quantity</strong>
                                        : {{store.products.quantity}}
                                    </li>
                                    <li>
                                        <strong>Price</strong>
                                        : ${{store.products.price}}
                                    </li>
                                </ul>

                            </div>

                            <!--  Review Tab's Content  -->
                            <div ng-show="tab.isSet(3)">

                                <!--  Product Reviews List -->
                                <ul>
                                    <h4>Reviews</h4>
                                    <li ng-repeat="comment in store.products.comment">
                                        <blockquote>
                                            <strong>{{comment.mark}} Stars</strong><br>
                                            <i>Date : {{comment.writtenDate}}</i>
                                            <cite class="clearfix">Comment : {{comment.review}}</cite>
                                            <i>Author</i> : {{comment.author}}

                                        </blockquote>
                                    </li>
                                </ul>

                                <!--  Review Form -->
                                <form method="post" name="reviewForm" ng-controller="ReviewController as reviewCtrl" action="index.php?module=product&action=see_product&id_product=<?php echo $product['id']; ?>">

                                    <!--  Live Preview -->
                                    <blockquote >
                                        {{reviewCtrl.review.body}}
                                        <cite class="clearfix">—{{reviewCtrl.review.author}}</cite>
                                    </blockquote>

                                    <!--  Review Form -->
                                    <h4>Submit a Review</h4>
                                    <fieldset class="form-group">
                                        <label for="mark">Rate the Product</label>

                                        <div id="rating" name="rating" class="rating" ng-model="reviewCtrl.review.stars" ng-options="stars for stars in [5,4,3,2,1]" title="Stars">
                                            <span><input type="radio" name="rating" id="str5" value="5"><label for="str5"></label></span>
                                            <span><input type="radio" name="rating" id="str4" value="4"><label for="str4"></label></span>
                                            <span><input type="radio" name="rating" id="str3" value="3"><label for="str3"></label></span>
                                            <span><input type="radio" name="rating" id="str2" value="2"><label for="str2"></label></span>
                                            <span><input type="radio" name="rating" id="str1" value="1"><label for="str1"></label></span>
                                        </div>

                                    </fieldset>
                                    <fieldset class="form-group">
                                        <label for="comment">Write your comment</label>
                                        <textarea ng-model="reviewCtrl.review.body" class="form-control" placeholder="Write a short review of the product..." title="Review" id="comment" name="comment"></textarea>
                                    </fieldset>
                                    <fieldset class="form-group">
                                        <label for="author">Write your email</label>
                                        <input ng-model="reviewCtrl.review.author" type="email" class="form-control" placeholder="james@example.org" title="Email" id="author" name="author"/>
                                    </fieldset>
                                    <fieldset class="form-group">
                                        <input type="submit" class="btn btn-primary pull-right" value="Submit Review" />
                                    </fieldset>
                                </form>


                            </div>

                            <?php if ($product['quantity'] > 0) { ?>

                                <a href="index.php?module=cart&amp;action=addToCart&amp;id_product=<?php echo $product['id']; ?>&amp;function=add">
                                    <button class="btn btn-success">Add to cart</button>
                                </a>

                            <?php } else { ?>

                                <a href="index.php?module=cart&amp;action=addToCart&amp;id_product=<?php echo $product['id']; ?>&amp;function=add">
                                    <button class="btn btn-danger" disabled>Add to cart</button>
                                </a>

                            <?php } ?>

                        </section>
                    </div>
                </div>