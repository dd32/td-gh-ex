<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package Agensy
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function agensy_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	return $classes;
}
add_filter( 'body_class', 'agensy_body_classes' );

/**
* Social Icons
*/
if( ! function_exists('agensy_social_icons')){
	function agensy_social_icons(){
		
		$social_icons = array('facebook','twitter','googlePlus','dribbble','youtube','linkedin');
            foreach( $social_icons as $social_icon){
                $agensy_social_icons = get_theme_mod('agensy_'.$social_icon.'_url');
                if( $agensy_social_icons ){
                    echo '<a href="'. esc_url($agensy_social_icons).'" target="_blank">';
                    if( $social_icon == 'googlePlus' ){
                        echo '<i class ="fa fa-google-plus"></i>'; 
                    }else{
                        echo '<i class ="fa fa-'. esc_attr($social_icon).'"></i>';    
                    }
                    echo '</a>';
                }
            }
    }
}

/**
 * Add a pingback url auto-discovery header for singularly identifiable articles.
 */
function agensy_pingback_header() {
	if ( is_singular() && pings_open() ) {
		echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
	}
}
add_action( 'wp_head', 'agensy_pingback_header' );


/**
*to display post in custom
**/

function agensy_post_lists(){
    $agensy_post_list = 
        array(
            'post_type' => 'post',
            'posts_per_page' => -1,
        );
        $posts_lists = array();
        $posts_lists[] = esc_html__('--Choose--','agensy');
        $agensy_post = new WP_Query ($agensy_post_list);
        while( $agensy_post->have_posts() ):
            $agensy_post->the_post();
        $posts_lists[ get_the_ID() ] = get_the_title();   
        endwhile;    
        return $posts_lists;
}

//display page in custom
function agensy_page_lists(){
    $agensy_page_lists = 
        array(
            'post_type' => 'page',
            'posts_per_page' => -1,
        );
        $pages_lists = array();
        $pages_lists[] = esc_html__('--Choose--','agensy');
        $agensy_page = new WP_Query ($agensy_page_lists);
        while( $agensy_page->have_posts() ):
            $agensy_page->the_post();
        $pages_lists[ get_the_ID() ] = get_the_title();   
        endwhile;    
        return $pages_lists;
}
/**
*image display function
*
**/

function agensy_slider_control(){
?>
<div class="mail-slider-header-wrap container">
    <div id="header-slider-wrap" class="carousel-main-slider owl-carousel">
    <?php 
        $home_sliders = array('one','two', 'three' );
        foreach ($home_sliders as $home_slider) {
     
            $my_slider_cat = get_theme_mod('agensy_slider_page_'.$home_slider.'_control');
            $agensy_slider1_btn_control = get_theme_mod('agensy_slider_'.$home_slider.'_btn_control');
            $agensy_slider1_url_control = get_theme_mod('agensy_slider_'.$home_slider.'_url_control');


            if($my_slider_cat){
                $my_slider_args = array(
                    'post_type' => 'page',
                    'post_status' => 'publish',
                    'p' => absint($my_slider_cat)
                );

                $my_slider_query = new WP_Query($my_slider_args);
                if($my_slider_query->have_posts()):
                    ?>
                    <?php
                        while($my_slider_query->have_posts()):
                            $my_slider_query->the_post();
                            $agensy_slider_image_src = wp_get_attachment_image_src(get_post_thumbnail_id(),'agensy-slider-image');
                            $agensy_image_url = $agensy_slider_image_src[0];
                            if($agensy_image_url || get_the_title() || get_the_content()){
                                ?>
                                <div class="content-slider">
                                    <?php if($agensy_image_url){ ?>
                                        <img src="<?php echo esc_url($agensy_image_url); ?>" alt="<?php the_title_attribute(); ?>" title="<?php the_title_attribute(); ?>" />
                                    <?php } ?>
                                    <div class="slider-content-wrap">
                                        <div class="title">
                                            <?php the_title(); ?>
                                        </div>
                                        <div class="desc">
                                        <?php if(get_the_content()){ ?>
                                        <div class="about-post-content">
                                            <?php the_content(); ?>
                                        </div>
                                    <?php } ?>
                                    </div>
                                        <?php if($agensy_slider1_url_control) {?>
                                        <div class="slider-btn">
                                            <a href="<?php echo esc_url($agensy_slider1_url_control); ?>">
                                                <?php echo esc_html($agensy_slider1_btn_control); ?>
                                            </a>
                                        </div>
                                        <?php } ?>
                                    </div>
                                </div>
                                <?php
                            }
                        endwhile;
                        wp_reset_postdata();
                    ?>
            <?php
        endif;
            }
        }
    ?>
    </div>
</div>
<?php
}


