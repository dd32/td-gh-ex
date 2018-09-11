

<?php
$posts_per_page = get_theme_mod( 'absolutte_portfolio_items_amount', 12 );

$absolutte_dribbble_token = get_theme_mod( 'absolutte_portfolio_dribbble_token' );
$absolutte_dribbble_user = get_theme_mod( 'absolutte_portfolio_dribbble_user' );

$absolutte_portfolio_columns = rwmb_meta( 'absolutte_portfolio_columns' );
if ( $absolutte_portfolio_columns == '' ) {
    $absolutte_portfolio_columns = '3';
}
if ( isset( $_GET[ 'portfolio_columns' ] ) ) {
    $absolutte_portfolio_columns = sanitize_text_field( wp_unslash( $_GET[ 'portfolio_columns' ] ) );
}


$dribbble_args = array(
    'headers' => array(
        'Authorization' => 'Bearer ' . esc_attr( $absolutte_dribbble_token )
    ),
); 
$absolutte_response = wp_remote_get( 'https://api.dribbble.com/v1/users/' . esc_attr( $absolutte_dribbble_user ), $dribbble_args );

if( ! is_wp_error( $absolutte_response ) ) {

    if ( 200 == $absolutte_response['response']['code'] ) {
        
        $absolutte_response_body = json_decode( $absolutte_response['body'] );
        $absolutte_shots_count = $absolutte_response_body->shots_count;

        $absolutte_drb_shots = wp_remote_get( $absolutte_response_body->shots_url . '?sort=recent&per_page=' . $posts_per_page, $dribbble_args );

            if ( 200 == $absolutte_drb_shots['response']['code'] ) {
                $absolutte_drb_shots_body = json_decode( $absolutte_drb_shots['body'] );

                echo "<div class='portfolio-container masonry portfolio-dribbble " . "absolutte-" . esc_attr( $absolutte_portfolio_columns ) . "-columns" . "' data-post-type='dribbble' data-page='1' data-shots-url='" . esc_url( $absolutte_response_body->shots_url ) . "' data-shots-url='" . esc_attr( $absolutte_response_body->shots_url ) . "' data-per-page='" . esc_attr( $posts_per_page ) . "'>\n\n";
                    foreach ( $absolutte_drb_shots_body as $key => $shot ) {

                        $portfolio_image = $shot->images->hidpi;

                        echo "\t\t\t<div id='portfolio-item-" . esc_attr( $shot->id ) . "' class='portfolio-item'>";
                            echo "\t\t\t\t<a href='" . esc_url( $shot->images->hidpi ) . "' data-width='800' data-height='600'></a>\n";
                            echo '<div class="portfolio-item-hover-preload"></div>';
                            echo '<div class="portfolio-item-hover">';
                                echo '<div class="portfolio-item-content">';
                                    echo '<h4 class="portfolio-item-title">' . esc_html( $shot->title ) . '</h4>';
                                echo "\t\t\t</div>\n";
                            echo "\t\t\t</div>\n";
                            echo '<img src="' . esc_url( $portfolio_image ) . '">';
                        echo "</div>\n";
                    }
                echo "</div><!-- .portfolio_container -->\n\n";

                if ( $absolutte_shots_count > $posts_per_page ) {
                    echo '<div class="portfolio-load-wrapper">';
                        echo '<a href="#" class="portfolio-load-more dribbble-load-more">' . esc_html__( 'Load More', 'absolutte' ) . '<span class="absolutte-spinner"><span class="absolutte-double-bounce1"></span><span class="absolutte-double-bounce2"></span></span></a>';
                    echo '</div>';
                }

            }else{
                echo esc_html( $absolutte_response['body'] );
            }



    }else{
        echo esc_html( $absolutte_response['body'] );
    }


}