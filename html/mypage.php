<!DOCTYPE html>
<html lang="ko">
<?php session_start(); ?>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/basic.css">
    <link rel="stylesheet" href="../css/index.css">
    <title>Document</title>
</head>

<?php
//세션에 user_id 변수가 있을 경우 로그인 상태로 판단
  if( isset( $_SESSION[ 'user_id' ] ) ) {
    echo "<style>#logined{display:inline-block;}</style>";
    echo "<style>#logouted{display:none;}</style>";
//변수가 없으면 로그아웃된 상태로 판단
  }else{
    echo "<style>#logined{display:none;}</style>";
    echo "<style>#logouted{display:inline-block;}</style>";
    echo "<script>alert('로그인을 하십시오.')</script>";
    echo "<script>location.href='./login.php';</script>";
  }
?>

<body>
    <div class="wrap">
        <?php
            include "./header.php";
        ?>
        <div class="container">
            <div class="container_inner">
                <?php
		if( isset( $_SESSION[ 'user_id' ] ) ) {
			if(include('./dbconnect.php')){
				$user_id=$_SESSION[ 'user_id' ];
				$sql="SELECT * FROM user WHERE user_id='$user_id'";
				$result=mysqli_query($conn, $sql);

				//결과는 1행밖에 없기 때문에 while문은 한번만 반복
				while($row=mysqli_fetch_array($result)){
					echo "<p>아이디 : {$row['user_id']}</p>";
					echo "<p>닉네임 : {$row['user_nickname']}</p>";
					echo "<p>이름 : {$row['user_name']}</p>";
					echo "<p>생일 : {$row['user_birth']}</p>";
					if ($row['user_gender']=="m"){
						echo "<p>성별 : 남성</p>";
					}else{
						echo "<p>성별 : 여성</p>";
					}
				}
			}
			mysqli_close($conn);
		}
	    ?>
	    <button type="button" onClick="location.href='./change_pw.php'">비밀번호 변경</button>
            </div>
        </div>
        <?php
            include "./footer.php";
        ?>
    </div>
    <?php
        include "./javascript.php";
    ?>
</body>
</html>