<?php
  session_start();
   //connect to database
   $db = mysqli_connect("localhost", "root", "", "timetable");

   if(isset($_POST['login_btn'])){
     $username = mysqli_real_escape_string($db,$_POST['username']);
     $password = mysqli_real_escape_string($db,$_POST['password']);


       $password = md5($password); //before storing for security purposes
       $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
       $result = mysqli_query($db, $sql);

    if (mysqli_num_rows($result) == 1) {
       $_SESSION['message']="You are now logged in ";
       $_SESSION['username']=$username;
       header("location:home.php"); //redirect to home page
     }
     else {
       $_SESSION['message']="Username/password combination incorrect";
     }
   }

?>


<!DOCTTYPE html>
<html>
<head>
  <title>Login page</title>
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
  #btn2{
    color: #fff;
    background: #337ab7;
    padding: 5px;
  }
  </style>

</head>
  <body>
    <div class="header">
      <h1 align ="center">Time Table Generator</h1>
    </div>
    <div id="frm">
    <form method="post" action="login.php">
      <table>
        <tr>
          <td>Username:</tr>
          <td><input type="text" name="username" class="textInput"></td>
        </tr>
        <tr>
          <td>Password:</tr>
          <td><input type="password" name="password" class="textInput"></td>
        </tr>
        <tr>
          <td><input type="submit" id="btn1" name="login_btn" value="Login"></td>
        </tr>
        <tr>
          <a href="loginpage.php">
          <td><input type="submit" id="btn2" name="register_btn" value="Register" ></td>
          </a>
        </tr>
      </table>
    </form>
    </div>
  </body>
  </html>
