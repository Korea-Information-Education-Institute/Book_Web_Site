<!DOCTYPE html>
<html lang="ko">

<head>
    <meta charset="UTF-8">
    <?php include "./head.php"; ?>
    <title>Document</title>
</head>

<style>
    .slideshow-container {
    max-width: 1000px;
    position: relative;
    margin: auto;
    background-color:#D3F0F4;
    height:265px;
    }
    /* Next & previous buttons */
    .prev, .next {
    cursor: pointer;
    position: absolute;
    top: 50%;
    width: auto;
    padding: 16px;
    margin-top: -22px;
    color: white;
    font-weight: bold;
    font-size: 18px;
    transition: 0.6s ease;
    border-radius: 0 3px 3px 0;
    }
    .next {
    right: 0;
    border-radius: 3px 0 0 3px;
    }
    .prev:hover, .next:hover {
    background-color: #387573;
    }
    .numbertext {
    font-size: 13px;
    padding: 8px 12px;
    position: absolute;
    top: 0;
    }
    .dot {
    cursor: pointer;
    height: 15px;
    width: 15px;
    margin: 0 2px;
    background-color: #bbb;
    border-radius: 50%;
    display: inline-block;
    transition: background-color 0.6s ease;
    }
    .active, .dot:hover {
    background-color: #717171;
    }
    .fade {
    -webkit-animation-name: fade;
    -webkit-animation-duration: 1.5s;
    animation-name: fade;
    animation-duration: 1.5s;
    }
    @-webkit-keyframes fade {
    from {opacity: .4} 
    to {opacity: 1}
    }
    @keyframes fade {
    from {opacity: .4} 
    to {opacity: 1}
    }
    @media only screen and (max-width: 300px) {
    .prev, .next,.text {font-size: 11px}
    }
    .slide_contents{
        position:absolute;
    }
    p{
        margin:0;
    }
    .container{
        height:1450px;
    }
    .container_inner{
        height:880px;
    }
    .navbar{
        text-align:right;
        width: 560px;
        height: 50px;
        padding:0;
        margin:0;
    }
    .slide{
        height:300px;
        margin-bottom:30px;
        padding:5px;
    }
    .box{
        padding-left:70px;
    }
    #book_list{
        background-color:white;
        text-align:center;
        width: 230px;
        height: 300px;
        margin: 10px;
        float: left;
    }
    #slide_img {
        width: 200px;
        height: 265px;
        margin-left:200px;
    }
    .slide_contents{
        position:absolute;
        top:30px;
        left:450px;
    }
    h2{
        margin:5px;
    }
    #book_img{
        transition: all 0.3s ease-out;
    }
    #book_img:hover{
        transform: scale(1.1, 1.1);
    }
    li{
        list-style:none;
        line-height: 2em;
    }
    .book_list_title{
        font-size:24px;
    }
    .book_list_writer{
        font-size:19px;
    }
    .book_list_genre{
        font-size:19px;
    }
    .book_list_publication_date{
        font-size:15px;
    }
    .book_list_price{
        font-size:15px;
    }
</style>

<script>
    var slideIndex = 1;
    showSlides(slideIndex);
    function plusSlides(n) {
    showSlides(slideIndex += n);
    }
    function currentSlide(n) {
    showSlides(slideIndex = n);
    }

    function showSlides(n) {
        var i;
        var slides = document.getElementsByClassName("mySlides");
        var dots = document.getElementsByClassName("dot");
        if (n > slides.length) {slideIndex = 1}    
        if (n < 1) {slideIndex = slides.length}
        for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";  
        }
        for (i = 0; i < dots.length; i++) {
            dots[i].className = dots[i].className.replace(" active", "");
        }
        slides[slideIndex-1].style.display = "block";  
        dots[slideIndex-1].className += " active";
    }
</script>
<body>
    <div class="wrap">
        <?php 
            include './header.php';
        ?>
        <div class="container">
            <div class="container_inner">
                <div class="slide">
                    <br><h2>?????? ?????? TOP 5</h2><br>
                    <div class="slideshow-container">
                        <?php
                            $book_index_array=[];
                            if(include('./dbconnect.php')){
                                $sql1 = "SELECT `book_index`,count(`book_index`) AS `num` FROM `scrap` GROUP BY `book_index` ORDER BY `num` DESC LIMIT 5";
                                $result1 = mysqli_query($conn, $sql1);
                                while($row1 = mysqli_fetch_array($result1)){
                                    array_push($book_index_array,$row1['book_index']);
                                }
                                for($i=0;$i<5;$i++){
                                    $sql2 = "SELECT * FROM `book` WHERE `book_index`=$book_index_array[$i]";
                                    $result2 = mysqli_query($conn, $sql2);
                                    while($row2 = mysqli_fetch_array($result2)){
                                        if($i==0){
                                            $temp_string="";
                                        }else{
                                            $temp_string="style='display:none;'";
                                        }
                                        $i++;
                                        $urlstring="./book.php?".str_replace(" ","_",$row2['book_title']);
                                        echo "<div class='mySlides fade'$temp_string>
                                        <div class='numbertext'>$i / 5</div>
                                        <a href=$urlstring>
                                        <img id='slide_img' src='$row2[book_img_address]'>
                                        <div class='slide_contents'> <br>
                                        <li><span class='book_list_title'> <b>$row2[book_title]</span></b></li><br>
                                        <li><span class='book_list_writer'>$row2[book_writer]</span></li>
                                        <li><span class='book_list_genre'>$row2[book_genre]</span></li>
                                        <li><span class='book_list_publication_date'>$row2[book_publication_date] (??????)</span></li>
                                        <li><span class='book_list_price'>$row2[book_price]???</span></li>
                                        </div></a>
                                        </div>";
                                        $i--;
                                    }
                                }
                            }
                        ?>
                        <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                        <a class="next" onclick="plusSlides(1)">&#10095;</a>

                    </div>
                    <br>

                    <div style="text-align:center">
                        <span class="dot active" onclick="currentSlide(1)"></span> 
                        <span class="dot" onclick="currentSlide(2)"></span> 
                        <span class="dot" onclick="currentSlide(3)"></span> 
                        <span class="dot" onclick="currentSlide(4)"></span> 
                        <span class="dot" onclick="currentSlide(5)"></span> 
                    </div>

                </div>
                <div class="box">
                <br><br><br>
                    <h2>?????? ??????</h2>
                   <ul class="section">
                   
                   <?php
                        if(include('./dbconnect.php')){
                            $sql = "SELECT * FROM `book` ORDER BY 'book_index' DESC LIMIT 9";
                            $result = mysqli_query($conn, $sql);
                            while($row = mysqli_fetch_array($result)){
                                $urlstring="./book.php?".str_replace(" ","_",$row['book_title']);
                                echo "<li id='book_list'><a href=$urlstring><img id='book_img' style='width:200px;height:300px;' src=$row[book_img_address] alt='??? ??????'></a></li>";
                            }
                        }
                   ?>
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