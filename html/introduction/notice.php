<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <title>소개페이지</title>
    <link rel="stylesheet" href="../../css/main.css">
    <link rel="stylesheet" href="../../css/basic.css">
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
        
        .table{
            width: 935px;
            height: 500px;
            border-collapse: collapse;
        

        }
        
        .table td,th{
            border: 1px solid #999;
            padding: 9px;
            text-align: center;
        }
        
        .table td.title{
            text-align: left;
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
            
             <h2>공지사항</h2>
             <br>
             
             <table class="table">
                 <thead>
                     <tr>
                         <th class="num">번호</th>
                         <th class="title">제목</th>
                         <th>작성자</th>
                         <th>작성일</th>
                         <th class="num2">조회수</th>
                     </tr>
                 </thead>
                 
                 <tbody>
                     <tr>
                         <td class="num">5</td>
                         <td class="title"><a href="">외국인은 국제법과 조약이 정하는 바에 의하여 그 지위가 보장된다.</a></td>
                         <td>관리자</td>
                         <td>2021.04.01</td>
                         <td class="num2">11</td>
                     </tr>
                     
                     <tr>
                         <td class="num">4</td>
                         <td class="title"><a href="">법관은 헌법과 법률에 의하여 그 양심에 따라 독립하여 심판한다.</a></td>
                         <td>관리자</td>
                         <td>2021.03.31</td>
                         <td class="num2">8</td>
                     </tr>
                     
                     <tr>
                         <td class="num">3</td>
                         <td class="title"><a href="">대통령은 법률이 정하는 바에 의하여 훈장 기타의 영전을 수여한다.</a></td>
                         <td>관리자</td>
                         <td>2021.03.31</td>
                         <td class="num2">6</td>
                     </tr>
                     
                     <tr>
                         <td class="num">2</td>
                         <td class="title"><a href="">국회는 국민의 보통·평등·직접·비밀선거에 의하여 선출된 국회의원으로 구성한다.</a></td>
                         <td>관리자</td>
                         <td>2021.03.27</td>
                         <td class="num2">11</td>
                     </tr>
                     
                     <tr>
                         <td class="num">1</td>
                         <td class="title"><a href="">감사원은 세입·세출의 결산을 매년 대통령과 차년도국회에 그 결과를 보고하여야 한다.</a></td>
                         <td>관리자</td>
                         <td>2021.03.27</td>
                         <td class="num2">17</td>
                     </tr>
                 </tbody>
             </table>
             
             

         </div>
         </div>
         <?php 
            include "../footer.php";
        ?>
    </div>
</body>
</html>