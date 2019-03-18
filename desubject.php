<!DOCTTYPE>
<html>
<head>
<title>TTgenerator</title>
<link href="mystyle.css" rel="stylesheet" type="text/css" />
<style>
#tbl{
  border: solid gray 1px;
  width: 30%;
  border-radius: 5px;
  margin: 100px auto;
  background: white;
  padding: 50px;
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
    <div id="tbl">
      <table border="1">
        <tr>
          <th>SUBJECT ID</th>
          <th>SUBJECT NAME</th>
          <th>SUBJECT CODE</th>
        </tr>

    <?php
      session_start();

    $db = mysqli_connect("localhost", "root", "", "timetable");
    $sql = "SELECT id, subname, subcode FROM isubject";
    $result = mysqli_query($db, $sql);

      while ($isubject = mysqli_fetch_assoc($result)) {
        echo "<tr>";
          echo "<td>".$isubject['id']."</td>";
          echo "<td>".$isubject['subname']."</td>";
          echo "<td>".$isubject['subcode']."</td>";

        echo "</tr>";
     }

     ?>
   </table>
   </div>
</body>
</htmml>
