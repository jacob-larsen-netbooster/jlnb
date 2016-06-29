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




// Enqueues scripts and styles.
if ( ! function_exists( 'jlnb_scripts' ) ) {
  function jlnb_scripts() {
    // load js script // wp_enqueue_script( $handle, $src, $deps, $ver, $in_footer);
    wp_enqueue_script( 'jlnb-script', get_template_directory_uri() . '/theme.js', array ( 'jquery' ), 3.0, true);
    wp_enqueue_script( 'jlnb-script');

    wp_register_style( 'jlnb-style', get_template_directory_uri().'/style.css', '20160623' );
    wp_enqueue_style( 'jlnb-style' );

  }
}
add_action( 'wp_enqueue_scripts', 'jlnb_scripts' );




function create_post_type() {
    register_post_type( 'jbln-tilbud',
        array(
            'labels' => array(
                'name' => __( 'Tilbud' ),
                'singular_name' => __( 'Tilbud' )
            ),
            'description' => 'Tilbud',
            'public' => true,
            'show_ui' => true,
            'menu_position' => 2,
            'hierarchical' => true,
            'has_archive' => true,
            'rewrite' => array('slug' => 'tilbud'),
            'exclude_from_search' => false,
            'taxonomies' => array('category'), 
            'supports' => array( 'title', 'editor', 'thumbnail' ),
        )
    );
}
add_action( 'init', 'create_post_type' );




function remove_menus(){
  // remove_menu_page( 'index.php' );                  //Dashboard
  // remove_menu_page( 'jetpack' );                    //Jetpack* 
  // remove_menu_page( 'edit.php' );                   //Posts
  // remove_menu_page( 'upload.php' );                 //Media
  // remove_menu_page( 'edit.php?post_type=page' );    //Pages
  remove_menu_page( 'edit-comments.php' );          //Comments
  // remove_menu_page( 'themes.php' );                 //Appearance
  // remove_menu_page( 'plugins.php' );                //Plugins
  remove_menu_page( 'users.php' );                  //Users
  // remove_menu_page( 'tools.php' );                  //Tools
  // remove_menu_page( 'options-general.php' );        //Settings
  
}
add_action( 'admin_menu', 'remove_menus' );






function wp_api_encode_acf($data,$post,$context){
  $data['meta'] = array_merge($data['meta'],get_fields($post['ID']));
  return $data;
}

if( function_exists('get_fields') ){
  add_filter('json_prepare_post', 'wp_api_encode_acf', 10, 3);
}