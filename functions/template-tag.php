<?php
// function for post meta
if ( ! function_exists( 'corpbiz_post_meta_content' ) ) :

function corpbiz_post_meta_content()
{ 
$corpbiz_options=theme_data_setup(); 
$current_options = wp_parse_args(  get_option( 'corpbiz_options', array() ), $corpbiz_options );
?>
    <div class="post_title_wrapper">
					<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
					<?php  $current_options=get_option('corpbiz_options'); 
			        if($current_options['blog_meta_section_settings'] != true) { ?>
					<div class="post_detail">
						<a href="<?php echo get_month_link(get_post_time('Y'),get_post_time('m')); ?>"><i class="fa fa-calendar"></i> <?php echo get_the_date('M j, Y'); ?> </a>
						<a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>"><i class="fa fa-user"></i> <?php _e('Posted by: &nbsp;','corpbiz'); ?> <?php the_author(); ?></a>
						<a href="<?php comments_link(); ?>"><i class="fa fa-comments"></i> <?php comments_number( 'No Comments', '1 Comment', '% Comments' ); ?> </a>
						<?php $tag_list = get_the_tag_list();
						if(!empty($tag_list)) { ?>
						<div class="post_tags">
							<i class="fa fa-tags"></i><?php the_tags('', ', ', '<br />'); ?>							
						</div>
						<?php } ?>
					</div>
					<?php } ?>
	</div>
<?php }  endif;
// This Function Check whether Sidebar active or Not
if(!function_exists( 'corpbiz_post_layout_class' )) :

function corpbiz_post_layout_class(){
	if(is_active_sidebar('sidebar-primary'))
		{ echo 'col-md-8'; } 
	else 
		{ echo 'col-md-12'; }  
 
} endif; 

if(!function_exists( 'corpbiz_post_link' )) :
function corpbiz_post_link() { ?>
<div class="blog_pagination">					
				<?php if(get_previous_posts_link() ): ?>
				<?php previous_posts_link(); ?>
				<?php endif; ?>					
				<?php if ( get_next_posts_link() ): ?>
				<?php next_posts_link(); ?>
				<?php endif; ?>
			</div>
<?php }  endif; ?>