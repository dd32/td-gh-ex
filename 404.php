<?php
   /**
    * The template for displaying 404 pages (Not Found).
    *
    * @author Aurelio De Rosa <aurelioderosa@gmail.com>
    * @version 1.0.4
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
   <h2><?php _e('Page not found', 'annarita'); ?></h2>
   <p>
      <?php
         echo nl2br(__("What a shame! The page you were looking for isn&apos;t available anymore. Oh, wait! Could this be your typo?\n\n", 'annarita'));
         echo nl2br(__("Anyway...feel free to continue navigating into our website or try searching some cool stuff.", 'annarita'));
      ?>
   </p>

   <h3><?php _e('Search in our website', 'annarita'); ?></h3>
   <form role="search" action="<?php echo home_url(); ?>" method="get" >
      <input type="search" name="s" id="search-query" placeholder="<?php echo __('Search', 'annarita') . '...'; ?>" accesskey="s"/>
      <input type="submit" value="<?php _e('Search', 'annarita'); ?>" />
   </form>

   <?php
      $posts = get_posts();
      if (count($posts) > 0)
      {
         ?>
         <nav>
            <h3><?php _e('Most recent posts', 'annarita') ?></h3>
            <ul class="recent-posts">
            <?php
               foreach ($posts as $post)
               {
                  setup_postdata($post);
                  ?>
                  <li>
                     <h4>
                        <a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title_attribute(array('before' => __('Permalink to: ', 'annarita'))); ?>">
                           <?php the_title(); ?>
                        </a>
                     </h4>
                  </li>
                  <?php
               }
               wp_reset_postdata();
            ?>
            </ul>
         </nav>
         <?php
      }

      $posts = get_posts('orderby=comment_count&posts_per_page=5');
      if (count($posts) > 0)
      {
         ?>
         <nav>
            <h3><?php _e('Most commented posts', 'annarita') ?></h3>
            <ul class="most-commented-posts">
            <?php
            foreach ($posts as $post)
            {
               setup_postdata($post);
               ?>
               <li>
                  <h4>
                     <a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title_attribute(array('before' => __('Permalink to: ', 'annarita'))); ?>">
                        <?php the_title(); ?>
                     </a>
                  </h4>
               </li>
               <?php
            }
            wp_reset_postdata();
            ?>
            </ul>
         </nav>
         <?php
      }
   ?>
</div>
<?php
   get_template_part('sidebar-right');
   get_footer();
?>