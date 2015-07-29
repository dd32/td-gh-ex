<?php
/**
 * Custom functions that act independently of the theme templates
 *
 * Eventually, some of the functionality here could be replaced by core features
 *
 * @package Aglee Lite
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function aglee_lite_body_classes( $classes ) {
	// Adds a class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	return $classes;
}
add_filter( 'body_class', 'aglee_lite_body_classes' );

if ( version_compare( $GLOBALS['wp_version'], '4.1', '<' ) ) :
	/**
	 * Filters wp_title to print a neat <title> tag based on what is being viewed.
	 *
	 * @param string $title Default title text for current view.
	 * @param string $sep Optional separator.
	 * @return string The filtered title.
	 */
	function aglee_lite_wp_title( $title, $sep ) {
		if ( is_feed() ) {
			return $title;
		}

		global $page, $paged;

		// Add the blog name.
		$title .= get_bloginfo( 'name', 'display' );

		// Add the blog description for the home/front page.
		$site_description = get_bloginfo( 'description', 'display' );
		if ( $site_description && ( is_home() || is_front_page() ) ) {
			$title .= " $sep $site_description";
		}

		// Add a page number if necessary.
		if ( ( $paged >= 2 || $page >= 2 ) && ! is_404() ) {
			$title .= " $sep " . sprintf( esc_html__( 'Page %s', 'aglee-lite' ), max( $paged, $page ) );
		}

		return $title;
	}
	add_filter( 'wp_title', 'aglee_lite_wp_title', 10, 2 );

	/**
	 * Title shim for sites older than WordPress 4.1.
	 *
	 * @link https://make.wordpress.org/core/2014/10/29/title-tags-in-4-1/
	 * @todo Remove this function when WordPress 4.3 is released.
	 */
	function aglee_lite_render_title() {
		?>
		<title><?php wp_title( '|', true, 'right' ); ?></title>
		<?php
	}
	add_action( 'wp_head', 'aglee_lite_render_title' );
endif;

