<?php
/**
 * Template Name: Contact
 */

get_header(); ?>

<div id="content-tc" class="container">
    <div class="middle-align">	
		<div class="col-md-4 contact-info">
			<h3><?php echo __('FIND US HERE','bb-ecommerce-store'); ?></h3>
			<div class="contact-location">
				<span class="head"><?php echo __('LOCATION','bb-ecommerce-store'); ?></span> <br>
 					<?php echo esc_html( get_theme_mod('bb_ecommerce_store_our_address','') ); ?>
 			</div>	
			<div class="contact-call">
				<span class="head"><?php echo __('SUPPORT CALL','bb-ecommerce-store'); ?></span> <br>
					<?php echo esc_html( get_theme_mod('bb_ecommerce_store_contact','') ); ?>
			</div>			
			<div class="contact-email">
				<span class="head"><?php echo __('EMAIL ADDRESS','bb-ecommerce-store'); ?></span> <br>
				<?php echo esc_html( get_theme_mod('bb_ecommerce_store_email','') ); ?>
			</div>
		</div>       
		<div class="col-md-8">
			<?php while ( have_posts() ) : the_post(); ?>
				<h1><?php the_title();?></h1>
                <?php the_content();?>                
            <?php endwhile; // end of the loop. ?>          
        </div>        
        <div class="clear"></div>    
	</div>
</div>
<?php get_footer(); ?>