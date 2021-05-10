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
        }
        
        hr{
            margin: 20px;
        }
        
        .contents{
            margin: 20px;
        }
        
        .contents ul li{
            margin: 20px;
            list-style-type: disc;
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
             <h2>사이트 이용방법</h2>
             <br>
             <ul>
                 <li>비회원은 사이트를 둘러보고 책에 대한 정보를 얻을 수 있습니다.</li>
                 <li>회원가입을 통해 직접적인 편집기능을 활용하고 원하는 도서를 스크랩할 수 있습니다.</li>
                 <li>개인이 생각하기에 관련있는 도서들이나 추천 하고싶은 도서들을 묶어서 로드맵으로 글을 작성할 수 있습니다.</li>
                 <li>사용자 계정의 비밀번호는 암호화하여 안전하게 보관중입니다.</li>
             </ul>
         </div>
         </div>
         <?php 
            include "../footer.php";
        ?>
    </div>
</body>
</html>