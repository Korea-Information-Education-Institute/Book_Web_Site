<?php
    session_start();
    header('Content-Type: text/html; charset=utf-8');
    // ?이후에 추가된 문자열 디코딩
    $temp = URLDecode($_SERVER['QUERY_STRING']);
    unset($_SESSION['book_genre']);
    $_SESSION['book_genre']=$temp;
    echo "<script>window.location=document.referrer</script>";
    
?>