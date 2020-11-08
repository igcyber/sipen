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
        <title><?php echo $current_page ?> || Admin Panel</title>
        <link href="css/styles.css" rel="stylesheet" />
        <link rel="icon" type="image/x-icon" href="assets/img/favicon.png" />
        <!-- datatable -->
        <link rel="stylesheet" href="includes/dataTables.bootstrap4.css">
        <!-- datatable -->
        <script src="https://kit.fontawesome.com/5a9d093c6d.js" crossorigin="anonymous"></script>
        <script data-search-pseudo-elements defer src="js/all.min.js"></script>
        <script src="js/sweetalert2.all.min.js"></script>
        <!-- datatables -->
        <script src="https://code.jquery.com/jquery-3.1.0.js"></script>
        <script src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
        <!-- datatables -->

    </head>
<body class="nav-fixed">

<?php
    if(!isset($_SESSION['login'])){
        header("Location: index.php");
    }

?>