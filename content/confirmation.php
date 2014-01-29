<div id="content-rooms">
<?php 
		
		$cin = strtotime($data["checkIn"]);
		$cout = strtotime($data["checkOut"]);

		if($cin < time())
		{
?>
		<p>Sorry but the check-in date must be greater than the current date</p>
		<p>Edit your reservation <a href="?action=reserve">Go back</a></p>
		<div style="height: 150px;"></div>
<?php
			exit();
		}

		if($cout < $cin)
		{
?>
		<p>Sorry but the check-out date must be greater than the check-in date</p>
		<p>Edit your reservation <a href="?action=reserve">Go back</a></p>
		<div style="height: 150px;"></div>
<?php
			exit();
		}



		$total = abs( floor($cin - $cout)/(60*60*24) );

?>



	<h1 style="font-size: 40px;">Confirmation</h1><br><br>
	<p>Hello <?php echo $data["firstName"]. " ". $data["lastName"]; ?>:</p><br/>
	<p>please confirm your reservation</p>
	<br/>
	<hr>
	<br/>
	<h2 style="font-size: 35px;">Reservation Information</h2><br/>
	<p><span style="font-weight:bold; width:100%; float:left;">Check-In date: </span><?php echo $data["checkIn"]; ?></p><br/>
	<p><span style="font-weight:bold; width:100%; float:left;">Check-Out data: </span><?php echo $data["checkOut"]; ?></p><br/>
	<p><span style="font-weight:bold; width:100%; float:left;">Total Night/s: </span><?php echo $total;?></p><br/><br/>

	<h2 style="font-size: 35px;">Room Information</h2><br/>
	<p><span style="font-weight:bold; width:100%; float:left;">Room Type: </span><?php echo $room[0]["roomType"] ?></p><br/>
	<p><span style="font-weight:bold; width:100%; float:left;"></span><img src="upload/<?php echo $room[0]['roomImage'] ?>"></p><br/>
	<p><span style="font-weight:bold; width:100%; float:left;">Room Price per night: </span><?php echo $room[0]["roomPrice"]?></p><br/>
	<p><span style="font-weight:bold; width:100%; float:left;">Room availability: </span><?php $check = $room[0]["roomStock"] > 0 ? "Available" : "Not Available"; echo $check; ?></p><br/>
	<p style="font-size: 20px; font-weight: bold;">Amount to pay: <?php echo $total * $room[0]["roomPrice"]?></p>
	<br/>

	<form action="?action=reserve&action2=confirmed" method="post">
		<input type="hidden" name="checkIn" value="<?php echo $data["checkIn"]?>">
		<input type="hidden" name="checkOut" value="<?php echo $data["checkOut"]?>">
		<input type="hidden" name="roomID" value="<?php echo $data["roomID"]?>">
		<input type="hidden" name="firstName" value="<?php echo $data["firstName"]?>">
		<input type="hidden" name="lastName" value="<?php echo $data["lastName"]?>">
		<input type="hidden" name="contactNo" value="<?php echo $data["contactNo"]?>">
		<input type="hidden" name="address" value="<?php echo $data["address"]?>">
		<input type="hidden" name="email" value="<?php echo $data["email"]?>">
		<input type="hidden" name="totalPrice" value="<?php echo $total * $room[0]["roomPrice"]?>">
		<input type="submit" value="Confirm Reservation" name="submit" class="btn" />
	</form>

	<div style="height: 150px;"></div>
</div>