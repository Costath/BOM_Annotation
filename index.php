<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Index - MOB Annotation</title>
        <link rel="stylesheet" href="indexStyles.css">
    </head>
    <body>
        <header>
            <?php
                session_start();

                if (!isset($_SESSION['id']) || empty($_SESSION['id']) == true) {
                    header("Location: login.php");
                }
                if (isset($_POST['success'])) {
                    if ($_POST['success'] == true) {
                        echo "<script>window.alert('Row added')</script>";
                        echo "<div style=display: block; height: 100px; width: 150px; background-color: lightgreen; border-radius: 10px 25px'; text-align: center>Great! Info saved.</div>";
                        $_POST['success'] = false;
                    }
                }
            ?>
            <!-- <img src="" alt=""> -->
            <nav>
                <ul>
                    <li>My Account</li>
                    <li>This Cycle</li>
                    <li>My Cycles</li>
                </ul>
            </nav>
        </header>
        <article>
            <!-- JAVASCRIPT:
            use JS session:
                if my account selected
                    show my account info
                else this cycle selected
                    show this cycle info
                else
                    show my cycles info
            -->
            <?php
                require 'dbConection.php';

                $sessionID = $_SESSION['id'];
                $myAccount = $pdo->query("SELECT * FROM users WHERE id = '$sessionID'");
                $thisCycle = $pdo->query("SELECT * FROM days WHERE day >= (SELECT max(startDay) FROM cycles)");
                $myCycles = $pdo->query("SELECT * FROM cycles");

                if ($myAccount->rowCount() > 0) {
                    echo "<table id='myAccount'>";
                    foreach ($myAccount->fetchAll() as $user) {
                        echo "<tr>";

                        echo "<td>";
                        echo "<strong>Name:</strong> ".$user['name']." ||";
                        echo "</td>";
                        echo "<td>";
                        echo "<strong>E-mail:</strong> ".$user['email'];
                        echo "</td>";

                        echo "</tr>";
                    }
                    echo "<table>";
                }else {
                    echo "<p id='myAccount'>No user</p>";
                }

                if ($thisCycle->rowCount() > 0) {
                    echo "<table id='thisCycle'>";
                    foreach ($thisCycle->fetchAll() as $annotation) {
                        echo "<tr>";

                        echo "<td>";
                        echo $annotation['day'];
                        echo "</td>";
                        echo "<td>";
                        echo "Sensation: ".$annotation['sensation'];
                        echo "</td>";
                        echo "<td>";
                        echo "Visualization: ".$annotation['visualization'];
                        echo "</td>";

                        echo "</tr>";
                    }
                    echo "<table>";
                }else {
                    echo "<p id='thisCycle'>No annotations were made yet :)</p>";
                }
                
                if ($myCycles->rowCount() > 0) {
                    echo "<table id='myCycles'>";
                    foreach ($myCycles->fetchAll() as $annotation) {
                        echo "<tr>";

                        echo "<td>";
                        echo "Start: ".$annotation['startDay'];
                        echo "</td>";
                        echo "<td>";
                        echo "Duration: ".$annotation['duration']." days";
                        echo "</td>";

                        echo "</tr>";
                    }
                    echo "<table>";
                }else {
                    echo "<p id='myCycles'>No annotations were made yet :)<p/>";
                }

                if (isset($_POST['day']) || empty($_POST['day']) == false) {
                    $day = $_POST['day'];
                    $sensation = $_POST['sensation'];
                    $visualization = $_POST['visualization'];
                    $update = $pdo->query("INSERT INTO days SET day = '$day', sensation = '$sensation', visualization = '$visualization'");
                }
            ?>
            <table>
            <tr>
                 <!-- when newAnnotationButton is pressed, hides newAnnotationButton and shows input fields -->
            <td id='newAnnotationTD'>
                 <!-- add an event listener to run a function in JS -->
            <button id='newAnnotationButton'>Create new annotation...</button> 
            <form id="newAnnotationForm" action="newAnnotation.php" method="post">
                <label for="day">Day: </label>
                <input type="text" name="day"><br>
                <label for="sensation">Sensation: </label>
                <input type="text" name="sensation"><br>
                <label for="visualization">Visualization: </label>
                <input type="text" name="visualization"><br>
                <button id='doneButton'>Done</button>
            </form>
            </td>
            </tr>
            </table>
        </article>
        <footer>
            
        </footer>
        <script src="indexScript.js"></script>
    </body>
</html>
