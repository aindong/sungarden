
<a href="#" id="add" class="button delete" onclick="window.location.reload()">Delete All</a>
<div class="CSSTableGenerator" id="table2">
		<table>
			
			<tbody>
				<tr>
					<td>ID</td>
					<td>Date</td>
					<td>Type</td>
					<td>User</td>
					<td>Content</td>
					<td>Action</td>
				</tr>

				<?php
					foreach ($logs as $log) {
				?>
				<tr>
					<td><?php echo $log["logID"] ?></td>
					<td><?php echo $log["logDate"] ?></td>
					<td><?php echo $log["logType"] ?></td>
					<td><?php echo $log["logUser"] ?></td>
					<td><?php echo $log["logContent"] ?></td>
					<td> 
						<a href="?action=audit&action2=delete&id=<?php echo $log['logID']?>" class="button edit" onclick="return confirm('Are you sure to delete this log?')">Delete</a>
					</td>
				</tr>
				<?php
					}
				?>
			</tbody>

		</table>
	</div>