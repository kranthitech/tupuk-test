<?php wp_enqueue_style('tupuk-widget-blank') ?>
<?php wp_enqueue_style('tupuk-widget-yes-no') ?>

<div class="tupuk-blog-page-container">
	<?php if(get_option( 'tupuk_widget_active' )){

		echo base64_decode(get_option( 'tupuk_widget_template' ));
	}else{
		echo get_option( 'tupuk_widget_active' );
	}
	?>
</div>