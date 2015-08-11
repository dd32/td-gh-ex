<?php
/**
 * Theme Information Page
 *
 * @package	Anarcho Notepad
 * @since	2.21
 * @author	Arthur "Berserkr" Gareginyan <arthurgareginyan@gmail.com>
 * @copyright 	Copyright (c) 2013-2015, Arthur Gareginyan
 * @link      	http://mycyberuniverse.com/anarcho-notepad.html
 * @license   	http://www.gnu.org/licenses/gpl-3.0.html
 */

// Add some CSS so I can Style the Theme Options Page
function anarcho_include_theme_options_style() {
	wp_enqueue_style('anarcho_theme_options_styles', get_template_directory_uri() . '/theme_info.css', false, '1.0');
}
add_action('admin_print_styles-appearance_page_theme_options', 'anarcho_include_theme_options_style');

// Create the Theme Information page (Theme Options)
function anarcho_theme_options_do_page() { ?>
    <div class="cover">
    <header id="header"></header>
    <section id="page">

      <div class="content">

      <h3>"Anarcho Notepad"</h3>
      <h4>by Arthur "Berserkr" Gareginyan</h4>
	<p><?php _e('Inspired by the idea of Anarchy, I designed this theme for your personal blogs and diaries. "Anarcho Notepad" can be easily customized. It utilizes latest HTML 5, CSS3 and wordpress native functions for creating the awesomeness that looks good on every browser. I\'m constantly adding new features to this theme to allow you to personalize it to your own needs. If you want a new feature or just want to be able to change something just ask me and I would be happy to add it for you. I would like to thank you for your support, visit the Theme URI for the update history, and Enjoy!', 'anarcho-notepad');?></p>
	</br>

	<p>
	<?php _e('If you liked the theme "Anarcho Notepad", then I\'ll be glad if you consider donating:', 'anarcho-notepad'); ?>
	<a href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=2EBT6E8BQ5RRQ" target="_blank" rel="nofollow"><img class="tc-donate" src="https://www.paypal.com/en_US/i/btn/btn_donateCC_LG.gif" alt="Make a donation for Anarcho-Notepad"></a>
	<br/>
	<?php _e('or if you leave feedback about the "Anarcho Notepad":', 'anarcho-notepad'); ?>
	<a class="button" href="http://wordpress.org/support/view/theme-reviews/anarcho-notepad" target="_blank"> Leave Feedback </a>
	<br/><br/>

	<?php _e('If you have any questions or suggestions for improving and adding new features, feel free to contact me at:', 'anarcho-notepad'); ?>
	<a class="button" href="http://wordpress.org/support/theme/anarcho-notepad"> Support </a>
	<?php _e('or at:', 'anarcho-notepad'); ?>
        <a class="button" href="http://mycyberuniverse.com/anarcho-notepad.html"> My Website </a>

	</br></br>
	<?php _e('Sorry for what I delete some functions from Customizer. I have to do it due to the rules of wordpress.org.', 'anarcho-notepad'); ?>
	</p>

	<h4><?php _e('Translation', 'anarcho-notepad'); ?></h4>
	<p><b><em><?php _e('The theme is in the process of translation into other languages of the world. If you have the desire then you can help me in translation to your native language.', 'anarcho-notepad'); ?></em></b></p>
        <p>
	   <?php _e('"Anarcho-Notepad" written in English and translated into:', 'anarcho-notepad'); ?>
	   <ul>
	     <li><strong>Русский</strong> (translated by <strong>Arthur Gareginyan</strong>)</li>
             <li><strong>Українська</strong> (translated by <strong>Svetlana Drotyanko</strong>)</li>
             <li><strong>Slovenčina</strong> (translated by <strong>Martin Petrus</strong>)</li>
             <li><strong>Afrikaans</strong> (translated by <strong>MadriVictor</strong>)</li>
             <li><strong>Español</strong> (translated by <strong>Ivan Ratinoff</strong>)</li>
             <li><strong>Polski</strong> (translated by <strong>Krzysztof Goral</strong>)</li>
             <li><strong>German</strong> (translated by <strong>Alexander v. Falkenhausen</strong>)</li>
             <li><strong>Estonian</strong> (translated by <strong>Taavi Tiitsmaa</strong>)</li>
             <li><strong>Catalan</strong> (translated by <strong>Néstor Malet</strong>) – Coming soon!</li>
             <li><strong>Danish</strong> (translated by <strong>Chano Klinck Andersen</strong>) – Coming soon!</li>
           </ul>
	   <em><b><?php _e('Thanks to all who helped me translate "Anarcho-Notepad" into other languages!', 'anarcho-notepad'); ?></b></em>
	   <em><b><?php _e('Thank you very much for your contribution!', 'anarcho-notepad'); ?></b></em>
	<p>
	   You can translate this theme and send the translation file to me at the arthurgareginyan@gmail.com and I will include the translation within the one of the next theme update. Many of theme users would be delighted if you shared your translation with the community.
	</p>

	</p>
      </div><!--<div class="content">-->

      <aside id="sidebar">
            <div class="donate">
              <h3><?php _e('Please consider making a donation', 'anarcho-notepad');?></h3>
              <p><a href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=2EBT6E8BQ5RRQ" target="_blank" rel="nofollow"><img class="tc-donate" src="https://www.paypal.com/en_US/i/btn/btn_donateCC_LG.gif" alt="Make a donation for Anarcho-Notepad"></a>
              </p>
            </div><!--<div class="donate">-->

            <div class="comment">
              <h3><?php _e('Happy to enjoy the Anarcho-Notepad?', 'anarcho-notepad');?></h3>
              <p><a class="button-primary review-customizr" title="Leave a comment" href="http://wordpress.org/support/view/theme-reviews/anarcho-notepad" target="_blank"><?php _e('Leave a comment', 'anarcho-notepad');?></a></p>
            </div><!--<div class="comment">-->

            <div class="follow">
              <h3><?php _e('Follow me :', 'anarcho-notepad');?></h3>
              <p style="font-family:FontAwesome;">
		 <a href="https://twitter.com/AGareginyan" target="_blank"> &#xf099; </a>
		 <a href="https://www.facebook.com/arthur.gareginyan" target="_blank"> &#xf09a; </a>
                 <a href="http://instagram.com/arthur_gareginyan" target="_blank"> &#xf16d; </a>
		 <a href="https://plus.google.com/+ArthurGareginyan" target="_blank"> &#xf0d5; </a>
	      </p>
            </div><!--<div class="follow">-->

      </aside><!--<aside id="sidebar">-->

      <br clear="all">

    </section><!--<section id="page">-->
    <footer id="footer"></footer><!--<footer id="finishing">-->

    </div><!--<div class="cover">-->

<?php }
add_action('admin_menu', 'anarcho_theme_options_add_page');

