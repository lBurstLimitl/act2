<?php 

session_start();

	if(!isset($_SESSION['login'])){
		header("Location: userlogin.php");
	}

	if(isset($_GET['logout'])){
		session_destroy();
		unset($_SESSION);
		header("Location: userlogin.php");
	}

?>
<p>Welcome to index</p>
<a href="index.php?logout=true">Logout</a>