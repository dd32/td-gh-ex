<?php
/*
Template Name: about Full Width
*/

global $backyard;
?>
 
<section id="content">

 <section class="container paddingtop">

        <div class="row">

        <div class="col-lg-12">
        <?php if(have_posts()): the_post(); ?>
        <main id="main" class="site-main wow fadeInUp">
          <?php the_content(); ?>
          </main>
     
          <?php endif; ?>
        </div>

      </div>

    </section>

  </section>