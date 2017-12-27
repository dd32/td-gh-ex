<?php
/**
 *
 * Displays Author Box
 *
 * @package bestblog
 *
 * @since bestblog 1.0.0
 */
;?>


<div class="single-box-author card z-depth-1">
            <div class="grid-x ">
              <div class="cell large-6 medium-6 small-24 align-self-middle medium-text-left text-center">
                <div class="author-thumb-wrap">
                  <?php echo get_avatar(get_the_author_meta('ID'), '200'); ?>
                </div>
              </div>
              <div class="cell large-18 medium-18 small-24 align-self-middle medium-text-left text-center card-section">
                <div class="author-content-wrap padding-left-lg">
                    <div class="author-title">
                      <a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" title="<?php echo esc_attr( get_the_author() ); ?>">
                        <h3><?php echo get_the_author();?></h3>
                      </a>
                    </div>
                    <div class="author-description">
                    <?php the_author_meta( 'description' ); ?>
                    </div>
                    <div class="bestblog-author-bttom">
                       <button class="floating-action  raised-button button secondary radius">
                          <a class="font-bold" href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" title="<?php echo esc_attr( get_the_author() ); ?>">
                            <?php printf( esc_html__( 'View all posts', 'best-blog' ), esc_attr( get_the_author() ) ); ?>
                          </a>
                        </button>
                    </div>
                </div>
              </div>
            </div>
    </div>
