<?php
/*
Plugin Name: Tupuk Test
Description: This is a play ground to test plugin functions
Author: Kranthi Kiran
Version: 0.1
*/

add_action( 'wp_footer', 'blog_page_function' );


function blog_page_function(){
	echo '<div> SOME NEW CONTENT THROUGH THE PLUGIN</div>';
}

?>