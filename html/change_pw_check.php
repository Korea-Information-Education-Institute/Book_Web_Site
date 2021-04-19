<meta charset="utf-8"/>
<?php 
	session_start();
	$user_id=$_SESSION[ 'user_id' ];			//세션을 통해 로그인한 사용자 아이디 저장
	$user_pw=md5($_POST['user_pw']);			//현재 비밀번호 저장
	$change_user_pw=md5($_POST['change_user_pw']);	//변경 비밀번호 저장
	//db연결 성공시 코드 수행
	if(include('./dbconnect.php')){
		$sql="SELECT * FROM user WHERE user_id='$user_id'";
		$result=mysqli_query($conn, $sql);
 		$row=mysqli_fetch_array($result);
		//echo "<script>alert("$user_pw");</script>";
		if($row['user_pw']==$user_pw){
			$sql="UPDATE user SET user_pw='$change_user_pw' WHERE user_pw='$user_pw' ";
			if(mysqli_query($conn, $sql)){
				echo "<script>alert('비밀번호를 변경하였습니다.')</script>";
				echo "<script>location.href='./mypage.php'</script>";
			}else{
				echo "<script>alert('비밀번호 변경을 실패하였습니다.')</script>";
				echo "<script>location.href='./change_pw.php'</script>";
			}
		}else{
			echo "<script>alert('현재 비밀번호를 잘못 입력하였습니다.')</script>";
			echo "<script>location.href='./change_pw.php'</script>";
		}
	}
	
	//DB 닫기
	mysqli_close($conn);
?>