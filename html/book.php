<!DOCTYPE html>
<html lang="ko">
<?php session_start();header('Content-Type: text/html; charset=utf-8');?>
<head>
    <meta charset="UTF-8">
    
    <?php include "./head.php"; ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Document</title>
    <script src="//code.jquery.com/jquery-1.11.2.min.js"></script>
    <script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
</head>
<style>
    p{
        margin:0;
    }
    .container{
        height:1400px;
    }
    .container_inner{
        text-align:center;
        padding-top:40px;
        height:880px;
    }
    h2{
        margin:0;
    }
    #scrap,#scraped,#homepage{
        cursor:pointer;
        background-color:white;
        height:30px;
        border:0;
        box-shadow:1px 1px 1px 1px gray;
        border-radius:5px;
    }
    #table{
        border-radius:20px;
    }
    table{
        border-collapse: collapse;
        border:1px solid white;
        margin-left:auto;
        margin-right:auto;
        width:500px;

    }
    table tr:first-child{
        border-top-right-radius: 10px;
        border-top-left-radius: 10px;
    }
    table tr:last-child {
        border-bottom-right-radius: 10px;
        border-bottom-left-radius: 10px;
    }
    th, td{
        border:1px solid white;
        padding:5px;
    }
    tr:nth-child(odd){
        background-color:#C8FFFF;
    }
    tr:nth-child(even){
        background-color:#B9E2FA;
    }
    
</style>
<body>
    <?php
        $temp_title=str_replace("_"," ",URLDecode($_SERVER['QUERY_STRING']));
        if(include('./dbconnect.php')){
            $sql = "SELECT * FROM `book` WHERE `book_title` LIKE '%$temp_title%'";
            $result = mysqli_query($conn, $sql);
            $count = mysqli_num_rows($result);
            $row = mysqli_fetch_array($result);
            $row['book_index']=(int)$row['book_index'];
        }
    ?>

    <script>
        function update_intro(){
            var edit_btn=document.getElementById('edit_btn');
            var intro=document.getElementById('intro');
            var intro_text=document.getElementById('intro').innerText;
            
            if(edit_btn.value=='edit'){
                $.ajax({
                    url				: './update_intro.php',
                    data			: {
                    intro		    : intro_text,
                    title		    : "<?php echo $temp_title;?>",
                    type		    : "edit",
                    user_id		    : "<?php echo $_SESSION['user_id'];?>"},
                    type			: 'POST',
                    dataType		: 'json',
                    success		: function(result) {
                        if(result.success == false) {
                            alert(result.msg);
                        }else{
                            edit_btn.innerText = '??????';
                            edit_btn.value='confirm';
                            intro.contentEditable=true;
                        }
                    }
                });
            }else{
                edit_btn.innerText = '????????????';
                edit_btn.value='edit';
                intro.contentEditable=false;
                $.ajax({
                    url				: './update_intro.php',
                    data			: {
                    intro		    : intro_text,
                    title		    : "<?php echo $temp_title;?>",
                    type		    : "confirm",
                    user_id		    : "<?php echo $_SESSION['user_id'];?>"},
                    type			: 'POST',
                    dataType		: 'json',
                    success		: function(result) {
                        if(result.success == false) {
                            alert(result.msg);
                            return;
                        }
                        alert(result.success_msg);
                    }
                });
            }
        }
        function update_scrap(scrap_type){
            $.ajax({
                url				: './update_scrap.php',
                data			: {
                scrap_type      : scrap_type,
                user_id		    : "<?php echo $_SESSION['user_id'];?>",
                book_index		: "<?php echo $row['book_index'];?>"},
                type			: 'POST',
                dataType		: 'json',
                success		: function(result) {
                    if(result.success == false) {
                        alert(result.msg);
                        return;
                    }
                }
            });
            window.location.reload();
        }
    </script>

    <div class="wrap">
        <?php 
            include './header.php';
            if(include('./dbconnect.php')){
                if( isset($_SESSION['user_id'])){
                    $sql2 = "SELECT * FROM scrap WHERE user_id='$_SESSION[user_id]' AND book_index='$row[book_index]'";
                    $result2 = mysqli_query($conn, $sql2);
                    $count2 = mysqli_num_rows($result2);
                    $row1 = mysqli_fetch_array($result2);
                    if ($count2==0){
                        echo "<style>#scrap{display:inline-block;}</style>";
                        echo "<style>#scraped{display:none;}</style>";
                    }else{
                        echo "<style>#scrap{display:none;}</style>";
                        echo "<style>#scraped{display:inline-block;}</style>";
                    }
                }else{
                    echo "<style>#scrap{display:inline-block;}</style>";
                    echo "<style>#scraped{display:none;}</style>";
                    echo "<script>document.getElementById('scrap').disabled=false;</script>";
                }
            }
        ?>
        <div class="container">
            <div class="container_inner" style="text-align:center;">
                <br><br>
                <img src=<?php echo $row['book_img_address']?> alt="?????????" width="300" height="400">
                <br><br>
                <button id="scrap" onclick="update_scrap('insert')">&#x2661;&nbsp;?????????</button>
                <button id="scraped" onclick="update_scrap('delete')">&#x1f493;&nbsp;????????? ??????</button>&nbsp&nbsp&nbsp
                <button id="homepage" onClick="location.href='<?php echo $row['book_web_address'];?>'">???????????? ??????</button>
                <br><br><br>
                <div id="table">
                <table>
                    <tr>
                        <th>??????</th>
                        <td><?php echo $row['book_title'];?></td>
                    </tr>
                    <tr>
                        <th>??????</th>
                        <td><?php echo $row['book_writer'];?></td>
                    </tr>
                    <tr>
                        <th>??????</th>
                        <td><?php echo $row['book_genre'];?></td>
                    </tr>
                    <tr>
                        <th>?????????</th>
                        <td><?php echo $row['book_publication_date'];?></td>
                    </tr>
                    <tr>
                        <th>??????</th>
                        <td><?php echo $row['book_price'];?></td>
                    </tr>
                </table>
                </div>
                <br><hr><br>
                <div>
                    <h2 style="text-align:left;margin-left:10px;">??? ??????<button style="position:absolute;left:895px;top:733px;height:35px;cursor:pointer;width:80px;" value="edit" id='edit_btn' onclick="update_intro()">????????????</button></h2>
                </div>
                <br><hr>
                <div style="overflow-y:auto; overflow-x:hidden; width:1000px; height:580px;">                    
                    <?php echo "<pre id='intro' contenteditable='false' style='white-space: pre-wrap;padding:10px;line-height: 1.5em;'>$row[book_introduce]</pre>";?>            
                </div>
                <hr>
            </div>
        </div>
        <?php 
            include "./footer.php";
        ?>
    </div>
</body>
</html>