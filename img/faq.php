
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <title>소개페이지</title>
    <link rel="stylesheet" href="../../css/main.css">
    <link rel="stylesheet" href="../../css/basic.css">
    <link rel="stylesheet" href="../../css/index.css">

    <style>
        .container {
            width: 980px;
            margin: 0 auto;
        }

        .introduction {
            width: 980px;
            height: 150px;
            margin: 20px;

        }

        .introduction img {
            width: 150px;
            height: 150px;
            float: left;
        }

        h1 {
            float: left;
            padding: 20px;
            line-height: 120px;
            font-size: 50px;
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

                <br>
                <h2 id="faq-title">자주 묻는 질문(FAQ)</h2>
                <div class="faq-content">
                    <button class="question" id="que-1"><span id="que-1-toggle">+</span><span>신고는 어떻게 하나요?</span></button>
                    <div class="answer" id="ans-1">근로조건의 기준은 인간의 존엄성을 보장하도록 법률로 정한다. 행정각부의 장은 국무위원 중에서 국무총리의 제청으로 대통령이 임명한다. 행정권은 대통령을 수반으로 하는 정부에 속한다.</div>
                </div>
                <div class="faq-content">
                    <button class="question" id="que-2"><span id="que-2-toggle">+</span><span>로드맵이 뭔가요?</span></button>
                    <div class="answer" id="ans-2">국회의원의 선거구와 비례대표제 기타 선거에 관한 사항은 법률로 정한다. 누구든지 체포 또는 구속을 당한 때에는 즉시 변호인의 조력을 받을 권리를 가진다. 다만, 형사피고인이 스스로 변호인을 구할 수 없을 때에는 법률이 정하는 바에 의하여 국가가 변호인을 붙인다.</div>
                </div>
                <div class="faq-content">
                    <button class="question" id="que-3"><span id="que-3-toggle">+</span><span>로그인이 안될땐 어떻게 해야 하나요?</span></button>
                    <div class="answer" id="ans-3">국민경제의 발전을 위한 중요정책의 수립에 관하여 대통령의 자문에 응하기 위하여 국민경제자문회의를 둘 수 있다. 대통령이 궐위되거나 사고로 인하여 직무를 수행할 수 없을 때에는 국무총리, 법률이 정한 국무위원의 순서로 그 권한을 대행한다.</div>
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