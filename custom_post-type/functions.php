<?php
/**
 * HelloElementor Child Theme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package HelloElementor Child
 */

// Our custom post type function
function create_posttype() {
  
    register_post_type( 'Testimonial',
    // CPT Options
        array(  
            'labels' => array(
                'name' => __( 'Testimonial' ),
                'singular_name' => __( 'testimonial' )
            ),
            'public' => true,
            'has_archive' => true,
            'rewrite' => array('slug' => 'testimonial'), // my custom slug
            'show_in_rest' => true,
            // Features this CPT supports in Post Editor
            'supports'  => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields', ),
            // You can associate this CPT with a taxonomy or custom taxonomy. 
        )
    );
}
// Hooking up our function to theme setup
add_action( 'init', 'create_posttype' );

// Create Shortcode to Display Testimonial Post Types
function create_shortcode_testimonial_post_type(){
    $args = array(
                    'post_type' => 'Testimonial', // don't forget to replace it with your custom post type name
                    'posts_per_page' => '10',
                    'publish_status' => 'published',
                 );
  
    $query = new WP_Query($args);
  
    if($query->have_posts()) :
        while($query->have_posts()) :
            $query->the_post() ;

        $output = $output .the_post_thumbnail();
        $output = $output . "<h2>" .get_the_title(). "</h2>";
        $output = $output . "<p>" .get_the_excerpt(). "</p>";
        endwhile;
  
        wp_reset_postdata();
        endif;    

      return $output;            
}
  
add_shortcode( 'Test_Testimonial', 'create_shortcode_testimonial_post_type' ); 
  
// shortcode code ends here