<?php
/**
 * Academic Homepage Slider
 * 
 * @since 1.0.0
 */
if ( ! function_exists( 'academic_hub_slider_section' ) ) {
    /**
     * Academic Homepage Slider Section
     * 
     * @since Academib Hub 1.0.0
     */
    function academic_hub_slider_section() {
        /**
         * Academic Hub section
         * @since 1.0.0
         */
        $homepage_slider_section = get_theme_mod('homepage_slider_section');
        ?>
            <!-- banner -->
            <div class="banner">
                <div class="container-fluid">
                <div class="row">
                    <div class="banner-img">
                        <div class="images academic-home-slider-sec">
                            <?php if( !empty($homepage_slider_section)  ): ?>
                                <?php foreach( $homepage_slider_section as $homepage_slider_item ): ?>
                                    <?php
                                        /**
                                         * Homepage Slider
                                         * @since 1.0.0
                                         */
                                        $homepage_slider_img = $homepage_slider_item['slider_images']; 

                                        if( intval($homepage_slider_img) ){
                                            $slider_image = wp_get_attachment_url( $homepage_slider_img );
                                        }else{
                                            $slider_image =  get_template_directory_uri().'/assets/images/slider-item.png';
                                        }   
                                        
                                        
                                    ?>
                                    <div div class="academic-home-slider-item">
                                        <div class="banner-style" style="background-image:url(<?php echo esc_url( $slider_image ); ?>);">
                                            <div class=" container banner-title">
                                                <h2><span><?php echo esc_html( $homepage_slider_item['slider_header_title'] ); ?></span></h2>
                                                <p><?php echo esc_html( $homepage_slider_item['slider_short_desc'] ); ?></p>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                </div>
            </div>
        <?php
        
    }

}
add_action( 'academic_hub_slider', 'academic_hub_slider_section' );


/**
 * Academic Hub Notices
 * 
 * @since 1.0.0
 */
if ( ! function_exists( 'academic_hub_notices_section' ) ) {
    /**
     * Academic Hub Notices Section
     * 
     * @since Academib Hub 1.0.0
     */
    function academic_hub_notices_section() {
        /**
         * Academic Hub section
         * @since 1.0.0
         */
        $academic_hub_notice_title = get_theme_mod('academic_hub_notice_title','Academic Notice');
        $academic_hub_notice_shotdesc = get_theme_mod('academic_hub_notice_shotdesc');
        
        ?>
        <section id="academic_notices" class="academic-notices">
            <!-- academic notice -->
            <div class="notice">
                <div class="container-fluid">
                <div class="row">
                    <div class="notice-wrapper clearfix">
                        <?php if( $academic_hub_notice_title ): ?>
                            <div class="col-md-3 col-sm-3 col-xs-6 academic-title academic-notice">
                                <h2><?php echo esc_html($academic_hub_notice_title); ?></h2>
                            </div>
                        <?php endif; ?>
                        <?php if( $academic_hub_notice_shotdesc ): ?>
                            <div class="col-md-9 col-sm-9 col-xs-6 notice-paragraph">
                                <marquee><?php echo esc_html($academic_hub_notice_shotdesc); ?></marquee>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
                </div>
            </div>
        </section>
        <?php
        
    }

}
add_action( 'academic_hub_notices', 'academic_hub_notices_section' );



/**
 * Academic Hub Special Info
 * 
 * @since 1.0.0
 */
