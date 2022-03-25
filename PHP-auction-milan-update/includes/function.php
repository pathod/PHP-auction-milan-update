<?php
/*
function confirmQuery($result) {
    
    global $connection;

    if(!$result ) {
          
          die("QUERY FAILED ." . mysqli_error($connection));
   
          
      }
    

}

function email_exists($email){

global $connection;


$query = "SELECT user_email FROM users WHERE user_email = '$email'";
$result = mysqli_query($connection, $query);
confirmQuery($result);

if(mysqli_num_rows($result) > 0) {

    return true;

} else {

    return false;

}

} */
?> 