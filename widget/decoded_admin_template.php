<?php wp_enqueue_style('tupuk-widget-blank') ?>
<?php wp_enqueue_style('tupuk-widget-yes-no') ?>

<div class="tupuk-admin-page-container">
	<?php echo base64_decode(get_option( 'tupuk_widget_template' )) ?>
</div>