if ( ! function_exists( 'academic_hub_special_info_section' ) ) {
    /**
     * Academic Hub Special Info Section
     * 
     * @since Academib Hub 1.0.0
     */
    function academic_hub_special_info_section() {
        /**
         * Academic Hub section
         * @since 1.0.0
         */
        $academic_hub_spcecial_info_header  = get_theme_mod('academic_hub_spcecial_info_header','Why We Are <span>Special</span>');
        $academic_hub_special_short_desc    = get_theme_mod('academic_hub_special_short_desc');
        $academic_hub_homepage_special_info = get_theme_mod('academic_hub_homepage_special_info');
        
        ?>
        <section id="academic_hub_special_info_section" class="academic-hub-section">
            <div class="special">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 col-xs-12 academic-list">
                            <h2><?php echo wp_kses_post( $academic_hub_spcecial_info_header ); ?></h2>
                            <p><?php echo esc_html( $academic_hub_special_short_desc ); ?></p>
                        </div>
                        <div class=" col-md-12 col-xs-12 special-grid">
                            <div class="row">

                                <?php if( !empty( $academic_hub_homepage_special_info ) ): ?>
                                    <?php foreach( $academic_hub_homepage_special_info as $academic_hub_item ): ?>
                                        <?php
                                        /**
                                         * Academic Hub 
                                         * @since 1.0.0
                                         */
                                        $academic_hub_id = $academic_hub_item['academic_hub_images']; 
                                        
                                        if( intval( $academic_hub_id) ){
                                            $slider_image = wp_get_attachment_url( $academic_hub_id );
                                        }else{
                                            $slider_image = $academic_hub_id;
                                        }
                                        
                                        ?>

                                        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 special-description">
                                            <div class="qualified">
                                                <img src="<?php echo esc_url( $slider_image ); ?>" class="img-resonsive">
                                                <h4><a href="#"><?php echo esc_html( $academic_hub_item['academic_hub_header_title'] ); ?></a></h4>
                                                <p><?php echo esc_html( $academic_hub_item['academic_hub_short_info'] ); ?></p>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                <?php endif; ?>

                            
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </section>
        <?php
        
    }

}
add_action( 'academic_hub_special_info', 'academic_hub_special_info_section' );




/**
 * Academic Hub Our Team
 * 
 * @since 1.0.0
 */
if ( ! function_exists( 'academic_hub_our_teams_section' ) ) {
    /**
     * Academic Hub Our Team Section
     * 
     * @since Academib Hub 1.0.0
     */
    function academic_hub_our_teams_section() {
        /**
         * Academic Hub section
         * @since 1.0.0
         */
        $academic_hub_our_team_title    = get_theme_mod('academic_hub_spcecial_our_team_header_title','Meet Our<span> Founders</span>');
        $academic_hub_our_team_short    = get_theme_mod('academic_hub_our_team_short_desc');
        $academic_hub_our_team = get_theme_mod('academic_hub_our_team');
        
        ?>
        <section id="academic_hub_our_team" class="academic-hub-section">
            <div class="special founders">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 col-xs-12 academic-list">
                            <h2><?php echo wp_kses_post(  $academic_hub_our_team_title ); ?></h2>
                            <p><?php echo esc_html(  $academic_hub_our_team_short ); ?></p>
                        </div>
                    </div>
                </div>

                <?php if( !empty($academic_hub_our_team) ): ?>
                <div class="founders_listing">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12 col-xs-12 founders-grid">
                                <div class="row">
                                    <?php foreach( $academic_hub_our_team as $out_team_item ): ?>
                                        <?php
                                            /**
                                             * Academic Hub 
                                             * @since 1.0.0
                                             */
                                            $our_team_item = $out_team_item['academic_hub_our_team_images']; 
                                            
                                            if( intval( $our_team_item) ){
                                                $our_team_images = wp_get_attachment_url( $our_team_item );
                                            }else{
                                                $our_team_images = $our_team_item;
                                            }
                                        
                                        ?>
                                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 our-founders">
                                            <div class="founders-image">
                                                <img src="<?php echo esc_url( $our_team_images ); ?>" class="img-responsive">
                                                <p class="academic-title"><?php echo esc_html( $out_team_item['academic_hub_our_team_name'] ); ?></p>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                </div>
                <?php endif; ?>

            </div>
        </section>
        <?php
        
    }

}
add_action( 'academic_hub_our_teams', 'academic_hub_our_teams_section' );



/**
 * Academic Hub Event
 * 
 * @since 1.0.0
 */
