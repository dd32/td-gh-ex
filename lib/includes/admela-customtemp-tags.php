<?php
/**
 * Custom template tags for Admela
 *
 * @package WordPress
 * @subpackage Admela
 * @since Admela 1.0
 */



/*-----------------------------------------------------------------------------------*/
# Admela Previous/next post navigation.
/*-----------------------------------------------------------------------------------*/

if ( ! function_exists( 'admela_postnav' ) ) :

function admela_postnav() {

global $post;

$admela_prev_post = '';
$admela_nxt_post = '';

$admela_prev_post = get_previous_post();				 
$admela_next_post = get_next_post();


				 
	if(!empty($admela_prev_post) || !empty($admela_next_post) ):
	
	if(!empty($admela_prev_post) == ''):
	$admela_nxtpst_class = 'admela_nxtpst_dsgn';
	else:
	$admela_nxtpst_class = '';
	endif;
	
	?>

	<div class="admela_prenext <?php echo esc_attr($admela_nxtpst_class); ?>"> <!--Single post prev/next-->
  
  <?php  
 
  
  the_post_navigation( array(
	'prev_text' => 
				'<div class="admela_snlgepdsg">'.esc_html((admela_get_option('admela_preposttrnstxt')) ? admela_get_option('admela_preposttrnstxt'): 'Prev Post').'</div>'.
				'<div class="admela_snlgenpntit"><h4>%title</h4></div>',
	'next_text' => 
				'<div class="admela_snlgepdsg">'.esc_html((admela_get_option('admela_nxtposttrnstxt')) ? admela_get_option('admela_nxtposttrnstxt'): 'Next Post').'</div>'.
				'<div class="admela_snlgenpntit"><h4>%title</h4></div>',					
 ) );

  
 
?>
</div>
	<!-- preview / next -->

<?php 				
	endif;
}

endif;

 

/*-----------------------------------------------------------------------------------*/
# Admela Get Theme Options
/*-----------------------------------------------------------------------------------*/

if ( ! function_exists( 'admela_get_option' ) ) :

function admela_get_option( $admela_optionname ) {
	
	$admela_get_options = get_option( 'admela_theme_settings' );
	
	if( !empty( $admela_get_options[$admela_optionname] ))
		 return htmlspecialchars_decode($admela_get_options[$admela_optionname]);
		
	return false ;
}

endif;



/*-----------------------------------------------------------------------------------*/
# Admela post count views 
/*-----------------------------------------------------------------------------------*/

if( ! function_exists( 'admela_set_post_views' )):

function admela_set_post_views($postID) { 
$admelacount_key = 'admela_post_views_count';
$admela_count = get_post_meta($postID, $admelacount_key, true);
if($admela_count=='')
{
$admela_count = 0;
delete_post_meta($postID, $admelacount_key);
add_post_meta($postID, $admelacount_key, '0');
}else{
$admela_count++;
update_post_meta($postID, $admelacount_key, $admela_count);
}
}

endif;

/*-----------------------------------------------------------------------------------*/
# Admela Track post views 
/*-----------------------------------------------------------------------------------*/

if( ! function_exists( 'admela_track_post_views' )):

function admela_track_post_views ($post_id) {
if ( !is_single() ) return;
if ( empty ( $post_id) ) {
global $post;
$post_id = $post->ID;   
}
admela_set_post_views($post_id);

}

endif;

add_action( 'wp_head', 'admela_track_post_views'); // add action to load the data in wp-head

/*-----------------------------------------------------------------------------------*/
# Admela get the post count view 
/*-----------------------------------------------------------------------------------*/

if( ! function_exists( 'admela_get_post_views' )):

function admela_get_post_views($postID){
$admelacount_key = 'admela_post_views_count';
$admelacount = get_post_meta($postID, $admelacount_key, true);
if($admelacount==''){
delete_post_meta($postID, $admelacount_key);
add_post_meta($postID, $admelacount_key, '0');
return "0";
}
return $admelacount;
}

endif;

//To keep the count accurate, lets get rid of prefetching
remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);

// Remove issues with prefetching adding extra views
remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);	

/*-----------------------------------------------------------------------------------*/

# Admela Crop the wp post thumbnail image

/*-----------------------------------------------------------------------------------*/



/**

 * Title         : Aqua Resizer

 * Description   : Resizes WordPress images on the fly

 * Version       : 1.2.1

 * Author        : Syamil MJ

 * Author URI    : http://aquagraphite.com

 * License       : WTFPL - http://sam.zoy.org/wtfpl/

 * Documentation : https://github.com/sy4mil/Aqua-Resizer/

 *

 * @param string  $url      - (required) must be uploaded using wp media uploader

 * @param int     $width    - (required)

 * @param int     $height   - (optional)

 * @param bool    $crop     - (optional) default to soft crop

 * @param bool    $single   - (optional) returns an array if false

 * @param bool    $upscale  - (optional) resizes smaller images

 * @uses  wp_upload_dir()

 * @uses  image_resize_dimensions()

 * @uses  wp_get_image_editor()

 *

 * @return str|array

 */



