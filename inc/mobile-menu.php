                    <div class="navbar-header"> 
					    <div class="menu-icon pull-left hidden-lg hidden-md">              
                           <a href="javascript:void(0)" onclick="openNav()"><i class="ti-menu"></i> </a>
                        </div>
					
                       <div id="mySidenav" class="sidenav">
                       <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
                          <?php wp_nav_menu( array(
                                'menu' => 'Primary',
                                'menu_class' => 'mobil-menu',
                                'container' => '',
                                'fallback_cb' => 'wp_bootstrap_navwalker::fallback',
                                'walker' => new wp_bootstrap_navwalker()
                        ) ); ?> 
                         </div>

                       
                    </div>  