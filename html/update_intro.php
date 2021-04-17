<?php
    try {
		$intro = $_POST['intro'];
        $title = $_POST['title'];
		if(!$intro||!$title) {
			throw new exception('오류');
		}else{
            $result['success']	= true;
            $result['success_msg']	= "소개글을 업데이트 하였습니다.";
        }
	} catch(exception $e) {		
		$result['success']	= false;
		$result['msg']		= $e->getMessage();
		$result['code']		= $e->getCode();

	} finally {
		echo json_encode($result, JSON_PRETTY_PRINT|JSON_UNESCAPED_UNICODE);

	}
?>