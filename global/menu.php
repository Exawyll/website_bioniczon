<div id="menu">

    <h2>Menu</h2>

    <ul>
        <li><a href="index.php">Accueil</a></li>
        <li><a href="index.php?module=product&amp;action=add_product">Add products</a></li>
    </ul>

    <h3>Espace membre</h3>

    <?php if (!utilisateur_est_connecte()) { ?>
        <ul>
            <li><a href="index.php?module=membres&amp;action=inscription">Inscription</a></li>
            <li><a href="index.php?module=membres&amp;action=connexion">Connexion</a></li>
        </ul>
    <?php } else { ?>
        <p>Welcome, <?php echo htmlspecialchars($_SESSION['pseudo']); ?></p>
        <ul>
            <li><a href="index.php?module=membres&amp;action=deconnexion">Disconnect</a></li>
        </ul>
    <?php } ?>
</div>
