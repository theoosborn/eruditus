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

    // Custom settings
    function custom_settings_add_menu() {
        add_menu_page( 'Custom Settings', 'Custom Settings', 'manage_options', 'custom-settings', 'custom_settings_page', null, 99 );
    }

    add_action( 'admin_menu', 'custom_settings_add_menu' );

    // Create Custom Global Settings
    function custom_settings_page() { ?>
        <div class="wrap">
            <h1>Custom Settings</h1>
            <form method="post" action="options.php">
                <?php  
                    settings_fields( 'section' );
                    do_settings_sections( 'theme-options' );
                    submit_button();
                ?>
            </form>
        </div>
    <?php }

    // Twitter
    function setting_twitter() { ?>
        <input type="text" name="twitter" id="twitter" value="<?php echo get_option( 'twitter' ); ?>" />
    <?php }

    // Github
    function setting_github() { ?>
        <input type="text" name="github" id="github" value="<?php echo get_option('github'); ?>" />
    <?php }

    function custom_settings_page_setup() {
        add_settings_section( 'section', 'All Settings', null, 'theme-options' );
        add_settings_field( 'twitter', 'Twitter URL', 'setting_twitter', 'theme-options', 'section' );
        add_settings_field( 'github', 'Github URL', 'setting_github', 'theme-options', 'section' );

        register_setting('section', 'twitter');
        register_setting('section', 'github');
    }
        
    add_action( 'admin_init', 'custom_settings_page_setup' );

    // Support Featured Images
    add_theme_support( 'post-thumbnails' );