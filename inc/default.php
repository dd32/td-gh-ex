<?php
/**
 * astrology Theme Default Functions.
 * @package astrology
 */
function AstrologyComment($comment, $args, $depth) {
   $GLOBALS['comment'] = $comment; ?>
   <div class="comment-info">
      <div class="comment-info-left">
         <img src="<?php echo get_avatar_url($comment); ?>">
      </div>
      <div class="comment-info-right">
      		<?php echo get_comment_author_link(); ?>
      		<!-- Reply -->   
      		<?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))); ?>
      		<span><?php echo get_comment_date(get_option( 'date_format' )); ?></span>
      		<?php if ($comment->comment_approved == '0') : ?>
         		<em><?php _e('Your comment is awaiting moderation.', 'astrology'); ?></em>
     		  <?php endif; ?>
      		<?php comment_text(); ?>
     </div>
 	</div>
  <div class="navigation">
      <?php paginate_comments_links(); ?> 
  </div>
<?php
}

function MoveCommentFieldToBottom( $fields ) {
	$commentField = $fields['comment'];
	unset( $fields['comment'] );
	$fields['comment'] = $commentField;
	return $fields;
}
add_filter( 'comment_form_fields', 'MoveCommentFieldToBottom' );

function get_breadcrumb() {
    echo '<a href="'.home_url().'" rel="nofollow">Home</a>';
    if (is_category() || is_single()) {
        echo "&nbsp;&nbsp;&#47;&nbsp;&nbsp;";
        the_category(' &bull; ');
            if (is_single()) {
                echo " &nbsp;&nbsp;&#47;&nbsp;&nbsp; ";
                the_title();
            }
    } elseif (is_page()) {
        echo "&nbsp;&nbsp;&#47;&nbsp;&nbsp;";
        echo "<a href='".get_the_permalink()."'>".get_the_title()."</a>";
    } elseif (is_search()) {
        echo "&nbsp;&nbsp;&#47;&nbsp;&nbsp;Search Results for... ";
        echo '"<em>';
        echo the_search_query();
        echo '</em>"';
    }
}