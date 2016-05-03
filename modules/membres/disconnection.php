<?php

// Check access to the page
if (!userSignedIn()) {

    // Error if not connected
    include PATH_GLOBAL_VIEW . 'error_not_connected.php';

} else {

// Destroy all the SESSION variables
    $_SESSION = array();
    session_destroy();

    // Display logout confirmed
    include PATH_VIEW . 'disconnection_ok.php';

}
