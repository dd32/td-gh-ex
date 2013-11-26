<?php
/*
Template Name: Blog
 *Theme Name	: BusiProf
 * @file           blog.php
 * @package        Busiprof
 * @author         Priyanshu Mittal
 * @copyright      2013 Appointment
 * @license        license.txt
 * @filesource     wp-content/themes/Busiprof/blog.php
*/

	get_template_part('banner', 'header') ;
	$image_uri=get_template_directory_uri(). '/images' ;
?>
	<div class="container">
		<div class="row-fluid">					
			<div class="span8 blog_left"><!-- Blog Section -->
					<?php global $more;
						$more = 0;
						$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
						$args = array( 'post_type' => 'post','paged'=>$paged);		
						//query_posts( $args );
						$post_type_data = new WP_Query( $args );
						
						while($post_type_data->have_posts()):
						$post_type_data->the_post();?>
				<div class="blog_section" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<h2 class="blog_section_title">
					 <a href="<?php the_permalink(); ?>"title="<?php the_title(); ?>"><?php the_title(); ?></a>
					</h2>
					<!---Link Section--->
					<div class="blog_link">
						<span>
						<img  src="<?php echo $image_uri. '/blog_ic.png' ?>">&nbsp;&nbsp;<?php the_time('M j,Y');?></span> 
						<a><img  src="<?php echo $image_uri. '/blog_ic2.png'?>">&nbsp;&nbsp;<b><?php  comments_popup_link( __( 'Leave a comment', 'busi_prof' ) ); ?></b></a>
						<a><img  src="<?php echo $image_uri. '/blog_ic3.png'?>"><?php the_category('|'); ?></a>
					</div>
					<!---Link Section--->
					<?php $defalt_arg =array('class' => "blog_section_img" )?>
					<?php if(has_post_thumbnail()):?>
					<a  href="<?php the_permalink(); ?>"title="<?php the_title(); ?>"><?php the_post_thumbnail('', $defalt_arg); ?>
					</a>
					<?php endif;?>
					<div class="blog_con_mn">
						<?php  the_content( __( 'Read More' , 'busi_prof' ) ); ?>
					</div>
					<div class="blog_bot_mn">
						<span><?php the_tags('<b>'.__('Tags:','busi_prof').'</b>','');?></span>
					</div>
				</div>	
				<?php endwhile ?>
					<?php	$Webriti_pagination = new Webriti_pagination();
							$Webriti_pagination->Webriti_page($paged, $post_type_data);		?>
            </div>
			 <?php get_sidebar();?>
		</div>	
	</div>		
<?php  get_footer();?>