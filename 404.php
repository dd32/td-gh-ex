<?php get_header(); ?> 
<div class="buy-it-area">
  <div class="page-title">
	<div class="container">
	  <div class="row">
	  </div>

<div class="col-lg-5"><h6><a href="<?php echo esc_html(site_url());?>"><?php _e('Home','becorp');?></a>/<span><?php _e('404','becorp');?></span></h6></div>
<div class="col-lg-6"><h2><h2><?php _e('Page 404','becorp'); ?></h2></h2></div>
</div>
</div>
</div>
 

<div class="container">
<div class="row">
<div class="col-lg-12">
<div class="page404">
<ul class="p404">
<li><?php _e('4','becorp'); ?></li>
<li class="zero"><?php _e('0','becorp'); ?></li>
<li><?php _e('4','becorp'); ?></li>
</ul>
<h3><?php _e('Ooops!, Sorry those page you have requested doesnt exist','becorp'); ?></h3>
<div class="return"><?php _e('Return to the','becorp');?> <a href="<?php echo esc_html(site_url());?>"><?php _e('Previous','becorp');?></a>&nbsp;<?php _e('or','becorp');?> <a href="<?php echo esc_html(site_url());?>"><?php _e('Homepage','becorp');?></a></div>
</div>
</div>
</div>
</div>

<?php get_footer(); ?>