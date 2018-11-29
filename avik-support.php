<?php
/**
* avik-support.php
* @link https://www.denisfranchi.com
*
* @package Avik
*
*  @version   1.2.8
*/
?>

<div class="avik-image-background-support container" style="background: url('<?php echo esc_url(get_template_directory_uri()).'/img/static.jpg';  ?>'); background-repeat: no-repeat;
background-position: center center;background-size: cover;" >
<div class="logo-support">
	<h1><?php esc_html_e( 'AVIK', 'avik' ); ?></h1><h2><?php esc_html_e( 'V 1.2.8', 'avik' ); ?></h2>
</div>
<div class="text-support">
	<h1><?php esc_html_e( 'Welcome to Avik', 'avik' ); ?></h1>
	<h5><?php esc_html_e( 'Thank you for choosing the best theme we have ever build!', 'avik' ); ?></h5>
</div>
</div>

<!-- Tab links -->

<div class="avik-tab-support">
	<div class="tab">
		<button class="tablinks" onclick="avikopenGuide(event, 'WELCOME')"id="defaultOpen"><?php esc_html_e( 'WELCOME', 'avik' ); ?></button>
		<button class="tablinks" onclick="avikopenGuide(event, 'GUIDES')"><?php esc_html_e( 'GUIDES', 'avik' ); ?></button>
		<button class="tablinks" onclick="avikopenGuide(event, 'PRO')"><?php esc_html_e( 'PRO VERSION', 'avik' ); ?></button>
		<button class="tablinks" onclick="avikopenGuide(event, 'SUPPORT')"><?php esc_html_e( 'SUPPORT PRO', 'avik' ); ?></button>
	</div>

	<!-- Tab content -->

	<!-- Welcome -->

	<div id="WELCOME" class="tabcontent">
		<i class="far fa-smile fa-3x"></i>
		<h3 class="avik-welkome-support-title"><?php esc_html_e( 'Welcome', 'avik' ); ?></h3>
		<p class="avik-welkome-support"><?php esc_html_e( 'Thank you for choosing Avik.The theme is ready to be used.You can customize everything you want in a few simple clicks directly from the front end.', 'avik' ); ?>
		<br>
		<?php esc_html_e('For a complete experience, go to the ','avik');?> <a href="<?php echo esc_url( 'https://www.denisfranchi.com/avik-pro/' ); ?>" target="_blank"><?php esc_html_e( 'Pro Version', 'avik' ); ?></a>
		</p>

	</div>

	<!-- Guides -->

	<div id="GUIDES" class="tabcontent">
		<i class="fas fa-book fa-3x"></i>
		<h3 class="avik-welkome-support-title"><?php esc_html_e( 'Guides', 'avik' ); ?></h3>
		<p class="avik-welkome-support">
			<?php esc_html_e( 'Here you will find some very useful guides for using Avik', 'avik' ); ?>
		</p>
		<div class="avik-guide-support-admin">
			<div class="avik-guide">
				<i class="fas fa-info-circle fa-3x"></i>
				<h2><?php esc_html_e( 'Guide to add id sections in the menu', 'avik' ); ?></h2>
				<p><?php esc_html_e('Insert id section for ancor the scroll', 'avik'); ?></p>
				<button class="avik-button-guide-admin-support"><a class="avik-button" href="<?php echo esc_url( 'https://www.denisfranchi.com/community/index.php?threads/guide-to-add-id-sections-in-the-menu.6/' ); ?>"><?php esc_html_e( 'Open Guide', 'avik' ); ?></a></button>
			</div>
			<div class="avik-guide">
				<i class="fas fa-info-circle fa-3x"></i>
				<h2><?php esc_html_e( 'Guide for the section Who we are', 'avik' ); ?></h2>
				<p><?php esc_html_e( 'Create a dedicated page', 'avik' ); ?></p>
				<button class="avik-button-guide-admin-support"><a class="avik-button" href="<?php echo esc_url( 'https://www.denisfranchi.com/community/index.php?threads/guide-for-the-section-who-we-are.7/' ); ?>"><?php esc_html_e( 'Open Guide', 'avik' ); ?></a></button>
			</div>
			<div class="avik-guide">
				<i class="fas fa-info-circle fa-3x"></i>
				<h2><?php esc_html_e('Guide for the section Services', 'avik'); ?></h2>
				<p><?php esc_html_e('Create a dedicated page', 'avik'); ?></p>
				<button class="avik-button-guide-admin-support"><a class="avik-button" href="<?php echo esc_url( 'https://www.denisfranchi.com/community/index.php?threads/guide-for-the-section-services.8/' ); ?>"><?php esc_html_e( 'Open Guide', 'avik' ); ?></a></button>
			</div>
			<div class="avik-guide">
				<i class="fas fa-info-circle fa-3x"></i>
				<h2><?php esc_html_e('Guide for the section Portfolio', 'avik'); ?></h2>
				<p><?php esc_html_e('Create a dedicated page', 'avik'); ?></p>
				<button class="avik-button-guide-admin-support"><a class="avik-button" href="<?php echo esc_url( 'https://www.denisfranchi.com/community/index.php?threads/guide-for-the-section-portfolio.9/' ); ?>"><?php esc_html_e( 'Open Guide', 'avik' ); ?></a></button>
			</div>
		</div>
		<div class="avik-clear-guide-support-admin"></div>
	</div>

	<!-- PRO VERSION -->
	
	<div id="PRO" class="tabcontent">
		<img class="avik-pro-support-img" src="<?php echo esc_url(get_template_directory_uri()).'/img/Avik-Pro-Version.png';?>" / >
		<h3 class="avik-welkome-support-title"><?php esc_html_e( 'PRO VERSION', 'avik' ); ?></h3>

		<p class="avik-welkome-support">
			<?php esc_html_e( 'Soon the Pro version will be available, full of settings:', 'avik' ); ?>
		</p>
		<div class="avik-guide-support-admin">
			<ul class="avik-ul-support">
				<li><?php esc_html_e( 'More template', 'avik' ); ?></li>
				<li><?php esc_html_e( 'Extended portfolio', 'avik' ); ?></li>
				<li><?php esc_html_e( 'Font family choice', 'avik' ); ?></li>
				<li><?php esc_html_e( 'New widget areas', 'avik' ); ?></li>
				<li><?php esc_html_e( 'Possibility to remove "Power by"', 'avik' ); ?></li>
				<li><?php esc_html_e( 'More options', 'avik' ); ?></li>
				<li><?php esc_html_e( 'Support for 12 months', 'avik' ); ?></li>
				<li><?php esc_html_e( 'More slider', 'avik' ); ?></li>
				<li><?php esc_html_e( 'More Homepage Section', 'avik' ); ?></li>
				<li><?php esc_html_e( 'Blog Layouts', 'avik' ); ?></li>
				<li><?php esc_html_e( 'Ecommerce', 'avik' ); ?></li>
			</ul>
			<button class="avik-button-admin-support"><a class="avik-button" href="<?php echo esc_url( 'https://www.denisfranchi.com/avik-pro/' ); ?>" target="_blank"><?php esc_html_e( 'Go Pro Version', 'avik' ); ?></a></button>
		</div>
		<div class="avik-clear-guide-support-admin"></div>
	</div>

	<!-- Support -->

	<div id="SUPPORT" class="tabcontent">
		<i class="fas fa-user fa-3x"></i>
		<h3 class="avik-welkome-support-title"><?php esc_html_e('Support for Pro Version', 'avik'); ?></h3>
		<p class="avik-welkome-support"><?php esc_html_e('We offer full support for our theme, taking care of our customers and making sure we solve all the problem. Every time an update will be released you will be notified via a back-end notification, where you will be able to see the changes made and any bugs fixed.', 'avik'); ?>
		</p>
		<h3 class="avik-welkome-support-title"><?php esc_html_e('Forum Support', 'avik'); ?></h3>
		<p class="avik-welkome-support"><?php esc_html_e('We offer outstanding support through our forum. To get support first have the','avik');?> <a href="<?php echo esc_url( 'https://www.denisfranchi.com/avik-pro/' ); ?>" target="_blank"><?php esc_html_e( 'Pro Version', 'avik' ); ?></a>
			<?php esc_html_e('and you need to register (create an account) and open a thread in the Avik Section.', 'avik'); ?></p>
		<button class="avik-button-admin-support"><a class="avik-button" href="<?php echo esc_url( 'https://www.denisfranchi.com/comunity/index.php' ); ?>"><?php esc_html_e('Open Forum', 'avik'); ?></a></button>
	</div>
</div>
<script>
// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen").click();
</script>
