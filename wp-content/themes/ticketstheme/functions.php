<?php
function Ticket_script_enqueue(){
  wp_enqueue_style('customstyle', get_template_directory_uri().'/custom/custom.css', [], '1.0.0', 'all');
  wp_enqueue_script('customjs', get_template_directory_uri().'/custom/custom.js', [], '1.0.0', true);
};
add_action('wp_enqueue_scripts', 'Ticket_script_enqueue');

//Adding menus
function wkseven_theme_setup(){
  add_theme_support('menus');
  register_nav_menu('primary', 'primary header');
  register_nav_menu('footer', 'footer nav');

}

add_action('init', 'wkseven_theme_setup');

function themename_post_formats_setup() {
    add_theme_support( 'post-formats', array( 'aside', 'audio', 'chat', 'gallery', 'image', 'link', 'quote', 'status', 'video' ) );
}
add_action( 'after_setup_theme', 'themename_post_formats_setup' );

 add_theme_support('custom-background');
 add_theme_support('custom-header');
 add_theme_support('post-thumbnails');



