//We need to check illdy parent theme folder /css/ for more than one .css file. If there is none, use following:
<?php
add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );
function theme_enqueue_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );

}
?>
//If more than one .css file, trial and error with the following:
<?php
add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );
function theme_enqueue_styles() {
wp_enqueue_style( 'illdy-style', get_template_directory_uri() . '/style.css' );
wp_enqueue_style( 'illdy-child-style', get_stylesheet_directory_uri() . '/style.css', array('illdy-style'));
}
//If child theme stylesheet not loaded automatically, we must enqueue with the following:
<?php
function theme_enqueue_styles() {

    $parent_style = 'parent-style';

    wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array( $parent_style )
    );
}
add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );
?>
