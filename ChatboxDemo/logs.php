<?php 
$con = mysqli_connect('localhost', 'root', '') or die("Could not connect to MYSQL!");
mysqli_select_db($con,'chatbox') or die("DATABASE NOT FOUND!");
$result1 = mysqli_query($con,"SELECT * FROM logs ORDER by id DESC");

while($extract = mysqli_fetch_array($result1)){
 echo "<span class='uname'>". $extract['username']. "</span>"."<span class='msg'>" .": ". $extract['msg']. "</span><br>";
 
}

?>