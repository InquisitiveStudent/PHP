<?php
if(isset($_POST['submit'])){
    
$con = mysqli_connect('localhost', 'root', '') or die("Could not connect to MYSQL!");
mysqli_select_db($con,'chatbox') or die("DATABASE NOT FOUND!");
    $uname=$_POST['username'];
    $pword=$_POST['password'];
    $pword2=$_POST['password2'];
    if($pword!=$pword2){
        echo "Password do not match. <br>";
    }else
        echo $checkexist=mysqli_query($con,"Select username from users where username='$uname'") or die('incorrect query');
        if(mysqli_num_rows($checkexist)){
            echo "Username already exists, please select different username <br>";
                
        }else {
            mysqli_query($con,"INSERT INTO users(username,password) VALUES('$uname','$pword')");
            echo "You have successfully registered. Click <a href='index.php'>here</a> to start chat<br>";
        }
    
}
?>
<!DOCTYPE html>
<html lang="">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="">
</head>

<body>
    <form action="register.php" name="form1" method="post">
        <table align="center" border="1" width="40%">
            <tr>
                <td>Enter your username:</td> <td><input type="text" name="username"></td>
            </tr>
            <tr>
                <td>Enter your password:</td>
                <td><input type="password" name="password"></td>
            </tr>
            <tr>
                <td>Reenter your password:</td>
                <td><input type="password" name="password2"></td>
            </tr>
            <tr>
                <td colspan="2"><input type="submit" name="submit" value="Register"></td>
            </tr>
        </table>
    </form>
    <script src=""></script>
</body>
</html>
