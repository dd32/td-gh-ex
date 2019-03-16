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
        $academic_hub_slider_category_id = get_theme_mod('academic_hub_slider_category_id',academic_hub_get_default_categorie());
        $academic_hub_slider_number_of_post = get_theme_mod('academic_hub_slider_number_of_post',3);
        ?>
            <!-- banner -->
            <div class="banner">
                <div class="container-fluid">
                <div class="row">
                    <div class="banner-img">
                        <div class="images academic-home-slider-sec">
                                <?php 
                                        /**
                                         * args 
                                         * 
                                         * @since 1.0.0
                                         */
                                        $args = array( 'post_type'=>'post','posts_per_page'=>$academic_hub_slider_number_of_post,'cat'=>$academic_hub_slider_category_id );
                                        $blog_query = new WP_Query( $args ); 
                                        while( $blog_query->have_posts()): $blog_query->the_post();
                                    
                                             /* grab the url for the full size featured image */
                                            $slider_image = get_the_post_thumbnail_url(get_the_ID(),'full'); 
                                            if( empty($slider_image) ){
                                                $slider_image =  get_template_directory_uri().'/assets/images/slider-item.png';
                                            }
                                        ?>
                                    <div div class="academic-home-slider-item">
                                        <div class="banner-style" style="background-image:url(<?php echo esc_url( $slider_image ); ?>);">
                                            <div class=" container banner-title">
                                                <h2><span><?php the_title(); ?></span></h2>
                                                <p><?php the_excerpt(); ?></p>
                                            </div>
                                        </div>
                                    </div>
                            <?php  endwhile; wp_reset_postdata(); ?>
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
        $academic_hub_notices_page_id = get_theme_mod('academic_hub_notices_page_id');
        
        /**
        * excerpt the data
        */
        if($academic_hub_notices_page_id):
        $academic_hub_notice_title = get_the_title($academic_hub_notices_page_id);
        $academic_hub_excerpt = get_the_excerpt($academic_hub_notices_page_id);
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
                        <?php if( $academic_hub_excerpt ): ?>
                            <div class="col-md-9 col-sm-9 col-xs-6 notice-paragraph">
                                <marquee><?php echo wp_kses_post($academic_hub_excerpt); ?></marquee>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
                </div>
            </div>
        </section>
        <?php
        endif;
        
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
        $academic_hub_special_category_id = get_theme_mod('academic_hub_special_category_id',academic_hub_get_default_categorie());
        $academic_hub_special_number_of_post = get_theme_mod('academic_hub_special_number_of_post',3);
        ?>
        <section id="academic_hub_special_info_section" class="academic-hub-section">
            <div class="special">
                <div class="container">
                    <div class="row">
                        <?php if( $academic_hub_special_category_id ): 
                            //get cat name
                            $academic_hub_blog_title = get_cat_name($academic_hub_special_category_id);
                            ?>
                            <div class="col-md-12 col-xs-12">
                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 conference-list events">
                                    <div class="row">
                                        <h2><?php echo wp_kses_post(  $academic_hub_blog_title ); ?></h2>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>
                        <div class=" col-md-12 col-xs-12 special-grid">
                            <div class="row">
                                    <?php 
                                            /**
                                             * args 
                                             * 
                                             * @since 1.0.0
                                             */
                                            $args = array( 'post_type'=>'post','posts_per_page'=>$academic_hub_special_number_of_post,'cat'=>$academic_hub_special_category_id );
                                            $blog_query = new WP_Query( $args ); 
                                            while( $blog_query->have_posts()): $blog_query->the_post();
                                        
                                                /* grab the url for the full size featured image */
                                                $slider_image = get_the_post_thumbnail_url(get_the_ID(),'full'); 
                                                if( empty($slider_image) ){
                                                    $slider_image =  get_template_directory_uri().'/assets/images/logo.png';
                                                }
                                            ?>

                                        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 special-description">
                                            <div class="qualified">
                                                <img src="<?php echo esc_url( $slider_image ); ?>" class="img-resonsive">
                                                <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                                                <?php the_excerpt(); ?>
                                            </div>
                                        </div>
                                    <?php  endwhile; wp_reset_postdata(); ?>
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
        $academic_hub_event_category_id = get_theme_mod('academic_hub_event_category_id',academic_hub_get_default_categorie());
        $academic_hub_event_number_of_post = get_theme_mod('academic_hub_event_number_of_post',3);
        ?>
        <section id="academic_hub_event" class="academic-hub-event-section">
            

            <div class="conference">
                <div class="container">
                    <div class="row">
                        <?php if( $academic_hub_event_category_id ): 
                            //get cat name
                            $academic_hub_blog_title = get_cat_name($academic_hub_event_category_id);
                            ?>
                            <div class="col-md-12 col-xs-12">
                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 conference-list events">
                                    <div class="row">
                                        <h2><?php echo wp_kses_post(  $academic_hub_blog_title ); ?></h2>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>

                        <div class="row">
                                <?php 
                                    /**
                                     * args 
                                     * 
                                     * @since 1.0.0
                                     */
                                    $args = array( 'post_type'=>'post','posts_per_page'=>$academic_hub_event_number_of_post,'cat'=>$academic_hub_event_category_id );
                                    $blog_query = new WP_Query( $args ); 
                                    while( $blog_query->have_posts()): $blog_query->the_post();
                                
                                        /* grab the url for the full size featured image */
                                        $slider_image = get_the_post_thumbnail_url(get_the_ID(),'full'); 
                                        if( empty($slider_image) ){
                                            $slider_image =  get_template_directory_uri().'/assets/images/event.png';
                                        }
                                    ?>
                                
                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 ">
                                    <div class="conference-content">
                                        <div class="conference-wrapper clearfix">
                                            <div class="event-img">
                                                <img src="<?php echo esc_url($slider_image); ?>" class="img-responsive">
                                            </div>
                                            <div class="event-content">
                                                <div class="heading-post">
                                                    <a href="<?php the_permalink(); ?>"><h4><?php the_title(); ?></h4></a>
                                                </div>
                                                <div class="event-details">
                                                    <?php the_excerpt(); ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                </div>
                            <?php  endwhile; wp_reset_postdata(); ?>
                        
                        </div>
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
        $academic_hub_blog_cat_id       = get_theme_mod('academic_hub_blog_category_id_select', academic_hub_get_default_categorie() );
        $academic_hub_number_of_post    = get_theme_mod('academic_hub_blog_number_of_post',4);
        ?>
        <section id="academic_hub_blog" class="academic-hub-blog-section">
            

            <div class="conference">
                <div class="container">
                    <div class="row">
                        <?php if( $academic_hub_blog_cat_id ): 
                            //get cat name
                            $academic_hub_blog_title = get_cat_name($academic_hub_blog_cat_id);
                            ?>
                            <div class="col-md-12 col-xs-12">
                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 conference-list events">
                                    <div class="row">
                                        <h2><?php echo wp_kses_post(  $academic_hub_blog_title ); ?></h2>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>


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
        $page_id_select      = get_theme_mod('academic_hub_about_page_id_select');
    
        if($page_id_select):
       /**
        * excerpt the data
        */
        $academic_hub_page = get_post($page_id_select);
        $academic_hub_blog_title = get_the_title($academic_hub_page);
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
        endif;
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
		foreach( $all_categories as $category ){
			$categories[$category->term_id] = $category->name;    
		}
		
		return $categories;
	}

}




/** 
 * Academic Hub Category Blog
 * 
 * @since 1.0.0
 * */
if( ! function_exists( 'academic_hub_get_default_categorie' ) ) {
	/**
	 * Get Post Category
	 *
	 * @return array
	 * @since 1.0.0
	 */
	function academic_hub_get_default_categorie( ){
		
		
        $all_categories = get_categories( );
		
        //default value
        $count = 1;
		foreach( $all_categories as $category ){
            if( $count == 1 ){
                $categories = $category->term_id; 
            }
            $count++;
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
