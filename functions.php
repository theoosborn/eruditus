<?php

    // Add scripts and stylesheets
    function startwordpress_scripts() {
        wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css', array(), '4.2.1' );
        wp_enqueue_style( 'blog', get_template_directory_uri() . '/css/blog.css' );
        wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', array( 'jquery' ), '4.2.1', true );
    }

    add_action( 'wp_enqueue_scripts', 'startwordpress_scripts' );

    // Add Google Fonts
    function startwordpress_google_fonts() {
        wp_register_style('Playfair', 'https://fonts.googleapis.com/css?family=Playfair+Display:700,900');
        wp_enqueue_style( 'Playfair' );
    }
    
    add_action('wp_print_styles', 'startwordpress_google_fonts');

    // WordPress Titles
    add_theme_support( 'title-tag' );