<?php

if (has_post_thumbnail()): ?>
    <div class="featured-image-container">
        <?php if (!is_single() && !is_page()): ?>

            <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                <?php
                the_post_thumbnail('atlast_business_layout-1-image', array(
                        'class' => 'blog-item-image img-responsive',
                        'alt' => get_the_title()
                    )
                ); ?>
            </a>
        <?php
        elseif(is_page_template('page-templates/fullwidth-page.php')):
	        the_post_thumbnail('atlast_business_fullwidth-boxed-image', array(
			        'class' => 'page-image img-responsive',
			        'alt' => get_the_title()
		        )
	        );
        elseif(is_page_template('page-templates/team-member-page.php')):
	        the_post_thumbnail('atlast_business_single-team', array(
			        'class' => 'page-image single-team-image img-responsive',
			        'alt' => get_the_title()
		        )
	        );
        else:
            the_post_thumbnail('atlast_business_layout-1-image', array(
                    'class' => 'blog-item-image img-responsive',
                    'alt' => get_the_title()
                )
            );
        endif; // if is single
        ?>
        <?php if (!is_page()): ?>
            <div class="blog-item-categories">
                <?php echo atlast_business_post_categories(); ?>
            </div>
        <?php endif; ?>
    </div>
<?php
endif;