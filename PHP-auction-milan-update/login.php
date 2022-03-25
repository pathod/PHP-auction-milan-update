<!DOCTYPE html>
<html>
<?php

include "includes/db.php";
include "includes/header.php";
include "includes/navigation.php";

if (isset($_POST['login'])) {

    $email = $_POST['email'];
    $password = $_POST['password'];


    $email = mysqli_real_escape_string($connection, $email);
    $password = mysqli_real_escape_string($connection, $password);

    $query = "SELECT * FROM users WHERE user_email = '{$email}' ";
    $select_user_query = mysqli_query($connection, $query);

    if (!$select_user_query) {

        die("Query failed" . mysqli_error($connection));
    }
    while ($row = mysqli_fetch_array($select_user_query)) {

        $db_email = $row['user_email'];
        $db_firstName = $row['user_firstName'];
        $db_lastName = $row['user_lastName'];
        $db_password = $row['user_password'];
        $db_id = $row['user_id'];
        $db_username = $row['username'];
    }

    // Za enkripciju. $password = crypt($password, $db_password);

    if ($email !== $db_email && $password !== $db_password) {

        header("Location: index.php");
    } else if ($email == $db_email && $password == $db_password) {

        session_start();

        $_SESSION['user_id'] = $db_id;
        $_SESSION['email'] = $db_email;
        $_SESSION['firstName'] = $db_firstName;
        $_SESSION['lastName'] = $db_lastName;
        $_SESSION['password'] = $db_password;
        $_SESSION['username'] = $db_username;

        header("Location: userPage.php");
    } else {

        header("Location: index.php");
    }
    /* 
            Iskucano tokom pisanja funkcija, za testiranje da li radi 'submit'.

            echo $email = $_POST['email'];
            echo $password = $_POST['password'];

            if($email && $password){
                echo $email;
                echo $password;
            } else{
                echo "Nope";
            }
            */
}


?>

    <body>
        <main>
            <section class="login-wrapper">
                <div class="container">
                    <div class="inner">
                        <form action="login.php" method="post">
                            <label for="email">Email:</label>
                            <input name="email" type="email" class="form-control">
                            <br>
                            <label for="password">Password:</label>
                            <input name="password" type="password" class="form-control">
                            <br>
                            <button name="login" type="submit" value="Submit">Login</button>
                        </form>
                    </div>
                </div>
            </section>
        </main>
    </body>
</html>