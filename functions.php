<?php

// Configure les fonctionnalités de bases
function flosetluna_setup(){

    // Prise en charge des images de mise en avant
    add_theme_support('post-thumbnails');

    // Ajouter automatiquement le titre du site dans l'entete
    add_theme_support('title-tag');

    // Woocommerce theme support 
    add_theme_support( 'woocommerce' );
    // add_theme_support( 'wc-product-gallery-zoom' );
    add_theme_support( 'wc-product-gallery-slider' );
    // add_filter( 'woocommerce_enqueue_styles', '__return_false' );


    // Ajouts des menus
    register_nav_menus( array(
        'menu-principal' => 'Menu Principal',
        'menu-mobile' => 'Menu mobile',
        'menu-footer-produits' => 'Menu Footer Produits',
        'menu-footer-flosetluna' => 'Menu Footer Flos et Luna',
    ) );

}
add_action( 'after_setup_theme', 'flosetluna_setup' );

// Ajout des scripts
function flosetluna_register_assets(){

    // CSS
    wp_enqueue_style( 
        'fonts', 
        'https://fonts.googleapis.com/css2?family=PT+Sans:ital,wght@0,700;1,400&family=Playfair+Display:wght@700&display=swap',
        array(),
        '1.0'
    );
    wp_enqueue_style( 
        'flosetluna', 
        get_stylesheet_uri( ),
        array('fonts'),
        '1.0'
    );
    

    // JS
    wp_enqueue_script( 
        'flosetluna', 
        get_template_directory_uri() . '/dist/app.js', 
        array(),
        '1.0',
        true
    );

}
add_action( 'wp_enqueue_scripts', 'flosetluna_register_assets');

// Custom image size
add_image_size( 'xl', 1440);
add_image_size( 'xxl', 1920);
add_image_size( 'xxxl', 2500);

// Woocommerce
remove_action('woocommerce_single_product_summary','woocommerce_template_single_title', 5);
remove_action('woocommerce_single_product_summary','woocommerce_template_single_rating', 10);
remove_action('woocommerce_single_product_summary','woocommerce_template_single_excerpt', 20);
remove_action('woocommerce_single_product_summary','woocommerce_template_single_meta', 40);

// Product filter
require get_template_directory() . '/inc/product-filter.php';