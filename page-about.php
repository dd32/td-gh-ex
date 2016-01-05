<?php
/**
 * The template for displaying about page
 *
 * This is the template that displays about page by default.
 *
 * @package WordPress
 * @subpackage Artwork
 * @since Artwork 1.0
 */
get_header();
?>
<div class="container main-container theme-about-page">
    <article id="page-<?php the_ID(); ?>" <?php post_class(); ?>>
        <?php
        $theme_about_img = get_theme_mod('theme_about_img');
        $srcImg = '';
        ?>
        <?php
        if (get_theme_mod('theme_about_img', false) === false) :
            $srcImg = get_template_directory_uri() . '/images/about_img.png';

        else:
            if ($theme_about_img != '') :
                $srcImg = $theme_about_img;
            endif;
        endif;
        ?>
        <div class="row">
            <div class="col-xs-12 <?php if (!empty($srcImg)): ?>col-sm-5 col-md-5 col-lg-5 <?php else: ?>col-sm-12 col-md-12 col-lg-12<?php endif; ?> content-about-page">
                <?php
                $theme_about_content = get_theme_mod('theme_about_content');
                if (get_theme_mod('theme_about_content', false) === false) :
                    _e('<h1>Hello!</h1><p>Artistique is a fine art gallery located in 24 Hillside Gardens Northwood, Greater London UK. The gallery was established in 1993 and is dedicated to the exhibition, education and research of contemporary figurative art. Our aim is to contribute, initiate, develop and inspire viewers about the visual arts.</p><p>Artistique Artwork Gallery is always open for submissions from all creative artists. Get your opportunity to exhibit your works at a prestigious gallery and have them seen by thousands of visitors who appreciate the art.</p><h5>OPENING HOURS</h5> <p class="color-black">10.30am to 5.30pm, Tuesday to Sunday during exhibitions.<br/>Closed on Mondays (except bank holidays) and during exhibition changeovers.</p><p><h5  class="inline-class">DIRECTIONS:</h5> via subway take 282/H11 train towards Harrow Bus Station (Stop D), walk about 2 min, head southeast on Green Ln/A4125, at the roundabout, take the 2nd exit onto Northwood Way, turn right to stay on Northwood Way, turn left onto Hillside Rise, Continue onto Hillside Gardens. Artistique Artwork Gallery will be on the left.</p>', 'artwork-lite');
                echo '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2477.886123831363!2d-0.40599407821061495!3d51.606975100903576!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x48766b6644faeab9%3A0x43cc932445a52c2a!2s24+Hillside+Gardens%2C+Northwood%2C+Greater+London+HA6+1RL%2C+UK!5e0!3m2!1sen!2sua!4v1448962013715" width="600" height="217" frameborder="0" style="border:0" allowfullscreen></iframe>';
                else:
                    ?>
                    <?php if (!empty($theme_about_content)): ?> 
                        <?php echo $theme_about_content; ?>
                    <?php endif; ?>
                <?php
                endif;
                ?>
            </div>
            <?php if (!empty($srcImg)): ?>
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 col-sm-offset-1 col-md-offset-1 col-lg-offset-1">
                    <img alt="about" src="<?php echo $srcImg; ?>">
                </div>
            <?php endif; ?>
        </div>
    </article><!--#post -->
</div>

<?php get_footer(); ?>