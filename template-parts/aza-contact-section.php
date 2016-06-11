<!-- =========================
PIRATE FORMS
============================== -->
<?php
$frontpage_contact_shortcode = get_theme_mod('frontpage_contact_shortcode');
$heading = get_theme_mod('aza_contact_title', 'Contact');
$subheading = get_theme_mod('aza_contact_subtitle', 'Message us');
$separator_top = get_theme_mod('aza_separator_contact_top', '1');
?>



<section id="contact">


<div class="container">
                <div class="row">
                    <div class="col-lg-12 col-centered text-center">
                        <?php
                    if(!empty($heading)) {
                        echo '<h2>'.$heading.'</h2>';
                    }?>
                     <?php if ($separator_top) { echo "<hr class='separator'/>"; } ?>
                     <?php
                                if(!empty($subheading)) {
                                echo '<p class = "team-p">'.$subheading.'</p>';
                        }?>
                    </div>
                </div>
<?php
 if( !empty($frontpage_contact_shortcode) ){
?>
<div class="row">
  <div class="col-md-12 text-center">
                <?php echo do_shortcode($frontpage_contact_shortcode);?>
  </div>
</div>
        <!-- .container-fluid -->
<?php
     }
?>
</div>
</section>
