<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    #searched_data{
        width:200px;
        height:25px;
        padding-left:5px;
        position:absolute;
        top:10px;
        left:281px;
    }
    #search_btn{
        background-color:white;
        position:absolute;
        border:none;
        cursor:pointer;
    }
    #search_btn:hover{
        border:2px solid #D6D0D1;
    }
    .book_list{
        width:970px;
        height:545px;
    }
    .book_list_item{
        margin-bottom:10px;
        border-bottom:solid 1px black;
        border-right:solid 1px black;
        height:85px;
    }
    .book_list_item img{
        width:80px;
    }
    .book_list_item:hover{
        box-shadow: 2px 2px 2px 2px gray;
        cursor:pointer;
    }
    .book_list_item_info{
        display:inline-block;
        position : relative;
        top:-30px;
        margin-left:10px;
        width:270px;
        height:25px;
    }
    .book_list_item_info1{
        display:inline-block;
        position : relative;
        top:-30px;
        margin-left:10px;
        width:245px;
        height:25px;
    }
    #radio_btn{
        position : relative;
        top:-30px;
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
    window.onfocus=function(){
    }
    window.onload=function(){
        window.focus();
        window.moveTo(500,100);
        window.resizeTo(1000,860);
    }
    
    function search_book_title(){
        var data=document.getElementById("searched_data").value;
        if(data==''){
            alert('검색란이 공백입니다.');
        }else{
            var temp_string=window.location.href.split('&');
            var temp_url=temp_string[0]+"&search_title="+data;
            location.href=temp_url;
        }
    }
    function cancel(){
        window.close();
    }
    function add_book(){
        var obj_length = document.getElementsByName("radio_btn").length;
        var radio_check=false;
        var save_checked_value;
        for (var i=0; i<obj_length; i++) {
            if (document.getElementsByName("radio_btn")[i].checked == true) {
                radio_check=true;
                save_checked_value=document.getElementsByName("radio_btn")[i].value.split('&&&');
                break;
            }
        }
        if(radio_check){
            var temp_string=window.location.href.split('?');
            var url_parse=temp_string[1].split('&');
            if(url_parse[0]=='book1'){
                opener.document.getElementById("square_book1").removeAttribute('href');
                opener.document.getElementById("square_book1").removeAttribute('onclick');
                opener.document.getElementById("book1").src=save_checked_value[1];
                opener.document.getElementById("book1_data").value=save_checked_value[0];
                opener.document.getElementById("square_book2").style.display="block";
                window.close();
            }else if(url_parse[0]=='book2'){
                if(opener.document.getElementById("book1_data").value==save_checked_value[0]){
                    alert("이미 추가한 책입니다.");
                }else{
                    opener.document.getElementById("square_book2").removeAttribute('href');
                    opener.document.getElementById("square_book2").removeAttribute('onclick');
                    opener.document.getElementById("book2").src=save_checked_value[1];
                    opener.document.getElementById("book2_data").value=save_checked_value[0];
                    opener.document.getElementById("square_book3").style.display="block";
                    window.close();
                }
            }else{
                if(opener.document.getElementById("book1_data").value==save_checked_value[0] || opener.document.getElementById("book2_data").value==save_checked_value[0]){
                    alert("이미 추가한 책입니다.");
                }else{
                opener.document.getElementById("square_book3").removeAttribute('href');
                opener.document.getElementById("square_book3").removeAttribute('onclick');
                opener.document.getElementById("book3").src=save_checked_value[1];
                opener.document.getElementById("book3_data").value=save_checked_value[0];
                window.close();
                }
            }
        }else{
            alert("선택된 책이 없습니다.");
        }
    }
</script>

<body>
    <div style="text-align:center;">
    <input type="text" id="searched_data" placeholder="검색"><button class="btn btn-search" id="search_btn" onclick="search_book_title()"><img class="btn__icon" width="26px" src="http://khsung0.dothome.co.kr/img/search_icon.png" alt="icon"></button></div><br><br>
    <div class="book_list">
    <?php
        $conn = mysqli_connect("localhost", "khsung0", "gmltjd1!" , "khsung0");
        if($_GET['search_title']){
            $sql = "SELECT * FROM book WHERE book_title LIKE '%$_GET[search_title]%'";
        }else{
            $sql = "SELECT * FROM book";
        }
        $result = mysqli_query($conn, $sql);
        $count = mysqli_num_rows($result);
        $list_num=6;
        $total_page_num=ceil($count/$list_num);
        if(isset($_GET['page'])){
            $page=$_GET['page'];
        }else{
            $page=1;
        }
        $start_page=1;
        $i=0;
        if($count==0){
            echo "검색된 내용이 없습니다.";
        }else{
            while($row = mysqli_fetch_array($result)){
                $i++;
                if($i>=$list_num*$page-($list_num-1) && $i<=$list_num*$page){
                    $replaced_book_title = str_replace(" ", "_", $row['book_title']);
                    echo"<label><div class='book_list_item'>
                            <input type='radio' id='radio_btn' name='radio_btn' value=$replaced_book_title&&&$row[book_img_address]>
                            <img src=$row[book_img_address] alt='이미지가 없습니다.' height='100%'>
                            <div class='book_list_item_info'> $row[book_title]</div>
                            <div class='book_list_item_info'> $row[book_writer]</div>
                            <div class='book_list_item_info1'> $row[book_genre]</div>
                        </div></label>";
                }
            }
        }
    ?>
    </div>
    <br><br>
    <?php
        $temp_string = URLDecode($_SERVER['QUERY_STRING']);
        $index =explode('&',$temp_string);
        if($_GET['search_title']){
            $index[0]=$index[0]."&search_title=".$_GET['search_title'];
        }
        echo "<div class='paging'>";
        if($page<=1){
        }else{
            echo "<button class='page_btn' onClick=location.href='./add_book_to_roadmap.php?$index[0]&page=1'><<</button>";
            $pre=$page-1;
            echo "<button class='page_btn' onClick=location.href='./add_book_to_roadmap.php?$index[0]&page=$pre'>&#60;</button>";
        }
        if($total_page_num<=5){
            for($i=1;$i<=$total_page_num;$i++){
                if($page==$i){
                    echo "<button class='cur_page_btn' disabled>$i</button>";
                }else{
                    echo "<button class='page_btn' onClick=location.href='./add_book_to_roadmap.php?$index[0]&page=$i'>$i</button>";
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
                    echo "<button class='page_btn' onClick=location.href='./add_book_to_roadmap.php?$index[0]&page=$i'>$i</button>";
                }
            }
        }
        if($page>=$total_page_num){
        }else{
            $next=$page+1;
            echo "<button class='page_btn' onClick=location.href='./add_book_to_roadmap.php?$index[0]&page=$next'>&#62;</button>";
            echo "<button class='page_btn' onClick=location.href='./add_book_to_roadmap.php?$index[0]&page=$total_page_num'>>></button>";
        }
        echo "<br><br><button onclick='add_book()'>추가하기</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button onclick='cancel()'>취소하기</button></div>";
    ?>
    <br>
    
</body>
</html>