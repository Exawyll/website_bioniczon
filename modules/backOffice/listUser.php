<?php

if (!adminUser()) {

    //Error page if not admin
    require_once PATH_GLOBAL_VIEW . 'error_not_admin.php';
} else {

    //Model for membres
    require_once PATH_MODEL . 'membres.php';

    $users = getAllUsers();

    //Display the list aof users
    require_once PATH_VIEW . 'listUser.php';

    if (!empty($_POST['idUser'])) {

        //we want to turn the user as admin
        require_once PATH_MODEL . 'membres.php';

        if ($user['admin'] == 1) {

            $result = turnUserNotAdmin($_POST['idUser']);
        } else {

            $result = turnUserAdmin($_POST['idUser']);
        }

        if ($result) {

            $users = getAllUsers();

            //Display the list updated
            require_once PATH_VIEW . 'listUser.php';

        } else {

            echo 'You can\'t do that';
        }
    }
}