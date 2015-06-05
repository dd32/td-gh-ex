<?php 
function aaron_docs_menu() {
	add_theme_page( __('Aaron Setup Help', 'aaron'), __('Aaron Setup Help', 'aaron'), 'edit_theme_options', 'aaron-theme', 'aaron_docs');
}
add_action('admin_menu', 'aaron_docs_menu');

function aaron_docs() {
?>

<h1 class="doc-title"><?php _e('Aaron Setup Help', 'aaron'); ?></h1>
<div class="doc-thanks">
<b><?php _e('Thank you for downloading and trying out Aaron!', 'aaron'); ?></b><br><br>
<?php printf( __('If you like the theme, please review it on <a href="%s">WordPress.org</a>', 'aaron'), esc_url('https://wordpress.org/support/view/theme-reviews/aaron') );?><br>

<b><?php printf( __('If you have any questions, accessibility issues or feature requests for this theme, please visit <a href="%s">http://wptema.se/Aaron</a>.', 'aaron'), esc_url('http://wptema.se/Aaron') ); ?></b><br>
<?php _e('Thank you to everyone who has contributed with ideas and bug reports so far! Your feedback is essential for the future developement of the theme.', 'aaron'); ?>
</div>

	<ul class="doc-menu">
		<li><a href="#aaron-menus"><?php _e('Menus','aaron' ); ?></a></li>
		<li><a href="#aaron-widget"><?php _e('Widget areas','aaron' ); ?></a></li>
		<li><a href="#aaron-front"><?php _e('Front page','aaron' ); ?></a></li>
		<li><a href="#aaron-advanced"><?php _e('Advanced settings','aaron' ); ?></a></li>
		<li><a href="#aaron-access"><?php _e('Accessibility','aaron' ); ?></a></li>
		<li><a href="#aaron-plugins"><?php _e('Plugins','aaron' ); ?></a></li>
	</ul>

	<div class="doc-box" id="aaron-menus">
		<h3><?php _e('Menus','aaron' ); ?></h3>
		<?php _e('This theme has two optional menu locations, the <b>Primary menu</b> and the <b>Social menu</b>.','aaron' ); ?><br>

		<img src="<?php echo get_template_directory_uri() . '/images/doc-menu.jpg';?>" alt="<?php _e('An image describing how a submenu drops down from the Primary menu','aaron' ); ?>"><br>
			
		<b><?php _e('The Primary menu','aaron' ); ?></b> <?php _e('is fixed at the top of the website and shows two menu levels. <br>
		This menu will collapse on smaller screens, and can then be opened and closed by a menu button. It can also be closed with the Esc key.','aaron' ); ?><br>
		<?php _e( 'A one line menu is recommended, or the menu will overlap your content. Use submenus instead.','aaron' ); ?><br><br>

		<img src="<?php echo get_template_directory_uri() . '/images/doc-social.jpg';?>" alt="<?php _e('An image describing how social icons are lined up next to each other in the Social menu','aaron' ); ?>"><br>

		<?php _e('<b>The social menu</b> is at the bottom of the page and shows logos of the social networks of your choice. It does not display any text,<br>
		but has additional information for screen readers.','aaron' ); ?>
		<?php _e('The icon will be added automatically, all you need to do is add a link to your menu.','aaron' ); ?><br><br>
			
		<b><?php _e('Advanced','aaron' ); ?></b><br>
		<?php _e('By default, the primary meny also shows the site title and a search form. The search form is not visible on screens smaller than 800 pixels.<br>
		You can hide these features under the Advanced settings tab in the Customizer. ','aaron' ); ?>
	</div>

	<div class="doc-box" id="aaron-widgets">
		<h3><?php _e('Widget areas','aaron' ); ?></h3>
		<?php _e('The theme has two widget areas that can hold <b>any number of widgets</b>. Both areas are empty unless they have widgets in them. The footer widget area is shown on all pages.','aaron' ); ?><br>
		<?php _e('There is also one additional widget area in the footer below the social menu, where you can place a text widget and add your copyright text.','aaron' );?> <br><br>
		<b><?php _e('Advanced','aaron' ); ?></b><br>
		<?php _e('By default, the sidebar is shown on the right hand side in single post view, archives, the search page and the 404 page.<br>
		If you open the customizer and go to the Advanced settings, you will find options for showing the sidebar on more pages.','aaron' ); ?>
	</div>

	<div class="doc-box" id="aaron-front">
			<h3><?php _e('Frontpage','aaron' ); ?></h3>
			<?php _e('The standard front page has the following features:','aaron' ); ?><br>
			<?php _e('<b>Site title:</b> You will find an option to hide or change the color of your site title in the customizer.','aaron' ); ?><br>
			<?php _e('<b>Call to action:</b> The Call to Action is a great way to get your visitors attention. In the customizer you can:','aaron' ); ?>
			<ul>
				<li><?php _e('Add your own text','aaron' ); ?></li>
				<li><?php _e('Add a link','aaron' )?></li>		
				<li><?php _e('Change colors','aaron' )?></li>
				<li><?php _e('Hide the button','aaron' ); ?></li>		
			</ul>

			<?php _e('<b>Highlights:</b> This is a flexible way for you to feature different sections of your website. You can add upp to nine highlights.','aaron' );?> <br>
			
			<?php _e('In the customizer you can:','aaron' ); ?>
			<ul>
				<li><?php _e('Add your own text','aaron' )?></li>
				<li><?php _e('Add a link','aaron' )?></li>	
				<li><?php _e('Add an icon or upload an image','aaron' )?></li>
				<li><?php _e('Change colors','aaron' )?></li>	
				<li><?php _e('Hide the highlights','aaron' )?></li>
			</ul>
			<?php _e('<b>Tagline:</b> You will find an option to hide your tagline in the customizer.','aaron' )?><br>
			<?php _e('<b>Header Background:</b> You can change the background image or background color in the customizer.','aaron' )?> <br><br>

			<h3><?php _e('Custom Frontpage','aaron' )?></h3>
			<?php _e('<b>Custom Landing page:</b> To use the custom landing page template, create a new page and select the template under Page Attributes.','aaron');?><br>
			<img src="<?php echo get_template_directory_uri() . '/images/doc-page-template.jpg';?>" alt="<?php _e('An image describing how to set a page template.','aaron' )?>"><br>
			<?php _e('Then set your new page as your static front page in the customizer or under Settings > Reading.','aaron' )?><br>
			<img src="<?php echo get_template_directory_uri() . '/images/doc-static.jpg';?>" alt="<?php _e('An image describing how to set a static front page.','aaron' )?>"><br>
			<?php _e('<b>Please note:</b> The landing page template only shows your header, it does NOT display your featured content, post content or page content. ','aaron' )?><br><br>

			<?php _e('<b>Page sections:</b> Page sections are a great way to display your shortcodes, testimonials, pricing tables, contact information and similar.', 'aaron' ); ?><br>
			<?php _e('The two page sections can display up to 3 pages each. Pages in the top section are displayed above the blog content, and pages in the bottom section are displayed below.','aaron' )?><br>
			<?php _e('You can also show your page sections without your blog content by setting a static front page, using the <i>Sections</i> page template.','aaron' )?><br>
	</div>

	<div class="doc-box" id="aaron-advanced">
		<h3><?php _e('Advanced settings','aaron' ); ?></h3>
		<?php _e('Under the Advanced settings tab in the customizer you will find the following options:','aaron' )?><br>
		<ul>
			<li><?php _e('Hide the meta information. -This will hide the category and tags.','aaron' )?></li>
			<li><?php _e('Hide the author and post date information.','aaron' )?></li>
			<li><?php _e('Show the sidebar on pages.','aaron' )?></li>
			<li><?php _e('Show the sidebar on the front page.','aaron' )?></li>
			<li><?php _e('Show the breadcrumb navigation. -Breadcrumbs are shown below the post title. ','aaron' )?></li>
			<li><?php _e('Hide the search form in the header menu.','aaron' )?></li>
			<li><?php _e('Hide the Site title in the header menu.','aaron' )?></li>
			<li><?php _e('Add a descriptive screen reader text for the footer.','aaron' )?></li>
			<li><?php _e('Add a descriptive screen reader text for the sidebar.','aaron' )?></li>
		</ul>
	</div>

	<div class="doc-box" id="aaron-access">
		<h3><?php _e('Accessibility','aaron' ); ?></h3>
		<?php _e("Note: In version 2.0, the accessibility settings were moved from the Advanced Settings to it's own setting in the customizer.","aaron" ); ?>
		<?php _e('Changing the colors of the theme can affect accessibility.','aaron'); ?>

		<ul>
			<li><?php _e('Skip link: the theme has one skip link at the very top that lets you skip past the main menu.','aaron' )?><br>
				<?php _e('if Highligts are used, you skip to the first Highlight, otherwise you skip to the main content','aaron' )?>
			</li>
			<li><?php _e('In the customizer you can add personalized screen reader texts for your sidebar and footer.','aaron' )?></li>
			<li><?php _e('There is also an option to change text displayed as UPPERCASE to Capitalized.','aaron' )?></li>
			<li><?php _e('Known issues:','aaron' )?>
				<ul>
					<li><?php _e('Some widgets that uses forms (category dropdown) are missing form labels. This is a known issue with WordPress.','aaron' )?></li>
					<li><?php _e('Menus have a visible focus and can be tabbed through, but you can not navigate them using the arrow keys.','aaron' )?></li>
				</ul>
			</li>
		</ul>
	</div>

	<div class="doc-box" id="aaron-plugins">
		<h3><?php _e('Plugins','aaron' ); ?></h3>
		<?php _e('Aaron has been tested with and style has been added for the following plugins:', 'aaron' ); ?>
		<ul>
			<li><b><?php _e('Woocommerce','aaron' )?></b></li>
			<li><b><?php _e('bbPress','aaron' )?></b></li>
			<li><b><?php _e('Jetpack','aaron' )?></b><br><?php _e(' Note: Not all of Jetpacks modules are accessibe, and some uses iframes. I have increased the contrast of some of the modules.','aaron' )?></li>
				<?php _e('Recommended modules:','aaron' )?><br>
				<ul>
					<li><b><?php _e('Featured content','aaron' )?></b><br>
						<?php _e('-Once Jetpack has been activated, you can select up to six posts or pages as a front page feature. Chose a tag and add it to your posts to seperate them from the rest.<br>
						You can also choose a headline for your featured section. Featured images are optional and the recommended image size is 360x300 pixels.','aaron' )?><br>
						<img src="<?php echo get_template_directory_uri() . '/images/doc-featured.jpg';?>" alt="<?php _e('An image describing three featured posts on the front page, two with featured images and one 
						that only displays the post title.', 'aaron') ?>"><br>
					</li>
					<li><b><?php _e('Custom Content Type: Portfolio','aaron' )?></b><br>
						<?php _e('Aaron also supports Jetpack','aaron' )?> 
						<b><?php _e('Portfolios','aaron' )?></b>. <a href="<?php echo 'http://en.support.wordpress.com/portfolios/'; ?>"><i><?php _e('Read more about how to setup your Portfolio on Jetpacks support site.','aaron' )?></i></a><br><br>
						<img src="<?php echo get_template_directory_uri() . '/images/doc-portfolio.jpg';?>" alt="<?php _e('An image describing two portfolio items.','aaron' )?>"><br>
					</li>

					<li><b><?php _e('Custom Content Type: Testimonials','aaron' )?></b><br>
						<?php _e('Aaron also supports Jetpack','aaron' )?> <b><?php _e('Testimonials','aaron' )?></b>. <br>
						<?php _e('<b>Tip:</b> I recommend creating a page and adding this shortcode, and then including the page as a front page section.','aaron' )?> <br> &nbsp; [testimonials columns=3 showposts=3]<br>

						<a href="<?php echo 'https://en.support.wordpress.com/testimonials-shortcode/'; ?>"><i><?php _e('Read more about how to setup your Testimonials on Jetpacks support site.','aaron' )?></i></a><br><br>		
					</li>

					<li><b><?php _e('Sharing','aaron' )?></b><br>
						<?php _e('-If you activate Jetpack sharing, your buttons will be displayed below the meta information, to the right of your post content.','aaron' )?><br>
						<img src="<?php echo get_template_directory_uri() . '/images/doc-share.jpg';?>" alt="<?php _e('An image describing how sharing buttons are added to the post footer below Tags and Categories.','aaron' )?>"><br>
					</li>
					<li><b><?php _e('Contact Form','aaron' )?></b></li>
					<li><?php _e('<b>Site icon</b> -Use this module to add a favicon to your site.','aaron' )?></li>
					<li><?php _e('<b>Site logo</b> -Once Jetpack has been activated, you can add a logo above your Site title on the front page. You will find this setting in the customizer.','aaron' )?></li>
				</ul>
		</ul>
		</ul>
	</div>
<?php
}

?>