<html>
<head>
<title>Long Poll Example</title>
<script src="jquery-1.3.2.min.js" type="text/javascript" charset="utf-8"></script>
<script type="text/javascript" charset="utf-8">
var timestamp=null;
function waitForMsg(){
$.ajax({
type: "GET",
url: "getdata.php?timestamp="+timestamp,
async: true,
cache: false,
 
success: function(data){
var json=eval('('+data+ ')');
if (json['msg'] !="") {
//alert( json['msg'] );
//Display message here
 
$("#msgold").empty();
$("#msgold").append(json['msg'] +"<hr>").slideDown("slow");
 
}
timestamp =json["timestamp"];
setTimeout("waitForMsg()",1000);
},
error: function(XMLHttpRequest,textStatus,errorThrown) {
// alert("error: "+textStatus + " "+ errorThrown );
setTimeout("waitForMsg()",15000);
}
});
}
 
$(document).ready(
function()
{
waitForMsg();
});
</script>
</head><body>
<H3> Server Results </H3>
<hr />
<div id="messages"><div id="msgold"></div></div>
<A href='stream.html'>Another streaming Example Stream.html </a>
</body>
</html>