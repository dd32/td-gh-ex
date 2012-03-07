<?php
/**
 * The custom footer image script.
 *
 * @package WordPress
 * @subpackage Administration
 */

/**
 * The custom footer image class.
 *
 * @since 2.1.0
 * @package WordPress
 * @subpackage Administration
 */
class Custom_Image_Footer {

	/**
	 * Holds default footers.
	 *
	 * @var array
	 * @since 3.0.0
	 * @access private
	 */
	var $default_footers = array();

	/**
	 * Holds the page menu hook.
	 *
	 * @var string
	 * @since 3.0.0
	 * @access private
	 */
	var $page = '';

	/**
	 * PHP4 Constructor - Register administration footer callback.
	 *
	 * @since 2.1.0
	 * @param callback $admin_footer_callback
	 * @param callback $admin_image_div_callback Optional custom image div output callback.
	 * @return Custom_Image_Footer
	 */
	function Custom_Image_Footer()
	{
		return;
	}

	/**
	 * Set up the hooks for the Custom Footer admin page.
	 *
	 * @since 2.1.0
	 */
	function init() {
		if ( ! current_user_can('edit_theme_options') )
			return;

		$this->page = $page = add_theme_page('Footer', 'Footer', 'edit_theme_options', 'custom-footer', array(&$this, 'admin_page'));

		add_action("admin_print_scripts-$page", array(&$this, 'js_includes'));
		add_action("admin_print_styles-$page", array(&$this, 'css_includes'));
		add_action("admin_head-$page", array(&$this, 'take_action'), 50);
		add_action("admin_head-$page", array(&$this, 'js'), 50);
		#add_action("admin_head-$page", $this->admin_footer_callback, 51);
	}

	/**
	 * Get the current step.
	 *
	 * @since 2.6.0
	 *
	 * @return int Current step
	 */
	function step() {
		if ( ! isset( $_GET['step'] ) )
			return 1;

		$step = (int) $_GET['step'];
		if ( $step < 1 || 3 < $step )
			$step = 1;

		return $step;
	}

	/**
	 * Set up the enqueue for the JavaScript files.
	 *
	 * @since 2.1.0
	 */
	function js_includes() {
		$step = $this->step();
    
		if (  2 == $step )
			wp_enqueue_script('imgareaselect');
	}

	/**
	 * Set up the enqueue for the CSS files
	 *
	 * @since 2.7
	 */
	function css_includes() {
		$step = $this->step();

		if (  2 == $step )
			wp_enqueue_style('imgareaselect');
	}

	/**
	 * Execute custom footer modification.
	 *
	 * @since 2.6.0
	 */
	function take_action() {
		if ( ! current_user_can('edit_theme_options') )
			return;

		if ( empty( $_POST ) )
			return;

		$this->updated = true;

		if ( isset( $_POST['removefooter'] ) ) {
			$fdi = get_theme_mod('fdi', FDI);
			check_admin_referer( 'custom-footer-removeimg', 'wpnonce-custom-footer-removeimg' );
						
			$args = array(
    				'post_type' => 'attachment',
    				'numberposts' => -1,
    				'post_status' => null,
    				'post_parent' => 0,
    				'orderby' => 'rand'
						); 
			$attachments = get_posts($args);

			$img_id=0;						

			if ($attachments){
				foreach ($attachments as $post){
					setup_postdata($post);
					$img = wp_get_attachment_image_src( $post->ID, 'full');
            if($img[0] == esc_url(get_theme_mod('footer_image'.$fdi, '')))
            {
              $img_id=$post->ID;								
            }
          }
          
          if($img_id!=0)
            wp_delete_attachment( $img_id);
            remove_theme_mod('footer_image'.$fdi);
			}

			return;
		}
		
		if(isset($_REQUEST['select']))
			$this->updated=false;
			
		if(isset($_REQUEST['cat1']))
			$this->updated=false;
			
		if(isset($_REQUEST['cat2']))
			$this->updated=false;
			
		if(isset($_REQUEST['cat3']))
			$this->updated=false;
			
		if(isset($_REQUEST['cat4']))
			$this->updated=false;
	}

	/**
	 * Execute Javascript depending on step.
	 *
	 * @since 2.1.0
	 */
	function js() {
		$step = $this->step();
		if (2 == $step )
			$this->js_2();
	}

