   <div class="card flex-md-row mb-4 box-shadow h-md-250">
		<div class="col-md-5 thumbnail">
			<?php if ( has_post_thumbnail() ) {the_post_thumbnail('optimize-defaultthumb');} else { ?><img class="card-img-right flex-auto d-none d-md-block" src="<?php echo get_template_directory_uri(); ?>/images/noimage.png" data-holder-rendered="true"/><?php } ?>
			</div>
            <div class="col-md-7 card-body d-flex flex-column align-items-start post-desc">
              <h3 class="mb-0">
				<a class="text-dark"title="<?php the_title(); ?>" href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a>
              </h3>
              <div class="mb-1 text-muted meta"><?php optimize_post_meta_data(); ?> <i class="far fa-folder-open"></i> <?php the_category(', '); echo $wp_query->get_queried_object()->name; ?></div>
              <?php the_excerpt(); ?>           
    </div>
</div>