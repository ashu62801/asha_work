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
// function services_post_type(){
// 	register_post_type('services',
// 	array(
// 		'labels'=> array(
// 			'name' => __('Services'),
// 			'singular_name' => __('Services'),
// 		),
// 		'public' => true,
// 		'supports' => array('title', 'thumbnail', 'editor')
// 	)
// );
// };

// add_action( 'init', 'services_post_type' );

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


// crausel post

function create_crausel_post_type(){
    register_post_type('crausel',
        array(

            'labels' => array(

                'name' => ('Crausel'),
                'singular_name' => ('Crausel'),
            ),

            'public' => true,
            'supports' => array('title', 'thumbnail', 'excerpt', 'editor')
        )
);
};

add_action('init', 'create_crausel_post_type');



function my_crausel(){
    $args = array(

        'post_type' =>  'crausel',
        'post_per_page' => 1,

    );

    $query = new WP_Query($args);

    if ($query -> have_posts()) {
         $output = '<div class="row>';

        while ($query->have_posts()) {
            $query->the_post();
            $title = get_field('test_title');
            $description = get_field('description');
            $position = get_field('test_position');
            $profile = get_field('test_profile');   
            $full_img = get_field('full_img');
            $ipad_image = get_field('ipad_image');
            $mobile_image = get_field('mobile_image');

            $deskspace = 1500;


            $output .= '<div class="col-md-4">
            <div class="testimonial-box">
                 <div class="testimonial">
                     <i class="fas fa-quote-right"></i>
                     <span class="testimonial-text">' . esc_html($description) . '</span>
                     <div class="testimonial-user">
                         <img src=" ' . esc_html($profile) . ' " alt="user-img" class="user-img">
                         <div class="user-info">
                             <span class="user-name">' . esc_html($title) . '</span>
                             <div class="user-job-details">
                                 <span class="user-job">' . esc_html($position) . '</span>
                             </div>
                         </div>
                     </div>
                 </div>
                 <img src=" ' . esc_html($full_img) . ' " alt="Full Image" height="350px" width="400px" class="user-img">
             </div>
         </div>';
        }

        $output .= '</div>';
        wp_reset_postdata(); 

    }
    else {
        $output = '<p>No Crausel found.</p>';
    }

    return $output;
}

add_shortcode('crausel', 'my_crausel');



/* Custom Post Type Services */// Register Services post type
function services_post_type() {
    $args = array(
        'labels' => array(
            'name' => __('Services'),
            'singular_name' => __('Service')
        ),
        'public' => true,
        'has_archive' => true,
        'exclude_from_search' => true,
        'menu_icon' => 'dashicons-text-page',
        'rewrite' => array('slug' => 'services'),
        'supports' => array('title', 'editor', 'thumbnail'),
        'taxonomies' => array('category'), // This line is crucial
    );
    register_post_type('services', $args);
}
add_action('init', 'services_post_type');




// Register Services Category taxonomy with proper show_ui setting
function services_post_cat() {
    register_taxonomy('services_post_cat', 'services', array(
        'labels' => array(
            'name' => __('Services Categories'),
            'singular_name' => __('Services Category')
        ),
        'rewrite' => array('slug' => 'services-category'),
        'has_archive' => true,
        'hierarchical' => true,
        'show_ui' => true, // Ensure this is set to display the taxonomy in the admin UI
        'show_admin_column' => true, // Display in the admin post type list
    ));
}
add_action('init', 'services_post_cat');

// Add image field to add new category form
function add_category_image_field() {
    ?>
    <div class="form-field term-group">
        <label for="category-image"><?php _e('Category Image', 'text-domain'); ?></label>
        <input type="text" id="category-image" name="category-image" value="" />
        <button class="upload-image-button button"><?php _e('Upload/Add Image', 'text-domain'); ?></button>
    </div>
    <?php
}
add_action('services_post_cat_add_form_fields', 'add_category_image_field', 10, 2);

// Add image field to edit category form
function edit_category_image_field($term) {
    $image_id = get_term_meta($term->term_id, 'category-image-id', true); 
    $image_url = $image_id ? wp_get_attachment_url($image_id) : ''; 
    ?>
    <tr class="form-field term-group-wrap">
        <th scope="row"><label for="category-image"><?php _e('Category Image', 'text-domain'); ?></label></th>
        <td>
            <input type="text" id="category-image" name="category-image" value="<?php echo esc_attr($image_url); ?>" />
            <button class="upload-image-button button"><?php _e('Upload/Add Image', 'text-domain'); ?></button>
            <?php if ($image_url): ?>
                <div><img src="<?php echo esc_url($image_url); ?>" style="max-width: 100px; height: auto;" /></div>
            <?php endif; ?>
        </td>
    </tr>
    <?php
}
add_action('services_post_cat_edit_form_fields', 'edit_category_image_field', 10, 2);

// Save category image when a new category is created
function save_category_image($term_id) {
    if (isset($_POST['category-image'])) {
        $image_url = esc_url($_POST['category-image']);
        $attachment_id = attachment_url_to_postid($image_url); 
        update_term_meta($term_id, 'category-image-id', $attachment_id);
    }
}
add_action('created_services_post_cat', 'save_category_image', 10, 2);
add_action('edited_services_post_cat', 'save_category_image', 10, 2);

// Enqueue the media uploader for image upload
function enqueue_category_image_uploader() {
    if (isset($_GET['taxonomy']) && $_GET['taxonomy'] == 'services_post_cat') {
        wp_enqueue_media();
        ?>
        <script>
            jQuery(document).ready(function($) {
                var frame;
                $('.upload-image-button').on('click', function(e) {
                    e.preventDefault();
                    if (frame) {
                        frame.open();
                        return;
                    }
                    frame = wp.media({
                        title: '<?php _e('Select or Upload Image', 'text-domain'); ?>',
                        button: {
                            text: '<?php _e('Use this image', 'text-domain'); ?>'
                        },
                        multiple: false
                    });
                    frame.on('select', function() {
                        var attachment = frame.state().get('selection').first().toJSON();
                        $('#category-image').val(attachment.url);
                    });
                    frame.open();
                });
            });
        </script>
        <?php
    }
}
add_action('admin_enqueue_scripts', 'enqueue_category_image_uploader');

function load_category_posts() {
    // For testing, use a hard-coded category ID known to have services
    $category_id = 1; // Replace with a valid category ID that has services

    // Debugging: Log the category ID
    error_log('Category ID: ' . $category_id);

    // Query posts from the selected category for the custom post type 'services'
    $query = new WP_Query(array(
        'post_type' => 'services', // Specify the custom post type
        'tax_query' => array(
            array(
                'taxonomy' => 'category', // This should match the taxonomy used
                'field'    => 'term_id',
                'terms'    => $category_id,
            ),
        ),
        'posts_per_page' => 5 // Change this to the number of posts you want to display
    ));

    // Debugging: Log the number of posts found and the query details
    error_log('Posts found: ' . $query->found_posts);
    error_log('Query: ' . print_r($query, true)); // Log the query for inspection

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
        error_log('No posts found for category ID: ' . $category_id); // Log no posts found
    }
    wp_die(); // This is required to terminate immediately and return a proper response
}
add_action('wp_ajax_load_category_posts', 'load_category_posts');
add_action('wp_ajax_nopriv_load_category_posts', 'load_category_posts');



