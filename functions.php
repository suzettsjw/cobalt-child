<?php
//
// Recommended way to include parent theme styles.
//  (Please see http://codex.wordpress.org/Child_Themes#How_to_Create_a_Child_Theme)
//  
add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );
function theme_enqueue_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array('parent-style')
    );
}
//
// Your code goes below
//
//add_action('init', 'init_remove_support',100);
//function init_remove_support(){
//    $post_type = 'people';
//    remove_post_type_support( $post_type, 'thumbnail' );
//    remove_post_type_support( $post_type, 'editor' );
//    remove_post_type_support( $post_type, 'revisions' );
//    remove_post_type_support( $post_type, 'custom-fields' );
//}
