/*-----------------------------------------------------------------------------------*/
/* GENERAL SCRIPTS */
/*-----------------------------------------------------------------------------------*/
jQuery(document).ready(function($){

	// Fix dropdowns in Android
	if ( /Android/i.test( navigator.userAgent ) && jQuery( window ).width() > 769 ) {
		$( '.nav li:has(ul)' ).doubleTapToGo();
	}

	// Table alt row styling
	jQuery( '.entry table tr:odd' ).addClass( 'alt-table-row' );

	// FitVids - Responsive Videos
	jQuery( ".post, .widget, .panel" ).fitVids();

	// Add class to parent menu items with JS until WP does this natively
	jQuery("ul.sub-menu").parents('li').addClass('parent');


	// Responsive Navigation (switch top drop down for select)
	// jQuery('ul#top-nav').mobileMenu({
	// 	switchWidth: 767,                   //width (in px to switch at)
	// 	topOptionText: 'Select a page',     //first option text
	// 	indentString: '&nbsp;&nbsp;&nbsp;'  //string for indenting nested items
	// });



  	// Show/hide the main navigation
  	jQuery('.nav-toggle').click(function() {
	  jQuery('#navigation').slideToggle('fast', function() {
	  	return false;
	    // Animation complete.
	  });
	});

	// Stop the navigation link moving to the anchor (Still need the anchor for semantic markup)
	jQuery('.nav-toggle a').click(function(e) {
        e.preventDefault();
    });

    // Add parent class to nav parents
	jQuery("ul.sub-menu, ul.children").parents().addClass('parent');


	// Top alert dismiss
	$('.top-alert .close').click(function() {
	  $('.top-alert').hide();
	  return false;
	});

	// Search form toggle
	$('.search-btn a').click(function() {
	  $('.search-input').toggleClass("open").find('input').focus();
	  return false;
	});


	// Input placeholder fallback for IE9
	if (!Modernizr.input.placeholder) {
	  $("[placeholder]").focus(function() {
	    var input;
	    input = $(this);
	    if (input.val() === input.attr("placeholder")) {
	      input.val("");
	      input.removeClass("placeholder");
	    }
	  }).blur(function() {
	    var input;
	    input = $(this);
	    if (input.val() === "" || input.val() === input.attr("placeholder")) {
	      input.addClass("placeholder");
	      input.val(input.attr("placeholder"));
	    }
	  }).blur();
	  $("[placeholder]").parents("form").submit(function() {
	    $(this).find("[placeholder]").each(function() {
	      var input;
	      input = $(this);
	      if (input.val() === input.attr("placeholder")) {
	        input.val("");
	      }
	    });
	  });
	}


});