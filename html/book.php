<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/book.css">
    <link rel="stylesheet" href="../css/basic.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Document</title>
</head>

<body>
    <?php
        header('Content-Type: text/html; charset=utf-8');
        //출력할 책의 제목 추출
        $temp_title=str_replace("_"," ",URLDecode($_SERVER['QUERY_STRING']));
        //echo $temp_title;
        if(include('./dbconnect.php')){
            $sql = "SELECT * FROM `book` WHERE `book_title` LIKE '%$temp_title%'";
            $result = mysqli_query($conn, $sql);
            $count = mysqli_num_rows($result);
            while($row = mysqli_fetch_array($result)){
                echo $row['book_title'].'<br>';
                echo $row['book_writer'].'<br>';
                echo $row['book_price'];
                echo "<pre style='white-space: pre-wrap;'>$row[book_introduce]</pre>";
            }
        }
    ?>
    <div class="wrap">
        <nav class="navbar">
            <a class="navbar__brand" href="#">BRAND</a>
            <div class="navbar__nav">
                <a class="link" href="#">link1</a><!--
                --><a class="link" href="#">link2</a><!--
                --><a class="link" href="#">link3</a><!--
                --><a class="link" href="#">link4</a>
            </div>
            <form class="navbar__form" role="search">
                <input class="searchbox" type="text" placeholder="Search"><!--
                --><button class="btn" type="submit">Submit</button>
            </form>
        </nav>
        <article class="book">
            <div class="intro">
                <div class="btn-group">
                <button class="btn" type="button">편집</button><!--
                --><button class="btn" type="button">토론</button><!--
                --><button class="btn" type="button">좋아요</button>
                </div>
                <div class="toc" id="toc">
                    <h3 class="toc__title">목차</h3>
                    <ul class="toc__indent">
                        <li class="item"><a href="#h_1">1.</a>개요</li>
                    </ul>
                </div>
                                <table class="info-table">
                    <tr class="tr">
                        <td class="td" colspan="2"><img class="book-img" src="#" alt="책 표지" ></td>
                    </tr>
                    <tr class="tr">
                        <td class="td" class="book-title" colspan="2">책 제목</td>
                    </tr>
                    <tr class="tr">
                        <td class="td" >출판사</td>
                        <td class="td" ></td>
                    </tr>
                    <tr class="tr">
                        <td class="td" >출판일</td>
                        <td class="td" ></td>
                    </tr>
                </table>
            </div>
            <div class="heading">
                <h2><a href="#toc" id="h_1">1.</a>개요</h2>
            </div>
            <div class="heading-content">
                <p>내용 입니다.</p>
            </div>
            </article>
        <footer class="footer">
            <p>푸터입니다.</p>
        </footer>
    </div>
</body>
</html>