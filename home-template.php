<?php
/*
*	Template Name: FrontPage
*
*/	
 get_header();?>

<?php
get_template_part( 'sections/a-portfolio', 'what-we-do' );
get_template_part( 'sections/a-portfolio', 'work' );
get_template_part( 'sections/a-portfolio', 'team' );
get_template_part( 'sections/a-portfolio', 'testimonials' );
get_template_part( 'sections/a-portfolio', 'blog');
get_template_part('sections/a-portfolio',  'contact');
get_template_part('sections/a-portfolio',  'newsletter');
?>
<?php get_footer(); ?>
