<?php get_header(); ?>
<section id="content">
<section class="container paddingtop">
      <div class="row">
      <?php 
	  $blog_sidebar=get_theme_mod('blog_sidebar');
	  if(isset($blog_sidebar)&&$blog_sidebar=='left' || $blog_sidebar=='gridleft' || $blog_sidebar=='listleft')
{
	get_sidebar();
}
if(isset($blog_sidebar)&&$blog_sidebar=='full' || $blog_sidebar=='gridfull' || $blog_sidebar=='listfull')
{
	$fullclass='col-lg-12 col-md-12';
}
else
{
	$fullclass='col-lg-8 col-md-8';
}
	  ?>        
       <div class="<?php echo esc_attr($fullclass);?> col-sm-12 col-xs-12">
          <main id="main" class="site-main">
           <?php 
		   $grid=1;
		   if(have_posts()): while(have_posts()): the_post();
		   if(isset($blog_sidebar)&&$blog_sidebar=='gridleft' || $blog_sidebar=='gridright' || $blog_sidebar=='gridfull')
	{
		get_template_part('template-parts/gridstyle/grid');
		if($grid++%2==0)
		{
			echo'<div class="clearfix"></div>';
		}
	}
	elseif(isset($blog_sidebar)&&$blog_sidebar=='listleft' || $blog_sidebar=='listright' || $blog_sidebar=='listfull')
	{
		get_template_part('template-parts/gridstyle/list');
		if($grid++%2==0)
		{
			echo'<div class="clearfix"></div>';
		}
	}
	else
	{
           get_template_part('template-parts/content');    
	}
           ?>
            <!--post-->
           <?php endwhile; ?>
            <nav class="pagination wow fadeInUp">
               <div class="alignleft pull-left"> <?php previous_posts_link(__('&laquo; Older Posts','backyard')); // display newer posts link ?></div>
               <div class="alignright pull-right"> <?php next_posts_link(__('New Posts &raquo;','backyard'));?></div>
             </nav>
          <?php endif; ?>
          </main>
        </div>
        <?php 
	  if(isset($blog_sidebar)&&$blog_sidebar=='right' || $blog_sidebar=='gridright' || $blog_sidebar=='listright')
{
	get_sidebar();
}
	  ?> 
      </div>
    </section>
</section>
<?php get_footer(); ?>