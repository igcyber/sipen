<?php

$conn = "mysql:host=localhost;dbname=sipencar";

try {
    $pdo = new PDO($conn, 'root', '');
}
catch(PDOException $e){
    echo $e->getMessage();
}