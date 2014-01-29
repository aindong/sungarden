<?php
	class RoomInventory
	{
		

		public static function GetRooms()
		{
			try
			{
				$con = new PDO(DB_DSN, DB_USER, DB_PASS);
				$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$stmt = $con->prepare("SELECT * FROM room_inventory");
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

		public static function GetRoom($id)
		{
			try
			{
				$con = new PDO(DB_DSN, DB_USER, DB_PASS);
				$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$stmt = $con->prepare("SELECT * FROM room_inventory WHERE roomID = :roomID");
				$stmt->bindParam(":roomID", $id);
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

		public static function UpdateStock($id, $num)
		{
			try
			{
				$con = new PDO(DB_DSN, DB_USER, DB_PASS);
				$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$stmt = $con->prepare("UPDATE room_inventory SET roomStock = roomStock + :roomStock WHERE roomID = :roomID");
				$stmt->bindParam(":roomStock", $num);
				$stmt->bindParam(":roomID", $id);
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

		public static function AddRoom($data = array())
		{
			try
			{
				$con = new PDO(DB_DSN, DB_USER, DB_PASS);
				$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$stmt = $con->prepare("INSERT INTO room_inventory(roomType, maxPerson, roomPrice, roomStock, roomImage) VALUES(:roomType, :maxPerson, :roomPrice, :roomStock, :roomImage)");
				$stmt->bindParam(":roomType", $data["roomType"]);
				$stmt->bindParam(":maxPerson", $data["maxPerson"]);
				$stmt->bindParam(":roomPrice", $data["roomPrice"]);
				$stmt->bindParam(":roomStock", $data["roomStock"]);
				$stmt->bindParam(":roomImage", $data["roomImage"]);
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

		public static function DeleteRoom($id)
		{
			try
			{
				$con = new PDO(DB_DSN, DB_USER, DB_PASS);
				$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$stmt = $con->prepare("DELETE FROM room_inventory WHERE roomID = :roomid");
				$stmt->bindParam(":roomid", $id);
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