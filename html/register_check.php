<meta charset="utf-8"/>
<?php 
    	session_start();  				//세션 시작
    	$user_id=$_POST['user_id'];			//아이디 저장
    	$user_pw=md5($_POST['user_pw']);		//비밀번호 저장(md5 암호화 알고리즘 적용)
	$user_nickname=$_POST['user_nickname'];	//닉네임 저장
	$user_name=$_POST['user_name'];		//이름 저장
	$user_birth=$_POST['user_birth'];		//생일 저장
	$user_gender=$_POST['user_gender'];		//성별 저장

	//db연결 php파일 호출
	if(include('./dbconnect.php')){
		//수행할 쿼리문
		$sql = "INSERT INTO user VALUES('$user_id','$user_pw','$user_nickname','$user_name','$user_birth','$user_gender') ";
		//쿼리문 수행 결과 저장
    		$result = mysqli_query($conn, $sql);
		
		//회원가입 실패 코드
    		if($result===false){
			echo "<script>window.alert('회원가입에 실패하였습니다.');</script>";
   			echo "<script>location.href='./register.php';</script>";

		//회원가입 성공 코드
		}else{	
   			echo "<script>window.alert('회원가입 하였습니다.');</script>";
   			echo "<script>location.href='./login.php';</script>";
		}
	}
?>