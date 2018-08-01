<?php
$prefix    = atlast_agency_get_prefix();
$aboutPage = get_theme_mod( $prefix . '_home_about_page', '' );
if ( absint( $aboutPage ) != 0 ):
	$pageID = $aboutPage;
	?>
    <div id="home-about" class="homepage about-section about-style-2 pad-tb-60">

		<?php
		$page    = get_post( $pageID );
		$thumbID = get_post_thumbnail_id( $page->ID );
		$src     = wp_get_attachment_image_src( $thumbID, 'atlast-agency-about-2-image' );
		?>

        <div class="container grid-xl">
            <div class="columns">
                <div class="column col-7 col-md-12 col-xs-12">
                    <div class="about-image-wrapper">
                        <img src="<?php echo esc_url( $src[0] ); ?>" class="img-responsive"/>
                    </div>
                </div>
                <div class="column col-5 col-md-12 col-xs-12">
                    <div class="about-content-wrapper">
                        <h2><?php echo esc_html( $page->post_title ); ?></h2>
                        <div class="about-content">
                            <p><?php echo esc_html( $page->post_excerpt ); ?></p>
                            <a href="<?php echo esc_url( get_the_permalink( $pageID ) ); ?>" class="section-link">
								<?php echo esc_html__( 'Read More', 'atlast-agency' ); ?>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
<?php endif; ?>