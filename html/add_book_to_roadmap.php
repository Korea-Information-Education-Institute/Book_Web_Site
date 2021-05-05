<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    .book_list{
        width:970px;
        height:527px;
    }
    .book_list_item{
        margin-bottom:5px;
    }
    .book_list_item_info{
        display:inline-block;
        position : relative;
        top:-30px;
        margin-left:10px;
        width:290px;
        height:25px;
    }
    .book_list_item_info1{
        display:inline-block;
        position : relative;
        top:-30px;
        margin-left:10px;
        width:250px;
        height:25px;
    }
    #radio_btn{
        position : relative;
        top:-30px;
    }
</style>
<script type="text/javascript">
    window.onfocus=function(){
    }
    window.onload=function(){
        window.focus();
        window.moveTo(500,100);
        window.resizeTo(1000,800);
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
            var  url_parse=window.location.href.split('?');
            if(url_parse[1]=='book1'){
                opener.document.getElementById("square_book1").removeAttribute('href');
                opener.document.getElementById("square_book1").removeAttribute('onclick');
                opener.document.getElementById("book1").src=save_checked_value[1];
                opener.document.getElementById("book1_data").value=save_checked_value[0];
                opener.document.getElementById("square_book2").style.display="block";
                window.close();
            }else if(url_parse[1]=='book2'){
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
            // var temp=opener.document.getElementById("book1");
            // temp.src="http://image.dongascience.com/Photo/2020/03/5bddba7b6574b95d37b6079c199d7101.jpg";
            //book1_data
        }else{
            alert("선택된 책이 없습니다.");
        }
    }
</script>

<body>
    검색 <input type="text"><button class="btn btn-search" id="search_btn"><img class="btn__icon" width="26px" src="http://khsung0.dothome.co.kr/img/search_icon.png" alt="icon"></button><br><br><br>
    <div class="book_list">
    <?php
        $conn = mysqli_connect("localhost", "khsung0", "gmltjd1!" , "khsung0");
        $sql = "SELECT * FROM book";
        $result = mysqli_query($conn, $sql);
        $i=0;
        while($row = mysqli_fetch_array($result)){
            if($i<=5){
                $replaced_book_title = str_replace(" ", "_", $row['book_title']);
                echo"<div class='book_list_item'>
                        <label><input type='radio' id='radio_btn' name='radio_btn' value=$replaced_book_title&&&$row[book_img_address]>
                        <img src=$row[book_img_address] alt='이미지가 없습니다.' width='50px'>
                        <div class='book_list_item_info'> $row[book_title]</div>
                        <div class='book_list_item_info'> $row[book_writer]</div>
                        <div class='book_list_item_info1'> $row[book_genre]</div></label>
                    </div>";
            }
            $i++;
        }
    ?>
    </div>
    <br><br><br>
    <button onclick="cancel()">취소하기</button>
    <button onclick="add_book()">추가하기</button>
</body>
</html>