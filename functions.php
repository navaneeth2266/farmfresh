<?php
/**
 * FarmFresh Theme Functions
 */

// Theme setup
function farmfresh_setup() {
    // Add theme support
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
    ));
    add_theme_support('custom-logo');
    add_theme_support('woocommerce');
    add_theme_support('wc-product-gallery-zoom');
    add_theme_support('wc-product-gallery-lightbox');
    add_theme_support('wc-product-gallery-slider');

    // Register navigation menus
    register_nav_menus(array(
        'menu-1' => esc_html__('Primary', 'farmfresh'),
        'footer-menu-1' => esc_html__('Footer Menu 1', 'farmfresh'),
        'footer-menu-2' => esc_html__('Footer Menu 2', 'farmfresh'),
        'footer-menu-3' => esc_html__('Footer Menu 3', 'farmfresh'),
    ));
}
add_action('after_setup_theme', 'farmfresh_setup');

// Enqueue scripts and styles
function farmfresh_scripts() {
    wp_enqueue_style('farmfresh-style', get_stylesheet_uri(), array(), '1.0.0');
    wp_enqueue_style('farmfresh-icons', get_template_directory_uri() . '/assets/css/icons.css', array(), '1.0.0');
    
    wp_enqueue_script('farmfresh-script', get_template_directory_uri() . '/assets/js/main.js', array('jquery'), '1.0.0', true);
    
    // Localize script for AJAX
    wp_localize_script('farmfresh-script', 'farmfresh_ajax', array(
        'ajax_url' => admin_url('admin-ajax.php'),
        'nonce' => wp_create_nonce('farmfresh_nonce'),
    ));
}
add_action('wp_enqueue_scripts', 'farmfresh_scripts');

