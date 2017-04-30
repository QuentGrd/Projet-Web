<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<script type="text/javascript">
$(document).on("scroll",function(){
	$("header").toggleClass("scrolled", $(document).scrollTop()>50);
});
</script>
<script type="text/javascript">
$(document).on("scroll",function(){
	if ($(document).scrollTop()>50)
		$('h2').insertBefore($('nav'));
	else
		$('h2').insertBefore($('article'));
});
</script>
<script type="text/javascript" src="http://maps.google.com/maps/api/js?key=AIzaSyAdw3QQQuCMFpMF2gNT1Bg7P2UN90jCIkw&sensor=false"></script>
<script type="text/javascript">
	function insertMap(lat, lng) {
		var position = new google.maps.LatLng(lat, lng);
		var param = {
			center: position,
			zoom: 14,
			mapTypeId: google.maps.MapTypeId.ROADMAP
		};
		var map = new google.maps.Map(document.getElementById("carte"), param);
		var marker = new google.maps.Marker({
			position: position,
			map: map
    	});
	}
</script>