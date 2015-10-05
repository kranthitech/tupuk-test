<?php wp_enqueue_style('tupuk-bootstrap') ?>

<?php wp_enqueue_script('tupuk-bootstrap') ?>
<?php wp_enqueue_script('tupuk-angular') ?>
<?php wp_enqueue_script('tupuk-angular-animate') ?>
<?php wp_enqueue_script('tupuk-angular-ui-bootstrap') ?>
<?php wp_enqueue_script('tupuk-admin-core') ?>
 


<div ng-app="tupukAdmin" class="container-fluid">
	<accordion close-others="'true'">
		<accordion-group heading="Look and Feel" is-open="'true'">
		  How should your popup look like?
		</accordion-group>
		<accordion-group heading="Trigger">
		  When and where should your popup show up?
		</accordion-group>
		<accordion-group heading="Additional Configuration">
		  Provide additional configuration for your popup
		</accordion-group>
	</accordion>
</div>

<?php include 'options-form.php';?>