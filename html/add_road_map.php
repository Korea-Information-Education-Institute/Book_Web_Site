<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <?php include "./head.php"; ?>
    <title>Document</title>
</head>

<style>
    p{
        margin:0;
    }
    .container{
        height:1000px;
    }
    .container_inner{
        padding-top:20px;
        height:880px;
    }
    ol{
        list-style-type : upper-roman;
        margin:0;
    }
    ol>li{
        margin-bottom:10px;
    }
</style>


<body>
<div class="wrap">
        <?php
            include "./header.php";
        ?>
        <div class="container">
            <div class="container_inner">
                <h3>글쓰기 규칙 사항</h3><br>
                <ol>
                    <li>자유롭게 추천 도서를 묶으면 됩니다</li>
                    <li>비속어를 포함한 비방, 비난에 해당할 경우 계정 삭제 조치가 이루어집니다.</li>
                    <li>최대 3개까지 묶을 수 있습니다.</li>
                </ol>
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