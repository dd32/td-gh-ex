<?php
/**
 * The template for displaying the footer.
 *
 * Closes the <div> for #content and #container, <body> and <html> tags.
 *
 * @package WordPress
 * @subpackage Graphene
 * @since Graphene 1.0
 */
?>
    </div><!-- #content -->
    <div id="footer">
        <p id="copyright" <?php if (!get_option('graphene_show_cc')) {echo 'style="background:none;padding-left:20px;"';} ?>>
        	<?php if (get_option('graphene_copy_text') == '') : ?>
				<?php _e('Except where otherwise noted, content on this site is licensed under a <a href="http://creativecommons.org/licenses/by-nc-nd/3.0/">Creative Commons Licence</a>.','graphene'); echo get_option('graphene_copy_text');?>
            <?php else : ?>
            	<?php echo stripslashes(get_option('graphene_copy_text')); ?>
            <?php endif; ?>
        </p>
        <p id="w3c">
        	<a title="Valid XHTML 1.0 Strict" href="http://validator.w3.org/check?uri=<?php echo graphene_get_url(); ?>" id="w3c_xhtml"><span><?php _e('Valid XHTML 1.0 Strict', 'graphene'); ?></span></a> 
            <a title="Valid CSS" href="http://jigsaw.w3.org/css-validator/validator?uri=<?php echo graphene_get_url(); ?>" id="w3c_css"><span><?php _e('Valid CSS Level 2.1', 'graphene'); ?></span></a>
        </p>
        
        <?php 
		/**
		 * This is where the credit for the theme is placed. Please keep the link back
		 * to the author's website. Seriously, developing this awesome theme took a lot
		 * of effort and time, weeks and weeks of voluntary unpaid work. I only ask 
		 * that you retain this link here, and you can use and/or modify the theme
		 * however you like to.
		 *
		 * If you still would like to remove the credit, please consider a donation
		 * through Graphene Options page under Appearance in Wordpress admin
		 * to help support the author and future theme development/support.
		*/
		?>
        <p id="developer">
			<?php
				$theme_data = get_theme_data(get_bloginfo('stylesheet_url'));
			?>
			<?php printf(__('%1$s uses %2$s theme by %3$s.','graphene'), '<a href="'.get_bloginfo('wpurl').'">'.get_bloginfo('name').'</a>', '<a href="'.$theme_data['URI'].'">'.$theme_data['Title'].'</a>', $theme_data['Author']); ?>
        </p>
    </div><!-- #footer -->
</div><!-- #container -->
    
    <!-- WP-Minify JS -->
    
    <?php wp_footer(); ?>
    
    <?php /* Print out Google Analytics code if tracking is enabled */ ?>
    <?php if (get_option('graphene_show_ga')) : ?>
    <!-- BEGIN Google Analytics script -->
    	<?php echo stripslashes(get_option('graphene_ga_code')); ?>
    <!-- END Google Analytics script -->
    <?php endif; ?>

</body>
</html>