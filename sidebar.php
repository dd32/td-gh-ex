<div id="sidebar">
    <aside>

        <!-- Remove this box for pure 3-columns -->
        <div id="adbox">
            <ul>
                <li>
                    <?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
                    <?php dynamic_sidebar( 'sidebar-1' ); ?>
					    <?php else : ?> 					    	
                    <?php endif; ?>
                </li>
            </ul>
        </div>
        <!-- /Remove this box for pure 3-columns -->

        <!-- Left_sidebar starts -->
        <div id="l_sidebar">
            <ul>
                <li>
                    <?php if ( is_active_sidebar( 'sidebar-2' ) ) : ?>
                    <?php dynamic_sidebar( 'sidebar-2' ); ?>
					
                    <?php endif; ?>
                </li>
            </ul>
        </div>
        <!-- /l_sidebar-->

        <!-- Right_sidebar starts -->
        <div id="r_sidebar">
            <ul>
                <li>
                    <?php if ( is_active_sidebar( 'sidebar-3' ) ) : ?>
					<?php dynamic_sidebar( 'sidebar-3' ); ?> 
					
                    <?php endif; ?>
                </li>
            </ul>
        </div>
        <!-- /r_sidebar-->

    </aside>
</div>
<!-- /sidebar-->
