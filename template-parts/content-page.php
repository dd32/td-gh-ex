<div class="about">
      <div class="row">
      <?php if(has_post_thumbnail()): ?>
        <div class="about_imgarea">
          <?php the_post_thumbnail('page-image', array( 'class'	=> "img-responsive")); ?>
          </div><!--about_imgarea-->
        <?php endif; ?>
        <div class="col-lg-12 clear">
            <?php the_content(); ?>
        </div><!--col-->
      </div><!--row-->
    </div><!--about-->