// added code for slider

    function aglee_lite_slidercb(){
        $mode = get_theme_mod('slider_mode_setting','horizontal');
        $slider_select = get_theme_mod('slider_type_choose','option1');
        $readmore_option = get_theme_mod('readmore_slider_setting', 'Read More');
        if($slider_select == 'option1'){
            $slider_one = get_theme_mod('slider_one');
            if(empty($slider_one)){
                $slider_one = 0;
            }
            $slider_two = get_theme_mod('slider_two');
            if(empty($slider_two)){
                $slider_two = 0;
            }
            $slider_three = get_theme_mod ('slider_three');
            if(empty($slider_three)){
                $slider_three = 0;
            }
            $slider_four = get_theme_mod('slider_four');
            if(empty($slider_four)){
                $slider_four = 0;
            }
            $all_slider = array($slider_one, $slider_two, $slider_three, $slider_four); 
            $remove = array(0);
            $result = array_diff($all_slider, $remove);           
        }else{
            $slider_cat = get_theme_mod('slider_category');
        }
        ?>
          
                    <?php
                    if($slider_select == 'option1'){
                        echo '<ul class="aglee-home-slider">';
                        foreach($result as $rowslide){
                                $image = wp_get_attachment_image_src( get_post_thumbnail_id( $rowslide ), 'home-slider', false );
                                $content_post = get_post($rowslide);
                                ?>
                                <li>
                                    <?php if(has_post_thumbnail($rowslide)){ ?>
                                        <img src="<?php echo $image[0]; ?>" />
                                    <?php } ?>
                                   
                                        <div class="caption_wrap">
                                            <div class="slider_title"><?php echo $content_post->post_title; ?></div>
                                            <div class="slider_cont"><?php echo $content_post->post_excerpt; ?></div>
                                            <?php if(get_theme_mod('readmore_slider_setting') != '1'){ ?>
                                            <a href="<?php echo get_the_permalink($rowslide); ?>">Read More</a>
                                            <?php } ?>
                                    </div>
                                </li>
                            <?php 
                        }
                        echo '</ul>';
                    }
                                              
                    if($slider_select == 'option2'){
                        echo '<ul class="aglee-home-slider">';
                        if(!empty($slider_cat)){
                          $catquery = new WP_Query( 'cat='.$slider_cat.'&posts_per_page=10' );
                           while($catquery->have_posts()){
                                $catquery->the_post(); 
                                $post_id = get_the_ID();
                                $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post_id ), 'home-slider', false );
                                ?>
                                <li>
                                    <?php if(has_post_thumbnail()){ ?>
                                        <img src="<?php echo $image[0]; ?>" />
                                    <?php } ?>
                                                                       
                                    <div class="caption_wrap">
                                        <div class="slider_title"><?php the_title(); ?></div>
                                        <div class="slider_cont"><?php the_excerpt(); ?></div>
                                        <?php if(get_theme_mod('readmore_slider_setting') != '1'){ ?>
                                        <a href="<?php the_permalink(); ?>">Read More</a>
                                        <?php } ?>
                                    </div>                                    
                                </li>
                           <?php }
                       }
                       echo '</ul>';
                    }
                    ?>
                      <script type="text/javascript">
                jQuery(document).ready(function ($){
                    $(".aglee-home-slider").bxSlider({
                        pager: true,
                        auto: true,
                        mode: '<?php echo $mode; ?>'
                    });
                });
            </script>
                    <?php 
    }
    add_action('aglee_lite_slider','aglee_lite_slidercb',10);
    
    function aglee_lite_testimonial_slider_cb(){
        $category_testimonial = get_theme_mod('slider_testimonial_category');
        if(!empty($category_testimonial)){
        ?>
        <script type="text/javascript">
                jQuery(document).ready(function ($){
                    $(".aglee-testimonial-slider").bxSlider({
                        pager: true,
                        auto: true,
                        mode: 'horizontal'
                    });
                });
        </script>
        <?php
        $args = array(
                'posts_per_page' => -1,
                'category' => $category_testimonial,
                'post_type' => 'post',
                'post_status' => 'publish'
                );
        $posts_array = get_posts( $args );
        $no_of_testimonial = sizeof($posts_array);
        $loop_no = round($no_of_testimonial/2);
        ?>
        <h1>What Our Clients Say</h1>
        <ul class="aglee-testimonial-slider">
        <?php
            $offset_element = 0;
            for($i=1; $i<=$loop_no; $i++){  
            $args = array(
                    'post_type' => 'post',
                    'cat' => $category_testimonial,
                    'posts_per_page' => 2,
                    'offset' => $offset_element
            );
            $cat_testmonial_query = new WP_Query($args);
                if($cat_testmonial_query->have_posts()){
                echo '<li>';
                while($cat_testmonial_query->have_posts()){
                    $cat_testmonial_query->the_post();
                   $testimonial_image = wp_get_attachment_image_src( get_post_thumbnail_id(), 'testimonial-img', false );
                    ?>
                    <div class="testimonial_content">
                        <?php if (has_post_thumbnail()){ ?>
                        <div class="testimonial_img">
                            <img src="<?php echo $testimonial_image[0]; ?>" />
                        </div>
                        <?php } ?>
                        
                        <div class="testimonial_designation">
                            <?php echo '<p>'.wp_trim_words(get_the_content(),20).'</p>'; ?>
                            <div class="testimonial_name"><?php the_title(); ?></div>
                            <div class="testimonial_designation"><?php the_excerpt(); ?></div> 
                        </div>       
                    </div>           
            <?php } 
                echo '</li>'; 
            }
            $offset_element = $offset_element+2;
        } // end of for loop
            ?>
        </ul>
        <?php }
    }
    
    add_action('aglee_lite_testimonial_slider','aglee_lite_testimonial_slider_cb',10);