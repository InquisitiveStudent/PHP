<?php 
session_start();
$uname = $_SESSION['username'];
$msg = $_REQUEST['msg'];

$con = mysqli_connect('localhost','root', '');
mysqli_select_db($con, 'chatbox');

mysqli_query($con,"INSERT INTO logs(`username`, `msg`) VALUES('$uname', '$msg')");

$result1 = mysqli_query($con,"SELECT * FROM logs ORDER by id DESC");

while($extract = mysqli_fetch_array($result1)){
 echo "<span class='uname'>". $extract['username']. "</span><span class='msg'>" .": ". $extract['msg']. "</span><br>";
 
}

?>