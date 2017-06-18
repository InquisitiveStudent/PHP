<?php
session_start();
/*star the session if not the session won't work*/
$username=$_POST['username'];
$password=$_POST['password'];
$con=mysqli_connect('localhost','root','') or die('Could not connect to database');
mysqli_select_db($con,'chatbox');
$result=mysqli_query($con,"SELECT * FROM users where username='$username' AND password='$password'") or die('Query failed');
/*check if the query returns any result*/
if(mysqli_num_rows($result)){
    $res=mysqli_fetch_array($result);
    $_SESSION['username']=$res['username'];
    echo "You are now Login. Click <a href ='index.php'> here</a> to go back to main chat window";
}else {
    echo "<center>";
    echo "No User Found. Please go back and enter the correct login. <br>";
    echo "you may register a new account by clicking <a href='register.php'>here</a>";
    echo "</center>";
}

    
    
?>
