<?php include("conn.php"); 
?>

<?php
if((isset($_POST['submit'])))
{
	$fname = ($_POST['fname']);
	$lname = $_POST['lname'];
	$address = $_POST['address'];
	$dob = $_POST['dob'];
	$pan = $_POST['pan'];
	$adhar = $_POST['adhar'];
	$pin = $_POST['pin'];
	$mobileno = $_POST['mobileno'];
	
      $query = "INSERT INTO customers(fname,lname,address,dob,pan,adhar,pin,mobileno) 
				VALUES ('$fname','$lname','$address','$dob','$pan','$adhar','$pin','$mobileno')";
	 
	 $fire = mysqli_query($conn, $query) or die("can not insert into database." .mysqli_error($conn));
	 
	 if($fire) echo '<script>alert("Thank You, You Are Registered Successfully.")</script>';
	}


?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>BMS Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container  mt-5">
  <h2>Registration form</h2>
  <form action="<?php $_SERVER['PHP_SELF']?>" method="POST">
  <div class="row">
  <div class="col-md-6">
    <div class="form-group">
      <label>First Name :</label>
      <input type="text" class="form-control" placeholder="Enter First Name" name="fname" required>
    </div>
    <div class="form-group">
      <label>Last Name :</label>
      <input type="text" class="form-control" placeholder="Enter Last Name" name="lname" required>
    </div>
	<div class="form-group">
      <label>Date Of Birth :</label>
      <input type="date" class="form-control" name="dob" required>
    </div>
	<div class="form-group">
      <label>Address :</label>
      <textarea type="text" class="form-control" name="address" rows="2" required></textarea>
    </div>
    </div>
	  <div class="col-md-6">
	<div class="form-group">
      <label>Molile Number :</label>
      <input type="number" class="form-control" name="mobileno" required>
    </div>
	<div class="form-group">
      <label>PAN Number :</label>
      <input type="text" class="form-control" placeholder="Enter Pan Number" name="pan" maxlength="10" required>
    </div>
	<div class="form-group">
      <label>Adhar Number :</label>
      <input type="number" class="form-control" placeholder="Enter Adhar Number" name="adhar" required>
    </div>
	<div class="form-group">
      <label>Pin Code :</label>
      <input type="text" class="form-control" placeholder="Enter Pin code" name="pin" required>
    </div>
    </div>
    </div>

    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
  </form>
</div>

<div class="container mt-5 mb-5">
  <h2>Transaction Details</h2>
  <p></p>            
  <table class="table table-striped">
    <thead>
      <tr>
        <th>First name</th>
        <th>Last name</th>
        <th>Mobile Number</th>
        <th>Date Of Birth</th>
        <th>current Balance</th>
        <th>Credit</th>
        <th>Debit</th>
      </tr>
    </thead>
    <tbody>
	<?php
			$q = "SELECT * FROM customers";
				$f = mysqli_query($conn,$q) or die("can not fetch the data." .mysqli_error($conn));
				
												if(mysqli_num_rows($f)>0)
											{
													while($user= mysqli_fetch_assoc($f))
												{
												?>
      <tr>
        <td><?php echo $user['fname']; ?></td>
        <td><?php echo $user['lname']; ?></td>
        <td><?php echo $user['mobileno']; ?></td>
        <td><?php echo $user['dob']; ?></td>
        <td><?php echo $user['current_balance']; ?></td>
        <td><a href="credit.php?id=<?php echo $user['id']; ?>" class="btn btn-success">Credit</a></td>
        <td><a href="debit.php?id=<?php echo $user['id']; ?>" class="btn btn-danger">Debit</a></td>
      </tr>
	  <?php 
												}
											}
	  ?>
    </tbody>
  </table>
</div>

</body>
</html>
