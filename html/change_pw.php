<!DOCTYPE html>
<html lang="ko">
<?php session_start(); ?>
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
        height:750px;
    }
    .container_inner{
        text-align:center;
        padding-top:183px;
        height:700px;
    }
    #user_pw,#change_user_pw1,#change_user_pw{
        width:250px;
        height:30px;
        font-size:18px;
        border:1px solid rgba(199, 199, 199, 0.856);
        border-radius:5px;
        padding:0px 0px 0px 5px;
        position:relative;
        margin-right:10px;
    }
    #submit_btn, #reset_btn{
        cursor:pointer;
        display: inline-block;
        border-radius:10px;
        border:1px solid #51909E;
        color:#51909E;
        transition-duration:0.6s;
        margin-top:20px;
        width:120px;
        height:30px;
        background-color:white;
        color:#51909E;
    }
    #submit_btn:hover, #reset_btn:hover{
        background-color:#51909E;
        color:white;
    }
</style>

<?php
//세션에 user_id 변수가 있을 경우 로그인 상태로 판단
  if( isset( $_SESSION[ 'user_id' ] ) ) {
    echo "<style>#logined{display:inline-block;}</style>";
    echo "<style>#logouted{display:none;}</style>";
//변수가 없으면 로그아웃된 상태로 판단
  }else{
    echo "<style>#logined{display:none;}</style>";
    echo "<style>#logouted{display:inline-block;}</style>";
    echo "<script>alert('로그인을 하십시오.')</script>";
    echo "<script>location.href='./login.html';</script>";
  }
?>

<script language="javascript">
    function input_check(){
        var change_pw_form=document.change_pw;
        if (change_pw_form.user_pw.value==""){
            alert("현재 비밀번호를 입력하세요.");
            return false;
        }else if(change_pw_form.change_user_pw.value==""){
            alert("변경 비밀번호를 입력하세요.");
            return false;
        }else if(change_pw_form.change_user_pw1.value==""){
            alert("변경 비밀번호 확인을 입력하세요.");
            return false;
        }else if(change_pw_form.change_user_pw.value!=change_pw_form.change_user_pw1.value){
            alert("변경 비밀번호 확인이 다릅니다.");
            return false;
        }else{
            return true;
        }
    }
</script>

<body>
    <div class="wrap">
        <?php
            include "./header.php";
        ?>    
        <div class="container">
            <div class="container_inner">
            <p style='font-size:30px; font-weight:550;'>Change PW</p><br><br><br>
                <form method="POST" name="change_pw" action="./change_pw_check.php" onsubmit="return input_check()">
                    <p>현재 비밀번호&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type="password" id="user_pw" name="user_pw"></p><br><br>
                    <p>변경 비밀번호&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type="password" id="change_user_pw"  name="change_user_pw"></p><br><br>
                    <p>변경 비밀번호 확인&nbsp; <input type="password" id="change_user_pw1" name="change_user_pw1"></p><br><br>
                    <p><input type="submit" id="submit_btn" value="변경하기">&nbsp;&nbsp;&nbsp;&nbsp;<input type="reset" id="reset_btn" value="초기화"></p>
                </form>
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