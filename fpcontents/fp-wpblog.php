<?php 
/* 	AssociationX Theme's part for showing Blog or Page in the front page
	Copyright: 2012-2020, D5 Creation, www.d5creation.com
	Based on the Simplest D5 Framework for WordPress
	Since AssociationX 1.0
*/
$fpostex = esc_html(associationx_get_option('show_fp_wpblog', '1'));
if (!$fpostex) return; 
$postorpage = get_option( 'show_on_front' );
$fpwpbcls = 'fpbpages';
$associationx_pagelayout = 'leftcontent';
if(!is_active_sidebar('sidebar-3') ) $associationx_pagelayout = 'fullcontent';
$blogpdesign = 'normalbdesign';
if($postorpage == 'posts') $fpwpbcls = 'fpbposts'; 
global $associationx_ExLength; $associationx_ExLength=30;
?>
<div class="clear"></div>
<div id="wpbpcontainer" class="fpwpblogsection <?php echo $fpwpbcls.' '.$associationx_pagelayout.' '.$blogpdesign; ?>">
	<div class="box90">
		<div id="containerin"><?php 	
			get_template_part( 'post-content' );  
			if($associationx_pagelayout != 'fullcontent') get_sidebar('frontpage'); ?>
		</div>
	</div>
</div>
<?php $associationx_ExLength = 50;