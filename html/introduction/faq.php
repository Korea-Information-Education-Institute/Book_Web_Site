
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <?php include "../head.php"; ?>
    <title>소개페이지</title>
    <link rel="stylesheet" href="../../css/main.css">
    <link rel="stylesheet" href="../../css/basic.css">
    <link rel="stylesheet" href="../../css/index.css">

    <style>
        .wrap{
            padding-top:7px;
        }  
        .container {
            width: 980px;
            margin: 0 auto;
            height:900px;
        }
        .introduction {
            width: 980px;
            height: 120px;
            margin: 20px;
            padding-top:20px;
        }
        .introduction img {
            width: 100px;
            height: 100px;
            float: left;
        }
        h1 {
            float: left;
            padding: 20px;
            margin-left:30px;
            line-height: 60px;
            font-size: 45px;
        }
        .containerNav ul li {
            margin: 20px;
            padding: 13px;
            display: inline-block;
            font-size: 20px;
            border: 1px solid black;
        }
        hr {
            margin: 20px;
        }
        .contents {
            margin: 20px;
        }
        .answer {
            display: none;
            padding-bottom: 30px;
        }
        #faq-title {
            font-size: 25px;
        }
        .faq-content {
            border-bottom: 1px solid #e0e0e0;
        }
        .question {
            font-size: 19px;
            padding: 30px 0;
            cursor: pointer;
            border: none;
            outline: none;
            background: none;
            width: 100%;
            text-align: left;
        }
        .question:hover {
            color: #2962ff;
        }
        [id$="-toggle"] {
            margin-right: 15px;
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
                <h2 id="faq-title">자주 묻는 질문(FAQ)</h2>
                <br><br><br>
                <div class="faq-content">
                    <button class="question" id="que-1"><span id="que-1-toggle">+</span><span>회원탈퇴가 가능한가요?</span></button>
                    <div class="answer" id="ans-1">차후에 도입하도록 하겠습니다.</div>
                </div>
                <div class="faq-content">
                    <button class="question" id="que-2"><span id="que-2-toggle">+</span><span>로드맵이 뭔가요?</span></button>
                    <div class="answer" id="ans-2">다른 사용자에게 추천하는 도서를 묶거나 순서대로 읽기를 권하는 게시글을 작성하는 게시판입니다.</div>
                </div>
                <div class="faq-content">
                    <button class="question" id="que-3"><span id="que-3-toggle">+</span><span>개인정보는 안전한가요?</span></button>
                    <div class="answer" id="ans-3">최소한의 개인정보만 수집하며 각 계정의 비밀번호는 암호화하여 안전하게 보관하고 있습니다.</div>
                </div>
            </div>
        </div>
        <?php 
        include "../javascript.php";
    ?>
        
    </div>
    <?php 
            include "../footer.php";
        ?>
    
    <script>
        const items = document.querySelectorAll('.question');

        function openCloseAnswer() {
            const answerId = this.id.replace('que', 'ans');

            if (document.getElementById(answerId).style.display === 'block') {
                document.getElementById(answerId).style.display = 'none';
                document.getElementById(this.id + '-toggle').textContent = '+';
            } else {
                document.getElementById(answerId).style.display = 'block';
                document.getElementById(this.id + '-toggle').textContent = '-';
            }
        }

        items.forEach(item => item.addEventListener('click', openCloseAnswer));
    </script>
</body></html>