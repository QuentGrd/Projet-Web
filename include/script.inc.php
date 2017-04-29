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