// Page "Theme info" in dashboard
function anarcho_theme_options_add_page() {
	add_theme_page(
		__( 'Theme Info' , 'anarcho-notepad' ),   // Name of page
		__( 'Theme Info' , 'anarcho-notepad' ),   // Label in menu
		 'edit_theme_options',			  // Capability required
		 'theme_options',			  // Menu slug, used to uniquely identify the page
		 'anarcho_theme_options_do_page'	  // Function to be called to output the content of this page
	);
}


// Add help button to admin bar
function anarcho_add_help_button() {
   if ( current_user_can( 'edit_theme_options' ) ) {
     global $wp_admin_bar;
     $wp_admin_bar->add_menu( array(
       'parent' => 'top-secondary', 			  // Off on the right side
       'id' 	=> 'anarcho-help' ,
       'title' 	=>  __( 'Help' , 'anarcho-notepad' ),
       'href' 	=> admin_url( 'themes.php?page=theme_options' ),
       'meta'   => array(
		          'title'  => __( 'Need help with Anarcho-Notepad? Click here!', 'anarcho-notepad' ),
        ),
     ));
   }
}
add_action ( 'wp_before_admin_bar_render', 'anarcho_add_help_button' );

//enqueue additional styling for admin screens
function anarcho_include_admin_style() {
	wp_enqueue_style( 'anarcho_admin_styles', get_template_directory_uri() . '/admin.css' );
}
add_action( 'admin_init', 'anarcho_include_admin_style' );
