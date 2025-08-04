<?php

//to create a elementor widget we have to first create a function that register the widget and create a obj class to make a bridge with widget file. 


function wp_widget_reg($widget_manager){

    //register widget
    require_once(__DIR__ . 'all-widgets/icon_box1.php');

    //crate a obj class
    $widget_manager->register(new \icon_box1());
}

add_action('elementor/widget/register', 'wp_widget_reg');


class icon_box1() extends Elementor\Widget_Base {

}
?>

