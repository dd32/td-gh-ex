<?php
$prefix          = atlast_agency_get_prefix();
$isEnabled       = get_theme_mod( $prefix . '_enable_team_section', false );
$teamParent = absint(get_theme_mod($prefix . '_team_parent_page', ''));
$teamBg = get_the_post_thumbnail_url($teamParent,'full');
$teamColor = '';
if ( $isEnabled == true ):
    ?>
    <div id="home-team" class="homepage team-section pad-tb-120" <?php echo ($teamBg != false ? ' style="background:url('.esc_url($teamBg).') center no-repeat; background-size:cover;"' :'');?>>
        <?php get_template_part( 'template-parts/custom-pages/homepage/team/team-style-1'); ?>
    </div>

<?php endif; ?> 