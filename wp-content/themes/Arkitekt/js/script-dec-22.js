// Load is used to ensure all images have been loaded, impossible with document

jQuery(window).load(function () {



	// Takes the gutter width from the bottom margin of .post

	var gutter = parseInt(jQuery('.post').css('marginBottom'));
	var container = jQuery('#posts');



	// Creates an instance of Masonry on #posts

	var $porjectGrid = container.masonry({
		gutter: gutter,
		itemSelector: '.post',
		columnWidth: '.post'
	});
	
	// This code fires every time a user resizes the screen and only affects .post elements
	// whose parent class isn't .container. Triggers resize first so nothing looks weird.
	
	jQuery(window).bind('resize', function () {
		if (!jQuery('#posts').parent().hasClass('container')) {
			// Resets all widths to 'auto' to sterilize calculations
			post_width = jQuery('.post').width() + gutter;
			jQuery('#posts, body > #grid').css('width', 'auto');
			// Calculates how many .post elements will actually fit per row. Could this code be cleaner?
			posts_per_row = jQuery('#posts').innerWidth() / post_width;
			floor_posts_width = (Math.floor(posts_per_row) * post_width) - gutter;
			ceil_posts_width = (Math.ceil(posts_per_row) * post_width) - gutter;
			posts_width = (ceil_posts_width > jQuery('#posts').innerWidth()) ? floor_posts_width : ceil_posts_width;
			if (posts_width == jQuery('.post').width()) {
				posts_width = '100%';
			}
			// Ensures that all top-level elements have equal width and stay centered
			
			jQuery('#posts, #grid').css('width', posts_width);
			jQuery('#grid').css({'margin': '0 auto'});
		}
	}).trigger('resize');
	
	
if($('.ajax_posts').length){
var $content = $('.ajax_posts_content');
var $loader = $('#more_posts');
var cat = $loader.data('category');
var ppp = 10;
var offset = $('#main').find('.post').length;
 var ajaxurl = $('#adminurl').data("admin_ajax_url");
$loader.on( 'click', load_ajax_posts );
function load_ajax_posts() {
	if (!($loader.hasClass('post_loading_loader') || $loader.hasClass('post_no_more_posts'))) {
		$.ajax({
			type: 'POST',
			dataType: 'html',
			url: screenReaderText.ajaxurl,
			data: {
				'cat': cat,
				'ppp': ppp,
				'offset': offset,
				'action': 'mytheme_more_post_ajax'
			},
			beforeSend : function () {
				$loader.addClass('post_loading_loader').html('');
			},
			success: function (data) {
				var $data = data;
				var jsonData = JSON.parse(data);
				if (jsonData.status == 'success') {
					var $redspondiv =  new Array();
					for(i=0;i<jsonData.datas.length;i++){
						var tempdat = getItemElement(jsonData.datas[i]);
						$redspondiv.push(tempdat);
					
					}
					var $appengrid = $($redspondiv);
					
					$porjectGrid.append( $appengrid ).masonry( 'appended', $appengrid );

					$loader.removeClass('post_loading_loader').html('<a class="loadmore navigation" href="javascript:;">Load flere</a>');
				} else {
					$loader.removeClass('post_loading_loader').addClass('post_no_more_posts').html('No Posts');
				}
			},
			error : function (jqXHR, textStatus, errorThrown) {
				$loader.html($.parseJSON(jqXHR.responseText) + ' :: ' + textStatus + ' :: ' + errorThrown);
				console.log(jqXHR);
			},
		});
	}
	offset += ppp;
	return false;
}

}

	
	
	
	
	var gutter = parseInt(jQuery('.post2').css('marginBottom'));
	var container = jQuery('#posts2');
	// Creates an instance of Masonry on #posts
	container.masonry({
		gutter: gutter,
		itemSelector: '.post2',
		columnWidth: '.post2'
	});
	
	// This code fires every time a user resizes the screen and only affects .post elements
	// whose parent class isn't .container. Triggers resize first so nothing looks weird.
	jQuery(window).bind('resize', function () {
		if (!jQuery('#posts2').parent().hasClass('container')) {
			// Resets all widths to 'auto' to sterilize calculations
			post_width = jQuery('.post2').width() + gutter;
			jQuery('#posts2, body > #grid2').css('width', 'auto');

			// Calculates how many .post elements will actually fit per row. Could this code be cleaner?
			posts_per_row = jQuery('#posts2').innerWidth() / post_width;
			floor_posts_width = (Math.floor(posts_per_row) * post_width) - gutter;
			ceil_posts_width = (Math.ceil(posts_per_row) * post_width) - gutter;
			posts_width = (ceil_posts_width > jQuery('#posts2').innerWidth()) ? floor_posts_width : ceil_posts_width;
			if (posts_width == jQuery('.post2').width()) {
				posts_width = '100%';
			}
			
			// Ensures that all top-level elements have equal width and stay centered
			jQuery('#posts2, #grid2').css('width', posts_width);
			jQuery('#grid2').css({'margin': '0 auto'});
		}
	}).trigger('resize');
	
		// Takes the gutter width from the bottom margin of .post

/*	var gutter = parseInt(jQuery('.con_col4').css('marginBottom'));
	var container = jQuery('#contact_row');
	// Creates an instance of Masonry on #posts
	container.masonry({
		gutter: gutter,
		itemSelector: '.con_col4',
		columnWidth: '.con_col4'
	});
	// This code fires every time a user resizes the screen and only affects .post elements
	// whose parent class isn't .container. Triggers resize first so nothing looks weird.
	jQuery(window).bind('resize', function () {
		if (!jQuery('#contact_row').parent().hasClass('container')) {
			
			
			
			// Resets all widths to 'auto' to sterilize calculations
			
			post_width = jQuery('.con_col4').width() + gutter;
			jQuery('#contact_row, body > #contact_grid').css('width', 'auto');
			
			
			
			// Calculates how many .post elements will actually fit per row. Could this code be cleaner?
			
			posts_per_row = jQuery('#contact_row').innerWidth() / post_width;
			floor_posts_width = (Math.floor(posts_per_row) * post_width) - gutter;
			ceil_posts_width = (Math.ceil(posts_per_row) * post_width) - gutter;
			posts_width = (ceil_posts_width > jQuery('#contact_row').innerWidth()) ? floor_posts_width : ceil_posts_width;
			if (posts_width == jQuery('.con_col4').width()) {
				posts_width = '100%';
			}
			
			
			
			// Ensures that all top-level elements have equal width and stay centered
			
			jQuery('#contact_row, #contact_grid').css('width', posts_width);
			jQuery('#contact_grid').css({'margin': '0 auto'});
        		
		
		
		}
	}).trigger('resize');*/
	

});

