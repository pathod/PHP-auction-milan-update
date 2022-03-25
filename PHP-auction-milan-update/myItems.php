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
                        <?php 
                        
                        if(isset($_GET)){

                            $username = $_SESSION['username'];

                            $query = "select * from products where username = '$username' ";

                            $rows = mysqli_query($connection, $query);

                            if(mysqli_num_rows($rows)>0){

                                echo '<table class="data-table">';
                                echo'<thead>';
                                echo'<tr>';
                                echo '<th>Product ID </th>';
                                echo'<th>Product name </th>';      
                                echo '<th>Price </th>';
                                echo '<th>Sold</th>';
                                echo '<th>Start date </th>';
                                echo '<th>End date </th>';
                                echo '<th></th>';
                                echo'</tr>';
                                echo'</thead>';
                                echo'<tbody>';

                            } while($row = mysqli_fetch_array($rows)){

                            $product_id = $row['product_id'];
                            $prodName = $row['prodName'];
                            $price = $row['price'];
                            $sold = $row['sold'];
                            $startDate = $row['startDate'];
                            $endDate = $row['endDate'];
                
                            echo "<tr>";
                            echo "<td>$product_id</td>";
                            echo "<td>$prodName</td>";
                            echo "<td>$price</td>";
                            echo "<td>$sold</td>";
                            echo "<td>$startDate</td>";
                            echo "<td>$endDate</td>";
                            echo "<td><a href='myItems.php?delete=$product_id'</a>Delete</td>";
                            echo "</tr>";
                        }
                            }
                            else
                            {
                                echo "You don't have any items posted.";
                            }
                            if(isset($_GET['delete'])){

                                $the_post_id = $_GET['delete'];

                                    $query = "delete from products where product_id = '$the_post_id' ";
                                    $delete_query = mysqli_query($connection, $query);

                            }  
                        ?>
                    </div>
                </div>
            </section>
        </main>
    </body>
</html>