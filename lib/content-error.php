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
<i class="fa fa-exclamation-triangle"></i>
</span>
<div id = "error-msg">
<p class = "content-error">
<?php _e('Sorry! The content you are looking for is not  available.','afia');?><br />
<?php _e('Try searching to see if any posts match it.','afia');?><br />
<?php get_search_form()?>
</p>
</div>
</span>
<br /><br /><br />