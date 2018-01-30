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
	$First = $_POST['first'];
	$Last = $_POST['last'];
	$Year = $_POST['year'];
	$Branch = $_POST['branch'];
	$Regno = $_POST['Registration'];
	$Hostel = $_POST['Hostel'];
	$Flank = $_POST['Flank'];
	$RoomNo = $_POST['RoomNo'];
	$Phone = $_POST['phone'];



	$sql = "INSERT INTO studentdata (Fname,Lname,Year,Branch,RegNo,Hostel,Flank,RoomNo,Phone) VALUES ('$First','$Last','$Year','$Branch','$Regno','$Hostel','$Flank','$RoomNo','$Phone')";

	if(!mysqli_query($con,$sql))
	{
		echo "not inserted";
	}
	else
	{
		echo "inserted";
	}
	header("refresh : 1 ;url = datafeed.html");
?>
