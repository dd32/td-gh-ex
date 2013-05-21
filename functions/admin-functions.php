<?php
/*-----------------------------------------------------------------------------------*/
/* Head Hook
/*-----------------------------------------------------------------------------------*/
function of_head() { do_action( 'of_head' ); }
/*-----------------------------------------------------------------------------------*/
/* Get the style path currently selected */
/*-----------------------------------------------------------------------------------*/
function of_style_path() {
    $style = $_REQUEST['style'];
    if ($style != '') {
        $style_path = $style;
    } else {
        $stylesheet = appointway_get_option('of_alt_stylesheet');
        $style_path = str_replace(".css","",$stylesheet);
    }
    if ($style_path == "default")
      echo 'images';
    else
      echo 'styles/'.$style_path;
}
/*-----------------------------------------------------------------------------------*/
/* Add default options after activation */
/*-----------------------------------------------------------------------------------*/
if (is_admin() && isset($_GET['activated'] ) && $pagenow == "themes.php" ) {
	//Call action that sets
	add_action('admin_head','of_option_setup');
}
function of_option_setup(){
	//Update EMPTY options
	$of_array = array();
	add_option('of_options',$of_array);
	$template = appointway_get_option('of_template');
	$saved_options = appointway_get_option('of_options');
	$std = '';
	foreach($template as $option) {
		if($option['type'] != 'heading'){
			if(isset($option['id'])){
			$id = $option['id'];
			}	
			if (isset($option['std'])) {
			$std = $option['std'];
			}
			$db_option = appointway_get_option($id);
			if(empty($db_option)){
				if(is_array($option['type'])) {
					foreach($option['type'] as $child){
						$c_id = $child['id'];
						$c_std = $child['std'];
						appointway_update_option($c_id,$c_std);
						$of_array[$c_id] = $c_std; 
					}
				} else {
					appointway_update_option($id,$std);
					$of_array[$id] = $std;
				}
			}
			else { //So just store the old values over again.
				$of_array[$id] = $db_option;
			}
		}
	}
	appointway_update_option('of_options',$of_array);
}
/*-----------------------------------------------------------------------------------*/
/* Admin Backend */
/*-----------------------------------------------------------------------------------*/
function optionsframework_admin_head() { 
	
	//Tweaked the message on theme activate
	?>
<script type="text/javascript">
    jQuery(function(){
    	
        var message = '<p>This theme comes with an <a href="<?php echo admin_url('admin.php?page=optionsframework'); ?>">options panel</a> to configure settings. This theme also supports widgets, please visit the <a href="<?php echo admin_url('widgets.php'); ?>">widgets settings page</a> to configure them.</p>';
    	jQuery('.themes-php #message2').html(message);
    
    });
    </script>
<?php
	
}
add_action('admin_head', 'optionsframework_admin_head'); 
?>
