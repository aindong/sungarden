<div id="ctn1">
<a href="#" id="add" class="button add">Add New</a>
<!-- Table markup-->
	<div class="CSSTableGenerator" id="table2">
		<table>
			
			<tbody>
				<tr>
					<td>Username</td>
					<td>First Name</td>
					<td>Middle Name</td>
					<td>Last Name</td>
					<td>Role</td>
					<td>Action</td>
				</tr>

				<?php
					foreach ($users as $user) {
				?>
				<tr>
					<td><?php echo $user["username"] ?></td>
					<td><?php echo $user["firstName"] ?></td>
					<td><?php echo $user["middleName"] ?></td>
					<td><?php echo $user["lastName"] ?></td>
					<td><?php echo $user["role"] ?></td>
					<td><a href="#" class="button edit small">Update</a> <a href="?action=users&action2=deleteuser&id=<?php echo $user['username']; ?>" onclick="return confirm('Delete This Record?')" class="button delete small">Delete</a></td>
				</tr>
				<?php
					}
				?>
			</tbody>

		</table>
	</div>
</div>

<div id="ctn2">
	<form action="?action=users&action2=adduser" method="post" id="myForm">
		<p>
			<label for="username">Username</label>
			<input type="text" name="username" id="username" required="required" />
		</p>

		<p>
			<label for="password">Password</label>
			<input type="password" name="password" id="password" required="required" />
		</p>

		<p>
			<label for="firstName">First Name</label>
			<input type="text" name="firstName" id="firstName" required="required" />
		</p>

		<p>
			<label for="middleName">Middle Name</label>
			<input type="text" name="middleName" id="middleName" required="required" />
		</p>

		<p>
			<label for="lastName">Last Name</label><br/>
			<input type="text" name="lastName" id="lastName" required="required" />
		</p>

		<p>
			<label for="role">Role</label><br/>
			<select name="role" id="role">
				<option value="Receptionist">Receptionist</option>
				<option value="Admin">Admin</option>
			</select>
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