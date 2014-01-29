<form action="?action=walkin&action2=walkinsubmit" method="post">
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
				</p>

				

				<p>
					<input type="submit" value="Submit" class="button" />
					<input type="reset" value="Reset" class="button" />
				</p>
			</div>
		</fieldset>
	</form>

	<script src="js/jquery-ui-1.10.3.custom/js/jquery-ui-1.10.3.custom.min.js"></script>
	<script type="text/javascript">
		$(function(){
			$( "#checkIn" ).datepicker({
				inline: true
			});

			$( "#checkOut" ).datepicker({
				inline: true
			});
		});
	</script>