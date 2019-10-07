<?php
//Template Name: Photography
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that
 * other 'pages' on your WordPress site will use a different template.
 */

get_header();
 
?>

    <style>
        @import url('https://fonts.googleapis.com/css?family=Josefin+Sans:400,600,700&display=swap');

        /*=== Typography ===*/
        #home-photography section,
        #home-photography header,
        #home-photography footer {
            position: relative;
            padding: 50px 0;
        }

        body {
            color: #3d4853;
        }
        p {
            color: #3d4853 !important;
        }

        /* section header */
        .section-header {
            padding-bottom: 80px;
        }
        .section-header h2 {
            color: #3d4853;
            font-size: 40px;
            font-weight: 700;
            font-family: 'Josefin Sans', sans-serif;

        }
        .section-header p {
            color: #3d4853;
            font-size: 18px;
        }

        /*=== home ===*/
        .page-intro {
            min-height: 500px;
            background: url("<?php echo get_stylesheet_directory_uri(); ?>/images/templates/bg-2.jpg") no-repeat top center / cover;
        }
        .intro-title {
            font-size: 45px;
            font-weight: 700;
            color: #fff;
            max-width: 600px;
            margin: 0 auto;
            line-height: 55px;
            font-family: 'Josefin Sans', sans-serif;
        }

        /*=== Testimonials ===*/
        .testimonials {
            background: url("<?php echo get_stylesheet_directory_uri(); ?>/images/templates/bg-1.jpg") no-repeat top center / cover;
            padding: 100px 0 !important;
        }
        #testimonials .carousel-control {
            color: #fff !important;
            opacity: 1;
            text-transform: uppercase;
            font-weight: 500;
            letter-spacing: 3px;
            max-height: 80px;
            top: 50%;
            margin-top: -40px;
        }
        #testimonials .carousel-control-next {
            border-left: 1px solid rgba(255, 255, 255, .4);
        }
        #testimonials .carousel-control-prev {
            border-right: 1px solid rgba(255, 255, 255, .4);
        }
        #testimonials .carousel-inner {
            max-width: 750px;
            margin: 0 auto;
            text-align: center;
        }
        #testimonials .carousel-item p {
            font-size: 18px;
            font-weight: 400;
            max-width: 620px;
            margin: 0 auto;
            line-height: 35px;
            opacity: .7;
        }
        #testimonials .carousel-item strong {
            color: #fff;
            font-size: 15px;
            letter-spacing: 5px;
            margin-top: 30px;
            display: block;
            font-weight: 500;
        }

        /*=== Speciality ===*/
        .media.box {
            box-shadow: 0 0 10px 0 rgba(0,0,0,.1);
            margin-bottom: 30px;
        }
        .media.box .media-body {}
        .media.box .media-body {
            padding: 10px 35px;
        }
        .second-title {
            color: #3d4853;
            font-size: 18px;
            font-weight: 500;
            line-height: 30px;
            margin-bottom: 10px;
            text-transform: capitalize;
            font-family: 'Josefin Sans', sans-serif;
        }

        /*=== photographs ===*/
        .gallery-post {
            overflow: hidden;
            margin-bottom: 30px;
        }
        .gallery-wrap {
            background: rgba(0,0,0,.45);
            position: absolute;
            bottom: 0;
            top: 0;
            left: 0;
            right: 0;
            padding: 30px;
        }
        .gallery-wrap p {
            font-size: 12px;
            letter-spacing: 1px;
            opacity: .8;
        }
        .gallery-post img{
            transition: all .2s ease-in-out;
            transform: scale(1);
        }
        .gallery-post:hover img {
            transform: scale(1.1);
        }
    </style>


    <div class="row no-gutters">

        <!-- Home-Photography -->
        <div class="col-12 attire-post-and-comments" id="home-photography">

            <!--****** Page Header ******-->
            <header class="page-intro bg-img d-flex align-items-center position-relative">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="intro-content text-center">
                                <h1 class="intro-title">I'm John Doe a Professional Photographer Live in Chittagong</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </header>

            <!--****** Page Header ******-->
            <section>
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="section-header text-center">
                                <h2>Special Features</h2>
                                <p>Recent Short Form Me</p>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="media box">
                                <img src="https://picsum.photos/id/1005/230" class="" alt="Specialty">
                                <div class="media-body align-self-center">
                                    <h3 class="second-title mt-0">Wedding Photography</h3>
                                    <p class="mb-0">Sunt nesciunt repellat molestias vitae nostrum aliquid laudantium quo voluptatem provident voluptate tenetur illo.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="media box">
                                <img src="https://picsum.photos/id/103/230" class="" alt="Specialty">
                                <div class="media-body align-self-center">
                                    <h3 class="second-title mt-0">Nature Photography</h3>
                                    <p class="mb-0">Sunt nesciunt repellat molestias vitae nostrum aliquid laudantium quo voluptatem provident voluptate tenetur illo.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="media box">
                                <img src="https://picsum.photos/id/219/230" class="" alt="Specialty">
                                <div class="media-body align-self-center">
                                    <h3 class="second-title mt-0">animal Photography</h3>
                                    <p class="mb-0">Sunt nesciunt repellat molestias vitae nostrum aliquid laudantium quo voluptatem provident voluptate tenetur illo.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="media box">
                                <img src="https://picsum.photos/id/1032/230" class="" alt="Specialty">
                                <div class="media-body align-self-center">
                                    <h3 class="second-title mt-0">Portrait Photography</h3>
                                    <p class="mb-0">Sunt nesciunt repellat molestias vitae nostrum aliquid laudantium quo voluptatem provident voluptate tenetur illo.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="media box">
                                <img src="https://picsum.photos/id/1048/230" class="" alt="Specialty">
                                <div class="media-body align-self-center">
                                    <h3 class="second-title mt-0">Building Photography</h3>
                                    <p class="mb-0">Sunt nesciunt repellat molestias vitae nostrum aliquid laudantium quo voluptatem provident voluptate tenetur illo.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="media box">
                                <img src="https://picsum.photos/id/1/230" class="" alt="Specialty">
                                <div class="media-body align-self-center">
                                    <h3 class="second-title mt-0">Doctor Photography</h3>
                                    <p class="mb-0">Sunt nesciunt repellat molestias vitae nostrum aliquid laudantium quo voluptatem provident voluptate tenetur illo.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!--****** Testimonials ******-->
            <section class="testimonials">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div id="testimonials" class="carousel slide mb-5" data-ride="carousel">
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <h5 class="text-white"><i class="w3-quote fa-2x"></i></h5>
                                        <p class="text-white">I am interested in the details about your wedding, your ceremony & reception venues, your vision, your dress, your colours and anything else you would like to share with me.</p>
                                        <strong>JAMES & MIKE</strong>
                                    </div>
                                    <div class="carousel-item">
                                        <h5 class="text-white"><i class="w3-quote fa-2x"></i></h5>
                                        <p class="text-white">I am interested in the details about your wedding, your ceremony & reception venues, your vision, your dress, your colours and anything else you would like to share with me.</p>
                                        <strong>JAMES & MIKE</strong>
                                    </div>
                                    <div class="carousel-item">
                                        <h5 class="text-white"><i class="w3-quote fa-2x"></i></h5>
                                        <p class="text-white">I am interested in the details about your wedding, your ceremony & reception venues, your vision, your dress, your colours and anything else you would like to share with me.</p>
                                        <strong>JAMES & MIKE</strong>
                                    </div>
                                </div>
                                <a class="carousel-control carousel-control-prev" href="#testimonials" role="button" data-slide="prev">Prev</a>
                                <a class="carousel-control carousel-control-next" href="#testimonials" role="button" data-slide="next">Next</a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!--****** Photography ******-->
            <section>
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="section-header text-center">
                                <h2>My Photography</h2>
                                <p>Recent Short Form Me</p>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="gallery-post position-relative">
                                <img class="img-fluid" src="https://picsum.photos/id/1057/400" alt="Blog Post">
                                <div class="gallery-wrap">
                                    <h3 class="second-title text-white m-0">Autumn Photos</h3>
                                    <p class="text-white">5 Photo / Nature</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="gallery-post position-relative">
                                <img class="img-fluid" src="https://picsum.photos/id/1068/400" alt="Blog Post">
                                <div class="gallery-wrap">
                                    <h3 class="second-title text-white m-0">Autumn Photos</h3>
                                    <p class="text-white">5 Photo / Nature</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="gallery-post position-relative">
                                <img class="img-fluid" src="https://picsum.photos/id/110/400" alt="Blog Post">
                                <div class="gallery-wrap">
                                    <h3 class="second-title text-white m-0">Autumn Photos</h3>
                                    <p class="text-white">5 Photo / Nature</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="gallery-post position-relative">
                                <img class="img-fluid" src="https://picsum.photos/id/128/400" alt="Blog Post">
                                <div class="gallery-wrap">
                                    <h3 class="second-title text-white m-0">Autumn Photos</h3>
                                    <p class="text-white">5 Photo / Nature</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="gallery-post position-relative">
                                <img class="img-fluid" src="https://picsum.photos/id/141/400" alt="Blog Post">
                                <div class="gallery-wrap">
                                    <h3 class="second-title text-white m-0">Autumn Photos</h3>
                                    <p class="text-white">5 Photo / Nature</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="gallery-post position-relative">
                                <img class="img-fluid" src="https://picsum.photos/id/220/400" alt="Blog Post">
                                <div class="gallery-wrap">
                                    <h3 class="second-title text-white m-0">Autumn Photos</h3>
                                    <p class="text-white">5 Photo / Nature</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="gallery-post position-relative">
                                <img class="img-fluid" src="https://picsum.photos/id/190/400" alt="Blog Post">
                                <div class="gallery-wrap">
                                    <h3 class="second-title text-white m-0">Autumn Photos</h3>
                                    <p class="text-white">5 Photo / Nature</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="gallery-post position-relative">
                                <img class="img-fluid" src="https://picsum.photos/id/184/400" alt="Blog Post">
                                <div class="gallery-wrap">
                                    <h3 class="second-title text-white m-0">Autumn Photos</h3>
                                    <p class="text-white">5 Photo / Nature</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="gallery-post position-relative">
                                <img class="img-fluid" src="https://picsum.photos/id/168/400" alt="Blog Post">
                                <div class="gallery-wrap">
                                    <h3 class="second-title text-white m-0">Autumn Photos</h3>
                                    <p class="text-white">5 Photo / Nature</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

        </div> <!-- ::Eed home-photography -->



    </div>
<?php
get_footer();
