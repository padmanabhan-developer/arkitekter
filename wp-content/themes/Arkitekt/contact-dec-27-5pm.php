<?php
/**
 * The default template for displaying content
 *
 * Used for both single and index/archive/search.
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */
?>
<style type="text/css">
.immem {
  height: 227px;
  width: 284px;
}
.about_left{float:left; width:360px; padding:0 20px 0 80px; }
</style>
 <div id="banner" class="no-bg">
     	  <div class="container">
          	   <div class="banner_inner">
               		<?php 
					if(get_field('bannerimage',get_the_ID())){
				  	$bannerimage = get_field('bannerimage',get_the_ID()); 
					//print_r($bannerimage);
				  	?>
               		<img src="<?php echo $bannerimage; ?>" alt="" />
                   	<?php } 
					else{
						if(get_field('banner_image',77)){
							$bannerimagem = get_field('banner_image',77); 
							?><img src="<?php echo $bannerimagem['url']; ?>" alt="" />
                            <?php
						}else{
						?>
                    	<img src="<?php echo get_template_directory_uri(); ?>/images/services.jpg" alt="" />
                    <?php } ?>
                    <?php } ?>
                    <div class="banner_layer">
                    	<div class="banner_table">
                        	<div class="banner_td">
                            	 <div class="banner_text">
                                 	  <h2><?php the_title(); ?></h2>
                                      <p><?php
									  $content = get_the_content();
									  $trimmed_content = wp_trim_words( $content, 40, NULL );
									  echo $trimmed_content; ?></p>
                                 </div>
                            </div>
                        </div>
                    </div>
               </div>
          </div><!--close container-->
     </div><!--close banner-->
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<div id="content">
     	  
          <div class="about_section gray-bg">
          	   <div class="container">
               		<div class="about_left">
                    	 <h2 class="title-main"><?php the_title(); ?></h2>
                         <p><?php echo $value1 = get_field( "address1"); ?><br>
						<?php echo $value1 = get_field( "address2"); ?><br>
						<?php echo $value1 = get_field( "telephone"); ?><br>
						<?php echo $value1 = get_field( "eamil"); ?><br>
						<?php if(get_field( "google_map_link")){?><br>
                       <a href="<?php echo get_field("google_map_link");?>" target="_blank"> Google maps</a>
                        <?php }?>
                        </p>
                    </div>
                    
                    <div class="about_right">
                    	 <article>
                            <p> <?php the_content(); ?> </p>
                         </article>
                    </div>
               </div><!--close container-->
          </div><!--close about_section-->
          
          
          <div class="about_section white-bg">
          	   <div class="container">
                <?php if( have_rows('image_gallery') ):
				?>
               <div id="jssor_1" style="position: relative; margin: 0 auto; top: 0px; left: 0px; width: 1200px; height: 400px; overflow: hidden; visibility: hidden;">
        <!-- Loading Screen -->
        <div data-u="loading" style="position: absolute; top: 0px; left: 0px;">
            <div style="filter: alpha(opacity=70); opacity: 0.7; position: absolute; display: block; top: 0px; left: 0px; width: 100%; height: 100%;"></div>
            <div style="position:absolute;display:block;background:url('<?php echo get_template_directory_uri(); ?>/images/ajax-loader.gif') no-repeat center center;top:0px;left:0px;width:100%;height:100%;"></div>
        </div>
        <div data-u="slides" style="cursor: default; position: relative; top: 0px; left: 0px; width: 1200px; height: 400px; overflow: hidden;">
                <?php
				while( have_rows('image_gallery') ): the_row(); 
				$image = get_sub_field('iamges');
				 ?>
                 <div data-p="112.50" style="display:none;">
                    <img data-u="image" src="<?php echo $image; ?>" />
                </div>
				<?php endwhile;?>
         </div>
        <!-- Bullet Navigator -->
        <div data-u="navigator" class="jssorb01" style="bottom:16px;right:16px;" data-autocenter="1">
            <div data-u="prototype" style="width:12px;height:12px;"></div>
        </div>
        <!-- Arrow Navigator -->
        <span data-u="arrowleft" class="jssora13l" style="top:0px;left:30px;width:40px;height:50px;" data-autocenter="2"></span>
        <span data-u="arrowright" class="jssora13r" style="top:0px;right:30px;width:40px;height:50px;" data-autocenter="2"></span>
    </div> 
			  <?php
                    endif;
             ?>
           </div><!--close container-->
          </div><!--close about_section-->
          
          
          <div class="about_section gray-bg peoples">
          	   <div class="container">
               		
                    <div class="filter_section">
                         <h2>Mennesker</h2>
                         <div class="filter2">
                         	  <div id="button2">
                                  <a class="showfilter menu_class2">Fagligt felt</a>
                                  <div class="the_menu2">
                                       <ul>
                                      <?php
									  $posts_chck = get_field('mennesker');
										$peoplesarray = array();
									  foreach( $posts_chck as $post_chck):
									  array_push($peoplesarray,$post_chck->ID);
									   endforeach;	 
									   
                                    $custom_terms = get_terms('categories_peo');
									foreach($custom_terms as $custom_term) {
										wp_reset_query();
										$args = array('post_type' => 'perspektivs',
											'tax_query' => array(
												array(
													'taxonomy' => 'categories_peo',
													'field' => 'id',
													'terms' => $custom_term->term_id,
												),
											),
										 );
										 
										 $loop = new WP_Query($args);
										 if($loop->have_posts()) {
											 
											echo '<li class="cl_contact" data-postid="'.get_the_ID().'" cid="'.$custom_term->term_id.'">'.$custom_term->name.'</li>';
										 }
									}
						            ?>                           
                                    </ul>
                                  </div><!--close the_menu-->
                              </div><!--close button-->
                         </div><!--close filter2-->
                    
                          
                    </div>
                    <script>
        $( document ).ready(function() {
			//alert('hello');
		$( ".cl_contact" ).click(function() {
		  var state_id=$(this).attr('cid');
		  var postid=$(this).data('postid');
		  //alert(state_id);
		  
				$.ajax({
					url:'<?php echo admin_url( 'admin-ajax.php' );?>',
					type:'POST',
					data:{state_id:state_id,postid:postid,action:'auto_search'},
					beforeSend : function () {
						$(".peoples_row").html('<div style=" margin: auto;text-align: center;"><a href="javascript:;" style="text-decoration:none; text-align:center" class="ajaxloader" >Loading</a></div>');
						},
					success:function(result){
						$(".peoples_row").html(result);
						},
				});
		});
      
    });
               </script>
               	<div class="peoples_row">
                         <ul>
                           <?php 
						$posts = get_field('mennesker');
						if( $posts ):
						foreach( $posts as $post): // variable must be called $post (IMPORTANT) ?>
        					<?php setup_postdata($post); ?>
                         	<li>
                            	<div class="pthumb" data-poepleid="<?php echo get_the_ID();?>"> 
                                         <?php if ( has_post_thumbnail() ) : 
										 $url_orinignal = wp_get_attachment_url( get_post_thumbnail_id());
										 $url = img_resize($url_orinignal, 170, 180, true);
										 else: 
										 $url = img_resize(get_template_directory_uri().'/images/no_profile.jpg', 170, 180, true);
										 endif; ?>
                                         <img src="<?php echo $url ; ?>" alt="<?php echo get_the_title()?>" />
	                                <div class="partner_text">
                                      <span>
                                        <strong><?php the_title(); ?></strong><br>
                                        <?php the_field('achieved'); ?><br>
                                        Tel. <?php the_field('telephone'); ?><br>
                                        <?php the_field('email'); ?>
                                      </span>
                                 </div>
                                </div>
                            </li>
						<?php endforeach;
                        wp_reset_postdata();
                         ?>
                        <?php  endif;?>
                         </ul>
                            
                  </div>
                    
               </div><!--close container-->
          </div><!--close about_section-->
          
     </div>
	<?php /*?><?php twentyfourteen_post_thumbnail(); ?>

	<header class="entry-header">
		<?php if ( in_array( 'category', get_object_taxonomies( get_post_type() ) ) && twentyfourteen_categorized_blog() ) : ?>
		<div class="entry-meta">
			<span class="cat-links"><?php echo get_the_category_list( _x( ', ', 'Used between list items, there is a space after the comma.', 'twentyfourteen' ) ); ?></span>
		</div>
		<?php
			endif;

			if ( is_single() ) :
				the_title( '<h1 class="entry-title">', '</h1>' );
			else :
				the_title( '<h1 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h1>' );
			endif;
		?>

		<div class="entry-meta">
			<?php
				if ( 'post' == get_post_type() )
					twentyfourteen_posted_on();

				if ( ! post_password_required() && ( comments_open() || get_comments_number() ) ) :
			?>
			<span class="comments-link"><?php comments_popup_link( __( 'Leave a comment', 'twentyfourteen' ), __( '1 Comment', 'twentyfourteen' ), __( '% Comments', 'twentyfourteen' ) ); ?></span>
			<?php
				endif;

				edit_post_link( __( 'Edit', 'twentyfourteen' ), '<span class="edit-link">', '</span>' );
			?>
		</div><!-- .entry-meta -->
	</header><!-- .entry-header -->

	<?php if ( is_search() ) : ?>
	<div class="entry-summary">
		<?php the_excerpt(); ?>
	</div><!-- .entry-summary -->
	<?php else : ?>
	<div class="entry-content"><?php */?>
		<?php
			/* translators: %s: Name of current post */
			/*the_content( sprintf(
				__( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'twentyfourteen' ),
				the_title( '<span class="screen-reader-text">', '</span>', false )
			) );

			wp_link_pages( array(
				'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'twentyfourteen' ) . '</span>',
				'after'       => '</div>',
				'link_before' => '<span>',
				'link_after'  => '</span>',
			) );*/
		?>
	<!--</div><!-- .entry-content -->
	<?php // endif; ?>

	<?php //the_tags( '<footer class="entry-meta"><span class="tag-links">', '', '</span></footer>' ); ?>
