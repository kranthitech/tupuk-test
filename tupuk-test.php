<?php
/*
Plugin Name: Tupuk Test
Description: This is a play ground to test plugin functions
Author: Kranthi Kiran
Version: 0.1
*/

add_action( 'wp_footer', 'blog_page_code' );
add_action( 'admin_menu', 'admin_menu_code' );



function blog_page_code(){
	echo '<script> console.log("TUPUK TEST");</script>';
}

function admin_menu_code(){
	echo '<div>Hello Tupuk</div>'
}

?>