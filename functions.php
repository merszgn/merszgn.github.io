<?php

// Add support for WordPress features like custom logos, featured images, etc.
function my_theme_setup() {
    add_theme_support('post-thumbnails');  // Enables featured images
    add_theme_support('custom-logo');      // Enables custom logo
    register_nav_menus(array(             // Registers a navigation menu
        'main_menu' => 'Main Navigation',
    ));
}
add_action('after_setup_theme', 'my_theme_setup');

// Enqueue Stylesheets and Scripts
function my_theme_scripts() {
    wp_enqueue_style('main-styles', get_stylesheet_uri());  // Main stylesheet
}
add_action('wp_enqueue_scripts', 'my_theme_scripts');

function my_theme_custom_query($query) {
    if ($query->is_main_query() && !is_admin()) {
        // Set number of posts per page to 6
        if (is_home() || is_archive()) {
            $query->set('posts_per_page', 6);
        }
    }
}
add_action('pre_get_posts', 'my_theme_custom_query');

add_filter('show_admin_bar', '__return_false');

// Register custom image size
function custom_thumbnail_size() {
    add_image_size('custom-thumbnail', 260, 250, true); // 260px wide, 250px tall, cropped
}
add_action('after_setup_theme', 'custom_thumbnail_size');

function enqueue_custom_scripts() {
    wp_enqueue_script('jquery');
}
add_action('wp_enqueue_scripts', 'enqueue_custom_scripts');

// Disable comments everywhere
function disable_comments_everywhere() {
    // Remove comments menu item
    remove_menu_page('edit-comments.php');
    
    // Redirect any user trying to access the comments page
    add_action('admin_init', function() {
        global $pagenow;
        if ($pagenow === 'edit-comments.php') {
            wp_redirect(admin_url());
            exit;
        }
    });

    // Remove comments support from all post types
    add_action('init', function() {
        foreach (get_post_types() as $post_type) {
            remove_post_type_support($post_type, 'comments');
            remove_post_type_support($post_type, 'trackbacks');
        }
    });
}
add_action('admin_menu', 'disable_comments_everywhere');

// Hide existing comments
function hide_existing_comments($open, $post_id) {
    return false;
}
add_filter('comments_open', 'hide_existing_comments', 10, 2);
add_filter('pings_open', 'hide_existing_comments', 10, 2);

// Remove comments template
function remove_comments_template($file) {
    return dirname(__FILE__) . '/no-comments.php';
}
add_filter('comments_template', 'remove_comments_template');

// Disable WordPress emoji script and styles
remove_action('wp_head', 'wpemoji_script');
remove_action('wp_head', 'wpemoji_style');
remove_action('wp_print_styles', 'print_emoji_styles');
remove_action('wp_print_scripts', 'print_emoji_scripts');
remove_filter('the_content', 'wp_staticize_emoji');
remove_filter('the_excerpt', 'wp_staticize_emoji');

// Shortcode to display the custom contact form
function handle_custom_contact_form() {
    if (isset($_POST['name'], $_POST['email'], $_POST['message'])) {
        $name = sanitize_text_field($_POST['name']);
        $email = sanitize_email($_POST['email']);
        $message = sanitize_textarea_field($_POST['message']);
        
        // Handle the form data (e.g., send an email or store it in the database)
        wp_mail('meryem@meryem.earth', "CONTACT FORM: from $name", $message, ['From' => $email]);
        
        // Redirect after submission
        wp_redirect(home_url('/contact'));
        exit;
    }
}
add_action('admin_post_nopriv_custom_contact_form', 'handle_custom_contact_form');
add_action('admin_post_custom_contact_form', 'handle_custom_contact_form');



?>