	/**
	 * Display Javascript based on Step 2.
	 *
	 * @since 2.6.0
	 */
	function js_2() { ?>
<script type="text/javascript">
/* <![CDATA[ */
	function onEndCrop( coords ) {
		jQuery( '#x1' ).val(coords.x);
		jQuery( '#y1' ).val(coords.y);
		jQuery( '#width' ).val(coords.w);
		jQuery( '#height' ).val(coords.h);
	}

	jQuery(document).ready(function() {
		var xinit = <?php echo FOOTER_IMAGE_WIDTH; ?>;
		var yinit = <?php echo FOOTER_IMAGE_HEIGHT; ?>;
		var ratio = xinit / yinit;
		var ximg = jQuery('img#upload').width();
		var yimg = jQuery('img#upload').height();

		if ( yimg < yinit || ximg < xinit ) {
			if ( ximg / yimg > ratio ) {
				yinit = yimg;
				xinit = yinit * ratio;
			} else {
				xinit = ximg;
				yinit = xinit / ratio;
			}
		}

		jQuery('img#upload').imgAreaSelect({
			handles: true,
			keys: true,
			aspectRatio: xinit + ':' + yinit,
			show: true,
			x1: 0,
			y1: 0,
			x2: xinit,
			y2: yinit,
			maxHeight: <?php echo FOOTER_IMAGE_HEIGHT; ?>,
			maxWidth: <?php echo FOOTER_IMAGE_WIDTH; ?>,
			onInit: function () {
				jQuery('#width').val(xinit);
				jQuery('#height').val(yinit);
			},
			onSelectChange: function(img, c) {
				jQuery('#x1').val(c.x1);
				jQuery('#y1').val(c.y1);
				jQuery('#width').val(c.width);
				jQuery('#height').val(c.height);
			}
		});
	});
/* ]]> */
</script>
<?php
	}

