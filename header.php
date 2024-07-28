<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo(); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- bootstrap link -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">

    <!-- custom css -->
   
    <!-- fontawesome link -->
    <link rel=" stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- slider-css -->
    <link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/css/slick-theme.css">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/css/slick.css">
    <?php wp_head() ?>

    <title><?php wp_title('|',true, 'right'); ?><?php bloginfo('name'); ?></title>
</head>

<body <?php body_class(); ?>>
    <header>
        <nav class="navbar navbar-expand-lg p-0">
            <div class="container">
                <a class="navbar-brand p-0" href="#"> 
                    <!-- <img src="/img/logo.png" alt=""> -->
                    <?php the_custom_logo(); ?>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="imgnavbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">

                <?php
                    wp_nav_menu(array(
                        'theme_location' => 'primary-menu',
                        'container' => false,
                        'menu_class' => 'navbar-nav',
                        'fallback_cb' => '__return_false',
                        'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                        'depth' => 2,
                        'add_li_class' => ' ',
                        'link_class' => ''
                    ));
                    ?>
                   <?php
                    wp_nav_menu(array(
                        'theme_location' => 'primary-menu-right-button',
                        'container' => false,
                        'menu_class' => 'navbar-nav',
                        'fallback_cb' => '__return_false',
                        'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                        'depth' => 2,
                        'add_li_class' => ' ',
                        'link_class' => 'book-btn'
                    ));
                    ?>
                    <!-- <ul class="navbar-nav">
                        <li>
                            <a class="active" aria-current="page" href="#">HOME</a>
                        </li>
                        <li>
                            <a href="#">INVANDIG STORY</a>
                        </li>
                        <li>
                            <a href="#">PORTFOLIO</a>
                        </li>
                        <li>
                            <a href="#">CONTACT US</a>
                        </li>
                        <li>
                            <a class="book-btn" href="#">BOOK AN APPOINTMENT</a>
                        </li>
                    </ul> -->
                </div>

            </div>
        </nav>
    </header>
