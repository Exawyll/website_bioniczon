<?php

if (empty($_SESSION['id']) || !is_numeric($_SESSION['id'])) {

    //Wrong input so you don't have access
    require_once PATH_VIEW . 'error_profile.php';

} else {

    //Go to display the profile page
    require_once PATH_VIEW . 'profile.php';


}