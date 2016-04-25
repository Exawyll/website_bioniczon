<?php

if (!adminUser()) {

    //Error page if not admin
    require_once PATH_GLOBAL_VIEW . 'error_not_admin.php';
} else {

    //Model for membres
    require_once PATH_MODEL . 'membres.php';

    $users = getAllUsers();

    if (!empty($_GET['idUser']) && empty($_GET['function'])) {

        //we want to turn the user as admin
        require_once PATH_MODEL . 'membres.php';

        $user = infoUser($_GET['idUser']);

        if ($user['admin'] == 1) {

            $result = turnUserNotAdmin($_GET['idUser']);
        } else {

            $result = turnUserAdmin($_GET['idUser']);
        }

        if ($result) {

            //Display the list updated
            header('Location: index.php?module=backOffice&action=listUser');

        } else {

            echo 'You can\'t do that';
        }
    } else if (isset($_GET['idUser']) && $_GET['function'] == 'remove') {

        // Database membres
        require_once PATH_MODEL . 'membres.php';

        //Delete User
        deleteUser(intval($_GET['idUser']));

        //Display the list updated
        header('Location: index.php?module=backOffice&action=listUser');
    } else {

        //Display the list aof users
        require_once PATH_VIEW . 'listUser.php';
    }
}