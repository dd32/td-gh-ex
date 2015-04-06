<?php
/**
 * Custom functions that act independently of the theme templates
 *
 * Eventually, some of the functionality here could be replaced by core features
 *
 * @package Accesspress Basic
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function accesspress_basic_body_classes( $classes ) {
	// Adds a class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	return $classes;
}
add_filter( 'body_class', 'accesspress_basic_body_classes' );

if ( version_compare( $GLOBALS['wp_version'], '4.1', '<' ) ) :
	/**
	 * Filters wp_title to print a neat <title> tag based on what is being viewed.
	 *
	 * @param string $title Default title text for current view.
	 * @param string $sep Optional separator.
	 * @return string The filtered title.
	 */
	function accesspress_basic_wp_title( $title, $sep ) {
		if ( is_feed() ) {
			return $title;
		}

		global $page, $paged;

		// Add the blog name
		$title .= get_bloginfo( 'name', 'display' );

		// Add the blog description for the home/front page.
		$site_description = get_bloginfo( 'description', 'display' );
		if ( $site_description && ( is_home() || is_front_page() ) ) {
			$title .= " $sep $site_description";
		}

		// Add a page number if necessary:
		if ( ( $paged >= 2 || $page >= 2 ) && ! is_404() ) {
			$title .= " $sep " . sprintf( __( 'Page %s', 'accesspress-basic' ), max( $paged, $page ) );
		}

		return $title;
	}
	add_filter( 'wp_title', 'accesspress_basic_wp_title', 10, 2 );

	/**
	 * Title shim for sites older than WordPress 4.1.
	 *
	 * @link https://make.wordpress.org/core/2014/10/29/title-tags-in-4-1/
	 * @todo Remove this function when WordPress 4.3 is released.
	 */
	function accesspress_basic_render_title() {
		?>
		<title><?php wp_title( '|', true, 'right' ); ?></title>
		<?php
	}
	add_action( 'wp_head', 'accesspress_basic_render_title' );
endif;

/**
 * 
 * Custom Extra Functions
 */
    /**
     * 
     * Function to Show Social Icons in Header
     */ 
    function accesspress_basic_header_socialscb(){
        global $apbasic_options;
        $apbasic_settings = get_option('apbasic_options',$apbasic_options);
        
        $socials = array(
            array(
                'fa_icon' => 'fa-facebook',
                'id' => 'facebook'
            ),
            array(
                'fa_icon' => 'fa-twitter',
                'id' => 'twitter',
            ),
            array(
                'fa_icon' => 'fa-google-plus',
                'id' => 'gplus'
            ),
            array(
                'fa_icon' => 'fa-pinterest-p',
                'id' => 'pinterest',
            ),
            array(
                'fa_icon' => 'fa-linkedin',
                'id' => 'linkedin'
            ),
            array(
                'fa_icon' => 'fa-flickr',
                'id' => 'flickr',
            ),
            array(
                'fa_icon' => 'fa-vimeo-square',
                'id' => 'vimeo'
            ),
            array(
                'fa_icon' => 'fa-stumbleupon',
                'id' => 'stumbleupon',
            ),
            array(
                'fa_icon' => 'fa-instagram',
                'id' => 'instagram',
            ),
            array(
                'fa_icon' => 'fa-soundcloud',
                'id' => 'sound_cloud'
            ),
            array(
                'fa_icon' => 'fa-skype',
                'id' => 'skype',
            ),
            array(
                'fa_icon' => 'fa-rss',
                'id' => 'rss'
            ),
            array(
                'fa_icon' => 'fa-tumblr',
                'id' => 'tumblr',
            ),
            array(
                'fa_icon' => 'fa-my-space',
                'id' => 'myspace'
            ),
            array(
                'fa_icon' => 'fa-vk',
                'id' => 'vk',
            ),
        );
        
        ?>
            <ul>
                <?php foreach($socials as $social) : ?>
                    <?php //echo $apbasic_settings[$social['id']]; ?>
                    <?php if($apbasic_settings[$social['id']] != '') : ?>
                        <li><a href="<?php esc_url($apbasic_settings[$social['id']]); ?>" target="_blank" class="fa <?php echo $social['fa_icon'] ?>"></a></li>
                    <?php endif; ?>
                <?php endforeach; ?>
            </ul>
        <?php 
        
                
    }
    
    add_action('accesspress_basic_header_socials','accesspress_basic_header_socialscb');
 
    function accesspress_basic_slidercb(){
        global $apbasic_options;
        $apbasic_settings = get_option('apbasic_options', $apbasic_options);
        $mode = $apbasic_settings['slider_mode'];
        //print_r($apbasic_settings);
        for($i = 1; $i <= 4; $i++) :
            if(!empty($apbasic_settings['slide'.$i])) :
                $slides[] = array(
                    'slide' => $apbasic_settings['slide'.$i],
                    'caption_title' => $apbasic_settings['slide'.$i.'_title'],
                    'caption_description' => $apbasic_settings['slide'.$i.'_description'],
                    'readmore_text' => $apbasic_settings['slide'.$i.'_readmore_text'],
                    'readmore_link' => $apbasic_settings['slide'.$i.'_readmore_link'],
                    'readmore_icon' => $apbasic_settings['slide'.$i.'_readmore_button_icon']
                );
            endif;
        endfor;
        //print_r($slides);
        echo empty($slides);
        ?>
            <script type="text/javascript">
                jQuery(document).ready(function ($){
                    $("#apbasic-slider").bxSlider({
                        pager: true,
                        auto: false,
                        mode: '<?php echo $mode; ?>'
                    });
                });
            </script>
            <?php if(!empty($slides)) : ?>
                <div id="apbasic-slider">
                    <?php foreach($slides as $slide) : ?>
                        <?php if(!empty($slide['slide'])) : ?>
                            <div class="slide">
                                <div class="slider-image-container">
                                    <?php   
                                        $img_id = accesspress_basic_get_attachment_id_from_url($slide['slide']);
                                        $img = wp_get_attachment_image_src($img_id,'full', false);
                                    ?>
                                    <img src="<?php echo $img[0]; ?>" />
                                </div>
                                <?php if(!empty($slide['caption_title']) || !empty($slide['caption_description'])) : ?>
                                <div class="slider-caption-container">
                                    <?php if(!empty($slide['caption_title'])) : ?>
                                        <h1 class="caption-title"><?php echo $slide['caption_title']; ?></h1>
                                    <?php endif; ?>
                                    <?php if(!empty($slide['caption_description'])) : ?>
                                        <div class="caption-description"><?php echo $slide['caption_description']; ?></div>
                                    <?php endif; ?>
                                    <?php if(!empty($slide['readmore_text'])) : ?>
                                        <a class="readmore-button slide_readmore-button" href="<?php esc_url($slide['readmore_link']); ?>" target="_blank"><i class="fa <?php echo $slide['readmore_icon']; ?>"></i><?php echo $slide['readmore_text']; ?></a>
                                    <?php endif; ?>
                                </div>
                                <?php endif; ?>
                            </div>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        <?php
    }
    
    add_action('accesspress_basic_slider','accesspress_basic_slidercb',10);
