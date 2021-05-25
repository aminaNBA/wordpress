/**
 * Oceanic Theme Custom Functionality
 *
 */
( function( $ ) {
    
    jQuery( document ).ready( function() {
    	oceanic_image_has_loaded();
    	
    	$('.hiddenUntilLoadedImageContainer img, img.hideUntilLoaded').one("load", function() {
	    }).each(function() {
	    	if (this.complete) {
	    		$(this).load();
	    	}
	    });
    	
	    // Themify Product Filter
    	$( document ).on( 'wpf_ajax_success', function() {
    		oceanic_image_has_loaded();
    	} );
    	
        // Add button to sub-menu parent to show nested pages on the mobile menu
        $( '.main-navigation li.page_item_has_children, .main-navigation li.menu-item-has-children' ).prepend( '<span class="menu-dropdown-btn"><i class="fa fa-angle-right"></i></span>' );
        
        // Add a hover class to navigation menu items when focused
        $( '.main-navigation a' ).on( 'focus blur', function() {
        	$( this ).parents( 'li' ).toggleClass( 'hover' );
        });
        
        // Sub-menu toggle button
        $( '.main-navigation a[href="#"]' ).on( 'click', function(e) {
        	e.preventDefault();
            $(this).parent().toggleClass( 'open-page-item' );
            $(this).find('.fa:first').toggleClass('fa-angle-right').toggleClass('fa-angle-down');
            
        });
        
        $( '.menu-dropdown-btn' ).on( 'click', function(e) {
        	e.preventDefault();
            $(this).parent().toggleClass( 'open-page-item' );
            $(this).find('.fa:first').toggleClass('fa-angle-right').toggleClass('fa-angle-down');
            
        });
        
        // Mobile menu toggle button
        $( '.header-menu-button' ).on( 'click', function(e) {
            $( 'body' ).toggleClass( 'show-main-menu' );
            
        	if ( $( 'body' ).hasClass( 'show-main-menu' ) ) {
            	$( this ).attr( 'aria-expanded', 'true' );
        	} else {
        		$( this ).attr( 'aria-expanded', 'false' );
        	}
        });
        
        $( '.main-menu-close' ).on( 'click', function(e) {
            $( '.header-menu-button' ).click();
        });
        
        // Search Show / Hide
        $(".search-btn").toggleClick( function(e){
        	e.preventDefault();
        	$search_block = $( 'header .search-block' );
        	$search_field = $( 'header .search-block .search-field' );
        	
        	$search_block.css( 'visibility', 'visible' );
        	$search_block.animate( { top: '+=50' }, 150 );
        	$search_field.focus();
        }, function(e){
        	e.preventDefault();
        	$search_block = $( 'header .search-block' );
        	$search_field = $( 'header .search-block .search-field' );
        	
        	$search_block.animate( { top: '-=50' }, 150, function() {
        		$(this).css( 'visibility', 'hidden' );
            });
        	$search_field.blur();
        });
        
        // Don't search if no keywords have been entered
        $(".search-submit").on( 'click', function(e) {
        	var form = $(this).parents("form");
        	
        	if ( form.find(".search-field").val() == "" ) {
        		e.preventDefault();
        	} else {
        		form.submit();
        	}
        });
        
        // Scroll To Top Button Functionality
        $('.scroll-to-top').on( 'click', function(e) {
            $('html, body').animate( { scrollTop: 0 }, 800 );
        });
        $(window).scroll(function(){
            if ($(this).scrollTop() > 400) {
                $('.scroll-to-top').fadeIn();
            } else {
                $('.scroll-to-top').fadeOut();
            }
        });
		
    });
    
    $(window).resize(function () {
        
        
        
    }).resize();
    
    $(window).on('load', function() {
        oceanic_home_slider();
        oceanic_blog_list_carousel();
    });
    
    function oceanic_blog_list_carousel() {
        $('.post-loop-images-carousel-wrapper').each(function(c) {
            var this_blog_carousel = $(this);
            var this_blog_carousel_id = 'post-loop-images-carousel-id-'+c;
            this_blog_carousel.attr('id', this_blog_carousel_id);
            $('#'+this_blog_carousel_id+' .post-loop-images-carousel').carouFredSel({
                responsive: true,
                circular: false,
                width: 580,
                height: "variable",
                items: {
                    visible: 1,
                    width: 580,
                    height: 'variable'
                },
                onCreate: function(items) {
                    $('#'+this_blog_carousel_id).removeClass('post-loop-images-carousel-wrapper-remove');
                    $('#'+this_blog_carousel_id+' .post-loop-images-carousel').removeClass('post-loop-images-carousel-remove');
                },
                scroll: 500,
                auto: false,
                prev: '#'+this_blog_carousel_id+' .post-loop-images-prev',
                next: '#'+this_blog_carousel_id+' .post-loop-images-next'
            });
        });
    }
    
    function oceanic_image_has_loaded() {
    	var container;

    	$('.hiddenUntilLoadedImageContainer img').on('load',function(){
	    	container = $(this).parents('.hiddenUntilLoadedImageContainer');
	    	container.removeClass('loading');
	    	
	    	(function(container){
	    	    setTimeout(function() {
	    	    	container.addClass('transition');
	    	    }, 50);
	    	})(container);
	    });
    	
	    $('img.hideUntilLoaded').on('load',function(){
	    	container = $(this).parents('.featured-image-container');
	    	container.removeClass('loading');
	    });
	}
    
    function oceanic_home_slider() {
        $(".home-slider").carouFredSel({
            responsive: true,
            circular: true,
            infinite: false,
            width: 1200,
            height: 'variable',
            items: {
                visible: 1,
                width: 1200,
                height: 'variable'
            },
            onCreate: function(items) {
                $(".home-slider-wrap").removeClass("home-slider-remove");
            },
            scroll: {
                fx: 'uncover-fade',
                duration: oceanicSliderTransitionSpeed
            },
            auto: false,
            pagination: '.home-slider-pager',
            prev: ".home-slider-prev",
            next: ".home-slider-next"
        });
    }
    
    if ( $(".header-image img").length > 0 ) {
	    var img = $('<img/>');
	    img.attr("src", $(".header-image img").attr("src") ); 
		
	    img.on('load', function() {
	    	$('.header-image-wrap').removeClass('header-image-remove');
	    	$('.header-image').css('height', 'auto');
		});
    }
    
	$.fn.toggleClick = function() {
		var functions = arguments;
		return this.click( function() {
			var iteration = $(this).data('iteration') || 0;
			//	console.log(iteration)
			functions[iteration].apply( this, arguments );
			iteration = ( iteration+1 ) % functions.length;
			$(this).data( 'iteration', iteration );
		});
	}

} )( jQuery );