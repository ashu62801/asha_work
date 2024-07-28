<?php
/**
 * Template Name: Custom home Template
 * Description: A custom template for special pages.
 */
get_header();
?>
<style>
@font-face {
  font-family: Montserrat-SemiBold;
  src: url('<?php echo get_template_directory_uri(); ?>/fonts/Montserrat-SemiBold.ttf');
}

@font-face {
  font-family: Montserrat-Regular;
  src: url('<?php echo get_template_directory_uri(); ?>/fonts/Montserrat-Regular.ttf');
}

@font-face {
  font-family: Montserrat-Medium;
  src: url('<?php echo get_template_directory_uri(); ?>/fonts/Montserrat-Medium.ttf');
}

@font-face {
  font-family: Montserrat-Bold;
  src: url('<?php echo get_template_directory_uri(); ?>/fonts/Montserrat-Bold.ttf');
}

@font-face {
  font-family: DancingScript-Regular;
  src: url('<?php echo get_template_directory_uri(); ?>/fonts/DancingScript-Regular.ttf');
}

</style>

 <section class="banner-section">

<div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
        <?php
        $result = new WP_Query(array(
            'post_type' => 'sliders'
        ));
        while($result -> have_posts()){
            $result -> the_post();
            $sub_heading = get_field('sub_heading');
            $button_text = get_field('button_text');
            $button_url = get_field('button_url');
        
        ?>
        <div class="carousel-item active">
            <div class="banner-bg">
                <img src="<?php echo get_template_directory_uri() ?>/img/banner-bg.jpg" class="d-block w-100" alt="...">
            </div>

            <div class="banner-text">
                <h6><?= get_field('sub_heading'); ?></h6>
                <h2><?php echo get_the_title(); ?></h2>
                <h5><?php echo get_the_content(); ?></h5>
                <div class="banner-btn">
                    <a href="<?= get_field('button_url'); ?>"><?= get_field('button_text'); ?></a>
                </div>
            </div>
        </div>
        <?php } ?>
        <!-- <div class="carousel-item">
            <div class="banner-bg">
                <img src="<?php echo get_template_directory_uri() ?>/img/banner-bg.jpg" class="d-block w-100" alt="...">
            </div>

            <div class="banner-text">
                <h6>Welcome to INVANDIG</h6>
                <h2>YOUR IMAGINATION</h2>
                <h5>Fully Displayed</h5>
                <div class="banner-btn">
                    <a href="#">View More</a>
                </div>
            </div>
        </div>
        <div class="carousel-item">
            <div class="banner-bg">
                <img src="<?php echo get_template_directory_uri() ?>/img/banner-bg.jpg" class="d-block w-100" alt="...">
            </div>

            <div class="banner-text">
                <h6>Welcome to INVANDIG</h6>
                <h2>YOUR IMAGINATION</h2>
                <h5>Fully Displayed</h5>
                <div class="banner-btn">
                    <a href="#">View More</a>
                </div>
            </div>
        </div> -->
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls"
        data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls"
        data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>

</section> 

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    <section class="about-us">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 ms-auto">
                    <div class="about-us-text main-title white">
                        <h3><?php echo get_field('about_heading'); ?></h3>
                        <p><?php echo get_field('about_us_content'); ?></p>
                        <div class="banner-btn">
                            <a href="<?php echo get_field('about_button_link'); ?>"><?php echo get_field('about_button_text'); ?></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php endwhile; endif; ?> 


