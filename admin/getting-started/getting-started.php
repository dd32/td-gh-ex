<?php
/**
 * Theme update Documentation Page, Code kindly used from editor Theme by Mike at Arraythemes.com
 *
 * @package anissa
 */

/**
 * Redirect to Getting Started page on theme activation
 */
function anissa_redirect_on_activation() {
	global $pagenow;

	if ( is_admin() && 'themes.php' == $pagenow && isset( $_GET['activated'] ) ) {

		wp_redirect( admin_url( "themes.php?page=anissa-getting-started" ) );

	}
}
add_action( 'admin_init', 'anissa_redirect_on_activation' );

/**
 * Load Getting Started styles in the admin
 *
 * since 1.0.0
 */
function anissa_start_load_admin_scripts() {

	// Load styles only on our page
	global $pagenow;
	if( 'themes.php' != $pagenow )
		return;

	/**
	 * Getting Started scripts and styles
	 *
	 * @since 1.0
	 */

	// Getting Started javascript
	wp_enqueue_script( 'anissa-getting-started', get_template_directory_uri() . '/admin/getting-started/getting-started.js', array( 'jquery' ), '1.0.0', true );

	// Getting Started styles
	wp_register_style( 'anissa-getting-started', get_template_directory_uri() . '/admin/getting-started/getting-started.css', false, '1.0.0' );
	wp_enqueue_style( 'anissa-getting-started' );

	// Thickbox
	add_thickbox();
}
add_action( 'admin_enqueue_scripts', 'anissa_start_load_admin_scripts' );

/**
 * Adds a menu item for the Getting Started page
 *
 * since 1.0.0
 */
function anissa_license_menu() {
	add_theme_page(
		__( 'Theme Help', 'anissa' ),
		__( 'Theme Help', 'anissa' ),
		'manage_options',
		'anissa-getting-started',
		'anissa_getting_started'
	);
}
add_action( 'admin_menu', 'anissa_license_menu' );

/**
 * Outputs the markup used on the theme license page.
 *
 * since 1.0.0
 */
