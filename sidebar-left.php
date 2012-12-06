<?php
/**
 * Sidebar Left Template
 *
 * Please do not edit this file. This file is part of the Cyber Chimps Framework and all modifications
 * should be made in a child theme.
 *
 * @category CyberChimps Framework
 * @package  Framework
 * @since    1.0
 * @author   CyberChimps
 * @license  http://www.opensource.org/licenses/gpl-license.php GPL v2.0 (or later)
 * @link     http://www.cyberchimps.com/
 */
?>

<div id="secondary" <?php cyberchimps_filter_sidebar_left_class(); ?>>
	
	<?php do_action( 'cyberchimps_before_sidebar' ); ?>
	
	<div id="sidebar">
	<?php if ( !dynamic_sidebar( 'sidebar-left' ) ) : ?>
		
		<div class="widget-container">    
			<h3 class="widget-title"><?php _e('Pages', 'cyberchimps' ); ?></h3>
			<ul>
    			<?php wp_list_pages('title_li=' ); ?>
    		</ul>
    	</div>
    
		<div class="widget-container">    
    		<h3 class="widget-title"><?php _e( 'Archives', 'cyberchimps' ); ?></h3>
    		<ul>
    			<?php wp_get_archives('type=monthly'); ?>
    		</ul>
    	</div>
        
		<div class="widget-container">
			<h3 class="widget-title"><?php _e('Categories', 'cyberchimps' ); ?></h3>
			<ul>
				<?php wp_list_categories('show_count=1&title_li='); ?>
			</ul>
        </div>
        
        <div class="widget-container">
        	<h3 class="widget-title"><?php _e('WordPress', 'cyberchimps' ); ?></h3>
        	<ul>
        		<?php wp_register(); ?>
        		<li><?php wp_loginout(); ?></li>
        		<li><a href="<?php echo esc_url( __('http://wordpress.org/', 'cyberchimps' )); ?>" target="_blank" title="<?php esc_attr_e('Powered by WordPress, state-of-the-art semantic personal publishing platform.', 'cyberchimps'); ?>"> <?php _e('WordPress', 'cyberchimps' ); ?></a></li>
        		<?php wp_meta(); ?>
    		</ul>
		</div>
		
		<div class="widget-container">
			<h3 class="widget-title"><?php _e('Subscribe', 'cyberchimps' ); ?></h3>
			<ul>
				<li><a href="<?php bloginfo('rss2_url'); ?>"><?php _e('Entries (RSS)', 'cyberchimps' ); ?></a></li>
				<li><a href="<?php bloginfo('comments_rss2_url'); ?>"><?php _e('Comments (RSS)', 'cyberchimps' ); ?></a></li>
			</ul>
		</div>
		
	<?php endif; ?>
	</div><!-- #sidebar -->
	
	<?php do_action( 'cyberchimps_after_sidebar' ); ?>
	
</div><!-- #secondary .widget-area .span3 -->