<?php
    require_once("includes/db.php");
    session_start();
    ob_start();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <title>Dashboard || Admin Panel</title>
        <link href="css/styles.css" rel="stylesheet" />
        <link rel="icon" type="image/x-icon" href="assets/img/favicon.png" />
        <script src="https://kit.fontawesome.com/5a9d093c6d.js" crossorigin="anonymous"></script>
        <script data-search-pseudo-elements defer src="js/all.min.js"></script>
    </head>
<body class="nav-fixed">

<?php
    if(!isset($_SESSION['login'])){
        header("Location: index.php");
    }

?>