<section class="our-services">
<div class="container">
    <div class="row">
        <div class="main-title black text-center">
        <h3><?php echo get_theme_mod('invandig_services_title', 'Our Services'); ?></h3>
        </div>
        <?php
        $result = new WP_Query(array(
            'post_type' => 'services'
        ));
        while($result -> have_posts()){
            $result -> the_post();
            $service_icon = get_field('service_icon');
            $service_button = get_field('service_button');
            $service_link = get_field('service_link');
        
        ?>
        <div class="col-lg-3 col-md-6">
            <div class="our-serv-text">
                <img src="<?= get_field('service_icon') ?>" alt="">
                <h4><?php echo get_the_title(); ?></h4>
                <p><?php echo get_the_content(); ?></p>
                <div class="btn-read">
                    <a href="<?= get_field('service_link'); ?>"><?= get_field('service_button'); ?></a>
                </div>
            </div>
        </div>
    <?php } ?>
        <!-- <div class="col-lg-3 col-md-6">
            <div class="our-serv-text">
                <img src="<?php echo get_template_directory_uri() ?>/img/our-serv-icon1.png" alt="">
                <h4>Interior Furnishing</h4>
                <p>Lorem ipsum dolor sit amet,
                    consectetur adipiscing</p>
                <div class="btn-read">
                    <a href="#">READ MORE</a>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="our-serv-text">
                <img src="<?php echo get_template_directory_uri() ?>/img/our-serv-icon1.png" alt="">
                <h4>Architecture</h4>
                <p>Lorem ipsum dolor sit amet,
                    consectetur adipiscing</p>
                <div class="btn-read">
                    <a href="#">READ MORE</a>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="our-serv-text">
                <img src="<?php echo get_template_directory_uri() ?>/img/our-serv-icon1.png" alt="">
                <h4>3D Modelling</h4>
                <p>Lorem ipsum dolor sit amet,
                    consectetur adipiscing</p>
                <div class="btn-read">
                    <a href="#">READ MORE</a>
                </div>
            </div>
        </div> -->
    </div>
</div>
</section>



<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<section class="our-process">
<div class="container">
    <div class="row">
        <div class="main-title black text-center">
        <h3><?php echo get_theme_mod('invandig_process_title', 'Our Process'); ?></h3>
        </div>
        <div class="col-lg-4 col-md-4">
            <div class="our-process-text text-center">
                <div class="our-process-icon">
                    <img src="<?php echo get_field('process_image_one'); ?>">
                </div>
                <h4><?php echo get_field('process_title_one'); ?></h4>
            </div>
        </div>
        <div class="col-lg-4 col-md-4 our-process-text-icon">
            <div class="our-process-text text-center">
                <div class="our-process-icon">
                    <img src="<?php echo get_field('process_image_two'); ?>">
                </div>
                <h4><?php echo get_field('process_titile_two'); ?></h4>
            </div>
        </div>
        <div class="col-lg-4 col-md-4">
            <div class="our-process-text text-center">
                <div class="our-process-icon">
                    <img src="<?php echo get_field('process_image_three'); ?>">
                </div>
                <h4><?php echo get_field('process_title_three'); ?></h4>
            </div>
        </div>
        <div class="col-lg-12 text-center pt-5 mt-5 mt-md-0">
            <div class="banner-btn">
                <a href="<?php echo get_field('process_button_link'); ?>"><?php echo get_field('process_button_text'); ?></a>
            </div>
        </div>
    </div>
</div>
</section>
<?php endwhile; endif; ?> 


<!-- <section class="our-portfolio">
<div class="container">
    <div class="row align-items-center">
        <div class="col-lg-3">
            <div class="main-title black">
                <h3>Our<br>Portfolio</h3>
                <p>Lorem ipsum dolor sit
                    amet, consectetur adipiscing
                    elit, sed do eiusmod tempor
                    incididuntut.</p>
                <div class="view-all-btn">
                    <a href="#">VIEW ALL</a>
                </div>
            </div>
        </div>
        <div class="col-lg-9">
            <div class="row g-5">
                <div class="col-lg-6">
                    <div class="portfolio-galery">
                        <img src="<?php echo get_template_directory_uri() ?>/img/portfolio-img1.jpg">
                        <div class="portfolio-text">
                            <a href="#">Portfolio 1</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="portfolio-galery">
                        <img src="<?php echo get_template_directory_uri() ?>/img/portfolio-img2.jpg">
                        <div class="portfolio-text">
                            <a href="#">Portfolio 2</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="portfolio-galery">
                        <img src="<?php echo get_template_directory_uri() ?>/img/portfolio-img3.jpg">
                        <div class="portfolio-text">
                            <a href="#">Portfolio 3</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="portfolio-galery">
                        <img src="<?php echo get_template_directory_uri() ?>/img/portfolio-img4.jpg">
                        <div class="portfolio-text">
                            <a href="#">Portfolio 4</a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
