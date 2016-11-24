<?php
/*Template for displaying the footer for all the files.
*
*@package -> Wordpress
*@sub-package -> afia
*@since -> V 1.0.0
*/ 
?>
<!--End of #leftContent-->
</div>
<!--Side bar inclusion-->
<div id = "sideba" class="dotot col-md-3">
	<?php get_sidebar();?>
</div>
</div>
<!--End of #content-->
<br />
<br />
<br />
<br />
<div id = "footba">
<span class = "footertext">
<?php 
echo  __('Theme powered by:','afia'). '<a href="https://WordPress.org"> WordPress</a>: &copy; <a href ="'.esc_url(home_url("/")).'">'. get_bloginfo( 'title' ) .'</a>';;

?>
</span>
</div>
<!--End of content section-->
</div>
<!--End of the document body section-->
<?php wp_footer();?>
</body>
</html>