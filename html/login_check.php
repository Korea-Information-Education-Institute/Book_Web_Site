<meta charset="utf-8"/>
<?php  
    	session_start();  				//세션 시작
    	$user_id=$_POST['user_id'];			//아이디 저장
    	$user_pw=md5($_POST['user_pw']);		//비밀번호 저장(md5 암호화 알고리즘 적용)

	//db연결 php파일 호출
	if(include('./dbconnect.php')){
		//수행할 쿼리문
		$sql = "SELECT * FROM user where user_id='$user_id' and user_pw='$user_pw' ";
		//쿼리문 수행 결과 저장
    		$result = mysqli_query($conn, $sql);
		//user_id가 PK이므로 최대 1행 반환
    		$row = mysqli_fetch_array($result);	

		//user_id와 user_pw 일치하면 로그인 성공 코드실행
    		if($user_id==$row['user_id'] && $user_pw==$row['user_pw']){
			//세션에 user_id와 user_name 뿌림
   			$_SESSION['user_id']=$row['user_id'];
   			$_SESSION['user_name']=$row['user_name'];
			echo "<script>alert('로그인 성공!!');</script>";
   			echo "<script>location.href='./index.php';</script>";

		//로그인 실패 코드
		}else{	
   			echo "<script>window.alert('회원정보가 일치하지 않습니다.');</script>";
   			echo "<script>location.href='./login.html';</script>";
		}
	}
?>