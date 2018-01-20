<?php
//comment
if ( ! function_exists( 'comment' ) ) :
function hjyl_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	global $commentcount;
	if(!$commentcount) { 
		$page = ( get_query_var('cpage') ) ? get_query_var('cpage') : get_page_of_comment( $comment->comment_ID, $args );
		$cpp=get_option('comments_per_page');
		$commentcount = $cpp * ($page - 1);
	}
	switch ( $comment->comment_type ) :
		case '' :
	?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
		<span class="floor">
			<?php printf('#%1$s', ++$commentcount); ?>
		</span>
		<div id="comment-<?php comment_ID(); ?>" class="comment">
		<div class="comment-author vcard">
			<?php $default= ''; echo get_avatar( $comment, 32, $default, $comment->comment_author ); ?>
			<div class="comment_meta">
				<h3><?php printf( __( '%s ', 'bb10'), sprintf( '<cite class="fn">%s</cite>', get_comment_author_link() ) ); ?></h3>
				<a class="comment_time" href="#comment-<?php comment_ID() ?>"><?php printf( __( '<cite id="commentmeta">%1$s</cite>', 'bb10'), comment_date('Y/m/d  '),  comment_time() ); ?></a>
			<span class="reply">
				<?php if ($depth == get_option('thread_comments_depth')) : ?>
					 <a onclick="return addComment.moveForm( 'comment-<?php comment_ID() ?>','<?php echo $comment->comment_parent; ?>', 'respond','<?php echo $comment->comment_post_ID; ?>' )" href="?replytocom=<?php comment_ID() ?>#respond" class="comment-reply-link" rel="nofollow">-@</a>
				 <?php else: ?>
					 <a onclick="return addComment.moveForm( 'comment-<?php comment_ID() ?>','<?php comment_ID() ?>', 'respond','<?php echo $comment->comment_post_ID; ?>' ) " href="?replytocom=<?php comment_ID() ?>#respond" class="comment-reply-link" rel="nofollow">-@</a>
				 <?php endif; ?>
			</span><!-- .reply -->
			</div>
		</div><!-- .comment-author .vcard -->
			<div class="comment-body"><?php comment_text(); ?></div>


		</div><!-- #comment-##  -->

<?php break;endswitch;}endif;
//pingback and trackback
function hjyl_pings($comment, $args, $depth) {
    $GLOBALS['comment'] = $comment;
    if('pingback' == get_comment_type()) $pingtype = 'Pingback';
    else $pingtype = 'Trackback';
?>
    <li id="comment-<?php echo $comment->comment_ID ?>">
        [<?php echo $pingtype; ?>] <?php comment_author_link(); ?>
		<span class="ping_time"><?php echo mysql2date('Y.m.d', $comment->comment_date); ?></span>
<?php }

