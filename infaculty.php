<?php
session_start();
 //connect to database
 $db = mysqli_connect("localhost", "root", "", "timetable");

 if(isset($_POST['add_btn'])){
   $fname = mysqli_real_escape_string($db,$_POST['fname']);
   $fid = mysqli_real_escape_string($db,$_POST['fid']);

   $sql = "INSERT INTO ifaculty(fname, fid)VALUES('$fname','$fid')";
   $result = mysqli_query($db, $sql);
 }
 ?>

<!DOCTTYPE>
<html>
<head>
<title>TTgenerator</title>
<link href="mystyle.css" rel="stylesheet" type="text/css" />
<style>
#frm{
  border: solid gray 1px;
  width: 30%;
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
  <h style="font-size:60px;">Time Table Generator</h>
  <div id="menu">
      <ul>
          <li><a href = "home.php">Home</a></li>
          <li><a href = "timetable.php">Time Table</a></li>
          <li><a href = "#">Details</a>
            <ul>
              <li><a href ="desubject.php">Subject</a></li>
              <li><a href ="defaculty.php">Faculty</a></li>
            </ul>
          </li>
          <li><a href = "">Insert Data</a>
            <ul>
              <li><a href ="insubject.php">Subject</a></li>
              <li><a href ="#">Faculty</a></li>
            </ul>
          </li>
          <li><a href = "#">Contacts</a></li>
          <li><a href = "logout.php">Logout</a></li>
      </ul>
    </div>
    <div id="frm">
      <form method="post" action="infaculty.php">
        <h><b>ADD FACULTY</b></h><br>
        Enter Faculty name:
        <input type="text" name="fname"><br><br>
        Faculty Id:
        <input type="text" name="fid"><br>
        <input type="submit" id="btn1" name="add_btn" value="Add">
        <input type="submit" id="btn2" name="reset_btn" value="Reset">
      </form>
    </div>
</body>
</htmml>