</section>
<section class="testimonial-section">
<div class="container">
    <div class="row">
        <div class="main-title black text-center">
            <h3>What People Says?</h3>
        </div>
    </div>
    <div class="row testimnial-spacing">
        <div class="col-lg-6 testimonial-design">
            <section class="testimonial-slider slider">
                <div class=" p-2">
                    <div class="section-slider-text">
                        <div class="iconslider">
                            <i class="fa-solid fa-quote-left"></i>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                Duis vehicula tellus nec orci tincidunt placerat et at est.
                                Pellentesque aliquet ligula vulputate. dolor sit amet,
                                consectetur adipiscing elit.</p>
                            <h3>- User A</h3>
                        </div>

                    </div>
                </div>
                <div class="p-2">
                    <div class="section-slider-text">
                        <div class="iconslider">
                            <i class="fa-solid fa-quote-left"></i>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                Duis vehicula tellus nec orci tincidunt placerat et at est.
                                Pellentesque aliquet ligula vulputate. dolor sit amet,
                                consectetur adipiscing elit.</p>
                            <h3>- User A</h3>
                        </div>

                    </div>
                </div>
                <div class="px-2 p-2">
                    <div class="section-slider-text">
                        <div class="iconslider">
                            <i class="fa-solid fa-quote-left"></i>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                Duis vehicula tellus nec orci tincidunt placerat et at est.
                                Pellentesque aliquet ligula vulputate. dolor sit amet,
                                consectetur adipiscing elit.</p>
                            <h3>- User A</h3>
                        </div>

                    </div>
                </div>
                <div class="px-2 p-2">
                    <div class="section-slider-text">
                        <div class="iconslider">
                            <i class="fa-solid fa-quote-left"></i>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                Duis vehicula tellus nec orci tincidunt placerat et at est.
                                Pellentesque aliquet ligula vulputate. dolor sit amet,
                                consectetur adipiscing elit.</p>
                            <h3>- User A</h3>
                        </div>

                    </div>
                </div>
                <div class="px-2 p-2">
                    <div class="section-slider-text">
                        <div class="iconslider">
                            <i class="fa-solid fa-quote-left"></i>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                Duis vehicula tellus nec orci tincidunt placerat et at est.
                                Pellentesque aliquet ligula vulputate. dolor sit amet,
                                consectetur adipiscing elit.</p>
                            <h3>- User A</h3>
                        </div>

                    </div>
                </div>
                <div class="px-2 p-2">
                    <div class="section-slider-text">
                        <div class="iconslider">
                            <i class="fa-solid fa-quote-left"></i>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                Duis vehicula tellus nec orci tincidunt placerat et at est.
                                Pellentesque aliquet ligula vulputate. dolor sit amet,
                                consectetur adipiscing elit.</p>
                            <h3>- User A</h3>
                        </div>

                    </div>
                </div>
            </section>
        </div>
        <div class="col-lg-6">
            <div class="testimoniual-img">
                <img src="<?php echo get_template_directory_uri() ?>/img/testimoniual-img.jpg">
            </div>
        </div>
    </div>
</div>
</section>
<section class="our-partners">
<div class="container">
    <div class="row">
        <div class="main-title black text-center">
            <h3>Our Partners</h3>
        </div>
    </div>
    <div class="row pt-lg-5 pt-md-5  mt-5 mt-md-0">
        <section class="regular slider">
            <div class=" p-2">
                <div class="section-slider-text">
                    <div class="iconslider d-flex justify-content-center">
                        <img src="<?php echo get_template_directory_uri() ?>/img/slider-img-1.png">
                    </div>

                </div>
            </div>
            <div class="p-2">
                <div class="section-slider-text">
                    <div class="iconslider  d-flex justify-content-center">
                        <img src="<?php echo get_template_directory_uri() ?>/img/slider-img-1.png">
                    </div>

                </div>
            </div>
            <div class="px-2 p-2">
                <div class="section-slider-text">
                    <div class="iconslider  d-flex justify-content-center">
                        <img src="<?php echo get_template_directory_uri() ?>/img/slider-img-1.png">
                    </div>

                </div>
            </div>
            <div class="px-2 p-2">
                <div class="section-slider-text">
                    <div class="iconslider  d-flex justify-content-center">
                        <img src="<?php echo get_template_directory_uri() ?>/img/slider-img-1.png">
                    </div>

                </div>
            </div>
            <div class="px-2 p-2">
                <div class="section-slider-text">
                    <div class="iconslider  d-flex justify-content-center">
                        <img src="<?php echo get_template_directory_uri() ?>/img/slider-img-1.png">
                    </div>

                </div>
            </div>
            <div class="px-2 p-2">
                <div class="section-slider-text">
                    <div class="iconslider  d-flex justify-content-center">
                        <img src="<?php echo get_template_directory_uri() ?>/img/slider-img-1.png">
                    </div>

                </div>
            </div>
        </section>
    </div>
</div>
</section> -->
<?php  
get_footer();
?>
