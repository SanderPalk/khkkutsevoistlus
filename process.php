<?php
session_start();
include_once 'database1.php';
if(isset($_POST['save']))
{	 
	 $ID = $_SESSION["id"];
	 $date = $_POST['date'];
	 $type = $_POST['type'];
	 $category = $_POST['category'];
	 $time = $_POST['time'];
	 $notes = $_POST['notes'];
	 $tags = $_POST['tags'];
	 $sql = "INSERT INTO KONTO_SISU(konto_id, Kuupaev,Tyyp, Kategooria, Aeg ,Marge, Silt)
	 VALUES ($ID,'$date','$type','$category',$time, '$notes', '$tags')";
	 if (mysqli_query($conn, $sql)) {
		header("location: sisu.php");
	 } else {
		echo "Error: " . $sql . "
" . mysqli_error($conn);
	 }
	 mysqli_close($conn);
}
?>


