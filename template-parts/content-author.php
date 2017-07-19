<?php
/**
 * Template part for displaying author details.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package aquaparallax
 */
?>

<?php
// Get Author Data
$author             = get_the_author();
$author_description = get_the_author_meta( 'description' );
$author_url         = esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) );
$author_avatar      = get_avatar( get_the_author_meta( 'user_email' ), apply_filters( 'aqua_author_bio_avatar_size', 75 ) );

// Only display if author has a description
if ( $author_description && get_theme_mod( 'aqua_remove_single_bio', '') != '1' ) : ?>

<h2 class="aqa-writter-title"><?php echo esc_html_e( 'Written By', 'aquaparallax' ); ?></h2>
<div class="blog-writen">
<div class="col-md-3">

<div class="blog-img-auther img-responsive">
<?php echo get_avatar( get_the_author_meta( 'ID' ) ); ?>
</div>
</div>
<div class="col-md-9">
<h2 class="aqa-p-auth-title"><?php echo esc_html( $author, 'aquaparallax' ); ?> </h2>
<p class="written-auther-txt"><?php echo esc_html( $author_description, 'aquaparallax' ); ?></p>
</div>
</div>

<?php endif; ?>