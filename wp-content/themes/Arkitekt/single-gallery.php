<?php
/**
 * The Template for displaying all single posts
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */

get_header(); ?>
<style type="text/css">
.button_row3 {
  float: left;
  margin: -25px 0 0 85px;
}
</style>
<script src="<?php echo get_template_directory_uri(); ?>/js/bootstrap.min.js"></script>
<script type="text/javascript">
$(window).scroll(function() {
    if ($(this).scrollTop() > 1){  
        $('header').addClass("sticky");
    }
    else{
        $('header').removeClass("sticky");
    }
});
</script>
<script src="<?php echo get_template_directory_uri(); ?>/js/readmore.js"></script>
<script type="text/javascript">
$(document).ready(function(){
  $("#menu > li > a").click(function () {
	$(this).parent().addClass('active').siblings().removeClass('active');
    $('div.submenu_section').not($(this).siblings()).slideUp();
    $(this).siblings("div.submenu_section").slideToggle();
	});
	$("a.close_button").click(function () {
		$(this).parents('div.submenu_section').slideUp();
	});

    jQuery('#info').readmore({
      moreLink: '<a href="#">Usage, examples, and options</a>',
      collapsedHeight: 384,
      afterToggle: function(trigger, element, expanded) {
        if(! expanded) { // The "Close" link was clicked
          jQuery('html, body').animate({scrollTop: $(element).offset().top}, {duration: 100});
        }
      }
    });

    jQuery('article').readmore({speed: 500});
	});
  </script>


<script src="http://cdnjs.cloudflare.com/ajax/libs/masonry/3.1.5/masonry.pkgd.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/script.js"></script>


	<div id="primary" class="content-area">
		<div id="content" class="site-content" role="main">
			<?php
				// Start the Loop.
				while ( have_posts() ) : the_post();

					/*
					 * Include the post format-specific template for the content. If you want to
					 * use this in a child theme, then include a file called called content-___.php
					 * (where ___ is the post format) and that will be used instead.
					 */
					get_template_part( 'gallery', get_post_format() );

					// Previous/next post navigation.
					//twentyfourteen_post_nav();

					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) {
						comments_template();
					}
				endwhile;
			?>
		</div><!-- #content -->
	</div><!-- #primary -->

<?php
//get_sidebar( 'content' );
//get_sidebar();
get_footer();
