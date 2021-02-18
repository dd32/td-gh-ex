<?php global $wp_query;
if ( $wp_query->max_num_pages > 1 ) { ?>
    <ul id="nav-below" class="pagination">
        <li class="page-item page-prev">
            <div class="page-item-subtitle">
	            <?php previous_posts_link( sprintf( __( ' %s Previous posts', 'atlast-business' ), '<span class="meta-nav">&larr;</span>' ) ) ?>
            </div>
        </li>
        <li class="page-item page-next">
            <div class="page-item-subtitle">
		        <?php next_posts_link( sprintf( __( 'Next posts %s', 'atlast-business' ), '<span class="meta-nav">&rarr;</span>' ) ) ?>
            </div>
        </li>
    </ul>
<?php } ?>
