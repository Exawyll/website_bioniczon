<h1>Welcome <?php echo $_SESSION['firstname'] . ' ' . $_SESSION['lastname']; ?> in your personal space</h1>
<br>
<p>This space is dedicated to you with bioniczon.fr, you can manage your addresses, see all your
    orders and update your profile.</p>

<div ng-app="store">

    <!--  Products Container  -->
    <div class="list-group" ng-controller="StoreController as store">
        <!--  Product Container  -->
        <div class="list-group-item">

            <!-- Tabs Go Here -->
            <section ng-controller="TabController as tab">
                <ul class="nav nav-pills">
                    <li ng-class="{ active:tab.isSet(1) }">
                        <a href ng-click="tab.setTab(1)">Personal information</a>
                    </li>
                    <li ng-class="{ active:tab.isSet(2) }">
                        <a href ng-click="tab.setTab(2)">Addresses</a>
                    </li>
                    <li ng-class="{ active:tab.isSet(3) }">
                        <a href ng-click="tab.setTab(3)">Orders</a>
                    </li>
                </ul>

                <!--  Description Tab's Content  -->
                <div ng-show="tab.isSet(1)">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-5">

                                <form method="post" action="index.php?module=backOffice&action=profile">
                                    <div class="form-group">
                                        <label for="firstname">Firstname</label>
                                        <input type="text" class="form-control" id="firstname" name="firstname"
                                               value="<?php echo $user['firstname']; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="lastname">Lastname</label>
                                        <input type="text" class="form-control" id="lastname" name="lastname"
                                               value="<?php echo $user['lastname']; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="Email">Email address</label>
                                        <input type="email" class="form-control" id="email" name="email"
                                               value="<?php echo $user['email']; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="login">Login</label>
                                        <input type="text" class="form-control" id="login" name="login"
                                               value="<?php echo $user['login']; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="password">Password</label>
                                        <input type="password" class="form-control" id="password" name="password">
                                    </div>
                                    <div class="form-group">
                                        <label for="checkPass">Confirm password</label>
                                        <input type="password" class="form-control" id="checkPass" name="checkPass">
                                    </div>

                                    <button type="submit" class="btn btn-info">Save</button>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>


                <!--  Spec Tab's Content  -->
                <div ng-show="tab.isSet(2)">

                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-6 col-sm-6 col-xs-12">

                                <h2>Your delivery address(es)</h2>

                                <?php if (!empty($userAddress)) { ?>

                                    <?php foreach ($userAddress as $address) { ?>

                                        <b><?php echo $address['firstname'] . ' ' . $address['lastname']; ?></b>
                                        <br>
                                        <?php echo $address['num'] . ' ' . $address['streetName']; ?><br>
                                        <?php echo $address['postalCode'] . ' ' . $address['city']; ?><br>

                                    <?php }
                                } else { ?>
                                    <p>You don't have registered delivery addresses yet !</p>
                                <?php } ?>
                            </div>

                            <div class="col-lg-6 col-sm-6 col-xs-12">
                                <h2>Your billing address(es)</h2>
                                <?php if (!empty($userAddress)) { ?>
                                    <?php foreach ($userAddress as $address) { ?>

                                        <b><?php echo $address['firstname'] . ' ' . $address['lastname']; ?></b>
                                        <br>
                                        <?php echo $address['num'] . ' ' . $address['streetName']; ?><br>
                                        <?php echo $address['postalCode'] . ' ' . $address['city']; ?><br>

                                    <?php }
                                } else { ?>
                                    <p>You don't have registered billing addresses yet !</p>
                                <?php } ?>
                            </div>

                        </div>
                    </div>

                </div>

                <!--  Review Tab's Content  -->
                <div ng-show="tab.isSet(3)">
                    <div class="container-fluid">
                        <div class="row">

                            <h2>Your different orders on BionicZon</h2>

                            <?php if (!empty($userOrder)) { ?>
                                <table>
                                    <thead>
                                    <tr>
                                        <th>Date Order</th>
                                        <th>Product Name</th>
                                        <th>Price</th>
                                        <th>Quantity</th>
                                        <th>Date Delivery</th>
                                    </tr>
                                    </thead>
                                    <tr>
                                        <?php foreach ($userOrder as $order) { ?>

                                            <td><?php echo $order['dateOrder']; ?></td>
                                            <td><?php echo $order['nameProduct']; ?></td>
                                            <td><?php echo round($order['price'], 2); ?></td>
                                            <td><?php echo $order['quantity']; ?></td>
                                            <td><?php echo $order['dateDelivery']; ?></td>

                                        <?php } ?>
                                    </tr>
                                </table>

                            <?php } else { ?>
                                <p>You did not order anything yet</p>
                            <?php } ?>
                        </div>
                    </div>
                </div>
        </div>
    </div>
</div>