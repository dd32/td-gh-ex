<?php
/*
|--------------------------
| Password Post
|--------------------------
*/

if ( post_password_required() ) {
?>

<!-- Begin Comments -->
<div id="comments">
  <p class="nopassword"><?php echo "This post is password protected. Enter the password to view any comments."; ?></p>
</div>
<!-- End Comments -->

<?php
return;
} // if ( post_password_required() )
?>

<!-- Begin Comments -->
<div id="comments">

<?php
/*
|--------------------------
| Display Comments
|--------------------------
*/

if ( have_comments() ) {
?>

  <h3 id="comments-title">
  	<?php printf( _n( 'One Response to %2$s', '%1$s Responses to %2$s', get_comments_number() ), get_comments_number(), '<em>' . get_the_title() . '</em>' ); ?>
  </h3>

  <ol class="commentlist">
    <?php wp_list_comments(); ?>
  </ol>

<?php
//if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) {
if ( get_comment_pages_count() > 1 ) {
?>
  <div class="navigation">
	<div class="navprev"><?php previous_comments_link( '&laquo; Older Comments' ); ?></div>
	<div class="navnext"><?php next_comments_link( 'Newer Comments &raquo;' ); ?></div>
   <br class="clear" />
  </div>
<?php } ?>

<?php
} // if ( have_comments() )
else {
	if ( ! comments_open() ) {
?>

  <p class="nocomments"><?php echo 'Comments are closed.'; ?></p>

<?php
	} // if ( ! comments_open() )
} // else of if ( have_comments() )

/*
|--------------------------
| Comment Form
|--------------------------
*/

comment_form();

?>
</div>
<!-- End Comments -->