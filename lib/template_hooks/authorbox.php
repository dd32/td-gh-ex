<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

if(!function_exists('ascend_author_box')) {
    function ascend_author_box() { ?>
    <div class="author-box post-footer-section">
    	<ul class="nav kt-tabs kt-sc-tabs">
      <li class="active"><a href="#about"><?php _e('About Author', 'ascend'); ?></a></li>
      <li><a href="#latest"><?php _e('Latest Posts', 'ascend'); ?></a></li>
    </ul>
     
    <div class="kt-tab-content postclass">
      <div class="tab-pane clearfix active" id="about">
      	<div class="author-profile vcard">
            <div class="kt_author_avatar">
    		  <?php echo get_avatar( get_the_author_meta('ID'), 80 ); ?>
              </div>
    		<h5 class="author-name"><?php the_author_posts_link(); ?></h5>
            <?php if ( get_the_author_meta( 'occupation' ) ) { ?>
            <p class="author-occupation"><strong><?php the_author_meta( 'occupation' ); ?></strong></p>
            <?php } ?>
    		<p class="author-description author-bio">
    			<?php the_author_meta( 'description' ); ?>
    		</p>
            <div class="author-follow kadence_social_widget">
                <?php if ( get_the_author_meta( 'facebook' ) ) { ?>
                        <a href="<?php the_author_meta( 'facebook' ); ?>" class="facebook_link" target="_blank" title="<?php _e('Follow', 'ascend'); ?>  <?php the_author_meta( 'display_name' ); ?> <?php _e('on Facebook', 'ascend');?>"><i class="kt-icon-facebook"></i></a>
                    <?php } if ( get_the_author_meta( 'twitter' ) ) { ?>
                        <a href="http://twitter.com/<?php the_author_meta( 'twitter' ); ?>" class="twitter_link target="_blank" title="<?php _e('Follow', 'ascend'); ?>  <?php the_author_meta( 'display_name' ); ?> <?php _e('on Twitter', 'ascend');?>"><i class="kt-icon-twitter"></i></a>
                    <?php } if ( get_the_author_meta( 'google' ) ) { ?>
                        <a href="<?php the_author_meta( 'google' ); ?>" class="googleplus_link" target="_blank" title="<?php _e('Follow', 'ascend'); ?>  <?php the_author_meta( 'display_name' ); ?> <?php _e('on Google Plus', 'ascend');?>"><i class="kt-icon-google-plus"></i></a>
                    <?php } if ( get_the_author_meta( 'youtube' ) ) { ?>
                        <a href="<?php the_author_meta( 'youtube' ); ?>" target="_blank" class="youtube_link" title="<?php _e('Follow', 'ascend'); ?>  <?php the_author_meta( 'display_name' ); ?> <?php _e('on YouTube', 'ascend');?>"><i class="kt-icon-youtube"></i></a>
                    <?php } if ( get_the_author_meta( 'flickr' ) ) { ?>
                    <span class="flickrlink">
                        <a href="<?php the_author_meta( 'flickr' ); ?>" target="_blank" title="<?php _e('Follow', 'ascend'); ?>  <?php the_author_meta( 'display_name' ); ?> <?php _e('on Flickr', 'ascend');?>"><i class="kt-icon-flickr"></i></a>
                    </span>
                    <?php } if ( get_the_author_meta( 'vimeo' ) ) { ?>
                    <span class="vimeolink">
                        <a href="<?php the_author_meta( 'vimeo' ); ?>" target="_blank" title="<?php _e('Follow', 'ascend'); ?>  <?php the_author_meta( 'display_name' ); ?> <?php _e('on Vimeo', 'ascend');?>"><i class="kt-icon-vimeo"></i></a>
                    </span>
                    <?php } if ( get_the_author_meta( 'linkedin' ) ) { ?>
                    <span class="linkedinlink">
                        <a href="<?php the_author_meta( 'linkedin' ); ?>" target="_blank" title="<?php _e('Follow', 'ascend'); ?>  <?php the_author_meta( 'display_name' ); ?> <?php _e('on linkedin', 'ascend');?>"><i class="kt-icon-linkedin"></i></a>
                    </span>
                    <?php } if ( get_the_author_meta( 'dribbble' ) ) { ?>
                    <span class="dribbblelink">
                        <a href="<?php the_author_meta( 'dribbble' ); ?>" target="_blank" title="<?php _e('Follow', 'ascend'); ?>  <?php the_author_meta( 'display_name' ); ?> <?php _e('on Dribbble', 'ascend');?>"><i class="kt-icon-dribbble"></i></a>
                    </span>
              <?php } if ( get_the_author_meta( 'pinterest' ) ) { ?>
                    <span class="pinterestlink">
                        <a href="<?php the_author_meta( 'pinterest' ); ?>" target="_blank" title="<?php _e('Follow', 'ascend'); ?>  <?php the_author_meta( 'display_name' ); ?> <?php _e('on Pinterest', 'ascend');?>"><i class="kt-icon-pinterest"></i></a>
                    </span>
              <?php } if ( get_the_author_meta( 'instagram' ) ) { ?>
              <span class="instagramlink">
                <a href="<?php the_author_meta( 'instagram' ); ?>" target="_blank" title="<?php _e('Follow', 'ascend'); ?>  <?php the_author_meta( 'display_name' ); ?> <?php _e('on Instagram', 'ascend');?>"><i class="kt-icon-instagram"></i></a>
              </span>
                <?php } ?>
            </div><!--Author Follow-->
            </div>
       </div><!--pane-->
      <div class="tab-pane clearfix" id="latest">
        <div class="author-latestposts author-profile">
            <div class="kt_author_avatar">
                <?php echo get_avatar( get_the_author_meta('ID'), 80 ); ?>
            </div>
            <h5><?php _e('Latest posts from', 'ascend'); ?> <?php the_author_posts_link(); ?></h5>
      			<ul>
    			<?php
                    global $authordata, $post;
                    if(isset($wp_query)) {
						$temp = $wp_query;
					} else {
						$temp = null;
					}
				  	$wp_query = null; 
                    $wp_query = new WP_Query();
                    $wp_query->query(array(
                      	'author' 			=> $authordata->ID,
                      	'posts_per_page'	=>3
                      	)
                    );
                    if ( $wp_query ) : 
                        while ( $wp_query->have_posts() ) : $wp_query->the_post(); ?>
                        <li>
                            <a href="<?php the_permalink();?>"><?php the_title(); ?></a><span class="recentpost-date"> - <?php echo get_the_time('F j, Y'); ?></span></li>
                        <?php endwhile; 
                    endif;  
                    $wp_query = $temp; 
                    wp_reset_query(); ?>
    			</ul>
    	       </div><!--Latest Post -->
            </div><!--Latest pane -->
        </div><!--Tab content -->
    </div><!--Author Box -->
    <?php } 
}

