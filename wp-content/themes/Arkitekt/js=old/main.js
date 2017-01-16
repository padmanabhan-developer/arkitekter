 $(window).scroll(function() {  
  
    var scroll = $(window).scrollTop(); 
	
  if (scroll >= 10) {
    $('header').addClass("sticky");
	$('#searchicon').hide();
	$('#searchiconsticky').show();
	$('.header_inner').removeClass("homepagemenu");
  } else{
    $('header').removeClass("sticky");
	$('#searchiconsticky').hide();
	$('#searchicon').show();
	$('.header_inner').addClass("homepagemenu");
  }
  if (scroll >= 10) {
    $('.navbar').addClass("show");
  } else{
    $('.navbar').removeClass("show");
  }
  
  /*if (scroll >= 50) {
    $('.toBottom').fadeIn();
  } else{
    $('.toBottom').fadeOut();
  }*/
  
});
//$(".dropdown-content").hide();
//
//$(".menu_brand, .dropdown").mouseover(function () {
//    $(".dropdown-content").slideDown('slow');
//});
//
//$(".dropdown, .menu_brand").mouseleave(function () {
//    $(".dropdown-content").slideUp('slow');
//});
//----- search
$(document).ready(function() {
  
    $('.toBottom').fadeIn();
   
   $('.header-search .search-btn').after('<div class="overlay-btn"></div>');
   
   
      $('.header-search .search-input').click(function(e){
	   e.stopPropagation();
	  $('.main_nav .header-search').addClass('select-input');
   });
    $(document).click(function(){
	    $('.main_nav .header-search').removeClass('select-input');
	   });
	   $('.perspetives-popup.inline').click(function(){
		   $('body').addClass('open-popup');
		   });
	   
   $('.see_more').click(function(){
	   $('.kontact-wrap').toggle('slow');
   });
   
   $('.dropdown-content .close').click(function(){
	   $('.dropdown-content').hide();
	   });
	   
	   $('.menu_brand').hover(function(){
		   $(this).find('.dropdown-content').show();
		   },function(){
		    $(this).find('.dropdown-content').hide();
		   });
   
  
});
$(document).ready(function(){
     $('section[data-type="parallax_section"]').each(function(){
	   var $bgobj = $(this); // Variable para asignacion de objeto
	   $(window).scroll(function() {
	   $window = $(window);
	 var yPos = -($window.scrollTop() / $bgobj.data('speed'));
	 // cordinadas del background
	 var coords = '50% '+ yPos + 'px';
	 // moviendo el background
	 $bgobj.css({ backgroundPosition: coords });
	});
  });
 
  /*$('.our-col a.learn_more_our').on('click', function() {
	  	event.preventDefault();
 		$(this).parent().siblings('.slideboxcontent').slideToggle(300);
 // end click
});  */
	 $('.topbox a.learn_more_our,.text_popup a.learn_more,.text_popup2 a.learn_more').on('click', function(event) {
		 event.preventDefault();
		//alert($(this).text());
		if ($(this).text() == "læs mere")
       		{$(this).text("læs mindre");}
		else
       		{$(this).text("læs mere");}
 		$(this).parent().siblings('.text-content,.text_content_popup').toggleClass('full');
 // end click
});  
 $('.accordion-row .accordion-head').on('click', function() {
		//$('.accordion-row').removeClass('open');
		$(this).next('div').slideToggle(300);
		$(this).parent().toggleClass('open');
		$(this).parent().siblings().removeClass('open');
        $(this).parent().siblings().children().next().slideUp();
		return false;
} 
);  
  $('.header-search .overlay-btn').click(function(e){
	   e.stopPropagation();
	  $('.main_nav .header-search').toggleClass('select-input');
   });
$('body').prepend('<div class="mobile-menu"></div>');
$('.dropdown-content').clone().appendTo('.mobile-menu');
$('.mobile-menu .dropdown-content').removeClass('dropdown-content').addClass('responsive_menu');
$('.mobile-menu .header-search').removeClass('header-search').addClass('menu-search');
$(".mobile-menu .close").remove();
$(".main-header").prepend('<div class="mobile-nav"><span>&nbsp;</span><span>&nbsp;</span><span>&nbsp;</span></div>');
$( ".menu-search" ).after( '<div class="fronts"><div class=" drop_header"><h1><a href="http://ldsstage.in/leadagency/">Home</a></h1></div></div>' );
$('.mobile-nav').click(function(){
$('.mobile-menu').toggleClass('show');
	if($('.mobile-menu').hasClass('show')){
		$('.overview').show().addClass('overview-show');
	}else{
		$('.overview').hide().removeClass('overview-show');
	}
	});
 
  	$('.section_subtitle a').click(function( ){
	$(this).parent().addClass('active').siblings().removeClass('active');
 
 	var tab = $(this).attr('href');
		$('.cases_content').not(tab).hide();
		$(tab).show();
		});
});
// Parallaxing + add class active on scroll
$(document).scroll(function () {
  
  // parallaxing
  var $movebg = $(window).scrollTop() * -0.3;
  $('.parallax-bg-inner').css('background-positionY', ($movebg) + 'px');
});
//----- popup
$(function() {
	//----- OPEN
	$('[data-popup-open]').on('click', function(e)  {
		var targeted_popup_class = jQuery(this).attr('data-popup-open');
		$('[data-popup="' + targeted_popup_class + '"],.overview').fadeIn(350);
 		e.preventDefault();
	});
	//----- CLOSE
	$('[data-popup-close]').on('click', function(e)  {
		var targeted_popup_class = jQuery(this).attr('data-popup-close');
		$('[data-popup="' + targeted_popup_class + '"],.overview').fadeOut(350);
		e.preventDefault();
	});
$('body').after('<div class="overview"></div>');
$('.overview').click(function(){
	$('.client_popup,.overview').fadeOut(350);
$('.mobile-menu').removeClass('show');
	});
});
  $('#buzz_blogs').pinterest_grid({
                no_columns: 2,
                padding_x:77,
                padding_y:55,
				margin_bottom:250,
                single_column_breakpoint: 700
            });
   
   
  
			
			
