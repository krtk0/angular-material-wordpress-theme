<?php
namespace angular\theme;

class themeMenuWalker extends \Walker {

    var $db_fields = array (
        'parent' => 'post_parent',
        'id'     => 'ID'
    );

    function start_lvl(&$output, $depth = 0, $args = array()){

        $indent = str_repeat("\t", $depth);
        $output .= "\n$indent\n";
    }

    function end_lvl(&$output, $depth = 0, $args = array()){
        $indent = str_repeat("\t", $depth);
        $output .= "$indent\n";
    }

    function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0){
        $indent = ($depth) ? str_repeat("\t", $depth) : '';

        $classes = empty($item->classes) ? array() : (array) $item->classes;
        $classes[] = 'menu-item-' . $item->ID;
        $class_names = join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item, $args));
        $class_names = $class_names ? ' class="' . esc_attr($class_names) . '"' : '';

        $id = apply_filters('nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args);
        $id = $id ? ' id="' . esc_attr( $id ) . '"' : '';
        $output .= $indent . '<md-menu-item' . $id . $class_names .'>';

        $atts = array();
        $atts['title'] = !empty($item->attr_title) ? $item->attr_title : '';
        $atts['target'] = !empty($item->target) ? $item->target : '';
        $atts['rel'] = !empty($item->xfn) ? $item->xfn : '';
        $atts['href'] = !empty($item->url) ? $item->url : '';
        //$atts['onclick'] = !empty($item->url) ? 'window.location.assign("'.$item->url.'");' : '';

        $atts = apply_filters('nav_menu_link_attributes', $atts, $item, $args);
//        if($depth > 1)
//            $atts['style'] = 'background-color:#fff;color:gray;';
        // generate a different menu link based on the type of item we are linking to
        switch($item->object){
            case 'location':
                //unset($atts['href']);
                $attributes = '';
                $args->link_after = '<span class="menu_btn"></span>';
                //$atts['onclick'] = 'setActiveMenuItem(this);locClick(\''.$item->object_id.'\');';
                $atts['style'] .= 'cursor: pointer;';
                $args->after = '';
                break;
            default:
                $attributes = '';
                $args->link_after = '';
                $args->after = '';
                break;
        }

        foreach($atts as $attr => $value){
            if(!empty($value)){
                $value = ('href' === $attr) ? esc_url($value) : esc_attr($value);
                $attributes .= ' ' . $attr . '="' . $value . '"';
            }
        }

        $item_output = $args->before;
        $args->link_before = '';
        $item_output .= '<md-button'. $attributes .'>';
        /** This filter is documented in wp-includes/post-template.php */
        $item_output .= $args->link_before . apply_filters('the_title', $item->title, $item->ID) . $args->link_after;
        $item_output .= '</md-button>';
        $item_output .= $args->after;

        $output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
    }

    function end_el(&$output, $item, $depth = 0, $args = array()){
        $output .= "</md-menu-item>\n";
    }
}
