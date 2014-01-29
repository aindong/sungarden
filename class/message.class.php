<?php
class Message
{


	public static function AddMessage($data)
	{
		try
		{
			$con = new PDO(DB_DSN, DB_USER, DB_PASS);
			$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$stmt = $con->prepare("INSERT INTO messages(messageName, messageEmail, messageContent) VALUES(:messageName, :messageEmail, :messageContent)");
			$stmt->bindParam(":messageName", $data["messageName"]);
			$stmt->bindParam(":messageEmail", $data["messageEmail"]);
			$stmt->bindParam(":messageContent", $data["messageContent"]);
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
	
	public static function GetMessages()
	{
		try
		{
			$con = new PDO(DB_DSN, DB_USER, DB_PASS);
			$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$stmt = $con->prepare("SELECT * FROM messages");
			$stmt->execute();
			$con = null;
			return $stmt->fetchAll(PDO::FETCH_ASSOC);
		}
		catch(PDOException $e)
		{
			file_put_contents("dberrors.txt", date('m/d/Y h:i:s a', time()). ": " . $e->getMessage()."\r\n", FILE_APPEND);
			return "Oops something went wrong. Please contact the System Administrator";
		}
	}


	public static function DeleteMessage($id)
	{
		try
		{
			$con = new PDO(DB_DSN, DB_USER, DB_PASS);
			$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$stmt = $con->prepare("DELETE FROM messages WHERE messageID = :messageID");
			$stmt->bindParam(":messageID", $id);
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