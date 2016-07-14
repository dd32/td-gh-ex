<?php
/*
Template Name: Contact Us
*/
 get_header();?>
<section class="inner-page-bg">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="inner-page-title">
          <h1 class="title">Contact</h1>
        </div><!--header-->
        <div class="breadcrumbs">
          <!--crumbs-->
        </div><!--breadcrumbs-->
      </div><!--col-->
    </div><!--row-->
  </div><!--container-->
</section><!--inner-page-bg-->

<section id="content">
  <section class="container">
    <div class="contact_wrap">
      <div class="row">
       <?php if ( is_active_sidebar( 'ridolfi_contact_form' ) ) : ?>
                        <?php dynamic_sidebar('ridolfi_contact_form'); ?>
                <?php endif; ?>
        <!--col-->
        <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
          <div class="map">
           <?php echo get_theme_mod('google_map_address'); ?>
          </div><!--map-->
        </div><!--col-->
      </div><!--row-->
      <div class="row">
        <div class="col-md-12">
          <div class="contact_form">
            <h6 class="page_title">CONTACT FORM</h6>
            <form class="main-contact-form">
              <div class="form-group">
                <div class="row">
                  <div class="col-md-6 col-sm-6 your-name">
                    <label>Your Name</label>
                    <input type="text" name="ridolfi_contact_form_name" id="ridolfi-contact-form-name" class="form-control">
                    <span class="ridolfi-contact-form-name-valid info"></span>
                  </div><!--col-->
                  <div class="col-md-6 col-sm-6 your-email" >
                    <label>Your Email</label>
                    <input type="email" name="ridolfi_contact_form_email" id="ridolfi-contact-form-email" class="form-control">
                    <span class="ridolfi-contact-form-email-valid info"></span> <span class="ridolfi-contact-form-email-empty"></span>
                  </div><!--col-->
                </div>
              </div><!--form-group-->
              <div class="form-group">
                <div class="row">
                  <div class="col-md-12">
                    <label>Message</label>
                    <textarea class="form-control" rows="7" name="ridolfi_contact_form_mgs" id="ridolfi-contact-form-mgs"></textarea>
                  </div><!--col-->
                </div>
              </div><!--form-group-->
              <div class="form-group">
                <button type="submit" class="btn contact_btn" id="ridolfi-contact-form-submit"><div class="sending"></div>Submit</button>
              </div>
            </form>
            <div id="ridolfi-contact-form-submit-success"></div>
          </div><!--contact_form-->
        </div><!--col-->
      </div><!--row-->
    </div><!--contact_wrap-->
  </section><!--container-->
</section><!--content-->
  
<?php get_footer();?>