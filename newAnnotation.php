<?php
    require 'dbConection.php';

    $day = $_POST['day'];
    $sensation = $_POST['sensation'];
    $visualization = $_POST['visualization'];
    echo $day;
    echo $sensation;
    echo $visualization;

    $sql = $pdo->query("INSERT INTO days SET day = '$day', sensation = '$sensation', visualization = '$visualization'");

    header("Location: index.php");
?>
