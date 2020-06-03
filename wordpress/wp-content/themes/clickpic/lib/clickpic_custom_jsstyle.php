<?php   
/**
 * @package clickpic
 */
 ?>
 <?php function clickpic_style_js()
 {
 	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/lib/require/bootstrap/css/bootstrap.css');
	wp_enqueue_style( 'font-awesome', get_template_directory_uri() .'/css/font-awesome.css');
	wp_enqueue_style( 'clickpic-basic-style', get_stylesheet_uri() );
	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/lib/require/bootstrap/js/bootstrap.js', array('jquery'));	
	wp_enqueue_script( 'clickpic-toggle-jquery', get_template_directory_uri() . '/js/clickpic-toggle.js', array('jquery'));	
 }
 add_action( 'wp_enqueue_scripts', 'clickpic_style_js' );
?>