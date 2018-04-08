<?php
include_once 'inc/walker.php';

/*------------------------------------*\
  Theme Support
\*------------------------------------*/

if (!defined('ABSPATH')) exit;

/*------------------------------------*\
  Functions
\*------------------------------------*/

// Set up theme support
function shapeSpace_setup()
{
  add_theme_support('menus');
  add_theme_support('post-thumbnails');
  add_theme_support('automatic-feed-links');
  add_theme_support('title-tag');
}

function register_my_menus() {
  register_nav_menus(
    array(
      'primary' => __( 'Primary' )
    )
  );
}
add_action( 'init', 'register_my_menus' );

// Add icons to menu items
function nav_menu_item_icons( $items, $args )
{
  foreach( $items as $key => $item ) {
    $color = get_field('colour', $item);
    $icon = get_field('icon', $item);

    if( $icon ) {
      $icon = '<span class="menu__icon fa ' . $icon . '" style="color:' . $color . ';" aria-hidden="true"></span>';
      $item->title = $icon . $item->title;
    }
  }

  return $items;
}

// Load scripts (header.php)
function header_scripts()
{
  if ($GLOBALS['pagenow'] != 'wp-login.php' && !is_admin()) {
    wp_deregister_script('wp-embed'); // Remove wp-embed
    wp_deregister_script('jquery'); // Remove jQuery
  }
}

// Load scripts (footer.php)
function footer_scripts()
{
  if ($GLOBALS['pagenow'] != 'wp-login.php' && !is_admin()) {
    // global $post;
    wp_register_script('healthspecialists', get_template_directory_uri() . '/script.js', array(), '2.0.5', true); // Custom scripts
    // wp_localize_script('healthspecialists', 'php_vars', array('title' => $post->post_name)); // Add page title to global variable
    wp_enqueue_script('healthspecialists'); // Enqueue it!
  }
}

// Load styles
function styles()
{
  wp_register_style('healthspecialists', get_template_directory_uri() . '/style.css', array(), '2.0.5', 'all');
  wp_enqueue_style('healthspecialists'); // Enqueue it!
}

// Add page slug to body class, love this - Credit: Starkers Wordpress Theme
function add_slug_to_body_class($classes)
{
  global $post;
  if (is_home()) {
    $key = array_search('blog', $classes);
    if ($key > -1) {
      unset($classes[$key]);
    }
  } elseif (is_page()) {
    $classes[] = sanitize_html_class($post->post_name);
  } elseif (is_singular()) {
    $classes[] = sanitize_html_class($post->post_name);
  }

  return $classes;
}

// If Dynamic Sidebar Exists
if (function_exists('register_sidebar'))
{
  // Define Sidebar Widget Area
  register_sidebar(array(
    'name' => __('Sidebar', 'healthspecialists'),
    'description' => __('Widgets added here are displayed in the sidebar', 'healthspecialists'),
    'id' => 'sidebar',
    'before_widget' => '<div id="%1$s" class="%2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h3 class="sidebar__title">',
    'after_title' => '</h3>'
  ));
}

// Remove wp_head() injected Recent Comment styles
function my_remove_recent_comments_style()
{
  global $wp_widget_factory;
  remove_action('wp_head', array(
    $wp_widget_factory->widgets['WP_Widget_Recent_Comments'],
    'recent_comments_style'
  ));
}

// Function to remove version numbers
function sdt_remove_ver_css_js($src)
{
  if (strpos( $src, 'ver=' ))
    $src = remove_query_arg('ver', $src);
  return $src;
}

// Remove Admin bar
function remove_admin_bar()
{
  return false;
}

// Limit excerpt length
function custom_excerpt_length($length)
{
  return 20;
}

// Order Advanced Custom Fields by sort order
function compare_order_no($elem1, $elem2)
{
  return strcmp($elem1['order_no'], $elem2['order_no']);
}

// Hide featured image on post page
function wordpress_hide_feature_image($html, $post_id, $post_image_id)
{
  return is_single() ? '' : $html;
}

/*------------------------------------*\
  Actions + Filters + ShortCodes
\*------------------------------------*/

// Add Actions
add_action('init', 'header_scripts'); // Add Custom Scripts to wp_head()
add_action('wp_enqueue_scripts', 'footer_scripts'); // Add Custom Scripts to wp_footer()
add_action('wp_enqueue_scripts', 'styles'); // Add Theme Stylesheet
add_action('widgets_init', 'my_remove_recent_comments_style'); // Remove inline Recent Comment Styles from wp_head()
add_action('after_setup_theme', 'shapeSpace_setup'); // Add theme support setup

// Add Support
add_post_type_support('page', 'excerpt'); // Add excerpt to Pages

// Remove Actions
remove_action('wp_head', 'feed_links_extra', 3); // Display the links to the extra feeds such as category feeds
remove_action('wp_head', 'feed_links', 2); // Display the links to the general feeds: Post and Comment Feed
remove_action('wp_head', 'rsd_link'); // Display the link to the Really Simple Discovery service endpoint, EditURI link
remove_action('wp_head', 'wlwmanifest_link'); // Display the link to the Windows Live Writer manifest file
remove_action('wp_head', 'index_rel_link'); // Index link
remove_action('wp_head', 'parent_post_rel_link', 10, 0); // Prev link
remove_action('wp_head', 'start_post_rel_link', 10, 0); // Start link
remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0); // Display relational links for the posts adjacent to the current post
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
remove_action('wp_head', 'rel_canonical');
remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0);
remove_action('wp_head', 'print_emoji_detection_script', 7); // Remove emoji scripts
remove_action('wp_print_styles', 'print_emoji_styles'); // Remove emoji styles

// Add Filters
add_filter('body_class', 'add_slug_to_body_class'); // Add slug to body class (Starkers build)
add_filter('show_admin_bar', 'remove_admin_bar'); // Remove Admin bar
add_filter('wp_nav_menu_objects', 'nav_menu_item_icons', 10, 2); // Add icons to menu items
add_filter('use_default_gallery_style', '__return_false'); // Remove Gallery styles
add_filter('excerpt_length', 'custom_excerpt_length', 9999); // Limit excerpt length
