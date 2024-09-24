<?php wp_footer()  ?>
<footer class="footer-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="socila-links">
                        <p><i class="fa-solid fa-phone"></i></p>
                        <?php if (get_theme_mod('footer_phone')) : ?>
                        <a href="#"><?php echo esc_html(get_theme_mod('footer_phone')); ?></a>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="socila-links">
                        <p><i class="fa-solid fa-envelope"></i></p>
                        <?php if(get_theme_mod('footer_email')) : ?>
                        <a href="#"><?php echo esc_html(get_theme_mod('footer_email')); ?></a>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="socila-links">
                        <p><i class="fa-solid fa-location-dot"></i></p>
                        <?php if(get_theme_mod('footer_address')) : ?>
                        <a href="#"><?php echo esc_html(get_theme_mod('footer_address')); ?></a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <div class="row py-5 mb-5 mb-md-0">
                <div class="col-lg-3">
                    <div class="socila-footer-links">
                        <!-- <img src="/img/footer-logo.png"> -->
                        <?php if (get_theme_mod('footer_logo')) : ?>
                        <div class="footer-logo">
                            <a href="<?php echo esc_url(home_url('/')); ?>" rel="home">
                                <img src="<?php echo esc_url(get_theme_mod('footer_logo')); ?>" alt="<?php bloginfo('name'); ?>">
                            </a>
                        </div>
                    <?php endif; ?>
                    <?php if (get_theme_mod('footer_logo')) : ?>
                        <p><?php echo esc_html(get_theme_mod('footer_text')); ?></p>
                   <?php endif; ?>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="footer-heading footer-title">
                    <h3><?php echo esc_html(get_theme_mod('footer_explore_title', 'Explore:')); ?></h3>

                    <?php
                    wp_nav_menu(array(
                        'theme_location' => 'footer-menu',
                        'container' => false,
                        'menu_class' => '',
                        'fallback_cb' => '__return_false',
                        'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                        'depth' => 2,
                        'add_li_class' => ' ',
                        'link_class' => ''
                    ));
                    ?>

                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="footer-heading footer-title">
                    <h3><?php echo esc_html(get_theme_mod('footer_recent_work_title', 'Our Recent Work:')); ?></h3>

                        <ul>

                        </ul>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="footer-heading footer-title">
                    <h3><?php echo esc_html(get_theme_mod('footer_newsletter_title', 'Newsletter:')); ?></h3>
                        <form action="">
                            <div class="footer-submition pt-3">
                                <input type="email" placeholder="Your Email">
                                <button>Subscribe</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid copy-bg">
            <div class="row">
                <div class="copyright">
                    <p class="m-0 text-white"> <?php echo esc_html(get_theme_mod('footer_copywrite', '@2023 All Rights Reserved with INVANDIG:')); ?></p>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- slider-js -->
    <script src="https://code.jquery.com/jquery-2.2.0.min.js" type="text/javascript"></script>
    <script src="<?php echo get_template_directory_uri() ?>/js/slick.js" type="text/javascript"></script>
    <script src="<?php echo get_template_directory_uri() ?>/js/slick.min.js" type="text/javascript"></script>
    <script type="text/javascript">
        $(".regular").slick({
            dots: true,
            infinite: true,
            slidesToShow: 5,
            slidesToScroll: 1,
            responsive: [
                {
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 4,
                        slidesToScroll: 3,
                        infinite: true,
                        dots: true,
                    }
                },
                {
                    breakpoint: 600,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 2
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                }

            ]
        });

    </script>

    <script type="text/javascript">
        $(".testimonial-slider").slick({
            dots: true,
            infinite: true,
            slidesToShow: 1,
            slidesToScroll: 1,
            responsive: [
                {
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1,
                        infinite: true,
                        dots: true,
                    }
                },
                {
                    breakpoint: 600,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 2
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                }

            ]
        });

    </script>

<script>
jQuery(document).ready(function($) {
    $('.category-link').on('click', function(e) {
        e.preventDefault(); // Prevent the default anchor click behavior
        
        var categoryId = $(this).data('category-id');

        // AJAX request
        $.ajax({
            url: '<?php echo admin_url('admin-ajax.php'); ?>',
            type: 'POST',
            data: {
                action: 'load_category_posts',
                category_id: categoryId
            },
            success: function(response) {
                $('#post-content').html(response);
            },
            error: function() {
                $('#post-content').html('<p>An error occurred while loading posts.</p>');
            }
        });
    });
});
</script>

</body>

</html>
