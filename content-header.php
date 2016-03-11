<?php
/**
 * The template for displaying article headers
 *
 * @since 1.0.0
 */
?>

	<header>
		<?php
		if ( has_post_thumbnail() ) {
			?>
			<a href="<?php the_permalink(); ?>">
				<?php the_post_thumbnail( 'large' ); ?>
			</a>
			<?php
		}
		?>

		<div class="entry-category entry-meta">
			<?php the_category( ', ' ); ?>
		</div>

		<?php
		if ( is_single() ) :
			the_title( '<h1 class="entry-title">', '</h1>' );
		else :
			the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' );
		endif;
		?>

		<div class="entry-meta">
			<p class="vcard author">
				<strong><span class="fn">Written by <a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" title="<?php echo esc_attr( sprintf( __( 'Posts by %s', 'abacus' ), get_the_author() ) ); ?>" rel="author"><?php echo get_the_author(); ?></a></span></strong>
			</p>

			<a href="<?php echo esc_url( get_permalink() ); ?>" class="time"><time class="date published updated" datetime="<?php echo esc_attr( get_the_date( 'Y-m-d' ) ); ?>"><?php echo get_the_date(); ?></time></a>

			<?php if ( ! is_attachment() ) { ?>
				&nbsp;&nbsp;&bull;&nbsp;&nbsp;<?php echo abc_word_count(); ?>
			<?php } ?>

			<?php if ( comments_open() ) { ?>
				&nbsp;&nbsp;&bull;&nbsp;&nbsp;<span class="comment-count"><?php comments_popup_link( __( '0 Comments', 'abacus' ), __( '1 Comment', 'abacus' ), __( '% Comments', 'abacus' ), '', '' ); ?></span>
			<?php } ?>
		</div>
	</header>