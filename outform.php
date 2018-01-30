<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>
    E-OUTPASS PORTAL
  </title>
  <link rel='stylesheet prefetch' href='http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css'>
  <link rel='stylesheet prefetch' href='http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css'>
  <link rel='stylesheet prefetch' href='http://cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.0/css/bootstrapValidator.min.css'>
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
  <div class="container">

  <form class="well form-horizontal" action="hodrequest.php" method="post" id="contact_form">
  <fieldset>

  <legend>Army Institute Of Technology

  <img src ="AIT.bmp" align ="right" height="60" width="60"/>
  </legend>
  <br/>
  <div class="wrapper">
  <div id="date"></div>
  <div id="time"></div>
  </div>
  <p>
  <h4 align="center">E-OUTPASS PORTAL</h4>
  <script src="js/time.js"></script>
  </p>


  <div class="form-group">
  <label class="col-md-4 control-label">Registration No.</label>
  <div class="col-md-4 inputGroupContainer">
  <div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
  <input  name="Registration" placeholder="Registration No" class="form-control"  type="text">
    </div>
  </div>
  </div>



  <div class="form-group">
  <label class="col-md-4 control-label" >Address Of Visit</label>
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
  <input name="address" placeholder="AddressOfVisit" class="form-control"  type="text">
    </div>
  </div>
  </div>


  <div class="form-group">
  <label class="col-md-4 control-label" >From</label>
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-time"></i></span>
  <input name="frm" placeholder="" class="form-control"  type="text">
    </div>
  </div>
  </div>

  <div class="form-group">
  <label class="col-md-4 control-label" >To</label>
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-time"></i></span>
  <input name="till" placeholder="" class="form-control"  type="text">
    </div>
  </div>
  </div>
  
  <div class="form-group">
  <label class="col-md-4 control-label" >Reason</label>
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
  <input name="reason" placeholder="Reason" class="form-control"  type="text">
    </div>
  </div>
  </div>
  
  <div class="form-group">
  <label class="col-md-4 control-label"></label>
  <div class="col-md-4">
    <button type="submit" value = "Apply" class="btn btn-warning" >Apply <span class="glyphicon glyphicon-send"></span></button>
  </div>
</div>
 </form>
  
<?php
$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "outpass";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
/*$Regno = $_POST['RegNo'];*/

$sql = "SELECT * FROM request";
$result = $conn->query($sql);

if ($result->num_rows > 0) 
{
	
    // output data of each row
    while($row = $result->fetch_assoc()) 
	{
		$ch ='';
		$chk = $row['Status'];
		if($chk==1)
		{ 
	      $ch = "approved by HOD";
	    }
	else if($chk == 2)
	{
		$ch= "approved by JD";
	}		
	else if($chk == 0)
	{
		$ch = "pending...";
	}
	else if($chk == -1)
	{
	$ch = "cancelled by HOD";
	}
	else if($chk == -2)
	{
	$ch = "cancelled by JD";
	}
	?>
	<tr>
    <th>RegNo</th>
    <th>Status</th>
  </tr>
	<?php
	echo "<tr><td>
	".$row['RegNo']."</td><td>
	".$ch."</td></tr><br/>";
		
	}
} 
else 
{
    echo "0 results";
}

$conn->close();

?> 
</body>
</html>
