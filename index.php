<?php 
include_once('header.php');
 ?>
	<div class="container">
		<section class="mt-5">
	   		<h1>This Is An Introduction</h1>
	   		<?php 
	   			if (isset($_SESSION['userid'])) {
	   				echo "<div class='alert alert-success' role='alert'>Hello there " . $_SESSION['userid'] . "</div>";
	   			}

	   		 ?>
	    	<p>Ad magna minim exercitation cupidatat dolor commodo incididunt minim ullamco excepteur fugiat culpa exercitation amet officia deserunt adipisicing.</p>
		</section>
		<section class="mt-5">
			<h2>Some Basic Categories</h2>
			<div class="row mt-5">
				<div class="col-4">
					<h4>Serious Stuff</h4>
				</div>
				<div class="col-4">
					<h4>Exciting Stuff</h4>
				</div>
				<div class="col-4">
					<h4>Boring Stuff</h4>
				</div>
			</div>
		</section>
	</div>

<?php 
include_once('footer.php');
 ?>