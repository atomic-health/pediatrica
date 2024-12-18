<?php
// Ensure WordPress environment is loaded before executing the template
if ( !defined('ABSPATH') ) exit;

get_header(); // Include header.php if it exists

if ( have_posts() ) :
    while ( have_posts() ) : the_post();
        // Display the content of the post
        global $post;
        the_content();
    endwhile;
else :
    // If no posts are found, display a message
    echo '<p>No content found</p>';
endif;



 get_footer(); // Include footer.php if it exists