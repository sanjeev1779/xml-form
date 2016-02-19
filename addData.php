<?php
	//assign node number to each data field
	$node_2_tag_name= array();
	
	// node number i correspond to the corresponding tag name
	$node_2_tag_name[0]= "name";
	$node_2_tag_name[1]= "email";
	$node_2_tag_name[2]= "contact";
	$node_2_tag_name[3]= "gender";
	$node_2_tag_name[4]="dob";
	$node_2_tag_name[5]="department";
	$node_2_tag_name[6]="subject";
	$node_2_tag_name[7]="current_year";
	$node_2_tag_name[8]="address";
	$node_2_tag_name[9]="upload_image";
	$node_2_tag_name[10]="upload_resume";
	
	$node_number=10; // total nodes = node_number+1;
	
	$tag_data= array(); // store tag content

	for($index=0 ; $index<=8; $index++)
	{
		if($index==6) continue;
		$tag_data[$index]=trim(($_POST[$index]));		
	}
	
	$tag_data[8] = str_replace(array("\r","\n",'\r','\n'),'', $tag_data[8]);
	
	if($tag_data[5]=="other") // for other department list
		$tag_data[5]= trim(($_POST['5_1']));
	

		$str="";
		foreach($_POST['check_list'] as $check)
		{
			$str.="$check,and";
		}
		$str .="";
		$length=strlen($str); 
		$str= substr($str,0,$length-4);
		$tag_data[6]=$str;
	
	/* uploading image*/
	$save= $_POST["save"];
	include('upload_file.php');
	$tag_data[9]= $_FILES["9"]["name"];
	$tag_data[10]= $_FILES["10"]["name"];
	include('write.php');	
	/*$count = count(glob("xmlfiles/*.xml"));
    $count++;
    $f= "xmlfiles/xml".$count.".xml";
	
	
	Fetching Data from the form.

	Field            Node Number

	name                0
	email               1
	contact             2
	gender              3
	dob                 4
	department          5
	Other Dept          5_1
	current_year        6
	address             8
	upload image        9
	upload resume       10
*/
	
?>