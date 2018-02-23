<?php

	/*
	* Custom template tags for this theme
	*/

	//get the post display category (for slider and template parts )
	function anorya_get_post_display_category($postID){
		
		if(get_post_status($postID)){ // if post exist non false string will be returned
				
			$post_categories = get_the_category($postID);
			if( is_array($post_categories)){ 
				if(count($post_categories) > 1){
					foreach($post_categories as $key=>$value){ //if category is not one of the slider used categories
						if(  $value->term_id != get_theme_mod( 'anorya_slider_posts_category_setting','ALL') 
						  && $value->term_id != get_theme_mod( 'anorya_footer_slider_posts_category_setting','ALL')){
							return $value->name;
							break;
						}	  
					}	
				}
				else{
					if(isset($post_categories[0]->name)){
						return $post_categories[0]->name;
					}
					else{
						return false;
					}	
				}		
			}
			else{
				return false;
			}	
		}
		else{
			return false;
		}
		
	}	
	
	//get the footer slider post - WP-query
	function anorya_footer_slider_items(){
		
		$slider_category = get_theme_mod( 'anorya_footer_slider_posts_category_setting','ALL');
		if($slider_category == 'ALL' || !$slider_category ){
			$args = array(	'posts_per_page' => esc_html(get_theme_mod( 'anorya_footer_sliders_posts_no_setting',4)));
		}
		else{
			$args = array(	'cat' => $slider_category,
							'posts_per_page' => esc_html(get_theme_mod( 'anorya_footer_sliders_posts_no_setting',4)));
		}	
		
				
		$query = new WP_Query( $args );
 		if ( $query->have_posts() ) : 
			while ( $query->have_posts() ) :
				$query->the_post(); ?>
				<?php if ( has_post_thumbnail() ) : ?>
					<div class="footer-slider-item">
						<a href="<?php print esc_url(the_permalink());?>">
						<?php   the_post_thumbnail('anorya_small', array('class'=>'img-responsive')); ?>
						</a>
					</div>
				<?php endif; ?>				
			<?php endwhile; 
		endif;
		wp_reset_postdata();	
				
	}			
	
	//get the main featured slider items/posts - WP-query
	function anorya_main_slider_items(){
		
		$slider_category = get_theme_mod( 'anorya_slider_posts_category_setting','ALL');
		if($slider_category == 'ALL' || !$slider_category ){
			$args = array(	'posts_per_page' => esc_html(get_theme_mod( 'anorya_slider_posts_number_setting',4)));
		}
		else{
			$args = array(	'cat' => $slider_category,
							'posts_per_page' => esc_html(get_theme_mod( 'anorya_slider_posts_number_setting',4)));
		}	
		
		//get slider type
		if(get_theme_mod( 'anorya_slider_type_setting','standard') == 'standard'){
			$anorya_slider_item_class = 'slider2-item'; // 3 items standard slider
		}
		else{
			$anorya_slider_item_class = 'slider1-item'; // 1 item - full width slider
		}		
				
		$query = new WP_Query( $args );
 		if ( $query->have_posts() ) : 
			while ( $query->have_posts() ) :
				$query->the_post(); ?>
				<?php if ( has_post_thumbnail() ) : ?>
					<div class="<?php print esc_html($anorya_slider_item_class); ?>">
						<?php if($anorya_slider_item_class == 'slider2-item'){
							  the_post_thumbnail('anorya_large', array('class'=>'img-responsive'));	
						}
						else{	
							  the_post_thumbnail('anorya_large', array('class'=>'img-responsive'));
						}	?>
					  
					<div class="slider-item-overlay">
						<div class="slider-post-title">
							<h1><a href="<?php the_permalink(); ?>"><?php print the_title(); ?></a></h1>
						</div>	
						<p class="slider-post-date-desc"><?php print __('Posted On ','anorya'); ?>
						<span class="slider-post-date"><?php print get_the_date('F j, Y',$query->post->ID);?></span>
						<?php print __('In ','anorya'); ?>
						<span class="slider-post-date"><?php echo esc_html( anorya_get_post_display_category($query->post->ID) );?></span>
						</p>   
						<a href="<?php print esc_url(the_permalink());?>" class="slider-post-button-container btn btn-primary"><?php print __('Read More','anorya'); ?></a>
					</div>
				</div>
				<?php endif;			
			 endwhile; 
		endif;
		wp_reset_postdata();	
				
	}
	
	// Flush out the transients used in anorya_categorized_blog.
	function anorya_category_transient_flusher() {
		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
			return;
		}
		// Like, beat it. Dig?
		delete_transient( 'anorya_categories' );
	}
	add_action( 'edit_category', 'anorya_category_transient_flusher' );
	add_action( 'save_post',     'anorya_category_transient_flusher' );
	
	
	// Adds a class of group-blog to blogs with more than 1 published author.
	function anorya_body_classes( $classes ) {
		if ( is_multi_author() ) {
			$classes[] = 'group-blog';
		}

		// Adds a class of hfeed to non-singular pages.
		if ( ! is_singular() ) {
			$classes[] = 'hfeed';
		}

		return $classes;
	}
	add_filter( 'body_class', 'anorya_body_classes' );

	// Add a pingback url auto-discovery header for singularly identifiable articles.
	function anorya_pingback_header() {
		if ( is_singular() && pings_open() ) {
			echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
		}
	}
	add_action( 'wp_head', 'anorya_pingback_header' );
	
	
	//get and display similar posts - used in single post
	function anorya_related_posts(){
	
		$post_id = get_the_ID();
		$anorya_post_tags_ids = array();
	
		$tags = wp_get_post_tags($post_id);
		if ($tags && !is_wp_error( $tags )) {
			foreach ( $tags as $value ) {
				array_push( $anorya_post_tags_ids, $value->term_id );
			}
		
			$args = array('tag__in' => $anorya_post_tags_ids,
						'post_type' => get_post_type( $post_id ),
						'posts_per_page' => '3',
						'post__not_in' => array( $post_id ));
		
					
			$query = new WP_Query( $args );
 
			if ( $query->have_posts() ) : ?>
			
			
				<div class="row similar-posts">
					<h2><?php print __('You may also like','anorya'); ?> </h2>
				
				<?php	while ( $query->have_posts() ) :
 
							$query->the_post(); ?>
							<div class="col-md-4 col-sm-4 col-xs-12 similar-post">
								<div class="grid-post-img-container">
									<?php 
										if( has_post_thumbnail()){
											 the_post_thumbnail('anorya_medium', array('class' => 'img-responsive')); 
										}	?>
								</div>
								<?php the_title( '<a href="' . esc_url( get_permalink() ) . '" rel="bookmark"><h4>', '</h4></a>' ); ?>

							</div>
				<?php	endwhile; ?>
				</div>
			<?php endif;
			wp_reset_postdata();				
		}
	
	}
	
	//get main content container css class and d
	function anorya_main_content_class($content_type)
	{
		if(isset($content_type)){
			switch($content_type){
				case 'HOME':
						if(get_theme_mod( 'anorya_home_sidebar_setting', 'hidden' ) == 'left' ||
						   get_theme_mod( 'anorya_home_sidebar_setting', 'hidden' ) == 'right'){
							return 'col-md-8 col-sm-7';	
							break;
					    }
						else{
							return 'col-md-12';	
							break;
						}  
				case 'ARCHIVES':
						if(get_theme_mod( 'anorya_archives_sidebar_setting', 'hidden' ) == 'left' ||
						   get_theme_mod( 'anorya_archives_sidebar_setting', 'hidden' ) == 'right'){
							return 'col-md-8 col-sm-7';	
							break;
					    }
						else{
							return 'col-md-12';	
							break;
						}
				case 'SINGLE':
						if(get_theme_mod( 'anorya_single_post_sidebar_setting', 'hidden' ) == 'left' ||
						   get_theme_mod( 'anorya_single_post_sidebar_setting', 'hidden' ) == 'right'){
							return 'col-md-8 col-sm-7';	
							break;
					    }
						else{
							return 'col-md-12';	
							break;
						}
				case 'PAGE':
						if(get_theme_mod( 'anorya_single_page_sidebar_setting', 'hidden' ) == 'left' ||
						   get_theme_mod( 'anorya_single_page_sidebar_setting', 'hidden' ) == 'right'){
							return 'col-md-8 col-sm-7';	
							break;
					    }
						else{
							return 'col-md-12';	
							break;
						}
				case 'SEARCH':
						if(get_theme_mod( 'anorya_search_sidebar_setting', 'hidden' ) == 'left' ||
						   get_theme_mod( 'anorya_search_sidebar_setting', 'hidden' ) == 'right'){
							return 'col-md-8 col-sm-7 anorya-search-results';	
							break;
					    }
						else{
							return 'col-md-12  anorya-search-results';	
							break;
						}
				default:
						return 'col-md-12';	
							break;
			}	
		}
		else	
			return 'col-md-12';
		
	}
	
	//get sidebar setting
	function anorya_get_sidebar_display_setting()
	{
		if(is_home() || is_front_page()){
			if(get_theme_mod( 'anorya_home_sidebar_setting', 'hidden' )){
				return get_theme_mod( 'anorya_home_sidebar_setting', 'hidden');
			}
			else{
				return false;
			}	
		}
		else if(is_archive() || is_category() || is_tag()){
			if(get_theme_mod( 'anorya_archives_sidebar_setting', 'hidden' )){
				return get_theme_mod( 'anorya_archives_sidebar_setting', 'hidden');
			}
			else{
				return false;
			}	
		}
		else if(is_single()){
			if(get_theme_mod( 'anorya_single_post_sidebar_setting', 'hidden' )){
				return get_theme_mod( 'anorya_single_post_sidebar_setting', 'hidden');
			}
			else{
				return false;
			}	
		}
		else if(is_page()){
			if(get_theme_mod( 'anorya_single_page_sidebar_setting', 'hidden' )){
				return get_theme_mod( 'anorya_single_page_sidebar_setting', 'hidden');
			}
			else{
				return false;
			}	
		}
		else if(is_search()){
			if(get_theme_mod( 'anorya_search_sidebar_setting', 'hidden' )){
				return get_theme_mod( 'anorya_search_sidebar_setting', 'hidden');
			}
			else{
				return false;
			}	
		}
		else{
			if(get_theme_mod( 'anorya_search_sidebar_setting', 'hidden' )){
				return get_theme_mod( 'anorya_search_sidebar_setting', 'hidden');
			}
			else{
				return false;
			}	
		}	
	}
	
	//display the list of social icons set in customizer
	function anorya_social_links_list_display()
	{
		
		
		//facebook
		if( get_theme_mod( 'anorya_facebook_link_setting', '' ) != '' ): ?>
		<li><a href="<?php print esc_url_raw(get_theme_mod( 'anorya_facebook_link_setting')); ?>"><i class="fa fa-facebook" ></i></a></li> 
		<?php endif; 
		
		//twitter						
		if(get_theme_mod( 'anorya_twitter_link_setting', '' ) != ''):?>
		<li><a href="<?php print esc_url_raw(get_theme_mod( 'anorya_twitter_link_setting')); ?>"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
		<?php endif; 
								
		// google plus
		if(get_theme_mod( 'anorya_google_plus_link_setting', '' ) != ''):?>
		<li><a href="<?php print esc_url_raw(get_theme_mod( 'anorya_google_plus_link_setting')); ?>"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
		<?php endif; 
								
		//linkedin
		if(get_theme_mod( 'anorya_linkedin_link_setting', '' ) != ''):?>
		<li><a href="<?php print esc_url_raw(get_theme_mod( 'anorya_linkedin_link_setting')); ?>"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
		<?php endif; 								
							
		//instagram
		if(get_theme_mod( 'anorya_instagram_link_setting', '' ) != ''):?>
		<li><a href="<?php print esc_url_raw(get_theme_mod( 'anorya_instagram_link_setting')); ?>"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
		<?php endif; 								
							
		//youTube
		if(get_theme_mod( 'anorya_youtube_link_setting', '' ) != ''):?>
		<li><a href="<?php print esc_url_raw(get_theme_mod( 'anorya_youtube_link_setting')); ?>"><i class="fa fa-youtube-play" aria-hidden="true"></i></a></li>
		<?php endif; 
	}

	//get the posts categories - used for customizer slider settings
	function anorya_get_post_slider_categories()
	{
		//get posts categories
		$anorya_categories_choices = array( 'ALL' => 'All Categories');
		$categories = get_categories( array ('orderby' => 'name','order' => 'ASC','taxonomy' => 'category'));
		foreach( $categories as $key => $value ){
			$value = $value->to_array(); //turn Wp_Term object to array
			$anorya_categories_choices = $anorya_categories_choices + array( $value['term_id'] => $value['name']);
		}
		return $anorya_categories_choices;
	}
	
	//display home promo boxes
	function anorya_home_promo_box( $box_identifier){ // integer param, can be only 1,2 or 3
		
		$box_identifier = absint($box_identifier);
		
		if($box_identifier >=1 && $box_identifier <= 3){
			$output = '<div class="promo-box-image-container">';
			$output .=  '<a href="'.esc_url_raw(get_theme_mod('anorya_promobox'.$box_identifier.'_url_setting','#')).'">';
			
			if(get_theme_mod('anorya_promobox'.$box_identifier.'_image_setting')):
				$output .= '<img class="img-responsive" src="'.esc_url_raw(get_theme_mod('anorya_promobox'.$box_identifier.'_image_setting','Image')).'" ';
				$output .= ' alt="'.esc_html(get_theme_mod('anorya_promobox'.$box_identifier.'_title_setting','Read More')).'"/></a>';
			else: 
				$output .= '<img class="img-responsive"  src="'.get_template_directory_uri().'/assets/images/promobox'.$box_identifier.'.jpg"'; 
				$output .= ' alt="'.esc_attr(get_bloginfo( 'name', 'display' ) ).'" /></a>';			
			endif;
			$output .= '<div class="promo-box-text">';
			$output .=  '<a href="'.esc_url_raw(get_theme_mod('anorya_promobox'.$box_identifier.'_url_setting','#')).'">';
			$output .= esc_html(get_theme_mod('anorya_promobox'.$box_identifier.'_subtitle_setting','Read More')).'</a>';
			$output .=  '<h4><a href="'.esc_url_raw(get_theme_mod('anorya_promobox'.$box_identifier.'_url_setting','#')).'">';
			$output .= esc_html(get_theme_mod('anorya_promobox'.$box_identifier.'_title_setting','Read More')).'</a></h4>';
			$output .= '</div></div>';
			
			print $output;
		}	
	}
	
	//display social media share buttons
	function anorya_social_share($post_id)
	{
		 ?>
			<a href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>">
				<?php print __('SHARE: ','anorya'); ?>
				<i class="fa fa-facebook" aria-hidden="true"></i>
			</a>
			
			<a href="https://twitter.com/home?status=<?php 
				print esc_html(str_replace(' ','+',get_the_title($post_id))); 
				echo '-'; the_permalink(); ?>">
				<?php print __('TWEET: ','anorya'); ?>
				<i class="fa fa-twitter" aria-hidden="true"></i>
			</a>
			
			<a href="https://plus.google.com/share?url=<?php the_permalink(); ?>">
				<?php print __('+1: ','anorya'); ?>
				<i class="fa fa-google-plus" aria-hidden="true"></i>
			</a>
			
			<a href="https://pinterest.com/pin/create/button/?url=<?php the_permalink();?>&media=<?php get_the_post_thumbnail_url($post_id,'anorya_large');?>&description=<?php print esc_html(str_replace(' ','-',get_the_title($post_id))); ?>">
				<?php print __('PIN: ','anorya'); ?>
				<i class="fa fa-pinterest-p" aria-hidden="true"></i>
			</a> <?php
	}
	
	//display comments number_format
	function anorya_display_comments_number(){ ?>
		<div class="col-md-4 post-comments-meta">
			<i class="fa  fa-comment-o" aria-hidden="true"></i> 
			<?php 
				if(get_comments_number() == 1){
					print __('1 COMMENT','anorya');
				}
				else{
					printf(__('%s COMMENTS','anorya'),get_comments_number());
				}			
			?>
		</div> <?php
	}

	//display logo
	// No longer used since 1.0.2
	function anorya_display_logo(){
		
		if(get_theme_mod( 'anorya_logo_image_setting')): ?>
			<a href="<?php print esc_url_raw(home_url( '/' )); ?>">
				<img class="img-responsive align-center" 
					src="<?php print esc_url_raw(get_theme_mod( 'anorya_logo_image_setting')); ?>" 
					alt="<?php print esc_attr(get_bloginfo( 'name', 'display' ) ); ?>" /></a>
		<?php else: ?>
			<a href="<?php print esc_url_raw(home_url( '/' )); ?>">
					<h1><?php print esc_attr(get_bloginfo( 'name', 'display' ) ); ?></h1>
				</a>
		<?php endif;
	}
	
	//change custom logo class
	function anorya_custom_logo_class($html){
   
		$html = str_replace( 'custom-logo', 'img-responsive align-center', $html );
		return $html;

	}	
	add_filter( 'get_custom_logo', 'anorya_custom_logo_class' );

	//display header banner
	function anorya_display_header_banner(){
		if(get_theme_mod( 'anorya_header_banner_image_setting')): ?>
			<div class="widget">
				<?php if(get_theme_mod( 'anorya_header_banner_link_setting')): ?>
					<a href="<?php print esc_url_raw(get_theme_mod( 'anorya_header_banner_link_setting')); ?>">
				<?php else: ?>	
					<a href="<?php print esc_url_raw(home_url( '/' )); ?>">
				<?php endif; ?>	
				<img class="img-responsive align-center"
						src="<?php print esc_url_raw(get_theme_mod( 'anorya_header_banner_image_setting')); ?>" 
						alt="<?php print esc_attr(get_bloginfo( 'name', 'display' ) ); ?>" /></a>	
			</div>
		<?php else: ?>	
			<div class="widget">
				<?php if(get_theme_mod( 'anorya_header_banner_link_setting')): ?>
					<a href="<?php print esc_url_raw(get_theme_mod( 'anorya_header_banner_link_setting')); ?>">
				<?php else: ?>	
					<a href="<?php print esc_url_raw(home_url( '/' )); ?>">
				<?php endif; ?>	
				<img class="img-responsive align-center" 
					src="<?php print get_template_directory_uri().'/assets/images/header_banner.jpg'; ?>" 
					alt="<?php print esc_attr(get_bloginfo( 'name', 'display' ) ); ?>" /></a>
			</div>
		<?php endif;	
	}	
	
	
?>