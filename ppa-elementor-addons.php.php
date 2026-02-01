<?php
/**
 * Plugin Name: PPA Elementor Widgets Collection
 * Description: A professional collection of custom Elementor widgets for ProjuktiPlus Academy.
 * Version: 1.2.0
 * Author: Md. Nayemur Rahman
 * Author URI: https://nayem.online
 * Text Domain: ppa
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

/**
 * Register Widgets.
 */
function ppa_register_widgets( $widgets_manager ) {

    // Include the Team Members widget file
    require_once( __DIR__ . '/includes/widgets/team-members.php' );

    // Register the widget instance
    // Note: Ensure the class name inside team-members.php matches PPA_Team_Members_Widget
    $widgets_manager->register( new \PPA_Team_Members_Widget() );

}
add_action( 'elementor/widgets/register', 'ppa_register_widgets' );


/**
 * Enqueue Styles and Scripts.
 */
function ppa_enqueue_assets() {
    
    // Custom Styles
    wp_enqueue_style( 'ppa-widgets-style', plugins_url( 'assets/css/style.css', __FILE__ ), array(), '1.2.0' );

    // Slick Slider CSS & JS (Dependencies)
    wp_enqueue_style( 'slick-slider', plugins_url( 'assets/css/slick.min.css', __FILE__ ), array(), '1.8.1' );
    wp_enqueue_script( 'slick-slider', plugins_url( 'assets/js/slick.min.js', __FILE__ ), array( 'jquery' ), '1.8.1', true );

    // Custom JavaScript
    wp_enqueue_script( 'ppa-custom-script', plugins_url( 'assets/js/custom.js', __FILE__ ), array( 'jquery', 'slick-slider' ), '1.2.0', true );

}
add_action( 'wp_enqueue_scripts', 'ppa_enqueue_assets' );