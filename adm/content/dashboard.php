<?php if($_SESSION['role'] != "Admin") {
	header("Location: ?action=viewr");
	exit();
?>

<!-- Table markup-->
	<div class="CSSTableGenerator" ="table2">
		<table>
			
			<tbody>
				<tr>
					<td>Room ID</td>
					<td>Room Type</td>
					<td>Max Person</td>
					<td>Room Price</td>
					<td>Stocks</td>
					<td>Room Image</td>
				</tr>

				<tr>
					<td>Room ID</td>
					<td>Room Type</td>
					<td>Max Person</td>
					<td>Room Price</td>
					<td>Stocks</td>
					<td>Room Image</td>
				</tr>

				<tr>
					<td>Room ID</td>
					<td>Room Type</td>
					<td>Max Person</td>
					<td>Room Price</td>
					<td>Stocks</td>
					<td>Room Image</td>
				</tr>

				<tr>
					<td>Room ID</td>
					<td>Room Type</td>
					<td>Max Person</td>
					<td>Room Price</td>
					<td>Stocks</td>
					<td>Room Image</td>
				</tr>
			</tbody>

		</table>
	</div>