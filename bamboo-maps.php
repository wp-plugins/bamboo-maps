<?php
/**************************************************************************************************/
/*
Plugin Name: Bamboo Maps
Plugin URI:  http://www.bamboosolutions.co.uk/wordpress/bamboo-maps
Author:      Bamboo Solutions
Author URI:  http://www.bamboosolutions.co.uk
Version:     1.3
Description: Bamboo Maps is the simplest way of embedding a fully functional Google Map into your content.
*/
/**************************************************************************************************/

	function bamboo_map( $atts, $content=null ) {

		do_action( 'before_bamboo_map' );

		static $counter = 0;
		$counter++;

		$width = "100%";
     	if ( isset( $atts["width"] ) ) $width = $atts["width"];

		$height = "300px";
     	if ( isset( $atts["height"] ) ) $height = $atts["height"];

		$path = plugins_url( '', __FILE__ );

		wp_enqueue_script( 'google-maps', 'http://maps.google.com/maps/api/js?sensor=false', array(), null, true );
		wp_enqueue_script( 'bamboo-maps', $path.'/bamboo-maps.js', array('jquery', 'google-maps') , null, true );

     	$html = "<div class=\"bamboo_map\" id=\"bamboo_map_$counter\" style=\"width:$width; height:$height;\">";
		$html.= "<a href=\"" . strip_tags($content) ."\"></a>";
		$html.= "</div>";

		do_action( 'after_bamboo_map' );

		return $html;

	}
	add_shortcode( 'bamboo-map', 'bamboo_map' );


/**************************************************************************************************/
?>