<!DOCTYPE html>
<html lang="ko">
<?php session_start(); ?>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/book.css">
    <link rel="stylesheet" href="../css/basic.css">
    <link rel="stylesheet" href="../css/index.css">
    <title>책분야</title>
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

<style>
    .container_list{
        width: 1400px;
        height: 1400px;
        margin: 0 auto;
        position: relative;
    }
    .aside{
        width: 240px;
        height: 580px;
        float: left; 
        background-color: antiquewhite;
        padding: 10px;
        margin-right: 20px;
        margin-top: 60px;
        
    }
    .aside h3   {
        padding-top: 15px;
        padding-left: 5px;
    }
    .aside p{
        padding-left: 15px;
    }
    .book_index{
        margin-top: 30px;
        margin-left: 20px;
    }
    .book_container{
        width: 980px;
        height: 1400px;
        float: left;
        margin-top: 30px;
        
    }
    .book_list_box{
        border: 1px solid black;
        width: 940px;
        height: 230px;
        position: relative;
        margin-bottom: 20px;
    }
    .book_list_box_img{
        width: 230px;
        position: absolute;
    }
    .book_list_box_table{
        position: absolute;
        left: 240px;
        line-height: 2em;
    }
    .table1{
        font-weight: 500;
    }
    
    img{
        width: 230px;
        height: 230px;
    
    }
   
    .footer{
        
    }
