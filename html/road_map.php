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
        padding-top:183px;
        height:880px;
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
            <button onclick="login_check()">글쓰기</button >
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