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
           <div class="banner_inner2">
               <?php $image = get_field('bannerimage'); ?>
               		<img src="<?php echo get_field('bannerimage'); ?>" alt="" />
               
           </div>
      </div><!--close container-->
</div><!--close banner-->
<div id="content">
	<div class="about_section white-bg">
          	   <div class="container">
               		<div class="about_left">
                    	 <h2><?php the_title(); ?></h2>
                         <h3><?php echo $value1 = get_field( "man_post"); ?></h3>
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
          
          <div class="about_section gray-bg single-service partnere">
          	   <div class="container">
               		<div class="about_left">
                    	 <h2>Relaterede projekter</h2>
                    </div>
                    
                    <div id="grid">
                      <div id="posts">
                      <?php
					  	 $i = 1;
                         foreach( $pr as $post): // variable must be called $post (IMPORTANT) ?>
					    <?php setup_postdata($post); ?>
                        <?php $class = ($i==2)?'big':''; ?>
                    	<div class="post">
                            <div class="case-inner <?php echo $class; ?>">
                                 <img src="<?php the_post_thumbnail_url(); ?>" alt="">
                                 <div class="cases">
                                  <div class="cases_table">
                                        <div class="cases_td">
                                             <div class="cases_text_inner">
                                                  <h2><?php the_title(); ?></h2>
                                                  <a href="<?php echo get_permalink(); ?>" class="button-with-arrow">læs mere</a>
                                                  <h6><?php the_field('location'); ?></h6>
                                              </div>
                                         </div>
                                    </div>
                                </div>
                            </div>
                        </div><!--close post-->	  	
                        <?php $i++; endforeach; ?>  
                      </div>
                      <div class="button_row4"><a href="<?php echo site_url(); ?>/partnere/" class="button-with-arrow">Se alle projekter</a></div>
                    </div>    
               </div><!--close container-->
          </div><!--close about_section-->
<style>
.navigation.post-navigation {
display: none;
}
</style>
</div>
	
</article><!-- #post-## -->
