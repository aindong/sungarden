<div id="content-rooms">
	<form action="?action=reserve&action2=reservesubmit" method="post">
		<fieldset>
			<div id="reservation">
				<p>
					<label for="checkIn">Check In: </label>
					<input type="text" id="checkIn" name="checkIn" required />
				</p>

				<p>
					<label for="checkOut">Check Out: </label>
					<input type="text" id="checkOut" name="checkOut" required />
				</p>

				<p>
					<label for="room">Room: </label>
					<select id="room" name="roomID" required>

						<?php foreach ($rooms as $room) { ?>
							<option value="<?php echo $room["roomID"]; ?>"><?php echo $room["roomType"]; ?></option>
						<?php } ?>
					</select>

					<div id="hiddenInfo">
						<img src="" id="roomImage" style="float:left;" />
						<ul style="list-style:none; float:left">
							<li>Available Room: <span id="available"></span></li>
							<li>Room Price: <span id="roomPrice"></span></li>
						</ul>
					</div>
					
				</p>

				<p>
					<label for="firstName">First Name: </label>
					<input type="text" id="firstName" name="firstName" required />
				</p>

				<p>
					<label for="lastName">Last Name: </label>
					<input type="text" id="lastName" name="lastName" required />
				</p>

				<p>
					<label for="contactNumber">Contact Number: </label>
					<input type="text" id="contactNumber" name="contactNo" required />
				</p>

				<p>
					<label for="address">Home Address: </label>
					<input type="text" id="address" name="address" />
				</p>

				<p>
					<label for="emailAddress">Email Address: </label>
					<input type="text" id="emailAddress" name="email" />
				</p>

				<p>
					<input type="submit" value="Reserve" class="button" />
					<input type="reset" value="Reset" class="button" />
				</p>
			</div>
		</fieldset>
	</form>
</div>

<script type="text/javascript">
	$(function(){
		$("#hiddenInfo").hide();
	});
</script>