<?php
    session_start();

    require 'dbConection.php';

    $userName = $_POST['name'];
    $eMail = $_POST['eMail'];
    $password = $_POST['password'];

    $sql = $pdo->query("INSERT INTO users SET name = '$userName', email = '$eMail', password = '$password'");

    $_SESSION['id'] = $pdo->lastInsertId();

    header("Location: index.php");
?>