if ( ! function_exists( 'academic_hub_event_section' ) ) {
    /**
     * Academic Hub Event Section
     * 
     * @since Academib Hub 1.0.0
     */
    function academic_hub_event_section() {
        /**
         * Academic Hub section
         * @since 1.0.0
         */
        $academic_hub_event_title    = get_theme_mod('academic_hub_spcecial_our_team_header_title','Conference And <span>Events</span>');
        $academic_hub_events = get_theme_mod('academic_hub_event_items');
        
        ?>
        <section id="academic_hub_event" class="academic-hub-event-section">
            

            <div class="conference">
                <div class="container">
                    <div class="row">

                        <div class="col-md-12 col-xs-12">
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 conference-list events">
                                <div class="row">
                                    <h2><?php echo wp_kses_post(  $academic_hub_event_title ); ?></h2>
                                </div>
                            </div>
                        </div>

                        <?php if( !empty($academic_hub_events) ): ?>
                        <div class="row">

                            <?php foreach( $academic_hub_events  as $event_item ): ?>
                                <?php
                                    /**
                                     * Academic Hub 
                                     * @since 1.0.0
                                     */
                                    $event_item_id = $event_item['academic_hub_event_images']; 
                                    
                                    if( intval( $event_item_id) ){
                                        $events_images = wp_get_attachment_url( $event_item_id );
                                    }else{
                                        $events_images = $event_item_id;
                                    }
                                
                                    ?>
                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 ">
                                    <div class="conference-content">
                                        <div class="conference-wrapper clearfix">
                                            <div class="event-img">
                                                <img src="<?php echo esc_url($events_images); ?>" class="img-responsive">
                                            </div>
                                            <div class="event-content">
                                                <div class="heading-post">
                                                    <a href="#"><h4><?php echo esc_html( $event_item['academic_hub_event_title'] ); ?></h4></a>
                                                </div>
                                                <div class="event-details">
                                                    <?php echo wp_kses_post( $event_item['academic_hub_event_short'] ); ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                </div>

                                
                        
                        <?php endforeach; ?>
                        
                        </div>
                        <?php endif; ?>


                    </div>
                </div>
            </div>
        </section>
        <?php
        
    }

}
add_action( 'academic_hub_event', 'academic_hub_event_section' );



/**
 * Academic Hub Blog
 * 
 * @since 1.0.0
 */
if ( ! function_exists( 'academic_hub_blog_section' ) ) {
    /**
     * Academic Hub Blog Section
     * 
     * @since Academic Blog
     */
    function academic_hub_blog_section() {
        /**
         * Academic Hub section
         * @since 1.0.0
         */
        $academic_hub_blog_title        = get_theme_mod('academic_hub_blog_header_title','Latest <span>News</span> And <span>Blogs</span>');
        $academic_hub_blog_cat_id       = get_theme_mod('academic_hub_blog_category_id_select');
        $academic_hub_number_of_post    = get_theme_mod('academic_hub_blog_number_of_post',4);
        ?>
        <section id="academic_hub_blog" class="academic-hub-blog-section">
            

            <div class="conference">
                <div class="container">
                    <div class="row">

                        <div class="col-md-12 col-xs-12">
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 conference-list events">
                                <div class="row">
                                    <h2><?php echo wp_kses_post(  $academic_hub_blog_title ); ?></h2>
                                </div>
                            </div>
                        </div>


                        <div class="row">

                                <?php
                                    /**
                                     * Working on blog section hear.
                                     * 
                                     * @param array $academic_hub_blog_args category arguments
                                     */
                                    $academic_hub_blog_args = array( 'post_type'=>'post','posts_per_page'=>$academic_hub_number_of_post,'cat'=>$academic_hub_blog_cat_id );
                                    $academic_hub_blog_query = new WP_Query( $academic_hub_blog_args ); 

                                    while( $academic_hub_blog_query->have_posts()){ $academic_hub_blog_query->the_post(); 


                                    /**
                                     * Working on blog section
                                     * 
                                     * @since 1.0.0
                                     */
                                    $academic_hub_excerpt =  wp_trim_words( get_the_excerpt(), 25, '...' );
                                ?>
                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 ">
                                    <div class="conference-content">
                                        <div class="conference-wrapper clearfix">
                                            <div class="event-img">
                                                <?php the_post_thumbnail(); ?>
                                            </div>
                                            <div class="event-content">
                                                <div class="heading-post">
                                                    <a href="<?php the_permalink(); ?>"><h4><?php the_title(); ?></h4></a>
                                                </div>
                                                <div class="event-details">
                                                    <p><?php  echo esc_html($academic_hub_excerpt); ?></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                </div>

                                
                            <?php }wp_reset_postdata(); ?>
                        
                        </div>


                    </div>
                </div>
            </div>
        </section>
        <?php
        
    }

}
add_action( 'academic_hub_blog', 'academic_hub_blog_section' );





