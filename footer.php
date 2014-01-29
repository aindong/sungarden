</div>
	</div>

	
	<!-- Include the plugin *after* the jQuery library -->
	<script src="js/bjqs/bjqs-1.3.min.js"></script>

	<script type="text/javascript">
		jQuery(document).ready(function($) {
		    $('#slider').bjqs({
		        'height' : 420,
		        'width' : 974,
		        'responsive' : true,
		        'showmarkers' : false
		    });
		});
	</script>

	<script type="text/javascript">
		$.urlParam = function(name){
		    var results = new RegExp('[\\?&amp;]' + name + '=([^&amp;#]*)').exec(window.location.href);
		    return results[1] || 0;
		}

		var param = $.urlParam('action');
	</script>

	<!-- Include the JQUERY UI -->
	<script src="js/jquery-ui-1.10.3.custom/js/jquery-ui-1.10.3.custom.min.js"></script>
	<script type="text/javascript">
		$(function(){
			$( "#checkIn" ).datepicker({
				inline: true
			});

			$( "#checkOut" ).datepicker({
				inline: true
			});
		});
	</script>

	<!-- lightbox  -->
	<script src="js/lightbox/js/lightbox-2.6.min.js"></script>

</body>
</html>