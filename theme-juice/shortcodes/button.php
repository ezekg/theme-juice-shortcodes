<?php

/**
 * Button shortcode
 *
 * @param {Array}  $atts        - Array containing arguments for shortcode
 * @param {String} $atts->$link - HREF value for the link
 * @param {String} $content     - The button text
 *
 * @return {Void}
 *
 * @example
 *   ```
 *   [button link='url/to/link/to']...[/button]
 *   ```
 */
add_shortcode( "button", function( $atts, $content = null ) {
    extract( shortcode_atts( array(
        "link" => '#',
    ), $atts, "button" ) );

    $buffer = array();

    $buffer[] = "<a class='button' href='$link'>";
    $buffer[] = do_shortcode( $content );
    $buffer[] = "</a>";

    return implode( "", $buffer );
});