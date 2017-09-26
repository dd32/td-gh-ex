<?php $blog_sidebar=get_theme_mod('blog_sidebar');
if(isset($blog_sidebar)&&$blog_sidebar=='left')
{
	$classs='pull-left';
}
elseif(isset($blog_sidebar)&&$blog_sidebar=='right'){
	$classs='pull-right';
}
else{
$classs='';
}
?>
<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 <?php echo esc_attr_e($classs);?>">
<div class="sidebar wow fadeInUp">
 <?php if (is_active_sidebar('primary-sidebar') ) {dynamic_sidebar('primary-sidebar');} ?>
</div>
</div>