<!DOCTYPE html>
<html lang="ko">
<?php session_start();?>
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
        text-align:center;
        padding-top:30px;
        width:900px;
        height:880px;
    }
    .roadmap_list_box{
        text-align:left;
        border-bottom: 1px solid black;
        border-right: 1px solid black;
        padding-left:10px;
        padding-right:10px;
        height:130px;
        margin-bottom:27px;
    }
    .roadmap_list_box:hover{
        box-shadow:1.5px 1.5px 1.5px 1.5px #B1B2B1;
    }
    .roadmap_list_box_table{
        width:450px;
        float:left;
    }
    li{
        list-style-type:square;
        margin-bottom:5px;
    }
    .roadmap_list_img{
        display:inline;
    }
    .roadmap_list_img img{
        margin-left:42px;
    }
    #edit_btn{
        float:right;
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
</style>

<script>
    function login_check(){
        <?php
            if(isset( $_SESSION[ 'user_id' ] )){
                echo "location.href='./add_road_map.php'";
            }else{
                echo "alert('로그인이 필요합니다.')";
            }
        ?>
    }
</script>

<body>
<div class="wrap">
        <?php
            include "./header.php";
        ?>
        <div class="container">
            <div class="container_inner">
            <h1>Road Map List</h1><br><br>
            <?php
                if(include('./dbconnect.php')){
                    $sql = "SELECT * FROM `roadmap` ORDER BY `roadmap_index` DESC";
                    $result = mysqli_query($conn, $sql);
                    $count = mysqli_num_rows($result);
                    $list_num=5;
                    $total_page_num=ceil($count/$list_num);
                    if(isset($_GET['page'])){
                        $page=$_GET['page'];
                    }else{
                        $page=1;
                    }
                    $start_page=1;
                    $book_img_address=[];
                    $i=0;
                    while($row = mysqli_fetch_array($result)){
                        $i++;
                        unset($book_img_address);
                        $book_img_address=[];
                        if($i>=$list_num*$page-($list_num-1) && $i<=$list_num*$page){
                            $urlstring="./road_map_item.php?roadmap_index=".$row['roadmap_index'];
                            echo "<a href=$urlstring>
                                <div class='roadmap_list_box'>                            
                                    <div class='roadmap_list_box_table'>
                                        <h3>$row[roadmap_index]. $row[roadmap_title]</h3>
                                        <li>$row[book_1]</li>";
                                        if($row['book_2']!=null){echo "<li>$row[book_2]</li>";}
                                        if($row['book_3']!=null){echo "<li>$row[book_3]</li>";}
                                    echo "</div>
                                    <div class='roadmap_list_img'>";
                            $booksql = "SELECT * FROM `book` WHERE `book_title`='$row[book_1]'";
                            $book_result = mysqli_query($conn, $booksql);
                            $book_row = mysqli_fetch_array($book_result);
                            $book_img_address[0]=$book_row['book_img_address'];
                            if($row['book_2']!=null){
                                $booksql = "SELECT * FROM `book` WHERE `book_title`='$row[book_2]'";
                                $book_result = mysqli_query($conn, $booksql);
                                $book_row = mysqli_fetch_array($book_result);
                                $book_img_address[1]=$book_row['book_img_address'];
                            }
                            if($row['book_3']!=null){
                                $booksql = "SELECT * FROM `book` WHERE `book_title`='$row[book_3]'";
                                $book_result = mysqli_query($conn, $booksql);
                                $book_row = mysqli_fetch_array($book_result);
                                $book_img_address[2]=$book_row['book_img_address'];
                            }
                            for ($j=0;$j<count($book_img_address);$j++){
                                echo "<img src=$book_img_address[$j] alt='이미지가 없습니다.' width=100px height=130px>";
                            }
                            echo "</div>
                                </div></a>";
                        }
                    }
                }
                echo "<div class='paging'>";
                if($page<=1){
                }else{
                    echo "<button class='page_btn' onClick=location.href='./road_map.php?page=1'><<</button>";
                    $pre=$page-1;
                    echo "<button class='page_btn' onClick=location.href='./road_map.php?page=$pre'><</button>";
                }
                if($total_page_num<=5){
                    for($i=1;$i<=$total_page_num;$i++){
                        if($page==$i){
                            echo "<button class='cur_page_btn' disabled>$i</button>";
                        }else{
                            echo "<button class='page_btn' onClick=location.href='./road_map.php?page=$i'>$i</button>";
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
                            echo "<button class='page_btn' onClick=location.href='./road_map.php?page=$i'>$i</button>";
                        }
                    }
                }
                if($page>=$total_page_num){
                }else{
                    $next=$page+1;
                    echo "<button class='page_btn' onClick=location.href='./road_map.php?page=$next'>&#62;</button>";
                    echo "<button class='page_btn' onClick=location.href='./road_map.php?page=$total_page_num'>>></button>";
                } 
                echo "<button id='edit_btn' align='right' onclick='login_check()'>글쓰기</button ></div>";
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