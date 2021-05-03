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
    #square_book1>img,#square_book2>img,#square_book3>img{
        width:141px;
        height:188px;
        border:1px solid black;
    }
    #square_book1>img:hover,#square_book2>img:hover,#square_book3>img:hover{
        box-shadow:2px 2px 2px 2px gray;
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
                <br><hr>
                <form method="POST" id="road_map_form" name="road_map_form" action="register_road_map.php" onsubmit="return input_check()">
                <br>Road Map 제목<br><br>
                    <input type="text" id="road_map_title" name="road_map_title" required><br><br>
                    <hr><br>
                    최대 3개의 책을 추가할 수 있습니다<br><br><br>
                    <div style="display:flex;display:center;">
                        <a id="square_book1" href="./add_book_to_roadmap.php?book1" onclick="window.open(this.href, '_blank', 'width=800, height=600'); return false;" style="margin-right:200px;display:block;"><img id="book1" src="../img/plus.PNG" alt="이미지가 없습니다."></a>
                        <input type="hidden" id="book1_data" name="book1_data" value="0">
                        <a id="square_book2" href="./add_book_to_roadmap.php?book2" onclick="window.open(this.href, '_blank', 'width=800, height=600'); return false;" style="margin-right:200px;display:none;"><img id="book2" src="../img/plus.PNG" alt="이미지가 없습니다."></a>
                        <input type="hidden" id="book2_data" name="book2_data" value="0">
                        <a id="square_book3" href="./add_book_to_roadmap.php?book3" onclick="window.open(this.href, '_blank', 'width=800, height=600'); return false;" style="margin-right:200px;display:none;"><img id="book3" src="../img/plus.PNG" alt="이미지가 없습니다."></a>
                        <input type="hidden" id="book3_data" name="book3_data" value="0">
                    </div>
                    <br><br><hr><br><br>
                    추천하는 사유를 자유롭게 작성해주세요. (최대 5000자)<br><br>
                    <textarea id="opinion" name="opinion" cols="136" rows="12" maxlength="5000" wrap="hard" required style="resize:none;padding:5px;"></textarea><br><br>
                    <!-- <img src="../img/plus.PNG" alt="이미지가 없습니다."> -->
                    <input type="submit" id="submit" value="작성완료">&nbsp;&nbsp;&nbsp;&nbsp;<input type="reset" id="reset" value="초기화">
                </form>
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