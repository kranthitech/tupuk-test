<?php wp_enqueue_style('tupuk-bootstrap') ?>

<?php wp_enqueue_script('tupuk-bootstrap') ?>
<?php wp_enqueue_script('tupuk-angular') ?>
<?php wp_enqueue_script('tupuk-angular-animate') ?>
<?php wp_enqueue_script('tupuk-angular-ui-bootstrap') ?>
<?php wp_enqueue_script('tupuk-admin-core') ?>
 


<div ng-app="tupukAdmin" class="container-fluid">
	<hr>
	<h3>Setup your Tupuk Sample Widget</h3>
	<accordion close-others="'true'">
		<accordion-group heading="How should your widget look like?" is-open="'true'">
		  <?php include '../../widget/template.php' ?>
		</accordion-group>
		<accordion-group heading="When and where should your widget show up?">
		  When and where should your widget show up?
		</accordion-group>
		<accordion-group heading="Provide additional parameters for your widget">
		  Provide additional configuration for your widget
		</accordion-group>
	</accordion>
</div>

<?php include 'options-form.php';?>