<div id="content">
	<h1 style="font-size: 20px;">Gallery</h1>
	<ul id="gallery">
		<?php
			foreach (glob("images/*.jpg") as $image) {
		?>
			<li><a href="<?php echo $image; ?>" data-lightbox="gallery"><img src="<?php echo $image; ?>" height="150" width="150"></li>
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