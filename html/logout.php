<meta charset="utf-8"/>
<?php  
	session_start();
	unset($_SESSION['user_id']);
	unset($_SESSION['user_name']);
	unset($_SESSION['book_genre']);
	echo "<script>location.href='http://khsung0.dothome.co.kr/html/index.php';</script>"
	// echo "<script>history.back();</script>";
?>