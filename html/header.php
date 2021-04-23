<?php
    session_start();
  if( isset( $_SESSION[ 'user_id' ] ) ) {
    echo "<style>#logined{display:inline-block;}</style>";
    echo "<style>#logouted{display:none;}</style>";
  }else{
    echo "<style>#logined{display:none;}</style>";
    echo "<style>#logouted{display:inline-block;}</style>";
  }
?>

<style>
    #header_login_btn,#header_register_btn,#header_logout_btn,#search_btn{
        cursor:pointer;
    }
</style>

<script>
    function book_list(){
        <?php
        if(!isset($_SESSION['book_genre'])){
            $_SESSION['book_genre']="문학/시";
        }
        ?>
        location.href="http://khsung1.dothome.co.kr/html/book_list.php";
    }
    function search_check(){
        if(document.search.search_var.value==""){
            alert("검색어를 입력해주세요.");
            return false;
        }
        else{
            return true;
        }
    }
</script>

<div class="header">
    <div class="header_inner">
        <div class="header_logo">
        <a href="http://khsung1.dothome.co.kr/html/index.php"><img src="#" alt="로고"></a>
        </div>
        <div class="header_nav">

	<!-- introduction폴더에도 적용하기 위해 절대경로 설정 -->
            <ul>
                <li><a href="http://khsung1.dothome.co.kr/html/introduction/introduction.php">소개페이지</a></li>
                <li><a href="javascript:book_list();" >책분야</a></li>
                <li><a href="">로드맵</a></li>
                <li><a href="http://khsung1.dothome.co.kr/html/mypage.php">마이페이지</a></li>
            </ul>
        </div>
        <div class="login_menu" id="logouted">
            <button type="button" id="header_login_btn" onClick="location.href='http://khsung1.dothome.co.kr/html/login.php'">로그인</button>
            <button type="button" id="header_register_btn" onClick="location.href='http://khsung1.dothome.co.kr/html/register.php'">회원가입</button>
        </div>
        <div class="login_menu" id="logined">
            <?php
                echo $_SESSION['user_name']."님 환영합니다.";
            ?>
            <button type="button" id="header_logout_btn" onClick="location.href='http://khsung1.dothome.co.kr/html/logout.php'">로그아웃</button>
        </div>
        <div class="search">
            <form name="search" method="post" action="http://khsung1.dothome.co.kr/html/search.php" onsubmit="return search_check()">
                <input type="text" name="search_var">
                <button id="search_btn" type="submit">검색</button>
            </form>
        </div>
    </div>
</div>