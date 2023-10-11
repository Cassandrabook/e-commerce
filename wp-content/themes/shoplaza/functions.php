<?php
/**
 * Shoplaza functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Shoplaza
 * @since 1.0
 */

if ( ! function_exists( 'shoplaza_support' ) ) :

	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * @since 1.0
	 *
	 * @return void
	 */
	function shoplaza_support() {

		// Add support for block styles.
		add_theme_support( 'wp-block-styles' );

		// Enqueue editor styles.
		add_editor_style( 'style.css' );

	}

endif;

add_action( 'after_setup_theme', 'shoplaza_support' );

if ( ! function_exists( 'shoplaza_styles' ) ) :

	/**
	 * Enqueue styles.
	 *
	 * @since 1.0
	 *
	 * @return void
	 */

	function shoplaza_styles() {
		// Enqueue theme stylesheet.
		wp_enqueue_style(
			'shoplaza-style',
			get_template_directory_uri() . '/style.css',
			array(),
			filemtime( get_theme_file_path( 'style.css' ) )
		);

		wp_enqueue_script(
            'shoplaza-script',
            get_theme_file_uri( 'assets/js/custom.js' ),
            array(),
            filemtime( get_theme_file_path( 'assets/js/custom.js' ) ),
            true
        );
	}

endif;

add_action( 'wp_enqueue_scripts', 'shoplaza_styles' );

if ( ! function_exists( 'shoplaza_block_editor_styles' ) ) :

    /**
     * Enqueue rtl editor styles
     */

     function shoplaza_block_editor_styles() {
        if( is_rtl() ){
            wp_enqueue_style(
                'shoplaza-rtl',
                get_theme_file_uri( 'rtl.css' ),
                array(),
                filemtime( get_theme_file_path( 'rtl.css' ) )
            );
        }
    }

endif;

add_action( 'enqueue_block_editor_assets', 'shoplaza_block_editor_styles' );

// Add block patterns
require get_template_directory() . '/inc/block-patterns.php';

// Add block styles
require get_template_directory() . '/inc/block-styles.php';

// Block Filters
require get_template_directory() . '/inc/block-filters.php';

// Svg icons
require get_template_directory() . '/inc/icon-function.php';

// Theme About Page
require get_template_directory() . '/inc/about.php';

add_theme_support('menus');

function post_type_stores(){
$supports = array(
'title', 
'editor',
);
 
$labels = array(
'name' => _x('Stores', 'plural'),
'singular_name' => _x('Stores', 'singular'),
'menu_name' => _x('Stores', 'admin menu'),
'name_admin_bar' => _x('Stores', 'admin bar'),
'add_new' => _x('Add New', 'add new'),
'add_new_item' => __('Add New Stores'),
'new_item' => __('New stores'),
'edit_item' => __('Edit stores'),
'view_item' => __('View stores'),
'all_items' => __('All stores'),
'search_items' => __('Search stores'),
'not_found' => __('No stores found.'),
);
 
$args = array(
'supports' => $supports, // Vilka "content" delar som ska användas i post-typen
'labels' => $labels, // Namn och text som syns i UI:t
'public' => true, // Om alla användare ska kunna skapa denna post-types
'query_var' => true, // Skapa en query-variabel för post-typen
'rewrite' => array('slug' => 'stores'), // Hur man når post-typen (t.ex. som inläggsida) http://localhost/news/
'has_archive' => true, // Ska post-typen ha arkiv-sida? Likt inlägg
'hierarchical' => false, // Ska de behandlas som sidor (true) eller inlägg (false)?
'show_in_rest' => true,
);
 
register_post_type('stores', $args);
}
 
add_action('init', 'post_type_stores');

function remove_standard_shipping( $rates, $package ) {
    $free_shipping = false;
    foreach ( $rates as $rate ) {
        if ( 'free_shipping' === $rate->method_id ) {
            $free_shipping = true;
            break;
        }
    }
    if ( $free_shipping ) {
        foreach ( $rates as $rate_key => $rate ) {
            if ( 'free_shipping' !== $rate->method_id ) {
                unset( $rates[ $rate_key ] );
            }
        }
    }
    return $rates;
}

add_filter( 'woocommerce_package_rates', 'remove_standard_shipping', 10, 2 );

function display_remaining_amount_for_free_shipping() {
    // Set the minimum amount for free shipping
    $minimum_amount_for_free_shipping = 400;

    // Get the current cart total
    $cart_total = WC()->cart->get_subtotal();

    // Calculate the remaining amount for free shipping
    $remaining_amount = $minimum_amount_for_free_shipping - $cart_total;

    // Check if the remaining amount is positive and if there are items in the cart
    if ($remaining_amount > 0 && WC()->cart->get_cart_contents_count() > 0) {
        echo '<div class="free-shipping-message">Du har <strong>' . wc_price($remaining_amount) . '</strong> kvar för fri frakt!</div>';
    }
}
add_action('woocommerce_before_cart', 'display_remaining_amount_for_free_shipping');