<div id="menu">
    <h2>Menu</h2>

    <ul>
        <li><a href="index.php">Home Page</a></li>
        <?php if (adminUser()) { ?>
            <li><a href="index.php?module=backOffice&amp;action=add_product">Add products</a></li>
            <li><a href="index.php?module=backOffice&amp;action=listUser">list of users</a></li>
        <?php } ?>
        <li><a href="index.php?module=product&amp;action=see_product">See products</a></li>
    </ul>

    <h3>Espace membre</h3>

    <?php if (!userSignedIn()) { ?>
        <ul>
            <li><a href="index.php?module=membres&amp;action=register">Register</a></li>
            <li><a href="index.php?module=membres&amp;action=sign_in">Sign In</a></li>
        </ul>
    <?php } else { ?>
        <p>
            Welcome, <?php echo htmlspecialchars($_SESSION['firstname']) . " " . htmlspecialchars($_SESSION['lastname']); ?>
        </p>
        <ul>
            <li><a href="index.php?module=backOffice&amp;action=profile&amp;id="<?php echo $_SESSION['id']; ?>>Your profile</a></li>
            <li><a href="index.php?module=membres&amp;action=disconnection">Disconnect</a></li>
        </ul>
    <?php } ?>
</div>




