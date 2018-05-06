<?php
/**
 * Client Logo  Section
 */
function agensy_logo_page(){
    $agensy_client_logo_enable = get_theme_mod('agensy_client_logo_enable','on');
    if($agensy_client_logo_enable == 'on'){
    ?>
    <section class = "agensy-section-logo agensy-home-section" id = "agensy-scroll-logo">
        <div class = "agensy-container clearfix">
            <div class="agensy-logo-container owl-carousel">
                <?php do_action('agensy_client_logo');  ?>
            </div>
        </div>
    </section>
    <?php 
    }
}

add_action('agensy_logo_page_roles','agensy_logo_page');


/*
* Client logo function
*
*/
if( ! function_exists('agensy_client_logo') ){
    function agensy_client_logo(){
        $agensy_client_logo_rep = get_theme_mod('agensy_client_logo_rep');
        $agensy_logos = json_decode( $agensy_client_logo_rep );
        
        if($agensy_logos){
            foreach( $agensy_logos as $agensy_logo ){ 
            $logo_url = $agensy_logo->cl_logo;
            $cl_link  = $agensy_logo->cl_url;

            $link_open = '';
            $link_close = '';
            if( $cl_link ){
              $link_open = '<a href="'.esc_url($cl_link).'" target="_blank">';
              $link_close = '</a>';
            }
            if( $logo_url ){ ?>
                <div class="client-contents wow fadeInUp">
                   <?php echo $link_open; ?>
                    <div class="client-logo-image">
                        <img src="<?php echo esc_url($logo_url); ?>" alt="<?php the_title_attribute() ?>" title="<?php the_title_attribute() ?>" />
                    </div>
                    <?php echo $link_close; ?>
                </div>
    <?php
           }
           }
    }
         }
}
add_action( 'agensy_client_logo', 'agensy_client_logo' );