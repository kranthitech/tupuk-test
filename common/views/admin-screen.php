<?php wp_enqueue_style('tupuk-bootstrap') ?>

<?php wp_enqueue_script('tupuk-bootstrap') ?>
<?php wp_enqueue_script('tupuk-angular') ?>
<?php wp_enqueue_script('tupuk-angular-ui-bootstrap') ?>
<?php wp_enqueue_script('tupuk-admin-core') ?>
 


<div ng-app="tupukAdmin" class="container-fluid">
	<accordion close-others="'true'">
		<accordion-group heading="Look and Feel" is-open="'true'">
		  This is where the template goes
		</accordion-group>
		<accordion-group heading="Trigger">
		  Show the trigger and targeting configuration here
		</accordion-group>
		<accordion-group heading="Additional Configuration">
		  This content is straight in the template.
		</accordion-group>
	</accordion>
</div>

<?php include 'options-form.php';?>