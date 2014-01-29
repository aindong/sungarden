
<a href="#" id="add" class="button spark" onclick="window.location.reload()">Refresh</a>
<div class="CSSTableGenerator" id="table2">
		<table>
			
			<tbody>
				<tr>
					<td>ID</td>
					<td>Date</td>
					<td>From</td>
					<td>Email</td>
					<td>Content</td>
					<td>Action</td>
				</tr>

				<?php
					foreach ($messages as $message) {
				?>
				<tr>
					<td><?php echo $message["messageID"] ?></td>
					<td><?php echo $message["messageDate"] ?></td>
					<td><?php echo $message["messageName"] ?></td>
					<td><?php echo $message["messageEmail"] ?></td>
					<td><?php echo $message["messageContent"]." ".$reservation["lastName"] ?></td>
					
					<td> 
						<a href="?action=message&action2=delete&id=<?php echo $message['messageID']?>" class="button edit" onclick="return confirm('Are you sure to update this customer?')">Delete</a>
					</td>
				</tr>
				<?php
					}
				?>
			</tbody>

		</table>
	</div>