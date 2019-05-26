<?php 
/**
 * File aeonblog.
 * @package   AeonBlog
 * @author    Aeon Theme <info@aeontheme.com>
 * @copyright Copyright (c) 2019, Aeon Theme
 * @link      http://www.aeontheme.com/themes/aeonblog
 * @license   http://www.gnu.org/licenses/gpl-2.0.html
 * 
 * AeonBlogSlider Function
 * @since AeonBlog 1.0.0
 *
 * @param null
 * @return void
 *
 */
if ( !function_exists('aeonblog_slider') ) :
  function aeonblog_slider() { 
  	
  	global $aeonblog_theme_options;
	$blog_meta = absint($aeonblog_theme_options['aeonblog-enable-slider']);
	$slider_cat_id = absint($aeonblog_theme_options['aeonblog-slider-category']);
	$slider_number = absint($aeonblog_theme_options['aeonblog-slider-number']);

	if ( 1 === $blog_meta ) : 
?> 			
<div class="slider-section">
		<!-- Container -->
		<div class="col-sm-12">
			<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
				<!-- Wrapper for slides -->
				<div class="carousel-inner" role="listbox">
						<?php							
							$i = 1;
							$query = new WP_Query( array( 'cat' => $slider_cat_id, 'posts_per_page'=> $slider_number ) );

							if($query -> have_posts () ) : while($query -> have_posts () ): $query->the_post();
								$image_id = get_post_thumbnail_id();
	                   			$image_url = wp_get_attachment_image_src( $image_id,'full',true ); 
	                   		?>
	                   	<?php if(has_post_thumbnail()) { ?> 
						<div class="item <?php if( $i==1) { echo "active"; } ?>" >	
						<img src="<?php echo esc_url($image_url[0]); ?>" alt="Slide">
						
						<div class="carousel-caption <?php if( $i % 2 != 0 ){ echo "left-side"; } ?>">
							<div class="slide-content">
								<div class="post-meta">
									<?php
			                   			$categories = get_the_category();
		                                  if ( ! empty( $categories ) ) {
		                                  	echo '<a href="'.esc_url( get_category_link( $categories[0]->term_id ) ).'" title="Lifestyle">'.esc_html( $categories[0]->name ).'</a>';
		                                }                                 
									?>													
									<?php
									$slider_tags = wp_get_post_tags( get_the_ID() );

					                if( !empty( $slider_tags )){
										$count = 0;
										if ( $slider_tags ) 
										{
										  foreach( $slider_tags as $tag )
										   {
										   		$tag_link = get_tag_link( $tag->term_id );
												$count++;
												if ( 1 == $count )
												  {												   
												   echo '<a href="'.esc_url($tag_link).'" title="Travel">"'.esc_html( $tag->name ).'"</a>'; 
											      }
										    }
					                    }             			
									}
									?>									
								</div>
								<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
								<a href="<?php the_permalink(); ?>" title="<?php esc_attr_e('Read More', 'aeonblog');?>"><?php esc_html_e('Read More', 'aeonblog'); ?></a>
							</div>
						</div>
					</div>
				<?php } $i++; endwhile; wp_reset_postdata(); endif; ?>

				</div>
				<?php
					if( count($query->posts) > 1 ) { ?>
						<!-- Controls -->
						<a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
							<span class="fa fa-angle-double-left" aria-hidden="true"></span>
							<span class="sr-only"><?php esc_html_e('Previous','aeonblog'); ?></span>
						</a>
						<a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
							<span class="fa fa-angle-double-right" aria-hidden="true"></span>
							<span class="sr-only"><?php esc_html_e('Next','aeonblog'); ?></span>
						</a>					    
				<?php } 
				?>
			</div>
	</div><!-- Container /- -->
</div><!-- Slider Section /- -->
<?php endif;
 } 
endif;
add_action( 'aeonblog_slider_hook', 'aeonblog_slider', 10 );

/**
 * Displays the custom header image below the navigation menu
*/
if (!function_exists('aeonblog_header_image')) :
    function aeonblog_header_image(){
        $has_header_image = has_header_image();
        if (!empty( $has_header_image )) {
            ?>
            <div id="headimg" class="header-image">
                <img src="<?php header_image(); ?>"
                     srcset="<?php echo esc_attr(wp_get_attachment_image_srcset(get_custom_header()->attachment_id, 'full')); ?>"
                     width="<?php echo esc_attr(get_custom_header()->width); ?>"
                     height="<?php echo esc_attr(get_custom_header()->height); ?>"
                     alt="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>">
            </div>
        <?php
        }
    }
