<?php
	class Reservation
	{
		

		public static function GetReservations()
		{
			try
			{
				$con = new PDO(DB_DSN, DB_USER, DB_PASS);
				$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$stmt = $con->prepare("SELECT a.*, b.roomType FROM reservations a INNER JOIN room_inventory b ON a.roomID = b.roomID WHERE status <> 'Checked-In' AND status <> 'Checked-Out'");
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

		public static function GetReservation($id)
		{
			try
			{
				$con = new PDO(DB_DSN, DB_USER, DB_PASS);
				$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$stmt = $con->prepare("SELECT a.*, b.roomType FROM reservations a INNER JOIN room_inventory b ON a.roomID = b.roomID WHERE reservationID = :reservationID");
				$stmt->bindParam(":reservationID", $id);
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


		public static function GetReport($dateStart, $dateEnd)
		{
			try
			{
				$con = new PDO(DB_DSN, DB_USER, DB_PASS);
				$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$stmt = $con->prepare("SELECT *, SUM(totalPrice) as sales, COUNT(reservationID) as custno FROM reservations WHERE status = 'Checked-Out' AND checkOut BETWEEN :dateStart AND :dateEnd GROUP BY checkOut");
				$stmt->bindParam(":dateStart", $dateStart);
				$stmt->bindParam(":dateEnd", $dateEnd);
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


		public static function GetCheckIn()
		{
			try
			{
				$con = new PDO(DB_DSN, DB_USER, DB_PASS);
				$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$stmt = $con->prepare("SELECT a.*, b.roomType FROM reservations a INNER JOIN room_inventory b ON a.roomID = b.roomID WHERE status = 'Checked-In'");
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

		public static function AddReservation($data = array())
		{


			try
			{
				$con = new PDO(DB_DSN, DB_USER, DB_PASS);
				$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$stmt = $con->prepare("INSERT INTO reservations(checkIn, checkOut, roomID, firstName, lastName, contactNo, address, email, totalPrice, status) VALUES(:checkIn, :checkOut, :roomID, :firstName, :lastName, :contactNo, :address, :email, :totalPrice, :status)");
				$stmt->bindParam(":checkIn", date("Y-m-d", strtotime($data["checkIn"])));
				$stmt->bindParam(":checkOut", date("Y-m-d", strtotime($data["checkOut"])));
				$stmt->bindParam(":roomID", $data["roomID"]);
				$stmt->bindParam(":firstName", $data["firstName"]);
				$stmt->bindParam(":lastName", $data["lastName"]);
				$stmt->bindParam(":contactNo", $data["contactNo"]);
				$stmt->bindParam(":address", $data["address"]);
				$stmt->bindParam(":email", $data["email"]);
				$stmt->bindParam(":totalPrice", $data["totalPrice"]);
				$stmt->bindParam(":status", $status = "Waiting for confirmation");
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


		public static function AddWalkin($data = array())
		{
			$fname = "Walk-In";

			try
			{
				$con = new PDO(DB_DSN, DB_USER, DB_PASS);
				$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$stmt = $con->prepare("INSERT INTO reservations(checkIn, checkOut, roomID, firstName, lastName, contactNo, address, email, totalPrice, status) VALUES(:checkIn, :checkOut, :roomID, :firstName, :lastName, :contactNo, :address, :email, :totalPrice, :status)");
				$stmt->bindParam(":checkIn", date("Y-m-d", strtotime($data["checkIn"])));
				$stmt->bindParam(":checkOut", date("Y-m-d", strtotime($data["checkOut"])));
				$stmt->bindParam(":roomID", $data["roomID"]);
				$stmt->bindParam(":firstName", $fname);
				$stmt->bindParam(":lastName", $fname);
				$stmt->bindParam(":contactNo", $fname);
				$stmt->bindParam(":address", $fname);
				$stmt->bindParam(":email", $fname);
				$stmt->bindParam(":totalPrice", $data["totalPrice"]);
				$stmt->bindParam(":status", $status = "Checked-In");
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


		public static function UpdateStatus($id, $status)
		{
			try
			{
				$con = new PDO(DB_DSN, DB_USER, DB_PASS);
				$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$stmt = $con->prepare("UPDATE reservations SET status = :status WHERE reservationID = :reservationID");
				$stmt->bindParam(":status", $status);
				$stmt->bindParam(":reservationID", $id);
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

		public static function DeleteReservation($id)
		{
			try
			{
				$con = new PDO(DB_DSN, DB_USER, DB_PASS);
				$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$stmt = $con->prepare("DELETE FROM reservations WHERE reservationID = :reservationID");
				$stmt->bindParam(":reservationID", $id);
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