// create <div class="grid-item"></div>
function getItemElement(elementdata) {
	var elem = document.createElement('div');
		elem.className = 'post';

	var div_1 = $('<div class="case-inner"></div>');
		div_1.appendTo(elem);

	var img = $('<img id="dynamic">'); //Equivalent: $(document.createElement('img'))
		img.attr('src', elementdata.imageurl);
		img.appendTo(div_1);

	var div_2 = $('<div class="cases"></div>');
		div_2.appendTo(div_1);

	var div_3 = $('<div class="cases_table"></div>');
		div_3.appendTo(div_2);

	var div_4 = $('<div class="cases_td"></div>');
		div_4.appendTo(div_3);

	var div_5 = $('<div class="cases_text_inner"></div>');
		div_5.appendTo(div_4);

	var head = $('<h2>'+elementdata.title+'</h2>');
		head.appendTo(div_5);

	var ahref = $('<a href="'+elementdata.url+'" class="button-with-arrow">læs mere</a>');
		ahref.appendTo(div_5);
	if(elementdata.location){

	var location = $('<h6>'+elementdata.location+'</h6>');
		location.appendTo(div_5);
	}

 return elem;
}


function getItemElement1() {
  var elem = document.createElement('div');
  elem.className = 'post';
  var img = $('<img id="dynamic">'); //Equivalent: $(document.createElement('img'))
img.attr('src', 'http://ldsstage.in/arkitekter/wp-content/uploads/2016/12/I2Q8112-Edit.jpg');
img.appendTo(elem);
  return elem;
}