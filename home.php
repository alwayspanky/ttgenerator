<?php
   session_start();

 $db = mysqli_connect("localhost", "root", "", "timetable");
 $sql1 = "SELECT subname FROM isubject";
 $result1 = mysqli_query($db, $sql1);
 $sql2 = "SELECT fname FROM ifaculty";
 $result2 = mysqli_query($db, $sql2);

 if (isset($_POST['submit_btn'])) {
   $sub = mysqli_real_escape_string($db,$_POST['sub']);
   $fac = mysqli_real_escape_string($db,$_POST['fac']);

   $sql3 ="INSERT INTO timet(sub, fac) VALUES('$sub', '$fac')";
   $result3 = mysqli_query($db, $sql3);
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
              <li><a href ="infaculty.php">Faculty</a></li>
            </ul>
          </li>
          <li><a href = "#">Contacts</a></li>
          <li><a href = "logout.php">Logout</a></li>
      </ul>
    </div>
  <div id="frm">
    <form action="home.php" method="POST">
      <h><b>Enter Your Data Below</b></h>
      <p>
        <label>SUBJECT:</lable>
          <select class="" name="sub">
            <?php
            while ($isubject = mysqli_fetch_assoc($result1)) {
              $subname = $isubject['subname'];
              echo "<option value='$subname'>$subname</option>";
            } ?>
          </select>
        </p>
        <p>
          <label>FACULTY:</lable>
            <select class="" name="fac">
              <?php
              while ($ifaculty = mysqli_fetch_assoc($result2)) {
                $fname = $ifaculty['fname'];
                echo "<option value='$fname'>$fname</option>";
              } ?>
            </select>
          </p>
          <p>
            <input type="submit" id="btn1" name="submit_btn" value="Submit" >
            <input type="submit" id="btn2" name="reset_btn" value="Reset" >
          </p>

        </form>
      </div>

</body>
</htmml>
