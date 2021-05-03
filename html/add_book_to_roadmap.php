<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<script type="text/javascript">
    function add_book(){
        var  url_parse=window.location.href.split('?');
        if(url_parse[1]=='book1'){
            opener.document.getElementById("square_book1").removeAttribute('href');
            opener.document.getElementById("square_book1").removeAttribute('onclick');
            opener.document.getElementById("square_book2").style.display="block";
        }else if(url_parse[1]=='book2'){
            opener.document.getElementById("square_book2").removeAttribute('href');
            opener.document.getElementById("square_book2").removeAttribute('onclick');
            opener.document.getElementById("square_book3").style.display="block";
            
        }else{
            opener.document.getElementById("square_book3").removeAttribute('href');
            opener.document.getElementById("square_book3").removeAttribute('onclick');
        }
        window.close();
        // temp.src="http://image.dongascience.com/Photo/2020/03/5bddba7b6574b95d37b6079c199d7101.jpg";
        // var temp=opener.document.getElementById("square_book2");


    }
</script>

<body>
    검색 <input type="text">
    <?php


    ?>
    <button onclick="add_book()">추가하기</button>
</body>
</html>