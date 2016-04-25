<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="UTF-8"/>

    <title>BionicZon</title>

    <link href="style/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="style/global.css" type="text/css"/>
    <link rel="stylesheet" href="style/header.css" type="text/css"/>
    <link rel="stylesheet" href="style/product.css" type="text/css"/>
    <link rel="stylesheet" href="style/owlcarousel/assets/owl.carousel.css">
    <link rel="stylesheet" href="style/owlcarousel/assets/owl.theme.default.min.css">
    <script type="text/javascript" src="js/angular.min.js"></script>
    <script type="text/javascript" src="js/app.js"></script>
    <!--    <link rel="stylesheet" href="style/accueil.css" type="text/css"/>-->

</head>

<body style="margin: 0 auto">
<div class="container">
    <div class="row">
        <div class="col-lg-12 col-xs-12">
            <div class="header">
                <header>
                    <h1>Welcome to BionicZon.fr</h1>

                    <div class="container-fluid">
                        <div class="row">
                            <nav class="header__nav">

                                <div class="header__nav--link1 col-lg-6" style="text-align: left">
                                    <ul class="menu">
                                        <li><a href="index.php">Home</a> |</li>

                                        <li><a href="index.php?module=product&amp;action=see_product">Articles</a>
                                            <ul class="menu submenu">
                                                <li>
                                                    > <a
                                                        href="index.php?module=product&amp;action=see_product&amp;id_category=4">Faces</a>
                                                </li>
                                                <li>
                                                    | <a
                                                        href="index.php?module=product&amp;action=see_product&amp;id_category=1">Arm</a>
                                                </li>
                                                <li>
                                                    | <a
                                                        href="index.php?module=product&amp;action=see_product&amp;id_category=3">Hands</a>
                                                </li>
                                                <li>
                                                    | <a
                                                        href="index.php?module=product&amp;action=see_product&amp;id_category=2">Legs</a>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>

                                </div>

                                <div class="header__nav--link2 col-lg-6" style="text-align: right">

                                    <?php if (userSignedIn()) { ?>
                                        <?php if (adminUser()) { ?>
                                            <a href="index.php?module=backOffice&amp;action=profile&amp;id="<?php echo $_SESSION['id']; ?>>Profile</a> |
                                            <a href="index.php?module=membres&amp;action=disconnection">Logout</a>
                                        <?php } else { ?>
                                            <a href="index.php?module=backOffice&amp;action=profile&amp;id="<?php echo $_SESSION['id']; ?>><?php echo 'Hi, ' . $_SESSION['login']; ?></a> |
                                            <a href="index.php?module=membres&amp;action=disconnection">Logout</a>
                                        <?php }
                                    } else { ?>
                                        <a href="index.php?module=membres&amp;action=sign_in">Sign In</a> |
                                        <a href="index.php?module=membres&amp;action=register">Sign Up</a><?php } ?> |
                                    <a href="index.php?module=cart&amp;action=addToCart">My cart <img
                                            src="images/cart.png"
                                            alt="icon for the cart"/><?php if (!empty($_SESSION['cart_item'])) {
                                            $total = 0;
                                            foreach ($_SESSION['cart_item'] as $item) {
                                                $total += intval($item['quantity']);
                                            }
                                            echo $total;
                                        } ?></a>
                                </div>

                                <?php if (adminUser()) { ?>
                                    <div class="admin">
                                        <p>Admin space:</p>
                                        <a href="index.php?module=backOffice&amp;action=add_product">Add products</a> |
                                        <a href="index.php?module=backOffice&amp;action=listUser">list of users</a>
                                    </div>

                                <?php } ?>

                            </nav>
                        </div>

                    </div>

                </header>
            </div>

            <!--            <div class="container-fluid">
                <div class="row">

                    <?php /*if (isset($_GET['module']) && isset($_GET['action']) && $_GET['module'] == 'backOffice') { */ ?>

                        <div class="col-lg-3 col-md-4 col-sm-12 col-xs-12">

                            <?php /*require_once 'global/menu.php'; */ ?>

                        </div>

                        <div class="col-lg-9 col-md-8 col-sm-12 col-xs-12">

                            --><?php /*} */ ?>

            <main id="centre" class="robot">










