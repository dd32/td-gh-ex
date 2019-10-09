<?php
/* 	AssociationX Theme's BuddyPress Page
	Copyright: 2012-2019, D5 Creation, www.d5creation.com
	Based on the Simplest D5 Framework for WordPress
	Since AssociationX 1.0
*/
get_header();
$pagelayout = 'leftcontent';
if(!is_active_sidebar('sidebar-bp') ) $pagelayout = 'fullcontent';
?>
<div id="pagename" class="d5_buddypress_page"></div>
<div id="container" class="bpsinpgcon box90 <?php echo $pagelayout; ?>">
	<div id="containerin">
		<div id="content" class="bpcontent">			
			<?php if ( have_posts() ): while ( have_posts() ): the_post(); ?>    
				<div <?php post_class('bppage narrowwidth'); ?> id="bppg-<?php the_ID(); ?>">
					<div class="entrytext">
						<h1 class="page-title"><?php the_title(); ?></h1>
						<div class="bpcontxt"><?php the_content(); ?></div>
					</div>						
				</div>
			<?php endwhile; endif; ?>
		</div>
	<?php if($pagelayout != 'fullcontent') get_sidebar('bp'); ?>
	</div>
</div>
<?php get_footer();