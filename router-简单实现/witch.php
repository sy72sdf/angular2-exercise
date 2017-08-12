<?php
$conn = new mysqli("localhost","root","root","phpwork");
if($conn->connect_error){
	die("链接失败");	
}
if(!empty($_GET["listid"])){
	$listid = $_GET["listid"];	
	$sql = "select * from article where a_column='$listid'";
}else{
	$sql = "select * from article";	
}

$result = $conn->query($sql);

$list = "";
if($result->num_rows){
	while($row=$result->fetch_assoc()){
		if($list!=""){
			$list.=",";
		}
		$list.='{"title":"'.$row["title"].'",';
		$list.='"date":"'.$row["time"].'",';
		$list.='"id":"'.$row["id"].'"}';
	}
}
$outlist ='{"homeList":['.$list.']}';
echo $outlist;

?>

