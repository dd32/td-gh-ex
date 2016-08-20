<!-- =========================
TEAM SECTION
============================== -->
<?php

$heading = get_theme_mod('aza_team_title', 'OUR TEAM');
$subheading = get_theme_mod('aza_team_subtitle', 'Present your team members and their role in the company.');
$separator_top = get_theme_mod('aza_separator_team_top', '1');
$separator_bottom = get_theme_mod('aza_separator_team_bottom', '0');

$team_content = get_theme_mod ('aza_team_content',json_encode(
         array(
                array("image_url"     => get_template_directory_uri() . '/images/team1.jpg',
                      "title"         => esc_html__('Jane Doe','aza-lite'),
                      "subtitle"      => esc_html__('Project Supervisor','aza-lite'),
                      "color"         => '#f0b57c',
                      "text"          => esc_html__('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce vestibulum augue posuere.','aza-lite')),
                array("image_url"     => get_template_directory_uri() . '/images/team2.jpg',
                      "title"         => esc_html__('Ola Nordmann','aza-lite'),
                      "subtitle"      => esc_html__('Web Designer','aza-lite'),
                      "color"         => '#4bb992',
                      "text"          => esc_html__('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce vestibulum augue posuere.','aza-lite')),

                array("image_url"     => get_template_directory_uri() . '/images/team3.jpg',
                      "title"         => esc_html__('Average Joe','aza-lite'),
                      "subtitle"      => esc_html__('Front End Developer','aza-lite'),
                      "color"         => '#349ae0',
                      "text"          => esc_html__('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce vestibulum augue posuere.','aza-lite')),
                array("image_url"     => get_template_directory_uri() . '/images/team4.jpg',
                      "title"         => esc_html__('Joe Bloggs','aza-lite'),
                      "subtitle"      => esc_html__('UX Designer','aza-lite'),
                      "color"         => '#887caf',
                      "text"          => esc_html__('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce vestibulum augue posuere.', 'aza-lite')),
            ) ) ) ;

$team_content_decoded = json_decode($team_content);

$button_text = get_theme_mod('aza_team_button_text', 'Work with us');
$button_link = get_theme_mod('aza_team_button_link', '#');


?>
<section id="team">
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
                <div class="row team-row text-center">
              <?php
                if(!empty($team_content)) {
    $team_content_decoded = json_decode($team_content);
    if(!empty($team_content_decoded)) {
        foreach($team_content_decoded as $team_content) {
            echo '<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12 text-center team-member">
                        <div class="team-picture">
                            <div class="team-member-image" style="background-image: url(' .esc_url($team_content -> image_url).')"></div>
                            <div class="team-picture-overlay">
                                <p class="team-description">'.html_entity_decode($team_content -> text).'</p>
                            </div>
                        </div>
                        <div class="separator-team"></div>
                        <h4 class="team-name1" style= " color:'.$team_content -> color.'">'.esc_html($team_content -> title).'</h4>
                        <p>'.esc_html($team_content -> subtitle).'</p>
                    </div>';
        }}}
                    ?>
            </div>
             <?php if ($separator_bottom) { echo "<hr class='separator'/>"; } ?>
             <?php
                        if(!empty($button_text))
                        {
                        echo '<div class="row"><div class="col-lg-12 col-centered text-center">'; ?>
                            <button type="button" onclick="window.location='<?php echo $button_link; ?>'" class="btn features-btn">
                                        <?php echo $button_text; ?>
                            </button>
                      <?php echo '</div></div>';
                        }
                    ?>
                </div>
        </section>
