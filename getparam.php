<?php

add_action( 'wpcf7_init', 'wpcf7_add_shortcode_getparam' );

function wpcf7_add_shortcode_getparam() {
    if ( function_exists( 'wpcf7_add_shortcode' ) ) {
        wpcf7_add_shortcode( 'getparam', 'wpcf7_getparam_shortcode_handler', true );
        wpcf7_add_shortcode( 'showparam', 'wpcf7_showparam_shortcode_handler', true );
    }
}

function wpcf7_getparam_shortcode_handler($tag) {
    if (!is_array($tag)) return '';

    $name = $tag['name'];
    if (empty($name)) return '';

    $html = '<input type="hidden" name="' . $name . '" value="'. $_GET[$name] . '" />';
    return $html;
}

function wpcf7_showparam_shortcode_handler($tag) {
    if (!is_array($tag)) return '';

    $name = $tag['name'];
    if (empty($name)) return '';

    $html = $_GET[$name];
    return $html;
}



// rental name for enquiry form
function parameter_queryvars( $qvars ) {
    $qvars[] = 'rental';
    return $qvars;
}
add_filter('query_vars', 'parameter_queryvars' );

function echo_rental() {
    global $wp_query;
        if (isset($wp_query->query_vars['rental']))
        {
            return $wp_query->query_vars['rental'];
        }
}


?>