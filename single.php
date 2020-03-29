<?php get_header(); ?>
    <section class="esection">
        <div class="father-col clearfix">            
            <div class="col-70">
                <?php if (have_posts()) : 
                    while (have_posts()) : 
                     the_post();
                        ?>
                        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                            <h1> <?php the_title(); ?> </h1>
                            <h2><?php the_category(); ?></h2>
                            <div class="">
                                <?php 
                                the_content(); 
                                the_post_thumbnail();
                                edit_post_link();
                                ?>
                            </div>
                            <div class="dates">
                                <ul>
                                    <li><?php the_time( get_option('date_format') ); ?></li>
                                    <li><?php the_category( ', ' ); ?></li>
                                    <li><?php the_author_link(); ?></li>
                                    <li><?php the_date(); ?></li>
                                </ul>
                            </div><!--.dates-->
                            <div>
                                <div class="table-info">
                                    <div class="">
                                      <!--TO SHOW CUSTOM FIELD GUTEN-->
                                        <h2>
                                            <?php esc_html_e("The Meta Info. Custom Field 1", "baena"); ?>
                                        </h2>
                                      <!--END TO SHOW CUSTOM FIELD GUTEN-->

                                      <!--SHOW ALL INFO ABOUT CUSTOM FIELDS + METABOX FUNCTIONS-->
                                        <h2>
                                            <?php esc_html_e("The Meta Info. Custom Field 2", "baena"); ?>
                                        </h2>
                                        <?php the_meta(); ?>
                                    <!--END SHOW ALL INFO ABOUT CUSTOM FIELDS + METABOX FUNCTIONS-->
                                    
                                    <!--SHOW CUSTOM FIELDS ONLY FUNCTIONS METABOX-->
                                        <h2>
                                            <?php esc_html_e("The Meta Info. Custom Field 3", "baena"); ?>
                                        </h2>
                                        <ul>
                                            <li><?php echo get_post_meta( get_the_ID(), 'book', true );?></li>
                                            <li><?php echo get_post_meta( get_the_ID(), 'author', true );?></li>
                                            <li><?php echo get_post_meta( get_the_ID(), 'format', true );?></li>
                                        </ul>
                                    <!--END SHOW CUSTOM FIELDS ONLY FUNCTIONS METABOX-->
                                    </div><!---->
                                    <div class="">
                                        <h2>The Taxonomies</h2>
                                            <?php the_taxonomies(); ?>
                                    </div>
                                    <div class="">
                                        <h2>The Tags</h2>
                                        <?php the_tags() ?>
                                        <?php the_tags( '<ul><li>', '</li><li>', '</li></ul>' ); ?>
                                       
                                        <?php the_tags( 'Social tagging: ',' > ' ); ?>
                                        <?php the_tags( 'Tags: ', ', ', '<br />' ); ?>
                                    </div>
                                </div><!--.table-info-->
                            </div>    
                        </article>
                    <?php endwhile; endif; ?>

                    <div class="related-post">
                      <?php get_template_part( 'parts/related-post', get_post_format() ); ?>
                    </div><!--.related-post-->
               </div><!--.col-70-->
               
               <div class="col-30">
                  <?php get_sidebar(); ?>
              </div><!--col-30-->
         </div><!--.father-col clearfix-->   
         <div class="father-col clearfix">
          <div>
            <?php comments_template(); ?>
          </div> 
        </div><!--.father-col clearfix-->    
    </section><!--.esection-->  

<?php get_footer(); ?>