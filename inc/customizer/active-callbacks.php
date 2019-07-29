<?php

/**
 * All active callbacks are coded here
 */

function apex_business_flag_is_info_boxes_switch() {
    $prime_business_flag = get_theme_mod( 'apex-business-info-boxes-switch-setting');
    if( $prime_business_flag == true ) {
        return true;
    }
    return false;
}

function apex_business_flag_is_introduction_switch() {
    $prime_business_flag = get_theme_mod( 'apex-business-introduction-switch-setting');
    if( $prime_business_flag == true ) {
        return true;
    }
    return false;
}

function apex_business_flag_is_news_switch() {
    $prime_business_flag = get_theme_mod( 'apex-business-news-switch-setting');
    if( $prime_business_flag == true ) {
        return true;
    }
    return false;
}

function apex_business_flag_is_portfolio_switch() {
    $prime_business_flag = get_theme_mod( 'apex-business-portfolio-switch-setting');
    if( $prime_business_flag == true ) {
        return true;
    }
    return false;
}
