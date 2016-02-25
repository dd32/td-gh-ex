<?php
/**
 * The template for displaying archive
 *
 *
 * @package Avvocato
 */
get_header();
?>
<section class="section section-page-title" <?php if(get_theme_mod('pwt_blog_image')) { ?> style="background-image: url('<?php echo esc_url(get_theme_mod('pwt_blog_image')); ?>')"  <?php }  else { ?> style="background-image: url(<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/demo/bgh.jpg" <?php }?>>
	<div class="overlay">
		<div class="container">
			<div class="gutter">
			    <p class="page-title"><?php
					if ( is_day() ) :
						printf( __( 'Daily Archives: %s', 'avvocato' ), '<span>' . get_the_date() . '</span>' );
					elseif ( is_month() ) :
						printf( __( 'Monthly Archives: %s', 'avvocato' ), '<span>' . get_the_date( _x( 'F Y', 'monthly archives date format', 'avvocato' ) ) . '</span>' );
					elseif ( is_year() ) :
						printf( __( 'Yearly Archives: %s', 'avvocato' ), '<span>' . get_the_date( _x( 'Y', 'yearly archives date format', 'avvocato' ) ) . '</span>' );
					else :
						_e( 'Archives', 'avvocato' );
					endif;
				?></p>
			</div>
		</div> <!--  END container  -->
	</div> <!--  END overlay  -->
</section> <!--  END section-page-title  -->
<?php
get_template_part( 'content', 'posts' ); 
get_footer(); 
?>