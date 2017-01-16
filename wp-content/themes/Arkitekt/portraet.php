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
               		<img src="<?php echo get_template_directory_uri(); ?>/images/job-banner.jpg" alt="" />
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
                        <?php
						  $content = get_the_content();
						  echo $content; 
						  ?></div>
                         
                         <a href="<?php echo get_home_url(); ?>/job/#portraettersection" class="button-with-arrow">See alle portraetter</a>
                    </div><!--close news_single_left-->
                    
                    <div class="news_single_right">
                    	 <h3>Andre Portraetter</h3>
                         <ul>
                         	<?php 
							$custom_args = array(
							'post_type' => 'vacancies',
							'posts_per_page' => 10,
							);
							$custom_query = new WP_Query( $custom_args ); 
						?>
                        <?php while ( $custom_query->have_posts() ) : $custom_query->the_post(); ?>
                         	<li>- <a href="<?php the_permalink(); ?>"><?php the_title(); ?> <br><?php the_time('d . m . Y') ?></a></li>
                         <?php endwhile; ?>
                         </ul>
                    </div><!--close news_single_right-->
                    
               </div><!--close container-->
          </div><!--close news_section-->
          
          <div class="about_section single-service job-section white-bg">
          	   <div class="container">
               		
               	   <div class="about_left">
                    	 <h2>Relaterede Portraetter</h2>
                    </div>
               		
                    
                    
                    
               		<div id="grid">
                        <div id="posts">
                         <?php 
						$custom_args = array(
						'post_type' => 'portraet',
						'posts_per_page' => 7,
						);
						$custom_query = new WP_Query( $custom_args ); 
						?>
                         <?php while ( $custom_query->have_posts() ) : $custom_query->the_post(); ?>
                            <div class="post">
                                <div class="case-inner">
                                <img src="<?php the_post_thumbnail_url(); ?>"/>
                                
                                     <div class="cases">
                                          <div class="cases_table">
                                                <div class="cases_td">
                                                     <div class="cases_text_inner">
                                                          <h2><?php the_title(); ?></h2>
                                                          <a href="<?php the_permalink(); ?>" class="button-with-arrow">læs mere</a>
                                                          <h6><?php the_time('d | m | Y') ?></h6>
                                                      </div>
                                          		 </div>
                                     		</div>
                                	</div>
                           		</div>
                        	</div><!--close post-->
                         <?php endwhile; ?>   
                           <style>
						 .case-inner img {
							  height: 155px;
							}
							/*#posts .post:nth-child(2) .case-inner img{
								height: auto;
							}*/
						 </style> 
                            
                  </div><!--close posts-->
                    </div><!--close grid-->
               </div><!--close container-->
          </div><!--close about_section-->
          
          
     </div>
               
<style>
.navigation.post-navigation {
display: none;
}
</style>
	<?php // twentyfourteen_post_thumbnail(); ?>

	<?php /*?><header class="entry-header">
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

	<?php // the_tags( '<footer class="entry-meta"><span class="tag-links">', '', '</span></footer>' ); ?>
</article><!-- #post-## -->
