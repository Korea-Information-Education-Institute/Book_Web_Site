<!DOCTYPE html>
<html lang="ko">
<?php session_start(); ?>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/basic.css">
    <link rel="stylesheet" href="../css/index.css?after"> <!--  캐시문제로 서버에서 외부스타일시트 변경사항이 적용안되어 임의의 문자열삽입 -->
    <title>Document</title>
</head>

<?php
  if( isset( $_SESSION[ 'user_id' ] ) ) {
    echo "<style>#logined{display:inline-block;}</style>";
    echo "<style>#logouted{display:none;}</style>";
  }else{
    echo "<style>#logined{display:none;}</style>";
    echo "<style>#logouted{display:inline-block;}</style>";
  }
?>

<body>
    <div class="wrap">
        <div class="header">
            <div class="header_inner">
                <div class="header_logo">
                <a href="./index.php"><img src="#" alt="로고"></a>
                </div>
                <div class="header_nav">
                    <ul>
                        <li><a href="./introduction/introduction.php">소개페이지</a></li>
                        <li><a href="./book_list.php">책분야</a></li>
                        <li><a href="">로드맵</a></li>
                        <li><a href="./mypage.php">마이페이지</a></li>
                    </ul>
                </div>
                <div class="login_menu" id="logouted">
                    <button type="button" onClick="location.href='./login.html'">로그인</button>
                    <button type="button" onClick="location.href='./register.html'">회원가입</button>
                </div>
	            <div class="login_menu" id="logined">
                    <?php
		            echo $_SESSION['user_name']."님 환영합니다.";
	                ?>
                    <button type="button" onClick="location.href='./logout.php'">로그아웃</button>
                </div>
                <div class="search">
                    <?php 
                        include './search.php';
                    ?>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="container_inner">
                <div class="moving">
                    <ul>
                        <li>1</li>
                        <li>2</li>
                        <li>3</li>
                        <li>4</li>
                        <li>5</li>
                    </ul>
                </div>
                <div class="box">
                   <ul class="section">
                       <li>책1</li>
                       <li>책1</li>
                       <li>책1</li>
                   </ul>
                   <ul class="section">
                       <li>책1</li>
                       <li>책1</li>
                       <li>책1</li>
                   </ul>
                   <ul class="section">
                       <li>책1</li>
                       <li>책1</li>
                       <li>책1</li>
                   </ul>
                </div>
            </div>
        </div>
        <div class="footer">
            <div class="footer_inner">
                <p>푸터입니다.</p>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="../javascript/search.js"></script>
</body>

</html>