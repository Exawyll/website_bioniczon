<?php

if (!adminUser()) {

    //Error page if not admin
    require_once PATH_GLOBAL_VIEW . 'error_not_admin.php';

} else {

    //Model for membres
    require_once PATH_MODEL . 'membres.php';
    $modelUser = new Model_Users();

    $users = $modelUser->getAllUsers();

    if (!empty($_GET['idUser']) && !isset($_GET['function'])) {

        var_dump($_GET);

        $user = $modelUser->infoUser($_GET['idUser']);

        if ($user['admin'] == 1) {

            $result = $modelUser->turnUserNotAdmin($_GET['idUser']);
        } else {

            $result = $modelUser->turnUserAdmin($_GET['idUser']);
        }

        if ($result) {

            //Display the list updated
            header('Location: index.php?module=backOffice&action=listUser');

        } else {

            echo 'You can\'t do that';
        }
    } else if (!empty($_GET['idUser']) && isset($_GET['function'])) {

        //Delete User
        $modelUser->deleteUser(intval($_GET['idUser']));

        //Display the list updated
        header('Location: index.php?module=backOffice&action=listUser');

    } else if (empty($_GET['function']) && empty($_GET['idUser'])) {

        //Display the list aof users
        require_once PATH_VIEW . 'listUser.php';
    }
}