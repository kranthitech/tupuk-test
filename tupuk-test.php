<?php
/*
Plugin Name: Tupuk Test
Description: This is a play ground to test plugin functions
Author: Kranthi Kiran
Version: 0.1
*/

class TupukSamplePlugin{

	function __construct() {
		add_action( 'wp_footer', 'blog_page_code' );
		
	}
	
	function blog_page_code(){
		echo '<script> console.log("TUPUK TEST");</script>';
	}
}
$tupuk_sampe_plugin = new TupukSamplePlugin();

?>


