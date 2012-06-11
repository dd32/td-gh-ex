<?php
   /**
    * The template for displaying a single annarita review. This is a
    * custom post type created to give a better formatting for reviews.
    * Moreover the theme uses microformats to give more information to the
    * search engines.
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
   <?php the_post(); ?>
   <article <?php post_class(); ?>>
      <header class="item">
         <h2 class="post-title entry-title fn"><?php the_title(); ?></h2>
      </header>
      <footer>
         <small class="post-author vcard">
            <?php _e('Review written by', 'annarita'); ?>
            <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>" class="url" rel="author">
               <span class="reviewer fn">
                  <?php the_author_meta('display_name'); ?>
               </span>
            </a>
            <?php _e('at', 'annarita'); ?>
            <a href="<?php echo get_day_link(get_the_time('Y'), get_the_time('m'), get_the_time('d')); ?>"
               title="<?php printf(__('Posts of the %s', 'annarita'), date_i18n(get_option('date_format'), get_the_time('U')));?> ">
               <time datetime="<?php echo get_the_time('c'); ?>" pubdate="pubdate" class="dtreviewed">
                  <?php echo date_i18n(get_option('date_format') . ' ' . get_option('time_format'), get_the_time('U')); ?>
                  <span class="value-title hidden updated" title="<?php the_time('Y-m-d'); ?>">
                     <?php the_time('Y-m-d'); ?>
                  </span>
               </time>
            </a>
         </small>
         <?php
            $type = get_post_meta(get_the_ID(), 'annarita_review_type', true);
            if (!empty($type))
               echo '<span class="type hidden">' . $type . '</span>';

            if (has_excerpt())
               echo '<p class="summary">' . get_the_excerpt() . '</p>';

            $rate = get_post_meta(get_the_ID(), 'annarita_review_rate', true);
            if (!empty($rate))
            {
               ?>
               <ul class="star-rating" title="<?php echo $rate; ?>/5">
                  <li class="current-rating">
                     <abbr title="<?php echo $rate; ?>" class="rating"><?php echo $rate; ?></abbr>
                  </li>
                  <li><a href="javascript:void();" class="one-star">1</a></li>
                  <li><a href="javascript:void();" class="two-stars">2</a></li>
                  <li><a href="javascript:void();" class="three-stars">3</a></li>
                  <li><a href="javascript:void();" class="four-stars">4</a></li>
                  <li><a href="javascript:void();" class="five-stars">5</a></li>
               </ul>
               <?php
            }
         ?>
         <p class="post-category"><b><?php (count(get_the_category()) > 1) ? _e('Categories', 'annarita') : _e('Category', 'annarita'); ?></b>: <?php the_category(', '); ?></p>
         <p class="post-tags"><?php the_tags('<b>' . __('Tags', 'annarita') . '</b>: '); ?> </p>
         <?php
            edit_post_link(__('Edit', 'annarita'), '', ' | ');
            comments_popup_link(__('No Comments', 'annarita') . ' &raquo;', __('1 Comment', 'annarita') . ' &raquo;', __('% Comments', 'annarita') . ' &raquo;');
         ?>
      </footer>
      <hr class="separator" />
      <?php
         if (has_post_thumbnail())
         {
            ?>
            <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" ><?php the_post_thumbnail('medium'); ?></a>
            <?php
         }
      ?>
      <span class="description">
         <?php the_content(); ?>
      </span>
      <div class="pagination">
         <?php wp_link_pages(); ?>
      </div>
   </article>
   <nav class="navigation">
      <div id="navigation-next" class="alignleft"><?php next_post_link(); ?></div>
      <div id="navigation-previous" class="alignright"><?php previous_post_link(); ?></div>
      <br class="clear-both" />
   </nav>
   <?php comments_template(); ?>
</div>
<?php
   get_template_part('sidebar-right');
   get_footer();
?>