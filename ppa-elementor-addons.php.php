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

    $widgets_manager->register( new \PPA_Blog_Widget() );
    $widgets_manager->register( new \PPA_Team_Widget() );
    $widgets_manager->register( new \PPA_Slider_Widget() );
    $widgets_manager->register( new \PPA_CTA_Widget() );
}
add_action('elementor/widgets/register', 'register_ppa_widgets');

function ppa_addon_scripts(){
    

    wp_register_script('ppa-cta-script', plugins_url('assets/js/cta.js', __FILE__), ['jquery'], '1.0.0', true );
    wp_register_script('ppa-slider-script', plugins_url('assets/js/main.js', __FILE__), ['jquery', 'slick-js'], '1.0.0', true );
    
    wp_enqueue_style('ppa-cta-style', plugins_url('assets/css/cta.css', __FILE__) );
    wp_enqueue_style('ppa-blog-style', plugins_url('assets/css/style.css', __FILE__) );
    wp_enqueue_script('ppa-slider-script', plugins_url('assets/js/main.js', __FILE__) );

}
add_action('wp_enqueue_scripts', 'ppa_addon_scripts');