<?php

    session_start();
    ob_start();

    if($_SESSION['login']){
        session_destroy();
        unset($_SESSION['login']);
        unset($_SESSION['username']);
        unset($_SESSION['nm_petugas']);
        unset($_SESSION['role']);
        header("Location: index.php");
    }