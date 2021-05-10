<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include "./head.php"; ?>
    <title>Document</title>
</head>
<style>
    p{
        margin:0;
    }
    .container{
        height:1100px;
    }
    .container_inner{
        padding-top:83px;
        height:880px;
    }
</style>
<body>
    <div class="wrap">
        <?php
            include "./header.php";
        ?>
        <div class="container">
            <div class="container_inner">
                <?php
                    if(include('./dbconnect.php')){
                    $roadmap_index=$_GET['roadmap_index'];
                    $sql = "SELECT * FROM `roadmap` WHERE `roadmap_index`=$roadmap_index";
                    $result = mysqli_query($conn, $sql);
                    $row = mysqli_fetch_array($result);
                    echo "<h1 align=center>$row[roadmap_index]. $row[roadmap_title]</h1><br>";
                    echo "<p align=right>작성일시 : $row[write_time]</p><br>";
                    echo "<p align=right>작성자 : $row[user_id]</p><br><br><br>";
                    if($row['book_2']==null){
                        $total_book_title=[$row['book_1']];
                    }else if($row['book_3']==null){
                        $total_book_title=[$row['book_1']];
                        array_push($total_book_title,$row['book_2']);
                    }else{
                        $total_book_title=[$row['book_1']];
                        array_push($total_book_title,$row['book_2']);
                        array_push($total_book_title,$row['book_3']);
                    }
                    $book_div_width=floor((100/count($total_book_title)-1));
                    for($i=0;$i<count($total_book_title);$i++){
                        $sql1 = "SELECT * FROM `book` WHERE `book_title`='$total_book_title[$i]'";
                        $result1 = mysqli_query($conn, $sql1);
                        $row1 = mysqli_fetch_array($result1);
                        $urlstring="./book.php?".str_replace(" ","_",$row1['book_title']);
                        echo "<div style='float:left;width:$book_div_width%;'><div align=center><a href=$urlstring><img src=$row1[book_img_address] width=170px height=240px></a></div></div>";
                    }
                    echo "<div style='clear:both;padding-top:20px;'><h3>추천 이유</h3>
                    <div style='height:500px;overflow:auto;'><pre style='font-family:arial;color:191970;font-size:17px;line-height:1.5em;'>$row[roadmap_text]</pre></div>
                    </div>";
                    }
                ?>
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