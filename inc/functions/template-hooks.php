<?php 

/**
 * theme template hooks
 *
 * @package auckland
 */

/**
 * site header
 */
add_action( 'auckland_header', 'auckland_template_header' );
function auckland_template_header(){ ?>
    <header id="site-header" class="container">
        
        <nav class="navbar navbar-default" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">

                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#main-navigation">
                <span class="sr-only"><?php _e( 'Toggle navigation','auckland' ); ?></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                </button>

                <?php if ( function_exists( 'the_custom_logo' ) && has_custom_logo() ): 
                $auckland_custom_logo_id = get_theme_mod( 'custom_logo' );
                $image = wp_get_attachment_image_src( $auckland_custom_logo_id,'full');
                ?>
                <h1 id="logo"><a href='<?php echo esc_url( home_url( '/' ) ); ?>' title='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>' rel='home'><img src="<?php echo esc_url( $image[0] ); ?>"></a></h1>
                <?php else : ?>
                <h1 id="logo"><a href='<?php echo esc_url( home_url( '/' ) ); ?>' title='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>' rel='home'><?php echo esc_html( bloginfo('name') ); ?></a></h1>
                <?php endif; ?>

            </div>

            <div class="collapse navbar-collapse" id="main-navigation">
                <?php 
                if ( has_nav_menu( 'main-nav' ) ) {
                wp_nav_menu( array(
                'theme_location'    => 'main-nav',
                'depth'             => 2,
                'container'         => 'false',
                'container_class'   => 'collapse navbar-collapse',
                'container_id'      => 'bs-navbar-collapse-1',
                'menu_class'        => 'nav navbar-nav navbar-right',
                'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
                'walker'            => new wp_bootstrap_navwalker())
                );
                }
                else{
                echo "<div class='pull-right'><p>Appearance &#8594; Menus &#8594; Primary Menu</p></div>";
                } 
                ?>
            </div><!-- /.navbar-collapse -->
        </nav>
    </header>
<?php
}

/**
 * related posts
 */

function auckland_template_related_posts(){ 
	global $post;
	$related = get_posts( array( 'category__in' => wp_get_post_categories($post->ID), 'numberposts' => 3, 'post__not_in' => array($post->ID) ) );
	if ( get_theme_mod('auckland_related_posts') ):
	$related_class = 'related-hide';
	else :
	$related_class = '';
	endif;
	if (!empty($related)): ?>

		<div class="related-posts<?php echo " " . esc_attr( $related_class ); ?>">
			<div class="row">
			<?php if( $related ): foreach( $related as $post ) { ?>
			<?php setup_postdata($post); ?>
			
				<div class="col-md-4 related-item">
					<div class="related-image">
						<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>">
							<?php $image_thumb = auckland_catch_that_image_thumb(); $gallery_thumb = auckland_catch_gallery_image_thumb(); 
							if ( has_post_thumbnail()):
							the_post_thumbnail('600x600');  
							elseif(has_post_format('gallery') && !empty($gallery_thumb)): 
							echo $gallery_thumb; 
							elseif(has_post_format('image') && !empty($image_thumb)): 
							echo '<img src="'. esc_url($image_thumb) . '">'; 
							else: ?>
							<?php $blank = get_template_directory_uri() . '/assets/images/blank.jpg'; ?>
							<img src="<?php echo esc_url($blank); ?>">
							<?php endif; ?>
						</a>
					</div>

					<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>

				</div>
			

			<?php } endif; wp_reset_postdata(); ?>

			</div>

		</div>
	<?php endif; 
}

/**
 * Footer
 */

