<?php 
/*
* template tag file
*/

// banner strip tag
function spasalon_page_banner_strip(){
	
	$current_options = wp_parse_args(  get_option( 'spa_theme_options', array() ), spasalon_default_data() );
	$call_us         = $current_options['call_us'];
	$call_us_text    = $current_options['call_us_text']; 
	
	$h1 = '';
	$h2 = '';
	
	Global $post;
	
	$spasalon_meta = array();
	
	if( is_front_page() || is_home() ){
		$spasalon_meta         = get_post_meta( get_option('page_for_posts') ,'_spasalon_meta', TRUE );
	}else{
	$spasalon_meta         = get_post_meta( get_the_ID() ,'_spasalon_meta', TRUE );
	}
	
	if( is_404() ){
		$h1              = $current_options['banner_title_one_404'];
		$h2              = $current_options['banner_title_two_404'];
		$bd              = $current_options['banner_description_404'];
		//$spasalon_meta['banner_enable']=true;
		$spasalon_meta=true;
	}
	elseif( is_category() ){
		$h1              = $current_options['banner_title_one_category'];
		$h2              = $current_options['banner_title_two_category'];
		$bd              = $current_options['banner_description_category'];
		//$spasalon_meta['banner_enable']=true;
		$spasalon_meta=true;
	}
	elseif( is_search() ){
		$h1              = $current_options['banner_title_one_search'];
		$h2              = $current_options['banner_title_two_search'];
		$bd              = $current_options['banner_description_search'];
		//$spasalon_meta['banner_enable']=true;
		$spasalon_meta=true;
	}
	elseif( is_tag() ){
		$h1              = $current_options['banner_title_one_tag'];
		$h2              = $current_options['banner_title_two_tag'];
		$bd              = $current_options['banner_description_tag'];
		//$spasalon_meta['banner_enable']=true;
		$spasalon_meta=true;
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
		
		//$spasalon_meta['banner_enable']=true;
		$spasalon_meta=true;
	}
	else{
		
			if ( class_exists( 'WooCommerce' ) ) {
			
				if( is_woocommerce() ){
					$h1              = $current_options['banner_title_one_woo'];
					$h2              = $current_options['banner_title_two_woo'];
					$bd              = $current_options['banner_description_woo'];
					//$spasalon_meta['banner_enable']=true;
					$spasalon_meta=true;
				}
				else{
					
					if(!empty($spasalon_meta)){
						$h1              = ( array_key_exists("heading_one",$spasalon_meta) ? $spasalon_meta['heading_one']        : '' );
						$h2              = ( array_key_exists("heading_two",$spasalon_meta) ? $spasalon_meta['heading_two']        : '' );
						$bd              = ( array_key_exists("banner_description",$spasalon_meta) ? $spasalon_meta['banner_description'] : '' );
						}
						else{
							//$spasalon_meta['banner_enable']=false;
							$spasalon_meta=true;
						}
				}
				
			}else{
					
					if(!empty($spasalon_meta)){
						$h1              = ( array_key_exists("heading_one",$spasalon_meta) ? $spasalon_meta['heading_one']        : '' );
						$h2              = ( array_key_exists("heading_two",$spasalon_meta) ? $spasalon_meta['heading_two']        : '' );
						$bd              = ( array_key_exists("banner_description",$spasalon_meta) ? $spasalon_meta['banner_description'] : '' );
						}
						else{
							//$spasalon_meta['banner_enable']=false;
							$spasalon_meta=true;
						}
				}
		
	}
	
	if( $current_options['spa_bannerstrip_enable']=='yes' )
	{
		//if( isset($spasalon_meta['banner_enable'])==true && ( $h1 != '' || $h2 != '' ) ) {
	if( $spasalon_meta ==true && ( $h1 != '' || $h2 != '' ) ) {
		echo '<section id="spa-page-header">';
			echo '<div class="container">';
			
				echo '<div class="topbar-detail">';
				
					echo '<div class="col-md-3">';
						echo '<div class="title">';
							echo '<h4>'.esc_html($h1).'</h4><h1>'.esc_html($h2).'</h1>';
						echo '</div>';
					echo '</div>';
					
					echo '<div class="col-md-6">';
						echo '<p class="description">'.esc_html($bd).'</p>';
					echo '</div>';
					
					echo '<div class="col-md-3">';
						echo '<div class="addr-detail">';
							echo '<address>'.esc_html($call_us_text).' <strong>'.esc_html($call_us).'</strong></address>';
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
	if(has_post_thumbnail()) {
	if ( is_singular() ) : ?>
		<figure class="post-thumbnail-full">
		<?php the_post_thumbnail(); ?>
		</figure>
		<?php else :
		$post_thumbnail_url = get_the_post_thumbnail( get_the_ID(), 'img-responsive' );
		if ( !empty( $post_thumbnail_url ) ) {
		?>
		<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" class="post-thumbnail width-sm">
				<?php echo $post_thumbnail_url; ?>
		</a>
		<?php
		}
	endif; // End is_singular()
	}}
endif;



function spasalon_get_homepage_product_excerpt($content)
{
		$excerpt = $content;
		$excerpt = strip_tags(preg_replace(" (\[.*?\])",'',$excerpt));
		$excerpt = strip_shortcodes($excerpt);
		$original_len = strlen($excerpt);
		$excerpt = substr($excerpt, 0, 80);
		$len = strlen($excerpt);
		if($original_len > 80) {
			$excerpt = $excerpt;
		return $excerpt.'...';
		}
		else
		{ 
			return $excerpt; 
		}
}

function spasalon_pink_banner_strip() 
{
	
$current_options = wp_parse_args(  get_option( 'spa_theme_options', array() ), spasalon_default_data() );
$call_us         = $current_options['call_us'];
$call_us_text    = $current_options['call_us_text']; 	
if( $current_options['spa_bannerstrip_enable']=='yes' )
	{	
global $wp_query;
$postid = $wp_query->post->ID;
if( is_home() ){
$postid = ( 'page' == get_option( 'show_on_front' ) ? get_option( 'page_for_posts' ) : get_the_ID() );
}
wp_reset_query(); 
if ( get_post_meta($postid, 'spa-page-banner-h1', true) || get_post_meta($postid, 'spa-page-banner-h2', true) || get_post_meta($postid, 'spa-page-description', true) )
{ ?>
<section id="spa-page-header">
		<div class="container">
			<div class="topbar-detail">
			
				<div class="col-md-3">
					<div class="title">
						<?php if( get_post_meta($postid, 'spa-page-banner-h1', true)) : ?>
						<h4><?php echo esc_html(get_post_meta($postid, 'spa-page-banner-h1', true)); ?></h4>
						<?php endif; ?>
						<?php if(get_post_meta($postid,'spa-page-banner-h2', true)): ?>
						<h1><?php echo esc_html(get_post_meta($postid,'spa-page-banner-h2', true)); ?></h1>
						<?php endif; ?>
					</div>
				</div>
				
				<div class="col-md-6">
					<?php if(get_post_meta($postid, 'spa-page-description', true)) :?>
					<p class="description">
					<?php echo esc_html(get_post_meta($postid, 'spa-page-description', true));?>
					</p>
					<?php endif; ?>
				</div>
				<div class="col-md-3">
					<div class="addr-detail">
					<address><?php echo esc_html($call_us_text); ?><strong><?php echo esc_html($call_us); ?></strong></address>
					</div>
				</div>		
			</div>
		</div>
</section>
<div class="clearfix"></div>
<?php
}
} }?>