<?php
   /**
    * The template for displaying a single page.
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
         <h2 class="post-title">
            <a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title_attribute(array('before' => __('Permalink to: ', 'annarita'))); ?>">
               <?php the_title(); ?>
            </a>
         </h2>
      </header>
      <?php
         if (has_post_thumbnail())
         {
            ?>
            <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_post_thumbnail('medium'); ?></a>
            <?php
         }

         the_content();

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
      <footer class="clear-both">
         <?php
            edit_post_link(__('Edit', 'annarita'), '', ' | ');
            comments_popup_link(__('No Comments', 'annarita') . ' &raquo;', __('1 Comment', 'annarita') . ' &raquo;', __('% Comments', 'annarita') . ' &raquo;');
         ?>
      </footer>
   </article>
   <?php comments_template(); ?>

   <nav class="navigation">
      <div id="navigation-next" class="alignleft"><?php next_posts_link('&laquo; Older posts', 'annarita') ?></div>
      <div id="navigation-previous" class="alignright"><?php previous_posts_link('Newer posts &raquo;', 'annarita') ?></div>
      <br class="clear-both" />
   </nav>
</div>
<?php
   get_template_part('sidebar-right');
   get_footer();
?>