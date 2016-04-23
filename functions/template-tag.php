<?php 
/*
* template tag file
*/

// banner strip tag
function page_banner_strip(){
	
	$current_options = wp_parse_args(  get_option( 'spa_theme_options', array() ), default_data() );
	$call_us         = $current_options['call_us'];
	$call_us_text    = $current_options['call_us_text']; 
	
	$h1 = '';
	$h2 = '';
	
	Global $post;
	
	$my_meta = array();
	
	if( is_front_page() || is_home() ){
		$my_meta         = get_post_meta( get_option('page_for_posts') ,'_my_meta', TRUE );
	}else{
	$my_meta         = get_post_meta( get_the_ID() ,'_my_meta', TRUE );
	}
	
	if( is_404() ){
		$h1              = $current_options['banner_title_one_404'];
		$h2              = $current_options['banner_title_two_404'];
		$bd              = $current_options['banner_description_404'];
		$my_meta['banner_enable']=true;
	}
	elseif( is_category() ){
		$h1              = $current_options['banner_title_one_category'];
		$h2              = $current_options['banner_title_two_category'];
		$bd              = $current_options['banner_description_category'];
		$my_meta['banner_enable']=true;
	}
	elseif( is_search() ){
		$h1              = $current_options['banner_title_one_search'];
		$h2              = $current_options['banner_title_two_search'];
		$bd              = $current_options['banner_description_search'];
		$my_meta['banner_enable']=true;
	}
	elseif( is_tag() ){
		$h1              = $current_options['banner_title_one_tag'];
		$h2              = $current_options['banner_title_two_tag'];
		$bd              = $current_options['banner_description_tag'];
		$my_meta['banner_enable']=true;
	}
	elseif( is_archive() ){
		
		if( get_post_type( get_the_ID() )=='product'){
			$h1              = $current_options['banner_title_one_woo'];
			$h2              = $current_options['banner_title_two_woo'];
			$bd              = $current_options['banner_description_woo'];
		}
		else{
			$h1              = $current_options['banner_title_one_author'];
			$h2              = $current_options['banner_title_two_author'];
			$bd              = $current_options['banner_description_author'];
		}
		
		$my_meta['banner_enable']=true;
	}
	else{
		
			if ( class_exists( 'WooCommerce' ) ) {
			
				if( is_woocommerce() ){
					$h1              = $current_options['banner_title_one_woo'];
					$h2              = $current_options['banner_title_two_woo'];
					$bd              = $current_options['banner_description_woo'];
					$my_meta['banner_enable']=true;
				}
				else{
					
					if(!empty($my_meta)){
						$h1              = ( array_key_exists("heading_one",$my_meta) ? $my_meta['heading_one']        : '' );
						$h2              = ( array_key_exists("heading_two",$my_meta) ? $my_meta['heading_two']        : '' );
						$bd              = ( array_key_exists("banner_description",$my_meta) ? $my_meta['banner_description'] : '' );
						}
						else{
							$my_meta['banner_enable']=false;
						}
				}
				
			}else{
					
					if(!empty($my_meta)){
						$h1              = ( array_key_exists("heading_one",$my_meta) ? $my_meta['heading_one']        : '' );
						$h2              = ( array_key_exists("heading_two",$my_meta) ? $my_meta['heading_two']        : '' );
						$bd              = ( array_key_exists("banner_description",$my_meta) ? $my_meta['banner_description'] : '' );
						}
						else{
							$my_meta['banner_enable']=false;
						}
				}
		
	}
	
	if( $current_options['spa_bannerstrip_enable']=='yes' )
	{
		if( isset($my_meta['banner_enable'])==true && ( $h1 != '' || $h2 != '' ) ) {
		
		echo '<section id="spa-page-header">';
			echo '<div class="container">';
			
				echo '<div class="topbar-detail">';
				
					echo '<div class="col-md-3">';
						echo '<div class="title">';
							echo '<h4>'.$h1.'</h4><h1>'.$h2.'</h1>';
						echo '</div>';
					echo '</div>';
					
					echo '<div class="col-md-6">';
						echo '<p class="description">'.$bd.'</p>';
					echo '</div>';
					
					echo '<div class="col-md-3">';
						echo '<div class="addr-detail">';
							echo '<address>'.$call_us_text.' <strong>'.$call_us.'</strong></address>';
						echo '</div>';
					echo '</div>';		
				echo '</div>';
				
			echo '</div>';
		echo '</section>';

		echo '<div class="clearfix"></div>';
		
		}
	}
	
	
}


if ( ! function_exists( 'spasalon_post_thumbnail' ) ) :
function spasalon_post_thumbnail() {
	
	if ( post_password_required() || is_attachment() || ! has_post_thumbnail() ) {
		return;
	}

	if ( is_singular() ) :
	
		 if( is_page_template('blog-left-sidebar.php') || is_page_template('blog-right-sidebar.php') || is_page_template('blog-full.php') ){
			?>
			<a class="post-thumbnail width-sm" href="<?php the_permalink(); ?>" >
				<?php the_post_thumbnail(); ?>
			</a>
			<?php
		 }else{
	?>
		<figure class="post-thumbnail-full">
		<?php the_post_thumbnail(); ?>
		</figure>
		
	<?php } 
		 
	else : ?>

	<a class="post-thumbnail width-sm" href="<?php the_permalink(); ?>" >
		<?php the_post_thumbnail(); ?>
	</a>

	<?php endif; // End is_singular()
}
endif;