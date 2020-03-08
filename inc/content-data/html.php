                <aside id="article-microdata">

                    <?php echo get_avatar( get_the_author_meta( 'ID') , 150); ?>
                    
                    <p>
                        <strong itemprop="author" itemscope itemtype="https://schema.org/Person">
                           
                            <span itemprop="name"><?php the_author(); ?></span>
                        
                        </strong>
                        
                        <?php _e( 'published "' , 'semper-fi-lite' ); if ( get_the_title() ) { the_title();} else { _e( '(No Title)', 'semper-fi-lite' ); } ?>" <?php _e( 'on ' , 'semper-fi-lite' ); ?>
                        
                        <time itemprop="datePublished" content="<?php /* Not visible to the user, microdata needs to be in this specifc format for search engines https://schema.org/datePublished */ the_time('Y-m-d H:i') ?>" >
                            
                            <?php the_date(); ?>
                        
                        </time>
                        
                        <?php _e( 'and was last modified on ' , 'semper-fi-lite' ); ?>
                        
                        <time itemprop="dateModified" content="<?php /* Not visible to the user, microdata needs to be in this specifc format for search engines https://schema.org/datePublished */ the_modified_date('Y-m-d H:i'); ?>">
                            
                            <?php the_modified_date(); ?>
                        </time>
                        
                    .</p>

                    <div itemprop="publisher" itemscope itemtype="https://schema.org/Organization">
                        
                        <div itemprop="logo" itemscope itemtype="https://schema.org/ImageObject">
                            
                            <img src="<?php echo esc_url( get_theme_mod( 'publisher_logo_img_1' , get_template_directory_uri() . '/inc/blog/images/publisher-logo-600x60.jpg' ) ); ?>" class="microdata-publisher-logo"/>
                            
                            <meta itemprop="url" content="<?php echo esc_url( get_theme_mod( 'publisher_logo_img_1' , get_template_directory_uri() . '/inc/blog/images/publisher-logo-600x60.jpg' ) ); ?>">
                            
                            <meta itemprop="width" content="600">
                            
                            <meta itemprop="height" content="60">
                        
                        </div>
                        
                        <meta itemprop="name" content="<?php bloginfo('name'); ?>">
                    
                    </div>
                
                </aside>