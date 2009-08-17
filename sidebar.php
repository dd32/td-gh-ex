<div id="sidebar"><!-- sidebar.php -->
      <div id="sidebarContentTop"></div>
      <div id="sidebarContent">

     <ul>

    <?php /* WordPress Widget Support */ if (function_exists('dynamic_sidebar') and dynamic_sidebar(1)) { } else { ?>

    <?php get_links_list(); ?>

    <li id="categories"><h2><?php _e('Categories'); ?></h2>
    <ul>
    <?php wp_list_cats(); ?>
    </ul>
    </li>

    

    <li id="archives"><h2><?php _e('Archives'); ?></h2>
    <ul>
    <?php wp_get_archives('type=monthly'); ?>
    </ul>
    </li>
    <li id="meta"><h2><?php _e('Meta'); ?></h2>
    <ul>
    <?php wp_register(); ?>
    <li><?php wp_loginout(); ?></li>

    <li><a href="<?php bloginfo('rss2_url'); ?>" title="<?php _e('Syndicate this site using RSS'); ?>"><?php _e('RSS'); ?></a></li>

    <li><a href="<?php bloginfo('comments_rss2_url'); ?>" title="<?php _e('The latest comments to all posts in RSS'); ?>"><?php _e('Comments RSS'); ?></a></li>
    <li><a href="http://validator.w3.org/check/referer" title="<?php _e('This page validates as XHTML 1.0 Transitional'); ?>"><?php _e('Valid <abbr title="eXtensible HyperText Markup Language">XHTML</abbr>'); ?></a></li>
    <li><a href="http://gmpg.org/xfn/"><abbr title="XHTML Friends Network">XFN</abbr></a></li>
    <li><a href="http://wordpress.org/" title="<?php _e('Powered by WordPress'); ?>"><abbr title="WordPress">WP</abbr></a></li>
    <?php wp_meta(); ?>
    </ul>
    </li>

    <?php } ?>
    <br />
	</ul>
    
    
    
  	  </div>
      <div id="sidebarContentBottom"></div>
</div><!-- end #sidebar1 -->
  