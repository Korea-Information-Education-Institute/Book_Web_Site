<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/basic.css">
    <link rel="stylesheet" href="../css/index.css">
    <link rel="stylesheet" href="../css/aside.css?after"> <!-- 서버에서 캐시문제로 css적용안되어 임의의 문자열 추가시켜서 적용 -->
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

<style>
    .book_index{
        margin-top: 20px;
        margin-bottom: 20px;
    }
    .book_list_box{
        border: 1px solid black;
        width: 950px;
        height: 270px;
        margin-bottom: 20px;
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
    }
    .book_list_box_img{
        float: left;
    }
    .book_list_box_table{
        margin: 5px;
    }
    .table1{
        line-height: 40px;
        margin-left: 20px;
        font-size: 13pt;
        font-weight: 700;
    }
    .table2{
        

    }
    .table3{
        
    }
    
    .container_inner img{
        width: 230px;
        height: 268px;
        border: 1px solid black;
    }
    .write{
        position: absolute;
        bottom: 150px;
        right: 40px;
        
    }
    button{
        width: 100px;
        height: 30px;
    }
    .page{
        position: absolute;
        bottom: 50px;
        left: 430px;
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
                        <li><a href="./introduction/introduction.html">소개페이지</a></li>
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
        <div class="container">
            <div class="container_inner">
                <div class="book_index">
                    <h2>문학>소설</h2>
                </div>
                <div class="book_list_box">
                    <div class="book_list_box_img">
                        <img src="../html/캡처.PNG" alt="책 사진">
                    </div>
                    <div class="book_list_box_table">
                        <li><span class="table1">책 제목</span><span class="table2"> : 책 제목 넣을 곳</span></li>
                        <li><span class="table1">책 저자</span><span class="table2"> : 책 저자 넣을 곳</span></li>
                        <li><span class="table1">책 가격</span><span class="table2"> : 책 가격 넣을 곳</span></li>
                        <li><span class="table1">책 출판사</span><span class="table2"> : 책 출판사 넣을 곳</span></li>
                        <li><span class="table1">책 분류</span><span class="table2"> : 책 분류 넣을 곳</span></li>
                        <li><span class="table1">책 소개</span><span class="table2"> : 책 소개 넣을 곳책 소개 넣을 곳
                            책 소개 넣을 곳책 소개 넣을 곳책 소개 넣을 곳책 소개 넣을 곳책 소개 넣을 곳책 소개 넣을 곳책 소개 넣을 곳
                        </span></li>
                    </div>
                </div>
                

                <div class="book_list_box">
                    <div class="book_list_box_img">
                        <img src="../html/캡처.PNG" alt="책 사진">
                    </div>
                    <div class="book_list_box_table">
                        <li><span class="table1">책 제목</span><span class="table2"> : 책 제목 넣을 곳</span></li>
                        <li><span class="table1">책 저자</span><span class="table2"> : 책 저자 넣을 곳</span></li>
                        <li><span class="table1">책 가격</span><span class="table2"> : 책 가격 넣을 곳</span></li>
                        <li><span class="table1">책 출판사</span><span class="table2"> : 책 출판사 넣을 곳</span></li>
                        <li><span class="table1">책 분류</span><span class="table2"> : 책 분류 넣을 곳</span></li>
                        <li><span class="table1">책 소개</span><span class="table2"> : 책 소개 넣을 곳책 소개 넣을 곳
                            책 소개 넣을 곳책 소개 넣을 곳책 소개 넣을 곳책 소개 넣을 곳책 소개 넣을 곳책 소개 넣을 곳책 소개 넣을 곳
                        </span></li>
                    </div>
                </div>

                <div class="book_list_box">
                    <img src="#" alt="책 사진">
                    <ul>
                        <li><span class="table1">책 제목</span><span class="table2"> : 책 제목 넣을 곳</span></li>
                        <li><span class="table1">책 저자</span><span class="table2"> : 책 저자 넣을 곳</span></li>
                        <li><span class="table1">책 가격</span><span class="table2"> : 책 가격 넣을 곳</span></li>
                        <li><span class="table1">책 출판사</span><span class="table2"> : 책 출판사 넣을 곳</span></li>
                        <li><span class="table1">책 분류</span><span class="table2"> : 책 분류 넣을 곳</span></li>
                        <li><span class="table1">책 소개</span><span class="table2"> : 책 소개 넣을 곳책 소개 넣을 곳
                            책 소개 넣을 곳책 소개 넣을 곳책 소개 넣을 곳책 소개 넣을 곳책 소개 넣을 곳책 소개 넣을 곳책 소개 넣을 곳
                        </span></li>
                    </ul>
                </div>

                <div class="book_list_box">
                    <img src="#" alt="책 사진">
                    <ul>
                        <li><span class="table1">책 제목</span><span class="table2"> : 책 제목 넣을 곳</span></li>
                        <li><span class="table1">책 저자</span><span class="table2"> : 책 저자 넣을 곳</span></li>
                        <li><span class="table1">책 가격</span><span class="table2"> : 책 가격 넣을 곳</span></li>
                        <li><span class="table1">책 출판사</span><span class="table2"> : 책 출판사 넣을 곳</span></li>
                        <li><span class="table1">책 분류</span><span class="table2"> : 책 분류 넣을 곳</span></li>
                        <li><span class="table1">책 소개</span><span class="table2"> : 책 소개 넣을 곳책 소개 넣을 곳
                            책 소개 넣을 곳책 소개 넣을 곳책 소개 넣을 곳책 소개 넣을 곳책 소개 넣을 곳책 소개 넣을 곳책 소개 넣을 곳
                        </span></li>
                    </ul>
                </div>

                <div class="write">
                    <button>새 책 작성하기</button>
                </div>
                <div class="page">
                    <p>번호 넣기</p>
                </div>
            </div>
        </div>

        <!-- aside 공유할부분 ↓-->
        <div class="aside">
            <a href="#"><h3>문학</h3></a>
            <a href="#"><p>시</p></a>
            <a href="#"><p>소설</p></a>
            <a href="#"><h3>취미</h3></a>
            <a href="#"><p>여행</p></a>
            <a href="#"><p>건강</p></a>
            <a href="#"><h3>요리</h3></a>
            <a href="#"><p>인문</p></a>
            <a href="#"><p>문학</p></a>
            <a href="#"><p>심리</p></a>
            <a href="#"><p>철학</p></a>  
        </div>
        <!-- aside 공유할부분 ↑-->
        
        <div class="footer">
            <div class="footer_inner">
                <p>푸터입니다.</p>
            </div>
        </div>
    </div>
</body>
</html>
