<?php
    // Enqueue child theme style.css
    add_action( 'wp_head', function() {
        wp_enqueue_style( 'child-style', get_stylesheet_uri() );

        if ( is_rtl() ) {
            wp_enqueue_style( 'mylisting-rtl', get_template_directory_uri() . '/rtl.css', [], wp_get_theme()->get('Version') );
        }
    }, 500 );

    function add_custom_js_to_footer() {
        wp_enqueue_script('custom-js', get_stylesheet_directory_uri() . '/custom.js', array(), '1.0', true);
    }
    add_action('wp_footer', 'add_custom_js_to_footer');

    // disable widgets and editor classic
    add_filter('use_widgets_block_editor', '__return_false');
    add_filter('use_block_editor_for_post', '__return_false');

    // scry 
    remove_action('wp_head', 'wp_generator'); // WordPress sürüm numarasını kaldırır
    remove_action('wp_head', 'rsd_link'); // RSD (Really Simple Discovery) bağlantısını kaldırır
    remove_action('wp_head', 'wlwmanifest_link'); // Windows Live Writer entegrasyon bağlantısını kaldırır
    remove_action('wp_head', 'wp_shortlink_wp_head'); // Kısa bağlantıyı kaldırır
    remove_action('wp_head', 'rest_output_link_wp_head'); // REST API bağlantısını kaldırır
    remove_action('wp_head', 'wp_oembed_add_discovery_links'); // OEmbed bağlantılarını kaldırır
    remove_action('template_redirect', 'wp_shortlink_header', 11); // Kısa bağlantı HTTP başlığını kaldırır
    define('DISALLOW_FILE_EDIT', true); // Tema ve eklenti editörünü devre dışı bırakır
    add_filter('xmlrpc_enabled', '__return_false'); // XMLRPC Erişimini Kapatma:


   
    add_filter( 'body_class','my_body_classes' );
    function my_body_classes( $classes ) {
        $classes[] = ' qodef-skin--white';
        return $classes;
    }

    add_filter( 'acf/settings/show_admin', '__return_true', 50 );


    // add_filter( 'mylisting\single\og:image', function() {
    //     return 'cover';
    // } );


    // Favicon eklemek için fonksiyon
    function my_custom_favicon() {
        echo '<link rel="apple-touch-icon" sizes="180x180" href="' . esc_url( get_stylesheet_directory_uri() ) . '/img/apple-touch-icon.png"> <link rel="icon" type="image/png" sizes="32x32" href="' . esc_url( get_stylesheet_directory_uri() ) . '/img/favicon-32x32.png"> <link rel="icon" type="image/png" sizes="16x16" href="' . esc_url( get_stylesheet_directory_uri() ) . '/img/favicon-16x16.png"> <link rel="manifest" href="' . esc_url( get_stylesheet_directory_uri() ) . '/img/site.webmanifest"> <link rel="mask-icon" href="' . esc_url( get_stylesheet_directory_uri() ) . '/img/safari-pinned-tab.svg" color="#000000"> <meta name="apple-mobile-web-app-title" content="CK"> <meta name="application-name" content="CK"> <meta name="msapplication-TileColor" content="#ffffff"> <meta name="theme-color" content="#ffffff">' . "\n";
    }
    add_action( 'wp_head', 'my_custom_favicon' );

    // JS dosyalarını footera taşıma kodu başlangıcı. 
    // function remove_head_scripts() { 
    // remove_action('wp_head', 'wp_print_scripts'); 
    // remove_action('wp_head', 'wp_print_head_scripts', 9); 
    // remove_action('wp_head', 'wp_enqueue_scripts', 1); 
    // add_action('wp_footer', 'wp_print_scripts', 5); 
    // add_action('wp_footer', 'wp_enqueue_scripts', 5); 
    // add_action('wp_footer', 'wp_print_head_scripts', 5); } 
    // add_action( 'wp_enqueue_scripts', 'remove_head_scripts' ); 
    // JS dosyalarını footera taşıma kodu sonu.
