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
  background-color:#b7e8e9;
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
/* Position the "next button" to the right */
.next {
  right: 0;
  border-radius: 3px 0 0 3px;
}
/* On hover, add a black background color with a little bit see-through */
.prev:hover, .next:hover {
  background-color: rgba(0,0,0,0.8);
}
/* Caption text */
.text {
  color: #f2f2f2;
  font-size: 15px;
  padding: 8px 12px;
  position: absolute;
  bottom: 8px;
  width: 100%;
  text-align: center;
}
/* Number text (1/3 etc) */
.numbertext {
  /* color: #f2f2f2; */
  font-size: 12px;
  padding: 8px 12px;
  position: absolute;
  top: 0;
}
/* The dots/bullets/indicators */
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
/* Fading animation */
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
/* On smaller screens, decrease text size */
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
        height:1350px;
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
        /* margin-top:20px; */
        padding:5px;
    }
    .box{
        padding-left:70px;
    }
    li{
        background-color:white;
        text-align:center;
        width: 230px;
        height: 300px;
        margin: 10px;
        float: left;
    }
    #slide_img {
        width: 100px;
        height: 200px;
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
</style>




<script>
// window.onload=showSlides(2);
    var slideIndex = 1;
    showSlides(slideIndex);
    // setInterval(function(){plusSlides(1);}), 2000);
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
        //setInterval(function(){plusSlides(1);}), 2000);
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
                    <br><h2>인기 도서 TOP 5</h2><br>






                    <div class="slideshow-container">

                        <?php
                            $book_index_array=[];
                            if(include('./dbconnect.php')){
                                $sql1 = "SELECT `book_index`,count(`book_index`) AS `num` FROM `scrap` GROUP BY `book_index` ORDER BY `num` DESC LIMIT 5";
                                $result1 = mysqli_query($conn, $sql1);
                                while($row1 = mysqli_fetch_array($result1)){
                                    array_push($book_index_array,$row1['book_index']);
                                }
                                $sql2 = "SELECT * FROM `book` WHERE `book_index` IN ($book_index_array[0],$book_index_array[1],$book_index_array[2],$book_index_array[3],$book_index_array[4])";
                                $result2 = mysqli_query($conn, $sql2);
                                $count = mysqli_num_rows($result2);  //결과 row 수
                                $temp_string="";



                                // for($i=1;$i<=$count;$i++){
                                //     if($i==1){
                                //         $temp_string="inline-block";
                                //     }else{
                                //         $temp_string="none";
                                //     }
                                //     $row2[$i]=mysqli_fetch_array($result2);
                                //     echo "<div class='mySlides fade'>
                                //     <div class='numbertext'>$i / $count</div>
                                //     <img id='slide_img' src='$row2[$i][book_img_address]' style='width:200px;display:$temp_string;'>
                                //     <div class='slide_contents'> asdasdasdasadads</div>
                                //     <div class='text'>Caption One</div>
                                //     </div>";
                                // }




                                while($row2 = mysqli_fetch_array($result2)){
                                    $i++;
                                    if($i==1){
                                        $temp_string="inline-block";
                                    }else{
                                        $temp_string="none";
                                    }
                                    echo "<div class='mySlides fade'>
                                    <div class='numbertext'>$i / $count</div>
                                    <img id='slide_img' src='$row2[book_img_address]' style='width:200px;display:$temp_string;'>
                                    <div class='slide_contents'> asdasdasdasadads</div>
                                    <div class='text'>Caption One</div>
                                    </div>";
                                }

                                    
                                



                            }
                        ?>


                        <!-- <div class="mySlides fade">
                        <div class="numbertext">1 / 5</div>
                        <img id="slide_img" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSv7VkHK7D6s7kvSco4Ir9DfjqpNNlbm-8EJzJUueI5SlDsFwJW_0kVRib0Cbw&usqp=CAc" style="width:200px;display:inline-block;">
                        <div class="slide_contents"> asdasdasdasadads</div>
                        <div class="text">Caption One</div>
                        </div>

                        <div class="mySlides fade" style="display:none;">
                        <div class="numbertext">2 / 5</div>
                        <img id="slide_img" src="http://placehold.it/300x100" style="width:100%">
                        <div class="text">Caption Two</div>
                        </div>

                        <div class="mySlides fade" style="display:none;">
                        <div class="numbertext">3 / 5</div>
                        <img id="slide_img" src="http://placehold.it/300x100" style="width:100%">
                        <div class="text">Caption Three</div>
                        </div>
                        <div class="mySlides fade" style="display:none;">
                        <div class="numbertext">4 / 5</div>
                        <img id="slide_img" src="http://placehold.it/300x100" style="width:100%">
                        <div class="text">Caption Four</div>
                        </div>
                        <div class="mySlides fade" style="display:none;">
                        <div class="numbertext">5 / 5</div>
                        <img id="slide_img" src="http://placehold.it/300x100" style="width:100%">
                        <div class="text">Caption Five</div>
                        </div> -->





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
                    <h2>최신 도서</h2>
                   <ul class="section">
                   
                   <?php
                        $urlstring="./book.php?".str_replace(" ","_",$row['book_title']);
                        if(include('./dbconnect.php')){
                            $sql = "SELECT * FROM `book` ORDER BY 'book_index' DESC LIMIT 9";
                            $result = mysqli_query($conn, $sql);
                            while($row = mysqli_fetch_array($result)){
                                echo "<li><a href=$urlstring><img id='book_img' style='width:200px;height:300px;' src=$row[book_img_address] alt='책 사진'></a></li>";
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