	/**
	 * Display first step of custom footer image page.
	 *
	 * @since 2.1.0
	 */
	function step_1() {
		
?>

<div class="wrap">
<?php screen_icon(); ?>
<h2><?php echo 'Custom Footer'; ?></h2>

<?php if ( ! empty( $this->updated ) ) { ?>
<div id="message" class="updated">
<p><?php printf( 'Footer updated. <a href="%s">Visit your site</a> to see how it looks.' , home_url( '/' ) ); ?></p>
</div>
<?php } ?>

<h3><?php echo 'Footer Images'; ?></h3>
<table style="table-layout:fixed;">
<tbody>


<tr valign="middle">
<th scope="row" width="150" ><?php echo 'Preview'; ?></th>
<td width="860">
	<table style="table-layout:fixed;">
	<tr>
		<td style="width:<?php echo FOOTER_IMAGE_WIDTH; ?>px;height:<?php echo FOOTER_IMAGE_HEIGHT; ?>px; border:2px solid <?php if(get_theme_mod('fdi', FDI)=='1'){echo '#f00';} else{echo '#000';} ?>;">
			<img id="footimg1" src="<?php esc_url ( footer_image(1) ) ?>" alt="" /></td>
		<td style="width:<?php echo FOOTER_IMAGE_WIDTH; ?>px;height:<?php echo FOOTER_IMAGE_HEIGHT; ?>px; border:2px solid <?php if(get_theme_mod('fdi', FDI)=='2'){echo '#f00';} else{echo '#000';} ?>;">
			<img id="footimg2" src="<?php esc_url ( footer_image(2) ) ?>" alt=""/></td>
		<td style="width:<?php echo FOOTER_IMAGE_WIDTH; ?>px;height:<?php echo FOOTER_IMAGE_HEIGHT; ?>px; border:2px solid <?php if(get_theme_mod('fdi', FDI)=='3'){echo '#f00';} else{echo '#000';} ?>">
			<img id="footimg3"  src="<?php esc_url ( footer_image(3) ) ?>" alt=""/></td>
		<td style="width:<?php echo FOOTER_IMAGE_WIDTH; ?>px;height:<?php echo FOOTER_IMAGE_HEIGHT; ?>px; border:2px solid <?php if(get_theme_mod('fdi', FDI)=='4'){echo '#f00';} else{echo '#000';} ?>;">
			<img id="footimg4"  src="<?php esc_url ( footer_image(4) ) ?>" alt=""/></td>
	</tr>
	</table>

</td>
</tr>

<tr>
<th scope="row" width="150"><?php echo 'Choose categories' ; ?></th>	
<td width="860" >
	<table style="table-layout:fixed;">
	<tr>
	<td style="width:<?php echo FOOTER_IMAGE_WIDTH; ?>px;height:<?php echo FOOTER_IMAGE_HEIGHT; ?>px; border:2px solid #000;text-align:center;">
		
		<?php 
		if(array_key_exists('cat1', $_REQUEST))
			if($_REQUEST['cat1'] > 0)
			 	set_theme_mod('cat1', $_REQUEST['cat1']);
			echo "Category #1 : " . get_cat_name(get_theme_mod('cat1', '0')) . ".";
		?>
		
		<form action="<?php echo esc_attr( add_query_arg( 'step', 1 ) ) ?>" method="post">
   		<?php wp_dropdown_categories('name=cat1&hide_empty=0&exclude=1'); ?>
	<input type="submit" name="cat-btn" value="Change" />
	</form>

	</td>
	<td style="width:<?php echo FOOTER_IMAGE_WIDTH; ?>px;height:<?php echo FOOTER_IMAGE_HEIGHT; ?>px; border:2px solid #000;text-align:center;">
		
		<?php 
		if(array_key_exists('cat2', $_REQUEST))
			if($_REQUEST['cat2'] > 0)
		 		set_theme_mod('cat2', $_REQUEST['cat2']);
		 	echo "Category #2 : " . get_cat_name(get_theme_mod('cat2', '0')) . ".";
		?>
		
		<form action="<?php echo esc_attr( add_query_arg( 'step', 1 ) ) ?>" method="post">
   			<?php wp_dropdown_categories('name=cat2&hide_empty=0&exclude=1'); ?>
   			<input type="submit" name="cat2-btn" value="Change" />
   		</form>
	</td>
	
	<td style="width:<?php echo FOOTER_IMAGE_WIDTH; ?>px;height:<?php echo FOOTER_IMAGE_HEIGHT; ?>px; border:2px solid #000;text-align:center;">
		
		<?php if(array_key_exists('cat3', $_REQUEST))
			if($_REQUEST['cat3'] > 0)
				set_theme_mod('cat3', $_REQUEST['cat3']);
			echo "Category #3 : " . get_cat_name(get_theme_mod('cat3', '0')) . ".";
		?>
		
		<form action="<?php echo esc_attr( add_query_arg( 'step', 1 ) ) ?>" method="post">
   			<?php wp_dropdown_categories('name=cat3&hide_empty=0&exclude=1'); ?>
   			<input type="submit" name="cat3-btn" value="Change" />
   		</form>
	</td>
	
	<td style="width:<?php echo FOOTER_IMAGE_WIDTH; ?>px;height:<?php echo FOOTER_IMAGE_HEIGHT; ?>px; border:2px solid #000;text-align:center;">
		
		<?php if(array_key_exists('cat4', $_REQUEST))
			if($_REQUEST['cat4'] > 0)
				set_theme_mod('cat4', $_REQUEST['cat4']);
			echo "Category #4 : " . get_cat_name(get_theme_mod('cat4', '0')) . ".";
		?>
		
		<form action="<?php echo esc_attr( add_query_arg( 'step', 1 ) ) ?>" method="post">
   			<?php wp_dropdown_categories('name=cat4&hide_empty=0&exclude=1'); ?>
   			<input type="submit" name="cat4-btn" value="Change" />
   		</form>
	</td>
</tr>

</table>
</td>
</tr>

<tr valign="middle">
	<th scope="row" width="150"><?php echo 'Select Image'; ?></th>
	<td width="860" >
		<table style="table-layout:fixed;text-align:center;">
			<tr>
				<td width="215">
		<form name="selectForm" method="post" action="<?php echo esc_attr( add_query_arg( 'step', 1 ) ) ?>">

			<?php if(array_key_exists('select', $_REQUEST))
				if($_REQUEST['select'] > 0){
					set_theme_mod('fdi', $_REQUEST['select']);
			?>
			<script type="text/javascript">
				document.location.href="<?php echo esc_attr( add_query_arg( 'step', 1 ) ) ?>";
			</script>
			<?php
			}
			echo "Image #" . get_theme_mod('fdi', FDI) . " is selected.";
			?>
			<br/>  
			<select name="select" onchange="document.selectForm.submit();">
				<option value="0">Select another...</option>
				<option value="1">Image #1</option>
				<option value="2">Image #2</option>
				<option value="3">Image #3</option>
				<option value="4">Image #4</option>
			</select>
		</form>
	</td>
	<?php if ( get_theme_mod('footer_image'.get_theme_mod('fdi', FDI), "NONE")!="NONE" ) : ?>
		<td width="215">
			<form method="post" action="<?php echo esc_attr( add_query_arg( 'step', 1 ) ) ?>">
				<?php wp_nonce_field( 'custom-footer-removeimg', 'wpnonce-custom-footer-removeimg' ) ?>
				<input type="submit" class="button" name="removefooter" value="Remove selected image" />
			</form>
		</td>
	<?php endif;?>
<td width="430">
	<form enctype="multipart/form-data" id="upload-form" method="post" action="<?php echo esc_attr( add_query_arg( 'step', 2 ) ) ?>">
	<p>
		<label for="upload"><?php echo 'Choose an image from your computer:' ; ?></label><br />
		<input type="file" id="upload" name="import" />
		<input type="hidden" name="action" value="save" />
		<?php wp_nonce_field( 'custom-footer-upload', 'wpnonce-custom-footer-upload' ) ?>
		<input type="submit" class="button" value="Upload" />
	</p>
	</form>
</td>
</tr>
</table>
</td>
</tr>
<tr>
	<td><br/><br/></td>
</tr>
<tr valign="top">
<th scope="row"><?php echo ''; ?></th>
<td>
	<?php echo 'You can upload a custom image to be shown at the footer of your site instead of the default one. On the next screen you will be able to crop the image.' ; ?><br />
	<?php printf( 'Images of exactly <strong>%1$d &times; %2$d pixels</strong> will be used as-is.', FOOTER_IMAGE_WIDTH, FOOTER_IMAGE_HEIGHT ); ?>

</td>
</tr>
</tbody>
</table>

<form name="save_form" method="post" action="<?php echo esc_attr( add_query_arg( 'step', 1 ) ) ?>">
<?php wp_nonce_field( 'custom-footer-options', 'wpnonce-custom-footer-options' ); ?>
<p class="submit"><input type="submit" class="button-primary" name="save-footer-options" value="Save Changes" /></p>
</form>
</div>

<?php }

