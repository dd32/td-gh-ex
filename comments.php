<?php
if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
die ('Please do not load this page directly. Thanks!');

if ( post_password_required() ) { ?>
<p class="nocomments">This post is password protected. Enter the password to view comments.</p>
<?php return; } ?>

<div id="commentsbox" class="row-fluid">
<?php if ( have_comments() ) : ?>
<h3 id="comments"><?php comments_number('No Responses', 'One Response', '% Responses' );?> so far...</h3>

<ol class="commentlist">
<?php wp_list_comments(); ?>
</ol>

<div class="comment-nav">
<div class="alignleft"><?php previous_comments_link() ?></div>
<div class="alignright"><?php next_comments_link() ?></div>
</div>
<?php else : endif ?>

<?php if ( comments_open() ) : ?>

<i class="cattag avedonicon-comment"></i>
<?php comment_form(); ?>

<?php endif; ?>
</div>