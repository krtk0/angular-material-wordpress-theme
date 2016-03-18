<?php

/**
 * For full documentation, please visit: http://docs.reduxframework.com/
 * For a more extensive sample-config file, you may look at:
 * https://github.com/reduxframework/redux-framework/blob/master/sample/sample-config.php
 */

if (!class_exists('Redux')) {
    return;
}

// This is your option name where all the Redux data is stored.
$opt_name = "material";

/**
 * ---> SET ARGUMENTS
 * All the possible arguments for Redux.
 * For full documentation on arguments, please refer to: https://github.com/ReduxFramework/ReduxFramework/wiki/Arguments
 * */

$theme = wp_get_theme(); // For use with some settings. Not necessary.

$args = array(
    'opt_name' => 'material',
    'use_cdn' => TRUE,
    'display_name' => 'Angular Material Design',
    'display_version' => '0.0.1',
    'page_slug' => 'material_options',
    'page_title' => 'Material Options',
    'update_notice' => TRUE,
    'admin_bar' => false,
    'menu_type' => 'hidden',
    'menu_title' => 'Material Options',
    'allow_sub_menu' => false,
    'page_parent_post_type' => 'your_post_type',
    'page_priority' => '40',
    'customizer' => TRUE,
    'default_show' => TRUE,
    'default_mark' => '(default)',
    'google_api_key' => 'AIzaSyASlE2vceiZW1PwKcytCeXWhGXayIfQx88',
    'hints' => array(
        'icon_position' => 'right',
        'icon_size' => 'normal',
        'tip_style' => array(
            'color' => 'light',
        ),
        'tip_position' => array(
            'my' => 'top left',
            'at' => 'bottom right',
        ),
        'tip_effect' => array(
            'show' => array(
                'duration' => '500',
                'event' => 'mouseover',
            ),
            'hide' => array(
                'duration' => '500',
                'event' => 'mouseleave unfocus',
            ),
        ),
    ),
    'output' => TRUE,
    'output_tag' => TRUE,
    'settings_api' => TRUE,
    'cdn_check_time' => '1440',
    'compiler' => TRUE,
    'page_permissions' => 'manage_options',
    'save_defaults' => TRUE,
    'show_import_export' => TRUE,
    'transient_time' => '3600',
    'network_sites' => TRUE,
    'dev_mode' => false
);

Redux::setArgs($opt_name, $args);

/*
 * ---> END ARGUMENTS
 */

/*
 *
 * ---> START SECTIONS
 *
 */

