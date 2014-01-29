<div id="content">
	<h1 style="font-size: 20px;">Our Rooms</h1>
	<ul id="gallery">
		<?php
			foreach ($rooms as $room) {
		?>
			<li><a href="upload/<?php echo $room['roomImage']; ?>" data-lightbox="gallery"><img src="upload/<?php echo $room['roomImage']; ?>" height="150" width="150"></li>
		<?php
			}
		?>
	</ul>
</div>

<div id="sidebar">
	<a href="?action=reserve">
		<div class="reserve">
			<p>Reserve Now!</p>
		</div>
	</a>

</div>