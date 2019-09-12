<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Login - MOB Annotation</title>
        <link rel="stylesheet" href="loginStyles.css">
    </head>
    <body>
        <?php
            session_start();

            require 'dbConection.php';

            if (isset($_POST['name']) && empty($_POST['name']) == false) {

                $userNameOrEMail = $_POST['name'];
                $password = MD5($_POST['password']);
                $sql = $pdo->query("SELECT * FROM users where (name = '$userNameOrEMail' OR email = '$userNameOrEMail') AND password = '$password'");

                if ($sql->rowCount() > 0) {
                    foreach ($sql->fetch() as $user) {
                        $_SESSION['id'] = $user['id'];

                        header("Location: index.php");
                    }
                }else {
                    echo "Combination of user and password not found. Please check it and try again.";
                }
            }
        ?>
        <div>
            <form method="POST">
                <label for="nameTxt">User name or e-mail: </label>
                <input id="nameTxt" type="input" name="name"><br>
                <label for="passwordTxt">Password: </label>
                <input id="passwordTxt" type="input" name="password">
                <br>
                <br>
                <button>Submit</button>
            </form>
            <form action="newAccount.html" method="POST">
                <button>Create new account</button>
            </form>
            <form action="usersList.php" method="POST">
                <button>Users list</button>
            </form>
        </div>
    </body>
</html>