$palettes = array(
    'red' => array(
        '#FFEBEE',
        '#FFCDD2',
        '#EF9A9A',
        '#E57373',
        '#EF5350',
        '#F44336',
        '#E53935',
        '#D32F2F',
        '#C62828',
        '#B71C1C'
    ),
    'pink' => array(
        '#FFEBEE',
        '#FFCDD2',
        '#EF9A9A',
        '#E57373',
        '#EF5350',
        '#F44336',
        '#E53935',
        '#D32F2F',
        '#C62828',
        '#B71C1C',
        '#FCE4EC'
    ),
    'purple' => array(
        '#F3E5F5',
        '#E1BEE7',
        '#CE93D8',
        '#BA68C8',
        '#AB47BC',
        '#9C27B0',
        '#8E24AA',
        '#7B1FA2',
        '#6A1B9A',
        '#4A148C'
    ),
    'deep-purple' => array(
        '#EDE7F6',
        '#D1C4E9',
        '#B39DDB',
        '#9575CD',
        '#7E57C2',
        '#673AB7',
        '#5E35B1',
        '#512DA8',
        '#4527A0',
        '#311B92'
    ),
    'indigo' => array(
        '#E8EAF6',
        '#C5CAE9',
        '#9FA8DA',
        '#7986CB',
        '#5C6BC0',
        '#3F51B5',
        '#3949AB',
        '#303F9F',
        '#283593',
        '#1A237E'
    ),
    'blue' => array(
        '#E3F2FD',
        '#BBDEFB',
        '#90CAF9',
        '#64B5F6',
        '#42A5F5',
        '#2196F3',
        '#1E88E5',
        '#1976D2',
        '#1565C0',
        '#0D47A1'
    ),
    'light-blue' => array(
        '#E1F5FE',
        '#B3E5FC',
        '#81D4FA',
        '#4FC3F7',
        '#29B6F6',
        '#03A9F4',
        '#039BE5',
        '#0288D1',
        '#0277BD',
        '#01579B'
    ),
    'cyan' => array(
        '#E0F7FA',
        '#B2EBF2',
        '#80DEEA',
        '#4DD0E1',
        '#26C6DA',
        '#00BCD4',
        '#00ACC1',
        '#0097A7',
        '#00838F',
        '#006064'
    ),
    'teal' => array(
        '#E0F2F1',
        '#B2DFDB',
        '#80CBC4',
        '#4DB6AC',
        '#26A69A',
        '#009688',
        '#00897B',
        '#00796B',
        '#00695C',
        '#004D40'
    ),
    'green' => array(
        '#E8F5E9',
        '#C8E6C9',
        '#A5D6A7',
        '#81C784',
        '#66BB6A',
        '#4CAF50',
        '#43A047',
        '#388E3C',
        '#2E7D32',
        '#1B5E20'
    ),
    'light-green' => array(
        '#F1F8E9',
        '#DCEDC8',
        '#C5E1A5',
        '#AED581',
        '#9CCC65',
        '#8BC34A',
        '#7CB342',
        '#689F38',
        '#558B2F',
        '#33691E'
    ),
    'lime' => array(
        '#F9FBE7',
        '#F0F4C3',
        '#E6EE9C',
        '#DCE775',
        '#D4E157',
        '#CDDC39',
        '#C0CA33',
        '#AFB42B',
        '#9E9D24',
        '#827717'
    ),
    'yellow' => array(
        '#FFFDE7',
        '#FFF9C4',
        '#FFF59D',
        '#FFF176',
        '#FFEE58',
        '#FFEB3B',
        '#FDD835',
        '#FBC02D',
        '#F9A825',
        '#F57F17'
    ),
    'amber' => array(
        '#FFF3E0',
        '#FFE0B2',
        '#FFCC80',
        '#FFB74D',
        '#FFA726',
        '#FF9800',
        '#FB8C00',
        '#F57C00',
        '#EF6C00',
        '#E65100'
    ),
    'orange' => array(
        '#FFF3E0',
        '#FFE0B2',
        '#FFCC80',
        '#FFB74D',
        '#FFA726',
        '#FF9800',
        '#FB8C00',
        '#F57C00',
        '#EF6C00',
        '#E65100'
    ),
    'deep-orange' => array(
        '#FBE9E7',
        '#FFCCBC',
        '#FFAB91',
        '#FF8A65',
        '#FF7043',
        '#FF5722',
        '#F4511E',
        '#E64A19',
        '#D84315',
        '#BF360C'
    ),
    'brown' => array(
        '#EFEBE9',
        '#D7CCC8',
        '#BCAAA4',
        '#A1887F',
        '#8D6E63',
        '#795548',
        '#6D4C41',
        '#5D4037',
        '#4E342E',
        '#3E2723'
    ),
    'grey' => array(
        '#FAFAFA',
        '#F5F5F5',
        '#EEEEEE',
        '#E0E0E0',
        '#BDBDBD',
        '#9E9E9E',
        '#757575',
        '#616161',
        '#424242',
        '#212121'
    ),
    'blue-grey' => array(
        '#ECEFF1',
        '#CFD8DC',
        '#B0BEC5',
        '#90A4AE',
        '#78909C',
        '#607D8B',
        '#546E7A',
        '#455A64',
        '#37474F',
        '#263238'
    ),
    'black' => array(
        '#000000'
    ),
    'white' => array(
        '#FFFFFF'
    )
);

Redux::setSection($opt_name, array(
    'title' => __('Palette Colors', 'angular-material'),
    'desc' => __('For full documentation on this field, visit: ', 'angular-material') . '<a href="//docs.reduxframework.com/core/fields/palette-color/" target="_blank">docs.reduxframework.com/core/fields/palette-color/</a>',
    'id' => 'color-palette',
    'icon' => 'el el-brush',
    'fields' => array(
        array(
            'id' => 'primary_palette',
            'type' => 'palette',
            'title' => __('Primary Color Palette', 'angular-material'),
            'subtitle' => __('Only color validation can be done on this field type', 'angular-material'),
            'desc' => __('This is the description field, again good for additional info.', 'angular-material'),
            'default' => 'blue',
            'palettes' => $palettes
        ),
        array(
            'id' => 'accent_palette',
            'type' => 'palette',
            'title' => __('Accent Color Palette', 'angular-material'),
            'subtitle' => __('Only color validation can be done on this field type', 'angular-material'),
            'desc' => __('This is the description field, again good for additional info.', 'angular-material'),
            'default' => 'blue-grey',
            'palettes' => $palettes
        )
    )
));

/*
 * <--- END SECTIONS
 */
