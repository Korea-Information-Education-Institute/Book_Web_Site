<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/basic.css">
    <link rel="stylesheet" href="../css/index.css">
    <title>Document</title>
</head>

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
            include "../header.php";
        ?>
        <div class="container">
            <div class="container_inner">
                <form method="POST" name="login" action="./login_check.php" onsubmit="return input_check()">
                    <p>아이디 : <input type="text" name="user_id"></p>
                    <p>비밀번호 : <input type="password"  name="user_pw"></p>
                    <p><input type="submit" value="로그인">&nbsp;&nbsp;&nbsp;&nbsp;<input type="reset" value="초기화"></p>
                </form>
            </div>
        </div>
        <?php 
                include "../footer.php";
        ?>
    </div>
    <?php 
        include "../javascript.php";
    ?>
</body>
</html>