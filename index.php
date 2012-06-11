<?php
   /**
    * The template for displaying the index page.
    *
    * @author Aurelio De Rosa <aurelioderosa@gmail.com>
    * @version 1.0.1
    * @link http://wordpress.org/extend/themes/annarita
    * @package AurelioDeRosa
    * @subpackage Annarita
    * @since Annarita 1.0
    * @license http://www.gnu.org/licenses/gpl-3.0.html GNU General Public License version 3
    */
   get_header();
   get_sidebar();
?>
<div id="content" class="alignleft">
   <?php
   if (!have_posts())
   {
      ?>
      <h2><?php _e('Nothing there', 'annarita'); ?></h2>
      <p><?php _e('I am sorry. There are not posts yet.', 'annarita'); ?></p>
      <?php
   }
   else
   {
      while (have_posts())
      {
         the_post();
         ?>
         <article <?php post_class(); ?>>
            <header>
               <h2 class="post-title">
                  <a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title_attribute(array('before' => __('Permalink to: ', 'annarita'))); ?>">
                     <?php the_title(); ?>
                  </a>
               </h2>
            </header>
            <footer>
               <small class="post-author">
                  <?php _e('Post written by', 'annarita'); ?> <?php the_author_posts_link(); ?> <?php _e('at', 'annarita'); ?>
                  <a href="<?php echo get_day_link(get_the_time('Y'), get_the_time('m'), get_the_time('d')); ?>"
                     title="<?php printf(__('Posts of the %s', 'annarita'), date_i18n(get_option('date_format'), get_the_time('U')));?> ">
                     <time datetime="<?php echo get_the_time('c'); ?>" pubdate="pubdate">
                        <?php echo date_i18n(get_option('date_format') . ' ' . get_option('time_format'), get_the_time('U')); ?>
                     </time>
                  </a>
               </small>
               <p class="post-category"><b><?php (count(get_the_category()) > 1) ? _e('Categories', 'annarita') : _e('Category', 'annarita'); ?></b>: <?php the_category(', '); ?></p>
               <p class="post-tags"><?php the_tags('<b>' . __('Tags', 'annarita') . '</b>: '); ?> </p>
               <?php
                  edit_post_link(__('Edit', 'annarita'), '', ' | ');
                  comments_popup_link(__('No Comments', 'annarita') . ' &raquo;', __('1 Comment', 'annarita') . ' &raquo;', __('% Comments', 'annarita') . ' &raquo;');
               ?>
            </footer>
            <?php
               if (has_post_thumbnail())
               {
                  ?>
                  <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" ><?php the_post_thumbnail('medium'); ?></a>
                  <?php
               }
               the_content(__('Read more', 'annarita') . '...');
            ?>
         </article>
         <?php
      }
      ?>
      <nav class="navigation">
         <div id="navigation-next" class="alignleft"><?php next_posts_link(__('&laquo; Older posts', 'annarita')); ?></div>
         <div id="navigation-previous" class="alignright"><?php previous_posts_link(__('Newer posts &raquo;', 'annarita')); ?></div>
         <br class="clear-both" />
      </nav>
      <?php
   }
   ?>
</div>
<?php
   get_template_part('sidebar-right');
   get_footer();
?>