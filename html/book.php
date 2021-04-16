<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/book.css">
    <link rel="stylesheet" href="../css/basic.css">
    <link rel="stylesheet" href="../css/index.css?after">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Document</title>
</head>
<script>
    function update_intro(){
        var edit_btn=document.getElementById('edit_btn');
        var intro=document.getElementById('intro');
        if(edit_btn.value=='edit'){
            edit_btn.innerText = '확인';
            edit_btn.value='confirm';
            intro.contentEditable=true;
        }else{
            edit_btn.innerText = '편집하기';
            edit_btn.value='edit';
            intro.contentEditable=false;
        }
    }
</script>
<body>
    <?php
        header('Content-Type: text/html; charset=utf-8');
        //출력할 책의 제목 추출
        $temp_title=str_replace("_"," ",URLDecode($_SERVER['QUERY_STRING']));
        //echo $temp_title;
        if(include('./dbconnect.php')){
            $sql = "SELECT * FROM `book` WHERE `book_title` LIKE '%$temp_title%'";
            $result = mysqli_query($conn, $sql);
            $count = mysqli_num_rows($result);
            $row = mysqli_fetch_array($result);
            $row['book_index']=(int)$row['book_index'];
            // echo $row['book_title'].'<br>';
            // echo $row['book_writer'].'<br>';
            // echo $row['book_price'];
            // echo "<pre style='white-space: pre-wrap;'>$row[book_introduce]</pre>";
        }
    ?>
    <div class="wrap">
        <?php 
            include './header.php';
            if(include('./dbconnect.php')){
                //이부분오류
                //if( isset( $_SESSION[ 'user_id' ] ) ){
                    $sql2 = "SELECT * FROM `scrap` WHERE `user_id` = '$_SESSION[user_id]' AND `book_index`=$row[book_index]";
                    $result2 = mysqli_query($conn, $sql2);
                    //echo gettype($_SESSION['user_id']);
                    //echo gettype((int)$row['book_index']);
                    $row2 = mysqli_fetch_array($result2);
                    echo $row2;
                    if ($result2 ===false){
                        echo "<style>#scrap{display:inline-block;}</style>";
                        echo "<style>#scraped{display:none;}</style>";
                    }else if(mysqli_num_rows($result2)==1){
                        echo "<style>#scrap{display:none;}</style>";
                        echo "<style>#scraped{display:inline-block;}</style>";
                    }
                    else{
                        echo "<style>#scrap{display:none;}</style>";
                        echo "<style>#scraped{display:inline-block;}</style>";
                    }
            }
        ?>
        <div class="container">
            <div class="container_inner" style="text-align:center;">
                <br><br>
                <img src=<?php echo $row['book_img_address']?> alt="이미지" width="300" height="400">
                <br><br>
                <button id="scrap">&#x2661;좋아요</button>
                <button id="scraped">&#x1f493;좋아요 취소</button>
                <br><br><br><br>
                <table>
                    <tr>
                        <th>제목</th>
                        <td><?php echo $row['book_title'];?></td>
                    </tr>
                    <tr>
                        <th>작가</th>
                        <td><?php echo $row['book_writer'];?></td>
                    </tr>
                    <tr>
                        <th>장르</th>
                        <td><?php echo $row['book_genre'];?></td>
                    </tr>
                    <tr>
                        <th>발간일</th>
                        <td><?php echo $row['book_publication_date'];?></td>
                    </tr>
                    <tr>
                        <th>가격</th>
                        <td><?php echo $row['book_price'];?></td>
                    </tr>
                </table>
                <div>
                <hr>
                    <h1 style="text-align:left;">개요<button style="position:right;" value="edit" id='edit_btn' onclick="update_intro()">편집하기</button></h1>
                    <?php echo "<pre id='intro' contenteditable='false' style='white-space: pre-wrap;'>$row[book_introduce]</pre>";?>
                <hr>
                </div>
            </div>
        </div>
        <?php 
            include "./footer.php";
        ?>
    </div>
</body>

</html>