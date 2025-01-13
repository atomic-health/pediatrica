<?php
  class Nav_Footer_Walker extends Walker_Nav_Menu {
    function start_lvl( &$output, $depth = 0, $args = array() ) {
      $indent = str_repeat("\t", $depth);
      $output .= "\n$indent\n";
    }

    function end_lvl( &$output, $depth = 0, $args = array() ) {
      $indent = str_repeat("\t", $depth);
      $output .= "$indent\n";
    }

    function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
      if($item->menu_item_parent == 0) {
        $output .= '<div>';
      }

      $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

      $class_names = $value = '';

      $classes = empty( $item->classes ) ? array() : (array) $item->classes;
      $classes[] = 'menu-item-' . $item->ID;

      $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );
      $class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';

      $id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args );
      $id = $id ? ' id="' . esc_attr( $id ) . '"' : '';

      $output .= $indent . '';

      $attributes  = ' title="Go to '  . apply_filters( 'the_title', $item->title, $item->ID ) .'"';
      $attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
      $attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
      $attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';
      $attributes .= array_search( 'current-menu-item', $item->classes ) != 0 ? ' class="is--active"' : '';

      $item_output = $args->before;

      if($item->menu_item_parent == 0) {
        $item_output .= '<header>';
      }

        $item_output .= '<a'. $attributes .'>';
        $item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
        $item_output .= '</a>';
        
      if($item->menu_item_parent == 0) {
        $item_output .= '</header>';
      }
      
      $item_output .= $args->after;

      $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
    }


    function end_el( &$output, $item, $depth = 0, $args = array() ) {
      $output .= "\n";

      if($item->menu_item_parent == 0) {
        $output .= '</div>';
      }
    }
  }
?>