 <?php 
// Define all Variables.
$bnt_advance = esc_html ( get_theme_mod('advance_link_name1',esc_attr__('Know More','advance')) );
$bnt2_advance = esc_html ( get_theme_mod('advance_link_name2',esc_attr__('Buy Theme','advance')) );
$advance_staticslider_uri1 = esc_url( get_theme_mod('advance_staticslider_uri1') );
$advance_staticslider_uri2 = esc_url( get_theme_mod('advance_staticslider_uri2') );
$advance_staticslider_image = esc_url( get_theme_mod('advance_staticslider_image',esc_url(get_template_directory_uri().'/images/slider.jpg')) );
							?>
 <?php 
 $sticky_advance = get_option( 'sticky_posts' );
 $advance_num_post =  esc_attr(get_theme_mod ('Staticimage_post',esc_attr('Hello world!')));		
			$args_advance = array(
					'post_type'=> 'post',
					'p' => $advance_num_post,
					'posts_per_page'=>1,
					'post__not_in' => $sticky_advance, 
					
				);

			$loop_advance = new WP_Query($args_advance);
          			wp_reset_postdata(); 
			     if($loop_advance->have_posts()) : ?>
			  <?php while($loop_advance->have_posts()) : 
		$loop_advance->the_post(); ?>
		<section class="masthead" style="background-image:url( <?php echo $advance_staticslider_image ?>);" >
                    <div class="masthead-overlay"></div>  
		<div class="masthead-arrow"></div>
        
					 <div class="masthead-dsc">
           <div class="row warp">
		<h1><?php the_title(); ?></h1>
		<p><?php echo excerpt(30); ?> </p>
		
        <?php $advance_Static_Sliderbutton = get_theme_mod('advance_Static_Sliderbutton',1);?>
        <?php if( isset($advance_Static_Sliderbutton) && $advance_Static_Sliderbutton == 1 ):?>
         <?php if( !empty($advance_staticslider_uri1) ):?>
                                    <a href="<?php echo $advance_staticslider_uri1 ?>" class='hero_btn'>  <?php echo $bnt_advance ?>  </a>
                                    <?php else:?>
                                     <a href="<?php echo esc_url( get_permalink() ); ?>" class='hero_btn'>  <?php echo $bnt_advance ?>  </a>
                                    <?php endif;?>
                                    <?php endif;?>
                                                                         <?php if( !empty($advance_staticslider_uri2) ):?>
                                    <a href="<?php echo $advance_staticslider_uri2 ?>" class='hero_btn_full'> <?php echo $bnt2_advance ?></a>
                                    <?php endif;?>
                                    </div></div>
				</section>
			<?php endwhile; ?>
			<?php endif;?>