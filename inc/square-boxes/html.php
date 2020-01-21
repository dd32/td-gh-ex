<?php if ( absint ( get_theme_mod( 'square_boxes_enable_1' , true ) ) ): ?>

    <article id="square-boxes">

        <?php if ( ( current_user_can( 'editor' ) || current_user_can( 'administrator' ) ) && ( !is_customize_preview() ) ) : ?><a href="<?php echo get_admin_url(); ?>customize.php" title="<?php _e( 'Only the Admin and Editor can see this Link' , 'semper-fi-lite' ); ?>"><?php _e( 'Edit Square Boxes?' , 'semper-fi-lite' ); ?></a>
        <?php endif; ?>

<?php if ( absint ( get_theme_mod( 'square_boxes_display_1' , true ) ) ) : ?>
        <section class="square-1">

            <img src="<?php echo esc_url( get_theme_mod( 'square_boxes_img_1' , get_template_directory_uri() . '/inc/square-boxes/images/Chris-Tandem-Skydive-850x478.jpg' ) ); ?>" class="store-front-image"/>

            <h3>
                
                <a href="<?php echo esc_url( get_theme_mod('square_boxes_url_1' , get_admin_url() . 'customize.php' ) ); ?>"><?php echo esc_html( get_theme_mod( 'square_boxes_text_1' , __( 'WordPress' , 'semper-fi-lite' ) ) ); ?></a>
            
            </h3>

        </section>

<?php endif;
        
if ( absint ( get_theme_mod( 'square_boxes_display_2' , true ) ) ) : ?>
        <section class="square-2">

            <img src="<?php echo esc_url( get_theme_mod( 'square_boxes_img_2' , get_template_directory_uri() . '/inc/square-boxes/images/Kara_Skydiving_Sitfly-850x478.jpg' ) ); ?>" class="store-front-image"/>

            <h3>
                
                <a href="<?php echo esc_url( get_theme_mod( 'square_boxes_url_2' , get_admin_url() . 'customize.php' ) ); ?>"><?php echo esc_html( get_theme_mod( 'square_boxes_text_2' , __( 'HTML5' , 'semper-fi-lite' ) ) ); ?></a>
            
            </h3>

        </section>

<?php endif;
        
if ( absint ( get_theme_mod( 'square_boxes_display_3' , true ) ) ) : ?>
        <section class="square-3">

            <img src="<?php echo esc_url( get_theme_mod( 'square_boxes_img_3' , get_template_directory_uri() . '/inc/square-boxes/images/HALO-Skydives-850x478.jpg' ) ); ?>" class="store-front-image"/>

            <h3>
                
                <a href="<?php echo esc_url( get_theme_mod( 'square_boxes_url_3' , get_admin_url() . 'customize.php' ) ); ?>"><?php echo esc_html( get_theme_mod( 'square_boxes_text_3' , __( 'CSS3' , 'semper-fi-lite' ) ) ); ?></a>
            
            </h3>

        </section>

<?php endif;
        
if ( absint ( get_theme_mod( 'square_boxes_display_4' , true ) ) ) : ?>
        <section class="square-4">

            <img src="<?php echo esc_url( get_theme_mod( 'square_boxes_img_4' , get_template_directory_uri() . '/inc/square-boxes/images/Head-Down-Freeflying-Casey-Heather-Paul-850x478.jpg' ) ); ?>" class="store-front-image"/>

            <h3>
                
                <a href="<?php echo esc_url( get_theme_mod( 'square_boxes_url_4' , get_admin_url() . 'customize.php' ) ); ?>"><?php echo esc_html( get_theme_mod( 'square_boxes_text_4' , __( 'JavaScript Free' , 'semper-fi-lite' ) ) ); ?></a>
            
            </h3>

        </section>
<?php endif;
        
if ( absint ( get_theme_mod( 'square_boxes_display_5' , false ) ) ) : ?>
        <section class="square-5">

            <img src="<?php echo esc_url( get_theme_mod( 'square_boxes_img_5' , get_template_directory_uri() . '/inc/square-boxes/images/Chris-Tandem-Skydive-850x478.jpg' ) ); ?>" class="store-front-image"/>

            <h3>
                
                <a href="<?php echo esc_url( get_theme_mod( 'square_boxes_url_5' , get_admin_url() . 'customize.php' ) ); ?>"><?php echo esc_html( get_theme_mod( 'square_boxes_text_5' , __( 'CSS3' , 'semper-fi-lite' ) ) ); ?></a>
            
            </h3>

        </section>

<?php endif;
        
if ( absint ( get_theme_mod( 'square_boxes_display_6' , false ) ) ) : ?>
        <section class="square-6">

            <img src="<?php echo esc_url( get_theme_mod( 'square_boxes_img_6' , get_template_directory_uri() . '/inc/square-boxes/images/Kara_Skydiving_Sitfly-850x478.jpg' ) ); ?>" class="store-front-image"/>

            <h3>
                
                <a href="<?php echo esc_url( get_theme_mod( 'square_boxes_url_6' , get_admin_url() . 'customize.php' ) ); ?>"><?php echo esc_html( get_theme_mod( 'square_boxes_text_6' , __( 'HTML5' , 'semper-fi-lite' ) ) ); ?></a>
            
            </h3>

        </section>

<?php endif;
        
if ( absint ( get_theme_mod( 'square_boxes_display_7' , false ) ) ) : ?>
        <section class="square-7">

            <img src="<?php echo esc_url( get_theme_mod( 'square_boxes_img_7' , get_template_directory_uri() . '/inc/square-boxes/images/HALO-Skydives-850x478.jpg' ) ); ?>" class="store-front-image"/>

            <h3>
                
                <a href="<?php echo esc_url( get_theme_mod( 'square_boxes_url_7' , get_admin_url() . 'customize.php' ) ); ?>"><?php echo esc_html( get_theme_mod( 'square_boxes_text_7' , __( 'CSS3' , 'semper-fi-lite' ) ) ); ?></a>
            
            </h3>

        </section>

<?php endif;
        
if ( absint ( get_theme_mod( 'square_boxes_display_8' , false ) ) ) : ?>
        <section class="square-8">

            <img src="<?php echo esc_url( get_theme_mod( 'square_boxes_img_8' , get_template_directory_uri() . '/inc/square-boxes/images/Head-Down-Freeflying-Casey-Heather-Paul-850x478.jpg' ) ); ?>" class="store-front-image"/>

            <h3>
                
                <a href="<?php echo esc_url( get_theme_mod( 'square_boxes_url_8' , get_admin_url() . 'customize.php' ) ); ?>"><?php echo esc_html( get_theme_mod( 'square_boxes_text_8' , __( 'JavaScript Free' , 'semper-fi-lite' ) ) ); ?></a>
            
            </h3>

        </section>
<?php endif; ?>

    </article>

<?php endif; ?>