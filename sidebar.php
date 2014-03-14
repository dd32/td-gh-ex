<?php
/**
 * The Sidebar containing the main widget areas.
 */
?>
		<div id="sidebar" class="widget-area col300" role="complementary">

			<div class="sidebar-inner-wrap">
			
			<?php if ( ! dynamic_sidebar( 'sidebar-right' ) ) : ?>
                
                <aside id="recent-posts" class="widget">
					<div class="widget-title"><?php _e( 'Recent Posts', 'virality' ); ?></div>
                    <ul>
                        <?php
                            $args = array( 'numberposts' => '10', 'post_status' => 'publish' );
                            $recent_posts = wp_get_recent_posts( $args );
                            
                            foreach( $recent_posts as $recent ){
                                if ($recent["post_title"] == '') {
                                     $recent["post_title"] = __('Untitled', 'virality');
                                }
                                echo '<li class="recent-li">';
                                echo '<div class="recent-thumb"><a href="' . get_permalink($recent["ID"]) . '" title="Look '.esc_attr($recent["post_title"]).'" >' . get_the_post_thumbnail($recent["ID"], array(500, 300)) . '</a></div>';
                                echo '<a href="' . get_permalink($recent["ID"]) . '" title="Look '.esc_attr($recent["post_title"]).'" >' . $recent["post_title"] .'</a> </li> ';
                            }
                        ?>
                    </ul>
				</aside>

				

			<?php endif; // end sidebar widget area ?>
            
            </div>
            
		</div><!-- #sidebar .widget-area -->
