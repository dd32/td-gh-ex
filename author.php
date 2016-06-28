<?php 
/**
 *
 * Displays The Author page template
 *
 * @package Advance
 * 
 */
?>

<?php get_header(); ?>
	 <!-- head select -->   
	
        <?php get_template_part('headers/part','headsingle'); ?>
        <div id="sub_banner">
 <h1>
	<?php
		/**
		 * Filter the Safreen author bio avatar size.
		 *
		 * @since Safreen
		 *
		 * @param int $size The avatar height and width size in pixels.
		 */
		$author_bio_avatar_size = apply_filters( 'advance_author_bio_avatar_size', 42 );

		echo get_avatar( get_the_author_meta( 'user_email' ), $author_bio_avatar_size );
	?>
   <?php _e('Posts by ', 'advance');?><?php echo get_the_author(); ?>
        
    <!--AUTHOR BIO END-->
</h1>


</div>
    <div id="content">
         <!--AUTHOR POSTS START-->
         <?php get_template_part('layout/part','layout2'); ?>
 	</div><!--#content END-->

<?php get_footer(); ?>