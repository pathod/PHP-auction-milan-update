<!DOCTYPE html>
<html>
    <?php

    include "includes/db.php";
    include "includes/header.php";
    include "includes/navigation.php";

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

                                    ?>

                                    <h2>Name: <?php echo $prodName ?> </h2>
                                    <p class="description">
                                        Description: <?php echo $description ?>                                       
                                    </p>
                                    <p class="price">Price: <?php echo $price ?></p>
                                    <p class="buyer">Latest bidder: <?php echo $buyer ?></p>
                                    <p class="date1">Start date: <?php echo $startDate ?></p>
                                    <p class="date2">End date: <?php echo $endDate ?></p>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </main>
    </body>
</html>