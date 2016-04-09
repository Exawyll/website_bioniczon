<?php

// Identifiants pour la base de données. Nécessaires a PDO2.
define('SQL_DSN', 'mysql:host=localhost;dbname=ecommerce');
define('SQL_USERNAME', 'root');
define('SQL_PASSWORD', '');

// PATHs à utiliser pour accéder aux views/models/librairies
$module = empty($module) ? !empty($_GET['module']) ? $_GET['module'] : 'index' : $module;
define('PATH_VIEW',     'modules/'.$module.'/views/');
define('PATH_MODEL',  'models/');
define('PATH_LIB',     'libs/');
define('DOSSIER_AVATAR', 'images/avatars/');
define('PATH_GLOBAL_VIEW', 'global_views/');

// Configurations relatives à l'avatar
define('AVATAR_LARGEUR_MAXI', 100);
define('AVATAR_HAUTEUR_MAXI', 100);