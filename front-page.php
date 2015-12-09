<?php


if ( 'page' == get_option( 'show_on_front' ) ) {

		get_header();


	?>
    </div>
    <!-- /END COLOR OVER IMAGE -->
    </header>
    <!-- /END HOME / HEADER  -->

    <div itemprop id="content" class="content-warp" role="main">


        <?php
              get_template_part('/template-parts/aza_header_section');

				      get_template_part('/template-parts/aza_features_section');

				      get_template_part('/template-parts/aza_parallax_section');

							get_template_part('/template-parts/aza_clients_section');

							get_template_part('/template-parts/aza_ribbon_section');

							get_template_part('/template-parts/aza_blog_section');

							get_template_part('/template-parts/aza_team_section');

					    get_template_part('/template-parts/aza_social_section');

				      get_template_part('/template-parts/aza_contact_section');

              get_template_part('/template-parts/aza_map_section');



	?>


    </div>
    <!-- .content-wrap -->

    <?php

	get_footer();
} else {

	include( get_page_template() );
}
?>
