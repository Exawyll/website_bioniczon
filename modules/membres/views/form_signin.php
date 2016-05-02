<h2>Signing In</h2>

<p>If you are not registered, please do it <a href="index.php?module=membres&amp;action=register">here</a>.</p>

<?php

if (!empty($erreurs_connexion)) {

    echo '<ul>'."\n";

    foreach($erreurs_connexion as $e) {

        echo '	<li>'.$e.'</li>'."\n";
    }

    echo '</ul>';
}

echo $form_signIn;
