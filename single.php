<?php
   /**
    * The template for displaying a single post.
    *
    * @author Aurelio De Rosa <aurelioderosa@gmail.com>
    * @version 1.1.0
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
   <?php the_post(); ?>
   <article <?php post_class(); ?> role="main">
      <header>
         <h2 class="post-title"><?php the_title(); ?></h2>
      </header>
      <footer>
         <small class="post-author">
            <?php _e('Post written by', 'annarita'); ?> <?php the_author_posts_link(); ?> <?php _e('at', 'annarita'); ?>
            <a href="<?php echo get_day_link(get_the_time('Y'), get_the_time('m'), get_the_time('d')); ?>"
               title="<?php printf(__('Posts of the %s', 'annarita'), date_i18n(get_option('date_format'), get_the_time('U')));?>">
               <time datetime="<?php echo get_the_time('c'); ?>">
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
      <hr class="separator" />
      <?php
      if (has_excerpt())
      {
         ?>
         <details open="open">
            <summary><?php _e('Summary', 'annarita'); ?></summary>
            <p><?php the_excerpt(); ?></p>
         </details>
         <hr class="separator" />
         <?php
      }

      if (has_post_thumbnail())
      {
         ?>
         <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_post_thumbnail('medium'); ?></a>
         <?php
      }

      the_content();
      ?>
         <div class="pagination clear-both">
            <?php
               wp_link_pages();
               if (wp_attachment_is_image(get_the_ID()))
               {
               ?>
                  <div id="navigation-previous" class="alignleft"><?php previous_image_link(0); ?></div>
                  <div id="navigation-next" class="alignright"><?php next_image_link(0); ?></div>
                  <br class="clear-both" />
               <?php
               }
            ?>
         </div>
      <?php
         $meta = annarita_get_real_meta(get_post_custom());
         $options = get_option('annarita_options');
         if (count($meta) > 0 && (!isset($options['extra_data']) || $options['extra_data'] == 'false'))
         {
            ?>
            <hr class="separator" />
            <h3 class="post-meta-title"><?php _e('Extra data', 'annarita'); ?></h3>
            <dl class="post-meta-container">
               <?php
                  foreach($meta as $key => $value)
                  {
                     ?>
                     <dt class="property"><?php echo $key; ?>:</dt>
                     <dd class="value"><?php echo implode($value, ', '); ?></dd>
                     <?php
                  }
               ?>
            </dl>
            <br class="clear-both" />
         <?php
         }
      ?>
   </article>
   <nav class="navigation">
      <div id="navigation-next" class="alignleft"><?php next_post_link(); ?></div>
      <div id="navigation-previous" class="alignright"><?php previous_post_link(); ?></div>
      <br class="clear-both" />
   </nav>
   <?php
      if (isset($options['related_posts']) && $options['related_posts'] == 'true')
      {
         $posts = annarita_get_related_posts(get_the_ID());
         if (count($posts) > 0)
         {
            ?>
            <h3><?php _e('Related posts', 'annarita'); ?></h3>
            <ul class="related-posts">
               <?php
                  foreach($posts as $post)
                  {
                     setup_postdata($post);
                     ?>
                     <li>
                        <a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title_attribute(array('before' => __('Permalink to: ', 'annarita'))); ?>">
                           <?php the_title(); ?>
                        </a>
                     </li>
                     <?php
                  }
               ?>
            </ul>
            <?php
            wp_reset_postdata();
         }
      }
      comments_template();
   ?>
</div>
<?php
   get_template_part('sidebar-right');
   get_footer();
?>