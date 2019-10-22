        <?php
        
        $args = array(
            'taxonomy'   => "product_cat",
            'number'     => $number,
            'orderby'    => $orderby,
            'order'      => $order,
            'hide_empty' => $hide_empty,
            'include'    => $ids );
        
        $product_categories = get_terms($args);
        
        foreach( $product_categories as $cat ) { echo $cat->name; } ?>














            <ul>
                
                <li>

                <h1><a rel="home" itemprop="url" href="<?php echo home_url(); ?>"><span itemprop="name"><?php bloginfo('name'); ?></span></a></h1>
                
                </li>

            </ul>
