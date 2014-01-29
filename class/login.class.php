<?php
	class Login
	{
		
		public static function doLogin($username, $password)
		{
			try
			{
				$con = new PDO(DB_DSN, DB_USER, DB_PASS);
				$con->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
				$stmt = $con->prepare( "SELECT * FROM useraccount WHERE username = :username AND password = :password LIMIT 1" );
				$stmt->bindParam(":username", $username);
				$stmt->bindParam(":password", $password);
				$stmt->execute();
				$con = null;
				$row = $stmt->fetchAll(PDO::FETCH_ASSOC);

				if(is_array($row) && !empty($row))
				{
					@session_start();
					$_SESSION['valid'] = true;
					$_SESSION['username'] = $row[0]['username'];
					$_SESSION['firstName'] = $row[0]['firstName'];
					$_SESSION['lastName'] = $row[0]['lastName'];
					$_SESSION['middleName'] = $row[0]['middleName'];
					$_SESSION['role'] = $row[0]['role'];
					//print_r($row);
					return "success";
				}
				else
				{
					return "Invalid username/password";
				}
			}
			catch(PDOException $e)
			{
				file_put_contents("dberrors.txt", date('m/d/Y h:i:s a', time()). ": " . $e->getMessage()."\r\n", FILE_APPEND);
				return "Oops something went wrong. Please contact the System Administrator";
			}
		}
	}
?>