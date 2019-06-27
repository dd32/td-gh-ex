        <div class="top-line">
		    <div class="container-fluid">
		          <div class="row">
				     <div class="col-md-10 hidden-xs">
		               <p><?php echo esc_html( get_theme_mod( 'social_section_text_1', 'Welcome Concern Site' )); ?></p>
		             </div> 
		             <div class="col-md-2 text-center">
                      <?php if( get_theme_mod( 'social_section_facebook_url' ) ) : ?>
                       <a title="Facebook" href="<?php echo esc_url( get_theme_mod( 'social_section_facebook_url' ) ); ?>" target="_blank"><i class="ti-facebook"></i></a>
                      <?php endif; ?>
          
                      <?php if( get_theme_mod( 'social_section_twitter_url' ) ) : ?>
                       <a title="Twitter" href="<?php echo esc_url( get_theme_mod( 'social_section_twitter_url' ) ); ?>" target="_blank"><i class="ti-twitter"></i></a>
                      <?php endif; ?>
					  
					  <?php if( get_theme_mod( 'social_section_linkedin_url' ) ) : ?>
                       <a title="Linkedin" href="<?php echo esc_url( get_theme_mod( 'social_section_linkedin_url' ) ); ?>" target="_blank"><i class="ti-linkedin"></i></a>
                      <?php endif; ?>
					  
					  <?php if( get_theme_mod( 'social_section_youtube_url' ) ) : ?>
                       <a title="Youtube" href="<?php echo esc_url( get_theme_mod( 'social_section_youtube_url' ) ); ?>" target="_blank"><i class="ti-youtube"></i></a>
                      <?php endif; ?>
					  
					  <?php if( get_theme_mod( 'social_section_google_url' ) ) : ?>
                       <a title="Google" href="<?php echo esc_url( get_theme_mod( 'social_section_google_url' ) ); ?>" target="_blank"><i class="ti-google"></i></a>
                      <?php endif; ?>


		             </div> 
		          </div>
		    </div>
		 </div>