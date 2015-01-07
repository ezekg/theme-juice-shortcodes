<?php

/**
 * Video shortcode
 *
 * @param {Array}  $atts       - Array containing arguments for shortcode
 * @param {String} $atts->$src - YouTube embed string
 *
 * @return {String}
 *
 * @example
 *   ```
 *   [video src='WSG0P5VpSUk']
 *   ```
 */
add_shortcode( "video", function( $atts, $content = null ) {
    extract( shortcode_atts( array(
        "src" => null,
    ), $atts, "video" ) );

    $buffer = array();

    $buffer[] = "<div class='video__wrapper'>";
    $buffer[] = "<div class='video'>";
    $buffer[] = "<iframe width='960' height='720' src='//www.youtube.com/embed/$src' frameborder='0' allowfullscreen></iframe>";
    $buffer[] = "</div>";
    $buffer[] = "</div>";

    return implode( "", $buffer );
});
