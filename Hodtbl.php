<?php
$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "outpass";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) 
{
    die("Connection failed: " . $conn->connect_error);
} 

?>
<?php

if(isset($_POST['send']))
{
	$id = mysqli_real_escape_string($conn,$_POST['id']);
	$sql = "UPDATE request SET Status = 1 WHERE RegNo = $id";
	
	if(!mysqli_query($conn,$sql))
	{
		echo "error";
		echo $id;
	}
	mysqli_query($conn,$sql);
}

else if(isset($_POST['cancel']))
{
	$id = mysqli_real_escape_string($conn,$_POST['id']);
	$sql = "UPDATE request SET Status = -1 WHERE RegNo = $id";
}	mysqli_query($conn,$sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title></title>

    <!-- Bootstrap Core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

 

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        

        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Admin - View pin request</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                <div class="row">
                	<div class="col-lg-12">
                    	<div class="table-responsive">
                        	<table class="table table-striped table-bordered">
                            	<tr>
                                    <th>S.n.</th>
                                    <th>RegNo</th>
                                    <th>Address</th>
                                    <th>From</th>
                                    <th>To</th>
                                    <th>Reason</th>
                                </tr>
                                <?php
				       $query = mysqli_query($conn,"select * from request where Status = 0");
									if(mysqli_num_rows($query)>0){
										$i=1;
										while($row=mysqli_fetch_array($query)){
											$id = $row['RegNo'];
											$email = $row['Address'];
											$amount = $row['Frm'];
											$regno = $row['Till'];
											$reason = $row['Reason'];
										?>
                                        	<tr>
                                            	<td><?php echo $i; ?></td>
                                                <td><?php echo $email; ?></td>
                                                <td><?php echo $amount; ?></td>
                                                <td><?php echo $regno; ?></td>
												 <form method="post">
                                                	<input type="hidden" name="userid" value="<?php echo $email ?>">
                                                    <input type="hidden" name="amount" value="<?php echo $amount ?>">
                                                    <input type="hidden" name="id" value="<?php echo $id?>">
                                                	<td><input type="submit" name="send" value="Send" class="btn btn-primary"></td>
                                                </form>
												
                                                
                                                <form method="post">
                                                	<input type="hidden" name="userid" value="<?php echo $email ?>">
                                                    <input type="hidden" name="amount" value="<?php echo $amount ?>">
                                                    <input type="hidden" name="id" value="<?php echo $id ?>">
                                                	<td><input type="submit" name="cancel" value="Cancel" class="btn btn-primary"></td>
                                                </form>
											
                                            </tr>
                                        <?php
											$i++;
										}
									}
									else{
									?>
                                    	<tr>
                                        	<td colspan="6" align="center">You have no  request.</td>
                                        </tr>
                                    <?php
									}
								?>
                            </table>
                        </div><!--/.table-responsive-->
                    </div>
                </div><!--/.row-->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="dist/js/sb-admin-2.js"></script>

</body>

</html>