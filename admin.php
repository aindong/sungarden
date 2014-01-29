<?php

	//include configuration file
	require_once('conf/config.php');
	require_once("class/imageuploader.class.php");

	@session_start();
	if( !isset($_SESSION['valid']) )
	{
		$_SESSION['notif'] = "You have to login to continue";
		header("Location: login.php");
		exit();
	}

	
	$action = $_GET["action"] == "" ? null : $_GET["action"];

	//include the website header
	require_once("adm/theme/header.php");
	require_once("class/log.class.php");
	
	switch ($action) {
		case null:
			require_once("adm/content/dashboard.php");
			break;

		case "roominventory":
			$action2 = $_GET["action2"] == "" ? null : $_GET["action2"];
			require_once("class/roominventory.class.php");
			switch ($action2) {
				case 'addroom':
					$data = $_POST;
					$data['roomImage'] = $_FILES["roomImage"]["name"] == "" ? "no-image.jpg" : $_FILES["roomImage"]["name"];

					if(RoomInventory::AddRoom($data))
					{
						$upload = ImageUploader::upload($_FILES, "roomImage");
						echo "Record added<br/>";
						echo $upload;
						Log::AddLog($_SESSION['role'], $_SESSION['username'], $log = "Added Room");
						header("Location: admin.php?action=roominventory");
					}
					break;

				case 'deleteroom':
					$id = $_GET['id'];
					RoomInventory::DeleteRoom($id);
					Log::AddLog($_SESSION['role'], $_SESSION['username'], $log = "Deleted Room".$id);
					header("Location: admin.php?action=roominventory");
					break;
				
				default:
					$rooms = RoomInventory::GetRooms();
					require_once('adm/content/roominventory.php');
					break;
			}

			break;

		case "users":
			$action2 = $_GET["action2"] == "" ? null : $_GET["action2"];
			require_once("class/users.class.php");

			switch ($action2) {
				case 'adduser':
					$data = $_POST;
					if(Users::AddUser($data))
					{
						echo "New record added successfully";
						Log::AddLog($_SESSION['role'], $_SESSION['username'], $log = "Added new user");
						header("Location: admin.php?action=users");
					}
					else
					{
						echo "Failed to add records";
					}
					break;
				
				default:
					$users = Users::GetUsers();
					require_once('adm/content/users.php');
					break;
			}
			break;

		case "viewr":
			$action2 = $_GET["action2"] == "" ? null : $_GET["action2"];
			require_once("class/reservation.class.php");
			require_once("class/roominventory.class.php");
			$id = $_GET["id"];

			switch ($action2) {

				case 'confirm':
					if(Reservation::UpdateStatus($id, "Confirmed"))
					{
						$reservation = Reservation::GetReservation($id);
						if(RoomInventory::UpdateStock($reservation[0]["roomID"], -1))
						{
							$_SESSION['notif'] = "Successfully updated the status of reservation id : ".$id;
							$_SESSION['notif_type'] = "success";
							Log::AddLog($_SESSION['role'], $_SESSION['username'], $log = "Confirmed reservation with id: ".$id);
						}
					}

					header("Location: ?action=viewr");
					break;
				
				case 'checkin':
					if(Reservation::UpdateStatus($id, "Checked-In"))
					{
						$_SESSION['notif'] = "Successfully updated the status of reservation id : ".$id;
						$_SESSION['notif_type'] = "success";
						Log::AddLog($_SESSION['role'], $_SESSION['username'], $log = "Checked-In the reservation id ".$id);						
					}
					header("Location: ?action=viewr");
					break;

				case 'checkout':
					if(Reservation::UpdateStatus($id, "Checked-Out"))
					{
						$reservation = Reservation::GetReservation($id);
						if(RoomInventory::UpdateStock($reservation[0]["roomID"], 1))
						{
							$_SESSION['notif'] = "Successfully updated the status of reservation id : ".$id;
							$_SESSION['notif_type'] = "success";
							Log::AddLog($_SESSION['role'], $_SESSION['username'], $log = "Checked-Out Successfully the reservation id ".$id);
						}
					}
					header("Location: ?action=viewc");
					break;

				case 'cancel':
					if(Reservation::DeleteReservation($id))
					{
						$reservation = Reservation::GetReservation($id);
						if(RoomInventory::UpdateStock($reservation[0]["roomID"], 1))
						{
							$_SESSION['notif'] = "Successfully deleted reservation with id: ".$id;
							$_SESSION['notif_type'] = "success";
							Log::AddLog($_SESSION['role'], $_SESSION['username'], $log = "Reservation cancelled with reservation id ".$id);
						}
					}
					header("Location: ?action=viewr");
					break;

				default:
					$reservations = Reservation::GetReservations();
					require_once("adm/content/reservations.php");
					break;
			}

			
			break;

		case "viewc":
			require_once("class/reservation.class.php");

			$reservations = Reservation::GetCheckIn();
			require_once("adm/content/checkin.php");
			break;

		case "walkin":
			$action2 = $_GET["action2"] == "" ? null : $_GET["action2"];
			require_once("class/roominventory.class.php");
			require_once("class/reservation.class.php");

			switch ($action2) {
				case 'walkinsubmit':
					
					$data = $_POST;

					$cin = strtotime($data["checkIn"]);
					$cout = strtotime($data["checkOut"]);
					if($cin > $cout)
					{
						$_SESSION["notif"] = "Invalid check-out and check-in date for walk in";
						$_SESSION["notif_type"] = "error";

						header("Location: admin.php?action=walkin");
						exit();
					}



					$total = abs( floor($cin - $cout)/(60*60*24) );

					$room = RoomInventory::GetRoom($data["roomID"]);
					$price = $room[0]["roomPrice"] * $total;

					$data["totalPrice"] = $price;


					if(Reservation::AddWalkin($data))
					{
						if(RoomInventory::UpdateStock($data["roomID"], -1))
						{
							$_SESSION["notif"] = "A walk-in customer was added successfully.";
							$_SESSION["notif_type"] = "success";
							Log::AddLog($_SESSION['role'], $_SESSION['username'], $log = "Registered new walkin");
						}
						
					}

					header("Location: admin.php?action=viewc");
					break;
				
				default:
					$rooms = RoomInventory::GetRooms();
					require_once("adm/content/walkin.php");
					break;
			}

			
			break;

		case "message":
			$action2 = $_GET["action2"] == "" ? null : $_GET["action2"];
			require_once("class/message.class.php");

			switch ($action2) {
				case 'delete':
					$id = $_GET["id"];
					if(Message::DeleteMessage($id))
					{
						$_SESSION["notif"] = "Successfully deleted the message with ID of: ".$id;
						$_SESSION["notif_type"] = "success";
						Log::AddLog($_SESSION['role'], $_SESSION['username'], $log = "Message deleted");
					}
					header("Location: admin.php?action=message");
					break;
				
				default:
					$messages = Message::GetMessages();
					require_once("adm/content/messages.php");
					break;
			}
			
			break;
		case "logout":
			session_destroy();
			Log::AddLog($_SESSION['role'], $_SESSION['username'], $log = "Logged-Out Successfully");
			header("Location: index.php");
			break;


		case "audit":
			require_once("class/log.class.php");
			

			$action2 = $_GET["action2"] == "" ? null : $_GET["action2"];
			$id = $_GET["id"];

			switch ($action2) {
				case 'delete':
					Log::DeleteLog($id);
					header("Location: admin.php");
					break;
				
				default:
					$logs = Log::GetLogs($action2);
					require_once("adm/content/audit.php");
					break;
			}

			
			break;


		case "report":
			$action2 = $_GET["action2"] == "" ? null : $_GET["action2"];
			require_once("class/reservation.class.php");
			$date = $_GET["date"];

			$date = explode("/", $date);

			switch ($action2) {
				case 'custom':
					$startDate = $_POST['year']."-".$_POST['month']."-".$_POST['day'];
					$endDate = $_POST['year2']."-".$_POST['month2']."-".$_POST['day2'];
					$startDate = date("Y-m-d", strtotime($startDate));
					$endDate = date("Y-m-d", strtotime($endDate));
					break;
				
				default:
					$startDate = date("Y-m-d");
					$endDate = date("Y-m-d");
					break;
			}
			//echo $startDate. " @ ".$endDate;

			$reports = Reservation::GetReport($startDate, $endDate);
			require_once("adm/content/report.php");

			//print_r($reports);
			break;

		default:
			require_once("adm/content/dashboard.php");
			break;
	}

	//include the website footer
	require_once("adm/theme/footer.php");

?>