<div id="demo_import" class="rambo-tab-pane">
<div class="demo-import-tab-content info-tab-content">
                <?php if ( has_action( 'rambo_demo_import_content_tab' ) ) {
                    do_action( 'rambo_demo_import_content_tab' );
                } else { ?>
                    <div id="plugin-filter" class="demo-import-boxed">
                        <?php
                        $plugin_name = 'one-click-demo-import';
                        $status = is_dir( WP_PLUGIN_DIR . '/' . $plugin_name );
                        $button_class = 'install-now button';
                        $button_txt = esc_html__( 'Install Now', 'rambo' );
                        if ( ! $status ) {
                            $install_url = wp_nonce_url(
                                add_query_arg(
                                    array(
                                        'action' => 'install-plugin',
                                        'plugin' => $plugin_name
                                    ),
                                    network_admin_url( 'update.php' )
                                ),
                                'install-plugin_'.$plugin_name
                            );

                        } else {
                            $install_url = add_query_arg(array(
                                'action' => 'activate',
                                'plugin' => rawurlencode( $plugin_name . '/' . $plugin_name . '.php' ),
                                'plugin_status' => 'all',
                                'paged' => '1',
                                
                                'external_url' => network_admin_url('themes.php?page=pt-one-click-demo-import'),
                            ), network_admin_url('themes.php?page=pt-one-click-demo-import'));
                            $button_class = 'activate-now button-primary';
                            $button_txt = esc_html__( 'Active Now', 'rambo' );
                        }

                        $detail_link = add_query_arg(
                            array(
                                'tab' => 'plugin-information',
                                'plugin' => $plugin_name,
                                'TB_iframe' => 'true',
                                'width' => '772',
                                'height' => '349',

                            ),
                            network_admin_url( 'plugin-install.php' )
                        );

                        ?>
                        <h3>Importing Dummy Content<h3>
                        <p><strong>One Click Demo Import</strong> is the WordPress Plugin which helps in creating the exact replica of our demo site. Just click the button to proceed further.</p>
                        <h4>Key Notes:</h4>
                    
                            <li>Click the button to install the plugin. Ignore if already installed.</li>
                            <li>Activate the plugin so that they can read the dummy data files from the theme folder and import the content for you.</li>
                            <li>After activation go to Appreance >> Import Demo Data.</li>
                        
                        <?php
                        echo '<p>';
                        printf( esc_html__(
                            '%1$s you will need to install and activate the %2$s plugin first.', 'rambo' ),
                            '<b>'.esc_html__( 'Hey.', 'rambo' ).'</b>',
                            '<a class="thickbox open-plugin-details-modal" href="'.esc_url( $detail_link ).'">'.esc_html__( 'One Click Demo Installer', 'rambo' ).'</a>'
                        );
                        echo '</p>';

                        echo '<p class="plugin-card-'.esc_attr( $plugin_name ).'"><a href="'.esc_url( $install_url ).'" data-slug="'.esc_attr( $plugin_name ).'" class="'.esc_attr( $button_class ).'">'.$button_txt.'</a></p>';
                        ?> 
                         
                        
                    </div>
                <?php } ?>
            </div>


</div>