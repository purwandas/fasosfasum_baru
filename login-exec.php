<?php
	//Start session
	session_start();
	
	//Include database connection details
	require_once('config.php');
	
	//Array to store validation errors
	$errmsg_arr = array();
	
	//Validation error flag
	$errflag = false;
	
	//Connect to mysql server
	$link = mysql_connect(DB_HOST, DB_USER, DB_PASSWORD);
	if(!$link) {
		die('Failed to connect to server: ' . mysql_error());
	}
	
	//Select database
	$db = mysql_select_db(DB_DATABASE);
	if(!$db) {
		die("Unable to select database");
	}
	
	//Function to sanitize values received from the form. Prevents SQL injection
	function clean($str) {
		$str = @trim($str);
		if(get_magic_quotes_gpc()) {
			$str = stripslashes($str);
		}
		return mysql_real_escape_string($str);
	}
	
	//Sanitize the POST values
	$login = clean($_POST['login']);
	$password = clean($_POST['password']);
	
	//Input Validations
	if($login == '') {
		$errmsg_arr[] = 'Login ID missing';
		$errflag = true;
	}
	if($password == '') {
		$errmsg_arr[] = 'Password missing';
		$errflag = true;
	}
	
	//If there are input validations, redirect back to the login form
	if($errflag) {
		$_SESSION['ERRMSG_ARR'] = $errmsg_arr;
		session_write_close();
		header("location: login.php?e=1");
		exit();
	}
	
	//Create query
	$qry="SELECT * FROM members inner join memberslevel on members.level=memberslevel.level WHERE login='$login' AND passwd='".md5($_POST['password'])."'";
	$result=mysql_query($qry);
	
	//Check whether the query was successful or not
	if($result) {
		if(mysql_num_rows($result) == 1) {
			//Login Successful
			session_regenerate_id();
			$member = mysql_fetch_assoc($result);
			$_SESSION['SESS_MEMBER_ID'] = $member['member_id'];
			$_SESSION['SESS_USERNAME'] = $member['login'];
			$_SESSION['SESS_FIRST_NAME'] = $member['firstname'];
			$_SESSION['SESS_LAST_NAME'] = $member['lastname'];
			$_SESSION['SESS_LEVEL']= $member['level'];
			$_SESSION['SESS_WILAYAH']= $member['wilayah'];
			$_SESSION['SESS_JABATAN']= $member['role'];
			$_SESSION['SESS_NAMA_TTD']= $member['namattd'];
			$_SESSION['SESS_JABATAN_TTD']= $member['jabatanttd'];
			session_write_close();


			include "config.php";
			$waktu = gmdate("Y-m-d H:i:s", time()+60*60*7);
			$user = $member['firstname'].' '.$member['lastname'];
			$query = mysql_query("insert into loging values('','$user','login','$waktu')") or die(mysql_error());
			
			header("location: index.php?hal=home");
			exit();
		}else {
			//Login failed
			header("location: login.php?e=1");
			exit();
		}
	}else {
		die("Query failed");
	}
?>