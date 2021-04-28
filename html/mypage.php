<!DOCTYPE html>
<html lang="ko">
<?php session_start(); ?>
<head>
    <meta charset="UTF-8">
    <?php include "./head.php"; ?>
    <title>Document</title>
</head>

<style>
    .container_inner{
        text-align:center;
        padding-top:183px;
    }
    #login_btn{
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
        color:white;
    }
    #login_btn:hover{
        background-color:white;
        color:#51909E;
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
                    if( isset( $_SESSION[ 'user_id' ] ) ) {
                        if(include('./dbconnect.php')){
                            $user_id=$_SESSION[ 'user_id' ];
                            $sql="SELECT * FROM user WHERE user_id='$user_id'";
                            $result=mysqli_query($conn, $sql);

                            //결과는 1행밖에 없기 때문에 while문은 한번만 반복
                            while($row=mysqli_fetch_array($result)){
                                echo "<p style='font-size:30px; font-weight:550;'>My Info</p><br><br><br>";
                                echo "<p>아이디 : {$row['user_id']}</p><br>";
                                echo "<p>닉네임 : {$row['user_nickname']}</p><br>";
                                echo "<p>이름 : {$row['user_name']}</p><br>";
                                echo "<p>생일 : {$row['user_birth']}</p><br>";
                                if ($row['user_gender']=="m"){
                                    echo "<p>성별 : 남성</p>";
                                }else{
                                    echo "<p>성별 : 여성</p>";
                                }
                                echo "<button type='button' id='login_btn' onClick=location.href='./change_pw.php'>비밀번호 변경</button>";
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