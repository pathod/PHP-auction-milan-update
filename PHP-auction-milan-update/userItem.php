<!DOCTYPE html>
<html>
    <?php

    include "includes/db.php";
    include "includes/header.php";
    include "includes/userNavigation.php";

    session_start();

    ?>
    <body>
        <main>
            <section class="items-wrapper">
                <div class="container">
                    <div class="inner">
                        <div class="item-wrapper">
                            <div class="left">
                                <img src="images/macbook.jpg" alt="item">
                            </div>
                            <div class="right">
                                <div class="item-text">
                                    <?php
                                    
                                    if(isset($_GET['p_id'])){

                                        $the_product_id = $_GET['p_id'];

                                    }

                                    $query = "select * from products where sold = 'No' and product_id = '$the_product_id' ";

                                    $select_posts = mysqli_query($connection, $query);
        
                                    while ($row = mysqli_fetch_assoc($select_posts)) {
        
                                        $prodName = $row['prodName'];
                                        $price = $row['price'];
                                        $description = $row['description'];
                                        $startDate = $row['startDate'];
                                        $endDate = $row['endDate'];
                                        $buyer = $row['buyer'];
                                    }
                                    if(isset($_POST['bid'])){
                                        
                                        $the_product_id = $_GET['p_id'];
                                        $input = $_POST['number'];
                                        $username = $_SESSION['username'];

                                        $query2 = "select * from products where product_id = '$the_product_id' ";

                                        $res = mysqli_query($connection, $query2);
                                        $row = mysqli_fetch_array($res);

                                        $price = $row['price'];
                                        $buyer = $row['username'];
                                        if($buyer == $username){

                                            echo "You can't bid your own items!";

                                        }else if($input <= $price){
                                            
                                            echo "Bidding price must be higher than the current price!";

                                        }else{

                                            $update = "update products set price = '$input', buyer = '$username' where product_id = '$the_product_id' ";
                                            $add_query = mysqli_query($connection, $update);
                                            header("Location: userPage.php");
                                        }
                                    }
                                    ?>

                                    <h2>Name: <?php echo $prodName ?> </h2>
                                    <p class="description">
                                        Description: <?php echo $description ?>                                       
                                    </p>
                                    <p class="price">Price: <?php echo $price ?></p>
                                    <p class="buyer">Latest bidder: <?php echo $buyer ?></p>
                                    <p class="date1">Start date: <?php echo $startDate ?></p>
                                    <p class="date2">End date: <?php echo $endDate ?></p>
                                    
                                    <form method="post">
                                        <input name ="number" input type="number" placeholder="Your bid" />
                                        <button name="bid" type="submit" value="Submit">Bid</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </main>
    </body>
</html>