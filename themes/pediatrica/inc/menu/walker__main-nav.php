<?php
  class Nav_Header_Walker extends Walker_Nav_Menu {
    function start_lvl( &$output, $depth = 0, $args = array() ) {
      $indent = str_repeat("\t", $depth);
      $output .= "\n$indent\n";
    }

    function end_lvl( &$output, $depth = 0, $args = array() ) {
      $indent = str_repeat("\t", $depth);
      $output .= "$indent\n";
    }

    function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
      $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

      $attributes  = ' title="Go to '  . apply_filters( 'the_title', $item->title, $item->ID ) .'"';
      $attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
      $attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
      $attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';
      $attributes .= array_search( 'current-menu-item', $item->classes ) != 0 ? ' class="is--active"' : '';

      $item_output = $args->before;
      $item_output .= '<a'. $attributes .'>';
      $item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
      $item_output .= '</a>';
      $item_output .= $args->after;

      $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
    }


    function end_el( &$output, $item, $depth = 0, $args = array() ) {
      $output .= "\n";
    }
  }
?>