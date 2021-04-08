<!DOCTYPE html>
<html lang="ko">
<?php session_start(); ?>
<head>
    <meta charset="UTF-8">
    <title>소개페이지</title>
    <link rel="stylesheet" href="../../css/basic.css">
    <link rel="stylesheet" href="../../css/index.css">
    
    <?php
        if( isset( $_SESSION[ 'user_id' ] ) ) {
            echo "<style>#logined{display:inline-block;}</style>";
            echo "<style>#logouted{display:none;}</style>";
        }else{
            echo "<style>#logined{display:none;}</style>";
        echo "<style>#logouted{display:inline-block;}</style>";
        }
    ?>

    <style>
        .container{
            width: 980px;
            margin: 0 auto;
        }
        
        .introduction {
            width: 980px;
            height: 150px;
            margin: 20px;
            
        }
        
        .introduction img{
            width: 150px;
            height: 150px;
            float: left;
        }
        
        h1{
            float: left;
            padding: 20px;
            line-height: 120px;
            font-size: 50px;
        }
        
        .containerNav ul li{
            margin: 20px;
            padding: 13px;
            display: inline-block;
            font-size: 20px;
            border: 1px solid black;
        }
        
        hr{
            margin: 20px;
        }
        
        .contents{
            margin: 20px;
        }
    </style>
</head>
<body>
        <div class="wrap">
        <div class="header">
            <div class="header_inner">
                <div class="header_logo">
                <a href="../index.php"><img src="#" alt="로고"></a>
                </div>
                <div class="header_nav">
                    <ul>
                        <li><a href="./introduction.php">소개페이지</a></li>
                        <li><a href="">책분야</a></li>
                        <li><a href="">로드맵</a></li>
                        <li><a href="../mypage.php">마이페이지</a></li>
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
                    <input type="text">
                    <button type="submit">검색</button>
                </div>
            </div>
        </div>
         <div class="container">
         <div class="introduction">
             <img src="../../img/2360248.png" alt="말풍선">
             <h1>소개페이지</h1>
         </div>
         
         <br>
         <hr>
         
         <div class="containerNav">
             <ul>
                 <li><a href="./introduction.php">사이트 소개</a></li>
                 <li><a href="./method.html">사이트 이용방법</a></li>
                 <li><a href="./directionality.html">사이트의 방향성</a></li>
                 <li><a href="./faq.html">자주하는 질문</a></li>
                 <li><a href="./notice.html">공지사항</a></li>
             </ul>    
         </div>
         
         <div class="contents">
            
             <h2>사이트 소개</h2>
             <br>
             <p>내용</p>
         </div>
         </div>
         <?php 
            include "../footer.php";
        ?>
    </div>
    <?php 
        include "../javascript.php";
    ?>
</body>
</html>