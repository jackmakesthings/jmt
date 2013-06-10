$(window).load(function(){			

		$("a[rel^='prettyPhoto']").prettyPhoto();
		$(".gallery-item a").prettyPhoto();
	
	
		$("#grid-content").vgrid({
		    easeing: "easeOutQuint",
		    time: 400,
		    delay: 20,
		    fadeIn: {
		    	time: 500,
		    	delay: 50
		    }
		});
		
		var hsort_flg = false;
		$("#hsort").click(function(e){
			hsort_flg = !hsort_flg;
			$("#grid-content").vgsort(function(a, b){
				var _a = $(a).find('div').text();
				var _b = $(b).find('div').text();
				var _c = hsort_flg ? 1 : -1 ;
				return (_a > _b) ? _c * -1 : _c ;
			}, "easeInOutExpo", 300, 0);
			return false;
		});
	
		$("#rsort").click(function(e){
			$("#grid-content").vgsort(function(a, b){
				return Math.random() > 0.5 ? 1 : -1 ;
			}, "easeOutQuint", 300, 50);
			return false;
		});		


	
	/////////////////////////////////////////////
	// HTML5 placeholder fallback	 							
	/////////////////////////////////////////////
	$('[placeholder]').focus(function() {
	  var input = $(this);
	  if (input.val() == input.attr('placeholder')) {
	    input.val('');
	    input.removeClass('placeholder');
	  }
	}).blur(function() {
	  var input = $(this);
	  if (input.val() == '' || input.val() == input.attr('placeholder')) {
	    input.addClass('placeholder');
	    input.val(input.attr('placeholder'));
	  }
	}).blur();
	$('[placeholder]').parents('form').submit(function() {
	  $(this).find('[placeholder]').each(function() {
	    var input = $(this);
	    if (input.val() == input.attr('placeholder')) {
		 input.val('');
	    }
	  })
	});
	
	/////////////////////////////////////////////
	// Scroll to top 							
	/////////////////////////////////////////////
	$('.back-top a').click(function () {
		$('body,html').animate({
			scrollTop: 0
		}, 800);
		return false;
	});

	/////////////////////////////////////////////
	// Toggle menu on mobile 							
	/////////////////////////////////////////////
	$('#main-nav-wrap').prepend('<div id="menu-icon" class="mobile-button"></div>');
	
	$("#menu-icon").click(function(){
		$("#header #main-nav").fadeToggle();
		$("#header #searchform").hide();
		$(this).toggleClass("active");
	});
	

});

