<?php 

/**
 * theme template hooks
 *
 * @package affidavit
 */

/**
 * site header
 */
add_action( 'affidavit_header', 'affidavit_template_header' );
function affidavit_template_header(){ ?>
    <div class="container site-menu">
		<nav class="navbar navbar-default" role="navigation">
			<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header">

				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#main-navigation">
				<span class="sr-only"><?php _e( 'Toggle navigation','affidavit' ); ?></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				</button>

				<h1 id="logo"><a class="navbar-brand" href='<?php echo esc_url( home_url( '/' ) ); ?>' title='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>' rel='home'><?php echo esc_html( bloginfo('name') ); ?></a></h1>

			</div>

			<div class="collapse navbar-collapse" id="main-navigation">
				<?php 
				wp_nav_menu( array(
				'menu'              => 'main-nav',
				'theme_location'    => 'main-nav',
				'depth'             => 2,
				'container'         => 'false',
				'container_class'   => 'collapse navbar-collapse',
				'menu_class'        => 'nav navbar-nav navbar-right',
				'fallback_cb'       => 'affidavit_primary_menu_fallback',
				'walker'            => new wp_bootstrap_navwalker())
				);
				
				?>
			</div><!-- /.navbar-collapse -->
		</nav>
    </div>
<?php
}

/**
 * related posts
 */
