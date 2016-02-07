<?php
/**
 * The template for displaying archive
 *
 *
 * @package Aedificator
 */
get_header();
?>
<section class="section section-page-title" <?php if(get_theme_mod('pwt_blog_image')) { ?> style="background-image: url('<?php echo esc_url(get_theme_mod('pwt_blog_image')); ?>')"  <?php }  else { ?> style="background-image: url(<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/demo/bgh.jpg" <?php }?>>
	<div class="section-overlay">
		<div class="container">
			<div class="gutter">
			     <h4><?php
					if ( is_day() ) :
						printf( __( 'Daily Archives: %s', 'aedificator' ), '<span>' . get_the_date() . '</span>' );
					elseif ( is_month() ) :
						printf( __( 'Monthly Archives: %s', 'aedificator' ), '<span>' . get_the_date( _x( 'F Y', 'monthly archives date format', 'aedificator' ) ) . '</span>' );
					elseif ( is_year() ) :
						printf( __( 'Yearly Archives: %s', 'aedificator' ), '<span>' . get_the_date( _x( 'Y', 'yearly archives date format', 'aedificator' ) ) . '</span>' );
					else :
						_e( 'Archives', 'aedificator' );
					endif;
				?></h4>
			</div>
		</div> <!--  END container  -->
	</div> <!--  END section-overlay  -->
</section> <!--  END section-page-title  -->
<?php
get_template_part( 'content', 'posts' ); 
get_footer(); 
?>