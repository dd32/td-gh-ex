        <div class="logo-area"> 
            <div class="container-fluid"> 
                <div class="row"> 
                    <div class="col-xs-12 col-sm-12 col-md-7 col-lg-7"> 

					   <div class="site-branding">
			              <?php
			                the_custom_logo();
			                if ( is_front_page() && is_home() ) :
				            ?>
				           <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
				          <?php
			               else :
				           ?>
				           <p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
				          <?php
			              endif;
			              $atlas_concern_description = get_bloginfo( 'description', 'display' );
			              if ( $atlas_concern_description || is_customize_preview() ) :
				           ?>
				          <p class="site-description"><?php echo esc_html($atlas_concern_description); /* WPCS: xss ok. */ ?></p>
			              <?php endif; ?>
		               </div><!-- .site-branding -->

                    </div>                     
                           

                                <div class="informations pull-right col-xs-12 col-sm-12 col-md-3 col-lg-3"> 
							
                                    <div class="icon"> 
                                        <i class="<?php echo esc_attr( get_theme_mod( 'message_section_icon' ) ); ?>"></i> 
                                    </div>                                     
                                    <div class="info"> 
                                        <span><?php echo esc_html( get_theme_mod( 'message_section_text' ) ); ?></span> 
                                        <p><?php echo esc_textarea( get_theme_mod( 'message_section_textarea' ) ); ?></p>
                                    </div>                                     
                               
								</div>                           
                                               
                    </div>                     
                </div>                 
            </div>             
  