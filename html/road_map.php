<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <?php include "./head.php"; ?>
    <title>Document</title>
</head>

<style>
    p{
        margin:0;
    }
    .container{
        height:1000px;
    }
    .container_inner{
        text-align:center;
        padding-top:183px;
        height:880px;
    }
</style>


<body>
<div class="wrap">
        <?php
            include "./header.php";
        ?>
        <div class="container">
            <div class="container_inner">
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