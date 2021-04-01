<meta charset="utf-8"/>
<?php 
			       //서버 로컬, 계정아이디, 비밀번호 ,   DB이름
    	$conn = mysqli_connect("localhost", "khsung0", "gmltjd1!" , "khsung0");
	if ($conn->connect_errno) { 
		return false;
	}else{
		return true;
	}
?>