add_action('init', 'hjyl_ajax_comment');
function hjyl_ajax_comment(){
/**
 * WordPress jQuery-Ajax-Comments
 */
	if(!empty($_POST['action']) && $_POST['action'] == 'ajax_comment' && 'POST' == $_SERVER['REQUEST_METHOD']){
		global $wpdb;
		nocache_headers();
		$comment_post_ID = isset($_POST['comment_post_ID']) ? (int) $_POST['comment_post_ID'] : 0;

		$post = get_post($comment_post_ID);

		if ( empty($post->comment_status) ) {
			do_action('comment_id_not_found', $comment_post_ID);
			hjyl_ajax_comment_err(__('Invalid comment status.', 'bb10')); 
		}

		// get_post_status() will get the parent status for attachments.
		$status = get_post_status($post);

		$status_obj = get_post_status_object($status);

		if ( !comments_open($comment_post_ID) ) {
			do_action('comment_closed', $comment_post_ID);
			hjyl_ajax_comment_err(__('Sorry, comments are closed for this item.', 'bb10')); 
		} elseif ( 'trash' == $status ) {
			do_action('comment_on_trash', $comment_post_ID);
			hjyl_ajax_comment_err(__('Invalid comment status.', 'bb10')); 
		} elseif ( !$status_obj->public && !$status_obj->private ) {
			do_action('comment_on_draft', $comment_post_ID);
			hjyl_ajax_comment_err(__('Invalid comment status.', 'bb10')); 
		} elseif ( post_password_required($comment_post_ID) ) {
			do_action('comment_on_password_protected', $comment_post_ID);
			hjyl_ajax_comment_err(__('Password Protected', 'bb10')); 
		} else {
			do_action('pre_comment_on_post', $comment_post_ID);
		}

		$comment_author       = ( isset($_POST['author']) )  ? trim(strip_tags($_POST['author'])) : null;
		$comment_author_email = ( isset($_POST['email']) )   ? trim($_POST['email']) : null;
		$comment_author_url   = ( isset($_POST['url']) )     ? trim($_POST['url']) : null;
		$comment_content      = ( isset($_POST['comment']) ) ? trim($_POST['comment']) : null;
		$edit_id              = ( isset($_POST['edit_id']) ) ? $_POST['edit_id'] : null; // edit_id

		// If the user is logged in
		$user = wp_get_current_user();
		if ( $user->exists() ) {
			if ( empty( $user->display_name ) )
				$user->display_name=$user->user_login;
			$comment_author       = esc_sql($user->display_name);
			$comment_author_email = esc_sql($user->user_email);
			$comment_author_url   = esc_sql($user->user_url);
			if ( current_user_can('unfiltered_html') ) {
				if ( wp_create_nonce('unfiltered-html-comment_' . $comment_post_ID) != $_POST['_wp_unfiltered_html_comment'] ) {
					kses_remove_filters(); // start with a clean slate
					kses_init_filters(); // set up the filters
				}
			}
		} else {
			if ( get_option('comment_registration') || 'private' == $status )
				hjyl_ajax_comment_err(__('Sorry, you must be logged in to post a comment.', 'bb10'));
		}

		$comment_type = '';

		if ( get_option('require_name_email') && !$user->exists() ) {
			if ( 6 > strlen($comment_author_email) || '' == $comment_author )
				hjyl_ajax_comment_err( __('Error: please fill the required fields (name, email).', 'bb10') );
			elseif ( !is_email($comment_author_email))
				hjyl_ajax_comment_err( __('Error: please enter a valid email address.','bb10' ) );
		}

		if ( '' == $comment_content )
			hjyl_ajax_comment_err( __('Error: please type a comment.', 'bb10') );


		// ADD: whether comment more 
		$dupe = "SELECT comment_ID FROM $wpdb->comments WHERE comment_post_ID = '$comment_post_ID' AND ( comment_author = '$comment_author' ";
		if ( $comment_author_email ) $dupe .= "OR comment_author_email = '$comment_author_email' ";
		$dupe .= ") AND comment_content = '$comment_content' LIMIT 1";
		if ( $wpdb->get_var($dupe) ) {
			hjyl_ajax_comment_err(__('Duplicate comment detected; it looks as though you&#8217;ve already said that!', 'bb10'));
		}

		// ADD: whether comment too fast
		if ( $lasttime = $wpdb->get_var( $wpdb->prepare("SELECT comment_date_gmt FROM $wpdb->comments WHERE comment_author = %s ORDER BY comment_date DESC LIMIT 1", $comment_author) ) ) { 
		$time_lastcomment = mysql2date('U', $lasttime, false);
		$time_newcomment  = mysql2date('U', current_time('mysql', 1), false);
		$flood_die = apply_filters('comment_flood_filter', false, $time_lastcomment, $time_newcomment);
		if ( $flood_die ) {
			hjyl_ajax_comment_err(__('You are posting comments too quickly.  Slow down.', 'bb10'));
			}
		}

		$comment_parent = isset($_POST['comment_parent']) ? absint($_POST['comment_parent']) : 0;

		$commentdata = compact('comment_post_ID', 'comment_author', 'comment_author_email', 'comment_author_url', 'comment_content', 'comment_type', 'comment_parent', 'user_ID');

		// ADD: whether edit comment or add comment
		if ( $edit_id ){
			$comment_id = $commentdata['comment_ID'] = $edit_id;
			wp_update_comment( $commentdata );
		} else {
			$comment_id = wp_new_comment( $commentdata );
		}

		$comment = get_comment($comment_id);
		do_action('set_comment_cookies', $comment, $user);

		$comment_depth = 1;   //for comment class
		$tmp_c = $comment;
		while($tmp_c->comment_parent != 0){
			$comment_depth++;
			$tmp_c = get_comment($tmp_c->comment_parent);
		}
		
		//it is very important here. for output
		$GLOBALS['comment'] = $comment;
		
		//comment theme
		?>
			<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
				<div id="comment-<?php comment_ID(); ?>"  class="comment">
					<?php if ( $comment->comment_approved == '0' ) : ?>
						<em><?php _e( 'Your comment is awaiting moderation.', 'bb10' ); ?></em><br />
					<?php endif; ?>
					<div class="comment-author vcard">
						<?php echo get_avatar( $comment,$size='32'); ?>
					<div class="comment-meta">
						<h3><?php printf( __( '%s ', 'bb10'), sprintf( '<cite class="fn">%s</cite>', get_comment_author_link() ) ); ?></h3>
						<a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>"><?php printf( __( '%1$s at %2$s', 'bb10' ), get_comment_date(),  get_comment_time() ); ?></a><?php edit_comment_link( __( '(Edit)', 'bb10' ), ' ' ); ?>
					</div>
					</div>
					<div class="comment-body"><?php comment_text(); ?></div>
				</div>

		<?php die(); //comment theme
	}else{return;}
}

// ADD: for error
function hjyl_ajax_comment_err($a) { 
    header('HTTP/1.0 500 Internal Server Error');
	header('Content-Type: text/plain;charset=UTF-8');
    echo $a;
    exit;
}

?>