endif;
/**
 * AeonBlog Breadcrumb
 * @since AeonBlog 1.0.0
 *
 * @param null
 * @return void
 *
 */
if ( !function_exists('aeonblog_breadcrumb') ) :
  function aeonblog_breadcrumb() { 
  	global $aeonblog_theme_options;
	$breadcrumb = absint($aeonblog_theme_options['aeonblog-breadcrumb-option']);
	if( $breadcrumb == 1){
		aeonblog_breadcrumb_trail();
	}
} endif;
add_action( 'aeonblog_breadcrumb_hook', 'aeonblog_breadcrumb', 10 );

/**
 * AeonBlog Excerpt Length
 * @since AeonBlog 1.0.0
 *
 * @param null
 * @return void
 *
 */
function aeonblog_excerpt_length( $length ) {
	if(!is_admin () ){
		global $aeonblog_theme_options;
		$excerpt_length = absint($aeonblog_theme_options['aeonblog-blog-excerpt']);
		return $excerpt_length;
	}
}
add_filter( 'excerpt_length', 'aeonblog_excerpt_length', 999 );

/**
 * AeonBlog Excerpt More
 * @since AeonBlog 1.0.0
 *
 * @param null
 * @return void
 */
if ( !function_exists('aeonblog_excerpt_more') ) :
function aeonblog_excerpt_more( $more ) {
    if(!is_admin() ){
        return '';
    }
}
endif;
add_filter('excerpt_more', 'aeonblog_excerpt_more');

/**
 * AeonBlog Add Body Class
 * @since AeonBlog 1.0.0
 *
 * @param null
 * @return void
*/

add_filter('body_class', 'aeonblog_custom_class');
function aeonblog_custom_class($classes)
{
    $classes[] = 'pt-sticky-sidebar';
    global $aeonblog_theme_options;
	$sidebar = esc_attr($aeonblog_theme_options['aeonblog-sidebar-options']);
    if ($sidebar == 'no-sidebar') {
        $classes[] = 'no-sidebar';
    } elseif ($sidebar == 'left-sidebar') {
        $classes[] = 'left-sidebar';
    } elseif ($sidebar == 'middle-column') {
        $classes[] = 'middle-column';
    } else {
        $classes[] = 'right-sidebar';
    }
    return $classes;
}


/**
 * Go to Top
 * @since AeonBlog 1.0.0
 *
 * @param null
 * @return void
*/

if (!function_exists('aeonblog_go_to_top' )) :
    function aeonblog_go_to_top()
    {
    	global $aeonblog_theme_options;
		$aeonblog_to_top = absint($aeonblog_theme_options['aeonblog-go-to-top']);
         if( $aeonblog_to_top == 1 )
         {
            ?>
            <a id="toTop" class="go-to-top" href="#" title="<?php esc_attr_e('To Top', 'aeonblog'); ?>">
                    <span><i class="fa fa-angle-double-up"></i></span>
            </a>
        <?php
        }
    }

add_action('aeonblog_go_to_top_hook', 'aeonblog_go_to_top', 20 );
endif;

/**
 * Jetpack Top Posts widget Image size
 * @since AeonBlog 1.0.0
 *
 * @param null
 * @return void
*/
function aeonblog_custom_thumb_size( $get_image_options ) {
        $get_image_options['avatar_size'] = 600;
 
        return $get_image_options;
}
add_filter( 'jetpack_top_posts_widget_image_options', 'aeonblog_custom_thumb_size' );

/**
 * Post Navigation Function
 *
 * @since AeonBlog 1.0.0
 *
 * @param null
 * @return void
 *
 */
