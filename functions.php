<?php
/**
 * jlnb's functions and definitions
 *
 * @package jlnb
 * @since jlnb 1.0
 */
 
/**
 * First, let's set the maximum content width based on the theme's design and stylesheet.
 * This will limit the width of all uploaded images and embeds.
 */
if ( ! isset( $content_width ) )
    $content_width = 800; /* pixels */
 
if ( ! function_exists( 'jlnb_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 */
function jlnb_setup() {
  /*
   * Let WordPress manage the document title.
   * By adding theme support, we declare that this theme does not use a
   * hard-coded <title> tag in the document head, and expect WordPress to
   * provide it for us.
   */
  add_theme_support( 'title-tag' );

  /*
   * Enable support for custom logo.
   *
   *  @since Twenty Sixteen 1.2
   */
  // add_theme_support( 'custom-logo', array(
  //   'height'      => 240,
  //   'width'       => 240,
  //   'flex-height' => true,
  // ) );

  /*
   * Enable support for Post Thumbnails on posts and pages.
   *
   * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
   */
  // add_theme_support( 'post-thumbnails' );
  // set_post_thumbnail_size( 1200, 9999 );

  // This theme uses wp_nav_menu() in two locations.
  register_nav_menus( array(
    'topMenu' => __( 'Top Menu', 'jlnb' ),
  ) );

  /*
   * Switch default core markup for search form, comment form, and comments
   * to output valid HTML5.
   */
  // add_theme_support( 'html5', array(
  //   'search-form',
  //   'comment-form',
  //   'comment-list',
  //   'gallery',
  //   'caption',
  // ) );

  /*
   * Enable support for Post Formats.
   *
   * See: https://codex.wordpress.org/Post_Formats
   */
  // add_theme_support( 'post-formats', array(
  //   'aside',
  //   'image',
  //   'video',
  //   'quote',
  //   'link',
  //   'gallery',
  //   'status',
  //   'audio',
  //   'chat',
  // ) );

}
endif; // jlnb_setup
add_action( 'after_setup_theme', 'jlnb_setup' );



// Widgets
function jlnb_widgets_init() {
  register_sidebar( array(
    'name'          => __( 'testWidget', 'jlnb' ),
    'id'            => 'widget-1',
    'description'   => __( 'Add widgets here to appear in your testWidget.', 'jlnb' ),
    'before_widget' => '<section id="%1$s" class="widget %2$s">',
    'after_widget'  => '</section>',
    'before_title'  => '<h2 class="widget-title">',
    'after_title'   => '</h2>',
  ) );
}
add_action( 'widgets_init', 'jlnb_widgets_init' );



// load js script // wp_enqueue_script( $handle, $src, $deps, $ver, $in_footer);
wp_enqueue_script( 'script', get_template_directory_uri() . '/theme.js', array ( 'jquery' ), 3.0, true);
