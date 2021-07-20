<?php 
	include_once('header.php');
 ?>

 <div class="container">
 	<section class="mt-5">
	   	<h1>Sign Up here!</h1>
	   	<?php 
	   		if (isset($_GET['error'])) {
	   			if ($_GET['error'] == 'emptyinput') {
	   				echo "<div class='alert alert-danger' role='alert'> You must fill all the fields!</div>";
	   			} elseif ($_GET['error'] == 'invalidUsername') {
	   					echo "<div class='alert alert-danger' role='alert'>This user name is not valid!</div>";
	   			} elseif ($_GET['error'] == 'invalidEmail') {
	   					echo "<div class='alert alert-danger' role='alert'>This email account is not valid!</div>";
	   			} elseif ($_GET['error'] == 'passwordsdontMatch') {
	   					echo "<div class='alert alert-danger' role='alert'>The Passwords do not match!</div>";
	   			} elseif ($_GET['error'] == 'emailExists') {
	   					echo "<div class='alert alert-danger' role='alert'>This emmail account is already registered!</div>";
	   			} elseif ($_GET['error'] == 'none') {
	   					echo "<div class='alert alert-success' role='alert'>The user was registered successfully!</div>";
	   			} elseif ($_GET['error'] == 'stmtfailed') {
	   					echo "<div class='alert alert-danger' role='alert'>Somewthing went wrong, try again, please!</div>";
	   			}
	   		}
	   	 ?>
	   	<form class="my-5" action="includes/signup.inc.php" method="POST">
		  <div class="mb-3">
		    <label for="exampleInputEmail1" class="form-label">Email address</label>
		    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email">
		  </div>
		  <div class="mb-3">
		    <label for="exampleInputUsername1" class="form-label">Username</label>
		    <input type="text" class="form-control" id="exampleInputUsername1" aria-describedby="usernameHelp" name="username">
		  </div>
		  <div class="mb-3">
		    <label for="exampleInputPassword1" class="form-label">Password</label>
		    <input type="password" class="form-control" id="exampleInputPassword1" name="password">
		  </div>
		  <div class="mb-3">
		    <label for="exampleInputPassword2" class="form-label">Repeat Password</label>
		    <input type="password" class="form-control" id="exampleInputPassword2" name="repeat-password">
		  </div>
		  <button type="submit" name="submit" class="btn btn-primary">Submit</button>
		</form>
 	</section>
 </div>

 <?php 
	include_once('footer.php');
  ?>