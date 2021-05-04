<?php
	header("Content-Type: text/html; charset=UTF-8");
    try {
		$user_id = $_POST['user_id'];
        $book_index = $_POST['book_index'];
        $scrap_type = $_POST['scrap_type'];
        if($user_id==''){
            $result['success']	= false;
            $result['msg']	= "로그인 사용자만 가능합니다.";
        }else{
            if($scrap_type=="insert"){
                $result['success']	= true;
                $sql = "INSERT INTO scrap VALUES('$user_id','$book_index') ";
            }else{
                $sql = "DELETE FROM scrap WHERE user_id='$user_id' AND book_index='$book_index' ";
            }
            $conn = mysqli_connect("localhost", "khsung0", "gmltjd1!" , "khsung0");
            $result1 = mysqli_query($conn, $sql);

        }
	} catch(exception $e) {		
		$result['success']	= false;
		$result['msg']		= $e->getMessage();
		$result['code']		= $e->getCode();
	} finally {
		echo json_encode($result, JSON_PRETTY_PRINT|JSON_UNESCAPED_UNICODE);
	}
?>