add_action( 'affidavit_relate_posts', 'affidavit_template_related_posts' );
function affidavit_template_related_posts(){ 
	global $post;
	$related = get_posts( array( 'category__in' => wp_get_post_categories($post->ID), 'numberposts' => 3, 'post__not_in' => array($post->ID) ) );
	if ( get_theme_mod('affidavit_related_posts') ):
	$related_class = 'related-hide';
	else :
	$related_class = '';
	endif;
	if (!empty($related)): ?>

		<div class="related-posts<?php echo " " . esc_attr( $related_class ); ?>">
			<h3 class="entry-footer-title"><?php esc_html_e('You may also like ','affidavit'); ?></h3>
			<div class="row">
			<?php if( $related ): foreach( $related as $post ) { ?>
			<?php setup_postdata($post); ?>
			
				<div class="col-md-4 related-item">
					<div class="related-image">
						<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>">
							<?php $image_thumb = affidavit_catch_that_image_thumb(); $gallery_thumb = affidavit_catch_gallery_image_thumb(); 
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
 * Site information
 */
add_action( 'affidavit_site_info', 'affidavit_template_important_info' );
function affidavit_template_important_info(){ 

    if(shortcode_exists( 'contact_details' )){

    $location   = strip_tags( do_shortcode('[contact_details format="horizontal" fields="address"]') );
    $phone      = strip_tags( do_shortcode('[contact_details format="horizontal" fields="phone"]') );
    $social     = do_shortcode('[contact_details type="social" format="horizontal" fields="twitter,facebook,instagram,pinterest,google_plus,linkedin,vimeo,youtube,github"]');
    $email      = strip_tags( do_shortcode('[contact_details format="horizontal" fields="email"]') );

    ?>
	
        <?php if( $phone ){ ?>
		<div class="site-phone info-item col-md-4">
			<p><?php echo '<span>' . __('Phone','affidavit') . '</span><br>' . esc_html( $phone ); ?></p>
		</div>
        <?php } if( $email ){ ?>
		<div class="site-email info-item col-md-4">
			<p><?php echo '<span>' . __('Email','affidavit') . '</span><br>' . esc_html( $email ); ?></p>
		</div>
        <?php } if( $location ){ ?>
        <div class="site-location info-item col-md-4">
            <p><?php echo '<span>' . __('Address','affidavit') . '</span><br>' . esc_html( $location ); ?></p>
        </div>
        <?php } ?>
                
<?php
    }
}


/**
 * Homepage Sections
 */

add_action( 'affidavit_home_banner', 'affidavit_template_banner', 10 );

function affidavit_template_banner(){ ?>
    <?php 
        $get_banner_sc = get_theme_mod( 'affidavit_section_1' );
        if( $get_banner_sc && shortcode_exists( 'metaslider' ) ) :
    ?>
    <section id="banner">
        <?php echo do_shortcode( $get_banner_sc ); ?>
    </section>
    <?php endif; ?>
<?php
}

add_action( 'affidavit_home', 'affidavit_template_section_1', 10 );
add_action( 'affidavit_home', 'affidavit_template_section_2', 15 );
add_action( 'affidavit_home', 'affidavit_template_section_3', 20 );
add_action( 'affidavit_home', 'affidavit_template_section_4', 30 );
add_action( 'affidavit_home', 'affidavit_template_section_5', 40 );

function affidavit_template_section_1(){

        $get_sec_1_id = get_theme_mod( 'affidavit_section_2' );
        $post_1 = get_post( $get_sec_1_id );
        $content_1 = apply_filters('the_content', $post_1->post_content);

        if( $get_sec_1_id ) :
    ?>
        <section id="section-1" class="section-content">
            <div class="container">
                <?php echo $content_1; ?>
            </div>
            <span class="clearfix"></span>
        </section>
    <?php endif;

}

function affidavit_template_section_2(){

        $get_sec_2_id = get_theme_mod( 'affidavit_section_3' );
        $post_2 = get_post( $get_sec_2_id );
        $content_2 = apply_filters('the_content', $post_2->post_content);

        if( $get_sec_2_id ) :
    ?>
        
        <section id="section-2" class="section-content">
            <div class="container">
                <?php echo $content_2; ?>
            </div>
            <span class="clearfix"></span>
        </section>
    
    <?php endif; 
}

function affidavit_template_section_3(){

        $get_sec_3_id = get_theme_mod( 'affidavit_section_4' );
        $post_3 = get_post( $get_sec_3_id );
        $content_3 = apply_filters('the_content', $post_3->post_content);
        $thumb_url_3 = wp_get_attachment_url( get_post_thumbnail_id($get_sec_3_id) );

        $get_sec_4_id = get_theme_mod( 'affidavit_section_5' );
        $post_4 = get_post( $get_sec_4_id );
        $content_4 = apply_filters('the_content', $post_4->post_content);
        $thumb_url_4 = wp_get_attachment_url( get_post_thumbnail_id($get_sec_4_id) );

        if( $get_sec_3_id ||  $get_sec_4_id) :
    ?>
        
        <section id="section-3">
            <div class="row-eq-height">
                <?php if( $get_sec_3_id ): ?>
                <div class="section-content section-half-1 col-md-6" style="<?php if( $thumb_url_3 ) { ?> background-image: url( <?php echo esc_url( $thumb_url_3 ); ?> ); <?php } ?>">
                    <div class="half-content">
                        <?php echo $content_3; ?>
                    </div>
                </div>
                <?php endif; ?>
                <?php if( $get_sec_4_id ): ?>
                <div class="section-content section-half-2 col-md-6" style="<?php if( $thumb_url_4 ) { ?> background-image: url( <?php echo esc_url( $thumb_url_4 ); ?> ); <?php } ?>">
                    <div class="half-content">
                        <?php echo $content_4; ?>
                    </div>
                </div>
                <?php endif; ?>
            </div>
            <span class="clearfix"></span>
        </section>
    
    <?php endif; 
}

function affidavit_template_section_4(){

        $get_sec_5_id = get_theme_mod( 'affidavit_section_6' );
        $post_5 = get_post( $get_sec_5_id );
        $content_5 = apply_filters('the_content', $post_5->post_content);

        if( $get_sec_5_id ) :
    ?>
        
        <section id="section-4" class="section-content">
            <div class="container">
                <?php echo $content_5; ?>
            </div>
            <span class="clearfix"></span>
        </section>
    
    <?php endif; 
}

function affidavit_template_section_5(){

        $get_sec_6_id = get_theme_mod( 'affidavit_section_7' );
        $post_6 = get_post( $get_sec_6_id );
        $content_6 = apply_filters('the_content', $post_6->post_content);

        if( $get_sec_6_id ) :
    ?>
        
        <section id="section-5" class="section-content">
            <div class="container">
                <?php echo $content_6; ?>
            </div>
            <span class="clearfix"></span>
        </section>
    
    <?php endif; 
}

/**
 * Footer Hooks
 */
add_action( 'affidavit_footer', 'affidavit_template_footer_widgets', 10 );
add_action( 'affidavit_footer', 'affidavit_template_copyright', 15 );

function affidavit_template_footer_widgets(){ 
	if ( is_active_sidebar( 'footer-1' ) || is_active_sidebar( 'footer-2' ) || is_active_sidebar( 'footer-3' ) || is_active_sidebar( 'footer-4' ) ) : ?>
    <div class="footer-area">
        <div class="container">
            <div class="row">
                <div class="footer-widgets wrap">
                        <div class="col-sm-4 footer-item"><?php dynamic_sidebar( 'footer-1' ); ?></div>
                        <div class="col-sm-4 footer-item"><?php dynamic_sidebar( 'footer-2' ); ?></div>
                        <div class="col-sm-4 footer-item"><?php dynamic_sidebar( 'footer-3' ); ?></div>
                    
                    <span class="clearfix"></span>
                </div>
            </div>
        </div>
    </div>
    <?php endif; ?>
<?php
}

function affidavit_template_copyright(){ ?>
    <div class="footer-copyright">
        <div class="container">
            &#169; <?php echo date_i18n('Y') . ' '; bloginfo( 'name' ); ?>
            <span><?php if(is_front_page()): ?>
                - <?php echo __('Built with','affidavit'); ?> <a href="<?php echo esc_url( __( 'http://mylawfirm.online/', 'affidavit' ) ); ?>"><?php printf( esc_html( '%s', 'affidavit' ), 'MyLawfirm.Online' ); ?></a> <span><?php _e('and','affidavit'); ?></span> <a href="<?php echo esc_url( __( 'https://wordpress.org/', 'affidavit' ) ); ?>"><?php printf( esc_html( '%s', 'affidavit' ), 'WordPress' ); ?></a>
            <?php endif; ?>
            </span>
        </div>
    </div>
<?php
}