function anissa_getting_started() {

	/**
	 * Retrieve help file and theme update changelog
	 *
	 * since 1.0.0
	 */

	// Theme info
	$theme = wp_get_theme( 'anissa' );
?>

<div class="wrap getting-started">
  <h2 class="notices"></h2>
  <div class="intro-wrap">
    <div class="intro">
      <h3>
        <?php esc_html_e( 'Anissa', 'anissa' ); ?>
      </h3>
      <h4>
        <?php esc_html_e( 'Anissa Theme Documentation', 'anissa' ); ?>
      </h4>
    </div>
  </div>
  <div class="panels">
    <ul class="inline-list">
      <li class="current"><a id="help-tab" href="#">
        <?php esc_html_e( 'Help File', 'anissa' ); ?>
        </a></li>
      <li><a id="themes-tab" href="#">
        <?php esc_html_e( 'More Themes &amp; Support', 'anissa' ); ?>
        </a></li>
    </ul>
    <div id="panel" class="panel"> 
      
      <!-- Help file panel -->
      <div id="help-panel" class="panel-left visible">
        <?php _e( '<p>Need help installing the theme? Head over to the <a href="http://alienwp.com/documentation/theme-installation/">theme installation tutorial</a>.</p>
<p class="alert">If images don&#8217;t appear with the correct sizes, you need to <strong>recreate all image thumbnails</strong>! You don&#8217;t need to do it manually &#8211; there are plugins that can do the job for you. A good one is <a href="http://wordpress.org/extend/plugins/regenerate-thumbnails/" target="_blank">Regenerate Thumbnails</a>. Just run it AFTER installing and activating the new theme and wait till it completes its job.</p>
<h2 class="alert">Social Icons Menu Setup</h2>
<p>Anissa features a Social Media menu located at the top right hand side of the theme.</p>
<ol>
<li class="alert">To Create the top social media menu, visit &#8220;Apperance&#8221; &gt; &#8220;Menus&#8221;</li>
<li class="alert">Create a new menu and name it &#8220;Social&#8221; then tick the &#8220;Social Links&#8221; Theme location box.</li>
<li class="alert">Now add icons to it by adding a &#8220;Custom Link&#8221; and pasting in your social media profile URL. The supported sites are :<br />
CodePen<br />
Digg<br />
Dribbble<br />
Dropbox<br />
Facebook<br />
Flickr<br />
GitHub<br />
Google+<br />
Instagram<br />
LinkedIn<br />
Email (mailto: links)<br />
Pinterest<br />
Reddit<br />
RSS Feed (urls with /feed/)<br />
StumbleUpon<br />
Tumblr<br />
Twitter<br />
Vimeo<br />
WordPress<br />
YouTube</li>
</ol>
<h2 class="alert">Custom Header Image and Logo</h2>
<p>To set these images visit &#8220;Appearance&#8221; &gt; &#8220;Customize&#8221; and set the logo under &#8220;Site Identity&#8221; and the Header Image under &#8220;Header Image&#8221;</p>
<h2>Carousel Setup</h2>
<p>To choose the category of your featured posts Carousel, visit &#8220;Appearance&#8221; &gt; &#8220;Customize&#8221; &gt; &#8220;Carousel Settings&#8221; and choose a category and number of posts.</p> ', 'anissa' ); ?>
      </div>
      
      <!-- More themes -->
      <div id="themes-panel" class="panel-left">
        <div class="theme-intro">
          <div class="theme-intro-left">
            <p>
              <?php _e( 'Minimal and simple, yet powerful and efficient themes for serious site owners and professional WordPress users. Get our entire collection of 18 Themes and Full Support for just $59', 'anissa' ); ?>
            </p>
          </div>
          <div class="theme-intro-right"> <a class="button-primary club-button" href="<?php echo esc_url('https://alienwp.com/ref/9/'); ?>">
            <?php esc_html_e( 'Visit AlienWP &rarr;', 'anissa' ); ?>
            </a> </div>
        </div>
        <div class="theme-list">
          <?php _e( '<div class="alienwp">
<h2>Althea</h2>
<p><a href="https://alienwp.com/themes/anissa"><img src="https://alienwp.com/wp-content/themes/AlienWP/images/althea.jpg" alt="" /></a><br />
Althea is a minimal and modern Masonry grid WordPress Portfolio Theme.
</div>
<div class="alienwp">
<h2>Anissa</h2>
<p><a href="https://alienwp.com/themes/anissa"><img src="https://alienwp.com/wp-content/themes/AlienWP/images/anissa.jpg" alt="" /></a></p>
<p>Anissa is a beautiful WordPress blogging theme, designed in a feminine style with elegant Typography and post styling.</p>
</div>
<div class="alienwp">
<h2>Oxygen</h2>
<p><a href="https://alienwp.com/themes/oxygen"><img src="https://alienwp.com/wp-content/themes/AlienWP/images/oxygen.jpg" alt="" /></a></p>
<p>A professional magazine theme with responsive layout for enhanced mobile browsing experience.</p>
</div>
<div class="alienwp">
<h2>Origin</h2>
<p><a href="https://alienwp.com/themes/origin"><img src="https://alienwp.com/wp-content/themes/AlienWP/images/origin.jpg" alt="" /></a></p>
<p>Origin is a simple and elegant theme with responsive layout for better viewing on mobile devices, smartphones and tablets.</p>
</div>
<div class="alienwp">
<h2>Proxima</h2>
<p><a href="https://alienwp.com/themes/proxima"><img src="https://alienwp.com/wp-content/themes/AlienWP/images/proxima.jpg" alt="" /></a></p>
<p>Proxima is built to be the ultimate magazine theme: rich, flexible, fast-loading, search engine optimized, with optimal layout and typesetting.</p>
</div>
<div class="alienwp">
<h2>Cell</h2>
<p><a href="https://alienwp.com/themes/cell"><img src="https://alienwp.com/wp-content/themes/AlienWP/images/cell.jpg" alt="" /></a></p>
<p>Cell is a flexible photography and photoblogging theme. It doesnt crop your images, but displays them in their original ratio.</p>
</div>
<div class="alienwp">
<h2>Florence</h2>
<p><a href="https://alienwp.com/themes/florence"><img src="https://alienwp.com/wp-content/themes/AlienWP/images/florence.jpg" alt="" /></a></p>
<p>An elegant business and/or portfolio WordPress theme, built for presenting products and client testimonials.</p>
</div>
<div class="alienwp">
<h2>Goa</h2>
<p><a href="https://alienwp.com/themes/goa"><img src="https://alienwp.com/wp-content/themes/AlienWP/images/goa.jpg" alt="" /></a></p>
<p>An absolutely minimal and elegant WordPress theme for writers and bloggers.</p>
</div>
<div class="alienwp">
<h2>Hatch Pro</h2>
<p><a href="https://alienwp.com/themes/hatch-pro"><img src="https://alienwp.com/wp-content/themes/AlienWP/images/hatchpro.jpg" alt="" /></a></p>
<p>A minimal portfolio and blogging theme, Hatch Pro is an advanced version of Hatch, providing additional control, layout sections, and extra theme options.</p>
</div>
<div class="alienwp">
<h2>Ascetica</h2>
<p><a href="https://alienwp.com/themes/ascetica"><img src="https://alienwp.com/wp-content/themes/AlienWP/images/ascetica.jpg" alt="" /></a></p>
<p>Ascetica is a simple portfolio and blog theme with responsive layout, sticky posts slider, and a widget for presenting your work.</p>
</div>
<div class="alienwp">
<h2>Hatch</h2>
<p><a href="https://alienwp.com/themes/hatch"><img src="https://alienwp.com/wp-content/themes/AlienWP/images/hatch.jpg" alt="" /></a></p>
<p>Hatch is a simple photography and portfolio WordPress theme.</p>
</div>
<div class="alienwp">
<h2>Apataki</h2>
<p><a href="https://alienwp.com/themes/apataki"><img src="https://alienwp.com/wp-content/themes/AlienWP/images/apataki.jpg" alt="" /></a></p>
<p>Apataki is a clean theme theme with a grid-based layout which uses lots of whitespace.</p>
</div>
<div class="alienwp">
<h2>Manra</h2>
<p><a href="https://alienwp.com/themes/manra"><img src="https://alienwp.com/wp-content/themes/AlienWP/images/manra.jpg" alt="" /></a></p>
<p>A minimal and clean blogging theme with support for galleries and images.</p>
</div>
<div class="alienwp">
<h2>Tautira</h2>
<p><a href="https://alienwp.com/themes/tautira"><img src="https://alienwp.com/wp-content/themes/AlienWP/images/tautira.jpg" alt="" /></a></p>
<p>Tautira is a minimal business style WordPress theme, perfect for creating simple websites.</p>
</div>
<div class="alienwp">
<h2>Convention</h2>
<p><a href="https://alienwp.com/themes/convention"><img src="https://alienwp.com/wp-content/themes/AlienWP/images/convention.jpg" alt="" /></a></p>
<p>Convention has a traditional blog layout with menu bar at the top, featured images, sidebar widgets and custom menus.</p>
</div>
<div class="alienwp">
<h2>Buariki</h2>
<p><a href="https://alienwp.com/themes/buariki"><img src="https://alienwp.com/wp-content/themes/AlienWP/images/buariki.jpg" alt="" /></a></p>
<p>Buariki is a clean WordPress theme with a tradition blog layout, you can upload a header image and use the customizer to make changes to your theme which will appear in real-time.</p>
</div>
<div class="alienwp">
<h2>Aura</h2>
<p><a href="https://alienwp.com/themes/aura"><img src="https://alienwp.com/wp-content/themes/AlienWP/images/aura.jpg" alt="" /></a></p>
<p>Aura is a free minimal WordPress theme which uses a single column to display your content.</p>
</div>
<div class="alienwp">
<h2>Elegant White Pro</h2>
<p><a href="https://alienwp.com/themes/elegantwhite-pro"><img src="https://alienwp.com/wp-content/themes/AlienWP/images/elegantwhitepro.jpg" alt="" /></a></p>
<p>This is the pro version of our ElegantWhite theme, a clean blogging theme in use on thousands of blogs around the world.</p>
</div>
<div class="alienwp">
<h2>Elegant White</h2>
<p><a href="https://alienwp.com/themes/elegantwhite"><img src="https://alienwp.com/wp-content/themes/AlienWP/images/elegantwhite.jpg" alt="" /></a></p>
<p>Our simple starter theme for bloggers, clean styling, plenty of whitespace and a traditional blog layout.</p>
</div>
<div class="alienwp">
<h2>Simple Style</h2>
<p><a href="https://alienwp.com/themes/simplestyle"><img src="https://alienwp.com/wp-content/themes/AlienWP/images/simplestyle.jpg" alt="" /></a></p>
<p>As the name suggests, Simple Style is a simple and elegant one-column starter theme for personal blogs.</p>
</div>', 'anissa' ); ?>
        </div>
        <!-- .theme-list --> 
      </div>
      <!-- .panel-left updates -->
      
      <div class="panel-right"><img src="<?php echo get_template_directory_uri() . '/admin/getting-started/logo.png'; ?>" class="alienlogo"/>
        <div class="panel-aside panel-club"> <a href="<?php echo esc_url('https://alienwp.com/ref/9/'); ?>"><img src="<?php echo get_template_directory_uri() . '/admin/getting-started/club.jpg'; ?>" alt="<?php esc_html_e( 'Join the Theme Club!', 'anissa' ); ?>" /></a>
          <div class="panel-club-inside">
            <h4>
              <?php esc_html_e( 'Get our full collection of beautiful responsive themes for one price.', 'anissa' ); ?>
            </h4>
            <p>
              <?php esc_html_e( 'Our Theme club includes all 20 of our current themes, any news themes we release and amazing customer support should you need a hand with your theme - All for $59!', 'anissa' ); ?>
            </p>
            <p>
            <h4>
              <?php esc_html_e( 'Use Coupon Code "Anissa" for 25% Off All Plans', 'anissa' ); ?>
            </h4>
            </p>
            <a class="button-primary club-button" href="<?php echo esc_url('https://alienwp.com/ref/9/'); ?>">
            <?php esc_html_e( 'Visit AlienWP &rarr;', 'anissa' ); ?>
            </a> </div>
        </div>
      </div>
      <!-- .panel-right --> 
    </div>
    <!-- .panel --> 
  </div>
  <!-- .panels --> 
</div>
<!-- .getting-started -->

<?php
}
