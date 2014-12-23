<?php
/*
 * Comment Template File.
 */
?>
<?php
if ( post_password_required() )
	return;
?>
<div class="clearfix"></div>
<div id="comments" class="comments-area">
	<?php if ( have_comments() ) : 	?>
    <h3 class="comments-title">
		<?php
			printf( _n( 'One thought on &ldquo;%2$s&rdquo;', '%1$s thoughts on &ldquo;%2$s&rdquo;', get_comments_number(), 'a1' ),
			number_format_i18n( get_comments_number() ), get_the_title() );
		?>
	</h3>
    <ul>
		<?php wp_list_comments( array( 'callback' => 'a1_comment', 'short_ping' => true) ); ?>
    </ul>
	<?php paginate_comments_links(); ?>    
	<?php endif; // have_comments() ?>
		<?php comment_form(); ?>
</div><!-- #comments .comments-area -->