<?php
/*
 * Template Name: Home Page
 */
get_header();
$impressive_options = get_option( 'impressive_theme_options' );
?>
 <section class="section-main">
		<?php if(get_theme_mod ( 'impressive_homepage_section_title',(!empty($impressive_options['home-title'])) ? $impressive_options['home-title']:'')!=''  || get_theme_mod ( 'impressive_homepage_section_subtitle',(!empty($impressive_options['home-sub-title'])) ? $impressive_options['home-sub-title']:'')!='' || get_theme_mod ( 'impressive_homepage_section_desc','')!='' ) { ?>
		   <div class="impressive-container container">	
                 <div class="about-us">
						<?php if(get_theme_mod ( 'impressive_homepage_section_title',(!empty($impressive_options['home-title'])) ? $impressive_options['home-title']:'')!='' || get_theme_mod ( 'impressive_homepage_section_subtitle',(!empty($impressive_options['home-sub-title'])) ? $impressive_options['home-sub-title']:'')!='') { ?>
						<div class="title">
							<?php if(get_theme_mod ( 'impressive_homepage_section_title',(!empty($impressive_options['home-title'])) ? $impressive_options['home-title']:'')!='') {?>
								<h2><?php echo esc_html(get_theme_mod ( 'impressive_homepage_section_title',(!empty($impressive_options['home-title'])) ? $impressive_options['home-title']:''));?></h2>
							<?php } ?>
							<?php if(get_theme_mod ( 'impressive_homepage_section_subtitle',(!empty($impressive_options['home-sub-title'])) ? $impressive_options['home-sub-title']:'')!='') {?>
								<p class="subtitle"><?php echo esc_html(get_theme_mod ( 'impressive_homepage_section_subtitle',(!empty($impressive_options['home-sub-title'])) ? $impressive_options['home-sub-title']:''));?></p>
							<?php } ?>	
						</div>
						<?php } ?>
						<?php if(get_theme_mod ( 'impressive_homepage_section_desc',(!empty($impressive_options['homedesc'])) ? $impressive_options['homedesc']:'')!='') {?>
							<div class="about-us-details">
								<?php echo wp_kses_post(get_theme_mod ( 'impressive_homepage_section_desc',(!empty($impressive_options['homedesc'])) ? $impressive_options['homedesc']:''));?>
							</div>
						<?php } ?>
				  </div>
		  </div>
        <?php } ?>  
    <?php 
	if(get_theme_mod ( 'impressive_homepage_first_sectionswitch',1)==1): ?>
		<div class="impressive-container container">
			<div class="row">
		<?php for($impressive_section_i=1; $impressive_section_i <=3 ;$impressive_section_i++ ): ?>
		<?php if(get_theme_mod ( 'impressive_homepage_first_section'.$impressive_section_i.'_title',(!empty($impressive_options['sectiontitle-'.$impressive_section_i])) ? $impressive_options['sectiontitle-'.$impressive_section_i]:'')!='' || get_theme_mod ( 'impressive_homepage_section_desc',(!empty($impressive_options['sectiondesc-'.$impressive_section_i])) ? $impressive_options['sectiondesc-'.$impressive_section_i]:'')!='') { ?>
				<div class="col-md-4 col-sm-4 our-services services-box">
				  <?php if(get_theme_mod ( 'impressive_homepage_first_section'.$impressive_section_i.'_title',(!empty($impressive_options['sectiontitle-'.$impressive_section_i])) ? $impressive_options['sectiontitle-'.$impressive_section_i]:'')!='' || get_theme_mod ( 'impressive_homepage_first_section'.$impressive_section_i.'_desc','')!='') { ?>
				   <p class="service-icon"> <span class="fa <?php echo esc_attr(get_theme_mod ( 'impressive_homepage_first_section'.$impressive_section_i.'_icon',(!empty($impressive_options['section-icon-'.$impressive_section_i])) ? $impressive_options['section-icon-'.$impressive_section_i]:'')); ?>"></span> </p>
				  <?php	} ?>
				  <?php if(get_theme_mod ( 'impressive_homepage_first_section'.$impressive_section_i.'_title',(!empty($impressive_options['sectiontitle-'.$impressive_section_i])) ? $impressive_options['sectiontitle-'.$impressive_section_i]:'')!='') { 
					echo '<h2 class="service-title">'.esc_html(get_theme_mod ( 'impressive_homepage_first_section'.$impressive_section_i.'_title',(!empty($impressive_options['sectiontitle-'.$impressive_section_i])) ? $impressive_options['sectiontitle-'.$impressive_section_i]:'')).'</h2>';
					} ?>
				  <?php if(get_theme_mod ( 'impressive_homepage_first_section'.$impressive_section_i.'_desc',(!empty($impressive_options['sectiondesc-'.$impressive_section_i])) ? $impressive_options['sectiondesc-'.$impressive_section_i]:'')!='') { 
					echo '<p class="service-detail">'.wp_kses_post(get_theme_mod ( 'impressive_homepage_first_section'.$impressive_section_i.'_desc',(!empty($impressive_options['sectiondesc-'.$impressive_section_i])) ? $impressive_options['sectiondesc-'.$impressive_section_i]:'')).'</p>';
				   } ?>
				</div>
			<?php } ?>
		<?php endfor; ?>   		
			</div>
		</div>
	<?php endif;?>
		<?php if(get_theme_mod ( 'impressive_homepage_second_sectionswitch',1)==1):
		if(get_theme_mod ( 'impressive_homepage_second_section_title',(!empty($impressive_options['home-button-title'])) ? $impressive_options['home-button-title']:'')!='' || get_theme_mod ( 'impressive_homepage_second_section_desc',(!empty($impressive_options['homemsg'])) ? $impressive_options['homemsg']:'')!='') {?>
		<div class="get-in-touch">
			<span class="mask"></span>
			<div class="impressive-container container">
				<div class="get-in-touch-info">
					<?php if(get_theme_mod ( 'impressive_homepage_second_section_desc',(!empty($impressive_options['homemsg'])) ? $impressive_options['homemsg']:'')!='') {?>
						<p><?php echo wp_kses_post(get_theme_mod ( 'impressive_homepage_second_section_desc',(!empty($impressive_options['homemsg'])) ? $impressive_options['homemsg']:'') );?></p>
					<?php } ?>
					<?php if(get_theme_mod ( 'impressive_homepage_second_section_title',(!empty($impressive_options['home-button-title'])) ? $impressive_options['home-button-title']:'')!='') {?>
					<a href="<?php echo esc_url(get_theme_mod ( 'impressive_homepage_second_section_link','#'));?>" class="site-btn"><?php echo esc_html(get_theme_mod ( 'impressive_homepage_second_section_title',(!empty($impressive_options['home-button-title'])) ? $impressive_options['home-button-title']:'Get In Touch'));?></a>
					<?php } ?>
				</div>
			</div>
		</div>
		<?php } endif;
		if(get_theme_mod ( 'impressive_homepage_third_sectionswitch',1)==1) :?>	
        <div class="impressive-container container">
             <div class="our-blog">
                <div class="title">
                   <h2><?php if(get_theme_mod ( 'impressive_homepage_third_section_title',(!empty($impressive_options['home-blog-title'])) ? $impressive_options['home-blog-title']:'Our Blog')!='') {
					echo esc_html(get_theme_mod ( 'impressive_homepage_third_section_title',(!empty($impressive_options['home-blog-title'])) ? $impressive_options['home-blog-title']:'Our Blog'));
					}	
				?></h2>
				<?php if(get_theme_mod ( 'impressive_homepage_third_section_subtitle',(!empty($impressive_options['home-blog-sub-title'])) ? $impressive_options['home-blog-sub-title']:'')!='') { ?>
					<p class="subtitle"><?php echo esc_html(get_theme_mod ( 'impressive_homepage_third_section_subtitle',(!empty($impressive_options['home-blog-sub-title'])) ? $impressive_options['home-blog-sub-title']:'')); ?></p>
                <?php } ?>
             </div>
             <div class="row">
			<?php $impressive_post_number = absint(get_theme_mod ( 'impressive_homepage_third_section_perpage',4));				
				$impressive_args = array( 
						'orderby'      => 'post_date', 
						'order'        => 'DESC',
						'post_type'    => 'post',
						'ignore_sticky_posts' => '1',
						'posts_per_page' => $impressive_post_number,
						'post_status'    => 'publish',
						'meta_query' => array(
							array(
							'key' => '_thumbnail_id',
							'compare' => 'EXISTS'
								),
							)
					  );
				$impressive_query = new WP_Query($impressive_args);
				if ($impressive_query->have_posts() ) : while ($impressive_query->have_posts()) : $impressive_query->the_post(); 
			?>
				<div class="col-md-6 col-sm-6 blog-gallery">
					<?php $impressive_image = wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'impressive-home-blog-image' );   ?>
					<?php if($impressive_image[0] != "") { ?>
						<img src="<?php echo esc_url($impressive_image[0]); ?>" width="<?php echo esc_attr($impressive_image[1]); ?>" height="<?php echo esc_attr($impressive_image[2]); ?>" class="img-responsive" alt="<?php the_title(); ?>" />
					<?php } ?>
					<a href="<?php echo esc_url( get_permalink() ) ; ?>" class="work-title"><?php the_title(); ?></a>
						<?php impressive_entry_meta(); ?> 
				</div>
				<?php endwhile; endif; ?> 
                </div>
            </div>
        </div>
    <?php endif; ?>
    </section>
<?php get_footer(); ?>