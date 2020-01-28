<?php
/*
 	AssociationX Theme's Forum Page
	Copyright: 2012-2020, D5 Creation, www.d5creation.com
	Based on the Simplest D5 Framework for WordPress
	Since AssociationX 1.0
*/
get_header();
$associationx_pagelayout = 'leftcontent';
if(!is_active_sidebar('sidebar-bb') ) $associationx_pagelayout = 'fullcontent';
?>
<div id="pagename" class="d5_forums_page"></div>
<div id="container" class="bbsinpgcon box90 <?php echo $associationx_pagelayout; ?>">
	<div id="containerin">		
		<div id="content" class="bbcontent bbpage ribboncon">
			<?php 
			if ( have_posts() ): while ( have_posts() ): the_post(); 
			?>		    
				<div <?php post_class('bb-postitem narrowwidth'); ?> id="bppg-<?php the_ID(); ?>">
					<h1 class="page-title"><?php the_title(); ?></h1>
					<div class="content-ver-sep"></div>	
					<div class="entrytext">						
						<div class="bbcontxt"><?php the_content(); ?></div>
					</div>			
				</div>
			<?php endwhile; endif; ?>	
		</div>
		<?php if($associationx_pagelayout != 'fullcontent') get_sidebar('bb'); ?>
	</div>
</div><?php
get_footer();