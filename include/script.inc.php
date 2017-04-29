<script src="js/classie.js"></script>
<script>
	function init() {
		window.addEventListener('scroll', function(e){
			var scrolledDistance = window.pageYOffset || document.documentElement.scrollTop;
			var limit = 50;
			var header = document.querySelector("header");
			if (scrolledDistance > limit)
				classie.addClass(header,"scrolled");
			else
				if (classie.hasClass(header,"scrolled"))
					classie.removeClass(header,"scrolled");
		});
	}
	window.onload = init();
</script>