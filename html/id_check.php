<meta charset="utf-8"/>
<?php 
	$user_id=$_GET['user_id'];			//아이디 저장
	
	//db연결 성공시 코드 수행
	if(include('./dbconnect.php')){
		$sql="SELECT COUNT(*) FROM user WHERE user_id='$user_id'";
		$result=mysqli_query($conn, $sql);
 		$row=mysqli_fetch_array($result);

		if($row[0]==1){
			echo "<script>opener.document.getElementById('checked_id').value=0;</script>";
			echo "<script>alert('사용중인 ID입니다.');</script>";
			echo "<script>window.close();</script>";
		}else{
			echo "<script>opener.document.getElementById('check_id').disabled=true;</script>";
			echo "<script>opener.document.getElementById('checked_id').value=1;</script>";
			echo "<script>opener.document.getElementById('user_id').disabled=true;</script>";
			echo "<script>alert('사용 가능한 ID입니다.');</script>";
			echo "<script>window.close();</script>";
		}
	}
	mysqli_close($conn);
?>