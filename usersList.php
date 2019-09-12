<?php
    require 'dbConection.php';

    $sql = $pdo->query("SELECT * FROM users");

    if ($sql->rowCount() > 0) {
        echo "<table>";
        foreach ($sql->fetchAll() as $user) {
            echo "<tr>";
            echo "<td>".$user['name']."</td>";
            echo "<td>".$user['email']."</td>";
            echo "</tr>";
        }
        echo "</table>";
    }else {
        echo "No user could be found.";
    }
?>