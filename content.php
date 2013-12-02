                            <!-- ENTRY NO:<?php the_ID(); ?> -->
                            <div id="entry-<?php the_ID(); ?>" <?php post_class(); ?>>
                                <?php autoadjust_entry_thumbnail(); ?>
                                <div class="entry">
                                    <?php autoadjust_entry_edit(); ?>
                                    <h1 class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
                                    <?php autoadjust_entry_before();
                                    the_content(__('Continue Reading &rarr;', 'autoadjust'));
                                    wp_link_pages(array('before' => '<div class="pagination">'.__('Pages:', 'autoadjust'), 'after' => '</div>'));
                                    autoadjust_entry_after(); ?>
                                </div>
                            </div>
                            <!-- ENTRY NO:<?php the_ID(); ?> END -->                     
