<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>HOD | Desk</title>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">

      <link rel="stylesheet" href="hodcss/style.css">
</head>

<body>


  <fieldset>

  <legend>Army Institute Of Technology | HOD Desk

  <img src ="AIT.bmp" align ="right" height="30" width="30"/>
  </legend>
  <br/>
</fieldset>
<form class="well form-horizontal" action="Hod Table.php" method="post" id="contact_form">

<table class="responstable">

  <tr>
    <th>S.No</th>
    <th>Name</th>
    <th>RegNo</th>
    <th>Year/Branch</th>
    <th>Address Of Visit</th>
    <th>From</th>
    <th>To</th>
    <th>Reason</th>
    <th>Status</th>
    <th>Approval</th>
    <th>Submit</th>

  </tr>

  <?php
      $con = mysqli_connect("localhost","root","","outpass")
      or die("error connection");
      $query = "select * from studentdata";
      $result = mysqli_query($con,$query);
      
      while($row = mysqli_fetch_array($result))
      {
        echo "<tr><td>".$row["ID"]."</td><td>".$row["Fname"].$row["Lname"]."</td><td>".$row["RegNo"]."</td><td>".$row["Year"].
        $row["Branch"]."</td><td>".$row["AddressOfVisit"]."</td><td>".$row["Frm"]."</td><td>".$row["Till"].
        "</td><td>".$row["Reason"]."</td><td>"."...pending"."</td><td><input type=\"checkbox\" name=\"Approve\" value=\"'Approve'\"/>Approve</td>
        <td><input id =\"1\"type=\"button\" name=\"submit\" value=\"submit\"/></td>";
      }
	  
  ?>
				   
</form>

  <script src='http://cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.js'></script>


</body>
</html>
