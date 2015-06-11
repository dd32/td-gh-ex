<?php
/*
Template Name: 3 block
*/
?>

<?php get_header(); ?>  
<div class="block1">
		<div class="block1-center">
			<div class="block1-center1">
	            <div class="sidebar-user2 span2">
	            	<?php dynamic_sidebar( 'sidebar-block1-user1' ); ?>
	            </div>
	            <div class="sidebar-user3 span2">
	                <?php dynamic_sidebar( 'sidebar-block1-user2' ); ?>
	            </div>
	           <div class="sidebar-user4 span2">
	                 <?php dynamic_sidebar( 'sidebar-block1-user3' ); ?>
	            </div>
			</div>
		</div>
</div>	

<div class="block2">
	<div class="block1-center">
		<div class="block2-center2">
	            <div class="sidebar-user2 span2">
	                 <?php dynamic_sidebar( 'sidebar-block2-user1' ); ?>
	            </div>
	            <div class="sidebar-user3 span2">
	                 <?php dynamic_sidebar( 'sidebar-block2-user2' ); ?>
	            </div>
				<div class="sidebar-user4 span2">
	                 <?php dynamic_sidebar( 'sidebar-block2-user3' ); ?>
	            </div>
		</div>
	</div>
</div>	



<div class="block3">
	<div class="block3-center">
		<div class="block3-center3">
	           <div class="sidebar-user2 span2">
	                 <?php dynamic_sidebar( 'sidebar-block3-user1' ); ?>
	            </div>
	            <div class="sidebar-user3 span2">
	                 <?php dynamic_sidebar( 'sidebar-block3-user2' ); ?>
	            </div>
	            <div class="sidebar-user4 span2">
	                 <?php dynamic_sidebar( 'sidebar-block3-user3' ); ?>
	            </div>
		</div>
	</div>
</div>	





	</div>
	
<?php get_footer(); ?>