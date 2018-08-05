<!-- LEFT SLIDER OF CONTAINER -->
    <div class="col-md-4">
            <?php /* ?>
            
                <div class="panel panel-default panel-slider-sm">
                    <div class="panel-heading">समाचार</div>
                    <div class="panel-body panel-slider">
                        <div class="row">
                            <div class="col-md-12">
                                <div id="carousel-article" class="carousel slide" data-ride="carousel">
                                    <!-- Indicators -->
                                    <!-- <ol class="carousel-indicators">
                                        <li data-target="#carousel-article" data-slide-to="0" class="active"></li>
                                        <li data-target="#carousel-article" data-slide-to="1"></li>
                                    </ol> -->
                                    <!-- Wrapper for slides -->
                                    <div class="carousel-inner" role="listbox">
                                        <div class="item active">
                                            <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/news-main-img.jpg" alt="" class="img-responsive" />
                                            <h6 class="ellipsis-text"><a href="" target="_blank">सात स्थानीय तह जित्दै राजपा बन्यो महोत्तरीमा महोत्तरीमा महोत्तरीमा ठूलो दल</h6>
                                        </div>
                                        <div class="item">
                                            <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/news-main-img.jpg" alt="" class="img-responsive" />
                                            <h6 class="ellipsis-text"><a href="" target="_blank">सात स्थानीय तह जित्दै राजपा बन्यो महोत्तरीमा ठूलो दल</a></h6>
                                        </div>
                                    </div>
                                    <!-- Controls -->
                                    <a class="left carousel-control" href="#carousel-article" role="button" data-slide="prev">
                                    <span class="glyphicon glyphicon glyphicon-arrow-left" aria-hidden="true"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                    <a class="right carousel-control" href="#carousel-article" role="button" data-slide="next">
                                    <span class="glyphicon glyphicon glyphicon-arrow-right" aria-hidden="true"></span>
                                    <span class="sr-only">Next</span>
                                </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
               <?php */ ?>
                <?php beenews_newslider();?>
                <?php dynamic_sidebar( 'right-sidebar'); ?>

            </div>
            <!-- END LEFT SLIDER OF CONTAINER -->
