<?php 
/*
*This is a template to display error on page.
*
*@since 1.0.0
*
*/
?>
<br /><br /><br />
<span id = "errall">
<span class = "error-img">
<img class = "error-aimg" src = "<?php echo esc_url( get_stylesheet_directory_uri( '/' ) );?>/assets/img/404.png" title = "File cannot be found" />
</span>
<div id = "error-msg">
<p class = "content-error">
<?php _e('Sorry! The content you are looking for is not  available.','Afia');?><br />
<?php _e('Try searching to see if any posts match it.','Afia');?><br />
<form method = "get" action='<?php echo esc_url( home_url( '/' ) ); ?>'  name = "search">

<input type = "text" placeholder = "<?php _e('  Search','Afia'); ?>" name= "s">
<input type = "submit" value = "<?php _e('Search','Afia');?>"/>
</form>
</p>
</div>
</span>
<br /><br /><br />