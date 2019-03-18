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
          <li><a href = "#">Time Table</a></li>
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
      <table border="2">
        <tr>
          <th rowspan="2">DAY</th>
          <th colspan="4">LECTURE TIMING</th>
        </tr>
          <tr>
            <th>10 to 11</th>
            <th>11 to 12</th>
            <th>12 to 1</th>
            <th>2 to 3</th>
          </tr>
          <!--
          <tr><th>MON</th></tr>
          <tr><th>TUE</th></tr>
          <tr><th>WED</th></tr>
          <tr><th>THU</th></tr>
          <tr><th>FRI</th></tr>
-->

          <?php
            session_start();

          $db = mysqli_connect("localhost", "root", "", "timetable");
          $sql = "SELECT * FROM timet order by rand() ";
          $result = mysqli_query($db, $sql);

            if ($timet = mysqli_fetch_assoc($result)) {

                  echo "<tr>";
                  echo "<th>MON</th>";
                echo "<td >".$timet['sub'].",".$timet['fac']."</td>";
                echo "<td>".$timet['sub'].",".$timet['fac']."</td>";
                echo "<td>".$timet['sub'].",".$timet['fac']."</td>";
                echo "<td>".$timet['sub'].",".$timet['fac']."</td>";

              echo "</tr>";

              echo "<tr>";
              echo "<th>TUE</th>";
              echo "<td>".$timet['sub'].",".$timet['fac']."</td>";
              echo "<td>".$timet['sub'].",".$timet['fac']."</td>";
              echo "<td>".$timet['sub'].",".$timet['fac']."</td>";
              echo "<td>".$timet['sub'].",".$timet['fac']."</td>";
          echo "</tr>";

          echo "<tr>";
          echo "<th>WED</th>";
          echo "<td>".$timet['sub'].",".$timet['fac']."</td>";
          echo "<td>".$timet['sub'].",".$timet['fac']."</td>";
          echo "<td>".$timet['sub'].",".$timet['fac']."</td>";
          echo "<td>".$timet['sub'].",".$timet['fac']."</td>";
      echo "</tr>";

      echo "<tr>";
      echo "<th>THU</th>";
      echo "<td>".$timet['sub'].",".$timet['fac']."</td>";
      echo "<td>".$timet['sub'].",".$timet['fac']."</td>";
      echo "<td>".$timet['sub'].",".$timet['fac']."</td>";
      echo "<td>".$timet['sub'].",".$timet['fac']."</td>";
  echo "</tr>";
 $result++;
           }

           ?>
   </table>
   </div>
   <?php
    if (isset($_POST['delete'])) {
      $sql1 ="DELETE FROM 'timet' WHERE 'sub' ,'fac'";
      $result1 = mysqli_query($db, $sql1);
    }

    ?>
   <form action="timetable.php" method="POST">
   <input type="submit" name="share" value="send">
   <input type="submit" name="delete" value="reset">
 </form>
</body>
</htmml>
