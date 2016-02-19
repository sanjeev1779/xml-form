<?php
$file = fopen("welcom.txt", "r") or exit("Unable to open file!");
//Output a line of the file until the end is reached
$idx=0;
$tags=array();
  while(!feof($file))
  {
	   $tags[$idx]=fgets($file);
	   echo $tags[$idx];
	   $idx=$idx+1;
  }
  
	function prev_name()
	{
		global $tags;
		return $tags[0];
	}
	function prev_email()
	{
		global $tags;
		return $tags[1];
	}
	function prev_contact()
	{
		global $tags;
		return $tags[2];
	}
	function prev_gender()
	{
		global $tags;
		return $tags[3];
	}
	function prev_dob()
	{
		global $tags;
		return $tags[4];
	}
	function prev_dept()
	{
		global $tags;
		return $tags[5];
	}
	function prev_subject()
	{
		global $tags;
		return $tags[6];
	}
	function prev_year()
	{
		global $tags;
		return $tags[7];
	}
	function prev_address()
	{
		global $tags;
		return $tags[8];
	}
	
fclose($file);
?>