<?php
/**
 * Getting started template
 */

?>
<?php $theme = wp_get_theme(); ?>

<div id="getting_started" class="bestblog-tab-pane active">
	<div class="bestblog-tab-pane-center">
		<h1 class="bestblog-welcome-title"><?php printf( esc_html__( 'Welcome to %s!', 'best-blog' ), $theme->get( 'Name' ) ); ?></h1>
		<p><?php echo esc_html__( 'We want to make sure you have the best experience using bestblog and that is why we gathered here all the necessary informations for you. We hope you will enjoy using bestblog, as much as we enjoy creating great products.', 'best-blog' ) ; ?>
	</div>
<hr/>
<div class="bestblog-tab-pane-center">
	<h1><?php esc_html_e( 'Enable Header images', 'best-blog' ); ?></h1>

	<h4> <?php echo esc_html__( 'For show Wordpress core header image you should select Header image background style (Header Image)', 'best-blog' ) ; ?></h4>
	<h4><?php echo esc_html__( 'For enable it Go to theme option => Header Options => Header Background Style => Header image', 'best-blog' ) ; ?></h4>
</div>
<div class="bestblog-tab-pane-center">
	<h1><?php esc_html_e( 'FAQ', 'best-blog' ); ?></h1>
</div>
<div class="bestblog-video-tutorial">
	<div >
		<h3><?php esc_html_e( ' Setup a custom homepage ', 'best-blog' ); ?></h3>
		<?php esc_html_e( 'If you want to create unique homepage, create the new page first, set the template "Homepage" and save the page. Then please go to Settings -> Reading and switch "Front page displays" to "A static page" and select the page you created before.', 'best-blog' ); ?>
			<ul>
				<li><?php esc_html_e('Step 1 : Create a new page by going to&nbsp;Pages &gt; Add New&nbsp;in the WordPress Dashboard','best-blog');?></li>
				<li><?php esc_html_e('Step 2 :Give the page a name whatever you want. eg : Home.','best-blog');?></li>
				<li><?php esc_html_e('Step 3 : Then from the page attributes options box select the Template as Creative Homepage .','best-blog');?></li>
			</ul>
			<img src="<?php echo get_template_directory_uri(); ?>/inc/welcome/img/homepage-WordPress.png ;?>"/>
			<ul>
				<li><?php esc_html_e('Step 1 : Then Go to Settings > Reading in the WordPress Dashboard and select the “A Static Page” option which is under the heading “Front Page Displays”','best-blog');?></li>
				<li><?php esc_html_e('Step 2 : Then Select the page that you created earlier from the “Front Page” drop down . eg: Home','best-blog');?></li>
			</ul>
			<img src="<?php echo get_template_directory_uri(); ?>/inc/welcome/img/Reading-Settings.png ;?>"/>

			<p>
				<a href="<?php echo esc_url('http://localhost/wordpress/wp-admin/options-reading.php'); ?>" class="button button-primary"><?php esc_html_e( 'Front page settings', 'best-blog' ); ?></a>
			</p>
	</div>
</div>
<div class="bestblog-clear"></div>
</div>
