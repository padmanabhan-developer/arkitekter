jQuery(window).load(function () {

	var ajax_url = screenReaderTextser.ajaxurl;
	// Takes the gutter width from the bottom margin of .post
	var gutter = parseInt(jQuery('.post').css('marginBottom'));
	var container = jQuery('#posts');
	// Creates an instance of Masonry on #posts
	/*var $projectGrid = container.masonry({
		gutter: gutter,
		itemSelector: '.post',
		columnWidth: '.post'
	});
	var masonryOptions = {
		gutter: gutter,
		itemSelector: '.post',
		columnWidth: '.post'
	};*/
	
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
		var ppp = 4;
		$loader.on( 'click', load_ajax_posts );
		
		function load_ajax_posts() {
		var cat = $('#include_filter_proj').val();
		var type = $('#include_type').val();
		var viewtype = $('#view_type').val();
		var sort_type = $('#include_sort_proj').val();
		if(viewtype== 'list')
			var offset = $('#list_view tr.projectrow').length;
		else
			var offset = $('.post').length;
		//alert(cat);
			if (!($loader.hasClass('post_loading_loader') || $loader.hasClass('post_no_more_posts'))) {
				$.ajax({
					type: 'POST',
					dataType: 'html',
					url: screenReaderText.ajaxurl,
					data: {
						'state_id': cat,
						'ppp': 12,
						'offset': offset,
						'type' : type,
						'viewtype':viewtype,
						'sort_type':sort_type,
						'action': 'mytheme_more_post_ajax'
					},
					beforeSend : function () {
						$loader.addClass('post_loading_loader').html('<a href="javascript:;" style="text-decoration:none;" class="ajaxloader" >Loading</a>');
						
					},
					success: function (data) {
						if(viewtype == 'list'){
							var $data = data;
							var jsonData = JSON.parse(data);
							if (jsonData.status == 'success') {
								var $redspondiv =  new Array();
								for(i=0;i<jsonData.datas.length;i++){
									var tempdat = getItemElementTd(jsonData.datas[i]);
									//$redspondiv.push(tempdat);
									$('#listTable').append(tempdat);
								}
								setTimeout(function(){
									$loader.removeClass('post_loading_loader').html('<a class="loadmore navigation" href="javascript:;">Load flere</a>')},1500);

							}
							else {
								$loader.removeClass('post_loading_loader').addClass('post_no_more_posts').html('No Posts');
							}
						}
						else{
							var $data = data;
							var jsonData = JSON.parse(data);
							if (jsonData.status == 'success') {
								var $redspondiv =  new Array();
								for(i=0;i<jsonData.datas.length;i++){
									var tempdat = getItemElement(jsonData.datas[i]);
									$redspondiv.push(tempdat);
								}
								var $appengrid = $($redspondiv);
								setTimeout(function(){$projectGrid.append( $appengrid ).masonry( 'appended', $appengrid, true );},2500);
								setTimeout(function(){
									$loader.removeClass('post_loading_loader').html('<a class="loadmore navigation" href="javascript:;">Load flere</a>')},2500);
							} 
							else {
								$loader.removeClass('post_loading_loader').addClass('post_no_more_posts').html('No Posts');
							}
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
	
	
		$( ".cl_project" ).click(function() {
			var $loader = $('#more_posts');
			var state_id=$(this).attr('cid');
			$('#include_filter_proj').val(state_id);
			$('#include_type').val('filter');
			var viewtype = $('#view_type').val();
			var sorttype = $('#include_sort_proj').val();
			$loader.removeClass('post_no_more_posts');
			$(this).addClass('active').siblings().removeClass('active');
			$.ajax({
				url: screenReaderText.ajaxurl,
				type:'POST',
				data:{state_id:state_id,type:'filter',sort_type:sorttype,viewtype:viewtype,action:'auto_pr'},
				beforeSend : function () {
					$('.service_signle_row').html('');
					 var obj = $('.post'); // item is the product id# but also the div id#
					$projectGrid.masonry('remove',obj);
					$projectGrid.masonry('reloadItems');
					$projectGrid.masonry('layout');
					$('#posts').height('0');
					$content.html('');
					$('#list_view').html('');
					$loader.addClass('post_loading_loader').html('<a href="javascript:;" style="text-decoration:none;" class="ajaxloader" >Loading</a>');
				},
				success:function(data1){
					if(viewtype=='list'){
						$('#list_view').append(data1);
					}else{
						$('#posts').hide();
						$('#projectlistdiv').html(data1);
						setTimeout(function(){
							$('#posts').show();
							$projectGrid.masonry('reloadItems');  
							$projectGrid.masonry('layout');
						},2500);
					}
					setTimeout(function(){
						$loader.removeClass('post_loading_loader').html('<a class="loadmore navigation" href="javascript:;">Load flere</a>')},2500);
				},
				error : function (jqXHR, textStatus, errorThrown) {
					$loader.html($.parseJSON(jqXHR.responseText) + ' :: ' + textStatus + ' :: ' + errorThrown);
					console.log(jqXHR);
				},
			});
		});

		$( ".sort_project" ).click(function() {
			var $loader = $('#more_posts');
			var sort_type=$(this).attr('sort');
			var viewtype = $('#view_type').val();
			var state_id= $('#include_filter_proj').val();
			$('#include_sort_proj').val(sort_type);
			$('#include_type').val('sort');
			$loader.removeClass('post_no_more_posts');
			$(this).addClass('active').siblings().removeClass('active');
			$.ajax({
				url: screenReaderText.ajaxurl,
				type:'POST',
				data:{state_id:state_id,type:'sort',sort_type:sort_type,viewtype:viewtype,action:'auto_pr'},
				beforeSend : function () {
					$('.service_signle_row').html('');
					 var obj = $('.post'); // item is the product id# but also the div id#
					$projectGrid.masonry('remove',obj);
					$projectGrid.masonry('reloadItems');
					$projectGrid.masonry('layout');
					$('#posts').height('0');
					$content.html('');
					$('#list_view').html('');
					$loader.addClass('post_loading_loader').html('<a href="javascript:;" style="text-decoration:none;" class="ajaxloader" >Loading</a>');
				},
				success:function(data1){
					if(viewtype=='list'){
						$('#list_view').append(data1);
					}else{
						$('#posts').hide();
						$('#posts').append(data1);
						setTimeout(function(){
							$('#posts').show();
							$projectGrid.masonry('reloadItems');  
							$projectGrid.masonry('layout');
						},2500);
					}
					setTimeout(function(){
						$loader.removeClass('post_loading_loader').html('<a class="loadmore navigation" href="javascript:;">Load flere</a>')},2500);
				},
				error : function (jqXHR, textStatus, errorThrown) {
					$loader.html($.parseJSON(jqXHR.responseText) + ' :: ' + textStatus + ' :: ' + errorThrown);
					console.log(jqXHR);
				},
			});
		});
		
		$( ".change_view" ).click(function() {
			var $loader = $('#more_posts');
			var state_id= $('#include_filter_proj').val();
			var sort_type= $('#include_sort_proj').val();
			var viewtype=$(this).attr('viewtype');
			$('#view_type').val(viewtype);
			$loader.removeClass('post_no_more_posts');
			$(this).addClass('active').siblings().removeClass('active');
			$('.sort_project').removeClass('active');
			$.ajax({
				url: screenReaderText.ajaxurl,
				type:'POST',
				data:{state_id:state_id,type:'sort',sort_type:sort_type,viewtype:viewtype,action:'auto_pr'},
				beforeSend : function () {
					$('.service_signle_row').html('');
					 var obj = $('.post'); // item is the product id# but also the div id#
					$projectGrid.masonry('remove',obj);
					$projectGrid.masonry('reloadItems');
					$projectGrid.masonry('layout');
					$('#posts').height('0');
					$content.html('');
					$('#list_view').html('');
					$loader.addClass('post_loading_loader').html('<a href="javascript:;" style="text-decoration:none;" class="ajaxloader" >Loading</a>');
				},
				success:function(data1){
					//$('#posts').append(data1);
					if(viewtype=='list'){
						$('#list_view').append(data1);
					}else{
						$('#posts').hide();
						$('#posts').append(data1);
						setTimeout(function(){
							$('#posts').show();
							$projectGrid.masonry('reloadItems');  
							$projectGrid.masonry('layout');
						},2500);
					}
					setTimeout(function(){
						$loader.removeClass('post_loading_loader').html('<a class="loadmore navigation" href="javascript:;">Load flere</a>')},2500);
				},
				error : function (jqXHR, textStatus, errorThrown) {
					$loader.html($.parseJSON(jqXHR.responseText) + ' :: ' + textStatus + ' :: ' + errorThrown);
					console.log(jqXHR);
				},
			});
		});

	}
		
	if($('.ajax_news').length){
	var $content = $('.ajax_posts_news');
	var $loader = $('#more_news');
	var cat = $loader.data('category');
	var ppp = 4;
	var offset = $('#main').find('.ncol3').length;
	$loader.on( 'click', load_ajax_news );
	function load_ajax_news() {
		if (!($loader.hasClass('post_loading_loader') || $loader.hasClass('post_no_more_posts'))) {
			$.ajax({
				type: 'POST',
				dataType: 'html',
				url: screenReaderText.ajaxurl,
				data: {
					'cat': cat,
					'ppp': ppp,
					'offset': offset,
					'action': 'mytheme_more_news_ajax'
				},
				beforeSend : function () {
					$loader.addClass('post_loading_loader').html('<a href="javascript:;" style="text-decoration:none;" class="ajaxloader" >Loading</a>');
					
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
						
						setTimeout(function(){
							$projectGrid.append( $appengrid ).masonry( 'appended', $appengrid, true );
							},2000);
	
						setTimeout(function(){
							$loader.removeClass('post_loading_loader').html('<a class="loadmore navigation" href="javascript:;">Load flere</a>')},2000);
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

	if($('.ajax_posts_cases').length){
	var $content = $('.ajax_posts_cases');
	var $loader = $('#more_cases');
	var cat = $loader.data('category');
	var ppp = 4;
	var offset = $('#main').find('.ncol3').length;
	$loader.on( 'click', load_ajax_case );
	
	function load_ajax_case() {
		if (!($loader.hasClass('post_loading_loader_case') || $loader.hasClass('post_no_more_case'))) {
			$.ajax({
				type: 'POST',
				dataType: 'html',
				url: screenReaderText.ajaxurl,
				data: {
					'cat': cat,
					'ppp': ppp,
					'offset': offset,
					'action': 'mytheme_more_case_ajax'
				},
				beforeSend : function () {
					$loader.addClass('post_loading_loader').html('<a href="javascript:;" style="text-decoration:none;" class="ajaxloader" >Loading</a>');
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
						setTimeout(function(){
							$projectGrid.append( $appengrid ).masonry( 'appended', $appengrid, true );
						},2000);
						setTimeout(function(){
							$loader.removeClass('post_loading_loader').html('<a class="loadmore navigation" href="javascript:;">Load flere</a>');
						},2000);
					} 
					else {
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

	// create <div class="grid-item"></div>
	function getItemElemenwwwwt(elementdata) {
		var elem = document.createElement('div');
			elem.className = 'post';
	
		var div_1 = $('<div class="case-inner"></div>');
			div_1.appendTo(elem);
	
		var img = $('<img id="dynamic">'); //Equivalent: $(document.createElement('img'))
			img.attr('src', elementdata.imageurl);
			img.attr('width', '206');
			img.attr('width', '150');
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
	function getItemElement(elementdata) {
		var elem = document.createElement('div');
			elem.className = 'post';
	
		var div_1 = $('<div class="case-inner"></div>');
			div_1.appendTo(elem);
	
		var img = $('<img id="dynamic">'); //Equivalent: $(document.createElement('img'))
			img.attr('src', elementdata.imageurl);
			//img.attr('src', 'http://ldsstage.in/arkitekter/wp-content/themes/Arkitekt/images/default-project.jpg');
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
	function getItemElementTd(elementdata) {
		var tr = $('<tr class="projectrow" data-projid="'+elementdata.postid+'"><td class="project_list_date">'+elementdata.addeddate+'</td><td class="project_list_title"><a class="td_link" href="'+elementdata.url+'">'+elementdata.title+'</a></td><td  class="project_list_location">'+elementdata.location+'</td></tr>');
		return tr;
	}
	function getItemElementTdService(elementdata) {
		var tr = $('<tr class="serviceprojectrow" data-projid="'+elementdata.postid+'"><td class="project_list_date">'+elementdata.addeddate+'</td><td class="project_list_title"><a class="td_link" href="'+elementdata.url+'">'+elementdata.title+'</a></td><td class="project_list_location">'+elementdata.location+'</td></tr>');
		return tr;
	}


	function reload_mansory(){
		var gutter = parseInt(jQuery('.post').css('marginBottom'));
		var container = jQuery('#posts');
		var $projectGrid = container.masonry({
			gutter: gutter,
			itemSelector: '.post',
			columnWidth: '.post'
		});
	}

	if($('.ajax_services').length){
		$( ".cl_services" ).click(function() {
			var $loader = $('#more_services');
			$loader.removeClass('post_no_more_posts');

			var state_id=$(this).attr('cid');
			$('#include_filter').val(state_id);
			var postid=$(this).data('postid');
			$('#postid').val(postid);
			var taxslug=$(this).data('taxslug');
			$(this).addClass('active').siblings().removeClass('active');
			//alert(state_id);
			var viewtype=$('#view_type').val();
			var sorttype=$('#include_sort').val();
			var container = $('#posts');
			
			$.ajax({
				url:ajax_url,
				type:'POST',
				data:{state_id:state_id,postid:postid,sort_type:sorttype,viewtype:viewtype,taxslug:taxslug,type:'filter',action:'auto_searchservice'},
				beforeSend : function () {
					$(".service_signle_row").html('');
					$("#list_view_service").html('');
					var obj = $('.post'); // item is the product id# but also the div id#
					$projectGrid.masonry('remove',obj);
					$projectGrid.masonry('reloadItems');
					$projectGrid.masonry('layout');
					$('#posts').height('0');
					$loader.addClass('post_loading_loader').html('<a href="javascript:;" style="text-decoration:none;" class="ajaxloader" >Loading</a>');

				},
				success:function(result){
					if(result==1){
						$loader.removeClass('post_loading_loader').addClass('post_no_more_posts').html('No Posts');
					}
					else{
						if(viewtype == 'list'){
							$("#list_view_service").html('<table width="100%" border="0" cellspacing="0" cellpadding="0" id="list_service_table"><tbody><tr><td><h3>Dato</h3></td><td><h3>Titel</h3></td><td><h3>Lokation</h3></td></tr></tbody></table>');
							$("table#list_service_table tbody").append(result);
						}
						else{
							$("#posts").hide();
							$("#posts").html(result);
								setTimeout(function(){
									$("#posts").show();
									$projectGrid.masonry('reloadItems');  
									$projectGrid.masonry('layout');
								},2500);
						}
						setTimeout(function(){
						$loader.removeClass('post_loading_loader').html('<a class="loadmore navigation" href="javascript:;">Load flere</a>')},2500);
					}

				},
			});
		});

		$( ".sort_services" ).click(function() {
			var $loader = $('#more_services');
			$loader.removeClass('post_no_more_services');
			var sorttype= $(this).attr('sort');
			$('#include_sort').val(sorttype);
			var state_id=$('#include_filter').val();
			var viewtype=$('#view_type').val();
			var postid=$('#postid').val();
			$(this).addClass('active').siblings().removeClass('active');
			//alert(state_id);
			var container = $('#posts');
			
			$.ajax({
				url:ajax_url,
				type:'POST',
				data:{state_id:state_id,postid:postid,sort_type:sorttype,viewtype:viewtype,type:'sort',action:'auto_searchservice'},
				beforeSend : function () {
					$(".service_signle_row").html('');
					$("#list_view_service").html('');
					var obj = $('.post'); // item is the product id# but also the div id#
					$projectGrid.masonry('remove',obj);
					$projectGrid.masonry('reloadItems');
					$projectGrid.masonry('layout');
					$('#posts').height('0');
					$loader.addClass('post_loading_loader').html('<a href="javascript:;" style="text-decoration:none;" class="ajaxloader" >Loading</a>');

				},
				success:function(result){
					if(result==1){
						$loader.removeClass('post_loading_loader').addClass('post_no_more_services').html('No Posts');
					}
					else{
						if(viewtype == 'list'){
							$("#list_view_service").html('<table width="100%" border="0" cellspacing="0" cellpadding="0" id="list_service_table"><tbody><tr><td><h3>Dato</h3></td><td><h3>Titel</h3></td><td><h3>Lokation</h3></td></tr></tbody></table>');
							$("table#list_service_table tbody").append(result);
						}
						else{
							$("#posts").hide();
							$("#posts").html(result);
							setTimeout(function(){
								$("#posts").show();
								$projectGrid.masonry('reloadItems');  
								$projectGrid.masonry('layout');
							},2500);
						}
						setTimeout(function(){
						$loader.removeClass('post_loading_loader').html('<a class="loadmore navigation" href="javascript:;">Load flere</a>')},2500);
					}
				},
			});
		});
		$( ".change_view_services" ).click(function() {
			var $loader = $('#more_services');
			var container = $('#posts');
			$loader.removeClass('post_no_more_services');

			var viewtype = $(this).attr('viewtype');
			$('#view_type').val(viewtype);
			var state_id= $('#include_filter').val();
			var postid= $('#postid').val();
			var sorttype= $('#include_sort').val();
			$(this).addClass('active').siblings().removeClass('active');
			//alert(state_id);
			
			$.ajax({
				url:ajax_url,
				type:'POST',
				data:{state_id:state_id,postid:postid,sort_type:sorttype,viewtype:viewtype,action:'auto_searchservice'},
				beforeSend : function () {
					$(".service_signle_row").html('');
					$("#list_view_service").html('');
					var obj = $('.post'); // item is the product id# but also the div id#
					$projectGrid.masonry('remove',obj);
					$projectGrid.masonry('reloadItems');
					$projectGrid.masonry('layout');
					$('#posts').height('0');
					$loader.addClass('post_loading_loader').html('<a href="javascript:;" style="text-decoration:none;" class="ajaxloader" >Loading</a>');

				},
				success:function(result){
						if(viewtype == 'list'){
							$("#list_view_service").html('<table width="100%" border="0" cellspacing="0" cellpadding="0" id="list_service_table"><tbody><tr><td><h3>Dato</h3></td><td><h3>Titel</h3></td><td><h3>Lokation</h3></td></tr></tbody></table>');
							$("table#list_service_table tbody").append(result);
						}
						else{
							$("#posts").hide();
							$("#posts").html(result);
							setTimeout(function(){
								$("#posts").show();
								$projectGrid.masonry('reloadItems');  
								$projectGrid.masonry('layout');
							},2500);
						}
						setTimeout(function(){
						$loader.removeClass('post_loading_loader').html('<a class="loadmore navigation" href="javascript:;">Load flere</a>')},2500);
					},
			});
		});
	
		
		var $content = $('.ajax_service_content');
		var $loader = $('#more_services');
		var ppp = 4;
		var offset_pre =0;
		$loader.on( 'click', load_ajax_service );

		function load_ajax_service() {
			var cat = $('#include_filter').val();
			var sorttype= $('#include_sort').val();
			var viewtype=$('#view_type').val();
			if(viewtype == 'grid'){
				if($('.postbig').length){
					offset_pre =  $('.postbig').length;
				}
				var offsetpost = $('.post').length;
				var offset = offsetpost + offset_pre;
			}else{
				var offset = $('#list_view_service tr.serviceprojectrow').length;
			}
		
			if (!($loader.hasClass('service_loading_loader') || $loader.hasClass('post_no_more_services'))) {
				$.ajax({
					type: 'POST',
					dataType: 'html',
					url: screenReaderTextser.ajaxurl,
					data: {
						'cat': cat,
						'ppp': ppp,
						'offset': offset,
						'state_id':cat,
						'sort_type':sorttype,
						'viewtype':viewtype,
						'postid':$('#postid').val(),
						'action': 'more_service_ajax',
					},
					beforeSend : function () {
						$loader.addClass('service_loading_loader').html('<a href="javascript:;" style="text-decoration:none;" class="ajaxloader" >Loading</a>');
						
					},
					success: function (data) {
						
						if(viewtype=='list'){
							var $data = data;
							var jsonData = JSON.parse(data);
								if (jsonData.status == 'success') {
									if(jsonData.datas.length){
										var $redspondiv =  new Array();
										for(i=0;i<jsonData.datas.length;i++){
											var tempdat = getItemElementTdService(jsonData.datas[i]);
											$('#list_service_table').append(tempdat);
										
										}
										setTimeout(function(){
											$loader.removeClass('service_loading_loader').html('<a class="loadmore navigation" href="javascript:;">Load flere</a>');
										},2500);
									}
									else{
										$loader.removeClass('service_loading_loader').addClass('post_no_more_services').html('No Posts');
									}
								} 
								else {
									$loader.removeClass('service_loading_loader').addClass('post_no_more_services').html('No Posts');
								}
						}
						else{						
							var $data = data;
							var jsonData = JSON.parse(data);
							if (jsonData.status == 'success') {
								if(jsonData.datas.length){
									var $redspondiv =  new Array();
									for(i=0;i<jsonData.datas.length;i++){
										var tempdat = getItemElement(jsonData.datas[i]);
										$redspondiv.push(tempdat);
									
									}
									var $appengrid = $($redspondiv);
									setTimeout(function(){
										$projectGrid.append( $appengrid ).masonry( 'appended', $appengrid, true );
									},2500);
									setTimeout(function(){
										$loader.removeClass('service_loading_loader').html('<a class="loadmore navigation" href="javascript:;">Load flere</a>');
									},2500);
								}
								else{
									$loader.removeClass('service_loading_loader').addClass('post_no_more_services').html('No Posts');
								}
							} 
							else {
								$loader.removeClass('service_loading_loader').addClass('post_no_more_services').html('No Posts');
							}
						}
					},
					error : function (jqXHR, textStatus, errorThrown) {
						$loader.html($.parseJSON(jqXHR.responseText) + ' :: ' + textStatus + ' :: ' + errorThrown);
						console.log(jqXHR);
					},
				});
			}
			return false;
		}
	
	}
	
	var gutter1 = parseInt(jQuery('.gallery').css('marginBottom'));
	var container1 = jQuery('#gallery_2');
	// Creates an instance of Masonry on #posts
	var $projectGrid1 = container1.masonry({
		gutter: gutter1,
		itemSelector: '.gallery',
		columnWidth: '.gallery'
	});

});
