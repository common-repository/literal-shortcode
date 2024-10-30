<?php
/*
Plugin Name: Literal Shortcode
Plugin URI: http://shinraholdings.com/plugins/display-shortcode
Description: Adds a shortcode for the literal display of other shortcodes, html tags, or characters in post or page text.
Version: 1.0.0
Author: bitacre
Author URI: http://shinraholdings.com
License: GPLv2 
	Copyright 2012 Shinra Web Holdings (plugins@shinraholdings.com)
Usage: 
	[brace]shortcode you="want displayed" goes="here"[/brace] -> [shortcode you... "here"]
	[arrow]html tag="you want displayed" goes="here"[/arrow]  -> <html tag= ... "here">
	[chr num="75" /]                                            -> K
*/

function literal_shortcode_brace( $atts, $content = NULL ) {
	extract( shortcode_atts( $atts, $content ) ); 
	return '&#91;' . $content . '&#93;';
}

function literal_shortcode_arrow( $atts, $content = NULL ) {
	extract( shortcode_atts( $atts, $content ) ); 
	return '&#60;' . $content . '&#62;';
}

function literal_shortcode_chr( $atts ) {
	extract( shortcode_atts( array( 'num' ), $atts ) ); 
	return '&#' . $num . ';';
}


$brace_shortcodes = array( 'brace', 'sc' );
$arrow_shortcodes = array( 'arrow', 'html', 'htm');

foreach( $brace_shortcodes as $brace_shortcode ) add_shortcode( $brace_shortcode, 'literal_shortcode_brace' );
foreach( $arrow_shortcodes as $arrow_shortcode ) add_shortcode( $arrow_shortcode, 'literal_shortcode_arrow' );
add_shortcode( 'chr', 'literal_shortcode_chr' );
?>
