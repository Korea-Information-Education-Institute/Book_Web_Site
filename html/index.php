<!DOCTYPE html>
<html lang="ko">

<head>
    <meta charset="UTF-8">
    <?php include "./head.php"; ?>
    <title>Document</title>
</head>

<style>
    .slide{
        height:300px;
        background-color:blue;
        /* margin-top:20px; */
        padding:5px;
    }
    li{
        background-color:white;
        text-align:center;
    }
    img {
        width: 200px;
        height: 300px;
    }
    h2{
        margin:5px;
    }
</style>

<body>
    <div class="wrap">
        <?php 
            include './header.php';
        ?>
        <div class="container">
            <div class="container_inner">
                <div class="slide">
                    <h2>인기 도서</h2><br>
                </div>
                <div class="box"><h2>최신 도서</h2>
                   <ul class="section">
                   
                   <?php
                        $urlstring="./book.php?".str_replace(" ","_",$row['book_title']);
                        if(include('./dbconnect.php')){
                            $sql = "SELECT * FROM `book` ORDER BY 'book_index' DESC LIMIT 9";
                            $result = mysqli_query($conn, $sql);
                            while($row = mysqli_fetch_array($result)){
                                echo "<li><a href=$urlstring><img id='book_img' src=$row[book_img_address] alt='책 사진'></a></li>";
                            }
                        }
                   ?>
                   </ul>
                </div>
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