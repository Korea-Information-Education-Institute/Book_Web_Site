<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <title>소개페이지</title>
    <link rel="stylesheet" href="../../css/header.css">
    <link rel="stylesheet" href="../../css/index.css">
    
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
            <?php 
                include '../header.php';
            ?>
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
                 <li><a href="./method.php">사이트 이용방법</a></li>
                 <li><a href="./directionality.php">사이트의 방향성</a></li>
                 <li><a href="./faq.php">자주하는 질문</a></li>
                 <li><a href="./notice.php">공지사항</a></li>
             </ul>    
         </div>
         
         <div class="contents">
            
             <h2>사이트의 방향성</h2>
             <br>
             <p>내용</p>
         </div>
         </div>
         <?php 
            include "../footer.php";
        ?>
    </div>
</body>
</html>