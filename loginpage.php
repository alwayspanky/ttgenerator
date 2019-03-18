<?php
  session_start();
   //connect to database
   $db = mysqli_connect("localhost", "root", "", "timetable");

   if(isset($_POST['register_btn'])){
     $username = mysqli_real_escape_string($db,$_POST['username']);
     $email = mysqli_real_escape_string($db,$_POST['email']);
     $password = mysqli_real_escape_string($db,$_POST['password']);
     $password2 = mysqli_real_escape_string($db,$_POST['password2']);

     if ($password == $password2) {
       $password = md5($password); //before storing for security purposes
       $sql = "INSERT INTO users(username, email, password) VALUES('$username','$email','$password')";
       mysqli_query($db, $sql);
       $_SESSION['message']="You are now logged in ";
       $_SESSION['username']=$username;
       header("location:home.php"); //redirect to home page
     }
     else {
       $_SESSION['message']="The two password do not match";
     }
   }




?>


<!DOCTTYPE html>
<html>
<head>
  <title>Registration page page</title>
  <style>
  #frm{
    border: solid gray 1px;
    width: 20%;
    border-radius: 5px;
    margin: 100px auto;
    background: white;
    padding: 50px;
  }
  #btn1{
    color: #fff;
    background: #337ab7;
    padding: 5px;
  }
  </style>
</head>
  <body>
    <div class="header">
      <h1 align="center">Time Table Generator</h1>
    </div>
    <div id="frm">
      <h align="center"><b>Registration</b></h>
    <form method="post" action="loginpage.php">
      <table>
        <tr>
          <td>Username:</tr>
          <td><input type="text" name="username" class="textInput"></td>
        </tr>
        <tr>
          <td>Email:</tr>
          <td><input type="email" name="email" class="textInput"></td>
        </tr>
        <tr>
          <td>Password:</tr>
          <td><input type="password" name="password" class="textInput"></td>
        </tr>
        <tr>
          <td>Password:</tr>
          <td><input type="password" name="password2" class="textInput"></td>
        </tr>
        <tr>
          <td></tr>
          <td><input type="submit" id="btn" name="register_btn" value="Register"></td>
        </tr>
      </table>
    </form>
  </div>
  </body>
  </html>
