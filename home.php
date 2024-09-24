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

<section class="text-center py-5">
    <h2>Expert Legal Support</h2>
<?php
// Fetching all categories for the 'services' post type
$service_categories = get_terms(array(
    'taxonomy' => 'services_post_cat',
    'hide_empty' => false, // Show all categories, even those without posts
));

?>

<div class="container">
    <div class="categories">
        <h2>Categories</h2>
<ul class="category-list">
    <?php foreach ($service_categories as $category) : 
        // Get the icon URL from category meta
        $icon_url = get_term_meta($category->term_id, 'category-image-id', true);
        ?>
        <li>
            <a href="#" class="category-link" data-category-id="<?php echo $category->term_id; ?>">
                <?php if ($icon_url) : ?>
                    <img src="<?php echo esc_url(wp_get_attachment_url($icon_url)); ?>" alt="<?php echo esc_attr($category->name); ?>" class="category-icon" style="width: 20px; height: 20px; margin-right: 5px;">
                <?php endif; ?>
                <?php echo esc_html($category->name); ?>
            </a>
        </li>
    <?php endforeach; ?>
</ul>

<div class="posts">
    <h2>Posts</h2>
    <div id="post-content">
        <p>Select a category to see posts.</p>
    </div>
</div>


</section>


<?php
$category_id = 1; // Use a valid category ID here

// Query the services
$query = new WP_Query(array(
    'post_type' => 'services',
    'tax_query' => array(
        array(
            'taxonomy' => 'category',
            'field'    => 'term_id',
            'terms'    => $category_id,
        ),
    ),
    'posts_per_page' => 5,
));

if ($query->have_posts()) {
    while ($query->have_posts()) {
        $query->the_post();
        ?>
        <div class="post-item">
            <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
            <?php if (has_post_thumbnail()) : ?>
                <div class="post-thumbnail">
                    <?php the_post_thumbnail('thumbnail'); ?>
                </div>
            <?php endif; ?>
            <p><?php the_excerpt(); ?></p>
        </div>
        <?php
    }
    wp_reset_postdata();
} else {
    echo '<p>No posts found in this category.</p>';
}

?>

<?php  
get_footer();
?>
