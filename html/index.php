<!DOCTYPE html>
<html lang="ko">

<head>
    <meta charset="UTF-8">
    <?php include "./head.php"; ?>
    <title>Document</title>
    <style>
        * { margin:0px; padding:0px; }
        /* Animation Canvas */
        .animation_canvas  {
            overflow:hidden;
            position:relative;
            width:800px; height:300px;
        }

        /* Slider Panel */
        .slider_panel { width:3000px; position:relative; }
        .slider_image { float:left; width:800px; height:300px; }

        /* Slider Text Panel */
        .slider_text_panel { position:absolute; top:200px; left:50px; }
        .slider_text { position:absolute; width:250px; height:150px; }

        /* Control Panel */
        .control_panel  {
            position:absolute; top:380px;
            left:270px; height:13px;
            overflow:hidden;
        }

        .control_button {
            width:12px; height:46px;
            position:relative;

            float:left; cursor:pointer;
            background:url('point_button.png');
        }
        .control_button:hover { top:-16px; }
        .control_button.active { top:-31px; }
    </style>
    <script>
        $(document).ready(function () {
            // 슬라이더를 움직여주는 함수
            function moveSlider(index) {
                // 슬라이더를 이동합니다.
                var willMoveLeft = -(index * 800);
                $('.slider_panel').animate({ left: willMoveLeft }, 'slow');

                // control_button에 active클래스를 부여/제거합니다.
                $('.control_button[data-index=' + index + ']').addClass('active');
                $('.control_button[data-index!=' + index + ']').removeClass('active');

                // 글자를 이동합니다.
                $('.slider_text[data-index=' + index + ']').show().animate({
                    left: 0
                }, 'slow');
                $('.slider_text[data-index!=' + index + ']').hide('slow', function () {
                    $(this).css('left', -300);
                });
            }

            // 초기 텍스트 위치 지정 및 data-index 할당
            $('.slider_text').css('left', -300).each(function (index) {
                $(this).attr('data-index', index);
            });

            // 컨트롤 버튼의 클릭 핸들러 지정 및 data-index 할당
            $('.control_button').each(function (index) {
                $(this).attr('data-index', index);
            }).click(function () {
                var index = $(this).attr('data-index');
                moveSlider(index);
            });

            // 초기 슬라이더 위치 지정
            var randomNumber = Math.round(Math.random() * 5);
            moveSlider(randomNumber);
        });
    </script>
</head>
<body>
    <div class="wrap">
        <?php 
            include './header.php';
        ?>
        <div class="container">
            <div class="container_inner">
            
    <div class="animation_canvas">
        <div class="slider_panel">
            <img src="../img/Desert.jpg" class="slider_image"/>
            <img src="../img/Hydrangeas.jpg" class="slider_image"/>
            <img src="../img/Jellyfish.jpg" class="slider_image"/>
            <img src="../img/Koala.jpg" class="slider_image"/>
            <img src="../img/Lighthouse.jpg" class="slider_image"/>
        </div>
        <div class="slider_text_panel">
            <div class="slider_text">
                <h1>Lorem ipsum</h1>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
            </div>
            <div class="slider_text">
                <h1>Nulla eget</h1>
                <p>Nulla eget sapien mauris, ornare elementum elit.</p>
            </div>
            <div class="slider_text">
                <h1>Quisque eleifend</h1>
                <p>Quisque eleifend augue nec lacus lobortis porta.</p>
            </div>
            <div class="slider_text">
                <h1>Donec</h1>
                <p>Donec a ligula lectus, eu iaculis justo.</p>
            </div>
            <div class="slider_text">
                <h1>Vivamus scelerisque</h1>
                <p>Vivamus scelerisque mauris id nunc dictum sit amet.</p>
            </div>
        </div>
        <div class="control_panel">
            <div class="control_button"></div>
            <div class="control_button"></div>
            <div class="control_button"></div>
            <div class="control_button"></div>
            <div class="control_button"></div>
        </div>
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