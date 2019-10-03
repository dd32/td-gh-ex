<?php
/**
 * Additional features to allow styling of the templates
 *
 */
 
///////setup layout for tour pages/////////

add_action( 'template_redirect', 'batourslight_update_layout', 13 );

if ( ! function_exists( 'batourslight_update_layout' ) ) {
    /**
     * Update surrent layout
     * 
     * @return
     */
    function batourslight_update_layout() {
        
        global $post;
        
        if (is_single() && $post->post_type == 'to_book'){
            
            $custom_layout = apply_filters( 'batourslight_page_option', '', 'layout' );
            
            if (!$custom_layout){
                batourslight_Settings::$layout_current = 'no-sidebars-wide';
            }
            
        }
        
        return;
    }

}

//////////////////////////////

add_filter( 'batourslight_style', 'batourslight_style_footer', 10, 2 );

if ( ! function_exists( 'batourslight_style_footer' ) ) {
    /**
     * Patch footer width
     * 
     * @param string $class
     * @param string $region
     * 
     * @return string
     */
    function batourslight_style_footer($class, $region) {
        
        if ( $region == 'sidebar-footer-left' || $region == 'sidebar-footer-middle' || $region == 'sidebar-footer-right') {
           $class .= ' col-sm-12 text-center text-md-left';
        }
        
        return $class;
    }

}

///////Content styling////////

add_filter( 'batourslight_style', 'batourslight_style_content', 10, 2 );

if ( ! function_exists( 'batourslight_style_content' ) ) {
    /**
     * Get sidebar for selected widget area
     * 
     * @param string $sidebar_name
     * @param string $region
     * 
     * @return string
     */
    function batourslight_style_content( $class, $region ) {
        
        if ($region == 'content'){
            
           if (batourslight_Settings::$layout_current == 'frontpage' || batourslight_Settings::$layout_current == 'no-sidebars-wide') {
            $class = 'container-fluid';
            }
            
            $class .= ' '.batourslight_Settings::$layout_current;
            
        }
        
        return $class;
    }

}

////////////////////////////////////

add_filter( 'batourslight_column_width', 'batourslight_column_width_content', 'content', 10, 2 );

if ( ! function_exists( 'batourslight_column_width_content' ) ) {
    /**
     * Filtering class for wide template
     * 
     * @param string $sidebar_name
     * @param string $region
     * 
     * @return string
     */
    function batourslight_column_width_content( $class, $region ) {
        
        if ($region == 'content' && (batourslight_Settings::$layout_current == 'frontpage' || batourslight_Settings::$layout_current == 'no-sidebars-wide')){
            
            $class = '';
            
        }
        
        return $class;
        
    }
    
}    

//////Primary menu items//////
add_filter('walker_nav_menu_start_el', 'batourslight_primary_menu_items', 10, 4);

if ( ! function_exists( 'batourslight_primary_menu_items' ) ) {
    /**
     * Styling primary menu items.
     * 
     * @param string $item_output
	 * @param object $item Menu item data object.
	 * @param int $depth Depth of menu item. Used for padding.
	 * @param object $args
     * 
     * @return string
     */
    function batourslight_primary_menu_items( $item_output, $item, $depth, $args ) {
        
        if ($args->theme_location == 'primary' && $item->menu_item_parent == 0){
            $item_output .= '
            <div class="menu-top-border"></div>';
        }
        
        return $item_output;
    }

}

//////////////////////////////
add_action('wp_head', 'batourslight_remove_auto_p', 10);

if ( ! function_exists( 'batourslight_remove_auto_p' ) ) {
    /**
     * Remove auto p from front page.
     * 
     * @return
     */
    function batourslight_remove_auto_p() {
        
        if ( is_front_page() && is_main_query() ) {
           remove_filter( 'the_content', 'wpautop' );
        }
        
        return;
    }

}

//////////////////////////////
add_filter( 'batourslight_copyright_text', 'batourslight_copyright_text', 10, 1);

if ( ! function_exists( 'batourslight_copyright_text' ) ) :
/**
 * Get the footer copyright text.
 */
function batourslight_copyright_text($content) {

	$text = apply_filters( 'batourslight_option', '', 'copyrights' );
    
    $text = $text ? $text : __( 'Copyright &copy; {year}, {sitename}', 'ba-tours-light' );
    
    $text = str_replace(
		array( '{sitename}', '{year}' ),
		array( get_bloginfo( 'sitename' ), date_i18n( 'Y' ) ),
		$text
	);
    
	return wp_kses_post( $text );
}
endif;

//////Comments////////////////

if ( ! function_exists( 'batourslight_comment_callback' ) ) {
    /**
     * Template for comments and pingbacks.
     *
     * Used as a callback by wp_list_comments() for displaying the comments.
     */
    function batourslight_comment_callback( $comment, $args, $depth ) {
       // $GLOBALS['comment'] = $comment;
       
        if ( class_exists( 'BABE_Post_types' ) ) {
       
        $comment_rating_arr = BABE_Rating::get_comment_rating($comment->comment_ID);
        
        $comment_rating = !empty($comment_rating_arr) ? BABE_Rating::comment_stars_rendering($comment->comment_ID) : '';
        
        } else {
            $comment_rating = '';
        }
        

        if ( 'pingback' == $comment->comment_type || 'trackback' == $comment->comment_type ) : ?>

            <li id="comment-<?php comment_ID(); ?>" <?php comment_class( 'media' ); ?>>
            <div class="comment-body">
                <?php esc_attr_e( 'Pingback:', 'ba-tours-light' ); ?> <?php comment_author_link(); ?> <?php edit_comment_link( __( 'Edit', 'ba-tours-light' ), '<span class="edit-link">', '</span>' ); ?>
            </div>

        <?php else : ?>

        <li id="comment-<?php comment_ID(); ?>" <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ); ?>>
            <article id="div-comment-<?php comment_ID(); ?>" class="comment-body media mb-4">

                <div class="media-body">
                    <div class="media-body-wrap card">

                        <div class="card-header">
                           <div class="comment-meta">
                             <?php 
                               if ( $args['avatar_size'] != 0 ) {
                                echo get_avatar( $comment, $args['avatar_size'] ); 
                                }
                             ?>
                             <span class="says">
                               <cite class="comment-author-name"><?php comment_author();?></cite>
                               <?php echo wp_kses_post($comment_rating); ?>
                             </span>   
                            </div>
                        </div>

                        <?php if ( '0' == $comment->comment_approved ) : ?>
                            <p class="comment-awaiting-moderation"><?php esc_attr_e( 'Your comment is awaiting moderation.', 'ba-tours-light' ); ?></p>
                        <?php endif; ?>

                        <div class="comment-content card-body">
                            <span class="says">
                                    <time datetime="<?php comment_time( 'c' ); ?>">
                                        <?php 
                                        comment_date();
                                        ?>
                                    </time>
                                <?php edit_comment_link( __( '<span style="margin-left: 5px;" class="glyphicon glyphicon-edit"></span> Edit', 'ba-tours-light'), '<span class="edit-link">', '</span>' ); ?>
                            </span>
                            <?php 
                            remove_filter( 'get_comment_text', array( 'BABE_Rating', 'get_comment_text'), 10, 3);                            
                            comment_text(); 
                            
                            add_filter( 'get_comment_text', array( 'BABE_Rating', 'get_comment_text'), 10, 3);
                            ?>
                        </div><!-- .comment-content -->

                    </div>
                </div><!-- .media-body -->

            </article><!-- .comment-body -->

            <?php
        endif;
    }

}

