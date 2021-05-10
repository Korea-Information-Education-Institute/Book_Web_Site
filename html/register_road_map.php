<meta charset="utf-8"/>
<?php
	session_start();
    $conn = mysqli_connect("localhost", "khsung0", "gmltjd1!" , "khsung0");
	$user_id=$_SESSION['user_id'];
	$road_map_title=$_POST['road_map_title'];
	$opinion=$_POST['opinion'];
	$book1_data=str_replace("_"," ",$_POST['book1_data']);
	$book2_data=str_replace("_"," ",$_POST['book2_data']);
	$book3_data=str_replace("_"," ",$_POST['book3_data']);
	if($book2_data=='0'){
		$book2_data=null;
	}
	if($book3_data=='0'){
		$book3_data=null;
	}
	$sql = "INSERT INTO `roadmap`(`user_id`, `roadmap_title`, `roadmap_text`, `book_1`, `book_2`, `book_3`) VALUES ('$user_id','$road_map_title','$opinion','$book1_data','$book2_data','$book3_data')";
	$result = mysqli_query($conn, $sql);	
	if($result){
		echo "<script>window.alert('등록되었습니다.');</script>";
		echo "<script>location.href='./road_map.php';</script>";
	}else{
		echo "<script>window.alert('등록을 실패하였습니다.');</script>";
		echo "<script>location.href='./road_map.php';</script>";
	}

?>