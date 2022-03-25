<!DOCTYPE html>
<html>
    <?php

    include "includes/db.php";
    include "includes/header.php";
    include "includes/userNavigation.php";

    ?>
    <?php

    session_start();

    if (isset($_POST['edit'])) {

        $id = $_SESSION['user_id'];

        $user_firstName = $_POST['firstName'];
        $user_lastName = $_POST['lastName'];
        $user_email = $_POST['email'];
        $user_password = $_POST['password'];
        $username = $_POST['username'];

        if (!empty($user_email) && !empty($user_password) && !empty($user_firstName) && !empty($user_lastName) && !empty($username)) {

            $user_email = mysqli_real_escape_string($connection, $user_email);
            $user_password = mysqli_real_escape_string($connection, $user_password);
            $user_firstName = mysqli_real_escape_string($connection, $user_firstName);
            $user_lastName = mysqli_real_escape_string($connection, $user_lastName);
            $username = mysqli_real_escape_string($connection, $username);

        $select_from_users = "select * from users where user_id = '$id' ";

        $query = mysqli_query($connection, $select_from_users);

        $row = mysqli_fetch_assoc($query);

        $res = $row['user_id'];

        if ($res === $id) {

            $update = "update users set user_firstName = '$user_firstName', user_lastName = '$user_lastName', user_email = '$user_email', user_password = '$user_password', username = '$username' where user_id = '$id' ";

            $query2 = mysqli_query($connection, $update);

            if ($query2) {

                header('Location: ../userPage.php');
            } else {

                header('Location: ../editUser.php');
            }
        }
    }
}
    ?>

    <body>
        <main>
            <section class="login-wrapper">
                <div class="container">
                    <div class="inner">
                        <form action="editUser.php" method="post">
                            <label for="email">Email:</label>
                            <input name="email" type="email" class="form-control">
                            <br>
                            <label for="username">Username:</label>
                            <input name="username" type="text" id="username" class="form-control">
                            <br>
                            <label for="password">Password:</label>
                            <input name="password" type="password" class="form-control">
                            <br>
                            <label for="firstName">First name:</label>
                            <input name="firstName" type="text" class="form-control">
                            <br>
                            <label for="lastName">Last name:</label>
                            <input name="lastName" type="text" class="form-control">
                            <br>
                            </select>
                            <button name="edit" type="submit" value="Submit">Update</button>
                        </form>
                    </div>
                </div>
            </section>
        </main>
    </body>
</html>