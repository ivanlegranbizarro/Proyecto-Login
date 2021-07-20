<?php 
	include_once('header.php');
 ?>

 <div class="container">
 	<section class="mt-5">
	   	<h1>Login here!</h1>
	   	<?php 
	   		if (isset($_GET['error'])) {
	   			if ($_GET['error'] == 'wronglogin') {
	   				echo "<div class='alert alert-danger' role='alert'>Oops! Something is wrong. Provide a correct email and a correct password!</div>";
	   			} elseif ($_GET['error'] == 'emptyinput') {
	   				echo "<div class='alert alert-danger' role='alert'>Oops! Something is wrong. You must fill all the fields!</div>";
	   			}
	   		}
	   	 ?>
	   	<form class="my-5" action="includes/login.inc.php" method="POST">
		  <div class="mb-3">
		    <label for="exampleInputEmail1" class="form-label">Email address</label>
		    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email">
		  </div>
		  <div class="mb-3">
		    <label for="exampleInputPassword1" class="form-label">Password</label>
		    <input type="password" class="form-control" id="exampleInputPassword1" name="password">
		  </div>
		  <button type="submit" name="submit" class="btn btn-primary">Login</button>
		</form>
 	</section>
 	
 </div>

<?php 
	include_once('footer.php');
?>