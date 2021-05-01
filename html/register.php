<!DOCTYPE html>
<html lang="ko">
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
    #user_id,#user_pw,#user_pw_check,#user_nickname,#user_name{
        width:250px;
        height:30px;
        font-size:18px;
        border:1px solid rgba(199, 199, 199, 0.856);
        border-radius:5px;
        padding:0px 0px 0px 5px;
        position:relative;
        margin-right:10px;
    }
    #check_id{
        width:80px;
        height:30px;
        position:absolute;
        top:262px;
        left:640px;
        font-size:15px;
        background-color:white;
        color:#51909E;
        border-radius:10px;
        border:1px solid #51909E;
        cursor:pointer;
        transition-duration:0.6s;
    }
    #submit,#reset{
        width:80px;
        height:25px;
        background-color:white;
        color:#51909E;
        border-radius:10px;
        border:1px solid #51909E;
        cursor:pointer;
        transition-duration:0.6s;
    }
    #submit:hover,#reset:hover{
        background-color:#51909E;
        color:white;
    }
</style>

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
                <p style='font-size:30px; font-weight:550;'>Member Register</p><br><br><br>
                <form method="POST" name="register" action="register_check.php" onsubmit="return input_check()">
                    <input type="text" id="user_id" name="user_id" placeholder='ID' required><input type="button" value="중복체크" id="check_id" name="check_id" onclick="duplicated_check()"><br><br>
                    <input type=hidden id="checked_id" name="checked_id" value=0> <!-- 중복체크 버튼 클릭 유무 -->
                    <input type="password" id="user_pw" name="user_pw" placeholder='PW' required minlength="4"><br><br>
                    <input type="password" id="user_pw_check" name="user_pw_check" placeholder='PW_Check' required><br><br>
                    <input type="text" id="user_nickname" name="user_nickname" placeholder='Nick_Name' required><br><br>
                    <input type="text" id="user_name" name="user_name" placeholder='Name' required><br><br>
                    Birth day &nbsp;&nbsp;<input type="date" id="user_birth" name="user_birth" required><br><br>
                    
                        <input type="radio" name="user_gender" value="m" required>남성
                        <input type="radio" name="user_gender" value="w">여성<br><br>
                    
                    <p><input type="submit" id="submit" value="회원가입">&nbsp;&nbsp;&nbsp;&nbsp;<input type="reset" id="reset" value="초기화"></p>
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