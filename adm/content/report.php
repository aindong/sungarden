
<form action="?action=report&action2=custom" method="post">
	
	<fieldset style="margin-right:10%; width:40%; float:left">
		Start Date<br/>
		<label for="month">Month</label>
		<select id="month" name="month">
			<option value="1">January</option>
			<option value="2">February</option>
			<option value="3">March</option>
			<option value="4">April</option>
			<option value="5">May</option>
			<option value="6">June</option>
			<option value="7">July</option>
			<option value="8">August</option>
			<option value="9">September</option>
			<option value="10">October</option>
			<option value="11">November</option>
			<option value="12">December</option>
		</select>

		<label for="day">Day</label>
		<select id="day" name="day">
			
			<?php
				for ($i=1; $i <= 31 ; $i++) { 
			?>

				<option value="<?php echo $i ?>"><?php echo $i ?></option>

			<?php	}
			?>
		</select>

		<label for="year">Year</label>
		<select id="year" name="year">
			
			<?php
				for ($i=date("Y"); $i >= 1990 ; $i--) { 
			?>

				<option value="<?php echo $i ?>"><?php echo $i ?></option>

			<?php	}
			?>
		</select>

	</fieldset>



	<fieldset style="width:40%; float:left">
		End Date<br/>
		<label for="month2">Month</label>
		<select id="month2" name="month2">
			<option value="1">January</option>
			<option value="2">February</option>
			<option value="3">March</option>
			<option value="4">April</option>
			<option value="5">May</option>
			<option value="6">June</option>
			<option value="7">July</option>
			<option value="8">August</option>
			<option value="9">September</option>
			<option value="10">October</option>
			<option value="11">November</option>
			<option value="12">December</option>
		</select>

		<label for="day2">Day</label>
		<select id="day2" name="day2">
			
			<?php
				for ($i=1; $i <= 31 ; $i++) { 
			?>

				<option value="<?php echo $i ?>"><?php echo $i ?></option>

			<?php	}
			?>
		</select>

		<label for="year2">Year</label>
		<select id="year2" name="year2">
			
			<?php
				for ($i=date("Y"); $i >= 1990 ; $i--) { 
			?>

				<option value="<?php echo $i ?>"><?php echo $i ?></option>

			<?php	}
			?>
		</select>

	</fieldset>


	<input type="submit" value="Display Report" name="submit" class="button" />
</form>
<div class="CSSTableGenerator" id="table2">
		<table>
			
			<tbody>
				<tr>
					<td>Sales Date</td>
					<td># of Customers</td>
					<td>Total Sales</td>
				</tr>

				<?php
					foreach ($reports as $report) {
				?>
				<tr>
					<td><?php echo date("F j, Y", strtotime($report["checkOut"])) ?></td>
					<td><?php echo $report["custno"] ?></td>
					<td><?php echo $report["sales"] ?></td>
				</tr>
				<?php
					}
				?>
			</tbody>

		</table>
	</div>