// Author Profile Feilds
add_action( 'show_user_profile', 'ascend_show_extra_profile_fields' );
add_action( 'edit_user_profile', 'ascend_show_extra_profile_fields' );
function ascend_show_extra_profile_fields( $user ) { 
	if(current_user_can( 'edit_posts') ) { ?>
		<h3><?php echo __('Extra profile information for author box', 'ascend');?></h3>
		
		<table class="form-table">
	  		<tr>
	    		<th>
	    			<label for="occupation">
	    				<?php _e('Occupation', 'ascend');?>
	    			</label>
	    		</th>
	    		<td>
	      			<input type="text" name="occupation" id="occupation" value="<?php echo esc_attr( get_the_author_meta( 'occupation', $user->ID ) ); ?>" class="regular-text" /><br />
	      			<span class="description"><?php _e('Please enter your Occupation.', 'ascend');?></span>
	    		</td>
	  		</tr>
	  		<tr>
		    	<th>
		    		<label for="twitter">Twitter</label>
		    	</th>
	    		<td>
	      			<input type="text" name="twitter" id="twitter" value="<?php echo esc_attr( get_the_author_meta( 'twitter', $user->ID ) ); ?>" class="regular-text" /><br />
	      			<span class="description"><?php _e('Please enter your Twitter username.', 'ascend'); ?></span>
	    		</td>
	  		</tr>
	    	<tr>
	    		<th>
	    			<label for="facebook">Facebook</label></th>
	    		<td>
			      	<input type="text" name="facebook" id="facebook" value="<?php echo esc_attr( get_the_author_meta( 'facebook', $user->ID ) ); ?>" class="regular-text" /><br />
			      	<span class="description"><?php _e('Please enter your Facebook url. (be sure to include http://)', 'ascend'); ?></span>
	    		</td>
	  		</tr>
	    	<tr>
		    	<th>
		    		<label for="google">Google Plus</label>
		    	</th>
		    	<td>
		      		<input type="text" name="google" id="google" value="<?php echo esc_attr( get_the_author_meta( 'google', $user->ID ) ); ?>" class="regular-text" /><br />
		      		<span class="description"><?php _e('Please enter your Google Plus url. (be sure to include http://)', 'ascend'); ?></span>
		    	</td>
	  		</tr>
	   		<tr>
	    		<th>
	    			<label for="youtube">YouTube</label>
	    		</th>
	    		<td>
		      		<input type="text" name="youtube" id="youtube" value="<?php echo esc_attr( get_the_author_meta( 'youtube', $user->ID ) ); ?>" class="regular-text" /><br />
		      		<span class="description"><?php _e('Please enter your YouTube url. (be sure to include http://)', 'ascend'); ?></span>
		    	</td>
		  	</tr>
	    	<tr>
		    	<th>
		    		<label for="flickr">Flickr</label>
		    	</th>
		    	<td>
		      		<input type="text" name="flickr" id="flickr" value="<?php echo esc_attr( get_the_author_meta( 'flickr', $user->ID ) ); ?>" class="regular-text" /><br />
		      		<span class="description"><?php _e('Please enter your Flickr url. (be sure to include http://)', 'ascend'); ?></span>
		    	</td>
		  	</tr>
	    	<tr>
	    		<th>
	    			<label for="vimeo">Vimeo</label>
	    		</th>
		    	<td>
		      		<input type="text" name="vimeo" id="vimeo" value="<?php echo esc_attr( get_the_author_meta( 'vimeo', $user->ID ) ); ?>" class="regular-text" /><br />
		      		<span class="description"><?php _e('Please enter your Vimeo url. (be sure to include http://)', 'ascend'); ?></span>
		    	</td>
		  	</tr>
	    	<tr>
		    	<th>
		    		<label for="linkedin">Linkedin</label>
		    	</th>
		    	<td>
		      		<input type="text" name="linkedin" id="linkedin" value="<?php echo esc_attr( get_the_author_meta( 'linkedin', $user->ID ) ); ?>" class="regular-text" /><br />
		      		<span class="description"><?php _e('Please enter your Linkedin url. (be sure to include http://)', 'ascend'); ?></span>
		    	</td>
		  	</tr>
	    	<tr>
		    	<th>
		    		<label for="dribbble">Dribbble</label>
		    	</th>
		    	<td>
		      		<input type="text" name="dribbble" id="dribbble" value="<?php echo esc_attr( get_the_author_meta( 'dribbble', $user->ID ) ); ?>" class="regular-text" /><br />
		      		<span class="description"><?php _e('Please enter your Dribbble url. (be sure to include http://)', 'ascend'); ?></span>
		    	</td>
		  	</tr>
		    <tr>
		    	<th>
		    		<label for="pinterest">Pinterest</label>
		    	</th>
		    	<td>
		      		<input type="text" name="pinterest" id="pinterest" value="<?php echo esc_attr( get_the_author_meta( 'pinterest', $user->ID ) ); ?>" class="regular-text" /><br />
		      		<span class="description"><?php _e('Please enter your Pinterest url. (be sure to include http://)', 'ascend'); ?></span>
		    	</td>
		  	</tr>
		  	<tr>
		    	<th>
		    		<label for="instagram">Instagram</label>
		    	</th>
	    		<td>
	      			<input type="text" name="instagram" id="instagram" value="<?php echo esc_attr( get_the_author_meta( 'instagram', $user->ID ) ); ?>" class="regular-text" /><br />
	      			<span class="description"><?php _e('Please enter your Instagram url. (be sure to include http://)', 'ascend'); ?></span>
	    		</td>
	  		</tr>
		</table>
	<?php
	} 
}

add_action( 'personal_options_update', 'ascend_save_extra_profile_fields' );
add_action( 'edit_user_profile_update', 'ascend_save_extra_profile_fields' );

function ascend_save_extra_profile_fields( $user_id ) {
    if ( !current_user_can( 'edit_user', $user_id ) )
        return false;
  	update_user_meta( $user_id, 'occupation', $_POST['occupation'] );
    update_user_meta( $user_id, 'twitter', $_POST['twitter'] );
  	update_user_meta( $user_id, 'facebook', $_POST['facebook'] );
  	update_user_meta( $user_id, 'google', $_POST['google'] );
  	update_user_meta( $user_id, 'youtube', $_POST['youtube'] );
  	update_user_meta( $user_id, 'flickr', $_POST['flickr'] );
  	update_user_meta( $user_id, 'vimeo', $_POST['vimeo'] );
  	update_user_meta( $user_id, 'linkedin', $_POST['linkedin'] );
  	update_user_meta( $user_id, 'dribbble', $_POST['dribbble'] );
  	update_user_meta( $user_id, 'pinterest', $_POST['pinterest'] );
  	update_user_meta( $user_id, 'instagram', $_POST['instagram'] );
}