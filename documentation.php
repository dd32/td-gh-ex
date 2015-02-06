
<?php 

function star_docs_menu() {
	add_theme_page( __('Star Setup help', 'star'), __('Star Setup help', 'star'), 'edit_theme_options', 'star-theme', 'star_docs');
}
add_action('admin_menu', 'star_docs_menu');

function star_docs() {

?>

<h1 class="doc-title"><?php _e('Star Setup help', 'star'); ?></h1>
<div class="doc-thanks">
<b><?php _e('Thank you for downloading and trying out Star!', 'star'); ?></b><br/><br/>
<?php sprintf( __('If you like the theme, please %s review it on WordPress.org', 'star'), 'https://wordpress.org/support/view/theme-reviews/star' );?>
</a><br/><br/>
<b><?php _e('If you have any questions, accessibility issues or feature requests for this theme, please visit ', 'star'); ?><a href="http://wptema.se/star">http://wptema.se/star</a></b>.<br/>
<?php _e('Your feedback is essential for the future developement of the theme.', 'star'); ?>
</div>

	<ul class="doc-menu">
		<li><a href="#star-menus"><?php _e('Menus','star' ); ?></a></li>
		<li><a href="#star-widget"><?php _e('Widget areas','star' ); ?></a></li>
		<li><a href="#star-front"><?php _e('Frontpage','star' ); ?></a></li>
		<li><a href="#star-advanced"><?php _e('Advanced settings','star' ); ?></a></li>
		<li><a href="#star-access"><?php _e('Accessibility','star' ); ?></a></li>
		<li><a href="#star-plugins"><?php _e('Plugins','star' ); ?></a></li>
	</ul>

	<div class="doc-box" id="star-menus">
		<h3><?php _e('Menus','star' ); ?></h3>
		<?php _e('This theme has two optional menu locations, the <b>Primary menu</b> and the <b>Social menu</b>.','star' ); ?><br/>

		<img src="<?php echo get_template_directory_uri() . '/images/doc-menu.jpg';?>" alt="<?php _e('An image describing how a submenu drops down from the Primary menu','star' ); ?>"><br/>
			
		<b><?php _e('The Primary menu','star' ); ?></b> <?php _e('is fixed at the top of the website and shows two menu levels. <br/>
		This menu will collapse on smaller screens, and can then be opened and closed by a menu button. It can also be closed with the Esc key.','star' ); ?><br/><br/>

		<img src="<?php echo get_template_directory_uri() . '/images/doc-social.jpg';?>" alt="<?php _e('An image describing how social icons are lined up next to each other in the Social menu','star' ); ?>"><br/>

		<?php _e('<b>The social menu</b> is at the bottom of the page and shows logos of the social networks of your choice. It does not display any text,<br/>
		but has additional information for screen readers.','star' ); ?>
		<?php _e('The icon will be added automatically, all you need to do is add a link to your menu.','star' ); ?><br/><br/>
			
		<b><?php _e('Advanced','star' ); ?></b><br/>
		<?php _e('By default, the primary meny also shows the site title and a search form. The searchform is not visible on screens smaller than 800 pixels.<br/>
		You can hide these features under the Advanced settings tab in the Customizer. ','star' ); ?>
	</div>

	<div class="doc-box" id="star-widgets">
		<h3><?php _e('Widget areas','star' ); ?></h3>
		<?php _e('The theme has two widget areas that can hold <b>any number of widgets</b>. Both areas are empty unless they have widgets in them. The footer widget area is shown on all pages.','star' ); ?><br/><br/>
		<b><?php _e('Advanced','star' ); ?></b><br/>
		<?php _e('By default, the sidebar is shown on the right hand side in single post view, archives, the search page and the 404 page.<br/>
		If you open the customizer and go to the Advanced settings, you will find options for showing the sidebar on more pages.','star' ); ?>
	</div>

	<div class="doc-box" id="star-front">
			<h3><?php _e('Frontpage','star' ); ?></h3>
			<?php _e('The standard frontpage has the following features:','star' ); ?><br/>
			<?php _e('<b>Site title:</b> You will find an option to hide your site title in the customizer.','star' ); ?><br/>
			<?php _e('<b>Call to action:</b> The Call to action is a great way to get your visitors attention. In the customizer you can:','star' ); ?>
			<ul>
				<li><?php _e('Add your own text','star' ); ?></li>
				<li><?php _e('Add a link','star' ); ?></li>	
				<li><?php _e('Hide the button','star' ); ?></li>
			</ul>

			<?php _e('<b>Tagline:</b> You will find an option to hide your tagline in the customizer.','star' )?><br/>
			<?php _e('<b>Background:</b> You can change the background image, color and icon in the customizer.','star' )?> <br/><br/>
	</div>

	<div class="doc-box" id="star-advanced">
		<h3><?php _e('Advanced settings','star' ); ?></h3>
		<?php _e('Under the Advanced settings tab in the customizer you will find the following options:','star' )?><br/>
		<ul>
			<li><?php _e('Show the sidebar on pages.','star' )?></li>
			<li><?php _e('Show the sidebar on the frontpage.','star' )?></li>
			<li><?php _e('Hide the search form in the header menu.','star' )?></li>
			<li><?php _e('Hide the Site title in the header menu.','star' )?></li>
			<li><?php _e('Add a descriptive screen reader text for the footer.','star' )?></li>
			<li><?php _e('Add a descriptive screen reader text for the sidebar.','star' )?></li>
		</ul>
	</div>

	<div class="doc-box" id="star-access">
		<h3><?php _e('Accessibility','star' ); ?></h3>
		<ul>
			<li><?php _e('Skip link: the theme has one skip link at the very top that lets you skip the main menu.','star' )?></li>
			<li><?php _e('Known issues:','star' )?>
				<ul>
					<li><?php _e('Some widgets that uses forms (category dropdown) are missing form labels. This is a known issue with WordPress.','star' )?></li>
					<li><?php _e('Menus have a visible focus and can be tabbed through, but you can not navigate them using the arrow keys.','star' )?></li>
				</ul>
			</li>
		</ul>
	</div>

	<div class="doc-box" id="star-plugins">
		<h3><?php _e('Plugins','star' ); ?></h3>
		<?php _e('star has been tested with and style has been added for the following plugins:', 'star' ); ?>
		<ul>
			<li><b><?php _e('Woocommerce','star' )?></b></li>
			<li><b><?php _e('BBpress','star' )?></b></li>
			<li><b><?php _e('Jetpack','star' )?></b></br><?php _e(' Note: Not all of Jetpacks modules are accessibe, and some uses iframes. I have increased the contrast of some of the modules.','star' )?></li>
				<?php _e('Recommended modules:','star' )?><br/>
				<ul>
					<li><b><?php _e('Featured content','star' )?></b><br/>
						<?php _e('-Once Jetpack has been activated, you can select up to six posts or pages as a frontpage feature. Chose a tag and add it to your posts to seperate them from the rest.<br/>
						You can also choose a headline for your featured section. Featured images are optional and the recommended image size is 360x300 pixels.','star' )?></br>
						<img src="<?php echo get_template_directory_uri() . '/images/doc-featured.jpg';?>" alt="<?php _e('An image describing three featured posts on the frontpage, two with featured images and one 
						that only displays the post title.', 'star') ?>"><br/>
					</li>
					<li><b><?php _e('Custom Content Type: Portfolio','star' )?></b><br>
						<?php _e('star also supports Jetpack','star' )?> 
						<b><?php _e('Portfolios','star' )?></b>. <a href="http://en.support.wordpress.com/portfolios/">
						<i><?php _e('Read more about how to setup your Portfolio on Jetpacks support site.','star' )?></i></a></br><br/>
						<img src="<?php echo get_template_directory_uri() . '/images/doc-portfolio.jpg';?>" alt="<?php _e('An image describing two portfolio items.','star' )?>"></br>
					</li>
					<li><b><?php _e('Sharing','star' )?></b><br/>
						<?php _e('-If you activate Jetpack sharing, your buttons will be displayed below the meta information, to the right of your post content.','star' )?></br>
						<img src="<?php echo get_template_directory_uri() . '/images/doc-share.jpg';?>" alt="<?php _e('An image describing how sharing buttons are added to the post footer below Tags and Categories.','star' )?>"><br/>
					</li>
					<li><b><?php _e('Contact Form','star' )?></b></li>
					<li><?php _e('<b>Site icon</b> -Use this module to add a favicon to your site.','star' )?></li>
					<li><?php _e('<b>Site logo</b> -Once Jetpack has been activated, you can add a logo above your Site title on the frontpage. You will find this setting in the customizer.','star' )?></li>
				</ul>
		</ul>
		</ul>
	</div>
<?php
}

?>