<?php
    header('Content-Type: text/html; charset=utf-8');
    $book_title=$_POST['search_var'];
    echo "<script>url=encodeURI('http://khsung0.dothome.co.kr/html/searched_book_list.php?$book_title');</script>";
    echo "<script>location.href=url;</script>";
?>