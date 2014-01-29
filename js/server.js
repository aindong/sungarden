$(function() {

	$(function poll(){
	    $.ajax({ url: "server", success: function(data){
	        //Update your dashboard gauge
	        salesGauge.setValue(data.value);

    	}, dataType: "json", complete: poll, timeout: 30000 });
	})();

});