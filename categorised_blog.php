<?php
/*
   Template Name: Ajax Categorised Blog
*/?>
<?php get_header(); ?>
<div id="ajaxprogress"></div>
  <?php if ( is_user_logged_in() ) { $chk_logged_in='logged_in';} 
            else{ $chk_logged_in='logged_out';}
  ?> 
	
    <div class="inner_top_mn">
		<div class="page_wi">			
			<h2>
				<?php bloginfo('title');?><br>
				<span><?php bloginfo('description');?></span>	
			</h2>
			<div class="search_box">			 
               <form method="get" id="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
                <input type="text"  name="s"  placeholder="<?php esc_attr_e( 'Search', 'appointment' ); ?>" />
		        <input type="submit" class="search_btn" name="submit"  value="" />
			   </form>          
		   </div>
		</div>
	</div>
    </header>

<?php
 $args = array(
	'type'                     => 'post',
	'child_of'                 => 0,
	'parent'                   => '',
	'orderby'                  => 'name',
	'order'                    => 'ASC',
	'hide_empty'               => 1,
	'hierarchical'             => 1,
	'exclude'                  => '',
	'include'                  => '',
	'number'                   => '',
	'taxonomy'                 => 'category',
	'pad_counts'               => false );

 $categories= get_categories($args);
 $cat_count=0;
 if($categories){
foreach($categories as $category){
 $first_cat_name = $category->name;
   $cat_count++;
   if($cat_count > 0)
     break;
 }
 query_posts( array ( 'category_name' => $first_cat_name, 'posts_per_page' => -1 ) );
 }
 ?>
 
<div class="page_wi">
	 <div class="blog_right_bg_mn_con">
	  <div class="blog_left">
<h2 class="cat_blog_title"><?php _e('Categorized Blog','appointment'); ?></h2>
		<div class="cat_menu"><input id="ajax-script-url" value="<?php echo AdminAjaxURL; ?>" />
		<ul>
 <?php

	foreach($categories as $category){
    $cat_name = $category->name; 
?>
    <li  ><a  id="cat_ajax_trigger"   href="#"> <?php    echo $category->name;?></a></li>
<?php } ?>	
	</ul>
	</div>
<div id="cat-container"> <!-- Ajax html goes here...--> </div>
<div id="cat-container1">
 <?php  if($categories){
 if(have_posts()){
while ( have_posts() ) : the_post();?>
 <div class="blog_row_mn">
                      <h2><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'appointment' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php $title = get_the_title();
    if (strlen($title) == 0)  _e('no title','appointment'); 
	else  echo $title; ?></a></h2>
					    <div class="blog_link_mn">	
                         <span><img src="<?php echo get_template_directory_uri();?>/images/blog_ic.png" alt="Icon" /> 
						<?php the_date('M j,Y');?></span> 
						<a href="#"><img src="<?php echo get_template_directory_uri();?>/images/blog_ic2.png" alt="Icon" /> </a>
                 <?php  comments_popup_link( __( 'Leave a comment', 'appointment' ),__( '1 Comment', 'appointment' ), __( 'Comments', 'appointment' ),'name' ); ?>
						<img src="<?php echo get_template_directory_uri();?>/images/blog_ic3.png" alt="Icon" />
                          <?php edit_post_link( __( 'Edit', 'appointment' ), '<span class="meta-sep"></span> <span class="name">', '</span>' ); ?>
						<?php the_category(); ?>
					  </div><!--blog_link_mn-->	
                      
                      					<?php if(has_post_thumbnail()):?>					
					<div class="blog_img">
						<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" >
						<?php the_post_thumbnail('large',array('class' => 'fleft'));?>
						</a>
					</div>
					<?php endif;?>					
					<p class="blog_con_mn"><?php  the_excerpt(); ?></p>
					<?php if(wp_link_pages(array('echo'=>0))):?>
					<div class="pagination_blog"><ul class="page-numbers"><?php 
					 $args=array('before' => '<li>'.__('Pages:','appointment'),'after' => '</li>');
					 wp_link_pages($args); ?></ul>
                     </div><!--pagination_blog-->
					 <?php endif;?>
					<div class="blog_bot_mn">
						
						<span> <?php the_tags('<b>'.__('Tags:','appointment').'</b>','');?> </span>
						<a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'appointment' ), the_title_attribute( 'echo=0' ) ); ?>"><?php _e('Read More','appointment'); ?></a>
					</div><!--blog_bot_mn-->
				</div><!--blog_row_mn-->
				
	
	<?php
endwhile;
 }} else _e('There is no category to display','appointment');
wp_reset_query();

?>
</div>
</div><!-- closing of blog left -->
  	<div class="blog_right_mn"><?php get_sidebar();?></div>

</div>

</div>
</div>
  <footer>
    	<?php get_footer();?>
    </footer>

</body>
</html>


