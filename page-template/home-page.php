<?php
/*
 * Template Name: Home Page 
 */
$deserve_options = get_option('deserve_theme_options');

get_header();
?>


<section> 
	
	<?php $deserve_i = 0;  ?>
<?php for ($deserve_loop = 1; $deserve_loop <= 5; $deserve_loop++): ?>
<?php if (!empty($deserve_options['slider-img-' . $deserve_loop])) { ?>
<?php if($deserve_i == 0) { ?>
<div class="banner"> 	 
	<div id="sidebar-carousel-1" class="carousel slide " data-ride="carousel">
			<div class="carousel-inner slider">
	 <?php 
	   $deserve_sliderclass = "active";
	 }else {
               $deserve_sliderclass = "";
               }  ?>			
				<?php if (!empty($deserve_options['slider-img-' . $deserve_loop])) {
				$deserve_image = getimagesize($deserve_options['slider-img-' . $deserve_loop]); ?>	
				<div class="item <?php echo $deserve_sliderclass; ?> "> 
				<?php if (!empty($deserve_options['slider-img-' . $deserve_loop])) { ?>
					<img src="<?php echo esc_url($deserve_options['slider-img-' . $deserve_loop]); ?>"  width="<?php echo $deserve_image[0]; ?>" height="<?php echo $deserve_image[1]; ?>" alt="<?php echo $deserve_loop; ?>"> 
					<?php if (!empty($deserve_options['slidercontent-' . $deserve_loop])) { ?>
					<div class="caption-text">
						<h2> <?php echo esc_attr($deserve_options['slidercontent-' . $deserve_loop]); ?></h2>
					</div>
					<?php } ?>
				<?php } ?>
				</div>
                <?php $deserve_i++; }  
				}  endfor?>
<?php  if($deserve_loop >= $deserve_i && $deserve_i > 0) { ?>				
            </div>
            <?php } ?>
            <!-- Controls --> 
			<?php if ($deserve_i >= 2) { ?>	
                <a class="left carousel-control slider_button" href="#sidebar-carousel-1" data-slide="prev"> <i class="fa fa-angle-left"></i></a> 
                <a class="right carousel-control slider_button" href="#sidebar-carousel-1" data-slide="next"> <i class="fa fa-angle-right"></i></a> 
            <?php } ?>
<?php  if($deserve_loop >= $deserve_i && $deserve_i > 0) { ?>
    </div>
</div>
<?php  } ?>
   
    <div class="deserve-container container devlopment-process">
		 <?php if (!empty($deserve_options['home-title'])) { ?>
        <div class="title">
            <?php if (!empty($deserve_options['home-title'])) {
                ?> 
                <h2><span class="color-text"> <?php echo esc_attr($deserve_options['home-title']); ?> </span></h2>

            <?php } ?> 
            <?php if (!empty($deserve_options['home-content'])) {
                ?>   
                <p>  <?php echo esc_attr($deserve_options['home-content']); ?></p>
            <?php } ?>
        </div>
          <?php } ?>
       <?php    for ($deserve_l = 1; $deserve_l <= 3; $deserve_l++):
                if (!empty($deserve_options['home-icon-' . $deserve_l])):
                    ?>
        <div class="row devlopment-wrap">
            <?php
            for ($deserve_l = 1; $deserve_l <= 3; $deserve_l++):
                if (!empty($deserve_options['home-icon-' . $deserve_l])):
                    ?>

        <?php
        $deserve_image = esc_url($deserve_options['home-icon-' . $deserve_l]);
        $deserve_id = deserve_get_image_id_by_url($deserve_image);
        $deserve_image = wp_get_attachment_image_src($deserve_id, 'deserve-home-tab-size');
        ?>
                    <div class="col-md-4 col-sm-6">
                        <div class="process-detail">
                            <div class="col-md-4 col-sm-4 col-xs-4 no-padding"> 
                                <div class="round-image">
                                    <img alt="<?php echo $deserve_l; ?>" class="img-circle" src="<?php echo $deserve_image[0]; ?>" width="<?php echo $deserve_image[1]; ?>" height="<?php echo $deserve_image[2]; ?>">			
                                </div>
                            </div>
                            <div class="process col-md-8 col-sm-8 col-xs-8 no-padding">
                                <h2><?php if (!empty($deserve_options['section-title-' . $deserve_l])) echo sanitize_text_field($deserve_options['section-title-' . $deserve_l]); ?></h2>
                                <p><?php if (!empty($deserve_options['section-content-' . $deserve_l])) echo sanitize_text_field($deserve_options['section-content-' . $deserve_l]); ?></p>
                            </div>
                        </div>
                    </div>

        <?php
    endif;
endfor;
?>




        </div>
     
   
    </div>
    <hr class="bottom-border">
    <?php
    endif;
endfor;
?>

    <div class="container deserve-container latest-blog">
		  <?php if (!empty($deserve_options['shome-title'])) { ?>
        <div class="title">
            <?php if (!empty($deserve_options['shome-title'])) {
                ?> 
                <h2><span class="color-text"> <?php echo esc_attr($deserve_options['shome-title']); ?> </span></h2>

            <?php } ?>
            <?php if (!empty($deserve_options['shome-content'])) {
                ?>   
                <p>  <?php echo esc_attr($deserve_options['shome-content']); ?></p>
            <?php } ?>
        </div>
         <?php } ?>
        <div class="row deserve_potfolio">
            <?php
            $deserve_args = array(
                'orderby' => 'post_date',
                'order' => 'DESC',
                'post_type' => 'post',
                'posts_per_page' => 4,
                'paged' => $paged,
                'post_status' => 'publish',
                'ignore_sticky_posts'=> true,
				'meta_query' => array(
                    array(
                        'key' => '_thumbnail_id',
                        'compare' => 'EXISTS'
                    ),
                 )

            );
            $deserve_query = new WP_Query($deserve_args);
           
            ?>
<?php if ($deserve_query->have_posts()) : while ($deserve_query->have_posts()) : $deserve_query->the_post(); ?>    	

        <?php $deserve_image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_id()), 'deserve-latest-post'); ?>

        <?php if ($deserve_image[0] != "") { ?>
         

                        <div class="col-md-3 col-sm-6">


                            <div class="blog-image"> 

                                <a href="<?php echo get_permalink(); ?>">
                                    <img src="<?php echo esc_url($deserve_image[0]); ?>" width="<?php echo $deserve_image[1]; ?>" height="<?php echo $deserve_image[2]; ?>" class="img-responsive" alt="<?php the_title(); ?>"/>
                                </a> 

                            </div>
                            <div class="blog-data col-md-12 no-padding"> <a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a>
                                <ul>

            <?php deserve_entry_meta(); ?>

                                </ul>

                            </div>
                        </div>

        <?php } ?>

    <?php endwhile;
endif; ?>




        </div>
    </div>


</section>




<?php get_footer(); ?>
