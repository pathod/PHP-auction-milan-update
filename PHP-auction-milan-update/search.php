<!DOCTYPE html>
<html>

    <?php

    include "includes/db.php";
    include "includes/header.php";
    include "includes/navigation.php";
    
    session_start();

    ?>
    <body>
        <main>
            <section class="items-wrapper">
                <div class="container">
                    <div class="inner">
                        <form action="" method="post" class="search">
                            <input name="search" type="text" />
                            <button name= "submit" input type="submit">Search</button>
                        </form>
                        <div class="item-list">
                            <?php

                                if (isset($_POST['submit'])) {

                                    $search = $_POST['search'];

                                    $query = "select * from products where post_tags like '%$search%' or prodName like '%$search%' or description like '%$search%' and sold = 'No' ";

                                    $search_query = mysqli_query($connection, $query);

                                    if (!$search_query) {

                                        die("QUERY FAILED" . mysqli_error($connection));
                                    }

                                    $count = mysqli_num_rows($search_query);

                                    if ($count == 0) {

                                        echo "<h1> NO RESULT</h1>";
                                    } else {

                                        while ($row = mysqli_fetch_assoc($search_query)) {
                                            $prodName = $row['prodName'];
                                            $price = $row['price'];
                                            $description = $row['description'];
                                            $startDate = $row['startDate'];
                                            $endDate = $row['endDate'];
                                            $product_id = $row['product_id'];
                                            $buyer = $row['buyer'];
                                            $image = $row['image'];
                                            
                                            $dateNow = date("Y-m-d");
                                            if($endDate>$dateNow){
                            ?>

                                    <a href="item.php?p_id=<?php echo $product_id ?>" class="item">
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

                            <?php } } } } ?>
                        </div>
                    </div>
                </div>
            </section>
        </main>
    </body>
</html>
