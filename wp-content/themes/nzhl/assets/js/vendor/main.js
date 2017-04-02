 $ = jQuery;

activateScrollListener();

function activateScrollListener() {
	if(location.pathname == ('/') && $(window).width() > 790) {
	  $(window).scroll(scrollHander);
	}
	else {
		$(window).off('scroll', scrollHander);
	}
}

function scrollHander() {
	fixHeader();
}

function fixHeader() {
	if($(window).scrollTop() >= $(window).height()) {
		$('#masthead').css({
			'position': 'fixed',
			'margin-top': '0px'
		});
		$('.page-container').css({
			'margin-top': '100vh',
			'padding-top': '120px'
		});
	}
	else {
		$('#masthead').css({
			'position': 'relative',
			// 'margin-top': '400px'
			'margin-top': '100vh'
		});
		$('.page-container').css({
			'margin-top': 0,
			'padding-top': '20px'
		});
	}
}

$(document).ready(function() {

	$('a').each(function() {
		var href = $(this).attr('href');
		if(href === '') {
			$(this).removeAttr('href');
		}
	});

	var siteDomain = window.location.hostname;

	if (siteDomain == 'nzhobbitleague.com') {
			$('a[href*="http://localhost:8080"]').each(function(index, el) {
		    var oldURL = $(this).attr('href');
		    var newURL = oldURL.replace('http://localhost:8080', 'nzhobbitleague.com');
		    $(this).attr('href', newURL);
		});
	}

	$(window).resize(function() {
		if(!$(location).attr('href').includes('?')) {
			window.scrollTo(0,0);
			if($(window).width() > 790) {
				fixHeader();
			}
			else {
				$('#masthead').css({
					'position': 'fixed',
					'margin-top': '0px'
				});
			}
			activateScrollListener();
		}
	});


	$.fn.slideFadeToggle  = function(speed, easing, callback) {
		return this.animate({opacity: 'toggle', height: 'toggle'}, speed, easing, callback);
	};

	// $('#nav-icon').click(function(){
	// 	$(this).toggleClass('open');
	// });

	$('#hideshow').addClass('js');
	$('#nav-icon').click(function(){
		$('#hideshow').slideFadeToggle('fast', 'linear');
		$(this).toggleClass('open');
	});


	$('li.menu-item-has-children').on('click', '> a', function(event) {
		if ( $(window).width() <= 1024 ) {
			event.preventDefault();
			$(this).siblings('ul.sub-menu').toggle();
		}
	});


	$('div#header-search').on('click', 'div#search-icon', function(event) {
		event.preventDefault();
		$('div#header-search').toggleClass('active');
		$('.topbox').toggleClass('search-active');
		$('#s').focus();
	});

	$('#searchform').on('click', function(event) {
		if($('div#header-search').hasClass('active')) {
			$('div#header-search').toggleClass('active');
			$('.topbox').toggleClass('search-active');
		}
	});

	$('input').on('click', function(event) {
		event.stopPropagation();
	});

	if ( $('body.search').length ) {
		$('#searchform').click();
	}

	$('#searchform').on('submit', function(event) {
		$('div#header-search div#search-icon').click();
		$this = $('input[type=text]', this);

		if ( $this.val() == null || $this.val() == '' ) {
			event.preventDefault();
		}
	});


	$('.slider-for').slick({
	  slidesToShow: 1,
	  slidesToScroll: 1,
	  arrows: false,
	  fade: true,
	  asNavFor: '.slider-nav'
	});
	$('.slider-nav').slick({
	  slidesToShow: 3,
	  slidesToScroll: 1,
	  asNavFor: '.slider-for',
	  dots: false,
	  centerMode: true,
	  focusOnSelect: true
	});


	// $(window).resize(function(){
	// 	$(window.innerWidth > 1000) {
	// 		$("#hideshow").removeAttr("style");
	// 	}
	// });

	// function moveFeatured(){
	// 	if ( $(window).width() <= 790 ) {
	// 		// moveFeatured();
	// 		$('.featured-widget').insertAfter('.intro-image');
	// 	} else if ( $(window).width() > 790 & !$('aside .featured-widget').length ) {
	// 		$('.featured-widget').insertBefore('#nzhl-upcoming-evets-widget-2');
	// 	}
	// }

	// moveFeatured();

	// $(window).resize(function(event) {
	// 	moveFeatured();
	// });

	// $('.match').matchHeight();


});





