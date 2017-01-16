<?php
//create menu link
add_action('admin_menu','smart_post_share');
function smart_post_share(){
  	
  	add_options_page( 'Smart Post Share', 'Post Share Settings', 'manage_options', 'post_share', 's_post_share' );
	
}

//register setting

 function register_post_share(){
 	register_setting('smart_post_share_group','smart_fb_share');
 	register_setting('smart_post_share_group','smart_fb_share_top');
 	register_setting('smart_post_share_group','cstm_post');
 	//fb resgiister button setting
 	register_setting('smart_post_share_group','enable_fb');
 	register_setting('smart_post_share_group','small_fb_button');
 	register_setting('smart_post_share_group','fb_bacground');
 	register_setting('smart_post_share_group','fb_color');
 	register_setting('smart_post_share_group','fb_hover');

 	//twitter resgiister button setting
 	register_setting('smart_post_share_group','enable_twitter');
 	register_setting('smart_post_share_group','small_twitter_button');
 	register_setting('smart_post_share_group','twitter_bacground');
 	register_setting('smart_post_share_group','twitter_color');
 	register_setting('smart_post_share_group','twitter_hover');
 	register_setting('smart_post_share_group','twitter_via');

 	//google plus resgiister button setting
 	register_setting('smart_post_share_group','enable_gp');
 	register_setting('smart_post_share_group','small_gp_button');
 	register_setting('smart_post_share_group','gp_bacground');
 	register_setting('smart_post_share_group','gp_color');
 	register_setting('smart_post_share_group','gp_hover');

   	//pocekt resgiister button setting
 	register_setting('smart_post_share_group','enable_pct');
 	register_setting('smart_post_share_group','small_pct_button');
 	register_setting('smart_post_share_group','pct_bacground');
 	register_setting('smart_post_share_group','pct_color');
 	register_setting('smart_post_share_group','pct_hover');

 	 	//Linkedin button setting
 	register_setting('smart_post_share_group','enable_ln');
 	register_setting('smart_post_share_group','small_ln_button');
 	register_setting('smart_post_share_group','ln_bacground');
 	register_setting('smart_post_share_group','ln_color');
 	register_setting('smart_post_share_group','ln_hover');

  	 	//Email button setting
 	register_setting('smart_post_share_group','enable_eml');
 	register_setting('smart_post_share_group','small_eml_button');
 	register_setting('smart_post_share_group','eml_bacground');
 	register_setting('smart_post_share_group','eml_color');
 	register_setting('smart_post_share_group','eml_hover');


 }
 add_action('admin_init','register_post_share');

//create option page content

