<?php

if ( function_exists('register_sidebar') )
register_sidebar(array('name'=>'sidebar',
'before_widget' => '<li class="widget">',
'after_widget' => '</li>',
'before_title' => '<h2>',
'after_title' => '</h2>',
));
register_sidebar(array('name'=>'bottom',
'before_widget' => '<li class="widget">',
'after_widget' => '</li>',
'before_title' => '<h2>',
'after_title' => '</h2>',
));


/* loads legacy.comments.php as comment file when using a Wordpress version pre-2.7 */
add_filter( 'comments_template', 'legacy_comments' );
function legacy_comments( $file ) {
	if ( !function_exists('wp_list_comments') )
		$file = TEMPLATEPATH . '/legacy.comments.php';
	return $file;
}


/* 
+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
Plugin Name: WP-PageNavi 
Plugin URI: http://www.lesterchan.net/portfolio/programming.php 
*/ 

function wp_pagenavi($before = '', $after = '', $prelabel = '', $nxtlabel = '', $pages_to_show = 5, $always_show = false) {
	global $request, $posts_per_page, $wpdb, $paged;
	if(empty($prelabel)) {
		$prelabel  = '&laquo; Previous';
	}
	if(empty($nxtlabel)) {
		$nxtlabel = 'Next &raquo;';
	}
	$half_pages_to_show = round($pages_to_show/2);
	if (!is_single()) {
		if(!is_category()) {
			preg_match('#FROM\s(.*)\sORDER BY#siU', $request, $matches);		
		} else {
			preg_match('#FROM\s(.*)\sGROUP BY#siU', $request, $matches);		
		}
		$fromwhere = $matches[1];
		$numposts = $wpdb->get_var("SELECT COUNT(DISTINCT ID) FROM $fromwhere");
		$max_page = ceil($numposts /$posts_per_page);
		if(empty($paged)) {
			$paged = 1;
		}
		if($max_page > 1 || $always_show) {
			echo "$before <div class='Nav'><span>Pages ($max_page): </span>";
			if ($paged >= ($pages_to_show-1)) {
				echo '<a href="'.get_pagenum_link().'">&laquo; First</a> ... ';
			}
			previous_posts_link($prelabel);
			for($i = $paged - $half_pages_to_show; $i  <= $paged + $half_pages_to_show; $i++) {
				if ($i >= 1 && $i <= $max_page) {
					if($i == $paged) {
						echo "<strong class='on'>$i</strong>";
					} else {
						echo ' <a href="'.get_pagenum_link($i).'">'.$i.'</a> ';
					}
				}
			}
			next_posts_link($nxtlabel, $max_page);
			if (($paged+$half_pages_to_show) < ($max_page)) {
				echo ' ... <a href="'.get_pagenum_link($max_page).'">Last &raquo;</a>';
			}
			echo "</div> $after";
		}
	}
}


/* 
Plugin Name: Recent Comments 
Plugin URI: http://mtdewvirus.com/code/wordpress-plugins/ 

Modified by Frostpress using WP's get_comments
*/ 

function dp_recent_comments() { 

	$comment_len = 43;
		
	$comments = get_comments('number=6');

	if ($comments) { 
		foreach ($comments as $comment) { 
			//ob_start();
			?>
				<li>
					<div class="tab-comments-avatar"><?php echo get_avatar($comment,$size='40' ); ?></div>
					<div class="tab-comments-text">
						<a href="<?php echo get_permalink( $comment->comment_post_ID ) . '#comment-' . $comment->comment_ID; ?>"><?php echo $comment->comment_author; ?>:</a>
						<?php echo strip_tags(substr(apply_filters('get_comment_text', $comment->comment_content), 0, $comment_len)); ?>...
					</div>
				</li>
			<?php
			//ob_end_flush();
		} 
	} else { 
		echo "<li>No comments</li>";
	}
}



/*
custom comment design
*/

function sepcomments($comment, $args, $depth) {
   $GLOBALS['comment'] = $comment; ?>

<li id="li-comment-<?php comment_ID() ?>">
<!-- comment -->
	<div <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>">

		<div class="comment-avatar">
			
			<?php echo get_avatar($comment,$size='60' ); ?>

		</div>
		<div class="comment-text">
			<div class="comment-meta">
				<div class="comment-reply">
					<?php edit_comment_link(__('Edit'),'',' &nbsp; ') ?>
					<?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
				</div>
				<div class="comment-writer"><?php printf(__('%s'), get_comment_author_link()) ?></div>
				<div class="comment-date">
					<a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>"><?php printf(__('<span title="%1$s %2$s">%1$s</span>'), get_comment_date('j F, Y'),  get_comment_time()) ?></a>
				</div>
			</div>

			<?php comment_text() ?>

			<?php if ($comment->comment_approved == '0') : ?>
				<p><em><?php _e('Your comment is awaiting moderation.') ?></em></p>
			<?php endif; ?>
		</div>
	 </div>
<!-- /comment -->
<?php
}

/* custom comment design for printing trackbacks */
function septrackbacks($comment, $args, $depth) {
	$GLOBALS['comment'] = $comment; ?>
	<li <?php comment_class(); ?> id="comment-<?php comment_ID() ?>">
		<?php printf(__('%1$s'), get_comment_date('d M y')) ?>: 
		<?php printf(__('%s'), get_comment_author_link()) ?>
<?php
}
?>