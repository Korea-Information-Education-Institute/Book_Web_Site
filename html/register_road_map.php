<meta charset="utf-8"/>
<?php
    if(include('./dbconnect.php')){
		$sql = "INSERT INTO roadmap ('user_id','roadmap_title','roadmap_text','book_1','book_2','book_3') VALUE('1','1','1','1','1','1') ";
    	$result = mysqli_query($conn, $sql);	



        echo "<script>window.alert('등록되었습니다.');</script>";
   		echo "<script>location.href='./road_map.php';</script>";
	}
?>