if ( !function_exists('aeonblog_posts_navigation') ) :
    function aeonblog_posts_navigation() {
        global $aeonblog_theme_options;
        $aeonblog_pagination_option = $aeonblog_theme_options['aeonblog-pagination-type'];
        if( 'default' == $aeonblog_pagination_option ){
            the_posts_navigation();
        }
        else{
            echo"<div class='aeonblog-pagination'>";
            global $wp_query;
            $big = 999999999; // need an unlikely integer
            echo paginate_links(array(
                'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
                'format' => '?paged=%#%',
                'current' => max(1, get_query_var('paged')),
                'total' => $wp_query->max_num_pages,
                'prev_text' => __('&laquo; Prev', 'aeonblog'),
                'next_text' => __('Next &raquo;', 'aeonblog'),
            ));
            echo "</div>";
        }
    }
endif;
add_action( 'aeonblog_action_navigation', 'aeonblog_posts_navigation', 10 );

/**
 * Display related posts from same category
 *
 * @since AeonBlog 1.0.0
 *
 * @param int $post_id
 * @return void
 *
 */
if ( !function_exists('aeonblog_related_post') ) :

    function aeonblog_related_post( $post_id ) {

        global $aeonblog_theme_options;
        if( 0 == $aeonblog_theme_options['aeonblog-related-post'] ){
            return;
        }
        $categories = get_the_category( $post_id );
        if ($categories) {
            $category_ids = array();
             $category = get_category($category_ids);
             $categories  = get_the_category( $post_id );
                foreach ( $categories as $category ){
                    $category_ids[]  = $category->term_id;                        
                }
            $count = $category->category_count;
            if($count > 1 ){ ?>
            <div class="related-pots-block">
                <h2 class="widget-title">
                    <?php _e( 'Related Posts', 'aeonblog' ) ?>
                </h2>
                <ul class="related-post-entries clear">
                    <?php
                    $aeonblog_cat_post_args = array(
                        'category__in'       => $category_ids,
                        'post__not_in'       => array($post_id),
                        'post_type'          => 'post',
                        'posts_per_page'     => 3,
                        'post_status'        => 'publish',
                        'ignore_sticky_posts'=> true
                    );
                    $aeonblog_featured_query = new WP_Query( $aeonblog_cat_post_args );

                    while ( $aeonblog_featured_query->have_posts() ) : $aeonblog_featured_query->the_post();
                        ?>
                        <li>
                            <?php
                            if ( has_post_thumbnail() ):
                                ?>
                                <figure class="widget-image">
                                    <a href="<?php the_permalink()?>">
                                        <?php the_post_thumbnail('aeonblog-small-thumb'); ?>
                                    </a>
                                </figure>
                            <?php
                            endif;
                            ?>
                            <div class="featured-desc">
                                <a href="<?php the_permalink()?>">
                                    <h2 class="title">
                                       <?php the_title(); ?>
                                    </h2>
                                </a>
                            </div>
                        </li>
                    <?php
                    endwhile;
                    wp_reset_postdata();
                    ?>
                </ul>
            </div> <!-- .related-post-block -->
        <?php
    }
        }
    }
endif;
add_action( 'aeonblog_related_posts', 'aeonblog_related_post', 10, 1 );

/**
 * Checkbox sanitization callback example.
 * 
 * Sanitization callback for 'checkbox' type controls. This callback sanitizes `$checked`
 * as a boolean value, either TRUE or FALSE.
 *
 * @param bool $checked Whether the checkbox is checked.
 * @return bool Whether the checkbox is checked.
 */
function aeonblog_sanitize_checkbox( $checked ) {
	// Boolean check.
	return ( ( isset( $checked ) && true == $checked ) ? true : false );
}

/**
 * Adds sanitization callback function: Number
 *  @since AeonBlog 1.0.0
 */
if (!function_exists('aeonblog_sanitize_number')) :
    function aeonblog_sanitize_number($input)
    {
        if (isset($input) && is_numeric($input)) {
            return $input;
        }
    }
endif;

/**
 * Sanitize selection
 *
 *  @since AeonBlog 1.0.0
 */
if (!function_exists('aeonblog_sanitize_select')) :
    function aeonblog_sanitize_select($input, $setting)
    {
        // Ensure input is a slug.
        $input = sanitize_key($input);
        // Get list of choices from the control associated with the setting.
        $choices = $setting->manager->get_control($setting->id)->choices;
        // If the input is a valid key, return it; otherwise, return the default.
        return (array_key_exists($input, $choices) ? $input : $setting->default);
    }
endif;