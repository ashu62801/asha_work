<?php
function enqueue_custom_styles() {
    // Enqueue your CSS file
    wp_enqueue_style( 'custom-style', get_template_directory_uri() . '/style.css', array(), '1.0.0', 'all' );
    wp_enqueue_style( 'custom-style-css', get_template_directory_uri() . '/css/style.css', array(), '1.0.0', 'all' );

}
add_action( 'wp_enqueue_scripts', 'enqueue_custom_styles' );



add_theme_support('custom-logo', array(
    'height' => 100,
    'width' => 300,
    'flex-width' => true,
    'flex-height' => true,
));

add_theme_support('post-thumbnails');


function register_theme_menus() {
    register_nav_menus( array(
        'primary-menu' => __( 'Primary Menu', 'theme' ), 
        'primary-menu-right-button' => __( 'Primary Menu Right Button', 'theme' ),
        'footer-menu' => __( 'Footer Menu', 'theme' )
    ) );
}
add_action( 'init', 'register_theme_menus' );

function add_menu_link_class($atts, $item, $args) {
    if (isset($args->link_class)) {
        $atts['class'] = $args->link_class;
    }
    if (in_array('current-menu-item', $item->classes)) {
        $atts['class'] .= ' active';
    }
    return $atts;
}
add_filter('nav_menu_link_attributes', 'add_menu_link_class', 1, 3);

// Slider function
function slider_post_type(){
	register_post_type('sliders',
	array(
		'labels'=> array(
			'name' => __('Sliders'),
			'singular_name' => __('sliders'),
		),
		'public' => true,
		'supports' => array('title', 'thumbnail', 'editor')
	)
);
};

add_action( 'init', 'slider_post_type' );

// Services Post
function services_post_type(){
	register_post_type('services',
	array(
		'labels'=> array(
			'name' => __('Services'),
			'singular_name' => __('Services'),
		),
		'public' => true,
		'supports' => array('title', 'thumbnail', 'editor')
	)
);
};

add_action( 'init', 'services_post_type' );




// Footer Custom
function theme_customizer($wp_customize) {
    $wp_customize->add_section('footer_section', array(
        'title' => __('Footer Settings', 'invandig'),
        'priority' => 30,
    ));
     // Footer Title`
     $wp_customize->add_setting('footer_explore_title', array(
        'default' => 'Explore:',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('footer_explore_title', array(
        'label' => __('Footer Explore Title'),
        'section' => 'footer_section',
        'type' => 'text',
    ));

       // Footer Title Recent Work
       $wp_customize->add_setting('footer_recent_work_title', array(
        'default' => 'Our Recent Work:',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('footer_recent_work_title', array(
        'label' => __('Our Recent Work'),
        'section' => 'footer_section',
        'type' => 'text',
    ));

        // Footer Title Newslatter
        $wp_customize->add_setting('footer_newsletter_title', array(
            'default' => 'Newsletter:',
            'sanitize_callback' => 'sanitize_text_field',
        ));
    
        $wp_customize->add_control('footer_newsletter_title', array(
            'label' => __('Newsletter'),
            'section' => 'footer_section',
            'type' => 'text',
        ));
 
        // Copywrite
        $wp_customize->add_setting('footer_copywrite', array(
            'default' => '@2023 All Rights Reserved with INVANDIG',
            'sanitize_callback' => 'sanitize_text_field',
        ));
    
        $wp_customize->add_control('footer_copywrite', array(
            'label' => __('Copyright'),
            'section' => 'footer_section',
            'type' => 'textarea',
        ));
    // Footer Logo
    $wp_customize->add_setting('footer_logo');

    $wp_customize->add_control(new WP_Customize_Image_control($wp_customize, 'footer_logo', array(
        'label' => __('Footer Logo', 'invandig'),
        'section' => 'footer_section',
        'settings' => 'footer_logo',
    )));

    // Footer Text
    $wp_customize->add_setting('footer_text', array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('footer_text', array(
        'label' => __('Footer Text', 'invandig'),
        'section' => 'footer_section',
        'type' => 'text',
    ));

    // Phone Number
    $wp_customize->add_setting('footer_phone', array(
        'default' => '+65 9779 0108',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('footer_phone', array(
        'label' => __('Footer Phone Number', 'invandig'),
        'section' => 'footer_section',
        'type' => 'text',
    ));

    // Email Address
    $wp_customize->add_setting('footer_email', array(
        'default' => 'enquiry@invandig.com',
        'sanitize_callback' => 'sanitize_email',
    ));

    $wp_customize->add_control('footer_email', array(
        'label' => __('Footer Email Address', 'invandig'),
        'section' => 'footer_section',
        'type' => 'email',
    ));

    // Address
    $wp_customize->add_setting('footer_address', array(
        'default' => '1 Tampines North Dr. 1, T-Space 09-05, Singapore 528559',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));

    $wp_customize->add_control('footer_address', array(
        'label' => __('Footer Address', 'invandig'),
        'section' => 'footer_section',
        'type' => 'textarea',
    ));
}
add_action('customize_register', 'theme_customizer');

// Home page customizer
function invandig_customize_register($wp_customize) {
    $wp_customize->add_section('invandig_homepage_section', array(
        'title' => __('Homepage Settings', 'invandig'),
        'priority' => 30,
    ));

    // Our Services
    $wp_customize->add_setting('invandig_services_title', array(
        'default' => __('Our Services', 'invandig'),
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('invandig_services_title', array(
        'label' => __('Services Title', 'invandig'),
        'section' => 'invandig_homepage_section',
        'type' => 'text',
    ));

    // process
    $wp_customize->add_setting('invandig_process_title', array(
        'default' => __('Our Process', 'invandig'),
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('invandig_process_title', array(
        'label' => __('Our Process', 'invandig'),
        'section' => 'invandig_homepage_section',
        'type' => 'text',
    ));
}
add_action('customize_register', 'invandig_customize_register');