	/**
	 * Display second step of custom footer image page.
	 *
	 * @since 2.1.0
	 */
	function step_2() {
		check_admin_referer('custom-footer-upload', 'wpnonce-custom-footer-upload');
		$overrides = array('test_form' => false);
		$file = wp_handle_upload($_FILES['import'], $overrides);

		if ( isset($file['error']) )
			wp_die( $file['error'], 'Image Upload Error');

		$url = $file['url'];
		$type = $file['type'];
		$file = $file['file'];
		$filename = basename($file);

		// Construct the object array
		$object = array(
		'post_title' => $filename,
		'post_content' => $url,
		'post_mime_type' => $type,
		'guid' => $url);

		// Save the data
		$id = wp_insert_attachment($object, $file);

		list($width, $height, $type, $attr) = getimagesize( $file );

		if ( $width == FOOTER_IMAGE_WIDTH && $height == FOOTER_IMAGE_HEIGHT ) {
			// Add the meta-data
			wp_update_attachment_metadata( $id, wp_generate_attachment_metadata( $id, $file ) );

			set_theme_mod('footer_image'.get_theme_mod('fdi', FDI), esc_url($url));
			do_action('wp_create_file_in_uploads', $file, $id); // For replication
			return $this->finished();
		} elseif ( $width > FOOTER_IMAGE_WIDTH ) {
			$oitar = $width / FOOTER_IMAGE_WIDTH;
			$image = wp_crop_image($file, 0, 0, $width, $height, FOOTER_IMAGE_WIDTH, $height / $oitar, false, str_replace(basename($file), 'midsize-'.basename($file), $file));
			if ( is_wp_error( $image ) )
				wp_die( 'Image could not be processed.  Please go back and try again.', 'Image Processing Error' );

			$image = apply_filters('wp_create_file_in_uploads', $image, $id); // For replication

			$url = str_replace(basename($url), basename($image), $url);
			$width = $width / $oitar;
			$height = $height / $oitar;
		} else {
			$oitar = 1;
		}
		?>

<div class="wrap">
<?php screen_icon(); ?>
<h2><?php echo 'Crop Footer Image'; ?></h2>

<form method="post" action="<?php echo esc_attr(add_query_arg('step', 3)); ?>">
	<p class="hide-if-no-js"><?php echo 'Choose the part of the image you want to use as your footer.'; ?></p>
	<p class="hide-if-js"><strong><?php echo 'You need Javascript to choose a part of the image.'; ?></strong></p>

	<div id="crop_image" style="position: relative">
		<img src="<?php echo esc_url( $url ); ?>" id="upload" width="<?php echo $width; ?>" height="<?php echo $height; ?>" />
	</div>

	<p class="submit">
	<input type="hidden" name="x1" id="x1" value="0"/>
	<input type="hidden" name="y1" id="y1" value="0"/>
	<input type="hidden" name="width" id="width" value="<?php echo esc_attr( $width ); ?>"/>
	<input type="hidden" name="height" id="height" value="<?php echo esc_attr( $height ); ?>"/>
	<input type="hidden" name="attachment_id" id="attachment_id" value="<?php echo esc_attr( $id ); ?>" />
	<input type="hidden" name="oitar" id="oitar" value="<?php echo esc_attr( $oitar ); ?>" />
	<?php wp_nonce_field( 'custom-footer-crop-image' ) ?>
	<input type="submit" class="button-primary" value="Crop and Publish" />
	</p>
</form>
</div>
		<?php
	}

