<?php
/**
 * THis file include inline style from theme options
 *
 * @package Indigos
 */
?>
<style type="text/css">
    <?php if ( of_get_option( 'custom_font', 'no entry' )==1) : ?>
    <?php $typography = of_get_option('logo_text');
                        if ($typography) {
                            echo '.header .wrap .logo h1{';
                            echo 'font-size:' . $typography['size'] . ';';
                            echo 'font-family:' . $typography['face'] . ';';
                            echo 'color:' . $typography['color'] . '; }';
                        }

    ?>
    <?php $typography = of_get_option('logo_desc');
                        if ($typography) {
                            echo '.header .wrap .logo span{';
                            echo 'font-size:' . $typography['size'] . ';';
                            echo 'font-family:' . $typography['face'] . ';';
                            echo 'color:' . $typography['color'] . '; }';
                        }

    ?>
    <?php $typography = of_get_option('menu_font');
                        if ($typography) {
                            echo '.header .main-menu ul li a, .header .menu ul li a{';
                            echo 'font-size:' . $typography['size'] . ';';
                            echo 'font-family:' . $typography['face'] . ';';
                            echo 'color:' . $typography['color'] . '; }';
                        }

    ?>
    <?php $typography = of_get_option('body_font');
                        if ($typography) {
                            echo 'body{';
                            echo 'font-size:' . $typography['size'] . ';';
                            echo 'font-family:' . $typography['face'] . ';';
                            echo 'color:' . $typography['color'] . '; }';
                        }

    ?>
    <?php $typography = of_get_option('title_font');
                        if ($typography) {
                            echo '.content h1{';
                            echo 'font-size:' . $typography['size'] . ';';
                            echo 'font-family:' . $typography['face'] . ';';
                            echo 'color:' . $typography['color'] . '; }';
                        }

    ?>
    <?php $typography = of_get_option('sidebar_title_font');
                        if ($typography) {
                            echo '.news h3, .content .widget h3, .contacts-box .rights label{';
                            echo 'font-size:' . $typography['size'] . ';';
                            echo 'font-family:' . $typography['face'] . ';';
                            echo 'color:' . $typography['color'] . '; }';
                        }

    ?>
    <?php $typography = of_get_option('sidebar_link_font');
                        if ($typography) {
                            echo '.inside .right-parta{';
                            echo 'font-size:' . $typography['size'] . ';';
                            echo 'font-family:' . $typography['face'] . ';';
                            echo 'color:' . $typography['color'] . '; }';
                        }

    ?>
    <?php $typography = of_get_option('links_font');
                        if ($typography) {
                            echo '.container  a{';
                            echo 'font-size:' . $typography['size'] . ';';
                            echo 'font-family:' . $typography['face'] . ';';
                            echo 'color:' . $typography['color'] . '; }';
                        }

    ?>
    <?php $typography = of_get_option('footer_titles_font');
                        if ($typography) {
                            echo '.footer .bottom .wrap .box h4{';
                            echo 'font-size:' . $typography['size'] . ';';
                            echo 'font-family:' . $typography['face'] . ';';
                            echo 'color:' . $typography['color'] . '; }';
                        }

    ?>
    <?php $typography = of_get_option('footer_links_font');
                        if ($typography) {
                            echo '.footer a, .footer ul li a{';
                            echo 'font-size:' . $typography['size'] . ';';
                            echo 'font-family:' . $typography['face'] . ';';
                            echo 'color:' . $typography['color'] . '; }';
                        }

    ?>
    <?php $typography = of_get_option('footer_text_font');
                        if ($typography) {
                            echo '.footer{';
                            echo 'font-size:' . $typography['size'] . ';';
                            echo 'font-family:' . $typography['face'] . ';';
                            echo 'color:' . $typography['color'] . '; }';
                        }

    ?>
    <?php endif; ?>

    <?php/* if (of_get_option('general') <> '') : ?>
    .header, .footer .bottom {
        background: <?php echo of_get_option('general'); ?>;
    }
    .contacts-box .rights .submit{
        border-color: <?php echo of_get_option('general'); ?>;
    }
    <?php endif; ?>
    <?php if (of_get_option('bg') <> '') : ?>
    body {
        background: <?php echo of_get_option('bg'); ?>;
    }
    <?php endif; ?>
    <?php if (of_get_option('second') <> '') : ?>
    .line-bg, .header .main-menu ul li.current-menu-item a, .header .main-menu ul li:hover a, .header .main-menu ul li.current-menu-ancestor a, .header .menu ul li:hover a, .footer .contact-box{
        background-color: <?php echo of_get_option('second'); ?>;
    }

    .header .line-bg {
        border-bottom: 7px solid <?php echo of_get_option('second'); ?>;
    }

    <?php endif; */ ?>

</style>