if(!class_exists('admela_autoresize')) {

    class Admela_Aqexception extends Exception {}



    class admela_autoresize

    {

        /**

         * The singleton instance

         */

        static private $instance = null;



        /**

         * Should an Admela_Aqexception be thrown on error?

         * If false (default), then the error will just be logged.

         */

        public $throwOnError = false;



        /**

         * No initialization allowed

         */

        private function __construct() {}



        /**

         * No cloning allowed

         */

        private function __clone() {}



        /**

         * For your custom default usage you may want to initialize an admela_autoresize object by yourself and then have own defaults

         */

        static public function getInstance() {

            if(self::$instance == null) {

                self::$instance = new self;

            }



            return self::$instance;

        }



        /**

         * Run, forest.

         */

        public function process( $url, $width = null, $height = null, $crop = null, $single = true, $upscale = false ) {

            try {

                // Validate inputs.

                if (!$url)

                    throw new Admela_Aqexception('$url parameter is required');

                if (!$width)

                    throw new Admela_Aqexception('$width parameter is required');



                // Caipt'n, ready to hook.

                if ( true === $upscale ) add_filter( 'image_resize_dimensions', array($this, 'admela_aqupscale'), 10, 6 );



                // Define upload path & dir.

                $upload_info = wp_upload_dir();

                $upload_dir = $upload_info['basedir'];

                $upload_url = $upload_info['baseurl'];

                

                $http_prefix = "http://";

                $https_prefix = "https://";

                $relative_prefix = "//"; // The protocol-relative URL

                

                /* if the $url scheme differs from $upload_url scheme, make them match 

                   if the schemes differe, images don't show up. */

                if(!strncmp($url,$https_prefix,strlen($https_prefix))){ //if url begins with https:// make $upload_url begin with https:// as well

                    $upload_url = str_replace($http_prefix,$https_prefix,$upload_url);

                }

                elseif(!strncmp($url,$http_prefix,strlen($http_prefix))){ //if url begins with http:// make $upload_url begin with http:// as well

                    $upload_url = str_replace($https_prefix,$http_prefix,$upload_url);      

                }

                elseif(!strncmp($url,$relative_prefix,strlen($relative_prefix))){ //if url begins with // make $upload_url begin with // as well

                    $upload_url = str_replace(array( 0 => "$http_prefix", 1 => "$https_prefix"),$relative_prefix,$upload_url);

                }                



                // Check if $img_url is local.

                if ( false === strpos( $url, $upload_url ) )

                    throw new Admela_Aqexception('Image must be local: ' . $url);



                // Define path of image.

                $rel_path = str_replace( $upload_url, '', $url );

                $img_path = $upload_dir . $rel_path;



                // Check if img path exists, and is an image indeed.

                if ( ! file_exists( $img_path ) or ! getimagesize( $img_path ) )

                    throw new Admela_Aqexception('Image file does not exist (or is not an image): ' . $img_path);



                // Get image info.

                $info = pathinfo( $img_path );

                $ext = $info['extension'];

                list( $orig_w, $orig_h ) = getimagesize( $img_path );



                // Get image size after cropping.

                $dims = image_resize_dimensions( $orig_w, $orig_h, $width, $height, $crop );

                $dst_w = $dims[4];

                $dst_h = $dims[5];



                // Return the original image only if it exactly fits the needed measures.

                if ( ! $dims && ( ( ( null === $height && $orig_w == $width ) xor ( null === $width && $orig_h == $height ) ) xor ( $height == $orig_h && $width == $orig_w ) ) ) {

                    $img_url = $url;

                    $dst_w = $orig_w;

                    $dst_h = $orig_h;

                } else {

                    // Use this to check if cropped image already exists, so we can return that instead.

                    $suffix = "{$dst_w}x{$dst_h}";

                    $dst_rel_path = str_replace( '.' . $ext, '', $rel_path );

                    $destfilename = "{$upload_dir}{$dst_rel_path}-{$suffix}.{$ext}";



                    if ( ! $dims || ( true == $crop && false == $upscale && ( $dst_w < $width || $dst_h < $height ) ) ) {

                        // Can't resize, so return false saying that the action to do could not be processed as planned.

                        throw new Admela_Aqexception('Unable to resize image because image_resize_dimensions() failed');

                    }

                    // Else check if cache exists.

                    elseif ( file_exists( $destfilename ) && getimagesize( $destfilename ) ) {

                        $img_url = "{$upload_url}{$dst_rel_path}-{$suffix}.{$ext}";

                    }

                    // Else, we resize the image and return the new resized image url.

                    else {

                        $editor = wp_get_image_editor( $img_path );

                        if ( is_wp_error( $editor ) || is_wp_error( $editor->resize( $width, $height, $crop ) ) ) {

                            throw new Admela_Aqexception('Unable to get WP_Image_Editor: ' . 

                                       $editor->get_error_message() . ' (is GD or ImageMagick installed?)');

                        }

                        $resized_file = $editor->save();

                        if ( ! is_wp_error( $resized_file ) ) {

                            $resized_rel_path = str_replace( $upload_dir, '', $resized_file['path'] );

                            $img_url = $upload_url . $resized_rel_path;

                        } else {

                            /*throw new Admela_Aqexception('Unable to save resized image file: 
							' . $editor->get_error_message().'');
							*/

                        }

                    }

                }



                // Okay, leave the ship.

                if ( true === $upscale ) remove_filter( 'image_resize_dimensions', array( $this, 'admela_aqupscale' ) );


                // Return the output.

                if ( $single ) {

                    // str return.

                    $image = $img_url;

                } else {

                    // array return.

                    $image = array (

                        0 => $img_url,

                        1 => $dst_w,

                        2 => $dst_h

                    );

                }

                return $image;

            }

            catch (Admela_Aqexception $ex) {

                //error_log('admela_autoresize.process() error: ' . $ex->getMessage());

                if ($this->throwOnError) {

                    // Bubble up exception.

                    throw $ex;

                }

                else {

                    // Return false, so that this patch is backwards-compatible.

                    return false;

                }

            }

        }

        /**

         * Callback to overwrite WP computing of thumbnail measures

         */

        function admela_aqupscale( $default, $orig_w, $orig_h, $dest_w, $dest_h, $crop ) {

            if ( ! $crop ) return null; // Let the wordpress default function handle this.



            // Here is the point we allow to use larger image size than the original one.

            $aspect_ratio = $orig_w / $orig_h;

            $new_w = $dest_w;

            $new_h = $dest_h;



            if ( ! $new_w ) {

                $new_w = intval( $new_h * $aspect_ratio );

            }



            if ( ! $new_h ) {

                $new_h = intval( $new_w / $aspect_ratio );

            }



            $size_ratio = max( $new_w / $orig_w, $new_h / $orig_h );



            $crop_w = round( $new_w / $size_ratio );

            $crop_h = round( $new_h / $size_ratio );



            $s_x = floor( ( $orig_w - $crop_w ) / 2 );

            $s_y = floor( ( $orig_h - $crop_h ) / 2 );



            return array( 0, 0, (int) $s_x, (int) $s_y, (int) $new_w, (int) $new_h, (int) $crop_w, (int) $crop_h );

        }

    }

}


