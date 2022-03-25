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

                            $query = "select * from products where buyer = '$username' and sold = 'Yes' ";

                            $rows = mysqli_query($connection, $query);

                            if(mysqli_num_rows($rows)>0){

                                echo '<table class="data-table">';
                                echo'<thead>';
                                echo'<tr>';
                                echo '<th>Product ID </th>';
                                echo'<th>Product name </th>';      
                                echo '<th>Final price </th>';
                                echo '<th>End date </th>';
                                echo '<th></th>';
                                echo'</tr>';
                                echo'</thead>';
                                echo'<tbody>';

                            } while($row = mysqli_fetch_array($rows)){

                                $product_id = $row['product_id'];
                                $prodName = $row['prodName'];
                                $price = $row['price'];
                                $endDate = $row['endDate'];
                    
                                echo "<tr>";
                                echo "<td>$product_id</td>";
                                echo "<td>$prodName</td>";
                                echo "<td>$price</td>";
                                echo "<td>$endDate</td>";
                                echo "</tr>";
                            }
                                }
                                else
                                {
                                    echo "You don't have any items posted.";
                                }

                        ?>
                    </div>
                </div>
            </section>
        </main>
    </body>
</html>