<?php 
/**
 * Get theme mods from options value
 * @uses get_theme_mods()
 * @string $titlelink 
 * @string $hgroup 
 * atv1=Posts and Pages 
 * atv2=Posts Only Not Pages
 * atv3= @since 1.0.9 deprecated
 * atv4= @since 1.0.9 deprecated
 */    
 ?>
     <header class="content-header">

    <?php 
    /**
     * Get theme mods from options value
     * @uses get_theme_mods()
     * @string $titlelink 
     * @string $hgroup
     */    
    if ( get_theme_mods( ) ) :
    $titlelink = get_theme_mod( 'appeal_titlelink_color_setting', 'linkico-gray' );
       $hgroup = get_theme_mod( 'appeal_title_visible_setting', 'atvt1' );
    endif;


   
    /**
     * Posts and Pages but no links
     */
    if( $hgroup == "atvt1" && is_page() || $hgroup == "atvt1" && is_single() ) { 
    ?>

    <h2 class="entry-title"><?php the_title(); ?></h2>

    <?php 
    }
    
    /**
     * Only home page is blog
     */
    elseif( $hgroup == "atvt1" && is_home() && is_front_page() || is_home() ) { 
    ?>
    
    <h2 class="entry-title">
       <a class="text-link"
          href="<?php the_permalink(); ?>"
          title="<?php the_title_attribute(); ?>">
    <span class="genico">
     <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/'. $titlelink .'.png'); ?>"
          alt="link" /></span> <?php the_title(); ?></a></h2> 

    <?php 
    }
    /**
     * Posts Only -not homepage blog- with links
     */
    elseif( $hgroup == "atvt2" ) { 
        
        if ( is_home() ) {
    ?>

    <h2 class="entry-title"><a class="text-link"
          href="<?php the_permalink(); ?>"
          title="<?php the_title_attribute(); ?>">
    <span class="genico">
     <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/'. $titlelink .'.png'); ?>"
          alt="link" /></span> <?php the_title(); ?></a></h2>
             
        <?php } ?>
        <?php
            if ( is_single() ) {
            ?><h2 class="entry-title"><?php the_title(); ?></h2>
            <?php 
            } ?>
    <?php 
    }


    else { 
    /**
     * Everything else 
     */
    ?>
    
    <h2 class="entry-title"><?php the_title(); ?></h2>

    <?php } ?>
    
    <?php  
    $time_format = get_the_date( get_option('date_format') );
    ?>

    <div class="entry-meta">
	    <p class="theauthor"><span class="screen-reader-text">
        <?php esc_html_e(
            'Author Gravatar is shown here. Clickable link to Author page.',
            'appeal' ); ?></span>
        <a data-toggle="modal"
           data-target="#theAuthor"
           href="#"
           title="<?php echo esc_attr( get_the_author_meta( 'nicename' ) ); ?>">

        <?php $alt = __( 'Author Gravatar', 'appeal' );
                echo get_avatar( get_the_author_meta( 'email' ), 42, '', $alt); ?>

        <span class="aspace"> &nbsp; </span> 
        <em><?php esc_html_e( 'Article by: ', 'appeal' );
                  echo nl2br( get_the_author( ) ); ?></em>
        <span class="screen-reader-text">
        <?php esc_html_e( 'Authors link to author website or other works.', 'appeal' ); ?>
        <?php echo esc_attr( get_the_author_meta( 'nicename' ) ); ?></span> </a></p>
        
            <div class="containbox alignright">
                <time class="right-time" 
                      datetime="<?php echo esc_attr( $time_format ); ?>"
                      itemprop="datePublished" pubdate 
                      class="thedate"><?php echo esc_html( $time_format ); ?></time> 
                <div class="count-header">
                <?php if( is_single() ) 
                {
                echo '<span class="show-comment-nmbr"><small>'; 
                printf( _nx( '1 Response', '%1$s Responses', get_comments_number(), 
                'Responses', 'appeal' ), number_format_i18n( get_comments_number() ) );
                echo '</small></span>'; 
                } 
                ?></div>
            </div>
            
    </div>
	   </header><!-- <div class="clearfix"></div>-->
