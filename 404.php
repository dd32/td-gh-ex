<?php get_header();

asiathemes_breadcrumbs(); ?> 
 
<div class="cp-page-content">
<div class="container">
<div class="row">
<div class="col-lg-12">
<div class="wow fadeInDown animated" data-wow-delay="0.4s">
<div class="page404">
<ul class="p404">
<li><?php _e('4','becorp');?></li>
<li class="zero"><?php _e('0','becorp'); ?></li>
<li><?php _e('4','becorp');?></li>
</ul>
<h3><?php _e('Ooopps!, the page that you requested doesnt exist','becorp');?> </h3>
<div class="return"><?php _e('Return to the','becorp');?> <a href="<?php echo esc_html(site_url());?>"><?php _e('Previous','becorp');?></a>&nbsp;<?php _e('or','becorp');?> <a href="<?php echo esc_html(site_url());?>"><?php _e('Homepage','becorp');?></a></div>
</div>
</div>
</div>
</div>
</div>
</div>

<?php get_footer(); ?>