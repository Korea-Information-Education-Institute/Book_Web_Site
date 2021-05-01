<!DOCTYPE html>
<html lang="ko">
<?php session_start(); ?>
<head>
    <meta charset="UTF-8">
    <?php include "./head.php"; ?>
    <title>책분야</title>
</head>
<style>
    .footer_inner>p{
        margin:0;
    }
    .container{
        height:1000px;
    }
    .container_inner{
        text-align:center;
        padding-top:183px;
        height:880px;
    }
    .container_list{
        width: 1400px;
        height: 1400px;
        margin: 0 auto;
        position: relative;
    }
    .aside{
        width: 240px;
        height: 580px;
        float: left; 
        background-color: antiquewhite;
        padding: 10px;
        margin-right: 20px;
        margin-top: 60px;
        
    }
    .aside h3   {
        padding-top: 15px;
        padding-left: 5px;
    }
    .aside p{
        padding-left: 15px;
    }
    .book_index{
        margin-top: 30px;
        margin-left: 20px;
    }
    .book_container{
        width: 980px;
        height: 1400px;
        float: left;
        margin-top: 30px;
        
    }
    .book_list_box{
        border: 1px solid black;
        width: 940px;
        height: 230px;
        position: relative;
        margin-bottom: 20px;
        overflow : hidden;
        text-overflow : ellipsis;
        white-space : nowrap;
        display : inline-block;
    }
    .book_list_box_img{
        width: 230px;
        position: absolute;
    }
    .book_list_box_table{
        list-style: none;
        position: absolute;
        left: 240px;
        line-height: 2em;
    }
    .table1{
        font-weight: 500;
    }
    
    #book_img{
        width: 230px;
        height: 230px;
    }
   
    .footer{
        position:absolute;
        top:1700px;
        width:100%;
    }
    .paging{
        text-align:center;
    }
</style>
<?php
    header('Content-Type: text/html; charset=utf-8');
    $book_title = URLDecode($_SERVER['QUERY_STRING']);
?>

<script>
    function book_genre(genre,genre_detail){
        url="http://khsung0.dothome.co.kr/html/change_book_list.php?"+genre+"/"+genre_detail;
        url=encodeURI(url)
        location.href=url;
    }
</script>

<body>
    <div class="wrap">
        <?php
            include "./header.php";
        ?>
        <div class="container_list">
        <div class="aside" style="position:fixed;height:450px;width:150px;">
                <h3>문학</h3>
                <a href="javascript:book_genre('문학','시');"><p>시</p></a>
                <a href="javascript:book_genre('문학','에세이');"><p>에세이</p></a>
                <h3>인문</h3>
                <a href="javascript:book_genre('인문','문화');"><p>문화</p></a>
                <a href="javascript:book_genre('인문','심리');"><p>심리</p></a>
                <a href="javascript:book_genre('인문','철학');"><p>철학</p></a>  
                <a href="javascript:book_genre('인문','경제');"><p>경제</p></a>  
                <a href="javascript:book_genre('인문','교양');"><p>교양</p></a>
                <a href="javascript:book_genre('미분류','미분류');"><h3>미분류</h3></a>  
            </div>
            <div class="aside" style="visibility:hidden;">
                <h3>문학</h3>
                <a href="javascript:book_genre('문학','시');"><p>시</p></a>
                <a href="javascript:book_genre('문학','에세이');"><p>에세이</p></a>
                <h3>인문</h3><br>
                <a href="javascript:book_genre('인문','문화');"><p>문화</p></a>
                <a href="javascript:book_genre('인문','심리');"><p>심리</p></a>
                <a href="javascript:book_genre('인문','철학');"><p>철학</p></a>  
                <a href="javascript:book_genre('인문','경제');"><p>경제</p></a>  
                <a href="javascript:book_genre('인문','교양');"><p>교양</p></a>  
                <a href="javascript:book_genre('미분류','미분류');"><h3>미분류</h3></a>  
            </div>
            <div class="book_index">
                <br><h2>검색 내용</h2>
            </div> 
            <div class="book_container">
            <?php
                if(include ('./dbconnect.php')){
                    $sql = "SELECT * FROM `book` WHERE `book_title` LIKE '%$book_title%'";
                    $result = mysqli_query($conn, $sql);
                    $count = mysqli_num_rows($result);      //row 개수
                    if ($count<1){
                        echo "<h1 style='text-align:center;'>검색된 책이 없습니다.</h1>";
                    }else{
                        $list_num=5;                            //한 페이지 리스트 개수
                        $total_page_num=ceil($count/$list_num); //총 페이지 개수
                        $i=0;
                        while($row = mysqli_fetch_array($result)){
                            if($i>=0 && $i<=4){
                                //공백 존재시 url에 추가되지 않음.
                                //따라서 Under bar로 치환후 목적지에서 다시 공백으로 치환.
                                $urlstring="./book.php?".str_replace(" ","_",$row['book_title']);
                                echo "<a href=$urlstring><div class='book_list_box'>
                                        <div class='book_list_box_img'>
                                        <img id='book_img' src=$row[book_img_address] alt='책 사진'>
                                    </div>
                                    <div class='book_list_box_table'>
                                        <li><span class='table1'><b>제목</b></span><span class='table2'> <b>: $row[book_title]</span></b></li>
                                        <li><span class='table1'>저자</span><span class='table2'> : $row[book_writer]</span></li>
                                        <li><span class='table1'>가격</span><span class='table2'> : $row[book_price]</span></li>
                                        <li><span class='table1'>분류</span><span class='table2'> : $row[book_genre]</span></li>
                                        <li><span class='table1'>소개</span><span class='table2'> : $row[book_introduce]</span></li>
                                    </div></a>
                                </div>";
                            }
                            $i+=1;
                        }
                    }
                }
            ?> 
            <div class="paging">
                    <br><br><br>paging
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