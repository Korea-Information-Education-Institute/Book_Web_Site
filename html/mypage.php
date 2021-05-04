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
        background-color: #0d47a1;
        font-size:20px;
        height:50px;
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
                                $count = mysqli_num_rows($result);      //row 개수
                                $list_num=15;   //한페이지에 출력할 계정갯수
                                $total_page_num=ceil($count/$list_num); //총 페이지 개수
                                

                                echo "<p style='font-size:30px; font-weight:550;'>User Info</p><br><br><br>";
                                echo "<table align = 'center' border=1 width='750px'>
                                <thead>
                                <tr><th id='table_title' colspan='6'>User table</th></tr>
                                  <tr>
                                    <th>아이디</th>
                                    <th>닉네임</th>
                                    <th>이름</th>
                                    <th>생일</th>
                                    <th>성별</th>
                                    <th>유저삭제</th>
                                  </tr>
                                </thead>
                                <tbody>";
                                if(isset($_GET['page'])){
                                    $page=$_GET['page'];
                                }else{
                                    $page=1;        //현재 페이지 숫자
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
                                            echo "<td>남성</td>";
                                        }else{
                                            echo "<td>여성</td>";
                                        }
                                        echo "<td><button type='button' id='delete_btn' name=$row[user_id] onClick=delete_user(this.name)>계정 삭제</button></td>";
                                        echo "</tr>";
                                    }
                                }
                                echo "</tbody></table><br><br>";
                                if($page<=1){

                                }else{
                                    echo "<a href='./mypage.php?page=1'>&#171; </a>";
                                    $pre=$page-1;
                                    echo "&#183;&#183;&#183;";
                                    echo "<a href='./mypage.php?page=$pre'> &#60; </a>";
                                }
                                if($total_page_num<=5){
                                    for($i=1;$i<=$total_page_num;$i++){
                                        if($page==$i){
                                            echo "<b>$i </b>";
                                        }else{
                                            echo "<a href='./mypage.php?page=$i'>$i </a>";
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
                                            echo "<b>$i </b>";
                                        }else{
                                            echo "<a href='./mypage.php?page=$i'>$i </a>";
                                        }
                                    }
                                }
                                if($page>=$total_page_num){
                                }else{
                                    $next=$page+1;
                                    echo "<a href='./mypage.php?page=$next'>&#62; </a>";
                                    echo "&#183;&#183;&#183;";
                                    echo "<a href='./mypage.php?page=$total_page_num'> &#187;</a>";
                                }
                            }else{
                                $user_id=$_SESSION[ 'user_id' ];
                                $sql="SELECT * FROM user WHERE user_id='$user_id'";
                                $result=mysqli_query($conn, $sql);

                                //결과는 1행밖에 없기 때문에 while문은 한번만 반복
                                while($row=mysqli_fetch_array($result)){
                                    echo "<p style='font-size:30px; font-weight:550;'>My Info</p><br><br><br><br>";
                                    echo "<p>아이디 : {$row['user_id']}</p><br><br>";
                                    echo "<p>닉네임 : {$row['user_nickname']}</p><br><br>";
                                    echo "<p>이름 : {$row['user_name']}</p><br><br>";
                                    echo "<p>생일 : {$row['user_birth']}</p><br><br>";
                                    if ($row['user_gender']=="m"){
                                        echo "<p>성별 : 남성</p>";
                                    }else{
                                        echo "<p>성별 : 여성</p>";
                                    }
                                    echo "<button type='button' id='change_btn' onClick=location.href='./change_pw.php'>비밀번호 변경</button>";
                                }
                            }
                        }
                        mysqli_close($conn);
                    }else{
                        echo "<script>alert('로그인이 필요합니다');</script>";
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