<?php
// function for post meta
if ( ! function_exists( 'elegance_post_meta_content' ) ) :

function elegance_post_meta_content()
{ ?>
   
	        <!--show date of post-->
			
			<div class="blog-post-info-detail">
						<span class="blog_tags">
							<?php _e('By','elegance');?><a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) );?>"><?php the_author_link();?></a>
							
							<?php _e('On','elegance');?><a href="<?php the_permalink();?>"><?php echo get_the_date(); ?></a>
							
							<?php 	$tag_list = get_the_tag_list();
							if(!empty($tag_list)) { ?>
							<div class="blog-tags"><?php _e('In','elegance');?><?php the_tags('', ', ', ''); ?>,<?php 	$cat_list = get_the_category_list();
							if(!empty($cat_list)) { ?><?php the_category(', '); ?><?php } ?>
							</div><?php } ?></span>
			</div>
			
			
<?php } endif; ?>


<?php 
// this functions accepts two parameters first is the preset size of the image and second  is for additional classes, you can also add yours 
if(!function_exists( 'elegance_post_thumbnail')) : 

function elegance_post_thumbnail($preset,$class){
if(has_post_thumbnail()){ ?>
			<?php $defalt_arg =array('class' => $class); ?>
			<?php if(!is_single()){?>
			
			<div class="blog-post-img">
						<?php the_post_thumbnail($preset, $defalt_arg); ?>
						<div class="post-date"><h3><?php echo get_the_date('j'); ?></h3><span><?php echo get_the_date('M'); ?></span></div>
			</div>
			
			<?php }
			else { ?>
			<div class="blog-post-img">
						<?php the_post_thumbnail($preset, $defalt_arg);?>
						<div class="post-date"><h3><?php echo get_the_date('j'); ?></h3><span><?php echo get_the_date('M'); ?></span></div>
			</div>
			
			<?php } } } endif;?>

<?php 
// this functions accepts one parameters for image class
if(!function_exists( 'elegance_full_thumbnail')) : 					
function elegance_image_thumbnail($preset,$class){
if(has_post_thumbnail()){ ?>
			<?php $defalt_arg =array('class' => $class);
			the_post_thumbnail($preset, $defalt_arg);?>
			
			
			<?php } } endif;?>					
<?php
// This Function Check whether Sidebar active or Not
if(!function_exists( 'elegance_post_layout_class' )) :

function elegance_post_layout_class(){
	if(is_active_sidebar('sidebar_primary'))
		{ echo 'col-md-8'; } 
	else 
		{ echo 'col-md-12'; }  
 
} endif; 
?>