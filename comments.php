<?php
   /**
    * The template for displaying the comments.
    *
    * @author Aurelio De Rosa <aurelioderosa@gmail.com>
    * @version 1.0.5
    * @link http://wordpress.org/extend/themes/annarita
    * @package AurelioDeRosa
    * @subpackage Annarita
    * @since Annarita 1.0
    * @license http://www.gnu.org/licenses/gpl-3.0.html GNU General Public License version 3
    */
   if (post_password_required())
   {
      ?>
      <div id="comments">
         <p class="nopassword">
            <?php _e( 'This post is protected by a password. Please, enter the password to view the comments.', 'annarita' ); ?>
         </p>
      </div>
      <?php
      return;
   }

   comment_form();
?>

<?php
   if ( count(get_comments(array('type' => 'pings', 'post_id' => get_the_ID()))) > 0 )
   {
?>
   <section>
      <h3><?php _e('Trackbacks', 'annarita'); ?></h3>
      <ul id="pings" class="pings-list">
         <?php
            wp_list_comments(array(
               'callback' => 'annarita_ping_template',
               'type' => 'pings'
            ));
         ?>
      </ul>
   </section>
<?php
   }
?>

<?php
   if ( count(get_comments(array('type' => 'comment', 'post_id' => get_the_ID()))) > 0 )
   {
?>
   <section>
      <h3><?php _e('Comments', 'annarita'); ?></h3>
      <?php
         if (! have_comments())
            echo _e('I am sorry but there are no comment yet.', 'annarita');
         else
         {
         ?>
            <div id="comments" class="comment-list">
               <?php
                  wp_list_comments(array(
                     'callback' => 'annarita_comment_template',
                     'type' => 'comment'
                  ));
               ?>
               <div class="pagination">
                  <?php paginate_comments_links(); ?>
               </div>
            </div>
         <?php
         }
      ?>
   </section>
<?php
   }
?>