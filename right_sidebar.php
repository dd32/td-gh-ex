<div id="right_sidebar">

<ul>

<?php if ( function_exists('dynamic_sidebar') && dynamic_sidebar(2) ) : else : ?>

                  <li><h2><?php _e('Calendar'); ?></h2>
		     <?php get_calendar(); ?>
	          </li>	                   		
        
                   <?php wp_list_bookmarks(); ?>                                 
                
        <li><h2><?php _e('Meta'); ?></h2>
		<ul>
			<?php wp_register(); ?>
<li><?php wp_loginout(); ?></li>
					<li><a href="http://validator.w3.org/check/referer" title="This page validates as XHTML 1.0 Transitional">Valid <abbr title="eXtensible HyperText Markup Language">XHTML</abbr></a></li>
					<li><a href="http://gmpg.org/xfn/"><abbr title="XHTML Friends Network">XFN</abbr></a></li>
					<li><a href="http://wordpress.org/" title="Powered by WordPress, state-of-the-art semantic personal publishing platform.">WordPress</a></li>
			<?php wp_meta(); ?>
		</ul>
	</li> 

        <li><h2><?php _e('Search'); ?></h2>
                      <div class="search">          
       		          <?php include ('searchform.php'); ?>
                      </div>                
         </li>       
        
<?php endif; ?>

</ul>

</div>