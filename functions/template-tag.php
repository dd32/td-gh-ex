<?php
// function for post meta
if ( ! function_exists( 'appointment_aside_meta_content' ) ) :

function appointment_aside_meta_content()
{ ?>
			<?php $current_options=get_option('appointment_lite_options'); 
			if($current_options['meta_section_settings']=='on') { ?>
	        <!--show date of post-->
			<aside class="blog-post-date-area">
							<div class="date"><?php echo get_the_date('j'); ?> <div class="month-year"><?php echo get_the_date('M'); ?>,<?php echo get_the_date('Y'); ?></div></div>
							<div class="comment"><a href="<?php the_permalink(); ?>"><i class="fa fa-comments"></i><?php comments_number( '', 'o', '%' ); ?></a></div>
			</aside>
			<?php } ?>
<?php } endif;


if ( ! function_exists( 'appointment_post_meta_content' ) ) :
function appointment_post_meta_content()
{ ?>
			<?php $current_options=get_option('appointment_lite_options'); 
			if($current_options['meta_section_settings']=='on') { ?>
			<div class="blog-post-lg">
				<a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) );?>"><?php echo get_avatar( get_the_author_meta('user_email'), $size = '40'); ?></a><?php _e('By','appointment');?><a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) );?>"><?php echo get_the_author();?></a>
				<?php 	$tag_list = get_the_tag_list();
					if(!empty($tag_list)) { ?>
					<div class="blog-tags-lg"><i class="fa fa-tags"></i><?php the_tags('', ', ', ''); ?></div>
					<?php } ?>
			</div>
			<?php }  
} endif; 

// this functions accepts two parameters first is the preset size of the image and second  is for additional classes, you can also add yours 
if(!function_exists( 'appointment_post_thumbnail')) : 

function appointment_post_thumbnail($preset,$class){
if(has_post_thumbnail()){ ?>
			<?php $defalt_arg =array('class' => $class); 
			if(!is_single()){?>
			
			<div class="blog-lg-box">
				<a class ="img-responsive" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" >
				<?php the_post_thumbnail($preset, $defalt_arg); ?>		
			</div>
			<?php }
			else { ?>
			
			<div class="blog-lg-box">
						<a class ="img-responsive" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" >
				<?php the_post_thumbnail($preset, $defalt_arg); ?>
			</div>
			<?php } } } endif;?>

<?php 
// this functions accepts one parameters for image class
if(!function_exists( 'appointment_image_thumbnail')) : 					
function appointment_image_thumbnail($preset,$class){
if(has_post_thumbnail()){ ?>
			<?php $defalt_arg =array('class' => $class);
			the_post_thumbnail($preset, $defalt_arg);?>
			
<?php } } endif;?>					
<?php
// This Function Check whether Sidebar active or Not
if(!function_exists( 'appointment_post_layout_class' )) :

function appointment_post_layout_class(){
	if(is_active_sidebar('sidebar-primary'))
		{ echo 'col-md-8'; } 
	else 
		{ echo 'col-md-12'; }  
} endif; 
?>