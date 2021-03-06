<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <?php include "./head.php"; ?>
    <title>Document</title>
    <style>
    p{
        margin:0;
    }
    .container{
        height:750px;
    }
    .container_inner{
        text-align:center;
        padding-top:183px;
        height:700px;
    }

    #user_id,#user_pw{
        width:250px;
        height:30px;
        font-size:18px;
        border:1px solid rgba(199, 199, 199, 0.856);
        border-radius:5px;
        padding:0px 0px 0px 5px;
        position:relative;
        margin-right:10px;
    }
    
    #login_btn, #register_btn{
        cursor:pointer;
        display: inline-block;
        border-radius:10px;
        border:1px solid #51909E;
        /* background-color:#51909E; */
        /* background-image: linear-gradient( 135deg, #FEB692 10%, #EA5455 100%); */
        color:white;
        transition-duration:0.6s;
    }
    #login_btn{
        width:80px;
        height:80px;
        position:absolute;
        top:277px;
        left:670px;
        font-size:18px;
        background-color:white;
        color:#51909E;
    }
    #register_btn{
        margin-top:20px;
        width:120px;
        height:30px;
        background-color:#51909E;
        color:white;
    }
    #login_btn:hover{
        background-color:#51909E;
        color:white;
    }
    #register_btn:hover{
        background-color:white;
        color:#51909E;
    }
    </style>
</head>

<script language="javascript">
    function input_check(){
        var login_form=document.login;
        if (login_form.user_id.value==""){
            alert("아이디를 입력하세요.");
            return false;
        }else if(login_form.user_pw.value==""){
            alert("비밀번호를 입력하세요.");
            return false;
        }else{
            return true;
        }
    }
</script>

<body>
    <div class="wrap">
        <?php 
            include "./header.php";
        ?>
        <div class="container">
            <div class="container_inner">
                <p style='font-size:30px; font-weight:550;'>&nbsp;&nbsp;Member Login</p><br><br><br>
                <form method="POST" name="login" action="./login_check.php" onsubmit="return input_check()">
                
                <ul>
                    <li><input type="text" name="user_id" id="user_id" placeholder='ID'></li><br>
                    <li><input type="password"  name="user_pw" id="user_pw" placeholder='Password'></li>
                </ul>    
                
                <ul>
                    <li><input type="submit" id="login_btn" value="Login"></li>
                </ul>
                <ul>
                    <li><button type="button" id="register_btn" onClick="location.href='http://khsung0.dothome.co.kr/html/register.php'">Register</button></li>
                </ul>        
                </form>
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