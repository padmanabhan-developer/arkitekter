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
<div id="banner" class="no-bg">
     	  <div class="container">
          	   <div class="banner_inner">
               		<img src="<?php echo get_template_directory_uri(); ?>/images/news-signle.jpg" alt="" />
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
     </div>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<div id="content">
     	  
          <div class="news_section">
          	   <div class="container">
               		
                    <div class="news_header">
                    	 <h2><?php the_title(); ?></h2>
                         <h6><?php the_time('d | m | Y') ?></h6>
                    </div>
                    
               	    <div class="news_single_left">
                    	 <div class="news_text">
                    	 <div class="single_news_image"><?php twentyfourteen_post_thumbnail(); ?></div>
                         <style>
						 .navigation.post-navigation{
							 display:none;
						 }
						 </style>
                         <p>
                         <?php
						 the_content( sprintf(
								__( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'twentyfourteen' ),
								the_title( '<span class="screen-reader-text">', '</span>', false )
							) );
						 ?>
                         
                         </div>
                         <a href="<?php echo get_site_url()?>/news" class="button-with-arrow" >Alle nyheder</a>
                    </div><!--close news_single_left-->
                    
                    <div class="news_single_right">
                    	 <h3>BREAKING NEWS</h3>
                         <ul>
                          <?php 
							$custom_args = array(
							'post_type' => 'news',
							'posts_per_page' => 8,
							);
							$custom_query = new WP_Query( $custom_args ); 
						?>
                        <?php while ( $custom_query->have_posts() ) : $custom_query->the_post(); 
						$content = get_the_content();
						$trimmed_content = substr($content, 0, 30)."...";
						?>
                         	<li><a href="<?php echo get_permalink(); ?>"><?php echo $trimmed_content; ?><br><?php the_time('d . m . Y') ?></a></li>
                            <?php endwhile; ?> 
                         </ul>
                    </div><!--close news_single_right-->
                    
               </div><!--close container-->
          </div><!--close news_section-->
          
          
          
          
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
	</header><!-- .entry-header --><?php */?>

	<?php /*?><?php if ( is_search() ) : ?>
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
			) );*/

			/*wp_link_pages( array(
				'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'twentyfourteen' ) . '</span>',
				'after'       => '</div>',
				'link_before' => '<span>',
				'link_after'  => '</span>',
			) );*/
		?>
	<?php /*?></div><!-- .entry-content -->
	<?php endif; ?><?php */?>

	<?php //the_tags( '<footer class="entry-meta"><span class="tag-links">', '', '</span></footer>' ); ?>
</article><!-- #post-## -->