function auckland_template_footer(){ ?>
    <div class="row">
        <div class="col-md-6">
            <p class="footer-site-name"><?php echo esc_html( get_bloginfo('name') ); ?></p>
            <p class="copyright">&#169; <?php echo date_i18n(__('Y','auckland')) . ' '; bloginfo( 'name' ); ?>
            <span><?php if(is_home() || is_front_page()): ?>
                - <?php _e( 'Thanks to', 'auckland' ); ?> <a href="<?php echo esc_url( __( 'https://wordpress.org/', 'auckland' ) ); ?>"><?php printf( esc_html( '%s', 'auckland' ), 'WordPress' ); ?></a> <span><?php _e('and','auckland'); ?></span> <a href="<?php echo esc_url( __( 'http://charlescoxhead.com/', 'auckland' ) ); ?>"><?php printf( esc_attr( '%s', 'auckland' ), 'Charles' ); ?></a>
            <?php endif; ?>
            </span></p>
        </div>
        <div class="col-md-6">
            <nav>
                <?php
                if ( has_nav_menu( 'footer-nav' ) ) {
                wp_nav_menu( array(
                'theme_location'    => 'footer-nav',
                'depth'             => 1,
                'container'         => 'false',
                'menu_class'        => 'footer-menu',
                'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
                'walker'            => new wp_bootstrap_navwalker())
                );
                } ?>
            </nav>
            <?php if ( has_nav_menu( 'social-nav' ) ) : ?>
                <nav class="social-navigation" role="navigation" aria-label="<?php _e( 'Social Links Menu', 'auckland' ); ?>">
                    <?php
                    wp_nav_menu( array(
                    'theme_location' => 'social-nav',
                    'menu_class'     => 'social-links-menu',
                    'depth'          => 1,
                    'link_before'    => '<span class="screen-reader-text">',
                    'link_after'     => '</span>' . auckland_get_svg( array( 'icon' => 'chain' ) ),
                    ) );
                    ?>
                </nav><!-- .social-navigation -->
            <?php endif; ?>
        </div>
    </div>
<?php
}


/**
 * Meta Tags
 */
function auckland_entry_meta(){

    $byline = sprintf(

        esc_html( '%s', 'auckland' ),
        '<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . get_the_author() . '</a></span>'
    );

    $time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
    if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
        $time_string = '<time class="updated" datetime="%3$s">%4$s</time>';
    }

    $time_string = sprintf( $time_string,
        get_the_date( DATE_W3C ),
        get_the_date(),
        get_the_modified_date( DATE_W3C ),
        get_the_modified_date()
    );

    $get_category_list = get_the_category_list( __( ', ', 'auckland' ) );
    $cat_list = sprintf( esc_html('%s', 'auckland'),
    $get_category_list
    );

    echo '<span class="posted-on"><i class="fa fa-calendar" aria-hidden="true"></i>' . $time_string . '</span><span class="byline"><i class="fa fa-user" aria-hidden="true"></i>' . $byline . '</span><span class="cat-list"><i class="fa fa-folder-open" aria-hidden="true"></i>'. $cat_list .'</span>';
}


add_action( 'auckland_entry_footer', 'auckland_post_tag', 10 );
add_action( 'auckland_entry_footer', 'auckland_next_prev_post', 15 );
add_action( 'auckland_entry_footer', 'auckland_author_bio', 20 );

function auckland_post_tag(){ 

    $get_category_list = get_the_category_list( __( ', ', 'auckland' ) );
    $cat_list = sprintf( esc_html('%s', 'auckland'),
    $get_category_list
    );

    ?>
    <div class="cat-tag-links">
        <?php if(has_tag()): ?>
        <p><i class="fa fa-tag" aria-hidden="true"></i><?php echo ' ' . get_the_tag_list('','',''); ?></p>
        <?php endif; ?>
        <?php if(has_category()): ?>
        <p><i class="fa fa-folder-open" aria-hidden="true"></i><?php echo ' ' . $get_category_list; ?></p>
        <?php endif; ?>
    </div>
    <?php
}

function auckland_author_bio(){ ?>
    <div class="author-info">
      <div class="avatar">
        <?php echo get_avatar( get_the_author_meta( 'ID' ) , 100 ); ?>
      </div>
      <div class="info">
          <p class="author-name"><span><?php _e('Posted By ','auckland'); ?></span><?php the_author(); ?></p>
          <?php echo get_the_author_meta('description'); ?>
      </div>
      <span class="clearfix"></span>
    </div> 
    <?php
}

function auckland_next_prev_post(){
    ?>
        <div class="next-prev-post">
            <div class="prev col-xs-6">
                <?php previous_post_link('&larr; %link'); ?>
            </div>
            <div class="next col-xs-6">
                <?php next_post_link('%link &rarr;'); ?>
            </div>
            <span class="clearfix"></span>
        </div>
    <?php
}