////////load panels/////////

add_action( 'batourslight_get_panel', 'batourslight_get_panel', 10, 1 );

if ( ! function_exists( 'batourslight_get_panel' ) ) {
    /**
     * Get sidebar for selected widget area
     * 
     * @param string $sidebar_name
     * 
     * @return
     */
    function batourslight_get_panel( $sidebar_name ) {
        
        if (isset(batourslight_Settings::$sidebars[$sidebar_name]) && is_active_sidebar($sidebar_name)){
            
            $sidebar_width = isset(batourslight_Settings::$layout_vars['width'][$sidebar_name]) ? batourslight_Settings::$layout_vars['width'][$sidebar_name] : 12;
            
            if ($sidebar_width){
                
                $sidebar_width_class = $sidebar_name == 'footer-left' || $sidebar_name == 'footer-middle' || $sidebar_name == 'footer-right' ? 'col-md-'.$sidebar_width : 'col-lg-'.$sidebar_width;
                
                if ($sidebar_name == 'before-header' || $sidebar_name == 'header' || $sidebar_name == 'before-footer' || $sidebar_name == 'footer'){
                    $sidebar_width_class = '';
                }
                
                //// we use 'include' to make variables $sidebar_width_class and $sidebar_name accessable inside template
                include( locate_template( 'template-parts/sidebar.php', false, false ) ); // phpcs:ignore WPThemeReview.CoreFunctionality.FileInclude.FileIncludeFound
                
            }
            
        }
        
        return;
    }

}

//////////////////////////////////////////////////
/**
 * BA Book Everything plugin is required.
 */
