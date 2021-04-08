<!DOCTYPE html>
<html lang="ko">
<?php session_start(); ?>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/basic.css">
    <link rel="stylesheet" href="../css/index.css?after"> <!--  캐시문제로 서버에서 외부스타일시트 변경사항이 적용안되어 임의의 문자열삽입 -->
    <title>Document</title>
</head>

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
                <form method="POST" name="change_pw" action="./change_pw_check.php" onsubmit="return input_check()">
                    <p>현재 비밀번호 : <input type="password" name="user_pw"></p>
                    <p>변경 비밀번호 : <input type="password"  name="change_user_pw"></p>
                    <p>변경 비밀번호 확인 : <input type="password"  name="change_user_pw1"></p>
                    <p><input type="submit" value="변경하기">&nbsp;&nbsp;&nbsp;&nbsp;<input type="reset" value="초기화"></p>
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