/**
 * Academic Hub About Page Section
 * 
 * @since 1.0.0
 */
if ( ! function_exists( 'academic_hub_about_us_section' ) ) {
    /**
     * Academic Hub About Page Section
     * 
     * @since Academic About Page Section
     */
    function academic_hub_about_us_section() {
        /**
         * Academic Hub About Page Section
         * @since 1.0.0
         */
        $academic_hub_blog_title                = get_theme_mod('academic_hub_blog_header_title','ABOUT <span>US</span>');
        $page_id_select      = get_theme_mod('academic_hub_about_page_id_select');
    
       /**
        * excerpt the data
        */
        $academic_hub_page = get_post($page_id_select);

        $academic_hub_excerpt   = $academic_hub_page->post_content;
        $academic_hub_link      = get_permalink( $page_id_select );
        ?>
        <section id="academic_hub_blog" class="academic-hub-blog-section">
            <div class="aboutus">
                <div class="container">
                    <div class="row">
                        <div class="about-academic clearfix">
                            <div class="col-md-6 col-sm-12 col-xs-12 academic-list">
                                <h2><?php echo wp_kses_post( $academic_hub_blog_title ); ?></h2>
                                <p><?php echo wp_kses_post( $academic_hub_excerpt ); ?></p>
                                <a href="<?php echo esc_url( $academic_hub_link ); ?>"><button type="button" class="btn btn-primary"><?php echo esc_html__('LEARN MORE','academic-hub'); ?> </button></a>
                            </div>
                            <div class="col-md-6 col-sm-12 col-xs-12">
                                <?php echo get_the_post_thumbnail( $page_id_select, 'full' ); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <?php
        
    }

}
add_action( 'academic_hub_about_us', 'academic_hub_about_us_section' );








/** 
 * Academic Hub Category Blog
 * 
 * @since 1.0.0
 * */
if( ! function_exists( 'academic_hub_get_post_categories' ) ) {
	/**
	 * Get Post Category
	 *
	 * @return array
	 * @since 1.0.0
	 */
	function academic_hub_get_post_categories( ){
		
		
		$all_categories = get_categories( );
		
		//default value
		$categories['all'] = 'all';  
		
		foreach( $all_categories as $category ){
			$categories[$category->term_id] = $category->name;    
		}
		
		return $categories;
	}

}


/** 
 * Academic Hub Get Page List
 * 
 * @since 1.0.0
 * */
if( ! function_exists( 'academic_hub_get_page_list' ) ) {
	/**
	 * Get Post Category
	 *
	 * @return array
	 * @since 1.0.0
	 */
	function academic_hub_get_page_list( ){
        
        /**
         * Academic Hub Get Page List
         * @since 1.0.0
         */
        $args = array(
            'sort_order' => 'asc',
            'sort_column' => 'post_title',
            'hierarchical' => 1,
            'exclude' => '',
            'include' => '',
            'meta_key' => '',
            'meta_value' => '',
            'authors' => '',
            'child_of' => 0,
            'parent' => -1,
            'exclude_tree' => '',
            'number' => '',
            'offset' => 0,
            'post_type' => 'page',
            'post_status' => 'publish'
        ); 
        $get_all_pages = get_pages($args); 

        
		
		//get page list loop
		foreach( $get_all_pages as $page ){
			$get_pages_list[$page->ID] = $page->post_title;    
		}
		
		return $get_pages_list;
	}

}
