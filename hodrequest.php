<?php
$con = mysqli_connect('localhost','root','');

	if(!$con)
	{
		echo"not connected to server";
	}
	if(!mysqli_select_db($con,'outpass'))
	{
		echo"database not selected";
	}
	
	$Regno = $_POST['Registration'];
	$Address = $_POST['address'];
	$Frm = $_POST['frm'];
	$Till = $_POST['till'];
	$Reason = $_POST['reason'];
  $status = 0;


	$sql = "INSERT INTO request (RegNo,Address,Frm,Till,Reason,Status) VALUES ('$Regno','$Address','$Frm','$Till','$Reason','$status')";

	if(!mysqli_query($con,$sql))
	{
		echo "not inserted";
	}
	else
	{
		echo "inserted";
	}
	header("refresh : 1 ;url = outform.php");
?>
