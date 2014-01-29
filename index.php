<?php
	@session_start();

	//include configuration file
	require_once('conf/config.php');

	
	$action = $_GET["action"] == "" ? null : $_GET["action"];

	//include the website header
	require_once("header.php");
	
	switch ($action) {
		case null:
			require_once("content/home.php");
			break;

		case "rooms":
			require_once("class/roominventory.class.php");
			$rooms = RoomInventory::GetRooms();
			require_once("content/rooms.php");
			break;

		case "rates":
			require_once("content/rooms.php");
			break;

		case "contacts":
			$action2 = $_GET["action2"] == "" ? null : $_GET["action2"];
			require_once("class/message.class.php");
			$data = $_POST;
			switch ($action2) {
				case 'submit':

					if(Message::AddMessage($data))
					{
						$_SESSION["notif"] = "We have received your message. Thank you so much for contacting us.";
						$_SESSION["notif_type"] = "success";
						
					}
					else
					{
						$_SESSION["notif"] = "Something went wrong with your reservation. Please contact us to report the problem";
						$_SESSION["notif_type"] = "error";
						
					}


					header("Location: index.php");
					break;
				
				default:
					require_once("content/contact.php");
					break;
			}

			break;

		case "gallery":
			require_once("content/gallery.php");
			break;

		case "sitemap":
			require_once("content/sitemap.php");
			break;

		case "reserve":
			$action2 = $_GET["action2"] == "" ? null : $_GET["action2"];
			require_once("class/roominventory.class.php");
			require_once("class/reservation.class.php");
			
			switch ($action2) {
				case 'reservesubmit':
					$data = $_POST;
					$id = $data["roomID"];
					$room = RoomInventory::GetRoom($id);
					require_once("content/confirmation.php");
					break;

				case 'confirmed':
					$data2 = $_POST;
					echo date("Y-m-d", strtotime($data2["checkIn"]));
					print_r($data2);

					//echo Reservation::AddReservation($data);
					
					if(Reservation::AddReservation($data2))
					{
						$_SESSION["notif"] = "Reservation successfully submitted. Please expect a confirmation call from us within 24hours.";
						$_SESSION["notif_type"] = "success";
						
					}
					else
					{
						$_SESSION["notif"] = "Something went wrong with your reservation. Please contact us to report the problem";
						$_SESSION["notif_type"] = "error";
						
					}


					header("Location: index.php");
					break;
				default:
					$rooms = RoomInventory::GetRooms();
					require_once("content/reserve.php");
					break;
			}
			break;

		case "about":
			require_once("content/about.php");
			break;
		
		default:
			require_once("content/home.php");
			break;
	}

	//include the website footer
	require_once("footer.php");

?>