// Register widget areas
function farmfresh_widgets_init() {
    register_sidebar(array(
        'name'          => esc_html__('Sidebar', 'farmfresh'),
        'id'            => 'sidebar-1',
        'description'   => esc_html__('Add widgets here.', 'farmfresh'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ));
}
add_action('widgets_init', 'farmfresh_widgets_init');

// Custom post types and taxonomies
function farmfresh_custom_post_types() {
    // Register Product custom post type (if not using WooCommerce)
    if (!class_exists('WooCommerce')) {
        register_post_type('product', array(
            'labels' => array(
                'name' => 'Products',
                'singular_name' => 'Product',
            ),
            'public' => true,
            'has_archive' => true,
            'supports' => array('title', 'editor', 'thumbnail', 'excerpt'),
            'menu_icon' => 'dashicons-products',
        ));

        register_taxonomy('product_category', 'product', array(
            'labels' => array(
                'name' => 'Product Categories',
                'singular_name' => 'Product Category',
            ),
            'hierarchical' => true,
            'public' => true,
        ));
    }
}
add_action('init', 'farmfresh_custom_post_types');

// AJAX handlers
function farmfresh_add_to_cart() {
    check_ajax_referer('farmfresh_nonce', 'nonce');
    
    $product_id = intval($_POST['product_id']);
    $quantity = intval($_POST['quantity']) ?: 1;
    
    if (function_exists('WC')) {
        $result = WC()->cart->add_to_cart($product_id, $quantity);
        
        if ($result) {
            wp_send_json_success(array(
                'message' => 'Product added to cart',
                'cart_count' => WC()->cart->get_cart_contents_count(),
            ));
        } else {
            wp_send_json_error('Failed to add product to cart');
        }
    }
    
    wp_die();
}
add_action('wp_ajax_farmfresh_add_to_cart', 'farmfresh_add_to_cart');
add_action('wp_ajax_nopriv_farmfresh_add_to_cart', 'farmfresh_add_to_cart');

function farmfresh_newsletter_signup() {
    check_ajax_referer('farmfresh_nonce', 'nonce');
    
    $email = sanitize_email($_POST['email']);
    
    if (is_email($email)) {
        // Save to database or integrate with email service
        $subscribers = get_option('farmfresh_subscribers', array());
        if (!in_array($email, $subscribers)) {
            $subscribers[] = $email;
            update_option('farmfresh_subscribers', $subscribers);
        }
        
        wp_send_json_success('Successfully subscribed to newsletter');
    } else {
        wp_send_json_error('Invalid email address');
    }
    
    wp_die();
}
add_action('wp_ajax_farmfresh_newsletter', 'farmfresh_newsletter_signup');
add_action('wp_ajax_nopriv_farmfresh_newsletter', 'farmfresh_newsletter_signup');

// Customize WooCommerce
function farmfresh_woocommerce_support() {
    add_theme_support('woocommerce');
    add_theme_support('wc-product-gallery-zoom');
    add_theme_support('wc-product-gallery-lightbox');
    add_theme_support('wc-product-gallery-slider');
}
add_action('after_setup_theme', 'farmfresh_woocommerce_support');

// Remove WooCommerce default styles
add_filter('woocommerce_enqueue_styles', '__return_empty_array');

// Custom WooCommerce hooks
remove_action('woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
remove_action('woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);

add_action('woocommerce_before_main_content', 'farmfresh_wrapper_start', 10);
add_action('woocommerce_after_main_content', 'farmfresh_wrapper_end', 10);

function farmfresh_wrapper_start() {
    echo '<main id="main" class="site-main"><div class="container">';
}

function farmfresh_wrapper_end() {
    echo '</div></main>';
}

// Image optimization and lazy loading
function farmfresh_add_image_attributes($attr, $attachment, $size) {
    // Add lazy loading to images
    if (!is_admin()) {
        $attr['loading'] = 'lazy';
    }
    
    // Add responsive image classes
    $attr['class'] = isset($attr['class']) ? $attr['class'] . ' responsive-image' : 'responsive-image';
    
    return $attr;
}
add_filter('wp_get_attachment_image_attributes', 'farmfresh_add_image_attributes', 10, 3);

// Add image sizes
function farmfresh_image_sizes() {
    add_image_size('category-thumb', 300, 300, true);
    add_image_size('product-thumb', 400, 300, true);
    add_image_size('hero-image', 800, 600, true);
    add_image_size('product-gallery', 600, 600, true);
}
add_action('after_setup_theme', 'farmfresh_image_sizes');

// Optimize images on upload
function farmfresh_optimize_image_quality($quality, $mime_type) {
    switch ($mime_type) {
        case 'image/jpeg':
            return 85;
        case 'image/webp':
            return 85;
        default:
            return $quality;
    }
}
add_filter('wp_editor_set_quality', 'farmfresh_optimize_image_quality', 10, 2);

// Add WebP support
function farmfresh_webp_support($mimes) {
    $mimes['webp'] = 'image/webp';
    return $mimes;
}
add_filter('upload_mimes', 'farmfresh_webp_support');

// Custom function to get optimized image
function farmfresh_get_optimized_image($image_path, $alt_text = '', $class = '') {
    $image_url = get_template_directory_uri() . '/assets/images/' . $image_path;
    
    // Check if WebP version exists
    $webp_path = str_replace(array('.jpg', '.jpeg', '.png'), '.webp', $image_path);
    $webp_url = get_template_directory_uri() . '/assets/images/' . $webp_path;
    
    if (file_exists(get_template_directory() . '/assets/images/' . $webp_path)) {
        return '<picture class="' . esc_attr($class) . '">
                    <source srcset="' . esc_url($webp_url) . '" type="image/webp">
                    <img src="' . esc_url($image_url) . '" alt="' . esc_attr($alt_text) . '" loading="lazy">
                </picture>';
    } else {
        return '<img src="' . esc_url($image_url) . '" alt="' . esc_attr($alt_text) . '" class="' . esc_attr($class) . '" loading="lazy">';
    }
}
?>