add_action('agensy_slider_role','agensy_slider_control');

//for service section slider

function agensy_cat_lists()
{
    $agensy_services_cat_lists = get_categories(
        array(
            'hide_empty' => '0',
            'exclude' => '1',
        )
    );
    $agensy_services_cat_array = array();
    $agensy_services_cat_array[] = esc_html__('-- Choose --','agensy');
    foreach($agensy_services_cat_lists as $agensy_services_cat_list){
        $agensy_services_cat_array[$agensy_services_cat_list->slug] = $agensy_services_cat_list->name;
    }
    return $agensy_services_cat_array;
}
/**
*adding breadcrumbs in header
*
**/

function agensy_breadcrumbs() {
    global $post;
    $body_classes = get_body_class();
    $showOnHome = 0; // 1 - show breadcrumbs on the homepage, 0 - don't show
    $delimiter = '&gt;';
    $showCurrent = 1; // 1 - show current post/page title in breadcrumbs, 0 - don't show
    $homeLink = esc_url( home_url() );

    if ( is_front_page()) {

        if ($showOnHome == 1)
            echo '<div id="agensy-breadcrumb"><a href="' . $homeLink . '">' . esc_html__('Home', 'agensy') . '</a></div></div>';
    } else {

        echo '<div id="agensy-breadcrumb"><a href="' . $homeLink . '">' . esc_html__('Home', 'agensy') . '</a> ' . esc_attr($delimiter) . ' ';

        if (is_category()) {
            $thisCat = get_category(get_query_var('cat'), false);
            if ($thisCat->parent != 0)
                echo get_category_parents($thisCat->parent, TRUE, ' ' . esc_attr($delimiter) . ' ');
            echo '<span class="current">'. single_cat_title('', false).'</span>';
        }
        if(is_home()) {

          single_post_title();
        }
         elseif (is_search()) {
            echo '<span class="current">' . esc_html__('Search results for','agensy'). '"' . get_search_query() . '"' . '</span>';
        } elseif (is_day()) {
            echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . esc_attr($delimiter) . ' ';
            echo '<a href="' . get_month_link(get_the_time('Y'), get_the_time('m')) . '">' . get_the_time('F') . '</a> ' . esc_attr($delimiter) . ' ';
            echo '<span class="current">' . get_the_time('d') . '</span>';
        } elseif (is_month()) {
            echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . esc_attr($delimiter) . ' ';
            echo '<span class="current">' . get_the_time('F') . '</span>';
        } elseif (is_year()) {
            echo '<span class="current">' . get_the_time('Y') . '</span>';
        } elseif (is_single() && !is_attachment()) {
            if (get_post_type() != 'post') {
                if( get_post_type() == 'product' ){
                    $post_type   = get_post_type_object(get_post_type());
                    $archiveLink = get_post_type_archive_link( 'product' );
                    $slug = $post_type->rewrite;
                    echo '<a href="' . esc_url($archiveLink).'/">' . esc_attr($post_type->labels->singular_name) . '</a>';
                    if ($showCurrent == 1)
                        echo ' ' . esc_attr($delimiter) . ' ' . '<span class="current">' . get_the_title() . '</span>';
                    
                }else{
                    $post_type = get_post_type_object(get_post_type());
                    $slug = $post_type->rewrite;
                    echo '<a href="' . esc_url($homeLink) . '/' . esc_attr($slug['slug']) . '/">' . esc_attr($post_type->labels->singular_name) . '</a>';
                    if ($showCurrent == 1)
                        echo ' ' . esc_attr($delimiter) . ' ' . '<span class="current">' . get_the_title() . '</span>';
                }
                
            } else {
                $cat = get_the_category();
                $cat = $cat[0];
                $cats = get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
                if ($showCurrent == 0)
                    $cats = preg_replace("#^(.+)\s$delimiter\s$#", "$1", $cats);
                echo agensy_sanitize_bradcrumb($cats);
                if ($showCurrent == 1)
                    echo '<span class="current">' . get_the_title() . '</span>';
            }
        } elseif (!is_single() && !is_page() && get_post_type() != 'post' && !is_404()) {
            $post_type = get_post_type_object(get_post_type());
            echo '<span class="current">' . esc_attr($post_type->labels->singular_name) . '</span>';
        } elseif (is_attachment()) {
            if ($showCurrent == 1) echo ' ' . '<span class="current">' . get_the_title() . '</span>';
        } elseif (is_page() && !$post->post_parent) {
            if ($showCurrent == 1)
                echo '<span class="current">' . get_the_title() . '</span>';
        } elseif (is_page() && $post->post_parent) {
            $parent_id = $post->post_parent;
            $breadcrumbs = array();
            while ($parent_id) {
                $page = get_page($parent_id);
                $breadcrumbs[] = '<a href="' . get_permalink($page->ID) . '">' . get_the_title($page->ID) . '</a>';
                $parent_id = $page->post_parent;
            }
            $breadcrumbs = array_reverse($breadcrumbs);
            for ($i = 0; $i < count($breadcrumbs); $i++) {
                echo agensy_sanitize_bradcrumb($breadcrumbs[$i]);
                if ($i != count($breadcrumbs) - 1)
                    echo ' ' . esc_attr($delimiter). ' ';
            }
            if ($showCurrent == 1)
                echo ' ' . esc_attr($delimiter) . ' ' . '<span class="current">' . get_the_title() . '</span>';
        } elseif (is_tag()) {
            echo '<span class="current">' . esc_html__('Posts tagged','agensy').' "' . single_tag_title('', false) . '"' . '</span>';
        } elseif (is_author()) {
            global $author;
            $userdata = get_userdata($author);
            echo '<span class="current">' . esc_html__('Articles posted by ','agensy'). esc_attr($userdata->display_name) . '</span>';
        } elseif (is_404()) {
            echo '<span class="current">' . 'Error 404' . '</span>';
        }

        if (get_query_var('paged')) {
            if (is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author())
                echo ' (';
             esc_html_e('Page', 'agensy') . ' ' . get_query_var('paged');
            if (is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author())
                echo ')';
        }

        echo '</div>';
    }
}


