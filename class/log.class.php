<?php
	class Log
	{
		public static function GetLogs($logType)
		{
			try
			{
				$con = new PDO(DB_DSN, DB_USER, DB_PASS);
				$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$stmt = $con->prepare("SELECT * FROM log WHERE logType = :logType");
				$stmt->bindParam(":logType", $logType);
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

		public static function AddLog($logType, $logUser, $logContent)
		{

			try
			{
				$con = new PDO(DB_DSN, DB_USER, DB_PASS);
				$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$stmt = $con->prepare("INSERT INTO log(logType, logUser, logContent) VALUES(:logType, :logUser, :logContent)");
				$stmt->bindParam(":logType", $logType);
				$stmt->bindParam(":logUser", $logUser);
				$stmt->bindParam(":logContent", $logContent);
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

		public static function DeleteLog($logID)
		{

			try
			{
				$con = new PDO(DB_DSN, DB_USER, DB_PASS);
				$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$stmt = $con->prepare("DELETE FROM log WHERE logID = :logID");
				$stmt->bindParam(":logID", $logID);
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