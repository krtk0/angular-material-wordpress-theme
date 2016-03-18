<?php

namespace angular\theme;

class themeCustomizer
{

    public function __construct()
    {
        add_action('customize_register', array($this, 'angular_material_customize_register'));
        add_action('customize_preview_init', array($this, 'angular_material_customize_preview_js'));
        add_action('wp_head', array($this, 'angular_material_css'));
    }

    /**
     * Add postMessage support for site title and description for the Theme Customizer.
     *
     * @param WP_Customize_Manager $wp_customize Theme Customizer object.
     */
    public function angular_material_customize_register($wp_customize)
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
    public function angular_material_customize_preview_js()
    {
        wp_enqueue_script('angular_material_customizer', get_template_directory_uri() . '/js/customizer.js', array('customize-preview'), '20130508', true);
    }

    function angular_material_css()
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

}




