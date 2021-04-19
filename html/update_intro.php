<?php
header("Content-Type: text/html; charset=UTF-8");
    try {
		$intro = $_POST['intro'];
        $title = $_POST['title'];

		if(!$intro||!$title) {
			throw new exception('오류');
		}else{
			$conn = mysqli_connect("localhost", "khsung0", "gmltjd1!" , "khsung0");
			$sql = "SELECT * FROM book where book_title='$title'";
			$result1 = mysqli_query($conn, $sql);
			$row = mysqli_fetch_array($result1);	
			if($row['book_introduce']==$intro){
				$result['success']	= false;
            	$result['msg']	= "변경사항이 없습니다.";
			}else{
				$sql1 = "UPDATE book SET book_introduce='$intro' WHERE book_title='$title'";
				$result2 = mysqli_query($conn, $sql1);
				if($result2){
				$result['success']	= true;
				$result['success_msg']	= "소개글을 업데이트 하였습니다.";
				}
			}
        }
	} catch(exception $e) {		
		$result['success']	= false;
		$result['msg']		= $e->getMessage();
		$result['code']		= $e->getCode();

	} finally {
		echo json_encode($result, JSON_PRETTY_PRINT|JSON_UNESCAPED_UNICODE);
	}
?>