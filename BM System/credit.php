<?php include('conn.php'); ?>
<?php
		if(isset($_GET['id'])){
			$id=$_GET['id'];
			
			$qu = "SELECT * FROM customers WHERE id=$id";
			$fi = mysqli_query($conn,$qu) or die("can not fetch the data." .mysqli_error($conn));
			$use= mysqli_fetch_assoc($fi);
			$bs= $use['current_balance'];
		
 ?>
<?php
//connection
   if(isset($_POST['credit']))
   { 
	$current_balance = $_POST['cr'];
   $total=$current_balance + $bs;
	 
   $query="UPDATE customers SET current_balance='$total' WHERE id=$id"; 
   $fire=mysqli_query($conn,$query)or die("data can not be update." .mysqli_error($conn));
   if($fire)
	   echo"<script>alert('Ammount Added Successfully');</script>";
		header('Location: index.php');
   
   }
		}
   ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Credit</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
<?php		
			$id=$_GET['id'];
			$q = "SELECT * FROM customers WHERE id=$id";
				$f = mysqli_query($conn,$q) or die("can not fetch the data." .mysqli_error($conn));
				
												if(mysqli_num_rows($f)>0)
											{
													while($user= mysqli_fetch_assoc($f))
												{
												?>

<div class="container mt-5">
  <h2>Credit Ammount</h2>
    <div class="form-group">
      <label>Customer Name :</label>
      <input type="text" class="form-control" id="email" value="<?php echo $user['fname'];?>&nbsp;<?php echo $user['lname'];?>" readonly>
    </div>
<form action="<?php $_SERVER['PHP_SELF']?>" method="POST">
	<div class="form-group">
      <label>Credit :</label>
      <input type="number" class="form-control" placeholder="Enter Ammount" name="cr">
    </div>
    <button type="submit" name="credit" class="btn btn-success">submit</button>
</form>
</div>
<?php
												}
											}
 ?>

</body>
</html>
