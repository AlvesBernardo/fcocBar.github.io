<?php

    //with this page we will be able to log out
    session_unset();
    session_destroy();

    header('Location: index.php');


?>
