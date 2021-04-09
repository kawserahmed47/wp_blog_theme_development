<?php

    function kawserblog_theme_support(){
        // Add dynamic title tag support 
        add_theme_support('title-tag');
        add_theme_support('custom-logo');
        add_theme_support('post-thumbnails');
    }

    add_action('after_setup_theme', 'kawserblog_theme_support');


    function kawserblog_menus(){
        $locations = array(
            "primary" => "Desktop Primary Left Sidebar",
            "footer" => "Footer Menu Items"
        );

        register_nav_menus($locations);
    }

    add_action('init', 'kawserblog_menus');

    function kawserblog_register_style(){
        $version = wp_get_theme()->get('Version');
        wp_enqueue_style('kawserblog-bootstrap',  "https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css", array(), '4.4.1', 'all');
        wp_enqueue_style('kawserblog-font-awesome', "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css", array(), '5.13.0', 'all');
        wp_enqueue_style('kawserblog-style', get_template_directory_uri(). "/style.css", array('kawserblog-bootstrap'), $version, 'all');

    }

    add_action('wp_enqueue_scripts', 'kawserblog_register_style');





    function kawserblog_register_scripts(){
        $version = wp_get_theme()->get('Version');
        wp_enqueue_script('kawserblog-jquery',  "https://code.jquery.com/jquery-3.4.1.slim.min.js", array(), '3.4.1', 'all');
        wp_enqueue_script('kawserblog-popper', "https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js", array(), '1.16.0', 'all');
        wp_enqueue_script('kawserblog-bootstrap', "https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js", array(), '4.4.1', 'all');
        wp_enqueue_script('kawserblog-script', get_template_directory_uri(). "/assets/js/main.js", array('kawserblog-bootstrap'), $version, 'all');
        
    }

    add_action('wp_enqueue_scripts', 'kawserblog_register_scripts');


    function kawserblog_widget_areas(){
        register_sidebar(
            array(
                'before_title'=> '<h2>',
                'after_title'=> '</h2>',
                'before_widget'=> '',
                'after_widget'=> '',
                'name'=> 'Sidebar Area',
                'id'=> 'sidebar-1',
                'description'=> 'Sidebar Widget Area'
            )
            );

            register_sidebar(
                array(
                    'before_title'=> '<h2>',
                    'after_title'=> '</h2>',
                    'before_widget'=> '',
                    'after_widget'=> '',
                    'name'=> 'Footer Area',
                    'id'=> 'footer-1',
                    'description'=> 'Footer Widget Area'
                )
                );
    }

    add_action('widgets_init', 'kawserblog_widget_areas');



?>