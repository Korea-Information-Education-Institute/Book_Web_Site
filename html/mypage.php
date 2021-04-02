<!DOCTYPE html>
<html lang="ko">
<?php session_start(); ?>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/basic.css">
    <link rel="stylesheet" href="../css/index.css">
    <title>Document</title>
</head>

<?php
  if( isset( $_SESSION[ 'user_id' ] ) ) {
    echo "<style>#logined{display:inline-block;}</style>";
    echo "<style>#logouted{display:none;}</style>";
  }else{
    echo "<style>#logined{display:none;}</style>";
    echo "<style>#logouted{display:inline-block;}</style>";
  }
?>

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
        <div class="header">
            <div class="header_inner">
                <div class="header_logo">
                <a href="./index.php"><img src="#" alt="로고"></a>
                </div>
                <div class="header_nav">
                    <ul>
                        <li><a href="#">소개페이지</a></li>
                        <li><a href="">책분야</a></li>
                        <li><a href="">로드맵</a></li>
                        <li><a href="./mypage.php">마이페이지</a></li>
                    </ul>
                </div>
                <div class="login_menu">
                    <button type="button" onClick="location.href='./login.html'">로그인</button>
                    <button type="button" onClick="location.href='./register.html'">회원가입</button>
                </div>
                <div class="search">
                    <input type="text">
                    <button type="submit">검색</button>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="container_inner">
                
            </div>
        </div>
        <div class="footer">
            <div class="footer_inner">
                <p>푸터입니다.</p>
            </div>
        </div>
    </div>
</body>
</html>