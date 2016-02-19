<?php
	// for uploading image
	
		$allowedExts = array("gif", "jpeg", "jpg", "png");
		$extension = end(explode(".", $_FILES["9"]["name"]));
		if ((($_FILES["9"]["type"] == "image/gif") || ($_FILES["9"]["type"] == "image/jpeg") || ($_FILES["9"]["type"] == "image/jpg") || ($_FILES["9"]["type"] == "image/pjpeg") || ($_FILES["9"]["type"] == "image/x-png") || ($_FILES["9"]["type"] == "image/png")) ) 
		 {
		  if ($_FILES["9"]["error"] > 0)
			{
			echo "Return Code: " . $_FILES["9"]["error"] . "<br>";
			}
		  else
			{
			echo "Upload: " . $_FILES["9"]["name"] . "<br>";
			echo "Type: " . $_FILES["9"]["type"] . "<br>";
			echo "Size: " . ($_FILES["9"]["size"] / 1024) . " kB<br>";
			echo "Temp file: " . $_FILES["9"]["tmp_name"] . "<br>";

			if (file_exists("upload/image" . $_FILES["9"]["name"]))
			  {
			  echo $_FILES["9"]["name"] . " already exists. ";
			  }
			else
			  {
			  move_uploaded_file($_FILES["9"]["tmp_name"],
			  "upload/image/" . $_FILES["9"]["name"]);
			  echo "Stored in: " . "upload/image" . $_FILES["9"]["name"];
			  }
			}
		  }
		else
		  {
		  echo "Invalid file";
		  }
		  // end of uploading image
	
			  // for uploading resume
			  $allowedExts = array("pdf");
			$extension = end(explode(".", $_FILES["10"]["name"]));
			if (($_FILES["10"]["type"] == "application/pdf"  ) )
			 {
			  if ($_FILES["10"]["error"] > 0)
				{
				echo "Return Code: " . $_FILES["10"]["error"] . "<br>";
				}
			  else
				{
				echo "Upload: " . $_FILES["10"]["name"] . "<br>";
				echo "Type: " . $_FILES["10"]["type"] . "<br>";
				echo "Size: " . ($_FILES["10"]["size"] / 1024) . " kB<br>";
				echo "Temp file: " . $_FILES["10"]["tmp_name"] . "<br>";

				if (file_exists("upload/doc" . $_FILES["10"]["name"]))
				  {
				  echo $_FILES["10"]["name"] . " already exists. ";
				  }
				else
				  {
				  move_uploaded_file($_FILES["10"]["tmp_name"],
				  "upload/doc/" . $_FILES["10"]["name"]);
				  echo "Stored in: " . "upload/doc" . $_FILES["10"]["name"];
				  }
				}
			  }
			else
			  {
			  echo "Invalid file";
			  }
			  // end of uploading resume file
?>
