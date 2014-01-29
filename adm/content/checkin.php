
<a href="#" id="add" class="button spark" onclick="window.location.reload()">Refresh</a>
<div class="CSSTableGenerator" id="table2">
		<table>
			
			<tbody>
				<tr>
					<td>ID</td>
					<td>Check-In</td>
					<td>Check-Out</td>
					<td>Room Type</td>
					<td>Full Name</td>
					<td>Contact</td>
					<td>Address</td>
					<td>email</td>
					<td>Amount to Pay</td>
					<td>Status</td>
					<td>Action</td>
				</tr>

				<?php
					foreach ($reservations as $reservation) {
				?>
				<tr>
					<td><?php echo $reservation["reservationID"] ?></td>
					<td><?php echo $reservation["checkIn"] ?></td>
					<td><?php echo $reservation["checkOut"] ?></td>
					<td><?php echo $reservation["roomType"] ?></td>
					<td><?php echo $reservation["firstName"]." ".$reservation["lastName"] ?></td>
					<td><?php echo $reservation["contactNo"] ?></td>
					<td><?php echo $reservation["address"] ?></td>
					<td><?php echo $reservation["email"] ?></td>
					<td><?php echo $reservation["totalPrice"] ?></td>
					<td><?php echo $reservation["status"] ?></td>
					<td> 
						<a href="?action=viewr&action2=checkout&id=<?php echo $reservation['reservationID']?>" class="button edit" onclick="return confirm('Are you sure to update this customer?')">Check-Out</a>
					</td>
				</tr>
				<?php
					}
				?>
			</tbody>

		</table>
	</div>