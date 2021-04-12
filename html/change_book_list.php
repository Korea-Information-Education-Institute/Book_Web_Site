<?php session_start();?>
<!-- <script language = "javascript">
    temp = decodeURI(location.href).split("?");
    data=temp[1].split("/");
    genre = data[0];
    genre_detail = data[1];
    
    
    //window.location=document.referrer
 </script> -->
<?php
    header('Content-Type: text/html; charset=utf-8');
    $temp = URLDecode($_SERVER['QUERY_STRING']);
    unset($_SESSION['book_genre']);
    $_SESSION['book_genre']=$temp;
    echo "<script>window.location=document.referrer</script>";
    
?>