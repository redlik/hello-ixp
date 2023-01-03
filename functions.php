<?php
/**
 * Theme functions and definitions
 *
 * @package HelloElementorChild
 */

/**
 * Load child theme css and optional scripts
 *
 * @return void
 */
function hello_elementor_child_enqueue_scripts() {
	wp_enqueue_style(
		'hello-elementor-child-style',
		get_stylesheet_directory_uri() . '/style.css',
		[
			'hello-elementor-theme-style',
		],
		'1.0.0'
	);
}
add_action( 'wp_enqueue_scripts', 'hello_elementor_child_enqueue_scripts', 20 );

// =========================================================================
// BOOTSTRAP CSS
// =========================================================================
function enqueue_bootstrap_styles(){ 
    wp_enqueue_style('bootstrap_css', 'https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css');
}
add_action( 'wp_enqueue_scripts', 'enqueue_bootstrap_styles' );
  
// =========================================================================
// BOOTSTRAP JAVASCRIPT
// =========================================================================
function enqueue_bootstrap_scripts() {  
    wp_enqueue_script( 'bootstrap_javascript', 'https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js', array(), '5.2.3', true );
}
add_action( 'wp_enqueue_scripts', 'enqueue_bootstrap_scripts' );
