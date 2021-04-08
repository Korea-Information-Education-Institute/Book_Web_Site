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
  if( isset( $_SESSION[ 'user_id' ] ) ) {
    echo "<style>#logined{display:inline-block;}</style>";
    echo "<style>#logouted{display:none;}</style>";
  }else{
    echo "<style>#logined{display:none;}</style>";
    echo "<style>#logouted{display:inline-block;}</style>";
  }
?>

<body>
    <div class="wrap">
        <?php 
            include './header.php';
        ?>
        <div class="container">
            <div class="container_inner">
                <div class="moving">
                    <ul>
                        <li>1</li>
                        <li>2</li>
                        <li>3</li>
                        <li>4</li>
                        <li>5</li>
                    </ul>
                </div>
                <div class="box">
                   <ul class="section">
                       <li>책1</li>
                       <li>책1</li>
                       <li>책1</li>
                   </ul>
                   <ul class="section">
                       <li>책1</li>
                       <li>책1</li>
                       <li>책1</li>
                   </ul>
                   <ul class="section">
                       <li>책1</li>
                       <li>책1</li>
                       <li>책1</li>
                   </ul>
                </div>
            </div>
        </div>
        <?php 
            include "./footer.php";
        ?>
    </div>
    <script type="text/javascript" src="../javascript/search.js"></script>
</body>

</html>