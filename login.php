<?php 
session_start(); 
include "db_conn.php";

//shikojme nese username dhe password eshte shkruar ne formen e login
if (isset($_POST['username']) && isset($_POST['password'])) {

	//tani sigurojme qe inputi eshte correct ose i perdorshem
	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$username = validate($_POST['username']);
	$password = validate($_POST['password']);
	$password1 = md5($password);

	
	//nese username dhe password nuk eshte dhene i zbrazet
	if (empty($username)) {
		header("Location: index.php?error=Username eshte i nevojshem");
	    exit();
	}else if(empty($password)){
        header("Location: index.php?error=Password eshte i nevojshem");
	    exit();
	}else{
		//marrim te dhenat nga databaza dhe shikojme nese nese kemi ndonje user te regjistruar
		$sql = "SELECT * FROM users WHERE username='$username' AND password='$password1'";
		$result = mysqli_query($conn, $sql);

		//nese kemi ndojne user qe plotson kushtin drejtohemi ne dashboard 
		if (mysqli_num_rows($result) === 1) {
			$row = mysqli_fetch_assoc($result);
            if ($row['username'] === $username && $row['password'] === $password1) {
            	$_SESSION['username'] = $row['username'];
				$_SESSION['password'] = $row['password'];
            	$_SESSION['name'] = $row['name'];
            	$_SESSION['id'] = $row['id'];
				$_SESSION['role'] = $row['role'];
				$_SESSION['email'] = $row['email'];
            	header("Location: dashboard.php");
		        exit();
				//nese nuk plotesohet kushti shkruajm error
            }else{
				header("Location: index.php?error=Keni shkruar gabim username ose password");
		        exit();
			}
		}else{
			header("Location: index.php?error=Keni shkruar gabim username ose password");
	        exit();
		}
	}
}else{
	header("Location: index.php?error=Nuk funksionon kodi ne rregull");
	exit();
}