function s_post_share(){
//init optiosn global

	?>
   <div class="wrap">	
       <h1 style="font-weight:bold;color:green;font-size:40px"><?php _e('Post Share Settings'); ?></h1>
       <h2 style="font-weight:bold;color:#36db20;font-size:30px"><?php _e('General Settings'); ?></h2>
       <form action="options.php" method="post">
       	<?php settings_fields('smart_post_share_group'); ?>
            
            <table class="form-table">
            	<tbody>
						<tr>
            			<th scope="row">
            				<label for="smart_fb_share"><?php _e('Share button bottom in post'); ?></label>
            			</th>
            			<td>
            				<input name="smart_fb_share" type="checkbox" id="smart_fb_share" value="1" <?php checked('1',get_option('smart_fb_share'),true); ?>>
            				<p class="description"> Display Share buttons at the bottom of posts </p>
            			</td>

            		</tr>
            		<tr>
            			<th scope="row">
            				<label for="smart_fb_share_top"><?php _e('Share button top in post'); ?></label>
            			</th>
            			<td>
            				<input name="smart_fb_share_top" type="checkbox" id="smart_fb_share_top" value="1" <?php checked('1',get_option('smart_fb_share_top'),true); ?>>
            				<p class="description"> Display Share buttons at the top of posts  </p>
            				 <p class="submit"><input type="submit" name="submit" id="submit" class="button button-primary" value="<?php _e('save changes'); ?>"></p>
            			</td>								
            		</tr>				
						<tr>
            			<th scope="row">
            				<label for="cstm_post"><?php _e('Disable on Custom Post Types?'); ?></label>
            			</th>
            			<td>
            				<input name="cstm_post" type="checkbox" id="cstm_post" value="1" <?php checked('1',get_option('cstm_post'),true); ?>>
            				<p class="description">Disable Share button in custom post type  </p>
            				 <p class="submit"><input type="submit" name="submit" id="submit" class="button button-primary" value="<?php _e('save changes'); ?>"></p>
            			</td>								
            		</tr>

						</tbody>
					</table>
  
			       <table class="form-table">			            
					     <?php settings_fields('smart_post_share_group'); ?>
			            	<tbody>
								<tr>
									<h2 style="font-weight:bold;color:#008EC2;font-size:30px"><?php _e('Facebook Button Settings'); ?></h2>
		            			<th scope="row">
		            				<label for="enable_fb"><?php _e('Display Facebook button'); ?></label>
		            			</th>
		            			<td>
		            				<input name="enable_fb" type="checkbox" id="enable_fb" value="1"  <?php checked('1',get_option('enable_fb'),true); ?>>
		            			</td>
		            		</tr>
                	 
								<tr>
		            			<th scope="row">
		            				<label for="small_fb_button"><?php _e('Display small button for Facebook?'); ?></label>
		            			</th>
		            			<td>
		            				<input name="small_fb_button" type="checkbox" id="small_fb_button" value="1"  <?php checked('1',get_option('small_fb_button'),true); ?>>
		            				<p class="description"> Shown small  facebook button</p>
		            			</td>
		            		</tr>

							 <tr>
	            			<th scope="row">
	            				<label for="fb_bacground"><?php _e('background Color'); ?></label>
	            			</th>
	            			<td>
	            			<input class="colorpicker" name="fb_bacground" type="text" id="fb_bacground" value="<?php echo get_option('fb_bacground'); ?>">
	            			<p class="description"><?php _e('choose facebook button background color'); ?></p>
            				</td>
							</tr>

            		 <tr>
            			<th scope="row">
            				<label for="fb_color"><?php _e('Font Color'); ?></label>
            			</th>
            			<td>
            				<input class="colorpicker" name="fb_color" type="text" id="fb_color" value="<?php echo get_option('fb_color'); ?>">
            				<p class="description"><?php _e('choose facebook button Font color'); ?></p>
            			</td>
            			</tr>

							 <tr>
	            			<th scope="row">
	            				<label for="fb_hover"><?php _e('Hover Color'); ?></label>
	            			</th>
	            			<td>
	            				<input class="colorpicker" name="fb_hover" type="text" id="fb_hover" value="<?php echo get_option('fb_hover'); ?>">
	            				<p class="description"><?php _e('choose facebook button hover color'); ?></p>
	            				<p class="submit"><input type="submit" name="submit" id="submit" class="button button-primary" value="<?php _e('save changes'); ?>"></p>
	            			</td>
	            			</tr>
							</tbody>
						</table>
							
							<!----twitter button field------>
						<table class="form-table">			            
					      <?php settings_fields('smart_post_share_group'); ?>
			            	<tbody>
								<tr>
									<h2 style="font-weight:bold;color:#008EC2;font-size:30px"><?php _e('Twitter Button Settings'); ?></h2>
		            			<th scope="row">
		            				<label for="enable_twitter"><?php _e('Display Twitter button'); ?></label>
		            			</th>
		            			<td>
		            				<input name="enable_twitter" type="checkbox" id="enable_twitter" value="1"  <?php checked('1',get_option('enable_twitter'),true); ?>>
		            			</td>
		            		</tr>
                	 
								<tr>
		            			<th scope="row">
		            				<label for="small_twitter_button"><?php _e('Display small button for Twitter?'); ?></label>
		            			</th>
		            			<td>
		            				<input name="small_twitter_button" type="checkbox" id="small_twitter_button" value="1"  <?php checked('1',get_option('small_twitter_button'),true); ?>>
		            				<p class="description"> Shown small Twitter button</p>
		            			</td>
		            		</tr>

						 <tr>
            			<th scope="row">
            				<label for="twitter_bacground"><?php _e('background Color'); ?></label>
            			</th>
            			<td>
            				<input class="colorpicker" name="twitter_bacground" type="text" id="twitter_bacground" value="<?php echo get_option('twitter_bacground'); ?>">
            				<p class="description"><?php _e('choose Twitter button background color'); ?></p>
            			</td>
						</tr>

            		 <tr>
            			<th scope="row">
            				<label for="twitter_color"><?php _e('Font Color'); ?></label>
            			</th>
            			<td>
            				<input class="colorpicker" name="twitter_color" type="text" id="twitter_color" value="<?php echo get_option('twitter_color'); ?>">
            				<p class="description"><?php _e('choose Twitter button Font color'); ?></p>
            			</td>
            		</tr>

						 <tr>
            			<th scope="row">
            				<label for="twitter_hover"><?php _e('Hover Color'); ?></label>
            			</th>
            			<td>
            				<input class="colorpicker" name="twitter_hover" type="text" id="twitter_hover" value="<?php echo get_option('twitter_hover'); ?>">
            				<p class="description"><?php _e('choose Twitter button hover color'); ?></p>
            					
            			</td>
		            </tr>

		            <tr>
            			<th scope="row">
            				<label for="twitter_via"><?php _e('Twitter Via User (with "@")'); ?></label>
            			</th>
            			<td>
            				<input  name="twitter_via" type="text" id="twitter_via" value="<?php echo get_option('twitter_via'); ?>" class="regular-text">
            				  <p class="submit"><input type="submit" name="submit" id="submit" class="button button-primary" value="<?php _e('save changes'); ?>"></p>
            					
            			</td>
		            </tr>
					</tbody>
				</table>

					<!----Google plus button field------>
				 <table class="form-table">			            
					 <?php settings_fields('smart_post_share_group'); ?>
			          <tbody>
		            		<tr>
								<h2 style="font-weight:bold;color:#008EC2;font-size:30px"><?php _e('Google Plus Button Settings'); ?></h2>
	            			<th scope="row">
	            				<label for="enable_gp"><?php _e('Display Google Plus button'); ?></label>
	            			</th>
	            			<td>
	            				<input name="enable_gp" type="checkbox" id="enable_gp" value="1"  <?php checked('1',get_option('enable_gp'),true); ?>>
	            			</td>
	            			</tr>
                	 
								<tr>
		            			<th scope="row">
		            				<label for="small_gp_button"><?php _e('Display small button for Google Plus?'); ?></label>
		            			</th>
		            			<td>
		            				<input name="small_gp_button" type="checkbox" id="small_gp_button" value="1"  <?php checked('1',get_option('small_gp_button'),true); ?>>
		            				<p class="description"> Shown small Google Pluse button</p>
		            			</td>
		            		</tr>

					 	<tr>
	         			<th scope="row">
	         				<label for="gp_bacground"><?php _e('background Color'); ?></label>
	         			</th>
            			<td>
            				<input class="colorpicker" name="gp_bacground" type="text" id="gp_bacground" value="<?php echo get_option('gp_bacground'); ?>">
            				<p class="description"><?php _e('choose Google Plus button background color'); ?></p>
            			</td>
						</tr>

            		 <tr>
            			<th scope="row">
            				<label for="gp_color"><?php _e('Font Color'); ?></label>
            			</th>
            			<td>
            				<input class="colorpicker" name="gp_color" type="text" id="gp_color" value="<?php echo get_option('gp_color'); ?>">
            				<p class="description"><?php _e('choose Google Plus Font color'); ?></p>
            			</td>
            			</tr>
								 <tr>
		            			<th scope="row">
		            				<label for="gp_hover"><?php _e('Hover Color'); ?></label>
		            			</th>
		            			<td>
		            				<input class="colorpicker" name="gp_hover" type="text" id="gp_hover" value="<?php echo get_option('gp_hover'); ?>">
		            				<p class="description"><?php _e('choose Google Plus button hover color'); ?></p>
		            					  <p class="submit"><input type="submit" name="submit" id="submit" class="button button-primary" value="<?php _e('save changes'); ?>"></p>
		            			</td>
		            			</tr>
									</tbody>
											</table>	

												<!----pocket plus button field------>
							 <table class="form-table">			            
					       	<?php settings_fields('smart_post_share_group'); ?>
			            	<tbody>
			            		<tr>
									<h2 style="font-weight:bold;color:#008EC2;font-size:30px"><?php _e('Pocket Button Settings'); ?></h2>
		            			<th scope="row">
		            				<label for="enable_pct"><?php _e('Display Pocket button'); ?></label>
		            			</th>
		            			<td>
		            				<input name="enable_pct" type="checkbox" id="enable_pct" value="1"  <?php checked('1',get_option('enable_pct'),true); ?>>
		            			</td>
		            		</tr>
                	 
								<tr>
		            			<th scope="row">
		            				<label for="small_pct_button"><?php _e('Display small button for Pocket?'); ?></label>
		            			</th>
		            			<td>
		            				<input name="small_pct_button" type="checkbox" id="small_pct_button" value="1"  <?php checked('1',get_option('small_pct_button'),true); ?>>
		            				<p class="description"> Shown small Pocket button</p>
		            			</td>
		            		</tr>

							 <tr>
		            			<th scope="row">
		            				<label for="pct_bacground"><?php _e('background Color'); ?></label>
		            			</th>
		            			<td>
		            				<input class="colorpicker" name="pct_bacground" type="text" id="pct_bacground" value="<?php echo get_option('pct_bacground'); ?>">
		            				<p class="description"><?php _e('choose Pocket button background color'); ?></p>
		            			</td>

		            		</tr>

	            		 <tr>
	            			<th scope="row">
	            				<label for="pct_color"><?php _e('Font Color'); ?></label>
	            			</th>
	            			<td>
	            				<input class="colorpicker" name="pct_color" type="text" id="pct_color" value="<?php echo get_option('pct_color'); ?>">
	            				<p class="description"><?php _e('Pocket Font color'); ?></p>
	            			</td>
	            		</tr>

						 <tr>
            			<th scope="row">
            				<label for="pct_hover"><?php _e('Hover Color'); ?></label>
            			</th>
            			<td>
            				<input class="colorpicker" name="pct_hover" type="text" id="pct_hover" value="<?php echo get_option('pct_hover'); ?>">
            				<p class="description"><?php _e('choose Pocket button hover color'); ?></p>
            				<p class="submit"><input type="submit" name="submit" id="submit" class="button button-primary" value="<?php _e('save changes'); ?>"></p>
            			</td>
            			</tr>
						</tbody>
					</table>	


									<!----LinkedIn plus button field------>

					 <table class="form-table">			            
					     <?php settings_fields('smart_post_share_group'); ?>
			            <tbody>
		            	<tr>
								<h2 style="font-weight:bold;color:#008EC2;font-size:30px"> <?php _e('LinkedIn Button Settings'); ?></h2>
	            			<th scope="row">
	            				<label for="enable_ln"><?php _e('Display LinkedIn button'); ?></label>
	            			</th>
	            			<td>
	            				<input name="enable_ln" type="checkbox" id="enable_ln" value="1"  <?php checked('1',get_option('enable_ln'),true); ?>>
	            			</td>
	            		</tr>
                	 
							<tr>
	            			<th scope="row">
	            				<label for="small_ln_button"><?php _e('Display small button for LinkedIn?'); ?></label>
	            			</th>
	            			<td>
	            				<input name="small_ln_button" type="checkbox" id="small_ln_button" value="1"  <?php checked('1',get_option('small_ln_button'),true); ?>>
	            				<p class="description"> Shown small LinkedIN button</p>
	            			</td>
	            		</tr>

					 	<tr>
            			<th scope="row">
            				<label for="ln_bacground"><?php _e('background Color'); ?></label>
            			</th>
            			<td>
            				<input class="colorpicker" name="ln_bacground" type="text" id="ln_bacground" value="<?php echo get_option('ln_bacground'); ?>">
            				<p class="description"><?php _e('choose LinkedIn button background color'); ?></p>
            			</td>
						</tr>

            		<tr>
            			<th scope="row">
            				<label for="ln_color"><?php _e('Font Color'); ?></label>
            			</th>
            			<td>
            				<input class="colorpicker" name="ln_color" type="text" id="ln_color" value="<?php echo get_option('ln_color'); ?>">
            				<p class="description"><?php _e('LinkedIN Font color'); ?></p>
            			</td>
            		</tr>
						 <tr>
            			<th scope="row">
            				<label for="ln_hover"><?php _e('Hover Color'); ?></label>
            			</th>
            			<td>
            			<input class="colorpicker" name="ln_hover" type="text" id="ln_hover" value="<?php echo get_option('ln_hover'); ?>">
            				<p class="description"><?php _e('choose LinkedIN button hover color'); ?></p>
            				<p class="submit"><input type="submit" name="submit" id="submit" class="button button-primary" value="<?php _e('save changes'); ?>"></p>
            			</td>
            		</tr>
					</tbody>
				</table>	
											
						<!----Email plus button field------>

				<table class="form-table">			            
					<?php settings_fields('smart_post_share_group'); ?>
			         <tbody>
	            		<tr>
							<h2 style="font-weight:bold;color:#008EC2;font-size:30px"><?php _e('Email Button Settings'); ?></h2>
            			<th scope="row">
            				<label for="enable_eml"><?php _e('Display Email button'); ?></label>
            			</th>
            			<td>
            				<input name="enable_eml" type="checkbox" id="enable_eml" value="1"  <?php checked('1',get_option('enable_eml'),true); ?>>
            			</td>
            			</tr>
                	 
							<tr>
	            			<th scope="row">
	            				<label for="small_eml_button"><?php _e('Display small button for Email?'); ?></label>
	            			</th>
	            			<td>
	            				<input name="small_eml_button" type="checkbox" id="small_eml_button" value="1"  <?php checked('1',get_option('small_eml_button'),true); ?>>
	            				<p class="description"> Shown small Email button</p>
	            			</td>
	            		</tr>

						 	<tr>
	            			<th scope="row">
	            				<label for="eml_bacground"><?php _e('background Color'); ?></label>
	            			</th>
	            			<td>
	            				<input class="colorpicker" name="eml_bacground" type="text" id="eml_bacground" value="<?php echo get_option('eml_bacground'); ?>">
	            				<p class="description"><?php _e('choose Email button background color'); ?></p>
	            			</td>
							</tr>

            		 <tr>
            			<th scope="row">
            				<label for="eml_color"><?php _e('Font Color'); ?></label>
            			</th>
            			<td>
            				<input class="colorpicker" name="eml_color" type="text" id="eml_color" value="<?php echo get_option('eml_color'); ?>">
            				<p class="description"><?php _e('Email Font color'); ?></p>
            			</td>
            		</tr>
					 <tr>
         			<th scope="row">
         				<label for="eml_hover"><?php _e('Hover Color'); ?></label>
         			</th>
         			<td>
         			<input class="colorpicker" name="eml_hover" type="text" id="eml_hover" value="<?php echo get_option('eml_hover'); ?>">
         				<p class="description"><?php _e('choose Email button hover color'); ?></p>
         				<p class="submit"><input type="submit" name="submit" id="submit" class="button button-primary" value="<?php _e('save changes'); ?>"></p>
         			</td>
         		</tr>
				</tbody>
						</table>



       </form>
   </div>

	<?php 
}


