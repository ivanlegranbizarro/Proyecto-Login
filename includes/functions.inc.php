<?php

function emptyInputSignup($username, $email, $password1, $password2) 
{
	$result;
	if (empty($username) || empty($email) || empty($password1) || empty($password2)) {
		$result = true;
	} else {
		$result = false;
	}

	return $result;
}

function invalidUsername($username)
{
	$result;
	if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
		$result = true;
	} else {
		$result = false;
	}

	return $result;
}

function invalidEmail($email)
{
	$result;
	if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		$result = true;
	} else {
		$result = false;
	}

	return $result;
}

function passwordMatch($password1, $password2)
{
	$result;
	if ($password1 !== $password2) {
		$result = true;
	} else {
		$result = false;
	}

	return $result;
}


function emailExists($connexion, $email)
{
	$sql = "SELECT * FROM users WHERE userEmail = ?;";
	$stmt = mysqli_stmt_init($connexion);
	if (!mysqli_stmt_prepare($stmt, $sql)) {
		header('Location: ../signup.php?error=stmtfailed');
		exit();
	}

	mysqli_stmt_bind_param($stmt, "s", $email);
	mysqli_stmt_execute($stmt);

	$resultData = mysqli_stmt_get_result($stmt);

	if ($row = mysqli_fetch_assoc($resultData)) {
		return $row;
	} else {
		$result = false;
		return $result;
	}

	mysqli_stmt_close($stmt);
}


function createUser($connexion, $username, $email, $password1)
{
	$sql = "INSERT INTO users (userName, userEmail, userPassword) VALUES(?, ?, ?);";
	$stmt = mysqli_stmt_init($connexion);
	if (!mysqli_stmt_prepare($stmt, $sql)) {
		header('Location: ../signup.php?error=stmtfailed');
		exit();
	}

	$hashPassword = password_hash($password1, PASSWORD_DEFAULT);

	mysqli_stmt_bind_param($stmt, "sss", $username, $email, $hashPassword);
	mysqli_stmt_execute($stmt);
	mysqli_stmt_close($stmt);
	header('Location: ../signup.php?error=none');
	exit();
}


function emptyInputLogin($email, $password)
{
	$result;
	if (empty($email) || empty($password)) {
		$result = true;
	} else {
		$result = false;
	}

	return $result;
}


function loginUser($connexion, $email, $password)
{
	$userExists = emailExists($connexion, $email);

	if ($userExists === false) {
		header('Location: ../login.php?error=wronglogin');
		exit();
	}

	$passwordHashed = $userExists['userPassword'];
	$checkPassword = password_verify($password, $passwordHashed);

	if ($checkPassword === false) {
		header('Location: ../login.php?error=wronglogin');
	} elseif ($checkPassword === true) {
		session_start();
		$_SESSION['userid'] = $userExists['userName'];
		header('Location: ../index.php');
		exit();
	}
}