<?php 
/**
 *
 * Displays The Author page template
 *
 * @package advance
 * 
 */
?>

<?php get_header(); ?>
	 <!-- head select -->   
	
        <?php get_template_part('headers/part','headsingle'); ?>
        <div id="sub_banner">
 <h1>
<?php
	//Get the user data
	if(isset($_GET['author_name'])) :
	$curauth = get_userdatabylogin($author_name);
	else :
	$curauth = get_userdata(intval($author));
	endif;
?>
<?php echo get_avatar($curauth->ID, $size = '100'); ?>
           <?php _e('Posts by ', 'advance');?><?php echo $curauth->display_name; ?>
        
        
    <!--AUTHOR BIO END-->
</h1>
<div class='h-line'></div>

</div>
    <div id="content">
         <!--AUTHOR POSTS START-->
         <?php get_template_part('layout/part','layout2'); ?>
         
	</div><!--#content END-->
</div><!--layer_wrapper class END-->
<?php get_footer(); ?>