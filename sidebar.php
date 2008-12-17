<div class="side">
<div class="master-side">
<ul>
	  	 <?php  j_ShowAbout(); ?>
	  <li>
	  		<?php include (TEMPLATEPATH . '/searchform.php'); ?>
	  </li>
</ul>
</div>
<div class="side1">
<div class="gap">
<ul>
	  <?php if ( function_exists('dynamic_sidebar') && dynamic_sidebar(1) ) : else : ?>
  	  <?php wp_list_categories('show_count=1&title_li=<h2>Categories</h2>'); ?>
	  <?php j_ShowRecentPosts(); ?>
	  <li class="boxy">
        <h2><?php _e('Archives','ayumi') ?></h2>
        <ul>
          <?php wp_get_archives('type=monthly'); ?>
        </ul>
      </li>
       <?php endif; ?>
</ul>
</div>
</div>

<div class="side2">
<div class="gap">
    <ul>
	  <?php if ( function_exists('dynamic_sidebar') && dynamic_sidebar(2) ) : else : ?>
      <?php if(is_home()): wp_list_bookmarks(); endif; ?>
	  <li class="boxy">
	   <h2>Meta</h2>
        <ul>
          <?php wp_register(); ?>
          <li>
            <?php wp_loginout(); ?>
          </li>
          <li><a href="http://validator.w3.org/check/referer" title="This page validates as XHTML 1.0 Transitional">Valid <abbr title="eXtensible HyperText Markup Language">XHTML</abbr></a></li>
          <li><a href="http://gmpg.org/xfn/"><abbr title="XHTML Friends Network">XFN</abbr></a></li>
		  <li><a href="http://wordpress.org/" title="Powered by WordPress, state-of-the-art semantic personal publishing platform.">WordPress</a></li>
          <?php wp_meta(); ?>
        </ul>
	</li>
	<?php endif; ?>
    </ul>
  </div>
</div>
</div>

