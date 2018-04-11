<?php
class Custom_Main_Walker extends Walker {
  var $db_fields = array( 'parent' => 'menu_item_parent', 'id' => 'db_id' );
  private $show_depth;

  public function __construct($depth) {
      $this->$show_depth = $depth;
  }

  function start_lvl( &$output, $depth = 0, $args = array() ) {
    if ($this->$show_depth - 1 == $depth) {
      $indent = str_repeat("\t", $depth);
      // $output .= "\n$indent<div class='sub-menu__content'>\n";
      $output .= "\n$indent<ul class='sub-menu__list'>\n";
    }
  }

  function end_lvl( &$output, $depth = 0, $args = array() ) {
    if ($this->$show_depth - 1 == $depth) {
      $indent = str_repeat("\t", $depth);
      // $output .= "$indent</div>\n";
      $output .= "$indent</ul>\n";
    }
  }

  function has_children($item) {
    $children = get_posts(array('post_type' => 'nav_menu_item', 'nopaging' => true, 'numberposts' => 1, 'meta_key' => '_menu_item_menu_item_parent', 'meta_value' => $item->ID));
    return !empty($children);
  }

  function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {

    global $wp_query;
    $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
    $class_names = $value = '';
    $default_classes = empty( $item->classes ) ? array() : (array) $item->classes;
    $classes = [];

    $classes[] = $this->$show_depth == 0 ? 'menu__item' : ($depth == 0  ? 'sub-menu' : 'sub-menu__item');

    /* Add active class */
    if(in_array('current-menu-item', $default_classes)) {
      $classes[] = 'menu__item--active';
      unset($classes['current-menu-item']);
    }

    /* Check for children */
    if ($this->$show_depth == 0 && $this->has_children($item)) {
      $classes[] = 'menu__item--has-children';
    }

    $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );
    $class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';

    $id_name = 'menu-item-' . $item->ID;
    $id = $this->$show_depth != 0 ? ' id="' . $id_name . '"' : '';

    $top_level_without_children = !$this->has_children($item) && $depth == 0 && $this->$show_depth != 0;

    if (!$top_level_without_children && $this->$show_depth >= $depth) {
      $output .= $indent . '<li' . $id . $value . $class_names .'>';
    }

    if ($this->$show_depth == $depth) {
      $attributes  = ! empty( $item->attr_title ) ? ' title="' . esc_attr( $item->attr_title ) .'"' : '';
      $attributes .= ! empty( $item->target ) ? ' target="' . esc_attr( $item->target ) .'"' : '';
      $attributes .= ! empty( $item->xfn ) ? ' rel="' . esc_attr( $item->xfn ) .'"' : '';
      $attributes .= ! empty( $item->url ) ? ' href="' . esc_attr( $item->url ) .'"' : '';
      if ($this->has_children($item)) {
        $attributes .= $this->show_depth == 0 && $depth == 0 ? " data-content='$id_name'" : '';
      }

      $item_output = isset($args->before) ? $args->before : '';
      $item_output .= '<a'. $attributes .' class="menu__link">';
      $item_output .= (isset($args->link_before) ? $args->link_before : '') . apply_filters( 'the_title', $item->title, $item->ID ) . (isset($args->link_after) ? $args->link_after : '');
      $item_output .= '</a>';
      $item_output .= isset($args->after) ? $args->after : '';
      $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
    }
  }

  function end_el( &$output, $item, $depth = 0, $args = array() ) {
    $top_level_without_children = !$this->has_children($item) && $depth == 0 && $this->$show_depth != 0;

    if (!$top_level_without_children && $this->$show_depth >= $depth) {
      $output .= "</li>\n";
    }
  }
}

class Custom_Footer_Walker extends Walker {
  var $db_fields = array( 'parent' => 'menu_item_parent', 'id' => 'db_id' );

  function start_lvl( &$output, $depth = 0, $args = array() ) {
    $indent = str_repeat("\t", $depth);
    $output .= "\n$indent<ul class='footer-menu__list'>\n";
  }

  function end_lvl( &$output, $depth = 0, $args = array() ) {
    $indent = str_repeat("\t", $depth);
    $output .= "$indent</ul>\n";
  }

  function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {

    global $wp_query;
    $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
    $class_names = $value = '';
    $default_classes = empty( $item->classes ) ? array() : (array) $item->classes;
    $classes = [];

    $classes[] = 'footer-menu__item';

    /* Add active class */
    if(in_array('current-menu-item', $default_classes)) {
      $classes[] = 'footer-menu__item--active';
      unset($classes['current-menu-item']);
    }

    $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );
    $class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';

    $id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args );
    $id = $id ? ' id="' . esc_attr( $id ) . '"' : '';

    $output .= $indent . '<li' . $id . $value . $class_names .'>';

    $attributes  = ! empty( $item->attr_title ) ? ' title="' . esc_attr( $item->attr_title ) .'"' : '';
    $attributes .= ! empty( $item->target ) ? ' target="' . esc_attr( $item->target ) .'"' : '';
    $attributes .= ! empty( $item->xfn ) ? ' rel="' . esc_attr( $item->xfn ) .'"' : '';
    $attributes .= ! empty( $item->url ) ? ' href="' . esc_attr( $item->url ) .'"' : '';

    $item_output = isset($args->before) ? $args->before : '';
    $item_output .= '<a'. $attributes .' class="footer-menu__link">';
    $item_output .= (isset($args->link_before) ? $args->link_before : '') . apply_filters( 'the_title', $item->title, $item->ID ) . (isset($args->link_after) ? $args->link_after : '');
    $item_output .= '</a>';
    $item_output .= isset($args->after) ? $args->after : '';

    $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
  }

  function end_el( &$output, $item, $depth = 0, $args = array() ) {
    $output .= "</li>\n";
  }
}
?>
