<?php
	class Users
	{
		

		public static function GetUsers()
		{
			try
			{
				$con = new PDO(DB_DSN, DB_USER, DB_PASS);
				$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$stmt = $con->prepare("SELECT * FROM useraccount");
				$stmt->execute();
				return $stmt->fetchAll(PDO::FETCH_ASSOC);
			}
			catch(PDOException $e)
			{
				file_put_contents("dberrors.txt", date('m/d/Y h:i:s a', time()). ": " . $e->getMessage()."\r\n", FILE_APPEND);
				return "Oops something went wrong. Please contact the System Administrator";
			}
		}

		public static function AddUser($data = array())
		{
			try
			{
				$con = new PDO(DB_DSN, DB_USER, DB_PASS);
				$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$stmt = $con->prepare("INSERT INTO useraccount(username, password, firstName, lastName, middleName, role) VALUES(:username, :password, :firstName, :lastName, :middleName, :role)");
				$stmt->bindParam(":username", $data["username"]);
				$stmt->bindParam(":password", $data["password"]);
				$stmt->bindParam(":firstName", $data["firstName"]);
				$stmt->bindParam(":lastName", $data["lastName"]);
				$stmt->bindParam(":middleName", $data["middleName"]);
				$stmt->bindParam(":role", $data["role"]);
				$stmt->execute();
				$con = null;
				return true;
			}
			catch(PDOException $e)
			{
				file_put_contents("dberrors.txt", date('m/d/Y h:i:s a', time()). ": " . $e->getMessage()."\r\n", FILE_APPEND);
				return "Oops something went wrong. Please contact the System Administrator";
			}
		}

		public static function DeleteUser($id)
		{
			try
			{
				$con = new PDO(DB_DSN, DB_USER, DB_PASS);
				$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$stmt = $con->prepare("DELETE FROM useraccount WHERE username = :username");
				$stmt->bindParam(":username", $id);
				$stmt->execute();
				$con = null;
				return true;
			}
			catch(PDOException $e)
			{
				file_put_contents("dberrors.txt", date('m/d/Y h:i:s a', time()). ": " . $e->getMessage()."\r\n", FILE_APPEND);
				return "Oops something went wrong. Please contact the System Administrator";
			}

		}
		
	}
?>