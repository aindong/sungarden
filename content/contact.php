<div id="content-rooms">
	<form action="?action=contacts&action2=submit" method="post">
		<h2>Contact Us</h2>
		<h1>Please use the form below if you have concerns and suggestions.</h1><br/><br/>
		<fieldset>
			<div id="reservation">
				<p>
					<label for="messageName">Name: </label>
					<input type="text" id="messageName" name="messageName" required />
				</p>

				<p>
					<label for="messageEmail">Email: </label>
					<input type="text" id="messageEmail" name="messageEmail" required />
				</p>

				<p>
					<label for="styled">Message: </label><br/>
					<textarea name="messageContent" cols="5" rows="20" id="styled"></textarea>
				</p>

				<p>
					<input type="submit" value="Submit" class="button" />
					<input type="reset" value="Reset" class="button" />
				</p>
			</div>

			<div style="margin-bottom:50px;"></div>
		</fieldset>
	</form>
</div>
