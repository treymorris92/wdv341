<?php

    //clear any session variables related to this user
    //close any connections for this user
    //redirect back to the site home page

    session_start();
    // close session variables - validUser to false
    session_unset();
    session_destroy();

    header('Location: login.php');

?>