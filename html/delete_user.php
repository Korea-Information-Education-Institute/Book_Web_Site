<?php
header("Content-Type: text/html; charset=UTF-8");
    try {
		$user_id = $_POST['user_id'];
        $conn = mysqli_connect("localhost", "khsung0", "gmltjd1!" , "khsung0");
        $sql = "DELETE FROM user WHERE user_id='$user_id'";
		$result_query = mysqli_query($conn, $sql);
        if($result_query){
            $result['success']	= true;
		    $result['success_msg']	= "해당 계정을 삭제하였습니다.";
        }else{
            $result['success']	= false;
		    $result['success_msg']	= "계정삭제 오류가 생겼습니다.";
        }
	} catch(exception $e) {		
		$result['success']	= false;
		$result['msg']		= "계정삭제 오류가 생겼습니다.";
		$result['code']		= $e->getCode();

	} finally {
		echo json_encode($result, JSON_PRETTY_PRINT|JSON_UNESCAPED_UNICODE);
	}
?>