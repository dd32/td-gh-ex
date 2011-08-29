<?php
/** Default for Tabs */
$remote_data = '<em>Loading...</em>';
$tab_selected = 0;

/** WordPress Remote Get */
switch( chip_life_undefined_index_fix ( $_REQUEST['tab'] ) ) {
	
	case 1:
	
	$tab_selected = 1;
	$url = 'http://www.tutorialchip.com/ref-child-themes/';	
	$response = wp_remote_get( $url );
	
	if( is_wp_error( $response ) ) {
	   $remote_data = 'Something went wrong!';
	} else {
	   $remote_data = $response['body'];	   
	}
	
	break;
	
	case 2:
	
	$tab_selected = 2;
	$url = 'http://www.tutorialchip.com/ref-tutorials/';	
	$response = wp_remote_get( $url );
	
	if( is_wp_error( $response ) ) {
	   $remote_data = 'Something went wrong!';
	} else {
	   $remote_data = $response['body'];	   
	}
	
	break;
	
	case 3:
	
	$tab_selected = 3;
	$url = 'http://www.tutorialchip.com/ref-wordpress-resources/';	
	$response = wp_remote_get( $url );
	
	if( is_wp_error( $response ) ) {
	   $remote_data = 'Something went wrong!';
	} else {
	   $remote_data = $response['body'];	   
	}
	
	break;	
}
?>
<div class="wrap">
  
  <?php screen_icon(); ?>
  <h2>Chip Life Reference</h2>    
  
  <div class="chip-life-tabs ui-tabs ui-widget ui-widget-content ui-corner-all">
   
     <div class="ui-state-default ui-corner-all">
       <h2>Chip Life Framework</h2>
     </div>
   
     <div class="chip-life-tabs-content">
       <p><strong>Author:</strong> <a href="http://www.tutorialchip.com/" target="_blank">TutorialChip</a></p>
       <?php
       $chip_life_current_theme = get_current_theme();
	   $chip_life_theme_info = 'You are using <strong>Chip Life Framework</strong>.';
	   if( $chip_life_current_theme !== 'Chip Life' ) {
		   $chip_life_theme_info = 'You are using Chip Life Child Theme <strong>'. $chip_life_current_theme . '</strong>';
	   }
	   ?>
       <p><?php echo $chip_life_theme_info; ?></p>
     </div>   
  
  </div>
  
  <div id="chip_life_tabs_reference" class="chip-life-tabs">
  
    <ul>
      <li><a href="#chip_life_framework_tab"><span>Chip Life Framework</span></a></li>
      <li><a href="#chip_life_child_themes_tab" id="chip_life_child_themes_anchor"><span>Chip Life Child Themes</span></a></li>
      <li><a href="#chip_life_tutorials_tab"><span>Chip Life Tutorials</span></a></li> 
      <li><a href="#chip_life_wordpress_tutorials"><span>WordPress Resources</span></a></li>       
    </ul>
    
    <div id="chip_life_framework_tab">
      <h1>Chip Life Framework</h1>
      <p>Chip Life is an advanced and fully documented Framework intended to serve as a base for Child Themes. Chip Life theme supports 8 Widget Areas, Post Formats, Navigation Menus, Post Thumbnails, Custom Backgrounds, Custom Image Headers, and Custom Editor Style. It includes styles for the Visual Editor, special styles for for six different Post Formats, and has one-column, two-column layout. The Theme includes plug-and-play support for the WP-Pagenavi plugin. Requires WordPress 3.1 and higher.</p>
      <h1>Support</h1>
      <ul>
        <li><a href="http://forums.tutorialchip.com/">TutorialChip Forums</a></li>
        <li><a href="http://www.tutorialchip.com/contact/">Contact Us</a></li>
      </ul>
    </div>
    
    <div id="chip_life_child_themes_tab" class="chip_life_remote_tab">
      <?php echo $remote_data; ?>
    </div>
    
    <div id="chip_life_tutorials_tab" class="chip_life_remote_tab">
      <?php echo $remote_data; ?>
    </div>
    
    <div id="chip_life_wordpress_tutorials" class="chip_life_remote_tab">
      <?php echo $remote_data; ?>
    </div>
  
  </div>
    

</div> <!-- end .wrap -->

<script>
//<![CDATA[
jQuery(document).ready(function($){
    
	var admin_url = '<?php echo admin_url( 'themes.php?page=chip-life-reference&tab=' ); ?>';
	
	$( '#chip_life_tabs_reference' ).tabs({
		selected: <?php echo $tab_selected; ?>,
		select: function( event, ui ) {
			switch( ui.index ) {
				case 1:
				case 2:
				case 3:
				$( '.chip_life_remote_tab' ).html( '<em>Loading...</em>' );
				window.location.href = admin_url + ui.index;
				break;
			}		
		}
	});
		
});
//]]>
</script>