if(!function_exists('admela_autoresize')) {



    /**

     * This is just a tiny wrapper function for the class above so that there is no

     * need to change any code in your own WP themes. Usage is still the same :)

     */

    function admela_autoresize( $url, $width = null, $height = null, $crop = null, $single = true, $upscale = false ) {

        /* WPML Fix */

        if ( defined( 'ICL_SITEPRESS_VERSION' ) ){

            global $sitepress;

            $url = $sitepress->convert_url( $url, $sitepress->get_default_language() );

        }

        /* WPML Fix */



        $admela_autoresize = admela_autoresize::getInstance();

        return $admela_autoresize->process( $url, $width, $height, $crop, $single, $upscale );

    }

}

/*-----------------------------------------------------------------------------------*/
# Admela RelatedPost
/*-----------------------------------------------------------------------------------*/


if(! function_exists( 'admela_relatedpost' ) ):

function admela_relatedpost() {

if(is_single()) {
	
global $post;

$post_id = $post->ID;

$admela_bylineck = admela_get_option('admela_ebylfp');

if(admela_get_option('admela_choserd1') != false):
$admela_choserd1 = admela_get_option('admela_choserd1');
else:
$admela_choserd1 = 'latest';
endif;

if($admela_choserd1 == 'latest'):

$admela_orderbychs1 = 'date';

elseif($admela_choserd1 == 'random'):

$admela_orderbychs1 = 'rand';

else:

$admela_orderbychs1 = 'date';

endif;


if(admela_get_option('admela_choserd2') != false):
$admela_choserd2 = admela_get_option('admela_choserd2');
else:
$admela_choserd2 = 'latest';
endif;



if($admela_choserd2 == 'latest'):

$admela_orderbychs2 = 'date';

elseif($admela_choserd2 == 'random'):

$admela_orderbychs2 = 'rand';

else:

$admela_orderbychs2 = 'date';

endif;

	if((admela_get_option('admela-enable-related-post-by-tag')) != false) // related posts display by tag
	{
	
	
	if(admela_get_option('admela_relatedpostbytagcount') != false):
	
	$admela_rpbytag = admela_get_option('admela_relatedpostbytagcount');
	
	else:
	
	$admela_rpbytag = '4';
	
	endif;
	

		
	$admela_tags = wp_get_post_tags($post->ID);
	if ($admela_tags) {
	
	$admela_tag_ids = array();
	foreach($admela_tags as $individual_tag) $admela_tag_ids[] = $individual_tag->term_id;
	$admela_reltagargs=array(
	'tag__in' => $admela_tag_ids,
	'orderby'=>$admela_orderbychs2,
	'post__not_in' => array($post->ID),
	'posts_per_page'=> $admela_rpbytag, // Number of related posts that will be displayed.
    'ignore_sticky_posts'=>1,	
	);
	$admela_rel_tagquery = new wp_query( $admela_reltagargs );
	if( $admela_rel_tagquery->have_posts() ) {				
	
	echo '<div class="admela_related_posts">
	<h5 class="admela_related_postsheading">'.esc_html__('You May Also Like','admela').'</h5><ul>';
	while( $admela_rel_tagquery->have_posts() ) {
	$admela_rel_tagquery->the_post(); 
	
	?>
<li>
  <?php			  
  
  
					  
		$admelafeatured_imgwidth1 = 410;
		$admelafeatured_imgheight1 = 245;
 

		$admela_postthumb1 = get_post_thumbnail_id();
		$admelapost_imgsrc = wp_get_attachment_url( $admela_postthumb1,'full'); //get img URL	
		$admela_relatedimgurl = admela_autoresize($admelapost_imgsrc,$admelafeatured_imgwidth1,$admelafeatured_imgheight1,true);					 
		$admela_featdvidurl = get_post_meta($post->ID, '_admela_featured_videourl', true); 
		$admela_youtube_matchexp = "/\s*[a-zA-Z\/\/:\.]*youtube.com\/watch\?v=([a-zA-Z0-9\-_]+)([a-zA-Z0-9\/\*\-\_\?\&\;\%\=\.]*)/i";  
		$admela_vimeo_matchexp = "/https?:\/\/(?:www\.|player\.)?vimeo.com\/(?:channels\/(?:\w+\/)?|groups\/([^\/]*)\/videos\/|album\/(\d+)\/video\/|video\/|)(\d+)(?:$|\/|\?)/";
		$admela_souncloud_matchexp = "%(?:https?://)(?:www\.)?soundcloud\.com/([\-a-z0-9_]+/[\-a-z0-9_]+)%im";
		$admela_framename = "iframe";  



   		    if($admela_featdvidurl != false || $admela_relatedimgurl != false) {
						
			if($admela_featdvidurl != false) {

				if(preg_match($admela_youtube_matchexp , $admela_featdvidurl)) {
						
				$admela_featdvidurl = preg_replace($admela_youtube_matchexp,"<".esc_attr($admela_framename)." width=\"".absint($admelafeatured_imgwidth1)."\" height=\"".absint($admelafeatured_imgheight1)."\" src=\"//www.youtube.com/embed/$1\"  allowfullscreen></iframe>",$admela_featdvidurl);
						
				echo wp_kses_stripslashes($admela_featdvidurl);					
						
			}
						
			elseif(preg_match($admela_vimeo_matchexp , $admela_featdvidurl)) {						
												
				$admela_vimeovideos = preg_replace( $admela_vimeo_matchexp ,"<".esc_attr($admela_framename)." width=\"".absint($admelafeatured_imgwidth1)."\" height=\"".absint($admelafeatured_imgheight1)."\" src=\"//player.vimeo.com/video/$3\"  allowfullscreen></iframe>",$admela_featdvidurl);
						
				echo wp_kses_stripslashes($admela_vimeovideos);
						
			}
						
			elseif(preg_match( $admela_souncloud_matchexp , $admela_featdvidurl)) {
						
				$admela_souncloudsng = preg_replace( $admela_souncloud_matchexp ,'<'.esc_attr($admela_framename).' width="'.absint($admelafeatured_imgwidth1).'" height="'.absint($admelafeatured_imgheight1).'" src="https://w.soundcloud.com/player/?url=https://soundcloud.com/$1&amp;auto_play=false&amp;hide_related=false&amp;show_comments=true&amp;show_user=true&amp;show_reposts=false&amp;visual=true"></iframe>',$admela_featdvidurl); 
						
				echo wp_kses_stripslashes($admela_souncloudsng);	
						
			}					
				
			}
						
			elseif($admelapost_imgsrc != false && $admela_featdvidurl == false ) { 
			?>
  <a  href="<?php esc_url(the_permalink()); ?>" title="<?php esc_html(the_title()); ?>"> <img src="<?php echo esc_url($admela_relatedimgurl);  ?>" alt="<?php esc_html_e('image','admela'); ?>"/> </a>
  <?php 
			}
			}
			
		
			
	        ?>
  <div class="admela_rel_entry_meta">
    <?php the_title( sprintf( '<h2 class="admela_entry_title" itemprop="headline"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' );?>
    <?php  if( 1 != (int) $admela_bylineck )  { ?>
    <div class="admela_entry_cat">
      <?php if(admela_get_option('admela_ppostedon') != TRUE) { ?>
      <span class="admela_date">
      <?php esc_html_e('On','admela'); ?>
      <?php the_time(get_option( 'date_format' )); ?>
      </span>
      <?php }
	 if(admela_get_option('admela_pcategory') != TRUE) { ?>
      <span class="admela_catgory">
      <?php esc_html_e('In','admela'); ?>
      <?php  the_category(' ,');?>
      </span>
      <?php  } ?>
    </div>
    <?php  } ?>
  </div>
</li>
<?php		
	}
	echo '</ul></div>';
	} }
	
	wp_reset_postdata(); 
	}

if((admela_get_option('admela-enable-related-post-by-category')) == false) // related posts display by category
	{
		
		
		if(admela_get_option('admela_relatedpostbycategorycount') != false){
		
		$admela_rpbycategory = admela_get_option('admela_relatedpostbycategorycount');
		
		}
		else{
		
		$admela_rpbycategory = '4';
		
		}
		
	
	$admela_categories = get_the_category($post->ID);
	if ($admela_categories) {		
	
	$category_ids = array();
	foreach($admela_categories as $admela_individual_category) $admela_category_ids[] = $admela_individual_category->term_id;
	$admela_catrelargs = array(
	'category__in' => $category_ids,
	'orderby'=>$admela_orderbychs1,
	'post__not_in' => array($post->ID),
	'posts_per_page'=> $admela_rpbycategory, // Number of related posts that will be displayed.
	'ignore_sticky_posts'=>1,	
	);
				
	$admela_relcat_query = new wp_query( $admela_catrelargs );
	
		
	if( $admela_relcat_query->have_posts() ) {
		
	 
	echo '<div class="admela_related_posts">
	<h5 class="admela_related_postsheading">'.esc_html__('You May Also Like','admela').'</h5><ul>';
	while( $admela_relcat_query->have_posts() ) {
	$admela_relcat_query->the_post(); 
	?>
<li>
  <?php			  
	
		
					  
		$admelafeatured_imgwidth1 = 410;
		$admelafeatured_imgheight1 = 245;
		

		$admela_postthumb1 = get_post_thumbnail_id();
		$admelapost_imgsrc = wp_get_attachment_url( $admela_postthumb1,'full'); //get img URL	
		$admela_relatedimgurl = admela_autoresize($admelapost_imgsrc,$admelafeatured_imgwidth1,$admelafeatured_imgheight1,true);		 
		$admela_featdvidurl = get_post_meta($post->ID, '_admela_featured_videourl', true); 
		$admela_youtube_matchexp = "/\s*[a-zA-Z\/\/:\.]*youtube.com\/watch\?v=([a-zA-Z0-9\-_]+)([a-zA-Z0-9\/\*\-\_\?\&\;\%\=\.]*)/i";  
		$admela_vimeo_matchexp = "/https?:\/\/(?:www\.|player\.)?vimeo.com\/(?:channels\/(?:\w+\/)?|groups\/([^\/]*)\/videos\/|album\/(\d+)\/video\/|video\/|)(\d+)(?:$|\/|\?)/";
		$admela_souncloud_matchexp = "%(?:https?://)(?:www\.)?soundcloud\.com/([\-a-z0-9_]+/[\-a-z0-9_]+)%im";
		$admela_framename = "iframe";  			  
						
          if($admela_featdvidurl != false || $admela_relatedimgurl != false) {
						
			if($admela_featdvidurl != false) {

				if(preg_match($admela_youtube_matchexp , $admela_featdvidurl)) {
						
				$admela_featdvidurl = preg_replace($admela_youtube_matchexp,"<".esc_attr($admela_framename)." width=\"".absint($admelafeatured_imgwidth1)."\" height=\"".absint($admelafeatured_imgheight1)."\" src=\"//www.youtube.com/embed/$1\"  allowfullscreen></iframe>",$admela_featdvidurl);
						
				echo wp_kses_stripslashes($admela_featdvidurl);					
						
			}
						
			elseif(preg_match($admela_vimeo_matchexp , $admela_featdvidurl)) {						
												
				$admela_vimeovideos = preg_replace( $admela_vimeo_matchexp ,"<".esc_attr($admela_framename)." width=\"".absint($admelafeatured_imgwidth1)."\" height=\"".absint($admelafeatured_imgheight1)."\" src=\"//player.vimeo.com/video/$3\"  allowfullscreen></iframe>",$admela_featdvidurl);
						
				echo wp_kses_stripslashes($admela_vimeovideos);
						
			}
						
			elseif(preg_match( $admela_souncloud_matchexp , $admela_featdvidurl)) {
						
				$admela_souncloudsng = preg_replace( $admela_souncloud_matchexp ,'<'.esc_attr($admela_framename).' width="'.absint($admelafeatured_imgwidth1).'" height="'.absint($admelafeatured_imgheight1).'" src="https://w.soundcloud.com/player/?url=https://soundcloud.com/$1&amp;auto_play=false&amp;hide_related=false&amp;show_comments=true&amp;show_user=true&amp;show_reposts=false&amp;visual=true"></iframe>',$admela_featdvidurl); 
						
				echo wp_kses_stripslashes($admela_souncloudsng);	
						
			}					
				
			}
						
			elseif($admelapost_imgsrc != false && $admela_featdvidurl == false ) { 
			?>
  <a  href="<?php esc_url(the_permalink()); ?>" title="<?php esc_html(the_title()); ?>"> <img src="<?php echo esc_url($admela_relatedimgurl);  ?>" alt="<?php esc_html_e('image','admela'); ?>"/> </a>
  <?php 
			}
			}
			
				        
	        ?>
  <div class="admela_rel_entry_meta">
    <?php the_title( sprintf( '<h2 class="admela_entry_title" itemprop="headline"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' );?>
    <?php  if( 1 != (int) $admela_bylineck )  {  ?>
    <div class="admela_entry_cat">
      <?php
	   if(admela_get_option('admela_ppostedon') != TRUE) { ?>
      <span class="admela_date">
      <?php  esc_html_e('On','admela'); ?>
      <?php the_time(get_option( 'date_format' )); ?>
      </span>
      <?php
	  }
	   if(admela_get_option('admela_pcategory') != TRUE) { ?>
      <span class="admela_catgory">
      <?php  esc_html_e('In','admela'); ?>
      <?php  the_category(' ,');?>
      </span>
      <?php }  ?>
    </div>
    <?php }  ?>
  </div>
</li>
<?php

	}
	echo '</ul></div>';
	} 
	}
	
	wp_reset_postdata();
	
	}

}
}

endif;

/*-----------------------------------------------------------------------------------*/
# Admela Pagination
/*-----------------------------------------------------------------------------------*/


if ( ! function_exists( 'admela_paging_nav' ) ) :
/**
 *
 * @global WP_Query   $wp_query   WordPress Query object.
 * @global WP_Rewrite $wp_rewrite WordPress Rewrite object.
 */
function admela_paging_nav() {

if(admela_get_option('admela_hmpgpaginationno') != true) {
	
	global $wp_query, $wp_rewrite;

	// Don't print empty markup if there's only one page.
	if ( $wp_query->max_num_pages < 2 ) {
		return;
	}

	$admela_paged        = get_query_var( 'paged' ) ? intval( get_query_var( 'paged' ) ) : 1;
	$admela_pagenum_link = html_entity_decode( get_pagenum_link() );
	$admela_query_args   = array();
	$admela_url_parts    = explode( '?', $admela_pagenum_link );

	if ( isset( $admela_url_parts[1] ) ) {
		wp_parse_str( $admela_url_parts[1], $admela_query_args );
	}

	$admela_pagenum_link = remove_query_arg( array_keys( $admela_query_args ), $admela_pagenum_link );
	$admela_pagenum_link = trailingslashit( $admela_pagenum_link ) . '%_%';

	$admela_format  = $wp_rewrite->using_index_permalinks() && ! strpos( $admela_pagenum_link, 'index.php' ) ? 'index.php/' : '';
	$admela_format .= $wp_rewrite->using_permalinks() ? user_trailingslashit( $wp_rewrite->pagination_base . '/%#%', 'paged' ) : '?paged=%#%';

	// Set up paginated links.
	$admela_pagenav_links = paginate_links( array(
		'base'     => $admela_pagenum_link,
		'format'   => $admela_format,
		'total'    => $wp_query->max_num_pages,
		'current'  => $admela_paged,
		'mid_size' => 1,
		'add_args' => array_map( 'urlencode', $admela_query_args ),
		'prev_text' => esc_html__( '&larr; Previous', 'admela' ),
		'next_text' => esc_html__( 'Next &rarr;', 'admela' ),
	) );

	if ( $admela_pagenav_links ) :

	?>
<div class="admela_pagination"> <?php echo wp_kses_stripslashes($admela_pagenav_links); ?> </div>
<!-- .admela_pagination -->
<?php
endif;
}

if(admela_get_option('admela_hmpgpgnextprev') != '') {
	
global $post;

$admela_prev_post = '';
$admela_nxt_post = '';

$admela_prev_post = get_previous_post();				 
$admela_next_post = get_next_post();

				 
	if(!empty($admela_prev_post) || !empty($admela_next_post) ):
	
	if(!empty($admela_prev_post) == ''):
	$admela_nxtpst_class = 'admela_nxtpst_dsgn';
	else:
	$admela_nxtpst_class = '';
	endif;
	
	?>

	<div class="admela_prenext admela_hmpageprenext <?php echo esc_attr($admela_nxtpst_class); ?>"> <!--Home post prev/next-->
  
  <?php
  
  
  if(admela_get_option('admela_singleprevcontent') != false):
  
  $admela_prevpagicontent = admela_get_option('admela_singleprevcontent');
  
  else:
  
  $admela_prevpagicontent = 'Prev Post';
  
  endif;
  
  if(admela_get_option('admela_singlenextcontent') != false):
  
  $admela_nextpagicontent = admela_get_option('admela_singlenextcontent');
  
  else:
  
  $admela_nextpagicontent = 'Next Post';
  
  endif;
  
  the_post_navigation( array(
	'prev_text' => 
				'<span> <i class="fa fa-angle-double-left"></i> </span>'.
				'<div class="admela_snlgepdsg">'.esc_html($admela_prevpagicontent).'</div>'.
				'<div class="admela_snlgenpntit">%title</div>',
	'next_text' => 
				'<span> <i class="fa fa-angle-double-right"></i> </span>'.
				'<div class="admela_snlgepdsg">'.esc_html($admela_nextpagicontent).'</div>'.
				'<div class="admela_snlgenpntit">%title</div>',					
 ) );
 ?>
 </div>
 <?php
endif;
}
}
endif;


/*-----------------------------------------------------------------------------------*/
# Admela FeaturedImage
/*-----------------------------------------------------------------------------------*/


if ( ! function_exists( 'admela_featuredimage' ) ) :
 
function admela_featuredimage() { 

    global $post,$admela_counter;
	
	$admela_thumb = get_post_thumbnail_id();
 	$admela_imgurl = wp_get_attachment_url( $admela_thumb,'full'); //get img URL
	
	$admela_ytdimg = get_post_meta($post->ID, '_admela_featured_videourl', true); 
	$admela_youtube_matchexp = "/\s*[a-zA-Z\/\/:\.]*youtube.com\/watch\?v=([a-zA-Z0-9\-_]+)([a-zA-Z0-9\/\*\-\_\?\&\;\%\=\.]*)/i";  
	$admela_youtube_matchexp1 = "/\s*[a-zA-Z\/\/:\.]*youtu.be\/([a-zA-Z0-9\-_]+)([a-zA-Z0-9\/\*\-\_\?\&\;\%\=\.]*)/i";
	$admela_vimeomatchexp = "/https?:\/\/(?:www\.|player\.)?vimeo.com\/(?:channels\/(?:\w+\/)?|groups\/([^\/]*)\/videos\/|album\/(\d+)\/video\/|video\/|)(\d+)(?:$|\/|\?)/";
	$admela_souncloudmatchexp = "%(?:https?://)(?:www\.)?soundcloud\.com/([\-a-z0-9_]+/[\-a-z0-9_]+)%im";
	$admela_framename = "iframe";
	
	$admela_blog_layout = ((admela_get_option('admela_blog_scheme')) ? admela_get_option('admela_blog_scheme') : 'amblyt1');
	
    if((is_single() || is_page())){
	    $admela_fwidth = '864';
		$admela_fheight = '550';
	}
	
	else{
		
	
		$admela_fwidth = '397';
		$admela_fheight = '255';
	
	
	
	}
	
	
	
	
	$admela_image = admela_autoresize( $admela_imgurl, $admela_fwidth, $admela_fheight, true ); //resize & crop img

	if(($admela_ytdimg != "")  || ($admela_image != "")){
	
	if($admela_ytdimg != "") {
	
	if(preg_match($admela_youtube_matchexp , $admela_ytdimg)) {	
	
	$admela_yuvid = preg_replace($admela_youtube_matchexp,"<".esc_attr($admela_framename)." width=\"".absint($admela_fwidth)."\" height=\"".absint($admela_fheight)."\" src=\"https://www.youtube.com/embed/$1\" allowfullscreen></iframe>",$admela_ytdimg);
	
	echo wp_kses_stripslashes($admela_yuvid);
	
	}
	
	elseif(preg_match($admela_youtube_matchexp1 , $admela_ytdimg)) {	
	
	$admela_yuvid = preg_replace($admela_youtube_matchexp1,"<".esc_attr($admela_framename)." width=\"".absint($admela_fwidth)."\" height=\"".absint($admela_fheight)."\" src=\"https://www.youtube.com/embed/$1\" allowfullscreen></iframe>",$admela_ytdimg);
	
	echo wp_kses_stripslashes($admela_yuvid);
	
	}
	
	elseif(preg_match($admela_vimeomatchexp , $admela_ytdimg)) {
	
	$admela_vimeovideos = preg_replace( $admela_vimeomatchexp ,"<".esc_attr($admela_framename)." width=\"".absint($admela_fwidth)."\" height=\"".absint($admela_fheight)."\" src=\"https://player.vimeo.com/video/$3\" allowfullscreen></iframe>",$admela_ytdimg);
	
	echo wp_kses_stripslashes($admela_vimeovideos);
	
	}
	
	elseif(preg_match( $admela_souncloudmatchexp , $admela_ytdimg)) {	
	
	$admela_souncloudsng = preg_replace( $admela_souncloudmatchexp ,'<'.esc_attr($admela_framename).' width="'.absint($admela_fwidth).'" height="'.absint($admela_fheight).'" scrolling="no" src="https://w.soundcloud.com/player/?url=https://soundcloud.com/$1&amp;auto_play=false&amp;hide_related=false&amp;show_comments=true&amp;show_user=true&amp;show_reposts=false&amp;visual=true"></iframe>',$admela_ytdimg); 
	
	echo wp_kses_stripslashes($admela_souncloudsng);
	
	}
	
	} 		
	
	elseif($admela_image != "" && $admela_ytdimg == "" ) { 
	?>
	<a href="<?php the_permalink(); ?>">
		<img src="<?php echo esc_url($admela_image); ?>" title="<?php esc_attr(the_title());  ?>" alt="<?php esc_html_e('img','admela'); ?>" />
	</a>
	<?php 
	}
	
	elseif($admela_image == "" && $admela_ytdimg == "" ) { 
	
		the_post_thumbnail();
	
	}
	}
    
}

endif;


/*-----------------------------------------------------------------------------------*/
# Admela Breadcrumb
/*-----------------------------------------------------------------------------------*/



if ( ! function_exists( 'admela_breadcrumb' ) ) :

function admela_breadcrumb() {
global $post;
	$admela_delimiter = '/';	
	echo '<div class="admela_breadcrumb">';	
	$admela_homeLink = home_url();
	echo '<a href="' . esc_url($admela_homeLink) . '" class="bcb">'.esc_html__('Home','admela').'</a> ' . esc_attr($admela_delimiter) . ' ';
	

if ( is_single() && !is_attachment() ) {

	if ( get_post_type() != 'post' ) {
	
		$admela_post_type = get_post_type_object(get_post_type());
		$admela_slug = $admela_post_type->rewrite;
		echo '<a href="' . esc_url($admela_homeLink) . '/' . esc_html($admela_slug['slug']) . '/">' . esc_html($admela_post_type->labels->singular_name) . '</a>' . esc_attr($admela_delimiter) . ' ';
		echo esc_html(get_the_title());
	
	} 

else {

	$admela_cat = get_the_category(); 
	$admela_cat = $admela_cat[0];
	echo get_category_parents($admela_cat, TRUE, ' ' . $admela_delimiter . ' ');
	echo esc_html(get_the_title());
	
}
} 


elseif ( is_attachment() ) {

	$admela_parent_id  = $post->post_parent;
	$admela_breadcrumbs = array();
	while ($admela_parent_id) {
	$admela_page = get_page($admela_parent_id);
	$admela_breadcrumbs[] = '<a href="' . esc_url(get_permalink($admela_page->ID)) . '">' . esc_html(get_the_title($admela_page->ID)) . '</a>';
	$admela_parent_id    = $admela_page->post_parent;
	}
	$admela_breadcrumbs = array_reverse($admela_breadcrumbs);
	foreach ($admela_breadcrumbs as $admela_crumb) echo ' ' . wp_kses_stripslashes($admela_crumb) . ' ' . wp_kses_stripslashes($admela_delimiter) . ' ';
	echo esc_html(get_the_title());

} 

elseif ( is_page() && !$post->post_parent ) {

	echo esc_html(get_the_title());
	
} 

elseif ( is_page() && $post->post_parent ) {

	$admela_parent_id  = $post->post_parent;
	$admela_breadcrumbs = array();
	while ($admela_parent_id) {
	$admela_page = get_page($admela_parent_id);
	$admela_breadcrumbs[] = '<a href="' . esc_url(get_permalink($admela_page->ID)) . '">' . esc_html(get_the_title($admela_page->ID)) . '</a>';
	$admela_parent_id    = $admela_page->post_parent;
	
}

$admela_breadcrumbs = array_reverse($admela_breadcrumbs);
foreach ($admela_breadcrumbs as $admela_crumb) 
echo ' ' . wp_kses_stripslashes($admela_crumb) . ' ' . wp_kses_stripslashes($admela_delimiter) . ' ';
echo esc_html(get_the_title());

} 

if ( get_query_var('paged') ) {
if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo '(';
echo ('Page') . ' ' . get_query_var('paged');
if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ')';
}

echo '</div>';

}

endif;


	
/*-----------------------------------------------------------------------------------*/
# Admela Post/Page Entry Meta
/*-----------------------------------------------------------------------------------*/


if ( ! function_exists( 'admela_entrymeta' ) ) :

function admela_entrymeta() {	
global $post;
      if(is_single()) {	
		
		if(admela_get_option('admela_ebylfp') != TRUE) { ?>
<div class="admela_entrybyline admela_etrymeta">
   <?php  if((admela_get_option('admela_ppostedby') != TRUE) || (admela_get_option('admela_ppostedon') != TRUE) || (admela_get_option('admela_ppostedtime') != TRUE)) {	  ?>
    <div class="admela_ebyleft">
		<?php
		echo get_avatar( get_the_author_meta( 'user_email' ), 51 );
		?>		
		<div class="admela_entrymeta">
		<span class="admela_bylinetext">
		<?php
			esc_html_e('By','admela');
		?> 
		<?php the_author_posts_link(); ?>
		</span>
		<?php if((admela_get_option('admela_ppostedon') != TRUE) || (admela_get_option('admela_ppostedtime') != TRUE)) { ?>
	    <span class="admela_bylinetext"><?php the_time(get_option( 'date_format')); ?> 
		<?php
		if((admela_get_option('admela_ppostedtime') != TRUE)) {
			esc_html_e('At','admela'); the_time(get_option( 'time_format')); 
		}
		?>	    
		</span>
		<?php } ?>
		</div>
	</div>  
   <?php } if(admela_get_option('admela_active_postsocialshare') != false) {	 ?>
    <div class="admela_ebyright">
		<?php if(admela_get_option('admela_postsocialfb') != false){ ?>
			<a href="//www.facebook.com/sharer.php?u=<?php esc_url(the_permalink()); ?>&amp;t=<?php echo htmlspecialchars(urlencode(html_entity_decode(esc_html(get_the_title()), ENT_COMPAT, 'UTF-8')), ENT_COMPAT, 'UTF-8'); ?>" class="admela_eshfb" target="_blank" onclick="javascript:window.open(this.href,'','menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=800,width=800');return false;"> <i class="fa fa-facebook"></i><span class="admela_esfbtext"><?php esc_html_e('Share on Facebook','admela'); ?></span></a>
			<!--facebook-->
		<?php }	
		if(admela_get_option('admela_postsocialtwitter') != false) {?>
			<a href="//twitter.com/share?text=<?php echo htmlspecialchars(urlencode(html_entity_decode(esc_html(get_the_title()), ENT_COMPAT, 'UTF-8')), ENT_COMPAT, 'UTF-8'); ?>&amp;url=<?php esc_url(the_permalink()); ?>" target="_blank" onclick="javascript:window.open(this.href,'','menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=800,width=800'); return false;" class="admela_eshtwt"> <i class="fa fa-twitter"></i><span class="admela_esfbtext"><?php esc_html_e('Share on Twitter','admela'); ?></span></a>
		    <!--twitter-->	
		<?php }	?>
	</div>
	<?php }	?>
</div>
<?php  }
}

if(is_page()) {
		if(admela_get_option('admela_ebylfpage') != '') {
		?>
<div class="admela_entrybyline admela_entrypgbyline">
  <?php if(admela_get_option('padmela_ppostedby') != '') {  ?>
  <div class="admela_entryauthor">
    <?php
		echo get_avatar( get_the_author_meta( 'user_email' ), 20 );
		?>
    <?php esc_html_e('By','admela'); ?>
    <?php the_author_posts_link(); ?>
  </div>
  <div class="admela_entryline"> / </div>
  <?php  } 
	 if(admela_get_option('padmela_ppostedon') != '') {
	 ?>
  <div class="admela_entrydate">
    <?php esc_html_e('On','admela'); ?>
    <?php the_time(get_option( 'date_format')); ?>
  </div>
  <?php  }
	
	 if(admela_get_option('padmela_ppview') != '') {
	 ?>
	<div class="admela_viewcnt"> <?php echo admela_get_post_views($post->ID); ?> <span class="admela_view_text">
    <?php esc_html_e('Views','admela'); ?>
    </span> </div>
  <?php  } ?>
</div>
<?php } 
}	 
}	
endif;