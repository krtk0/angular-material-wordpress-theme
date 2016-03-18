<?php
/**
 * angular-material-theme functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package angular-material-theme
 */

require_once get_template_directory() . '/class/class_theme_customizer.php';
require_once get_template_directory() . '/class/class_utility.php';

$utility = new \angular\theme\utility();

if (!function_exists('angular_material_setup')) :
    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     */
    function angular_material_setup()
    {
        new \angular\theme\themeCustomizer();
    }
endif; // angular_material_setup
add_action('after_setup_theme', 'angular_material_setup');
