<?php
/*
Plugin Name: PPA Elementor Addons
Description: Custom Elementor Widgets for ProjuktiPlus Academy.
Plugin URI: wpplugin.projukriplus.com 
Virsion: 1.0.0
Autor: Md. Nayemur Rahman
Author URI: admin.projuktiplus.com 
Text Domin: ppa-addons
*/

if( ! defined( 'ABSPATH' )){
    exit;
}

function register_ppa_widgets( $widgets_manager ){
    require_once( __DIR__ . '/widgets/blog-widget.php');
    require_once( __DIR__ . '/widgets/team-member.php');
    require_once( __DIR__ . '/widgets/slider-widget.php');
    require_once( __DIR__ . '/widgets/call-to-action-widget.php');
    require_once( __DIR__ . '/widgets/newsletter-widget.php');
    require_once( __DIR__ . '/widgets/pricing-table-widget.php');
    require_once( __DIR__ . '/widgets/testimonial-slider-widget.php');

    $widgets_manager->register( new \PPA_Blog_Widget() );
    $widgets_manager->register( new \PPA_Team_Widget() );
    $widgets_manager->register( new \PPA_Slider_Widget() );
    $widgets_manager->register( new \PPA_CTA_Widget() );
    $widgets_manager->register( new \PPA_Newsletter_Widget() );
    $widgets_manager->register( new \PPA_Pricing_Table_Widget() );
    $widgets_manager->register( new \PPA_Testimonial_Slider_Widget() );
}
add_action('elementor/widgets/register', 'register_ppa_widgets');

function ppa_addon_scripts(){

    // ── Slick Carousel (shared dependency) ──────────────────────────────────
    wp_register_style(
        'ppa-slick-style',
        plugins_url( 'assets/css/slick.min.css', __FILE__ ),
        [],
        '1.8.1'
    );

    wp_register_script(
        'ppa-slick-js',
        plugins_url( 'assets/js/slick.min.js', __FILE__ ),
        [ 'jquery' ],
        '1.8.1',
        true
    );

    // ── Existing widgets ─────────────────────────────────────────────────────
    wp_register_script(
        'ppa-cta-script',
        plugins_url( 'assets/js/cta.js', __FILE__ ),
        [ 'jquery' ],
        '1.0.0',
        true
    );

    wp_register_script(
        'ppa-slider-script',
        plugins_url( 'assets/js/main.js', __FILE__ ),
        [ 'jquery', 'ppa-slick-js' ],
        '1.0.0',
        true
    );

    wp_enqueue_style( 'ppa-cta-style',        plugins_url( 'assets/css/cta.css',        __FILE__ ) );
    wp_enqueue_style( 'ppa-blog-style',       plugins_url( 'assets/css/style.css',       __FILE__ ) );
    wp_enqueue_style( 'ppa-newsletter-style', plugins_url( 'assets/css/newsletter.css',  __FILE__ ) );
    wp_enqueue_style( 'ppa-slick-style' );

    wp_enqueue_script( 'ppa-slick-js' );
    wp_enqueue_script( 'ppa-slider-script' );

    // ── Pricing Table ────────────────────────────────────────────────────────
    wp_enqueue_style(
        'ppa-pricing-table-style',
        plugins_url( 'assets/css/pricing-table.css', __FILE__ ),
        [],
        '1.1.0'
    );

    // ── Testimonial Slider ───────────────────────────────────────────────────
    wp_enqueue_style(
        'ppa-testimonial-style',
        plugins_url( 'assets/css/testimonial.css', __FILE__ ),
        [ 'ppa-slick-style', 'ppa-blog-style' ],
        '1.1.0'
    );

    wp_enqueue_script(
        'ppa-testimonial-script',
        plugins_url( 'assets/js/testimonial.js', __FILE__ ),
        [ 'jquery', 'ppa-slick-js' ],
        '1.1.0',
        true
    );
}
add_action( 'wp_enqueue_scripts', 'ppa_addon_scripts' );