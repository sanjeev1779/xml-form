<?php 
	
	$file = fopen("subversions.txt","w");
	$x= $_POST["sub_versions"];
	fwrite($file,$x);
	header('Location:index.php');
	fclose($file);
?>