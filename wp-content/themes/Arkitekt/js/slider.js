$(document).ready(function () {
    $('a.showsorter').click(function () {
	$(this).toggleClass('menu_class menu_classactive')
	$('.the_menu').slideToggle('medium');
    });
});

$(document).ready(function () {
    $('a.showfilter').click(function () {
	$(this).toggleClass('menu_class2 menu_classactive')
	$('.the_menu2').slideToggle('medium');
    });
});

$(document).ready(function () {
    $('a.menu_class3').click(function () {
		
	if($(this).hasClass('active_search')){}
	else{
		$('div.submenu_section').slideUp();
		$('.submenu_section').removeClass('yesactive');
		$('div#showmenudiv').slideUp();
		$('#menu > li').removeClass('active');	
	}

	$(this).toggleClass('active_search');
	$('.the_menu3').slideToggle('medium');
    });
});