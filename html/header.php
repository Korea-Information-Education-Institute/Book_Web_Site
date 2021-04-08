
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
            <form name="search" method="post" action="./search.php" onsubmit="return search_check()">
                <input type="text" name="search_var">
                <button type="submit">검색</button>
            </form>
        </div>
    </div>
</div>