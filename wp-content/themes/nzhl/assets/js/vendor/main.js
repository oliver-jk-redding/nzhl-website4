 $ = jQuery;

activateScrollListener();

function activateScrollListener() {
	if(!$(location).attr('href').includes('?') && $(window).width() > 790) {
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
		$('.sidebar').css({
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
		$('.sidebar').css({
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



	/* PARTNER CARDS */

	// function isEven(value) { return (value%2 === 0); }

	// $('.partner-card').click(function(){

	// 	$(this).siblings('.partner-card').removeClass('active');
	// 	$(this).addClass('active');

	// 	if($(this).find('.partner-bio').length){

	// 		var bio_txt = $(this).find('.partner-bio').html();
	// 		var bio_div = "<aside class='partner-bio-aside'>" + bio_txt + "</aside>";

	// 		$(this).parent().find('.partner-bio-aside').remove();


	// 		if($(window).width() <= 660){

	// 			var n    = $(this).index() + 1;
	// 			var next = Math.ceil(n/1) * 1;

	// 			if ($(this).parent().find('.partner-card').eq(next-1).length){
	// 				$(this).parent().find('.partner-card').eq(next-1).after(bio_div);
	// 			}
	// 			else{
	// 				$(this).parent().find('.partner-card').last().after(bio_div);
	// 			}
	// 		}

	// 		else if($(window).width() <= 790){

	// 			var n = $(this).index() + 1;
	// 			var next = Math.ceil(n/2) * 2;

	// 			if ($(this).parent().find('.partner-card').eq(next-1).length){
	// 				$(this).parent().find('.partner-card').eq(next-1).after(bio_div);
	// 			}
	// 			else{
	// 				$(this).parent().find('.partner-card').last().after(bio_div);
	// 			}
	// 		}

	// 		else{
	// 			var n    = $(this).index() + 1;
	// 			var next = Math.ceil(n/3) * 3;

	// 			if ($(this).parent().find('.partner-card').eq(next-1).length){
	// 				$(this).parent().find('.partner-card').eq(next-1).after(bio_div);
	// 			}
	// 			else{
	// 				$(this).parent().find('.partner-card').last().after(bio_div);
	// 			}
	// 		}
	// 	}

	// });

	// $('.partner-cards').each(function(index, el) {
	// 	$(el).children('.partner-card').first().click();
	// });


	// ADDS FADE EFFECT FOR OLD EVENTS
	// $( ".tablepress tr td:contains('2015')" ).parents('tr').addClass('old');


	// if ( $('.single-events').length ) {
	// 	$('.menu-item-1201').addClass('current_page_item active');
	// }



	// $.extend( $.fn.dataTableExt.oSort, {
	// 	"date-uk-pre": function ( a ) {
	// 		if (a == null || a == "") {
	// 			return 0;
	// 		}
	// 		var ukDatea = a.split('/');
	// 		return (ukDatea[2] + ukDatea[1] + ukDatea[0]) * 1;
	// 	},

	// 	"date-uk-asc": function ( a, b ) {
	// 		return ((a < b) ? -1 : ((a > b) ? 1 : 0));
	// 	},

	// 	"date-uk-desc": function ( a, b ) {
	// 		return ((a < b) ? 1 : ((a > b) ? -1 : 0));
	// 	}
	// } );


	// $('#all-events-table').DataTable({
	// 	"dom": '<"#table-controls" fi>rt<"bottom" l p><"clear">',
	// 	"order": [[ 5, "asc" ]],
	// 	columnDefs: [
	// 	{ targets: 'no-sort', orderable: false }
	// 	]
	// });


	// $('#all-events-table-old').DataTable({
	// 	"dom": '<"#table-controls" fi>rt<"bottom" l p><"clear">',
	// 	"order": [[ 5, "desc" ]],
	// 	columnDefs: [
	// 	{ targets: 'no-sort', orderable: false }
	// 	]
	// });


	// $('.dataTables_filter input').attr("placeholder", "Search for titles, lecturers, locations or dates");
	// $('th.event-date').addClass('sorting_desc');

	// $.urlParam = function(name){
	// 	var results = new RegExp('[\?&]' + name + '=([^&#]*)').exec(window.location.href);
	// 	if (results==null){
	// 		return null;
	// 	}
	// 	else{
	// 		return results[1] || 0;
	// 	}
	// }


	// var referenceSearch =  $.urlParam('search');

	// if (referenceSearch) {
	// 	referenceSearch = decodeURIComponent(referenceSearch);
	// 	$('#all-events-table').DataTable().search( referenceSearch ).draw();
	// }



	// $('#filter-buttons').on('click', 'li', function(event) {
	// 	$('#filter-buttons ul li').removeClass('current');
	// 	$(this).addClass('current');
	// 	var searchTerm = $(this).data('filter');
	// 	if (searchTerm == "*") {
	// 		$('#all-events-table').DataTable().search('').draw();
	// 	} else {
	// 		$('#all-events-table').DataTable().search( searchTerm ).draw();
	// 	}
	// });

	// flatten object by concatting values
	// function concatValues( obj ) {
	// 	var value = '';
	// 	for ( var prop in obj ) {
	// 		value += obj[ prop ];
	// 	}
	// 	return value.replace(' ', '');
	// }

	// var currentFilter = $('.filter-selected li.active').attr('data-filter');
	// var $grid = $('.faculty-list');
	// var filters = {university: "", expertise: "", search: ""};

	// $grid.isotope({
	// 	itemSelector: '.fellow-card',
	// 	layoutMode: 'packery',
	// 	filter: concatValues( filters ),
	// 	getSortData: {
	// 		surname: '[data-surname]'
	// 	},
	// 	sortBy: 'surname'
	// });


	// var numbOfUnis = $('.faculty-list').length;

	// $('.filter-dropdown').on('click', 'li:not(.disabled)', function() {
	// 	var $parent = $(this).parents('.filter-dropdown');
	// 	var selectedText = $(this).text();

	// 	$parent.children('.btn').text(selectedText).addClass('option-selected');
	// 	$(this).addClass('active').siblings('li').removeClass('active');


	// 	var $this = $(this);
	//     // get group key
	//     var $buttonGroup = $this.parents('ul.dropdown-menu');
	//     var filterGroup = $buttonGroup.attr('data-filter-group');
	//     // set filter for group
	//     filters[ filterGroup ] = $this.attr('data-filter');
	//     // combine filters
	//     var filterValue =  concatValues( filters );
	//     $grid.isotope({ filter: filterValue });

	//     $grid.each(function(index, el) {
	//   		if ( !$(el).data('isotope').filteredItems.length ) {
	//   			$(el).prev('h2').hide();
	//   		} else {
	//   			$(el).prev('h2').show();
	//   		}

	//   		if ( index == (numbOfUnis-1) ) {
	//   		}
	// 	});

	// 	setTimeout(function() {
	// 		if ( $('.fellow-card:visible').length == 0) {
	// 	  		$('#no-results').fadeIn();
	// 	  		// console.log('cards hidden');
	// 	  		// console.log( $('.fellow-card:visible').length );
	// 	  	} else {
	// 	  		$('#no-results').fadeOut();
	// 	  		// console.log('has cards');
	// 	  	}
	// 	}, 500);


	// });

	// var $quicksearch = $('.fellows-search').keyup( debounce( function() {
 // 		var qsRegex = new RegExp( $quicksearch.val(), 'gi' );
	// 	$grid.isotope({ filter: function() {
 //    		return qsRegex ? $(this).text().match( qsRegex ) : true;
 //  		} });
	// }, 200));

	// function debounce( fn, threshold ) {
	//   var timeout;
	//   return function debounced() {
	//     if ( timeout ) {
	//       clearTimeout( timeout );
	//     }
	//     function delayed() {
	//       fn();
	//       timeout = null;
	//     }
	//     timeout = setTimeout( delayed, threshold || 100 );
	//   }
	// }





	// $('.fellow-card').on('click', '.fellow-card-intro', function(event) {
	// 	var $this = $(this).parents('.fellow-card');

	// 	// $this.find('span').toggleClass('dashicons-arrow-down-alt2 dashicons-arrow-up-alt2');

	// 	if ( $this.hasClass('active-card') ) {
	// 		$this.removeClass('active-card');
	// 	} else {
	// 		$('.fellow-card').removeClass('active-card');
	// 		$this.addClass('active-card');
	// 	}

	// 	$('.faculty-list').isotope('layout');

	// });





});