</style>
<body>
    <div class="wrap">
        <div class="header">
            <div class="header_inner">
                <div class="header_logo">
                <a href="./index.php"><img src="#" alt="로고"></a>
                </div>
                <div class="header_nav">
                    <ul>
                        <li><a href="./introduction/introduction.php">소개페이지</a></li>
                        <li><a href="./book_list.php">책분야</a></li>
                        <li><a href="">로드맵</a></li>
                        <li><a href="./mypage.php">마이페이지</a></li>
                    </ul>
                </div>
                 <div class="login_menu" id="logouted">
                    <button type="button" onClick="location.href='./login.html'">로그인</button>
                    <button type="button" onClick="location.href='./register.html'">회원가입</button>
                </div>
           		 <div class="login_menu" id="logined">
                    <?php
		            echo $_SESSION['user_name']."님 환영합니다.";
	                ?>
                    <button type="button" onClick="location.href='./logout.php'">로그아웃</button>
                </div>
                <div class="search">
                    <input type="text">
                    <button type="submit">검색</button>
                </div>
            </div>
        </div>
        <div class="container_list">
            <div class="aside">
                <a href="#"><h3>문학</h3></a>
                <a href="#"><p>시</p></a>
                <a href="#"><p>소설</p></a>
                <a href="#"><h3>취미</h3></a>
                <a href="#"><p>여행</p></a>
                <a href="#"><p>건강</p></a>
                <a href="#"><p>요리</p></a>
                <a href="#"><h3>인문</h3></a>
                <a href="#"><p>문학</p></a>
                <a href="#"><p>심리</p></a>
                <a href="#"><p>철학</p></a>  
            </div>

            <div class="book_index">
                <h2>문학>소설</h2>
            </div> 
            
            <div class="book_container">
            <div class="book_list_box">
                <div class="book_list_box_img">
                    <img src="../News_Webpage/Book_Web_Site/img/2360248.png" alt="책 사진">
                </div>
                <div class="book_list_box_table">
                    <li><span class="table1">책 제목</span><span class="table2"> : 책 제목 넣을 곳</span></li>
                    <li><span class="table1">책 저자</span><span class="table2"> : 책 저자 넣을 곳</span></li>
                    <li><span class="table1">책 가격</span><span class="table2"> : 책 가격 넣을 곳</span></li>
                    <li><span class="table1">책 출판사</span><span class="table2"> : 책 출판사 넣을 곳</span></li>
                    <li><span class="table1">책 분류</span><span class="table2"> : 책 분류 넣을 곳</span></li>
                    <li><span class="table1">책 소개</span><span class="table2"> : 책 소개 넣을 곳책 소개 넣을 곳 책 소개 넣을 곳책 소개 넣을 곳책 소개 넣을 곳책 소개 넣을 곳책 소개 넣을 곳책 소개 넣을 곳책 소개 넣을 곳</span></li>
                </div> 
            </div>
            <div class="book_list_box">
                <div class="book_list_box_img">
                    <img src="../News_Webpage/Book_Web_Site/img/2360248.png" alt="책 사진">
                </div>
                <div class="book_list_box_table">
                    <li><span class="table1">책 제목</span><span class="table2"> : 책 제목 넣을 곳</span></li>
                    <li><span class="table1">책 저자</span><span class="table2"> : 책 저자 넣을 곳</span></li>
                    <li><span class="table1">책 가격</span><span class="table2"> : 책 가격 넣을 곳</span></li>
                    <li><span class="table1">책 출판사</span><span class="table2"> : 책 출판사 넣을 곳</span></li>
                    <li><span class="table1">책 분류</span><span class="table2"> : 책 분류 넣을 곳</span></li>
                    <li><span class="table1">책 소개</span><span class="table2"> : 책 소개 넣을 곳책 소개 넣을 곳 책 소개 넣을 곳책 소개 넣을 곳책 소개 넣을 곳책 소개 넣을 곳책 소개 넣을 곳책 소개 넣을 곳책 소개 넣을 곳</span></li>
                </div> 
            </div>
            <div class="book_list_box">
                <div class="book_list_box_img">
                    <img src="../News_Webpage/Book_Web_Site/img/2360248.png" alt="책 사진">
                </div>
                <div class="book_list_box_table">
                    <li><span class="table1">책 제목</span><span class="table2"> : 책 제목 넣을 곳</span></li>
                    <li><span class="table1">책 저자</span><span class="table2"> : 책 저자 넣을 곳</span></li>
                    <li><span class="table1">책 가격</span><span class="table2"> : 책 가격 넣을 곳</span></li>
                    <li><span class="table1">책 출판사</span><span class="table2"> : 책 출판사 넣을 곳</span></li>
                    <li><span class="table1">책 분류</span><span class="table2"> : 책 분류 넣을 곳</span></li>
                    <li><span class="table1">책 소개</span><span class="table2"> : 책 소개 넣을 곳책 소개 넣을 곳 책 소개 넣을 곳책 소개 넣을 곳책 소개 넣을 곳책 소개 넣을 곳책 소개 넣을 곳책 소개 넣을 곳책 소개 넣을 곳</span></li>
                </div> 
            </div>
            <div class="book_list_box">
                <div class="book_list_box_img">
                    <img src="../News_Webpage/Book_Web_Site/img/2360248.png" alt="책 사진">
                </div>
                <div class="book_list_box_table">
                    <li><span class="table1">책 제목</span><span class="table2"> : 책 제목 넣을 곳</span></li>
                    <li><span class="table1">책 저자</span><span class="table2"> : 책 저자 넣을 곳</span></li>
                    <li><span class="table1">책 가격</span><span class="table2"> : 책 가격 넣을 곳</span></li>
                    <li><span class="table1">책 출판사</span><span class="table2"> : 책 출판사 넣을 곳</span></li>
                    <li><span class="table1">책 분류</span><span class="table2"> : 책 분류 넣을 곳</span></li>
                    <li><span class="table1">책 소개</span><span class="table2"> : 책 소개 넣을 곳책 소개 넣을 곳 책 소개 넣을 곳책 소개 넣을 곳책 소개 넣을 곳책 소개 넣을 곳책 소개 넣을 곳책 소개 넣을 곳책 소개 넣을 곳</span></li>
                </div> 
            </div>
            <div class="book_list_box">
                <div class="book_list_box_img">
                    <img src="../News_Webpage/Book_Web_Site/img/2360248.png" alt="책 사진">
                </div>
                <div class="book_list_box_table">
                    <li><span class="table1">책 제목</span><span class="table2"> : 책 제목 넣을 곳</span></li>
                    <li><span class="table1">책 저자</span><span class="table2"> : 책 저자 넣을 곳</span></li>
                    <li><span class="table1">책 가격</span><span class="table2"> : 책 가격 넣을 곳</span></li>
                    <li><span class="table1">책 출판사</span><span class="table2"> : 책 출판사 넣을 곳</span></li>
                    <li><span class="table1">책 분류</span><span class="table2"> : 책 분류 넣을 곳</span></li>
                    <li><span class="table1">책 소개</span><span class="table2"> : 책 소개 넣을 곳책 소개 넣을 곳 책 소개 넣을 곳책 소개 넣을 곳책 소개 넣을 곳책 소개 넣을 곳책 
                        소개 넣을 곳책 소개 넣을 곳책 소개 넣을 곳</span></li>
                </div> 
            </div>
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

