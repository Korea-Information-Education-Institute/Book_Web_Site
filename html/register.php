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
        var login_form=document.register;
        if (login_form.user_id.value==""){
            alert("아이디를 입력하세요.");
            return false;
        }else if(login_form.checked_id.value==0){
            alert("ID 중복을 확인하세요.");
            return false;
        }else if(login_form.user_pw.value==""){
            alert("비밀번호를 입력하세요.");
            return false;
        }else if(login_form.user_pw_check.value==""){
            alert("비밀번호확인을 입력하세요.");
            return false;
        }else if(login_form.user_pw_check.value!=login_form.user_pw.value){
            alert("비밀번호확인이 다릅니다.");
            return false;
        }else if(login_form.user_nickname.value==""){
            alert("닉네임을 입력하세요.");
            return false;
        }else if(login_form.user_name.value==""){
            alert("이름을 입력하세요.");
            return false;
        }else{
            return true;
        }
    }
    function duplicated_check(){
        var login_form=document.register;
        if (login_form.user_id.value==""){
            alert("아이디를 입력하세요.");
        }else{
            url="id_check.php?user_id="+login_form.user_id.value;
            window.open(url,"ID check","width=500, height=250, scrollbars=no, resizeable=no");
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
                <form method="POST" name="register" action="register_check.php" onsubmit="return input_check()">
                    <p>아이디 : <input type="text" id="user_id" name="user_id"><input type="button" value="중복체크" name="check_id" onclick="duplicated_check()"></p>
                    <input type=hidden id="checked_id" name="checked_id" value=0> <!-- 중복체크 버튼 클릭 유무 -->
                    <p>비밀번호 : <input type="password"  name="user_pw"></p>
                    <p>비밀번호 확인 : <input type="password"  name="user_pw_check"></p>
                    <p>닉네임 : <input type="text"  name="user_nickname"></p>
                    <p>이름 : <input type="text"  name="user_name"></p>
                    <p>생일 : <input type="date"  name="user_birth" required></p>
                    <p>
                        <input type="radio" name="user_gender" value="m" required>남성
                        <input type="radio" name="user_gender" value="w">여성
                    </p>
                    <p><input type="submit" value="회원가입">&nbsp;&nbsp;&nbsp;&nbsp;<input type="reset" value="초기화"></p>
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