<!DOCTYPE html>

<html lang="fr">

<head>

    <meta charset="UTF-8"/>

    <title>BionicZon</title>

    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <link rel="stylesheet" href="style/global.css" type="text/css"/>
    <link rel="stylesheet" href="style/header.css" type="text/css"/>
    <link rel="stylesheet" href="style/product.css" type="text/css"/>
    <link rel="stylesheet" href="style/owlcarousel/assets/owl.carousel.css">
    <link rel="stylesheet" href="style/owlcarousel/assets/owl.theme.default.min.css">
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
                                    <a href="index.php">Home Page</a> |
                                    <a href="index.php?module=product&amp;action=see_product">Everything</a> |
                                    <a href="index.php?module=product&amp;action=see_product&amp;id_category=4">Faces</a>
                                    |
                                    <a href="index.php?module=product&amp;action=see_product&amp;id_category=1">Arm</a>
                                    |
                                    <a href="index.php?module=product&amp;action=see_product&amp;id_category=3">Hands</a>
                                    |
                                    <a href="index.php?module=product&amp;action=see_product&amp;id_category=2">Legs</a>
                                </div>

                                <div class="header__nav--link2 col-lg-6" style="text-align: right">

                                    <?php if (userSignedIn()) { ?>
                                        <?php if (adminUser()) { ?>
                                            <a href="index.php?module=backOffice&amp;action=profile&amp;id="<?php echo $_SESSION['id']; ?>>Admin space</a> |
                                            <a href="index.php?module=membres&amp;action=disconnection">Logout</a>
                                        <?php } else { ?>
                                            <a href="index.php?module=backOffice&amp;action=profile&amp;id="<?php echo $_SESSION['id']; ?>><?php echo 'Hi, ' . $_SESSION['login']; ?></a> |
                                            <a href="index.php?module=membres&amp;action=disconnection">Logout</a>
                                        <?php }
                                    } else { ?>
                                        <a href="index.php?module=membres&amp;action=sign_in">Sign In</a> |
                                        <a href="index.php?module=membres&amp;action=register">Sign Up</a><?php } ?> |
                                    <a href="index.php?module=cart&amp;action=addToCart">My cart</a>
                                </div>

                            </nav>
                        </div>

                    </div>

                </header>
            </div>

            <div class="container-fluid">
                <div class="row">

                    <?php if (isset($_GET['module']) && isset($_GET['action']) && $_GET['module'] == 'backOffice') { ?>

                    <div class="col-lg-3 col-md-4 col-sm-12 col-xs-12">

                        <?php require_once 'global/menu.php'; ?>

                    </div>

                    <div class="col-lg-9 col-md-8 col-sm-12 col-xs-12">

                        <?php } ?>

                        <main id="centre" class="robot">










