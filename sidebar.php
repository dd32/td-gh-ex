<?php
/**
 * The sidebar containing the secondary widget area, displays on posts and pages.
 *
 * @package	Anarcho Notepad
 * @since	2.1
 * @author	Arthur Gareginyan aka Brute9000 <arthurgareginyan@gmail.com>
 * @copyright 	Copyright (c) 2013, Arthur Gareginyan
 * @link      	http://mycyberuniverse.tk/anarcho-notepad.html
 * @license   	http://opensource.org/licenses/AGPL-3.0
 */
?>

<aside id="sidebar" role="complementary">

<!--PAGES (MENU)-->
<nav class="pages">
    <?php wp_nav_menu( array( 'theme_location' => 'anarcho-menu' ) ); ?>
</nav>
<div class="pages-bottom"></div>
<!--END-PAGES (MENU)-->

<!--ABOUT BOX-->
<div class="about-box">
  <p>
    <?php if(get_locale() == 'ru_RU') { ?>
    <?php echo get_theme_mod('about_box_ru'); ?>
    <?php } else { ?>
    <?php echo get_theme_mod('about_box_eng'); ?>
    <?php } ?>
  </p>
</div>
<!--END-ABOUT BOX-->

<!--LINKS-->
<div class="links">
  <p>
    <ul>
	<?php wp_list_bookmarks('categorize=0&title_li='); ?>
    </ul>
  </p>
</div>
<!--END-LINKS-->

<!--RECENT POSTS-->
<div class="recent-posts-upper"></div>
<nav class="recent-posts">
    <?php query_posts('showposts=10'); ?>
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    <ul>
      <li><a href="<?php the_permalink() ?>">
        <?php the_title() ?>
        <br />
      </a></li>
    </ul>
    <?php endwhile; endif; ?>
</nav>
<div class="recent-posts-bottom"></div>
<!--END-RECENT POSTS-->

<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar() ) : ?>
<?php endif; ?>

</aside><br clear="all" />
