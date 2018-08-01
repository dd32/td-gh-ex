<?php
$prefix    = atlast_agency_get_prefix();
$aboutPage = get_theme_mod( $prefix . '_home_about_page', '' );
if ( absint( $aboutPage ) != 0 ):
	$pageID = $aboutPage;
	?>
    <div id="home-about" class="homepage about-section about-style-1 pad-tb-60">
		<?php
		$page    = get_post( $pageID );
		$thumbID = get_post_thumbnail_id( $page->ID );
		$src     = wp_get_attachment_image_src( $thumbID, 'full' );
		?>
        <div class="columns col-gapless">
            <div class="column col-7 col-xs-12 col-md-12" style="height:600px;
                    background: url(<?php echo esc_url( $src[0] ); ?>) no-repeat center;
                    background-size: cover;">

            </div>
            <div class="column col-5 col-xs-12 col-md-12">
                <div class="about-content-wrapper">
                    <h2><?php echo esc_html($page->post_title);?></h2>
                    <div class="about-content">
                        <p><?php echo esc_html($page->post_excerpt); ?></p>
                        <a href="<?php echo esc_url(get_the_permalink($pageID));?>" class="section-link">
                            <?php echo esc_html__('Read More','atlast-agency');?>
                        </a>
                    </div>

                </div>

            </div>
        </div>
    </div>
<?php endif; ?>