<?php
/**
 * Theme Information Page
 *
 * @package	Anarcho Notepad
 * @since	2.4.1
 * @author	Arthur (Berserkr) Gareginyan <arthurgareginyan@gmail.com>
 * @copyright 	Copyright (c) 2013-2014, Arthur Gareginyan
 * @link      	http://mycyberuniverse.tk/anarcho-notepad.html
 * @license   	http://www.gnu.org/licenses/gpl-3.0.html
 */


// Add some CSS so I can Style the Theme Options Page
function anarcho_admin_enqueue_scripts( $hook_suffix ) {
	wp_enqueue_style('anarcho-theme-options', get_template_directory_uri() . '/theme_info.css', false, '1.0');
}
add_action('admin_print_styles-appearance_page_theme_options', 'anarcho_admin_enqueue_scripts');

// Create the Theme Information page (Theme Options)
function anarcho_theme_options_do_page() { ?>
    <div class="cover">
    <header id="header"></header>
    <section id="page">

      <div class="content">

	<div class="welcome"><i><?php _e('Thank you for using "Anarcho Notepad"! The "Anarcho Notepad" v2.4 now even more opportunities, it is safer and more stable than ever! Enjoy! ', 'anarcho-notepad');?></i>
	<a href="https://twitter.com/share" class="twitter-share-button" data-url="http://mycyberuniverse.tk/anarcho-notepad.html" data-text="My WordPress website is built with the #Anarcho-Notepad Theme version 2.4!" data-related="AGareginyan">Tweet</a>
	<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
	<p><a name="fb_share" type="icon"
   share_url="http://mycyberuniverse/anarcho-notepad.html"></a>
<script src="http://static.ak.fbcdn.net/connect.php/js/FB.Share" type="text/javascript">
</script></p>
	</div>

      <h4><?php _e('About the Theme "Anarcho Notepad"', 'anarcho-notepad');?></h4>
	<p><?php _e('Inspired by the idea of Anarchy, I designed this theme for your personal blogs and diaries. \"Anarcho Notepad\" can be easily customized. It utilizes latest HTML 5, CSS3 and wordpress native functions for creating the awesomeness that looks good on every browser. I\'m constantly adding new features to this theme to allow you to personalize it to your own needs. If you want a new feature or just want to be able to change something just ask me and I would be happy to add it for you. I would like to thank you for your support, visit the Theme URI for the update history, and Enjoy!', 'anarcho-notepad');?></p>


      <h4><?php _e('Features', 'anarcho-notepad');?></h4>
      <table>
        <tbody>
        <tr>
        <th class="justify"><?php _e('Anarcho Notepad Theme Features', 'anarcho-notepad');?></th>
        <th></th>
        </tr>
        <tr>
        <td class="justify"><?php _e('Responsive Design', 'anarcho-notepad'); ?></td>
        <td>&#9733;</td>
        </tr>
        <tr>
        <td class="justify"><?php _e('Clean and Beautiful Stylized HTML, CSS, JavaScript', 'anarcho-notepad'); ?></td>
        <td>&#9733;</td>
        </tr>
        <tr>
        <td class="justify"><?php _e('Change the site Title and Slogan Colors', 'anarcho-notepad'); ?></td>
        <td>&#9733;</td>
        </tr>
        <tr>
        <td class="justify"><?php _e('Upload Your Own Background Image', 'anarcho-notepad'); ?></td>
        <td>&#9733;</td>
        </tr>
        <tr>
        <td class="justify"><?php _e('Easy Selection of Fonts from Font Library "Googl Fonts".', 'anarcho-notepad'); ?></td>
        <td>&#9733;</td>
        </tr>
        <tr>
        <td class="justify"><?php _e('Automatically Scaling the Width Properties of Images, Video etc (Fluid Images etc.).', 'anarcho-notepad'); ?></td>
        <td>&#9733;</td>
        </tr>
        <tr>
        <td class="justify"><?php _e('Use Conditional Units of Measurements.', 'anarcho-notepad'); ?></td>
        <td>&#9733;</td>
        </tr>
        <td class="justify"><?php _e('CSS3 Font Flags.', 'anarcho-notepad'); ?></td>
        <td>&#9733;</td>
        </tr>
        <tr>
        <td class="justify"><?php _e('HTML5 Semantic Markup.', 'anarcho-notepad'); ?></td>
        <td>&#9733;</td>
        </tr>
        <tr>
        <td class="justify"><?php _e('RTL Styles for Hebrew or Arabic.', 'anarcho-notepad'); ?></td>
        <td>&#9733;</td>
        </tr>
        <td class="justify"><?php _e('Prepared to Translate to Other Languages.', 'anarcho-notepad'); ?></td>
        <td>&#9733;</td>
        </tr>
        <tr>
        <td class="justify"><?php _e('Box "About the author" Below', 'anarcho-notepad'); ?></td>
        <td>&#9733;</td>
        </tr>
        <tr>
        <td class="justify"><?php _e('Your Copyright Box Under Each Post.', 'anarcho-notepad'); ?></td>
        <td>&#9733;</td>
        </tr>

        </tbody>
	</table>

	<p>
	<b><em><?php _e('The theme is in the process of translation into other languages of the world. If you have the desire then you can help me in translation to your native language.', 'anarcho-notepad'); ?></em></b>
	</p>

	</br>
	<p>
	<?php _e('If you have any questions or suggestions for improving and adding new features, feel free to contact me at support at:', 'anarcho-notepad'); ?>
	</br>
	<a href="http://wordpress.org/support/theme/anarcho-notepad">http://wordpress.org/support/theme/anarcho-notepad</a>

	</br></br>
	<?php _e('If you liked the theme "Anarcho Notepad", then I\'ll be glad if you would appreciate "Anarcho Notepad" or leave feedback on the site wordpress.org:', 'anarcho-notepad'); ?>
	</br>
	<a href="http://wordpress.org/support/view/theme-reviews/anarcho-notepad" target="_blank">http://wordpress.org/support/view/theme-reviews/anarcho-notepad</a>

	<br/><br/>
	<?php _e('You can thank me by making a donation by using PayPal or Yandex:', 'anarcho-notepad'); ?>
	<br/>
	<div style="float:left;">
	<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
	<input type="hidden" name="cmd" value="_s-xclick">
	<input type="hidden" name="hosted_button_id" value="QC3JBY36ES4QJ">
	<input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_donateCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
	<img alt="" border="0" src="https://www.paypalobjects.com/ru_RU/i/scr/pixel.gif" width="1" height="1">
	</form>
	</div></br>
	<iframe frameborder="0" allowtransparency="true" scrolling="no" src="https://money.yandex.ru/embed/small.xml?uid=410011922986618&amp;button-text=06&amp;button-size=m&amp;button-color=white&amp;targets=%D0%9F%D0%BE%D0%B4%D0%B4%D0%B5%D1%80%D0%B6%D0%BA%D0%B0&amp;default-sum=100" width="auto" height="42"></iframe>

	</br></br>
	<?php _e('Also you can follow me at social networks to follow the news about "Anarcho Notepad".', 'anarcho-notepad'); ?>
	</p>

	<p style="font-family:FontAwesome;">&#xf099; : <a href="https://twitter.com/AGareginyan" target="_blank">https://twitter.com/AGareginyan</a></p>

	<p style="font-family:FontAwesome;">&#xf09a; : <a href="https://www.facebook.com/arthur.gareginyan" target="_blank">https://www.facebook.com/arthur.gareginyan</a></p>

	<p style="font-family:FontAwesome;">&#xf0d5; : <a href="https://plus.google.com/+ArthurGareginyan" target="_blank">https://plus.google.com/+ArthurGareginyan</a></p>
	</br>


      <h4><?php _e('Versions change log', 'anarcho-notepad');?></h4>

	<p>
      <h5>2.4 (2014.1.19)</h5>
	* added : a lot more options for customization.<br/>
	* added : ability to turn off unnecessary elements.<br/>
	* added : template page without date.<br/>
	* fixed : position of the title.<br/>
	* fixed : the method of output of the title of the posts.<br/>
	* fixed : stretch of the background images.<br/>
	* fixed : many more minor fixes and changes.<br/>
	</p>

	<p>
      <h5>2.3 (2014.1.9)</h5>
	* added : support for php versions below 5.3<br/>
	* fixed : many more minor fixes and changes.<br/>
	</p>

	<p>
      <h5>2.2 (2014.1.5)</h5>
	* added : more widget areas<br/>
	</p>

	<p>
      <h5>2.1 (2013.10.22)</h5>
	* added : russian translation.<br/>
	* added : (css) rtl styles for hebrew or arabic.<br/>
	* added : (css) comment navigation styling, similar to post navigation<br/>
	* added : (php) (css) author box styling (if bio field not empty)<br/>
	* added : (js) smooth transition for "back to top" link.<br/>
	* added : (css) font-icons to title of archive, search, 404<br/>
	* fixed : many more minor fixes and changes.<br/>
	</p>

      </div><!--<div class="content">-->

      <aside id="sidebar">
            <div class="donate">
              <h3><?php _e('Donate', 'anarcho-notepad');?></h3>
              <p><?php _e('You can thank me by making a donation', 'anarcho-notepad');?><br><br>
                <a href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=2EBT6E8BQ5RRQ" target="_blank" rel="nofollow"><img class="tc-donate" src="https://www.paypal.com/en_US/i/btn/btn_donate_LG.gif" alt="Make a donation for Anarcho-Notepad"></a>
              </p>
            </div><!--<div class="donate">-->

            <div class="site-link">
              <h3><?php _e('Happy to enjoy the Anarcho-Notepad?', 'anarcho-notepad');?></h3>
              <p><?php _e('If you are content this template, tell about it at wordpress.org!', 'anarcho-notepad');?><br>
              <a class="button-primary review-customizr" title="Visit the site of theme" href="http://wordpress.org/support/view/theme-reviews/anarcho-notepad" target="_blank"><?php _e('Leave a comment', 'anarcho-notepad');?></a></p>
            </div><!--<div class="site-link">-->

            <div class="follow">
              <h3><?php _e('Follow me in Twitter', 'anarcho-notepad');?></h3>
              <p><a href="https://twitter.com/AGareginyan" class="twitter-follow-button" data-show-count="false" data-size="large">Follow @AGareginyan</a>
              <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
              </p>
            </div><!--<div class="last-feature">-->
      </aside><!--<aside id="sidebar">-->

      <br clear="all">

    </section><!--<section id="page">-->
    <footer id="footer"></footer><!--<footer id="finishing">-->

    </div><!--<div class="cover">-->

<?php }
add_action('admin_menu', 'anarcho_theme_options_add_page');

// Link to the page about theme in dashboard
function anarcho_theme_options_add_page() {
	add_theme_page('Theme Info', 'Theme Info', 'edit_theme_options', 'theme_options', 'anarcho_theme_options_do_page');}