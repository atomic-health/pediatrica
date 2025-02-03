<?php

/**
 * Add noindex nofollow rel values to Categories block links since we are not linking to archive pages.
 */
add_filter( 'render_block', function( $block_content, $block ){
	if($block['blockName'] !== 'core/post-terms') {
    return $block_content;
  }

  $tag = new WP_HTML_Tag_Processor( $block_content );
		
  if($tag->next_tag('a')) {
    $tag->remove_attribute( 'href' );
    $tag->set_attribute( 'rel', 'tag noindex nofollow' );
  }
  
  return $tag->get_updated_html();

	return $block_content;
}, 10, 2 );