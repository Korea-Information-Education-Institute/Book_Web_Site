<!DOCTYPE html>
<html lang="ko">
<?php session_start(); ?>
<head>
    <meta charset="UTF-8">
    <?php include "./head.php"; ?>
    <title>Document</title>
        <script src="//code.jquery.com/jquery-1.11.2.min.js"></script>
    <script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
</head>

<style type="text/css">
    p{
        margin:0;
    }
    .container{
        height:1000px;
    }
    .container_inner{
        text-align:center;
        padding-top:83px;
        height:880px;
    }
    #change_btn{
        cursor:pointer;
        display: inline-block;
        border-radius:10px;
        border:1px solid #51909E;
        color:white;
        transition-duration:0.6s;
        margin-top:20px;
        width:120px;
        height:30px;
        background-color:#51909E;

    }
    #change_btn:hover{
        background-color:white;
        color:#51909E;
    }
    #delete_btn{
        cursor:pointer;
        display: inline-block;
        border-radius:10px;
        border:1px solid red;
        color:red;
        transition-duration:0.6s;
        width:100px;
        height:35px;
        background-color:white;

    }
    #delete_btn:hover{
        background-color:red;
        color:white;
    }
    th{
        background-color: #bbdefb;
    }
    th,td{
        height:40px;
    }
    td{
        background-color: #e3f2fd;
    }
    #table_title{
        color: #ffffff;
        background-color: #0A82FF;
        font-size:20px;
        height:50px;
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
    function delete_user(user_id){
        $.ajax({
                url				: './delete_user.php',
                data			: {
                user_id       : user_id},
                type			: 'POST',
                dataType		: 'json',
                success		: function(result) {
                    if(result.success == false) {
                        alert(result.msg);
                        return;
                    }else{
                        alert(result.success_msg);
                        return;
                    }
                }
            });
        window.location.reload();
    }
</script>

<body>
    <div class="wrap">
        <?php
            include "./header.php";
        ?>
        <div class="container">
            <div class="container_inner">
                <?php
                    if( isset( $_SESSION[ 'user_id' ] ) ) {
                        if(include('./dbconnect.php')){
                            if($_SESSION[ 'user_id' ]=='admin'){
                                $sql="SELECT * FROM user WHERE user_id NOT LIKE 'admin'";
                                $result=mysqli_query($conn, $sql);
                                $count = mysqli_num_rows($result);      //row ??????
                                $list_num=15;   //??????????????? ????????? ????????????
                                $total_page_num=ceil($count/$list_num); //??? ????????? ??????
                                

                                echo "<p style='font-size:30px; font-weight:550;'>User Info</p><br><br><br>";
                                echo "<table align = 'center' border=1 width='750px'>
                                <thead>
                                <tr><th id='table_title' colspan='6'>User table</th></tr>
                                  <tr>
                                    <th>?????????</th>
                                    <th>?????????</th>
                                    <th>??????</th>
                                    <th>??????</th>
                                    <th>??????</th>
                                    <th>????????????</th>
                                  </tr>
                                </thead>
                                <tbody>";
                                if(isset($_GET['page'])){
                                    $page=$_GET['page'];
                                }else{
                                    $page=1;
                                }
                                if($page>1 && ($page-1)*$list_num>=$count){
                                    $pre=$page-1;
                                    echo "<meta http-equiv='refresh' content='0; url=./mypage.php?page=$pre'>";
                                }
        
                                $i=0;
                                while($row=mysqli_fetch_array($result)){
                                    $i++;
                                    if($i>=$list_num*$page-($list_num-1) && $i<=$list_num*$page){
                                        echo "<tr>";
                                        echo "<td>{$row['user_id']}</td>";
                                        echo "<td>{$row['user_nickname']}</td>";
                                        echo "<td>{$row['user_name']}</td>";
                                        echo "<td>{$row['user_birth']}</td>";
                                        if ($row['user_gender']=="m"){
                                            echo "<td>??????</td>";
                                        }else{
                                            echo "<td>??????</td>";
                                        }
                                        echo "<td><button type='button' id='delete_btn' name=$row[user_id] onClick=delete_user(this.name)>?????? ??????</button></td>";
                                        echo "</tr>";
                                    }
                                }
                                echo "</tbody></table><br><br>
                                <div class='paging'>";
                                if($page<=1){
                                }else{
                                    echo "<button class='page_btn' onClick=location.href='./mypage.php?page=1'><<</button>";
                                    $pre=$page-1;
                                    echo "<button class='page_btn' onClick=location.href='./mypage.php?page=$pre'>&#60;</button>";
                                }
                                if($total_page_num<=5){
                                    for($i=1;$i<=$total_page_num;$i++){
                                        if($page==$i){
                                            echo "<button class='cur_page_btn' disabled>$i</button>";
                                        }else{
                                            echo "<button class='page_btn' onClick=location.href='./mypage.php?page=$i'>$i</button>";
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
                                            echo "<button class='page_btn' onClick=location.href='./mypage.php?page=$i'>$i</button>";
                                        }
                                    }
                                }
                                if($page>=$total_page_num){
                                }else{
                                    $next=$page+1;
                                    echo "<button class='page_btn' onClick=location.href='./mypage.php?page=$next'>&#62;</button>";
                                    echo "<button class='page_btn' onClick=location.href='./mypage.php?page=$total_page_num'>>></button>";
                                }
                                echo "</div>";
                            }else{
                                echo "<style>.container{
                                    height:700px;
                                    }
                                    .container_inner{
                                        text-align:center;
                                        padding-top:83px;
                                        height:700px;
                                    }</style>";
                                $user_id=$_SESSION[ 'user_id' ];
                                $sql="SELECT * FROM user WHERE user_id='$user_id'";
                                $result=mysqli_query($conn, $sql);

                                //????????? 1????????? ?????? ????????? while?????? ????????? ??????
                                while($row=mysqli_fetch_array($result)){
                                    echo "<p style='font-size:30px; font-weight:550;'>My Info</p><br><br><br><br>";
                                    echo "<p>????????? : {$row['user_id']}</p><br><br>";
                                    echo "<p>????????? : {$row['user_nickname']}</p><br><br>";
                                    echo "<p>?????? : {$row['user_name']}</p><br><br>";
                                    echo "<p>?????? : {$row['user_birth']}</p><br><br>";
                                    if ($row['user_gender']=="m"){
                                        echo "<p>?????? : ??????</p>";
                                    }else{
                                        echo "<p>?????? : ??????</p>";
                                    }
                                    echo "<button type='button' id='change_btn' onClick=location.href='./change_pw.php'>???????????? ??????</button>";
                                }
                            }
                        }
                        mysqli_close($conn);
                    }else{
                        echo "<script>alert('???????????? ???????????????');</script>";
                        echo "<script>location.href='./login.php';</script>";
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