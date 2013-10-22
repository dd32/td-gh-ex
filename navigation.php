<?php
/**
 * The template for displaying navigation.
 *
 * @package	Anarcho Notepad
 * @since	2.1
 * @author	Arthur Gareginyan aka Brute9000 <arthurgareginyan@gmail.com>
 * @copyright 	Copyright (c) 2013, Arthur Gareginyan
 * @link      	http://mycyberuniverse.tk/anarcho-notepad.html
 * @license   	http://opensource.org/licenses/AGPL-3.0
 */
?>

<ul id="menu">
  <li id="home"><a href="/">Home</a></li>
  <li id="about"><a href="/?page_id=2">About</a></li>
  <li id="archives"><a href="/?page_id=3">Archives</a></li>
</ul>

<?php if (  $wp_query->max_num_pages > -1 ) { ?>

    <div class="navigation clearfix">
 <?php
            if(function_exists('anarcho_page_nav')) {
                anarcho_page_nav();
            } else {
        ?><div class="alignleft"><?php next_posts_link( __( '<span>&laquo;</span> Older posts', 'anarcho-notepad' ) );?></div>
        <div class="alignright"><?php previous_posts_link( __( 'Newer posts <span>&raquo;</span>', 'anarcho-notepad' ) );?></div><?php
        } ?>        
    </div><!-- .navigation -->
    
<?php } ?>