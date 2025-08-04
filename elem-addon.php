<?php

/**
 * Plugin Name: Elementor addon plugin
 * Description: Add widget to increase functionality.
 * Plugin URI:  https://elementor.com/
 * Version:     1.0.0
 * Author:      Elementor Developer
 * Author URI:  https://developers.elementor.com/
 * Text Domain: elem_addon
 *
 * Requires Plugins: elementor
 * Elementor tested up to: 3.25.0
 * Elementor Pro tested up to: 3.25.0
 */



 if (!defined('ABSPATH') ){
    exit;
 }

 function wxregister_elem_addon($widgets_register){
    require_once(__DIR__ . '/widgets/addon-widget1.php');    
    require_once(__DIR__ . '/widgets/duel-button-widget.php');
    require_once(__DIR__. '/widgets/read-more.php');
    require_once(__DIR__. '/widgets/in-scroll.php');
    require_once(__DIR__. '/widgets/text-box.php');
    require_once(__DIR__. '/widgets/pricing.php');
    require_once(__DIR__. '/widgets/custom-heading.php');
    require_once(__DIR__. '/widgets/cascade-img.php');


    //register class
    $widgets_register->register(new \elem_addon_widget());
    $widgets_register->register(new \elem_duel_btn_widget());
    $widgets_register->register(new \elem_read_more());
    $widgets_register->register(new \elem_in_scroll());
    $widgets_register->register(new \widget5());
    $widgets_register->register(new \pricing());
    $widgets_register->register(new \elem_custom_heading());
    $widgets_register->register(new \elem_cascade_img());
   
 }

 add_action('elementor/widgets/register','wxregister_elem_addon');

//  css & js enqueue
function elem_addon_reg_dep(){
    wp_enqueue_style('in-scroll-css', plugins_url('assets/css/in-scroll.css', __FILE__), '1.0.0');
   wp_enqueue_style('duel-btn-css', plugins_url('assets/css/duel-btn.css', __FILE__), '1.0.0');
   wp_enqueue_style('read-more-css', plugins_url('assets/css/read-more.css', __FILE__), '1.0.0');
   wp_enqueue_style('text-box-css', plugins_url('assets/css/text-box.css', __FILE__), '1.0.0');
   wp_enqueue_style('pricing-css', plugins_url('assets/css/pricing.css', __FILE__), '1.0.0');
   wp_enqueue_style('custom-heading-css', plugins_url('assets/css/custom-heading.css', __FILE__), '1.0.0');
   wp_enqueue_style('cascade-img-css', plugins_url('assets/css/cascade-img.css', __FILE__), '1.0.0');
   
   wp_enqueue_script('jquery');
   wp_enqueue_script('in-scroll-js', plugins_url('assets/js/in-scroll.js', __FILE__), '1.0.0', ['jquery']);
   wp_enqueue_script('read-more-js', plugins_url('assets/js/read-more.js', __FILE__), '1.0.0');
   wp_enqueue_script('widget5-js', plugins_url('assets/js/text-box.js', __FILE__), '1.0.0');
   wp_enqueue_script('pricing-js', plugins_url('assets/js/pricing.js', __FILE__), '1.0.0');

}

add_action('wp_enqueue_scripts', 'elem_addon_reg_dep');



// function add_elementor_widget_categories( $elements_manager ) {

// 	$elements_manager->add_category(
// 		'first-category',
// 		[
// 			'title' => esc_html__( 'First Category', 'elem_addon' ),
// 			'icon' => 'fa fa-plug',
// 		]
// 	);


// }
// add_action( 'elementor/elements/categories_registered', 'add_elementor_widget_categories' );

function add_elementor_widget_categories( $elements_manager ) {

    $categories = [];
    $categories['first-category'] =
        [
            'title' => 'first-category',
        ];

    $old_categories = $elements_manager->get_categories();
    $categories = array_merge($categories, $old_categories);

    $set_categories = function ( $categories ) {
        $this->categories = $categories;
    };

    $set_categories->call( $elements_manager, $categories );

}

add_action( 'elementor/elements/categories_registered', 'add_elementor_widget_categories'); 