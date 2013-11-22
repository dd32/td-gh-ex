<?php
/**
 * The sidebar containing the secondary widget area, displays on posts and pages.
 *
 * @package	Anarcho Notepad
 * @since	2.1.4
 * @author	Arthur (Berserkr) Gareginyan <arthurgareginyan@gmail.com>
 * @copyright 	Copyright (c) 2013, Arthur Gareginyan
 * @link      	http://mycyberuniverse.tk/anarcho-notepad.html
 * @license   	http://www.gnu.org/licenses/gpl-3.0.html
 */
?>

<aside id="sidebar" role="complementary">

<!--PAGES (MENU)-->
<nav class="pages">
    <?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
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
    <?php $query = new WP_Query( array( 'posts_per_page' => '9' ) ); ?>
    <?php while ($query->have_posts()): $query->the_post(); ?>
    <ul>
       <li>
          <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
       </li>
    </ul>
    <?php endwhile; ?>
 </nav>
<div class="recent-posts-bottom"></div>
<!--END-RECENT POSTS-->

<?php dynamic_sidebar(); ?>

</aside><br clear="all" />