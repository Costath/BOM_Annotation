<?php
$dsn = "mysql:dbname=MOB;host=localhost";
$dbuser = "root";
$dbpass = "";

try {
    $pdo = new PDO($dsn, $dbuser, $dbpass);

} catch (PDOException $e) {
    echo "Conectiom failed. Error: ".$e->getMessage();
}

?>