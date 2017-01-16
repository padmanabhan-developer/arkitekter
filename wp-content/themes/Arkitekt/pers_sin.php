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
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<div id="banner" class="white-bg">
      <div class="container">
           <div class="banner_inner">
                <?php $image = get_field('bannerimage'); ?>
               		<img src="<?php echo get_field('bannerimage'); ?>" alt="" style="width:1800px;height:292px;"/>
           </div>
      </div><!--close container-->
</div><!--close banner-->
<div id="content">
	<div class="about_section white-bg">
          	   <div class="container">
               		<div class="about_left">
                    	 <h2><?php the_title(); ?></h2>
                         <h3><?php echo get_post_field('post_content', $post_id); ?></h3>
                         <p>T: <?php echo $value1 = get_field( "telephone"); ?><br>E: <?php echo $value1 = get_field( "email"); ?></p>
                         <div class="social2">
                         	  <a href="<?php echo $value1 = get_field( "linked_in_link"); ?>" class="linkedin2"></a>
                              <a href="<?php echo $value1 = get_field( "fb_link"); ?>" class="facebook2"></a>
                              <a href="<?php echo $value1 = get_field( "twitter_link"); ?>" class="twitter2"></a>
                         </div>
                    </div>
                    
                    <div class="about_right">
                    	 <article>
                           <?php
							  echo $content = get_the_content(); 
							  $pr= get_field('projects');
							 ?>
                         </article>
                    </div>
               </div><!--close container-->
          </div><!--close about_section-->
          
          <div class="about_section gray-bg single-service">
          	   <div class="container">
               		<div class="about_left">
                    	 <h2>Relaterede projekter</h2>
                    </div>
                    
                    <div class="cases_row">
                    	 <!--close case-big-->
                         <?php
						 $co=1;
                         foreach( $pr as $post): // variable must be called $post (IMPORTANT) ?>
					        <?php setup_postdata($post); 
                         if($co == 1){
	 ?>
     
       <div class="case-big">
                         	  <div class="case-inner">
                                    <?php if ( has_post_thumbnail() ) : ?>
	
	<img src="<?php the_post_thumbnail_url(); ?>" style="width:100%;height:210px;" />

<?php endif; ?>
                                     <div class="cases">
                                          <div class="cases_table">
                                               <div class="cases_td">
                                                    <div class="cases_text_inner">
                                                         <h2><?php the_title(); ?></h2>
                                                         <p>beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia "Sed ut perspiciatis </p>
                                                         <a href="<?php echo get_permalink(); ?>" class="button-with-arrow">læs mere</a>
                                                    </div>
                                               </div>
                                          </div>
                                     </div>
                                </div>
                         </div>
       
       
   <?php
	 }
	 else{
		 ?>
         <div class="case-small">
                         	  <div class="case-inner">
                                    <?php if ( has_post_thumbnail() ) : ?>
	
	<img src="<?php the_post_thumbnail_url(); ?>" style="width:100%;height:210px;" />

<?php endif; ?>
                                     <div class="cases">
                                          <div class="cases_table">
                                               <div class="cases_td">
                                                    <div class="cases_text_inner">
                                                         <h2><?php the_title(); ?></h2>
                                                        <p>beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia "Sed ut perspiciatis </p>
                                                         <a href="<?php echo get_permalink(); ?>" class="button-with-arrow">læs mere</a>
                                                    </div>
                                               </div>
                                          </div>
                                     </div>
                                </div>
                         </div>
         <?php
		 break; 
	 }
	 $co++;
                        endforeach; ?>
                         <!--close case-big-->
                         
                         <!--close case-big-->
                    </div><!--close grid-->
                    
               </div><!--close container-->
          </div><!--close about_section-->
          
<style>
.navigation.post-navigation {
display: none;
}
</style>
</div>
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
	<!-- </div><!-- .entry-content -->
	<?php //endif; ?>

	<?php //the_tags( '<footer class="entry-meta"><span class="tag-links">', '', '</span></footer>' ); ?>
</article><!-- #post-## -->
