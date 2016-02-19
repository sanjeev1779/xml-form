<!-- Index page of the website, containing the form
	Software Engineering Assignment No.:02.
-->

<?php
	$file = fopen("subversions.txt","r");
	$subversion=fgets($file);
	$f= "xmlfiles/xml".$subversion.".xml";
	$xmlfile=simplexml_load_file($f);
	fclose($file);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<html>
	<head>
		<title> <?php echo $xmlfile->name."-".$subversion;;  ?> </title>
	</head>
	<body>
		<center>
		<div id="styling">
				<table>
					<tr>	
						<td>Name:</td><td> <?php echo $xmlfile->name; ?></td>
					</tr>
					<tr>	
						<td>Email Id:</td><td> <?php echo $xmlfile->email; ?></td>
					</tr>
					<tr>	
						<td>Contact:</td><td> <?php echo $xmlfile->contact; ?></td>
					</tr>
					<tr>	
						<td>Gender:</td><td> <?php echo $xmlfile->gender; ?></td>
					</tr>
					<tr>	
						<td>Date Of Birth:</td><td> <?php echo $xmlfile->dob; ?></td>
					</tr>
					<tr>	
						<td>Department:</td><td> <?php echo $xmlfile->department; ?></td>
					</tr>
					<tr>	
						<td>Subject:</td><td> <?php echo $xmlfile->subject; ?></td>
					</tr>
					<tr>	
						<td>Current Year:</td><td> <?php echo $xmlfile->current_year; ?></td>
					</tr>
					<tr>	
						<td>Address:</td><td> <?php echo $xmlfile->address; ?></td>
					</tr>
					<tr>
					<td> Image: </td><td> <img src="upload/image/<?php echo $xmlfile->upload_image?>" height="200" width="200" alt="<?php echo $xmlfile->upload_image?>"></img></td>
					</tr>
					<tr>
					<td> Resume: </td><td> <a href="upload/doc/<?php echo $xmlfile->upload_resume?>">Download Resume</a></td>
					</tr>
					
				</table>
			
			</div>
		</center>
	</body>
</html>