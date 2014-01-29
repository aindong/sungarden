
<div id="ctn1">
	<a href="#" id="add" class="button add">Add New</a>
	<!-- Table markup-->
	<div class="CSSTableGenerator" id="table2">
		<table>
			
			<tbody>
				<tr>
					<td>Room ID</td>
					<td>Room Type</td>
					<td>Max Person</td>
					<td>Room Price</td>
					<td>Stocks</td>
					<td>Room Image</td>
					<td>Action</td>
				</tr>

				<?php
					foreach ($rooms as $room) {
				?>
				<tr>
					<td><?php echo $room["roomID"] ?></td>
					<td><?php echo $room["roomType"] ?></td>
					<td><?php echo $room["maxPerson"] ?></td>
					<td><?php echo $room["roomPrice"] ?></td>
					<td><?php echo $room["roomStock"] ?></td>
					<td><a href="upload/<?php echo $room['roomImage'];?>" data-lightbox="gallery"><img src="upload/<?php echo $room["roomImage"] ?>" height="50" width="50"></a></td>
					<td><a href="#" class="button edit small">Update</a> <a href="?action=roominventory&action2=deleteroom&id=<?php echo $room["roomID"] ?>" onclick="return confirm('Delete This Record?')" class="button delete small">Delete</a></td>
				</tr>
				<?php
					}
				?>
			</tbody>

		</table>
	</div>
</div>

<div id="ctn2">
	<form action="?action=roominventory&action2=addroom" method="post" enctype="multipart/form-data" id="myForm">
		
		<p>
			<label for="roomType">Room Type</label>
			<input type="text" name="roomType" id="roomType" required="required" />
		</p>

		<p>
			<label for="maxPerson">Max Person</label>
			<input type="text" name="maxPerson" id="maxPerson" required="required" />
		</p>

		<p>
			<label for="roomPrice">Price</label>
			<input type="text" name="roomPrice" id="roomPrice" required="required" />
		</p>

		<p>
			<label for="roomStock">Room Stocks</label>
			<input type="text" name="roomStock" id="roomStock" required="required" />
		</p>

		<p>
			<label for="roomImage">Room Image</label><br/>
			<input type="file" name="roomImage" id="roomImage" required="required" />
		</p>

		<p>
			<a href="#" class="button delete" id="cancel">Cancel</a>
			<a href="#" class="button save" id="save">Save New Record</a>
		</p>
	</form>
</div>

<script type="text/javascript">
	$(function() {
		//hide the form
		$("#ctn2").hide();

		//when add button is clicked
		$("#add").click(function() {
			$("#ctn1").slideUp(500);
			$("#ctn2").slideDown(500);
		});

		//go back to list when he doesn't want to add new
		$("#cancel").click(function() {
			$("#ctn2").slideUp(500);
			$("#ctn1").slideDown(500);
		});

		$("#save").click(function() {
			var question = confirm("Are you sure to add this new record?");
			if(question)
			{
				$("#myForm").submit();
				alert("New record was successfully added into the database.");
			}
			else
			{
				return false;
			}
		});


	});

</script>