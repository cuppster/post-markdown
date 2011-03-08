<?php
/*
Plugin Name: Post Markdown Plugin
Plugin URI: http://cuppster.com
Description: Wordpress Plugin providing a Markdown Shortcode
Version: 0.1.0
Author: Jason Cupp
Author URI: http://cuppster.com
License: GPL 3.0
*/

add_shortcode( 'markdown', 'markdown_shortcode' );
add_filter( 'the_content', 'markdown_the_content_filter', -10 ); // runs first

function markdown_the_content_filter( $content ) {
  
  if ( false !== strpos( $content, '[markdown]' ) ) {
    remove_filter( 'the_content', 'wpautop' );
  }
  
  return $content;
}

/*
 * [markdown] shortcode
 */
function markdown_shortcode( $atts, $content = '' ) {		
  require_once( dirname(__FILE__) . '/markdown.php' );

  $content = Markdown( $content );    
  // $content = do_shortcode( $content );  
  return '<span class="markdown">' . $content . '</span>';
}
  
  
?>
