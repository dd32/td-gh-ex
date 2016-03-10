<?php get_header(); 
get_template_part('index', 'banner');
if(!is_home()) { echo '</div>'; }
?>
<!-- Blog & Sidebar Section -->
<section class="site-content">
	<div class="container">
		<div class="row blog_sidebar_section">		
			<!--Blog-->
	<div class="<?php corpbiz_post_layout_class(); ?>" >
		<?php
			if(have_posts())
			{
			while(have_posts()) { the_post();
		?>
		<?php get_template_part('content',''); ?>			
		<div class="blog_author">
		<div class="media">
			<div class="pull-left">
				<?php 
				//$image =array('class' => "img-responsive img-circle media-object");
				echo get_avatar( get_the_author_meta( 'ID') , 94); ?>
				
			</div>
			<div class="media-body">
				<h6> <?php the_author(); ?> <span> <?php $user = new WP_User( get_the_author_meta( 'ID' ) ); echo $user->roles[0];?> </span></h6>
				<p><?php the_author_meta( 'description' ); //the_author_description(); ?> </p>
				
				<ul class="blog_author_social">
					<?php			
					$google_profile = get_the_author_meta( 'google_profile' );
					if ( $google_profile && $google_profile != '' ) {
						echo '<li class="googleplus"><a href="' . esc_url($google_profile) . '" rel="author"><i class="fa fa-google-plus"></i></a></li>';
					}
									
					$twitter_profile = get_the_author_meta( 'twitter_profile' );
					if ( $twitter_profile && $twitter_profile != '' ) {
						echo '<li class="twitter"><a href="' . esc_url($twitter_profile) . '"><i class="fa fa-twitter"></i></a></li>';
					}
									
					$facebook_profile = get_the_author_meta( 'facebook_profile' );
					if ( $facebook_profile && $facebook_profile != '' ) {
						echo '<li class="facebook"><a href="' . esc_url($facebook_profile) . '"><i class="fa fa-facebook"></i></a></li>';
					}
									
					$linkedin_profile = get_the_author_meta( 'linkedin_profile' );
					if ( $linkedin_profile && $linkedin_profile != '' ) {
						   echo '<li class="linkedin"><a href="' . esc_url($linkedin_profile) . '"><i class="fa fa-linkedin"></i></a></li>';
					}
					$youtube_profile = get_the_author_meta( 'youtube_profile' );
					if ( $youtube_profile && $youtube_profile != '' ) {
						   echo '<li class="youtube"><a href="' . esc_url($youtube_profile) . '"><i class="fa fa-youtube-play"></i></a></li>';
					}
					?>
				</ul>
				
			</div>
		</div>	
		</div>
		<?php } ?>
			<?php comments_template('',true); ?>	
		<?php } ?>	
		</div>
		<?php get_sidebar(); ?>
		
	</div>
	</div>
<!--Blog-->
</section>
<?php get_footer(); ?>