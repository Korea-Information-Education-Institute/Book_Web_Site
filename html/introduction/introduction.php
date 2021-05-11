<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <?php include "../head.php"; ?>
    <title>소개페이지</title>
    <link rel="stylesheet" href="../../css/main.css">
    <link rel="stylesheet" href="../../css/basic.css">
    <link rel="stylesheet" href="../../css/index.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Noto+Serif+KR:wght@200;300;400;500&family=Roboto:wght@100;300;500&display=swap" rel="stylesheet">
    <style>
        *{
            font-family: 'Roboto','Noto Serif KR', sans-serif;
        }
        .wrap{
            padding-top:7px;
        }
        .container{
            width: 980px;
            margin: 0 auto;
            height:800px;
        }
        .introduction {
            width: 980px;
            height: 120px;
            margin: 20px;
            padding-top:20px;
        }
        .introduction img{
            width: 100px;
            height: 100px;
            float: left;
        }
        h1{
            float: left;
            padding: 20px;
            margin-left:30px;
            line-height: 60px;
            font-size: 45px;
        }
        .containerNav ul li{
            margin: 20px;
            padding: 13px;
            display: inline-block;
            font-size: 20px;
            border: 1px solid black;
            margin-left:120px;
            margin-right:10px;
        }
        hr{
            margin: 20px;
        }
        .contents{
            margin: 20px;
        }
        .contents p{
            line-height:normal;
        }
    </style>
    
</head>
<body>
        <div class="wrap">
        <?php 
            include '../header.php';
        ?>
         <div class="container">
         <div class="introduction">
            <img src="../../img/introduction.png" alt="말풍선">
            <h1>Introduction</h1>
         </div>
         <hr>
         
         <div class="containerNav">
             <ul>
                 <li><a href="./introduction.php">사이트 소개</a></li>
                 <li><a href="./method.php">사이트 이용방법</a></li>
                 <li><a href="./faq.php">자주하는 질문</a></li>
             </ul>    
         </div>
         
         <div class="contents">
         <br><br>
             <h2>사이트 소개</h2>
             <br><br><br>
             <p>웹페이지의 제목은 "SPOILER", 부 제목은 "도서 소개 및 만담의 장"입니다.</p><br>
             <p>불특정 다수의 협업을 통해 직접 내용과 구조를 수정하여 정보를 알려주는 위키백과에 영감을 받았으며 프로젝트의 크기와 인력, 시간을 고려하여 주제를 도서로 제한하였습니다.</p><br>
             <p>다만 도서의 특성상 도서 제목, 작가, 발간일 등의 정보는 변경사항이 없는 내용이므로 출력만 하고 사람에 따라 자유롭게 해석이 가능한 책 소개부분만 수정이 가능하게 작성하였습니다.</p><br>
             <p>즉 잘못된 정보의 전달을 어느 정도 방지하기 위한 수단으로 부분적 수정을 적용하였습니다.</p><br>
             <p>또한 무분별한 수정의 방지책으로 회원가입을 통해서만 수정, 작성이 가능하게 구현하였습니다.</p><br>
             <p>시간과 인력이 부족하여 미숙한 부분이 많습니다. 차후에 관리자 공지사항, 회원탈퇴 등의 기능을 도입해 나가도록 하겠습니다.</p><br>
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