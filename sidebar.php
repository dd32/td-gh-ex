<?php
/**
 * The Sidebar for display in the content page.
 * This file closes the <div> of #content-main 
 *
 * @package WordPress
 * @subpackage khairul-syahir.com-v3
 * @since khairul-syahir.com-v3 1.0
 */
?>
	</div><!-- #content-main -->
<div id="sidebar">
    <?php 	/* Widgetized sidebar, if you have the plugin installed. */
        if (!dynamic_sidebar('primary-widget-area')) : ?>
        
    <!-- Author information is disabled per default. Uncomment and fill in your details if you want to use it.
    <h3>About the author</h3>
    <p>A little something about you, the author. Nothing lengthy, just an overview.</p>
    </li>
    -->
        
    <h3>Archives</h3>
    <div class="sidebar-wrap clearfix">
        <ul>
        <?php wp_get_archives('type=monthly'); ?>
        </ul>
    </div>
    
    <h3><?php _e('Meta','graphene'); ?></h3>
    <div class="sidebar-wrap clearfix">
        <ul>
            <?php wp_register(); ?>                    
            <li><?php wp_loginout(); ?></li>
            <?php wp_meta(); ?>
            <li class="rss"><a href="<?php bloginfo('rss2_url'); ?>"><?php _e('Posts RSS','graphene'); ?></a></li>
            <li class="rss"><a href="<?php bloginfo('comments_rss2_url'); ?>"><?php _e('Comments RSS','graphene'); ?></a></li>
            <li><?php _e('Powered by <a href="http://www.wordpress.org" title="Powered by WordPress, state-of-the-art semantic personal publishing platform.">WordPress</a>','graphene'); ?></li>
        </ul>
    </div>
    
    <?php endif; ?>
    
    <?php wp_meta(); ?>

</div><!-- #sidebar -->