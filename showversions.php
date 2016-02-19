<?php
     // main version
	$file = fopen("loadfile.txt","r");// main version
	$count=fgets($file);
	fclose($file);
	// sub versions
	$file = fopen("subversions.txt","r");
	$subversion=fgets($file);
	$f= "xmlfiles/xml".$subversion.".xml";
	$xmlfile=simplexml_load_file($f);
	fclose($file);
	
	
	
	$vfile1= fopen("vfile.txt","r");
	$total_versions=(fgets($vfile1));
	fclose($vfile1);
	$versions=array();
	for($i=1;$i<=$total_versions;$i++)
	{
		$count1 = count(glob("xmlfiles/xml$i.*.xml"));
		echo " ver ".$count1." ";
		$versions[$i]=$count1;
	}
	
	
	/*$vfile1= fopen("vfile.txt","r");
	$idx=0;
    $versions=array();
    while(!feof($vfile1))
    {
		 $temp=(fgets($vfile1));
		  $sub=  substr($temp,0,1);
	   if($idx==0) {$total_versions= $temp; echo $total_versions." show verisons "; $idx=$idx+1; continue;}
	   else if(strcmp($sub, " ")!=0)
	   {
		echo "  ".$temp;
	      $versions[$idx]=$temp;
	      $idx=$idx+1;
	   }
    }
	echo "end of showversions ";
	fclose($vfile1);			*/	
?>