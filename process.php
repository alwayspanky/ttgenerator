<?php
//get values pass from in login.php file

$username = $_POST['user'];
$password = $_POST['pass'];

//to present mysql injection
$username = stripcslashes($username);
$password = stripcslashes($password);
$username = mysqli_real_escape_string($username);
$password = mysqli_real_escape_string($password);

//connect to the server and select database
mysqli_connect("localhost","root","");
mysqli_select_db("ttgenerator");

//Query database for user
$result = mysqli_query("select * from users where username ='$username' and password ='$password'")
          or die("Failed to query database".mysqli_error());
$row =mysqli_fetch.array($result);
if ($row['username'] == $username && $row['password']==$password) {
  echo "Login successed".$row['username'];
}
else {
  echo "Failed to login";
}
 ?>
