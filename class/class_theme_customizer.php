<?php

namespace angular\theme;

class themeCustomizer
{

    public function __construct()
    {
        add_action('customize_register', array($this, 'customize_register'));
        add_action('customize_preview_init', array($this, 'customize_preview_js'));
        add_action('wp_head', array($this, 'css'));
        add_action('widgets_init', 'widgets_init');
        add_action('wp_enqueue_scripts', 'scripts');

        require get_template_directory() . '/admin/admin-init.php';

        /*
         * Make theme available for translation.
         * Translations can be filed in the /languages/ directory.
         * If you're building a theme based on angular-material-theme, use a find and replace
         * to change 'angular-material' to the name of your theme in all the template files.
         */
        load_theme_textdomain('angular-material', get_template_directory() . '/languages');

        // Add default posts and comments RSS feed links to head.
        add_theme_support('automatic-feed-links');

        /*
         * Let WordPress manage the document title.
         * By adding theme support, we declare that this theme does not use a
         * hard-coded <title> tag in the document head, and expect WordPress to
         * provide it for us.
         */
        add_theme_support('title-tag');

        /*
         * Enable support for Post Thumbnails on posts and pages.
         *
         * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
         */
        add_theme_support('post-thumbnails');

        // This theme uses wp_nav_menu() in one location.
        register_nav_menus(array(
            'primary' => esc_html__('Primary Menu', 'angular-material'),
        ));

        /*
         * Switch default core markup for search form, comment form, and comments
         * to output valid HTML5.
         */
        add_theme_support('html5', array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
        ));

        /*
         * Enable support for Post Formats.
         * See https://developer.wordpress.org/themes/functionality/post-formats/
         */
        add_theme_support('post-formats', array(
            'aside',
            'image',
            'video',
            'quote',
            'link',
        ));
    }

    /**
     * Add postMessage support for site title and description for the Theme Customizer.
     *
     * @param WP_Customize_Manager $wp_customize Theme Customizer object.
     */
    public function customize_register($wp_customize)
    {
        $wp_customize->add_setting(
            'title_font_color',
            array(
                'default'   => '#FFFFFF',
                'transport' => 'postMessage'
            )
        );

        $title_font_color = new \WP_Customize_Color_Control(
            $wp_customize,
            'title_font_color_ctrl',
            array(
                'label' => __('Site Title Font Color', 'angular-material'),
                'section' => 'colors',
                'settings' => 'title_font_color',
            )
        );
        $wp_customize->add_control($title_font_color);

        $wp_customize->add_setting(
            'header_font_color',
            array(
                'default'   => '#FFFFFF',
                'transport' => 'postMessage'
            )
        );

        $header_font_color = new \WP_Customize_Color_Control(
            $wp_customize,
            'header_font_color_ctrl',
            array(
                'label' => __('Header Font Color', 'angular-material'),
                'section' => 'colors',
                'settings' => 'header_font_color',
            )
        );

        $wp_customize->add_control($header_font_color);
        $wp_customize->get_setting('blogname')->transport = 'postMessage';
        $wp_customize->get_setting('blogdescription')->transport = 'postMessage';
    }
    /**
     * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
     */
    public function customize_preview_js()
    {
        wp_enqueue_script('customizer', get_template_directory_uri() . '/js/customizer.js', array('customize-preview'), '20130508', true);
    }

    function css()
    {?>
        <style type="text/css">
            .site-title a{
                color: <?php echo get_theme_mod('title_font_color', '#000000'); ?>;
            }
            .site-description{
                color: <?php echo get_theme_mod('header_font_color', '#000000'); ?>;
            }
        </style><?php
    }

    /**
     * Register widget area.
     *
     * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
     */
    function widgets_init()
    {
        register_sidebar(array(
            'name' => esc_html__('Sidebar', 'angular-material'),
            'id' => 'sidebar-1',
            'description' => '',
            'before_widget' => '<aside id="%1$s" class="widget %2$s">',
            'after_widget' => '</aside>',
            'before_title' => '<h2 class="widget-title">',
            'after_title' => '</h2>',
        ));
    }


    /**
     * Enqueue scripts and styles.
     */
    function scripts()
    {
        if (is_singular() && comments_open() && get_option('thread_comments'))
            wp_enqueue_script('comment-reply');
    }

}




