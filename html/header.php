<?php
  if( isset( $_SESSION[ 'user_id' ] ) ) {
    echo "<style>#logined{display:inline-block;}</style>";
    echo "<style>#logouted{display:none;}</style>";
  }else{
    echo "<style>#logined{display:none;}</style>";
    echo "<style>#logouted{display:inline-block;}</style>";
  }
?>
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Noto+Serif+KR:wght@200;300;400;500&family=Roboto:wght@100;300;500&display=swap" rel="stylesheet">
<style>
    *{
        font-family: 'Roboto','Noto Serif KR', sans-serif;
    }
    .navbar{
        text-align:right;
        width: 560px;
        height: 50px;
        padding:0;
        margin:0;
    }
    .btn-login,.btn-signup,.btn-logout,#search_btn{
        cursor:pointer;
    }
    h2{
        font-size:25px;
    }
    h3{
        font-size:20px;
    }
    .navbar__list{
        border-radius:10px;
        color:white;
        transition-duration: 0.4s;
    }
    .navbar__list:hover .navbar__text{
        color:white;
        transition-duration: 0.4s;
    }
    .navbar__list:hover{
        background-color:black;
        transition-duration: 0.4s;
    }
    .search__bar{

    }
    .btn-search{}
</style>

<script>
    function book_list(){
        <?php
        if(!isset($_SESSION['book_genre'])){
            $_SESSION['book_genre']="문학/시";
        }
        ?>
        location.href="http://khsung0.dothome.co.kr/html/book_list.php";
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

<header class="header">
        <div class="header__logo">
            <div class="logo">
                <a class="logo__link" href="http://khsung0.dothome.co.kr/html/index.php"><span class="logo__text">SPOILER</span></a>
            </div>
        </div>
            
        <div class="header__navbar">

    <!-- introduction폴더에도 적용하기 위해 절대경로 설정 -->
            <ul class="navbar">
                <li class="navbar__list"><a class=" navbar__link" href="http://khsung0.dothome.co.kr/html/introduction/introduction.php"><span class="navbar__text">소개페이지</span></a></li><!--
                --><li class="navbar__list"><a class=" navbar__link" href="javascript:book_list();" ><span class="navbar__text">책 리스트</span></a></li><!--
                --><li class="navbar__list"><a class=" navbar__link" href="http://khsung0.dothome.co.kr/html/road_map.php"><span class="navbar__text">로드맵</span></a></li><!--
                --><li class="navbar__list"><a class=" navbar__link" href="http://khsung0.dothome.co.kr/html/mypage.php"><span class="navbar__text">마이페이지</span></a></li><!--
                -->
            </ul>
        </div>
        <div class="header__buttons" id="logouted">
            <span class="header__btn">
                <button class="btn btn-login" type="button" onClick="location.href='http://khsung0.dothome.co.kr/html/login.php'">
                <span class="btn__text">로그인</span>
            </button>
            </span><!--
            --><span class="header__btn">
                <button class="btn btn-signup" type="button" onClick="location.href='http://khsung0.dothome.co.kr/html/register.php'"><span class="btn__text">회원가입</span>
            </button>
            </span>
        </div>
        <div class="header__buttons" id="logined">
            <?php
                echo $_SESSION['user_name']."님 환영합니다.";
            ?>
            <span class="header__btn">
                <button class="btn btn-logout" type="button" onClick="location.href='http://khsung0.dothome.co.kr/html/logout.php'"><span class="btn__text">로그아웃</span></button>
            </span>
        </div>
        <div class="header__search">
            <form class="search" name="search" method="post" action="http://khsung0.dothome.co.kr/html/search.php" onsubmit="return search_check()">
                <input class="search__bar" type="text" name="search_var">
                <span class="search__btn">
                    <button class="btn btn-search" id="search_btn" type="submit"><img class="btn__icon" width="26px" src="http://khsung0.dothome.co.kr/img/search_icon.png" alt="icon"></button>
                </span>
            </form>
        </div>
    </header>
    



