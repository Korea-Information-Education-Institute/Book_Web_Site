<!DOCTYPE html>
<html lang="ko">

<head>
    <meta charset="UTF-8">
    <?php include "./head.php"; ?>
    <title>Document</title>
</head>
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
    <?php
        include "./javascript.php";
    ?>
</body>

</html>