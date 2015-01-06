<?php

/**
 * Column shortcode
 *
 * @param {Array}  $atts         - Array containing arguments for shortcode
 * @param {String} $atts->span   - Span for the column
 * @param {Bool}   $atts->center - Center align column
 * @param {String} $atts->align  - Align text inside of column
 * @param {String} $content      - Content of column
 *
 * @example
 *   ```
 *   [col span='one-third']...[/col]
 *   ```
 */
add_shortcode( "col", function( $atts, $content = null ) {
    extract( shortcode_atts( array(
        "span" => "full",
        "center" => false,
        "align" => false
    ), $atts, "col" ) );

    $buffer = array();

    $buffer[] = "<div class='column__span--$span" . ( $center ? "--center" : "" ) . ( $align ? " text-align--$align" : "" ) ."'>";
    $buffer[] = do_shortcode( $content );
    $buffer[] = "</div>";

    return implode( "", $buffer );
});
