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
                        <h1>Welcome to our auction site!</h1>
                        <div class="item-list">

                            <?php                        
                        
                            $query = "select * from products where sold = 'No' ";

                            $select_posts = mysqli_query($connection, $query);

                            while ($row = mysqli_fetch_assoc($select_posts)) {

                                $prodName = $row['prodName'];
                                $price = $row['price'];
                                $description = $row['description'];
                                $startDate = $row['startDate'];
                                $endDate = $row['endDate'];
                                $product_id = $row['product_id'];
                                $buyer = $row['buyer'];
                                $image = $row['image'];
                                
                                $dateNow = date("Y-m-d");
                                if($endDate<=$dateNow){

                                    $update_query = "update products set sold = 'Yes' where product_id = '$product_id' ";
                                    mysqli_query($connection, $update_query);

                                }

                                if($endDate>=$dateNow){
                            ?>

                                <a href="userItem.php?p_id=<?php echo $product_id ?>" class="item">
                                    <img src=<?php echo $image?> alt="item">
                                    <div class="item-text">
                                        <h2>Name: <?php echo $prodName ?> </h2>
                                        <p class="category">
                                        <p class="description">
                                            Description: <?php echo $description ?>
                                        </p>
                                        <p class="price">Price: <?php echo $price ?></p>
                                        <br>
                                        <p class="buyer">Latest bidder: <?php echo $buyer ?></p>
                                        <br>
                                        <p class="date1">Start date: <?php echo $startDate ?></p>
                                        <br>
                                        <p class="date2">End date: <?php echo $endDate ?></p>
                                    
                                    </div>
                                </a>
                            <?php }} ?>
                        </div>
                    </div>
                </div>
            </section>
        </main>
    </body>
</html>