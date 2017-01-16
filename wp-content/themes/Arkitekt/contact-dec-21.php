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
               <?php $image = get_field('bannerimage'); ?>
               		<img src="<?php echo get_field('bannerimage'); ?>" alt="" style="width:1800px;height:292px;"/>
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
                    	 <h2><?php the_title(); ?></h2>
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
							while( have_rows('image_gallery') ): the_row(); 
							$image = get_sub_field('iamges');
							 ?>
               		<img src="<?php echo $image; ?>" alt=""/>
                    <?php endwhile;
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
                                  <a class="menu_class2">Fagligt felt</a>
                                  <div class="the_menu2">
                                       <ul>
                                       <?php
                                       $custom_terms = get_terms('categories_peo');
									foreach($custom_terms as $custom_term) {
										wp_reset_query();
										$args = array('post_type' => 'perspektivs',
											'tax_query' => array(
												array(
													'taxonomy' => 'categories_peo',
													'field' => 'slug',
													'terms' => $custom_term->slug,
												),
											),
										 );
									
										 $loop = new WP_Query($args);
										 if($loop->have_posts()) {
											echo '<li class="cl" cid="'.$custom_term->term_id.'">'.$custom_term->name.'</li>';
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
		$( ".cl" ).click(function() {
		  var state_id=$(this).attr('cid');
		  //alert(state_id);
		  
				$.ajax({
					url:'<?php echo admin_url( 'admin-ajax.php' );?>',
					type:'POST',
					data:{state_id:state_id,action:'auto_search'},
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
                            	<div class="pthumb"> 
                               <?php //if ( has_post_thumbnail() ) : ?>
									<img src="<?php the_post_thumbnail_url(); ?>" class="immem" />
								<?php //endif; ?>
                                <div class="partner_text">
                                      <span>
                                        <strong><?php the_title(); ?></strong><br>
                                        Partner<br>
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
