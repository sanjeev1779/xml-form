<?php
  //subversioning 
  include('showversions.php');
  echo $total_versions."total versions<br\>";
  echo $subversion."sub versions<br\>";
  echo $count."last version selected<br\>";
  if($count==0)// for opening a new version
  {
	$total_versions=$total_versions+1;
	$selected=trim($total_versions.".1");
	$versions[$total_versions]=1;
	$file = fopen("loadfile.txt","w");
	fwrite($file,$total_versions);
	fclose($file);
  }
 
  else if($count>0 && $subversion==0)//for creating a new file in the current version
  {
	 $versions[$count]=$versions[$count]+1;
	 $selected= trim($count.".".$versions[$count]);
	 echo $selected."selected versions\n";
  }
  
  // after editing saving as new file option
  else if($save=="savenew")
  {
	 $versions[$count]=$versions[$count]+1;
	 $selected= trim($count.".".$versions[$count]);
		
		// for saving the file uploading, if user don't edit it
	    $file = fopen("subversions.txt","r");
		$subversion=fgets($file);
		$f= "xmlfiles/xml".$subversion.".xml";
		$xmlfile=simplexml_load_file($f);
		if($tag_data[9]=="")
		{
			$tag_data[9]= $xmlfile->upload_image;
		}
		if($tag_data[10]=="")
		{
			$tag_data[10]= $xmlfile->upload_resume;
		}
		fclose($file);
  }
  //if he edits the previous one, then
  else if($count>0 && $subversion>0)
  {
		$selected=trim($subversion);
		
		$file = fopen("subversions.txt","r");
		$subversion=fgets($file);
		$f= "xmlfiles/xml".$subversion.".xml";
		$xmlfile=simplexml_load_file($f);
		if($tag_data[9]=="")
		{
			$tag_data[9]= $xmlfile->upload_image;
		}
		if($tag_data[10]=="")
		{
			$tag_data[10]= $xmlfile->upload_resume;
		}
		fclose($file);
  }
  //end 


  // writing into xml file starts here
  
  $f= "xmlfiles/xml".$selected.".xml";
	$file = fopen($f,"w");
	fwrite($file,"");
	fwrite($file,"<form>");
	for($index=0;$index<=10;$index++)
	{
		// $node_2_tag_name[$index];
		 fwrite($file,"<");
		 fwrite($file,$node_2_tag_name[$index]);
		 fwrite($file,">");
		 fwrite($file,$tag_data[$index]);
		 fwrite($file,"</");
		 fwrite($file,$node_2_tag_name[$index]);
		 fwrite($file,">");
	}
	fwrite($file,"</form>");
	fclose($file);
	
	
	//update the vfile list
	echo "\nTotal versions after = ".$total_versions."\n";
	$file= fopen("vfile.txt","w");
	fwrite($file,$total_versions);
	fclose($file);
	$file= fopen("subversions.txt","w");
	fwrite($file,$selected);
	fclose($file);
	header('Location:index.php');
?>