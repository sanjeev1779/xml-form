<?php 
	$file = fopen("loadfile.txt","w");
	$x= $_POST["version_display"];
	fwrite($file,$x);
	$file1 = fopen("subversions.txt","w");
	fwrite($file1,"0");
	fclose($file1);
	header('Location:index.php');
	fclose($file);
?>