<!-- Index page of the website, containing the form
	Software Engineering Assignment No.:02.
-->

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<html>
	<head>
		<title> Student Details Parser</title>
	</head>

	<body bgcolor="#000016">
		<div id="AddDetail" style="color:white">
		<center>
			<h1><u>Student Details</u></h1>
				
						<table>
							<tr> <td>
						<form method="post" action="loadversion.php"> <!-- It will load all the versions of the current selected version-->
						<!-- for displaying main versions -->
							<select name="version_display">
								<?php
								   //$total_versions = count(glob("xmlfiles/*.xml");
								   include('showversions.php'); 
								   ?>
								   <option value="0"  <?php if($count==0) echo "selected";?>> New Version</option>
									<?php for($index=1;$index<=$total_versions; $index++)
									{
									    ?>
										<option value= "<?php echo $index ?>"  <?php if($count==$index) echo "selected";?> > Version <?php echo $index?> </option>
									<?php
									}								
								?>	
						  </select>
						<!-- For showing sub versions of the above selected version-->
						<input type="submit" name="submit" value="Sub Versions">  <!-- Start from here -->
						</form></td>
						<td>
						<form action="previous.php" method="post">
							<select name="sub_versions">
								   <option value="0"  <?php if($count==0) echo "selected";?>> New Version</option>
									<?php for($index=1;$index<=$versions[$count]; $index++)
									{
									   $version_name= $count.".".$index;
									    ?>
										<option value= "<?php echo $version_name ?>"  <?php  if($subversion==$version_name)echo "selected";?> > Version <?php echo trim($version_name);?> </option>
									<?php
									}								
								?>	
						</select> 
						<input type="submit" name="submit" value="Load this Version">   <!-- Start from here -->
						</form></td>
						<td><a style="color:white" href="<?php echo "xmlfiles/xml".$subversion.".xml"; ?>"   target="_blank" >Show XML</a> <a style="color:white" href="showform.php" target="_blank" >Show form</a></td>
						</tr>
						
						
						
						<!-- End of version control-->	

						<!-- New Form -->	
					
					<tr><td><center>Current Version:<b><?php echo $subversion;?></b></center></td></tr>
					
						<form method="post" action="addData.php" enctype="multipart/form-data">
							<tr> <td> Name:</td> <td><input type="text" size="" name="0" value="<?php echo $xmlfile->name?>"> </input></td> </tr>
							<tr> <td> Email Address:</td><td> <input type="email" size="" name ="1" value="<?php   echo $xmlfile->email?>"></input> </td></tr>
							<tr> <td> Contact Number:</td><td><input type="text" size="13" name ="2" value="<?php  echo $xmlfile->contact?>"></input> </td> </tr>
							<tr> <td> Gender: </td><td> <input type="radio" name="3" value="male" <?php if($xmlfile->gender== "male") echo "checked";?>> Male </input>    <input type="radio" name="3" value="female" <?php if($xmlfile->gender== "female") echo "checked";?>>Female</input></td></tr>
							<tr> <td> Date of Birth:</td><td> <input type="text" size="11" name ="4" value="<?php echo $xmlfile->dob; ?>"> </input></td></tr>
							<tr> <td>Department: </td><td>
										<select name="5">
												<option value="cse" <?php if($xmlfile->department=="cse") echo "selected";?> > Computer Science and Engg.</option>
												<option value="ee" <?php if($xmlfile->department=="ee") echo "selected";?> >Electrical Engg.</option>
												<option value="me" <?php if($xmlfile->department=="me") echo "selected";?> >Mechanical Engg.</option>
												<option value="ss" <?php if($xmlfile->department=="ss") echo "selected";?> >System Science</option>
												<option value="biss" <?php if($xmlfile->department=="biss") echo "selected";?> >Biological Inspired SS</option>
												<option value="other" <?php if($xmlfile->department=="other") echo "selected";?>>Other</option>
										</select> </td> 
										<td> <input type="hidden" size="" name="5_1" value="If other"> </td></tr>
							<tr> <td>Favourite Subject </td> <td> <input type="checkbox" name="check_list[]" value="Physics" <?php $sub= $xmlfile->subject; for($i=0;$i<strlen($sub);$i++){  $substr= substr($sub,$i,1);if(strcmp($substr, "P")==0)  echo "checked";} ?> >Physics 
															 <input type="checkbox" name="check_list[]" value="Chemistry"  <?php $sub= $xmlfile->subject; for($i=0;$i<strlen($sub);$i++){ $substr= substr($sub,$i,1);if(strcmp($substr, "C")==0)  echo "checked";}?> >Chemistry
															 <input type="checkbox" name="check_list[]" value="Mathematics"  <?php $sub= $xmlfile->subject; for($i=0;$i<strlen($sub);$i++){$substr= substr($sub,$i,1);if(strcmp($substr, "M")==0)  echo "checked"; }?> >Mathematics</td>
							</tr>
							<tr> <td>Current Year:</td><td>
									 <select name="7">
											<option value="first" <?php if($xmlfile->current_year=="first") echo "selected";?>>First Year</option>
											<option value="second" <?php if($xmlfile->current_year=="second") echo "selected";?> >Second Year</option>
											<option value="third" <?php if($xmlfile->current_year=="third") echo "selected";?>>Third Year</option>
											<option value="fourth" <?php if($xmlfile->current_year=="fourth") echo "selected";?>>Fourth Year</option>
									</select>
								</td></tr>

							<tr> <td>Address: </td><td><textarea rows="5" name="8" ><?php  echo $xmlfile->address;?></textarea> </td></tr>
							<tr><td>Upload Image</td><td>  <input type="file" name="9" id="9"></input></td><td><?php echo $xmlfile->upload_image;?> </td></tr>
							<tr><td>Upload Resume</td><td>  <input type="file" name="10" id="10"></td><td><?php echo $xmlfile->upload_resume;?></input> </td></tr>
							<tr><td> Saving Option:</td><td>Save in New:<input type="radio" name="save" value="savenew"></td><td>Save in Previous:<input type="radio" name="save" value="editprev"></td></tr>
							<tr> <td></td><td><input type="submit" value="SUBMIT"></input></td></tr>
						</form>
						<!-- main form end-->
			</table>
		  </div> <!--Add Detail ID end-->
		</center>
	</body>
</html>
