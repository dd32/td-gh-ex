<?php

if (has_post_thumbnail()): ?>
    <div class="featured-image-container">
        <?php if (!is_single() && !is_page()): ?>

            <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                <?php
                the_post_thumbnail('atlast-agency-blog-list-image', array(
                        'class' => 'blog-item-image img-responsive',
                        'alt' => get_the_title()
                    )
                ); ?>
            </a>
        <?php
        elseif(is_page_template('page-templates/fullwidth-page.php')):
	        the_post_thumbnail('atlast-agency-fullwidth-boxed-image', array(
			        'class' => 'page-image img-responsive',
			        'alt' => get_the_title()
		        )
	        );
        elseif(is_front_page()): ?>
	        <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                <?php
	        the_post_thumbnail('atlast-agency-home-blog-image', array(
			        'class' => 'page-image single-team-image img-responsive',
			        'alt' => get_the_title()
		        )
	        );?>
	        </a>
        <?php else:
            the_post_thumbnail('atlast-agency-blog-single-image', array(
                    'class' => 'blog-item-image single-blog-image img-responsive',
                    'alt' => get_the_title()
                )
            );
        endif; // if is single
        ?>
    </div>
<?php
endif;