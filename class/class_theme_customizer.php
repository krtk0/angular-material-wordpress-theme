<?php

namespace angular\theme;

class themeCustomizer
{

    public function __construct()
    {
        add_action('customize_register', array($this, 'customize_register'));
        add_action('customize_preview_init', array($this, 'customize_preview_js'));
        add_action('wp_head', array($this, 'css'));
    }

    /**
     * Add postMessage support for site title and description for the Theme Customizer.
     *
     * @param WP_Customize_Manager $wp_customize Theme Customizer object.
     */
    public function customize_register($wp_customize)
    {
        $this->theme_colors($wp_customize);

        $wp_customize->add_setting(
            'header_icon',
            array('default' => '')
        );
        $wp_customize->add_control(
            new \WP_Customize_Image_Control(
                $wp_customize,
                'logo',
                array(
                    'label' => __( 'Upload a logo', '' ),
                    'section' => 'title_tagline',
                    'settings' => 'header_icon'
                )
            )
        );

        $wp_customize->get_setting('blogname')->transport = 'postMessage';
        $wp_customize->get_setting('blogdescription')->transport = 'postMessage';
    }

    /**
     * Adds controls for picking colors for the theme
     * @param $wp_customize
     */
    private function theme_colors($wp_customize)
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

        $footer_font_color = new \WP_Customize_Color_Control(
            $wp_customize,
            'header_font_color_ctrl',
            array(
                'label' => __('Header Font Color', 'angular-material'),
                'section' => 'colors',
                'settings' => 'header_font_color',
            )
        );
        $wp_customize->add_control($footer_font_color);

        $wp_customize->add_setting(
            'footer_font_color',
            array(
                'default'   => '#FFFFFF',
                'transport' => 'postMessage'
            )
        );

        $footer_font_color = new \WP_Customize_Color_Control(
            $wp_customize,
            'footer_font_color_ctrl',
            array(
                'label' => __('Footer Font Color', 'angular-material'),
                'section' => 'colors',
                'settings' => 'footer_font_color',
            )
        );
        $wp_customize->add_control($footer_font_color);
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
            #footer_content{
                color: <?php echo get_theme_mod('footer_font_color', '#000000'); ?>;
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