/*$(document).ready(function() {
	$(".various").fancybox({
		maxWidth	: 800,
		maxHeight	: 600,
		fitToView	: false,
		width		: '70%',
		height		: '70%',
		autoSize	: false,
		closeClick	: false,
		openEffect	: 'none',
		closeEffect	: 'none'
	});
 
});*/
     
	 
   // case filter
	$(window).load(function(){'use strict';
		var $case_selectors = $('.case-filter >li>a');
		var $case = $('.case-items');
		$case.isotope({
			itemSelector : '.case-item',
		});
		var $home_case = $('.home_cases');
		$home_case.isotope({
			itemSelector : '.home_case',
			percentPosition: true,
			  masonry: {
				// set to the element
				columnWidth: '.grid_home_case'
			  }
		});

		var $casepage_case = $('#casespage_newcases');
		$casepage_case.isotope({
			itemSelector : '.client_popup_box',
		});
		
		$case_selectors.on('click', function(){
			$case_selectors.removeClass('active');
			$(this).addClass('active');
			var selector = $(this).attr('data-filter');
			$case.isotope({ filter: selector });
			return false;
		});
  
    $('.col-two').pinterest_grid({
                no_columns: 2,
                padding_x:20,
                padding_y:20,
				margin_bottom:100,
			   single_column_breakpoint: 700
            });
    $('.col-one').pinterest_grid({
                no_columns: 2,
                padding_x:20,
                padding_y:20,
				margin_bottom:100,
			   single_column_breakpoint: 700
            });
  	
 	$('div.col-one > div.case_box').show();
	$('div.col-two > div.case_box').show();
	$('#perspective_search_section').show();
	});
 
$(document).ready(function(e) {
$('ul#menu-header-menu li a').addClass('scroll');
$('ul#menu-header-menu').addClass('main-menu');
    jQuery(function(e) {
        "use strict";
        function n() {
            var n = [],
                o = [],
                t = e(window).scrollTop(),
                i = 200;
            e(".main-menu").find(".scroll").each(function() {
				//e(".scroll").addClass(e(e(this).attr("href")).offset().top);
				//$(this).addClass(Math.round(e(e(this).attr("href")).offset().top + e(e(this).attr("href")).height()));
				//alert(e(e(this).attr("href")).offset().top + e(e(this).attr("href")).height());
                n.push(e(e(this).attr("href")).offset().top), o.push(e(e(this).attr("href")).offset().top + e(e(this).attr("href")).height())
            }), e.each(n, function(o) {
                t > n[o] - i && e(".scroll").removeClass("active").eq(o).addClass("active")
            })
        }
        e(window).scroll(function(e) {
            n()
        }), e(".scroll").on("click", function() {
			var stickytop = 101;
			if($(this).attr('href') == '#come-on-in')
			stickytop = 101;
			//alert(stickytop);
            return e("html, body").animate({
                scrollTop: e(this.hash).offset().top - stickytop
            }), !1
        })
    })
})
 
 $('a[href^="#"]').on('click', function(event) {
    var target = $(this.getAttribute('href'));
	var scrollt=0;
    if($(this).hasClass( "filter_cases" )) {return false;}
	if($(this).hasClass( "inline" )) {
		
		var scrollt = 0;
		if( target.length ) {
			event.preventDefault();
			$('html, body').stop().animate({
				scrollTop: target.offset().top - scrollt
			}, 1000);
		 }}
	else {var scrollt = 101;
	if( target.length ) {
        event.preventDefault();
        $('html, body').stop().animate({
            scrollTop: target.offset().top - scrollt
        }, 1000);
     }}
});
