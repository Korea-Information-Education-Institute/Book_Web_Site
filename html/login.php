<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/basic.css">
    <link rel="stylesheet" href="../css/index.css">
    <title>Document</title>
</head>

<style>
    .container_inner{
        
    }
    #user_id,#user_pw{
        width:200px;
        height:30px;
        font-size:18px;
        border:1px solid rgba(199, 199, 199, 0.856);
        border-radius:5px;
        padding:0px 0px 0px 5px;
        position:relative;
    }
    #login_btn, #register_btn{
        cursor:pointer;
    }
    #login_btn{

    }
    #register_btn{
        
    }
</style>

<script language="javascript">
    function input_check(){
        var login_form=document.login;
        if (login_form.user_id.value==""){
            alert("아이디를 입력하세요.");
            return false;
        }else if(login_form.user_pw.value==""){
            alert("비밀번호를 입력하세요.");
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
                <form method="POST" name="login" action="./login_check.php" onsubmit="return input_check()">
                아이디&nbsp;&nbsp;&nbsp;  <input type="text" name="user_id" id="user_id">
                비밀번호  <input type="password"  name="user_pw" id="user_pw">
                <input type="submit" id="login_btn" value="로그인">
                <button type="button" id="register_btn" onClick="location.href='http://khsung0.dothome.co.kr/html/register.php'">회원가입</button>
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