	/**
	 * Display third step of custom footer image page.
	 *
	 * @since 2.1.0
	 */
	function step_3() {
		check_admin_referer('custom-footer-crop-image');
		if ( $_POST['oitar'] > 1 ) {
			$_POST['x1'] = $_POST['x1'] * $_POST['oitar'];
			$_POST['y1'] = $_POST['y1'] * $_POST['oitar'];
			$_POST['width'] = $_POST['width'] * $_POST['oitar'];
			$_POST['height'] = $_POST['height'] * $_POST['oitar'];
		}

		$original = get_attached_file( $_POST['attachment_id'] );

		$cropped = wp_crop_image($_POST['attachment_id'], $_POST['x1'], $_POST['y1'], $_POST['width'], $_POST['height'], FOOTER_IMAGE_WIDTH, FOOTER_IMAGE_HEIGHT);
		if ( is_wp_error( $cropped ) )
			wp_die( 'Image could not be processed.  Please go back and try again.', 'Image Processing Error' );

		$cropped = apply_filters('wp_create_file_in_uploads', $cropped, $_POST['attachment_id']); // For replication

		$parent = get_post($_POST['attachment_id']);
		$parent_url = $parent->guid;
		$url = str_replace(basename($parent_url), basename($cropped), $parent_url);

		// Construct the object array
		$object = array(
			'ID' => $_POST['attachment_id'],
			'post_title' => basename($cropped),
			'post_content' => $url,
			'post_mime_type' => 'image/jpeg',
			'guid' => $url
		);

		// Update the attachment
		wp_insert_attachment($object, $cropped);
		wp_update_attachment_metadata( $_POST['attachment_id'], wp_generate_attachment_metadata( $_POST['attachment_id'], $cropped ) );

		set_theme_mod('footer_image'.get_theme_mod('fdi', FDI), $url);

		// cleanup
		$medium = str_replace(basename($original), 'midsize-'.basename($original), $original);
		@unlink( apply_filters( 'wp_delete_file', $medium ) );
		@unlink( apply_filters( 'wp_delete_file', $original ) );

		return $this->finished();
	}

	/**
	 * Display last step of custom footer image page.
	 *
	 * @since 2.1.0
	 */
	function finished() {
		$this->updated = true;
		$this->step_1();
	}

	/**
	 * Display the page based on the current step.
	 *
	 * @since 2.1.0
	 */
	function admin_page() {
		if ( ! current_user_can('edit_theme_options') )
			wp_die('You do not have permission to customize footers.');
		$step = $this->step();
		if ( 1 == $step )
			$this->step_1();
		elseif ( 2 == $step )
			$this->step_2();
		elseif ( 3 == $step )
			$this->step_3();
	}

}
?>