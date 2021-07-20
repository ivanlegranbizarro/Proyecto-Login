<?php

if (isset($_POST['submit'])) {
	$username = $_POST['username'];
	$email = $_POST['email'];
	$password1 = $_POST['password'];
	$password2 = $_POST['repeat-password'];

	require_once 'dbh.inc.php';
	require_once 'functions.inc.php';

	if (emptyInputSignup($username, $email, $password1, $password2) !== false) {
		header('Location: ../signup.php?error=emptyinput');
		exit();
	}

	if (invalidUsername($username) !== false) {
		header('Location: ../signup.php?error=invalidUsername');
		exit();
	}

	if (invalidEmail($email) !== false) {
		header('Location: ../signup.php?error=invalidEmail');
		exit();
	}

	if (passwordMatch($password1, $password2) !== false) {
		header('Location: ../signup.php?error=passwordsdontMatch');
		exit();
	}


	if (emailExists($connexion, $email) !== false) {
		header('Location: ../signup.php?error=emailExists');
		exit();
	}

	createUser($connexion, $username, $email, $password1);

} else {
	header('Location: ../signup.php');
}