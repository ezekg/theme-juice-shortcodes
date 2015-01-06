<?php

/**
 * Accordion component shortcode
 *
 * @param {Array}  $atts                - Array containing arguments for shortcode
 * @param {String} $atts->$title        - Title heading for accordion
 * @param {String} $atts->$open (false) - Open accordion on start
 * @param {String} $content             - The actual content to put into accordion
 *
 * @return {Void}
 *
 * @example
 *   ```
 *   [accordion title='example' open='true'][/accordion]
 *   ```
 */
add_shortcode( "accordion", function( $atts, $content = null ) {
    extract( shortcode_atts( array(
        "title" => null,
        "open" => false,
    ), $atts, "accordion" ) );

    $buffer = array();

    $buffer[] = "<div class='accordion__wrapper'>";
    $buffer[] = "<div class='accordion'>";
    if ( $title ) {
        $buffer[] = "<h4 class='accordion__heading'>$title<i class='accordion__hook fa fa-angle-down'></i></h4>";
    }
    if ( $content ) {
        $buffer[] = "<div class='accordion__content" . ( ( $open === "true" ) ? " accordion__content--open" : "" ) . "'>";
        $buffer[] = do_shortcode( $content );
        $buffer[] = "</div>";
    }
    $buffer[] = "</div>";
    $buffer[] = "</div>";

    return implode( "", $buffer );
});
