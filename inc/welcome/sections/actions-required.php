<?php
/**
 * Actions required
 */

?>
<?php
  $counter = 0;
  $theme = wp_get_theme();
?>
<div id="actions_required" class="bestblog-tab-pane">
  <h1><?php printf( esc_html__( 'Keep up with %s\'s recommended actions' ,'best-blog' ), $theme->get( 'Name' ) ); ?></h1>
  <!-- NEWS -->

  <!-- Front page -->
  <?php if ( get_option( 'show_on_front' ) != 'page' ) { ?>
    <h3><?php esc_html_e( ' Setup a custom homepage ', 'best-blog' ); ?></h3>
		<div class="two-three"><?php esc_html_e( 'If you want to create unique homepage, create the new page first, set the template "Homepage" and save the page. Then please go to Settings -> Reading and switch "Front page displays" to "A static page" and select the page you created before.', 'best-blog' ); ?>
      <ul>
        <li><?php esc_html_e('Step 1 : Create a new page by going to&nbsp;Pages &gt; Add New&nbsp;in the WordPress Dashboard','best-blog');?></li>
        <li><?php esc_html_e('Step 2 :Give the page a name whatever you want. eg : Home.','best-blog');?></li>
        <li><?php esc_html_e('Step 3 : Then from the page attributes options box select the Template as Creative Homepage .','best-blog');?></li>
      </ul>
        			<img src="<?php echo get_template_directory_uri(); ?>/inc/welcome/img/homepage-WordPress.png ;?>" />
      <ul>
        <li><?php esc_html_e('Step 1 : Then Go to Settings > Reading in the WordPress Dashboard and select the “A Static Page” option which is under the heading “Front Page Displays”','best-blog');?></li>
        <li><?php esc_html_e('Step 2 : Then Select the page that you created earlier from the “Front Page” drop down . eg: Home','best-blog');?></li>
      </ul>
      <img src="<?php echo get_template_directory_uri(); ?>/inc/welcome/img/Reading-Settings.png ;?>" />

      <p><a href="<?php echo esc_url( admin_url( 'options-reading.php' ) ); ?>" class="button button-primary"><?php esc_html_e( 'Front page settings', 'best-blog' ); ?></a></p>
    </div>

  <?php
    $counter++;
  } else { ?>
  <?php } ?>
  <?php	if( $counter == '0' ) { ?>
		<p><?php esc_html_e( 'Hooray! There are no recommended actions for you right now.', 'best-blog' ); ?></p>
	<?php }	?>
  <div id="counter-count" data-counter="<?php echo absint($counter) ?>"></div>
</div>