</article><!-- #post-## -->
    <script type="text/javascript">
        jQuery(document).ready(function ($) {

			if(jQuery('#jssor_1').length){
            var jssor_1_options = {
              $AutoPlay: true,
              $SlideWidth: 800,
              $Cols: 2,
              $Align: 100,
              $ArrowNavigatorOptions: {
                $Class: $JssorArrowNavigator$
              },
              $BulletNavigatorOptions: {
                $Class: $JssorBulletNavigator$
              }
            };

            var jssor_1_slider = new $JssorSlider$("jssor_1", jssor_1_options);

            /*responsive code begin*/
            /*you can remove responsive code if you don't want the slider scales while window resizing*/
            function ScaleSlider() {
                var refSize = jssor_1_slider.$Elmt.parentNode.clientWidth;
                if (refSize) {
                    refSize = Math.min(refSize, 1200);
                    jssor_1_slider.$ScaleWidth(refSize);
                }
                else {
                    window.setTimeout(ScaleSlider, 30);
                }
            }
            ScaleSlider();
            $(window).bind("load", ScaleSlider);
            $(window).bind("resize", ScaleSlider);
            $(window).bind("orientationchange", ScaleSlider);
            /*responsive code end*/
			}
        });
    </script>
    <style>
        /* jssor slider bullet navigator skin 01 css */
        /*
        .jssorb01 div           (normal)
        .jssorb01 div:hover     (normal mouseover)
        .jssorb01 .av           (active)
        .jssorb01 .av:hover     (active mouseover)
        .jssorb01 .dn           (mousedown)
        */
        .jssorb01 {
            position: absolute;
        }
        .jssorb01 div, .jssorb01 div:hover, .jssorb01 .av {
            position: absolute;
            /* size of bullet elment */
            width: 12px;
            height: 12px;
            filter: alpha(opacity=70);
            opacity: .7;
            overflow: hidden;
            cursor: pointer;
            border: #000 1px solid;
        }
        .jssorb01 div { background-color: gray; }
        .jssorb01 div:hover, .jssorb01 .av:hover { background-color: #d3d3d3; }
        .jssorb01 .av { background-color: #fff; }
        .jssorb01 .dn, .jssorb01 .dn:hover { background-color: #555555; }

        .jssora13l, .jssora13r {
            display: block;
            position: absolute;
            /* size of arrow element */
            width: 40px;
            height: 50px;
            cursor: pointer;
            background: url('<?php echo get_template_directory_uri(); ?>/images/a13.png') no-repeat;
            overflow: hidden;
        }
        .jssora13l { background-position: -10px -35px; }
        .jssora13r { background-position: -70px -35px; }
        .jssora13l:hover { background-position: -130px -35px; }
        .jssora13r:hover { background-position: -190px -35px; }
        .jssora13l.jssora13ldn { background-position: -250px -35px; }
        .jssora13r.jssora13rdn { background-position: -310px -35px; }
        .jssora13l.jssora13lds { background-position: -10px -35px; opacity: .3; pointer-events: none; }
        .jssora13r.jssora13rds { background-position: -70px -35px; opacity: .3; pointer-events: none; }
    </style>