/**
* display breadcrumbs
*
*/
function agensy_header_banner_x() {   
   if( get_header_image() ){
     
        $overlay = '<div class="img-overlay"></div>';
    }else{
    
        $overlay = '' ;
    }

    $agensy_breadcrumb_image_enable  = get_theme_mod('agensy_breadcrumb_image_enable'); 
    
    if( $agensy_breadcrumb_image_enable  ){
  ?>

    <div class="header-banner-container">
        <?php echo $overlay;?>
            <div class="agensy-container">
                <div class="page-title-wrap">
                        <?php
                            if(is_archive()) {
                                //the_archive_title( '<h1 class="page-title">', '</h1>' );
                                echo agensy_cat_title();
                                
                            }elseif( is_home() ){ ?>
                              <h1 class="page-title"> <?php single_post_title(); ?></h1>
                            <?php
                            } elseif(is_single() || is_singular('page')) {
                                the_title('<h1 class="page-title">', '</h1>');
                            } elseif(is_search()) {
                                ?>
                                <h1 class="page-title"><?php printf( esc_html__( 'Search Results for: %s', 'agensy' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
                                <?php
                            } elseif(is_404()) {
                                ?>
                                <h1 class="page-title"><?php esc_html_e( '404 Error', 'agensy' ); ?></h1>
                                <?php
                            }
                        ?>
                        <?php agensy_breadcrumbs(); ?>
                </div>
            </div>
    </div>
<?php
    }
    
}
add_action('agensy_header_banner', 'agensy_header_banner_x');

function agensy_sanitize_bradcrumb($input){
    $all_tags = array(
        'a'=>array(
            'href'=>array()
        )
     );
    return wp_kses($input,$all_tags);
}

function agensy_cat_title(){
    $archive_title = get_the_archive_title(); 
    $explod        =  (explode(":",$archive_title));
    $cat_name      = end($explod);
    ?>
    <h1 class="page-title">
        <?php echo $cat_name; ?>
    </h1>
<?php
}

/** Exclude Categories from Blog Page **/
function agensy_exclude_category_from_blogpost($query) {
   $exclude_category = get_theme_mod('agensy_exclude_cat'); 
   $ex_cats = explode(',', $exclude_category);
   array_pop($ex_cats);
   
   if ( $query->is_home() ) {
       $query->set('category__not_in', $ex_cats);
   }
   return $query;
}
add_filter('pre_get_posts', 'agensy_exclude_category_from_blogpost');

/**
 * Change comment form textarea to use placeholder
 *
 * @param  array $args
 * @return array
 */
function agensy_comment_textarea_placeholder( $args ) {
    $args['comment_field']  = str_replace( 'textarea', 'textarea placeholder="Your Comment"', $args['comment_field'] );
    return $args;
}
add_filter( 'comment_form_defaults', 'agensy_comment_textarea_placeholder' );

/**
 * Comment Form Fields Placeholder
 *
 */
function agensy_comment_form_fields( $fields ) {
     
    foreach( $fields as &$field ) {
        $field = str_replace( 'id="author"', 'id="author" placeholder="Your Name*"', $field );
        $field = str_replace( 'id="email"', 'id="email" placeholder="Your Email Address*"', $field );
        $field = str_replace( 'id="url"', 'id="url" placeholder="Your Website Address*"', $field );

    }
    return $fields;
}
add_filter( 'comment_form_default_fields', 'agensy_comment_form_fields' );


/**
* Post comment template
*/
function agensy_post_comments($comment, $args, $depth) {
   $GLOBALS['comment'] = $comment; ?>
   <li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
     <div id="comment-<?php comment_ID(); ?>" class="clearfix">
      <div class="comment-author vcard">
         <?php echo get_avatar($comment,$size='115'); ?>
      </div>
     <div class="comment-wrapper">
         <div class="commenter-name-wrap">
             <?php printf(__('<cite class="fn">%s</cite>','agensy'), get_comment_author_link()); ?>
             <?php if ($comment->comment_approved == '0') : ?>
                 <em><?php esc_html_e('Your comment is awaiting moderation.','agensy') ?></em>
             <?php endif; ?>
             <div class="comment-meta commentmetadata"><a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>"><?php printf(__('%1$s at %2$s','agensy'), get_comment_date(),  get_comment_time()) ?></a><?php edit_comment_link(__('(Edit)','agensy'),'  ','') ?></div>
          </div><!-- .commenter-name-wrap -->     
         <div class="comment-text">
             <?php comment_text() ?>
             <div class="reply">
                <?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
             </div>
         </div>
     </div><!-- .comment-wrapper -->             
     </div>
<?php
        }

/* -------------------------------------------------------------------------*/

/*
* Customizer sanitization
*/
function agensy_sanitize_textarea($input){
    return wp_kses_post(force_balance_tags($input));
}