if ( class_exists( 'BABE_Post_types' ) ) {
    
//add_filter( 'wp_nav_menu_items', 'batourslight_custom_menu_item', 10, 2 );

if ( ! function_exists( 'batourslight_custom_menu_item' ) ) {
    /**
     * Adding My-account links to main menu.
     *
     * @param string $items
     * @param obj $args
     * 
     * @return string
     */
    function batourslight_custom_menu_item( $items, $args ) {
        
        if ($args->theme_location == 'primary') {
            
            global $post;
            
            $add_classes = (is_page() && $post->ID == intval(BABE_Settings::$settings['my_account_page'])) ? ' current-menu-item active' : '';
            
            $items .= '<li class="menu-item-my-account '.$add_classes.'"><a href="'. BABE_Settings::get_my_account_page_url() .'"><i class="fas fa-user-circle"></i></a>
               <div class="menu-top-border"></div>
            </li>';
        }
        
        return $items;
    }
    
}

	
	//////////////////////////////////////////////////
	add_action( 'batourslight_entry_header', 'batourslight_entry_header', 10 );

	if ( ! function_exists( 'batourslight_entry_header' ) ) {

		//////////////////////////////////////////////////
		/**
		* Adds tour info block to the entry header.
		* 
		* @param string $post_type
		*
		* @return null
		*/
		function batourslight_entry_header( $post_type ) {
			
            global $post;
			$output = '';
			
			if ( is_single() && BABE_Post_types::$booking_obj_post_type == $post_type ) {
				
				$output .= '
                '.batourslight_tour_info();
			}
			
            $output = apply_filters( 'batourslight_tour_entry_header', $output, $post_type);
            
			echo wp_kses_post($output);
			
			return;
		}
	}
    
	///////////////////////////////////////////
	

	if ( ! function_exists( 'batourslight_tour_info' ) ) {
		
		//////////////////////////////////////////////////
		/**
		* Creates tour info block.
		* 
		* @return string
		*/
		function batourslight_tour_info() {
			
			global $post;
			
			$babe_post = BABE_Post_types::get_post($post->ID);
			
			$tour_info = '';
            
            $taxonomies = apply_filters( 'batourslight_option', '', 'taxonomies_on_tour_page' );
				
			if ( ! empty( $taxonomies ) ) {
				$tour_info .= '
					<div class="tour_info_terms">
						' . batourslight_tour_terms( $post->ID, $taxonomies, 'icon_text', false ) . '
					</div>
				';
			}
            
            ///////////title section
            
            $tour_info .= '
            <div class="tour_info_group">
               <div class="tour_info_group_title">
               ';
            
            if (isset($babe_post['address']['address']) && $babe_post['address']['address']){
				
				$map_href = isset($babe_post['meeting_points']) && isset($babe_post['meeting_place']) && $babe_post['meeting_place'] == 'point' ? '#block_meeting_points' : '#block_address_map';
				
				$address = apply_filters('translate_text', $babe_post['address']['address']);        
				$tour_info .= '
					<h2 class="tour_info_address">
						<i class="fas fa-map-marker-alt"></i>
                        <!-- Button trigger modal -->
						<span class=""><a href="#block_address_map_modal" data-toggle="modal" data-target="#block_address_map_modal">'.$address.'</a></span>
                    </h2>
                    <!-- Modal -->
<div class="modal fade" id="block_address_map_modal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-body">
        '.BABE_html::block_address_map( $babe_post ).'
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">'.__( 'Close', 'ba-tours-light' ).'</button>
      </div>
    </div>
  </div>
</div>
				';
			}
			
			$tour_info .= isset($babe_post['code']) && $babe_post['code'] ? '<div class="item_code">'.__( 'Tour Code:', 'ba-tours-light' ).' <strong><span itemprop="productID">'.$babe_post['code'].'</span></strong></div>' : '';
				
			$tour_info .= BABE_Rating::post_stars_rendering($post->ID);
            
            if (!empty($babe_post['schedule'])){
                
                $week_days = '';
                
                foreach(BABE_Calendar_functions::get_week_days_arr_2() as $day_num => $day_name){
                    $week_day_class = isset($babe_post['schedule'][$day_num]) ? ' active' : '';
                    
                    $week_days .= '<span class="tour_info_schedule_day'.$week_day_class.'">' . $day_name . '</span>';
                }
                
                $tour_info .= '
                                <div class="tour_info_schedule">
									<div class="tour_info_schedule_days">
                                       ' . $week_days . '
                                    </div>
								</div>
                                ';
            }
            
            $tour_info .= '
              </div>
              ';
            
            ///////////////// price
            
            $tour_info .= '
               <div class="tour_info_group_price">
               ';
               
            $prices = BABE_Post_types::get_post_price_from($post->ID);   
            
            $price_old = $prices['discount_price_from'] < $prices['price_from'] ? '<span class="tour_info_price_old">' . BABE_Currency::get_currency_price( $prices['price_from'] ) . '</span>' : '';
				
				$discount = $prices['discount'] ? '<div class="tour_info_price_discount">-' . $prices['discount'] . '%</div>' : '';
				
			$tour_info .= '
                                <div class="tour_info_price">
									<label class="content-light">' . __( 'from', 'ba-tours-light' ) . '</label>
									' . $price_old . '
									<span class="tour_info_price_new">' . BABE_Currency::get_currency_price( $prices['discount_price_from'] ) . '</span>
                                   ' . $discount . ' 
								</div>
                                ';
                                
            $tour_info .= '<div class="tour_info_book_now">
                <a class="btn btn-red" href="#booking_form_block">' . __( 'Book now', 'ba-tours-light' ) . '</a>
                </div>';                    
			
			$tour_info .= '
              </div>
              ';
              
            $tour_info .= '
              </div>
              ';
              
            /////////////////////////////////    
			
			$tour_info .= '<div class="tour_info_icons gray-background">';
            
            $times_arr = BABE_Post_types::get_post_av_times($babe_post);
            
            if (!empty($times_arr)){
                
                $tour_info .= '
                <div class="tour_info_av">
					<i class="far fa-clock"></i>
					<span class="">'.implode(', ', $times_arr).'</span>
					<label>'.__( 'Start time', 'ba-tours-light' ).'</label>
				</div>
                ';
                
            }
				
			$tour_info .= '
				<div class="tour_info_duration">
					<i class="fas fa-hourglass"></i>
					<span class="">'.BABE_Post_types::get_post_duration($babe_post).'</span>
					<label>'.__( 'Duration', 'ba-tours-light' ).'</label>
				</div>
			';
			
			if (isset($babe_post['age_restriction']) && $babe_post['age_restriction']){       
				$tour_info .= '
					<div class="tour_info_age_restriction">
						<i class="fas fa-male"></i>
						<span class="">'.apply_filters('translate_text', $babe_post['age_restriction']).'</span>
						<label>'.__( 'Age', 'ba-tours-light' ).'</label>
					</div>
				';
			}
			
			$tour_info .= '</div>';
			
			$tour_info = apply_filters( 'batourslight_content_tour_info', $tour_info, $post->ID, $babe_post);
			
			$output = '
				<div class="front_top_block tour_page_tour_info">
					<div class="front_top_bg_inner">
						<div id="batourslight-tour-info-inner" class="front_top_inner container">
							' . $tour_info . '
						</div>
					</div>
				</div>
			';
			
			return $output;
		}
	}
	
	//////////////////////////////////////////////////
	add_action( 'cmb2_booking_obj_after_prices', 'batourslight_cmb2_booking_obj_after_prices', 10, 3 );

	if ( ! function_exists( 'batourslight_cmb2_booking_obj_after_prices' ) ) {
		
		//////////////////////////////////////////////////
		/**
		* Adds ages comment field.
		* 
		* @param object $cmb
		* @param string $prefix
		* @param object $category
		* 
		* @return null
		*/
		function batourslight_cmb2_booking_obj_after_prices( $cmb, $prefix, $category ) {
			
			$cmb->add_field( array(
				'name'       => __( 'Age restriction', 'ba-tours-light' ),
				'id'         => $prefix . 'age_restriction_' . $category->slug,
				'type'       => 'text',
				'desc'       => __( 'Any, 18+, 7+ years, etc.', 'ba-tours-light' ),
				'default'    => __( '7+ years', 'ba-tours-light' ),
				'attributes' => array(
					'data-conditional-id'    => $prefix . BABE_Post_types::$categories_tax,
					'data-conditional-value' => $category->slug,
				),
			) );
			
			return;
		}
	}
	
	

	//////////////////////////////////////////////////
	add_filter( 'babe_init_unitegallery_settings', 'batourslight_unitegallery_settings' );

	if ( ! function_exists( 'batourslight_unitegallery_settings' ) ) {
		
		//////////////////////////////////////////////////
		/**
		* Filters unitegallery settings.
		* 
		* @param array $unitegallery_settings
		*
		* @return array
		*/
		function batourslight_unitegallery_settings( $unitegallery_settings ) {
			
			$unitegallery_settings['gallery_width'] = '100%';
			
			$unitegallery_settings['gallery_height'] = 620;
            
            $unitegallery_settings['gallery_mousewheel_role'] = 'none';
            
            //$unitegallery_settings['slider_control_zoom'] = false;
			
			$unitegallery_settings['thumb_overlay_color'] = '#000000';
			
			$unitegallery_settings['thumb_overlay_opacity'] = 0;
			
			$unitegallery_settings['thumb_width'] = 160;
			
			$unitegallery_settings['thumb_height'] = 100;
            
            $unitegallery_settings['thumb_border_width'] = 1;
			
			$unitegallery_settings['thumb_border_color'] = '#ffffff';
			
			$unitegallery_settings['thumb_selected_border_width'] = 5;
			
			$unitegallery_settings['thumb_selected_border_color'] = apply_filters( 'batourslight_color', '#cccccc', 'color_links' );
			
			$unitegallery_settings['strip_thumbs_align'] = 'center';
			
			$unitegallery_settings['strippanel_padding_top'] = 16;
			
			$unitegallery_settings['strip_space_between_thumbs'] = 24;
			
			$unitegallery_settings['strippanel_padding_left'] = 40;
			
			$unitegallery_settings['strippanel_padding_right'] = 40;
			
			$unitegallery_settings['strippanel_padding_bottom'] = 16;
			
			$unitegallery_settings['strippanel_background_color'] = apply_filters( 'batourslight_color', '#ffffff', 'color_bg_gray' );
			
			$unitegallery_settings['strippanel_enable_buttons'] = false;
			
			$unitegallery_settings['strippanel_padding_buttons'] = 20;
			
			
			return $unitegallery_settings;
		}
	}
    
    //////////////////////////////////////////////////
    
    if ( ! function_exists( 'batourslight_turnoff_sassy_social_share' ) ) {
		
		//////////////////////////////////////////////////
		/**
		* Patch for class-sassy-social-share-public.
		* 
        * @param obj $post
		* @param string $content
		*
		* @return string
		*/
		function batourslight_turnoff_sassy_social_share( $post ) {
		     return 1;
		}
	
    }
	
	//////////////////////////////////////////////////
    
    ///////////////////////////////////////////////////
    add_filter( 'the_content', 'batourslight_post_content', 100, 1 );
    /**
	 * Add content to booking_obj page.
     * @param string $content
     * @return string
	 */
    function batourslight_post_content($content){
        global $post;
        $output = $content;

        if (is_single() && in_the_loop() && is_main_query()){
          if ($post->post_type == BABE_Post_types::$booking_obj_post_type){  
            
            $babe_post = BABE_Post_types::get_post($post->ID);
            if (!empty($babe_post)){
              remove_filter( 'the_content', 'batourslight_post_content', 100, 1 );
              $output = apply_filters( 'batourslight_post_content', $content, $post->ID, $babe_post);
            }
          }           
        }
        
        return $output; 
    }
    
    //// replace BA Book Everything content filter by theme one
	remove_filter( 'babe_post_content', array( 'BABE_html', 'babe_post_content'), 10, 3 );
	
	add_filter( 'batourslight_post_content', 'batourslight_tour_post_content', 10, 3 );

	if ( ! function_exists( 'batourslight_tour_post_content' ) ) {
		
		//////////////////////////////////////////////////
		/**
		* Creates tour post content.
		* 
		* @param string $content
		* @param int $post_id
		* @param array $post
		*
		* @return string
		*/
		function batourslight_tour_post_content( $content, $post_id, $post ) {
		  
          //// avoid the doubling of the "sharing block"
          add_filter( 'heateor_sss_disable_sharing', 'batourslight_turnoff_sassy_social_share' );
			
			$rules_cat = BABE_Booking_Rules::get_rule_by_obj_id( $post_id );
			
			$output = '';
            
            $output .= '
				<div class="front_top_block tour_page_tour_content">
					<div class="front_top_bg_inner">
						<div class="front_top_inner container">
							' . $content . '
						</div>
					</div>
				</div>
			';
            
            //$output .= $content;
			
			$slides = BABE_html::block_slider( $post );
			
			$output .= '
				<div class="front_top_block tour_page_slideshow">
					<div class="front_top_bg_inner">
						<div class="front_top_inner">
							' . $slides . '
						</div>
					</div>
				</div>
			';
			
			$output .= apply_filters( 'batourslight_tour_content_after_slideshow', '', $content, $post_id, $post );
			
            /*
			$output .= '<h2 class="babe_post_content_title">' . __( 'Calendar & Prices', 'ba-tours-light' ) . '</h2>' . BABE_html::block_calendar( $post );
            */
            
			/*
			$output .= batourslight_button_mobile( __( 'Book now', 'ba-tours-light' ), '#widget-babe-booking-form' );
			*/
            
			$output .= apply_filters( 'babe_post_content_after_calendar', '', $content, $post_id, $post );
			
			
			$block_steps = BABE_html::block_steps( $post );
            
            if ($block_steps){
                
                $output .= '
				<div class="front_top_block tour_page_steps">
					<div class="front_top_bg_inner">
						<h2 class="babe_post_content_title container">' . __( 'Details', 'ba-tours-light' ) . '</h2>
						<div class="front_top_inner container">
							' . $block_steps . '
						</div>
					</div>
				</div>
			';
                
            }
			
			$block_faq = BABE_html::block_faqs( $post );
			
			$faq_title = isset( $rules_cat['category_meta']['categories_faq_title'] ) && ! empty( $rules_cat['category_meta']['categories_faq_title'] ) ? $rules_cat['category_meta']['categories_faq_title'] : __( 'Questions & Answers', 'ba-tours-light' );
            
            if ($block_faq){
                
                $output .= '
				<div class="front_top_block tour_page_faq">
					<div class="front_top_bg_inner gray-background">
						<h2 class="babe_post_content_title container">' . $faq_title . '</h2>
						<div class="front_top_inner container">
							' . $block_faq . '
						</div>
					</div>
				</div>
			';
                
            }
			
            
            $output .= '
				<div class="front_top_block tour_page_booking_form">
					<div class="front_top_bg_inner">
						<h2 class="babe_post_content_title container">' . __( 'Book this tour', 'ba-tours-light' ) . '</h2>
						<div class="front_top_inner container">
							' . BABE_html::booking_form($post_id) . '
						</div>
					</div>
				</div>
			';
            
            /*			
			
			$block_meeting_points = BABE_html::block_meeting_points( $post );
			
			$output .= $block_meeting_points ? '<h2 class="babe_post_content_title">' . __( 'Meeting points', 'ba-tours-light' ) . '</h2>' . $block_meeting_points : '<h2 class="babe_post_content_title">' . __( 'Map', 'ba-tours-light' ) . '</h2>' . BABE_html::block_address_map( $post );
            */
			
			/*
			$block_services = BABE_html::block_services( $post );
			
			$services_title = isset( $rules_cat['category_meta']['categories_services_title'] ) && ! empty( $rules_cat['category_meta']['categories_services_title'] ) ? $rules_cat['category_meta']['categories_services_title'] : __( 'Services', 'ba-tours-light' );
			$output .= $block_services ? '<h2 class="babe_post_content_title">' . $services_title . '</h2>' . $block_services : '';
			*/
			    
			
            /*
			$output .= batourslight_button_mobile( __( 'Book now', 'ba-tours-light' ), '#widget-babe-booking-form' );
            */
            
            //// restore previous, remove theme filter
            remove_filter( 'heateor_sss_disable_sharing', 'batourslight_turnoff_sassy_social_share' );
			
			return $output; 
		}
	}

	//////////////////////////////////////////////////
    //////////////////Booking form//////////////////
    
    ///////////////////////////////////////////////
    
add_filter('babe_booking_form_html', 'batourslight_booking_form', 10, 4);
if ( ! function_exists( 'batourslight_booking_form' ) ) {
/**
	 * Filter booking form
     * 
     * @param string $content
     * @param array $babe_post
     * @param array $input_fields
     * @param string $after_hidden_fields
     * 
     * @return string
	 */
    function batourslight_booking_form($content, $babe_post, $input_fields, $after_hidden_fields){
        
        $output = '';
        
            $post_id = $babe_post['ID'];
            
            $action = 'to_checkout';
            
            ///// get rules
            $rules_cat = BABE_Booking_Rules::get_rule_by_obj_id($post_id);
            
            ///// get av times
            $av_times = BABE_Post_types::get_post_av_times($babe_post);
            
            /////////date fields
            
            $date_from = isset($_GET['date_from']) && $_GET['date_from'] ? wp_unslash($_GET['date_from']) : ''; // phpcs:ignore WordPress.Security.ValidatedSanitizedInput.MissingUnslash,WordPress.Security.ValidatedSanitizedInput.InputNotSanitized
            
            $date_from = $date_from && BABE_Calendar_functions::isValidDate($date_from, BABE_Settings::$settings['date_format']) ? $date_from : '';
            
            $input_fields = array();
            
            $input_fields = apply_filters('babe_booking_form_before_date_from', $input_fields, $babe_post, $av_times, $rules_cat);
         
            $input_fields[] = '
            <div class="booking-form-block booking-date-block">
               <label class="booking_form_input_label">'.__('Date and time', 'ba-tours-light').'</label>
               <div class="booking-date">
                   <i class="fas fa-calendar" aria-hidden="true"></i>
				   <input type="text" class="booking_date" id="booking_date_from" name="booking_date_from" value="'.$date_from.'" placeholder="" data-post-id="'.$post_id.'">
                   <div id="booking-times" class="booking-date-times">
			       </div>
			   </div>
            </div>';
            
            $input_fields = apply_filters('babe_booking_form_after_date_from', $input_fields, $babe_post, $av_times, $rules_cat);
            
            //////////////Guests fields/////////
            
            $guests_title = $rules_cat['rules']['booking_mode'] == 'tickets' ? __('Tickets', 'ba-tours-light') : __('Guests', 'ba-tours-light');
            
            //// get AV tickets
            $guests_output = __('please, select date first', 'ba-tours-light');
            
            $input_fields[] = '
            <div class="booking-form-block booking-guests-block">
            <label class="booking_form_input_label">'.$guests_title.'</label>
            <div id="booking-guests-result">
            '.$guests_output.'
            </div>
            </div>';
            
            $input_fields = apply_filters('babe_booking_form_after_guests', $input_fields, $babe_post, $av_times, $rules_cat);
            
            ////////////Meeting points///////////
            
            if (!empty($babe_post) && isset($babe_post['meeting_points']) && isset($babe_post['meeting_place']) && $babe_post['meeting_place'] == 'point'){
            
            $meeting_points = BABE_Post_types::get_post_meeting_points($babe_post);
           
             if (!empty($meeting_points)){
                $meeting_points_output = array();
              foreach($meeting_points as $point_id => $meeting_point){      
                $meeting_points_output[] = '<div class="booking_meeting_point_line">
                <input type="radio" class="booking_meeting_point" name="booking_meeting_point" value="'.$point_id.'" id="booking_meeting_point_'.$point_id.'" data-point-id="'.$point_id.'">
                <label for="booking_meeting_point_'.$point_id.'">'.implode(', ', $meeting_point['times']).' - <a href="'.$meeting_point['permalink'].'" target="_blank" open-mode="modal" data-obj-id="'.$point_id.'" data-lat="'.$meeting_point['lat'].'" data-lng="'.$meeting_point['lng'].'" data-address="'.$meeting_point['address'].'" >'.$meeting_point['address'].'</a></label>
              </div>';
              }
              
              $input_fields[] = apply_filters('babe_booking_form_meeting_points', '<div class="booking-form-block booking-meeting-point">
              <label class="booking_form_input_label">'.__('Select meeting point', 'ba-tours-light'). '</label>
                <div class="booking_meeting_points">
                '.implode(' ', $meeting_points_output).'
                </div>
              </div>', $meeting_points_output, $meeting_points, $babe_post, 0);
              
              $input_fields = apply_filters('babe_booking_form_after_meeting_points', $input_fields, $babe_post, $av_times, $rules_cat);
            
             } //// end if !empty($meeting_points) 
           }
           
           ////////////////////////////////////
            
            $input_fields = apply_filters('babe_booking_form_input_fields', $input_fields, $babe_post, $av_times, $rules_cat);
            
            $after_hidden_fields = apply_filters('babe_booking_form_after_hidden_fields', '', $babe_post, $av_times, $rules_cat);
            
            $output .= '<form id="booking_form" name="booking_form" method="post" action="" data-post-id="'.$post_id.'">
            
            <div class="input_group">
            
            '.implode('', $input_fields).'
            
            </div>
            
            <div id="total_group">
                <label class="booking_form_input_label">'.__('Total:', 'ba-tours-light').'</label>
                <div id="booking_form_total">
                </div>
            </div>
            
            <div id="error_group">
                <label class="booking_form_error_label">'.__('Please fill in all the data.', 'ba-tours-light').'</label>
            </div>
            
            <input type="hidden" name="booking_obj_id" value="'.$post_id.'">
            <input type="hidden" name="action" value="'.$action.'">
            '.$after_hidden_fields.'
            
            <div class="submit_group">
               
               <button class="btn button booking_form_submit" data-post-id="'.$post_id.'"><i class="fa fa-shopping-cart" aria-hidden="true"></i>'.__('Book Now', 'ba-tours-light').'</button>
               
            </div>
            
            </form>';      
        
        return $output; 
    }
    
    }

///////////////////////////////
	
	//////////////////////////////////////////////////
	if ( ! function_exists( 'batourslight_button_mobile' ) ) {
		
		//////////////////////////////////////////////////
		/**
		* Creates button for mobile screens.
		* 
		* @param string $title
		* @param string $url
		* @param string $classes
		* 
		* @return string
		*/
		function batourslight_button_mobile( $title, $url, $classes = '' ) {
			
			$output = '';
			
			$output .= '
				<div class="button-mobile-block">
					<a href="' . $url . '" class="btn button' . $classes . '">' . $title . '</a>
				</div>
			';
			
			return $output;
		}
	}
	

	//////////////////////////////////////////////////
	if ( ! function_exists( 'batourslight_tour_terms' ) ) {
		
		//////////////////////////////////////////////////
		/**
		* Gets tour terms.
		* 
		* @param int $post_id
		* @param array $taxonomies - array of taxonomy slugs
		* @param string $style - icon_text, icon, text
		* @param boolean $with_title
		* @param string $classes
		* 
		* @return string
		*/
		function batourslight_tour_terms( $post_id, $taxonomies = array(), $style = 'icon_text', $with_title = false, $classes = '' ) {
			
			$output = '';
			
			$divider = $style == 'text' ? ', ' : '';
			
			$terms = BABE_Post_types::get_post_terms( $post_id );
			
			if ( ! empty( $terms ) ) {
				
				foreach ( $terms as $taxonomy_slug => $taxonomy_terms ) {
					
					if (
						isset( $taxonomy_terms['terms'] ) &&
						(
							empty( $taxonomies ) ||
							( ! empty( $taxonomies ) && isset( $taxonomies[ $taxonomy_slug ] ) && $taxonomies[ $taxonomy_slug ] )
						)
					) {
						
						$results = array();
						
						$taxonomy_title = $with_title ? ( $style != 'text' ? '<h3 class="batourslight_terms_block_title">' . $taxonomy_terms['name'] . '</h3>' : '<label class="batourslight_terms_block_title">' . $taxonomy_terms['name'] . ':</label>' ) : '';
						
						foreach( $taxonomy_terms['terms'] as $term ) {
							
							$term_output = '';
							
							if (
								( $style == 'icon_text' || $style == 'icon') &&
								( $term['image_id'] || ( isset( $term['fa_class'] ) && $term['fa_class'] ) )
							) {
							
								if ( $term['fa_class'] ) {	
									// Fontawesome.
									$term_output = '
										<div class="batourslight_term_icon">
											<i class="' . $term['fa_class'] . '"></i>
											<div class="batourslight_term_name">' . $term['name'] . '</div>
										</div>
									';	
								} else {
									// Image.
									$src_arr = wp_get_attachment_image_src( $term['image_id'], 'full' );
									
									$term_output = '
										<div class="batourslight_term_img">
											<img src="'.$src_arr[0].'">
											<div class="batourslight_term_name">'.$term['name'].'</div>
										</div>
									';
								}
								
							} elseif ( $style == 'text' ) {
								
								$term_output = $term['name'];
							}
							
							
							$term_output = apply_filters( 'batourslight_tour_term_html', $term_output, $term, $style, $taxonomy_slug, $post_id, $taxonomies );
							
							if ( $term_output ) {
								
								$results[] = $term_output;
							}
						}
						
						
						$result_row = implode( $divider, $results );
						
						$result_row = $style != 'text' && $with_title ? '<div class="batourslight_terms_block_inner">' . $result_row . '</div>': $result_row;
						
						$output .= $taxonomy_title . $result_row;
					}
				}
			
			
				$output = '
					<div class="batourslight_terms_block batourslight_terms_' . $style . ' ' . $classes . '">
						' . ( $with_title ? $output : '<div class="batourslight_terms_block_inner">' . $output . '</div>' ) . '
					</div>
				';
			}
			
			return $output;
		}
	}

	
	
	//////////////////////////////////////////////////
	if ( ! function_exists( 'batourslight_tour_term_icons' ) ) {
		//////////////////////////////////////////////////
		/**
		 * Gets tour term icons.
		 * 
		 * @param int $post_id
		 * @param array $taxonomies - array of taxonomy slugs
		 * 
		 * @return string
		 */
		function batourslight_tour_term_icons( $post_id, $taxonomies = array() ) {
			
			$output = '';
			
			$divider = '';
			
			$terms = BABE_Post_types::get_post_terms( $post_id );
			
			if ( ! empty( $terms ) && ! empty( $taxonomies ) ) {
				
				foreach ( $terms as $taxonomy_slug => $taxonomy_terms ) {
					
					if ( isset( $taxonomy_terms['terms'] ) && isset( $taxonomies[ $taxonomy_slug ] ) && $taxonomies[ $taxonomy_slug ] ) {
						
						$results = array();
						
						foreach( $taxonomy_terms['terms'] as $term ) {
							
							$term_output = '';
							
							if ( $term['image_id'] || ( isset( $term['fa_class'] ) && $term['fa_class'] ) ) {
								if ( $term['fa_class'] ) {		
									// Fontawesome.
									$term_output = '
										<div class="batourslight_preview_term_icon" title="'.$term['name'].'">
											<i class="' . $term['fa_class'] . '"></i>
										</div>
									';
									
								} else {
									// Image.
									$src_arr = wp_get_attachment_image_src( $term['image_id'], 'full' );
									
									$term_output = '
										<div class="batourslight_preview_term_img">
											<img src="' . $src_arr[0] . '">
										</div>
									';
								}
							}
							
							if ( $term_output ) {
								$results[] = $term_output;
							}
						}
						
						$output .= implode( $divider, $results );
					}   
				}
			}
			
			
			return $output;
		}
	}
    
    //////////////////////////////////////////////////
    
	if ( ! function_exists( 'batourslight_get_term_icon' ) ) {
		//////////////////////////////////////////////////
		/**
		 * Gets term icon.
		 * 
		 * @param int $term_id
		 * @param string $taxonomy
		 * 
		 * @return string
		 */
		function batourslight_get_term_icon( $term_id, $taxonomy ) {
			
			$output = '';
            
            $image_id = get_term_meta($term_id, 'image_id', 1);
            $fa_class = get_term_meta($term_id, 'fa_class', 1);
            
            if ( $fa_class ) {
				// Fontawesome.
				$output .= '
					<div class="batourslight_preview_term_icon">
						<i class="' . $fa_class . '"></i>
					</div>
				';
									
			} elseif ($image_id) {
									
				// Image.
				$src_arr = wp_get_attachment_image_src( $image_id, 'full' );
									
				$output .= '
					<div class="batourslight_preview_term_img">
						<img src="' . $src_arr[0] . '">
					</div>
					';
			}			
			
			return $output;
		}
	}
    
    //////////////////////////////////////////////////
    add_filter('babe_get_terms_hierarchy_term_name', 'batourslight_term_name_add_icon', 10, 3);
    if ( ! function_exists( 'batourslight_term_name_add_icon' ) ) {
		
		//////////////////////////////////////////////////
		/**
		 * Adds icon to term name.
		 * 
		 * @param string $term_name
         * @param int $term_id
         * @param array $args
		 * 
		 * @return string
		 */
		function batourslight_term_name_add_icon( $term_name, $term_id, $args ) {
		  
            if ($args['class'] == 'babe-search-filter-terms'){
                $term_name = batourslight_get_term_icon( $term_id, $args['taxonomy'] ).$term_name;
            }
            
            return $term_name;
          
		}
        
     }
     
    //////////////////////////////////////////////////
    
    add_action( 'batourslight_get_panel', 'batourslight_search_form', 10, 1);
    
    if ( ! function_exists( 'batourslight_search_form' ) ) {
    
    /**
	 * Output search form html.
     * 
     * @param string $region
     * 
     * @return
	 */
     function batourslight_search_form( $region ){
   
        $output = '';
      
        if ( $region == 'header' && class_exists( 'BABE_Search_From' )){
      
          $output .= BABE_Search_From::render_form('', array(
            'wrapper_class' => 'main-background',
          ));
          
          echo wp_kses($output, batourslight_Settings::$wp_allowedposttags);
        
        }
        
        return; 
   
      }    
	
    }
    
    //////////////////////////////////////////////////
    
    add_filter('babe_search_form_submit_title', 'batourslight_search_form_submit_title', 10, 1);
    
    if ( ! function_exists( 'batourslight_search_form_submit_title' ) ) {
    
    /**
	 * Filters search form button title.
     * 
     * @param string $title
     * 
     * @return
	 */
     function batourslight_search_form_submit_title( $title ){
   
        return ''; 
   
      }    
	
    }
    
    //////////////////////////////////////////////////
    
    add_filter('batours_shortcode_top_tours_items_html', 'batourslight_shortcode_top_tours_items_html', 10, 2);
    
    if ( ! function_exists( 'batourslight_shortcode_top_tours_items_html' ) ) {
    
    /**
	 * Output top tours
     * 
     * @param string $html
     * @param array $post_args
     *  
     * @return string
	 */
     function batourslight_shortcode_top_tours_items_html( $html, $post_args ){
   
        return batourslight_top_tours( $post_args ); 
   
      }    
	
    }
    
    //////////////////////////////////////////////////
	if ( ! function_exists( 'batourslight_top_tours' ) ) {
		
		//////////////////////////////////////////////////
		/**
		 * Gets search result for front page.
		 * 
		 * @param array $args
		 * 
		 * @return string
		 */
		function batourslight_top_tours( $args = array()) {
			
			$output = '';
			
			$args = wp_parse_args( $args, array(
				'date_from'      => '', // d/m/Y or m/d/Y format
				'date_to'        => '',
				'categories'     => array(), // term_taxonomy_ids from categories
				'terms'          => array(), // term_taxonomy_ids from custom taxonomies in $taxonomies_list
				'paged'          => 1,
				'posts_per_page' => 10
			));
            
            $posts = BABE_Post_types::get_posts( $args );
			
			$thumbnail = 'batourslight_thumbnail';
			
			$excerpt_length = 19;
			
			$taxonomies = apply_filters('batourslight_option', '', 'tour_preview_taxonomies');
			
			
			foreach( $posts as $post ) {
				$output .= batourslight_tour_tile_view( $post, $thumbnail, $taxonomies, $excerpt_length );
			}
			
			
			return $output;
		}
	}
    
    /////////////////////////////////////////////
    
    if ( ! function_exists( 'batourslight_tour_tile_view' ) ) {
		
		//////////////////////////////////////////////////
		/**
		 * Gets tour tile view.
		 * 
		 * @param array $post - BABE post
         * @param string $thumbnail
         * @param array $taxonomies
         * @param int $excerpt_length
		 * 
		 * @return string
		 */
		function batourslight_tour_tile_view( $post, $thumbnail, $taxonomies, $excerpt_length = 19 ) {
		     
             $output = '';
             
             $image_html = wp_get_attachment_image( get_post_thumbnail_id( $post['ID'] ), $thumbnail );
				
				$placeholder_url = apply_filters( 'batourslight_image_url', null, 'placeholder_img.png' );
                
                $item_url = BABE_Functions::get_page_url_with_args($post['ID'], $_GET);
				
				$image = $image_html ? '<a href="' . $item_url . '">' . $image_html . '</a>' : '<a href="' . $item_url . '"><img src="' . $placeholder_url . '"></a>';
				
				
				$price_old = $post['discount_price_from'] < $post['price_from'] ? '<span class="tour_info_price_old">' . BABE_Currency::get_currency_price( $post['price_from'] ) . '</span>' : '';
				
				$discount = $post['discount'] ? '<div class="tour_info_price_discount">-' . $post['discount'] . '%</div>' : '';
				
				
				$babe_post = BABE_Post_types::get_post( $post['ID'] );
				
				$tour_duration = '
					<div class="tour_info_duration">
						<i class="fas fa-hourglass"></i>
						' . BABE_Post_types::get_post_duration( $babe_post ) . '
					</div>
				';
				
				
				$icons = ! empty( $taxonomies ) ? $tour_duration . '
					<div class="tour_info_preview_icons">
						' . batourslight_tour_term_icons( $post['ID'], $taxonomies ) . '
					</div>
				' : '';
                
				$output .= '
					<div class="block_top_tours">
						<div class="block_top_tours_inner">
							<div class="search_res_img">
								'.$image.'
							</div>
							<div class="search_res_text">
                                <div class="search_res_title">
                                   <h3><a href="' . $item_url . '">' . $post['post_title'] . '</a></h3>
                                   ' . BABE_Rating::post_stars_rendering( $post['ID'] ) . '
                                </div>
								<div class="tour_info_price">
									<label class="content-light">' . __( 'from', 'ba-tours-light' ) . '</label>
									' . $price_old . '
									<span class="tour_info_price_new">' . BABE_Currency::get_currency_price( $post['discount_price_from'] ) . '</span>
                                   ' . $discount . ' 
								</div>
								
								<div class="search_res_description">
                                    <div class="search_res_tags_line">
										' . $icons . '
									</div>
									' . BABE_Post_types::get_post_excerpt( $post, $excerpt_length ) . '
								</div>
							</div>
						</div>
					</div>
				';
                
                return $output;
             
		}
        
     }   

	//////////////////////////////////////////////////
    add_filter( 'babe_search_result_view_full', 'batourslight_search_result_view_tiles', 10, 3 );
    
    if ( ! function_exists( 'batourslight_search_result_view_tiles' ) ) {
		
		//////////////////////////////////////////////////
		/**
		 * Styling search results.
		 * 
		 * @param string $content
         * @param array $post - BABE post
         * @param string $image
		 * 
		 * @return string
		 */
		function batourslight_search_result_view_tiles( $content, $post, $image ) {
		    
            $output = '';
            
            $thumbnail = 'batourslight_thumbnail';
			
			$taxonomies = apply_filters('batourslight_option', '', 'tour_preview_taxonomies');
            
            $output .= batourslight_tour_tile_view( $post, $thumbnail, $taxonomies, 19 );
          
            return $output;
		}
	
    }

	if ( ! function_exists( 'batourslight_search_result_view_full' ) ) {
		
		//////////////////////////////////////////////////
		/**
		 * Styling search results.
		 * 
		 * @param string $content
         * @param array $post
         * @param string $image
		 * 
		 * @return string
		 */
		function batourslight_search_result_view_full( $content, $post, $image ) {
		    
            $output = '';
            
            $thumbnail = 'batourslight_thumbnail';
            
            $excerpt_length = 27;
			
			$taxonomies = apply_filters('batourslight_option', '', 'tour_preview_taxonomies');
            
            $image_srcs = wp_get_attachment_image_src( get_post_thumbnail_id( $post['ID'] ), $thumbnail );
            $placeholder_url = apply_filters( 'batourslight_image_url', '', 'placeholder_img.png' );
            
            $image = $image_srcs ? '<a href="' . esc_url(get_permalink( $post['ID'] )) . '"><img src="' . $image_srcs[0] . '"></a>' : '<a href="' . esc_url(get_permalink( $post['ID'] )) . '"><img src="' . $placeholder_url . '"></a>';
            
            $price_old = $post['discount_price_from'] < $post['price_from'] ? '<span class="tour_info_price_old">' . BABE_Currency::get_currency_price( $post['price_from'] ) . '</span>' : '';
				
			$discount = $post['discount'] ? '<div class="tour_info_price_discount">-' . $post['discount'] . '%</div>' : '';
            
            $babe_post = BABE_Post_types::get_post( $post['ID'] );
            
            $tour_duration = '
					<div class="tour_info_duration">
						<i class="fas fa-hourglass"></i>
						' . BABE_Post_types::get_post_duration( $babe_post ) . '
					</div>
			';
            
            $icons = ! empty( $taxonomies ) ? '
					<div class="tour_info_preview_icons">
						' . batourslight_tour_term_icons( $post['ID'], $taxonomies ) . '
					</div>
			' : '';
            
            $output .= '
            <div class="block_search_res">
            <div class="search_res_img">
            '.$image.'
            </div>
            <div class="search_res_text">
               <div class="tour_info_price">
			      ' . $price_old . '
				  <span class="tour_info_price_new">' . BABE_Currency::get_currency_price( $post['discount_price_from'] ) . '</span>
			   </div>
		       ' . $discount . '
              <h3 class="search_res_title"><a href="'.esc_url(get_permalink($post['ID'])).'">
              '.$post['post_title'].'
              </a></h3>
              <div class="search_res_description">
              ' . BABE_Rating::post_stars_rendering( $post['ID'] ) . '
              '.BABE_Post_types::get_post_excerpt($post, $excerpt_length).'
                  <div class="search_res_tags_line">
					  ' . $tour_duration . '
					  ' . $icons . '
				  </div>
              </div>
              <div class="search_res_actions">
              </div>
            </div>
           </div>
           ';
          
          
            return $output;
		}
	
    }
    
	//////////////////////////////////////////////////
	add_filter( 'body_class', 'batourslight_body_custom_class', 10, 1 );

	if ( ! function_exists( 'batourslight_body_custom_class' ) ) {
		
		//////////////////////////////////////////////////
		/**
		 * Adds classes to body.
		 * 
		 * @param array $classes
		 * 
		 * @return array
		 */
		function batourslight_body_custom_class( $classes ) {
		  
            if (batourslight_Settings::$layout_has_sidebars){
                $classes[] = 'sidebars-content'; 
            } else {
                $classes[] = 'no-sidebar-left';
                $classes[] = 'no-sidebar-right';
            }
            
			return $classes;
		}
	}
    
    ////////////////////////////////////////////////////////////
	
	////////////////////////////////////////////////////////////
	//// End if class exist.
	////////////////////////////////////////////////////////////
}

//////////////////////////////////////////////////
    add_action( 'batourslight_pagination', 'batourslight_pagination', 10 );

	if ( ! function_exists( 'batourslight_pagination' ) ) {
		
		//////////////////////////////////////////////////
		/**
		 * Adds pagination.
		 *  
		 * @return
		 */
		function batourslight_pagination() {
		  
            the_posts_pagination( array(
					'prev_text' => __( 'Previous', 'ba-tours-light' ).'<span class="screen-reader-text">' . __( 'Previous page', 'ba-tours-light' ) . '</span>',
					'next_text' => '<span class="screen-reader-text">' . __( 'Next page', 'ba-tours-light' ) . '</span>'.__( 'Next', 'ba-tours-light' ) ,
					'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'ba-tours-light' ) . ' </span>',
		    ) );
            
            return;
        
        }
    }

///////////////////////////////////////////////
    add_filter( 'excerpt_more', 'batourslight_excerpt_read_more', 10, 1 );

	if ( ! function_exists( 'batourslight_excerpt_read_more' ) ) {
		
		//////////////////////////////////////////////////
		/**
         * Filter the "read more" excerpt string link to the post.
         * 
         * @param string $more "Read more" excerpt string.
         * 
         * @return string (Maybe) modified "read more" excerpt string.
         */
		function batourslight_excerpt_read_more( $more ) {
		  
           return '';
          
		}
        
    }

/////////////////////////////    
    

