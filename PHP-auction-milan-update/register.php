<!DOCTYPE html>
<html>

    <?php

    include "includes/db.php";
    include "includes/header.php";
    include "includes/navigation.php";
    //include "includes/function.php";

    if (isset($_POST['register'])) {

        $email = $_POST['email'];
        $password = $_POST['password'];
        $firstName = $_POST['firstName'];
        $lastName = $_POST['lastName'];
        $username = $_POST['username'];

    }
    if (!empty($email) && !empty($password) && !empty($firstName) && !empty($lastName) && !empty($username)) {

        $email = mysqli_real_escape_string($connection, $email);
        $password = mysqli_real_escape_string($connection, $password);
        $firstName = mysqli_real_escape_string($connection, $firstName);
        $lastName = mysqli_real_escape_string($connection, $lastName);
        $username = mysqli_real_escape_string($connection, $username);

        /* Za enkripciju, radi ali treba dodati jos funkcija. 
                
                $query = "SELECT salt FROM users";
                $select_salt_query = mysqli_query($connection, $query);
        
                if(!$select_salt_query){
        
                    die("Query failed!" . mysqli_error($connection) . '' . mysqli_errno($connection));
        
                } 

                $row = mysqli_fetch_array($select_salt_query);

                $salt = $row["salt"];

                $password = crypt($password, $salt); */

        /*
        
        Kod za validaciju mejla, ali ne radi. Ili sam ja pogresno razumeo ili ima neka druga greska koja ga sprecava da radi. 
        Ujedno bi isao slican kod i kod dodavanja item-a na aukciju.

        $same_mail = "select from users where user_email = '$email' ";
        $res_mail = mysqli_query($connection, $same_mail);

        if(mysqli_num_rows($res_mail) > 0){

            echo "Email already exists!";

        }else{ */

        $query = "insert into users(user_email, user_password, user_firstName, user_lastName, username) VALUES('{$email}', '{$password}', '{$firstName}', '{$lastName}', '{$username}')";

        $register_query = mysqli_query($connection, $query);

        if (!$register_query) {

            die("Query failed!" . mysqli_error($connection) . '' . mysqli_errno($connection));
        
        } echo "Registered successfully!";

        // echo "Test"; 

     }
  
    ?>
    
    <body>
        <main>
            <section class="login-wrapper">
                <div class="container">
                    <div class="inner">
                        <form action="register.php" method="post">
                            <h1 class="text-center">
                            </h1>
                            <label for="username">Username:</label>
                            <input name="username" type="text" id="username" class="form-control">
                            <br>
                            <label for="email">Email:</label>
                            <input name="email" type="email" id="email" class="form-control">
                            <br>
                            <label for="password">Password:</label>
                            <input name="password" type="password" id="password" class="form-control">
                            <br>
                            <label for="firstName">First name:</label>
                            <input name="firstName" type="text" id="firstName" class="form-control">
                            <br>
                            <label for="lastName">Last name:</label>
                            <input name="lastName" type="text" id="lastName" class="form-control">
                            <br>
                            <button name="register" type="submit" value="Submit">Register!</button>
                        </form>
                    </div>
                </div>
            </section>
        </main>
    </body>
</html>