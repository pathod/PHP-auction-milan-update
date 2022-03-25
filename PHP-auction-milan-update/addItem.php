<!DOCTYPE html>
<html>    
    <?php

    include "includes/db.php";
    include "includes/header.php";
    include "includes/userNavigation.php";

    session_start();

    if (isset($_POST['addItem'])) {

        $username = $_SESSION['username'];

        $select_from_users = "select * from users where username = '$username' ";

        $query = mysqli_query($connection, $select_from_users);

        $row = mysqli_fetch_assoc($query);

        $res = $row['username'];

        if ($res === $username)

        $select_from_products = "select * from products";

        $query2 = mysqli_query($connection, $select_from_products);
        $row = mysqli_fetch_assoc($query);

        $prodName = $_POST['prodName'];
        $description = $_POST['description'];
        $price = $_POST['price'];
        $delivery = $_POST['delivery'];
        $startDate = $_POST['startDate'];
        $endDate = $_POST['endDate'];
        $postTags = $_POST['post_tags'];
        $sold = 'No';
    
        // echo $username;

        $filename = "items/".$_FILES["image"]["name"];
        $tempname = $_FILES["image"]["tmp_name"];    
        move_uploaded_file($tempname, $filename);

        if (!empty($prodName) && !empty($description) && !empty($price) && !empty($delivery) && !empty($startDate) && !empty($endDate) && !empty($postTags)) {

        $prodName = mysqli_real_escape_string($connection, $prodName);
        $description = mysqli_real_escape_string($connection, $description);
        $price = mysqli_real_escape_string($connection, $price);
        $delivery = mysqli_real_escape_string($connection, $delivery);
        $startDate = mysqli_real_escape_string($connection, $startDate);
        $endDate = mysqli_real_escape_string($connection, $endDate);
        $postTags = mysqli_real_escape_string($connection, $postTags);

        $query2 = "insert into products(prodName, description, price, delivery, startDate, endDate, username, sold, buyer, post_tags, image) VALUES('{$prodName}', '{$description}', '{$price}', '{$delivery}', '{$startDate}', '{$endDate}', '{$username}', '{$sold}', 'Null', '{$postTags}', '{$filename}' )";

        $add_query = mysqli_query($connection, $query2);

        if (!$add_query) {

            die("Query failed!" . mysqli_error($connection) . '' . mysqli_errno($connection));
        }
        $message = "Item added!";
    } else {

        $message = "Fields can't be empty!";
    }
}
    ?>

    <body>
        <main>
            <section class="login-wrapper">
                <div class="container">
                    <div class="inner">
                        <form action="addItem.php" method="post" enctype="multipart/form-data">
                            <h1 class="text-center">
                            </h1>
                            <label for="prodName">Product name:</label>
                            <input name="prodName" type="text" id="prodName" class="form-control">
                            <br>
                            <label for="description">Enter description:</label>
                            <input name="description" type="text" id="description" class="form-control">
                            <br>
                            <label for="price">Enter price:</label>
                            <input name="price" type="price" id="price" class="form-control">
                            <br>
                            <label for="delivery">Enter shipping method:</label>
                            <input name="delivery" type="text" id="delivery" class="form-control">
                            <br>
                            <label for="startDate">Start date:</label>
                            <input name="startDate" type="date" id="startDate" class="form-control">
                            <br>
                            <label for="endDate">End date:</label>
                            <input name="endDate" type="date" id="endDate" class="form-control">
                            <br>
                            <label for="post_tags">Post tags:</label>
                            <input name="post_tags" type="text" id="post_tags" class="form-control">
                            <br>
                            <label for="image">Picture:</label>
                            <input name="image" type="file" id="image" class="form-control" accept="image/*">
                            <br>
                            <button name="addItem" type="submit" value="Submit">Add item!</button>
                    </div>
                </div>
            </section>
        </main>
    </body>
</html>