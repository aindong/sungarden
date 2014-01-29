<?php
	class ImageUploader
	{
		
		public static function Upload($file, $name)
		{

			$allowedExts = array("gif", "jpeg", "jpg", "png");
			$temp = explode(".", $file[$name]["name"]);
			$extension = end($temp);
			if ((($file[$name]["type"] == "image/gif")
			|| ($file[$name]["type"] == "image/jpeg")
			|| ($file[$name]["type"] == "image/jpg")
			|| ($file[$name]["type"] == "image/pjpeg")
			|| ($file[$name]["type"] == "image/x-png")
			|| ($file[$name]["type"] == "image/png"))
			&& ($file[$name]["size"] < 20000000)
			&& in_array($extension, $allowedExts))
			  {
				  if ($file[$name]["error"] > 0)
				  {
				    	return "Return Code: " . $file[$name]["error"] . "<br>";
				  }
				  else
				  {

					    $info = "Upload: " . $file[$name]["name"] . "<br>";
					    $info .= "Type: " . $file[$name]["type"] . "<br>";
					    $info .= "Size: " . ($file[$name]["size"] / 1024) . " kB<br>";
					    $info .= "Temp file: " . $file[$name]["tmp_name"] . "<br>";

					    if (file_exists("upload/" . $file[$name]["name"]))
					    {
					      	$info .= $file[$name]["name"] . " already exists. ";
					    }
					    else
					    {
						      move_uploaded_file($file[$name]["tmp_name"],
						      "upload/" . $file[$name]["name"]);
						      $info .= "Stored in: " . "upload/" . $file[$name]["name"];
					    }
					    return $info;
				  }
			  }
			else
			{
			  	return "Invalid file";
			}

		}
	}
?>