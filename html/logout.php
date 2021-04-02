<meta charset="utf-8"/>
<?php  
	session_start();
	unset($_SESSION['user_id']);
	unset($_SESSION['user_name']);
	echo "<script>history.back();</script>";
?>