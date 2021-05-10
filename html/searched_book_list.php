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
    .aside h3{
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
        margin-top:10px;
    }
    .table1{
        font-weight: 500;
    }
    
    #book_img{
        width: 200px;
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
    .paging .page_btn{
        cursor:pointer;
        width:40px;
        height:40px;
        background-color:#f4f4f4;
        color:black;
        border-radius:5px;
        font-size:17px;
        border:none;
    }
    .paging .page_btn:hover{
        background-color:#c8c8c8;
    }
    .paging .cur_page_btn{
        width:40px;
        height:40px;
        background-color:#3498db;
        color:white;
        border-radius:5px;
        font-size:17px;
        border:none;
    }
    .book_list_title{
        font-size:24px;
    }
    .book_list_writer{
        font-size:19px;
    }
    .book_list_genre{
        font-size:19px;
    }
    .book_list_publication_date{
        font-size:15px;
    }
    .book_list_price{
        font-size:15px;
    }
</style>
<?php
    header('Content-Type: text/html; charset=utf-8');
    $temp_string = URLDecode($_SERVER['QUERY_STRING']);
    $book_title =explode('&',$temp_string);
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
                        $sql = "SELECT * FROM `book` WHERE `book_title` LIKE '%$book_title[0]%'";
                        $result = mysqli_query($conn, $sql);
                        $count = mysqli_num_rows($result);
                        if(isset($_GET['page'])){
                            $page=$_GET['page'];
                        }else{
                            $page=1;
                        }
                        $start_page=1;
                        if ($count<1 && $page<=1){
                            echo "<h1 style='text-align:center;'>검색된 책이 없습니다.</h1>";
                        }else{
                            $list_num=5;
                            $total_page_num=ceil($count/$list_num);
                            $i=0;
                            while($row = mysqli_fetch_array($result)){
                                $i++;
                                if($i>=$list_num*$page-($list_num-1) && $i<=$list_num*$page){
                                    $urlstring="./book.php?".str_replace(" ","_",$row['book_title']);
                                    echo "<a href=$urlstring><div class='book_list_box'>
                                            <div class='book_list_box_img'>
                                            <img id='book_img' src=$row[book_img_address] alt='책 사진'>
                                        </div>
                                        <div class='book_list_box_table'>
                                            <li><span class='book_list_title'> <b>$row[book_title]</span></b></li><br>
                                            <li><span class='book_list_writer'>$row[book_writer]</span></li>
                                            <li><span class='book_list_genre'>$row[book_genre]</span></li>
                                            <li><span class='book_list_publication_date'>$row[book_publication_date] (발간)</span></li>
                                            <li><span class='book_list_price'>$row[book_price]원</span></li>
                                        </div></a>
                                    </div>";
                                }
                            }
                        }
                    }
                ?> 
            <div class="paging">
                    <br><br><br>
                    <?php
                        if($page<=1){
                        }else{
                            echo "<button class='page_btn' onClick=location.href='./searched_book_list.php?$book_title[0]&page=1'><<</button>";
                            $pre=$page-1;
                            echo "<button class='page_btn' onClick=location.href='./searched_book_list.php?$book_title[0]&page=$pre'>&#60;</button>";
                        }
                        if($total_page_num<=5){
                            for($i=1;$i<=$total_page_num;$i++){
                                if($page==$i){
                                    echo "<button class='cur_page_btn' disabled>$i</button>";
                                }else{
                                    echo "<button class='page_btn' onClick=location.href='./searched_book_list.php?$book_title[0]&page=$i'>$i</button>";
                                }
                            }
                        }else{
                            if($page<=3){
                                $block_start=1;
                            }else if($page>$total_page_num-2){
                                $block_start=$total_page_num-4;
                            }
                            else{
                                $block_start=$page-2;
                            }
                            if($block_start+4>$total_page_num){
                                $block_end=$total_page_num;
                            }else{
                                $block_end=$block_start+4;
                            }
                            for($i=$block_start;$i<=$block_end;$i++){
                                if($page==$i){
                                    echo "<button class='cur_page_btn' disabled>$i</button>";
                                }else{
                                    echo "<button class='page_btn' onClick=location.href='./searched_book_list.php?$book_title[0]&page=$i'>$i</button>";
                                }
                            }
                        }
                        if($page>=$total_page_num){
                        }else{
                            $next=$page+1;
                            echo "<button class='page_btn' onClick=location.href='./searched_book_list.php?$book_title[0]&page=$next'>&#62;</button>";
                            echo "<button class='page_btn' onClick=location.href='./searched_book_list.php?$book_title[0]&page=$total_page_num'>>></button>";
                        }
                    ?>
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