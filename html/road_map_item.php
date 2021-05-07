<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include "./head.php"; ?>
    <title>Document</title>
</head>
<style>
    p{
        margin:0;
    }
    .container{
        height:900px;
    }
    .container_inner{
        text-align:center;
        padding-top:183px;
        height:870px;
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