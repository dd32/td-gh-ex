<div class="about">
      <div class="row">
      <?php if(has_post_thumbnail()): ?>
        <div class="about_imgarea">
          <?php the_post_thumbnail('abaya-page-image', array( 'class'	=> "img-responsive")); ?>
          </div><!--about_imgarea-->
        <?php endif; ?>
        <div class="col-lg-12 clear">
            <?php the_content();
	wp_link_pages( array(
	'before'      => '<div class="page-links"><span class="page-links-title">'.__( 'Pages:', 'abaya').'</span>',
	'after'       => '</div>',
	'link_before' => '<span>',
	'link_after'  => '</span>',
	) );
			 ?>
        </div><!--col-->
      </div><!--row-->
    </div><!--about-->