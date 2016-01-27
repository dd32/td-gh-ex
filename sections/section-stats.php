<?php
/**
 * Stats Section
 * 
 * @package Benevolent
 */
 
 $benevolent_first_stats_number = get_theme_mod( 'benevolent_first_stats_number' );
 $benevolent_first_stats_title = get_theme_mod( 'benevolent_first_stats_title' );
 $benevolent_second_stats_number = get_theme_mod( 'benevolent_second_stats_number' );
 $benevolent_second_stats_title = get_theme_mod( 'benevolent_second_stats_title' );
 $benevolent_third_stats_number = get_theme_mod( 'benevolent_third_stats_number' );
 $benevolent_third_stats_title = get_theme_mod( 'benevolent_third_stats_title' );
 $benevolent_fourth_stats_number = get_theme_mod( 'benevolent_fourth_stats_number' );
 $benevolent_fourth_stats_title = get_theme_mod( 'benevolent_fourth_stats_title' );
 
 if( $benevolent_first_stats_number || $benevolent_first_stats_title || $benevolent_second_stats_number || $benevolent_second_stats_title || $benevolent_third_stats_number || $benevolent_third_stats_title || $benevolent_fourth_stats_number || $benevolent_fourth_stats_title ){
 ?>
<div class="container">
	<div class="row">
		<?php if( $benevolent_first_stats_number ){ ?>
        <div class="columns-4">
			<strong class="number"><?php echo absint( $benevolent_first_stats_number );?></strong>
			<?php if( $benevolent_first_stats_title ) echo '<span>' . esc_html( $benevolent_first_stats_title ) . '</span>'; ?>
		</div>
		<?php } if( $benevolent_second_stats_number ){?>
        <div class="columns-4">
			<strong class="number"><?php echo absint( $benevolent_second_stats_number ); ?></strong>
			<?php if( $benevolent_second_stats_title ) echo '<span>' . esc_html( $benevolent_second_stats_title ) . '</span>'; ?>
		</div>
		<?php } if( $benevolent_third_stats_number ){?>
        <div class="columns-4">
			<strong class="number"><?php echo absint( $benevolent_third_stats_number ); ?></strong>
			<?php if( $benevolent_third_stats_title ) echo '<span>' . esc_html( $benevolent_third_stats_title ) . '</span>'; ?>
		</div>
		<?php } if( $benevolent_fourth_stats_number ){?>
        <div class="columns-4">
			<strong class="number"><?php echo absint( $benevolent_fourth_stats_number ); ?></strong>
			<?php if( $benevolent_first_stats_title )echo '<span>' . esc_html( $benevolent_fourth_stats_title ) . '</span>'; ?>
		</div>
        <?php } ?>
	</div>
</div>
<?php } ?>