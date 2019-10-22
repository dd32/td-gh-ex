<?php if ( get_theme_mod( 'square_boxes_enable_1' , true ) ) : ?>

    <article id="square-boxes">

        <?php if ( (current_user_can('editor') || current_user_can('administrator')) && (!is_customize_preview()) ) : ?><a href="<?php echo get_admin_url(); ?>customize.php" title="Only the Admin and Editor can see this Link">Edit Square Boxes?</a>
        <?php endif; ?>

<?php if ( get_theme_mod( 'square_boxes_display_1' , true ) ) : ?>
        <section>

            <img src="<?php echo get_theme_mod( 'square_boxes_img_1' , get_template_directory_uri() . '/images/Chris-Tandem-Skydive-850x478.jpg' ); ?>" class="store-front-image"/>

            <h3>
                
                <a href="<?php echo get_theme_mod('square_boxes_url_1' , get_admin_url() . 'customize.php' ); ?>"><?php echo get_theme_mod( 'square_boxes_text_1' , 'WordPress' ); ?></a>
            
            </h3>

        </section>

<?php endif;
        
if ( get_theme_mod( 'square_boxes_display_2' , true ) ) : ?>
        <section>

            <img src="<?php echo get_theme_mod( 'square_boxes_img_2' , get_template_directory_uri() . '/images/Kara_Skydiving_Sitfly-850x478.jpg' ); ?>" class="store-front-image"/>

            <h3>
                
                <a href="<?php echo get_theme_mod( 'square_boxes_url_2' , get_admin_url() . 'customize.php' ); ?>"><?php echo get_theme_mod( 'square_boxes_text_2' , 'HTML5' ); ?></a>
            
            </h3>

        </section>

<?php endif;
        
if ( get_theme_mod( 'square_boxes_display_3' , true ) ) : ?>
        <section>

            <img src="<?php echo get_theme_mod( 'square_boxes_img_3' , get_template_directory_uri() . '/images/HALO-Skydives-850x478.jpg' ); ?>" class="store-front-image"/>

            <h3>
                
                <a href="<?php echo get_theme_mod( 'square_boxes_url_3' , get_admin_url() . 'customize.php' ); ?>"><?php echo get_theme_mod( 'square_boxes_text_3' , 'CSS3' ); ?></a>
            
            </h3>

        </section>

<?php endif;
        
if  ( get_theme_mod( 'square_boxes_display_4' , true ) ) : ?>
        <section>

            <img src="<?php echo get_theme_mod( 'square_boxes_img_4' , get_template_directory_uri() . '/images/Head-Down-Freeflying-Casey-Heather-Paul-850x478.jpg' ); ?>" class="store-front-image"/>

            <h3>
                
                <a href="<?php echo get_theme_mod( 'square_boxes_url_4' , get_admin_url() . 'customize.php' ); ?>"><?php echo get_theme_mod( 'square_boxes_text_4' , 'JavaScript Free' ); ?></a>
            
            </h3>

        </section>
<?php endif;
        
if ( get_theme_mod( 'square_boxes_display_5' , true ) ) : ?>
        <section>

            <img src="<?php echo get_theme_mod( 'square_boxes_img_5' , get_template_directory_uri() . '/images/Chris-Tandem-Skydive-850x478.jpg' ); ?>" class="store-front-image"/>

            <h3>
                
                <a href="<?php echo get_theme_mod( 'square_boxes_url_5' , get_admin_url() . 'customize.php' ); ?>"><?php echo get_theme_mod( 'square_boxes_text_5' , 'CSS3' ); ?></a>
            
            </h3>

        </section>

<?php endif;
        
if ( get_theme_mod( 'square_boxes_display_6' , true ) ) : ?>
        <section>

            <img src="<?php echo get_theme_mod( 'square_boxes_img_6' , get_template_directory_uri() . '/images/Kara_Skydiving_Sitfly-850x478.jpg' ); ?>" class="store-front-image"/>

            <h3>
                
                <a href="<?php echo get_theme_mod( 'square_boxes_url_6' , get_admin_url() . 'customize.php' ); ?>"><?php echo get_theme_mod( 'square_boxes_text_6' , 'HTML5' ); ?></a>
            
            </h3>

        </section>

<?php endif;
        
if ( get_theme_mod( 'square_boxes_display_7' , true ) ) : ?>
        <section>

            <img src="<?php echo get_theme_mod( 'square_boxes_img_7' , get_template_directory_uri() . '/images/HALO-Skydives-850x478.jpg' ); ?>" class="store-front-image"/>

            <h3>
                
                <a href="<?php echo get_theme_mod( 'square_boxes_url_7' , get_admin_url() . 'customize.php' ); ?>"><?php echo get_theme_mod( 'square_boxes_text_7' , 'CSS3' ); ?></a>
            
            </h3>

        </section>

<?php endif;
        
if  ( get_theme_mod( 'square_boxes_display_8' , true ) ) : ?>
        <section>

            <img src="<?php echo get_theme_mod( 'square_boxes_img_8' , get_template_directory_uri() . '/images/Head-Down-Freeflying-Casey-Heather-Paul-850x478.jpg' ); ?>" class="store-front-image"/>

            <h3>
                
                <a href="<?php echo get_theme_mod( 'square_boxes_url_8' , get_admin_url() . 'customize.php' ); ?>"><?php echo get_theme_mod( 'square_boxes_text_8' , 'JavaScript Free' ); ?></a>
            
            </h3>

        </section>
<?php endif; ?>

    </article>

<?php endif; ?>