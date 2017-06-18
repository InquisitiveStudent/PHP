<?php
    $con=mysqli_connect('localhost','root','') or die('could not access to database');
    mysqli_select_db($con,'chatbox');
    mysqli_query($con, " Delete from logs") or die("SQL not valid");


header('LOCATION: index.php');
echo "The message has been deleted";

?>