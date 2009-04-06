A couple of things before you're totally off and running:

INSTALLATION

1. Unzip this zip file into your /wp-content/themes directory.
2. In the 'Design' tab of your WordPress admin panel, go to 'Themes' and select 'Annexation' as your new them.
3. Click "Activate 'Annexation'" in the top right corner.

CUSTOMIZATION

1. Before you do anything, you'll want to change the way your own comments are displayed.

In 'comments.php' you need to find the following line and change 'author@domain.com' to the email address you've entered into the WordPress admin panel. This will enable your comments to stand out from everyone else's.

<li class="clearfix <?php if ($comment->comment_author_email == "author@domain.com") echo 'author'; else echo $oddcomment; ?> item" id="comment-<?php comment_ID() ?>">

2. You will also want to install the Last.fm plug-in by Jeroen Smeets and Twitter for WordPress by Ricardo Gonzalez.

3. Once you've added the Last.fm plug-in, you need to change the setting for how many albums to display to '14'. That is how many will fit in the footer, unless you make modifications to it.

That's it! Please let me know if you make any modifications (email chris@walmedia.com). I love seeing my designs change to fit other personalities.