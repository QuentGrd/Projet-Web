<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<script type="text/javascript">
$(document).on("scroll",function(){
    $("header").toggleClass("scrolled", $(document).scrollTop()>100);
});
</script>