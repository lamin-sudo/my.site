;(function($) {
'use strict'
// Dom Ready

	var back_to_top_scroll = function() {
			
			$('#backToTop').on('click', function() {
				$("html, body").animate({ scrollTop: 0 }, 500);
				return false;
			});
			
			$(window).scroll(function() {
				if ( $(this).scrollTop() > 500 ) {
					
					$('#backToTop').addClass('active');
				} else {
				  
					$('#backToTop').removeClass('active');
				}
				
			});
			
		}; // back_to_top_scroll   
	
	
		//Trap focus inside mobile menu modal
		//Based on https://codepen.io/eskjondal/pen/zKZyyg	
		var trapFocusInsiders = function(elem) {
			
				
			var tabbable = elem.find('select, input, textarea, button, a, i').filter(':visible');
			
			var firstTabbable = tabbable.first();
			var lastTabbable = tabbable.last();
			/*set focus on first input*/
			firstTabbable.focus();
			
			/*redirect last tab to first input*/
			lastTabbable.on('keydown', function (e) {
			   if ((e.which === 9 && !e.shiftKey)) {
				   e.preventDefault();
				   
				   firstTabbable.focus();
				  
			   }
			});
			
			/*redirect first shift+tab to last input*/
			firstTabbable.on('keydown', function (e) {
				if ((e.which === 9 && e.shiftKey)) {
					e.preventDefault();
					lastTabbable.focus();
				}
			});
			
			/* allow escape key to close insiders div */
			elem.on('keyup', function(e){
			  if (e.keyCode === 27 ) {
				elem.hide();
			  };
			});
			
		};

		var focus_to = function(action,element) {

			$(action).keyup(function (e) {
			    e.preventDefault();
				var code = e.keyCode || e.which;
				if(code == 13) { 
					$(element).focus();
				}
			});		
			
		}
	
	$(function() {
		
		back_to_top_scroll();
		
		
		if( $('.owlGallery,.img-box ul.blocks-gallery-grid').length ){
			$(".owlGallery,.img-box ul.blocks-gallery-grid").owlCarousel({
				stagePadding: 0,
				loop: true,
				autoplay: true,
				autoplayTimeout: 2000,
				margin: 0,
				nav: false,
				dots: false,
				smartSpeed: 1000,
				rtl: ( $("body.rtl").length ) ? true : false, 
				responsive: {
					0: {
						items: 1
					},
					600: {
						items: 1
					},
					1000: {
						items: 1
					}
				}
			});
		}
	 
 	
	if(  $('.navsticky').length ){
	var stickyTop = $('.navsticky').offset().top;
		
	  $(window).scroll(function() {
		var windowTop = $(window).scrollTop();
	   if ( matchMedia( 'only screen and (min-width: 992px)' ).matches ) {
			if (stickyTop < (windowTop - 50 ) ) {
			  $('.navsticky').addClass('active');
			} else {
			  $('.navsticky').removeClass('active');
	
			}
		}
	  });
	}
		
		
	
	/*=============================================
    	=      Main Menu         =
    =============================================*/
	   
		$('#navbar .navigation-menu li > a').keyup(function (e) {
			if ( matchMedia( 'only screen and (min-width: 992px)' ).matches ) {
				$("#navbar .navigation-menu li").removeClass('focus');
				$(this).parents('li.menu-item-has-children').addClass('focus');
				$('#navbar').addClass('focus-mode');
			}
		});	
		$('#nav-wrap').hover(function(){
			$('#navbar').removeClass('focus-mode');
			$("#navbar .navigation-menu li").removeClass('focus');
		});
		$('#navbar li.menu-item-has-children').each(function( index ) {
			$(this).find('a').eq(0).after('<i class="icofont-rounded-down responsive-submenu-toggle" tabindex="0" autofocus="autofocus"></i>');
		});

		$('#secondary .widget li a').keyup(function (e) {
			if ( matchMedia( 'only screen and (min-width: 992px)' ).matches ) {
				$("#navbar .navigation-menu li").removeClass('focus');
				$(this).parents('li.menu-item-has-children').addClass('focus');
				

			}
		});	
		
		$(".responsive-submenu-toggle").on('click', function(e){
			$(this).next('ul').toggleClass('focus-active');
			$(this).toggleClass('icofont-rounded-up');
	    });
		$(".responsive-submenu-toggle").keyup(function (e) {
		    e.preventDefault();
			var code = e.keyCode || e.which;
			if(code == 13) { 
				$(this).next('ul').toggleClass('focus-active');
				$(this).toggleClass('icofont-rounded-up');
			}
		});


  		$(".emart-rd-navbar-toggle").on('click', function(e){
			$('#navbar').toggleClass('active');
			$(this).find('i').toggleClass('icofont-arrow-left').toggleClass('icofont-navigation-menu');
			trapFocusInsiders( $('#navbar') );
	    });
	    $(".emart-navbar-close").on('click', function(e){
			$('#navbar').removeClass('active');
			$(".emart-rd-navbar-toggle").find('i').removeClass('icofont-arrow-left').addClass('icofont-navigation-menu');
	   		$(".emart-rd-navbar-toggle").focus();
	    });	
	  	
	  	
	  	$(window).on('load resize', function() {
			if ( matchMedia( 'only screen and (max-width: 992px)' ).matches ) {
				
				var el = document.querySelector('#navbar');
  				SimpleScrollbar.initEl(el);
			}
		});
		
		$('#masthead .header-icon li > a').keyup(function (e) {
			if ( matchMedia( 'only screen and (min-width: 992px)' ).matches ) {
				$("#masthead .header-icon li").removeClass('focus');
				$("#navbar .navigation-menu li").removeClass('focus');
				$(this).parents('li').addClass('focus');

			}
		});	
		/*=============================================
	    =            search overlay active            =
	    =============================================*/
	    
		$('#secondary .widget li a').keyup(function (e) {
			if ( matchMedia( 'only screen and (min-width: 992px)' ).matches ) {
				$("#secondary .widget li").removeClass('focus');
				$(this).parents('li').addClass('focus');

			}
		});	

		 /*----------------------------------------*/
		/*----------------------------------------*/
			///#home page slider
		/*------------------------------------------*/
		$(".emart-default-slider").owlCarousel({
			navText: [ '<i class="fa fa-long-arrow-right"></i>', '<i class="fa fa-long-arrow-left"></i>' ],
			stagePadding: 0,
			loop: true,
			autoplay: ( $('.emart-default-slider').data('autoplay') == "true" && $('.emart-default-slider').data('autoplay') != "" ) ? 'true' : 'false',
			autoplayTimeout: ( $('.emart-default-slider').data('autoplay_speed') != "" ) ? $('.emart-default-slider').data('autoplay_speed') : 4000,
			margin: 0,
			nav: true,
			dots: true,
			autoplayHoverPause: ( $('.emart-default-slider').data('pause_on_hover') == "true" && $('.emart-default-slider').data('pause_on_hover') != "" ) ? 'true' : 'false',
			smartSpeed: ( $('.emart-default-slider').data('smart_speed') != "" ) ? $('.emart-default-slider').data('smart_speed') : 1000,
			responsive: {
				0: {
					items: 1
				},
				600: {
					items: 1
				},
				1000: {
					items: 1
				}
			}
		});

		/* ============== masonry Grid ============= */
		if( jQuery(".masonry_grid").length){
			jQuery('.masonry_grid').masonry({
			  // set itemSelector so .grid-sizer is not used in layout
			  itemSelector: '.grid-item',
			  // use element for option
			  columnWidth: '.grid-sizer',
			  percentPosition: true
			});
		}
		
		/* ============== Product  Carousel============= */
		
		/* ============== Product  Carousel============= */
		if( $(".emart-product-carousel,.emart-carousel").length){
		
			$(".emart-product-carousel,.emart-carousel").each(function(){
						var $this = $(this);
					
				$($this).owlCarousel({
					navText: [ '<i class="bi bi-arrow-right"></i>', '<i class="bi bi-arrow-left"></i>' ],
					responsiveClass:true,
					//center: true,
					stagePadding: 10,
					margin:15,
					loop: true,
					infinite:true,
					autoplay: ( $this.data('autoplay') == "yes" ) ? true : false,
					autoplayTimeout: ( $this.data('autoplay_speed') != "" ) ? $this.data('autoplay_speed') : 4000,
					
					nav: ( $this.data('slider_nav') == "yes" ) ? true : false,
					dots: ( $this.data('slider_dot') == "yes" ) ? true : false,
					smartSpeed: ( $this.data('smart_speed') != "" ) ? $this.data('smart_speed') : 2500,
					rtl: ( $("body.rtl").length ) ? true : false, 
					autoplayHoverPause: ( $this.data('pause_on_hover') == "yes" ) ? true : false,
					slideBy:( $this.data('md') != "" ) ? $this.data('md') : 4,
					responsive: {
						0: {
							items: ( $this.data('xs') != "" ) ? $this.data('xs') : 1,
						},
						600: {
							items: ( $this.data('sm') != "" ) ? $this.data('sm') : 2,
						},
						1000: {
							items: ( $this.data('md') != "" ) ? $this.data('md') : 4,
						}
					}
				});
			});	
		}
		
		
		
		

			if( $('.fs-product-slider').length ){
			$(".fs-product-slider").each(function(){
					var $this = $(this);
					
					$($this).owlCarousel({
						navText: [ '<i class="bi bi-arrow-right-square"></i>', '<i class="bi bi-arrow-left-square"></i>' ],
						stagePadding: 0,
						loop: true,
						autoplay: ( $this.data('autoplay') == "yes" ) ? true : false,
						autoplayTimeout: ( $this.data('autoplay_speed') != "" ) ? $this.data('autoplay_speed') : 4000,
						margin: 0,
						nav: ( $this.data('slider_nav') == "yes" ) ? true : false,
						dots: ( $this.data('slider_dot') == "yes" ) ? true : false,
						smartSpeed: ( $this.data('smart_speed') != "" ) ? $this.data('smart_speed') : 2500,
						rtl: ( $("body.rtl").length ) ? true : false, 
						autoplayHoverPause: ( $this.data('pause_on_hover') == "yes" ) ? true : false,
						responsive: {
							0: {
								items: 1
							},
							600: {
								items: 1
							},
							1000: {
								items: 1
							}
						}
					});
			 });
		}

		if( $('.gs-tooltip-act').length ){
			$('.gs-tooltip-act').hover(function(){
					// Hover over code
					var title = $(this).attr('title');
					if(title != ""){
					
						$('<span class="gs-tooltip"></span>')
						.text(title)
						//.appendTo('body')
						.appendTo($(this))
						.fadeIn('slow');

					}
					
			}, function() {
				   $('.gs-tooltip').remove();
			});
		}
		if( $('.search-modal').length ){

			$(".search-modal").on('click', function(e){
				$('.search-bar-modal').addClass('active');
				$('#search-bar').find('input.search-field').focus();
				trapFocusInsiders( $("#search-bar") );
		    });

			$(".appw-modal-close-button").on('click', function(e){
				$('.search-bar-modal').removeClass('active');
				$(".search-modal").focus();
		    });
		    
			
		}
		if( $('.login-btn-popup').length ){

			$(".login-btn-popup").on('click', function(e){
				$('.emart-myacount-bar-modal').addClass('active');
				//$('#search-bar').find('input.search-field').focus();
				trapFocusInsiders( $("#emart-myaccount .emart-myacount-modal-inner") );
				
		    });

			$(".emart-myacount-modal-inner .appw-modal-close-button").on('click', function(e){
				$('.emart-myacount-bar-modal').removeClass('active');
				$(".login-btn-popup").focus();
		    });
			
		}
		

	});
})(jQuery);