<?php
add_action( 'wp_footer', 'blog_page_function' );


function blog_page_function(){
	echo '<div> SOME NEW CONTENT THROUGH THE PLUGIN</div>'
}

?>