<script type="text/javascript">
	var tupuk_plugin_path = '<?php echo plugins_url( 'tupuk-test') ?>'
	console.log('plugin path- '+tupuk_plugin_path)
</script>

<?php wp_enqueue_style('tupuk-bootstrap') ?>
<?php wp_enqueue_style('tupuk-angular-toggle-switch') ?>

<?php wp_enqueue_script('tupuk-bootstrap') ?>
<?php wp_enqueue_script('tupuk-angular') ?>
<?php wp_enqueue_script('tupuk-angular-base64') ?>
<?php wp_enqueue_script('tupuk-angular-animate') ?>
<?php wp_enqueue_script('tupuk-api-check') ?>
<?php wp_enqueue_script('tupuk-angular-formly') ?>
<?php wp_enqueue_script('tupuk-formly-bootstrap') ?>

<?php wp_enqueue_script('tupuk-angular-ui-bootstrap') ?>
<?php wp_enqueue_script('tupuk-admin-core') ?>
<?php wp_enqueue_script('tupuk-angular-toggle-switch') ?>
 



<div ng-app="tupukAdmin" class="container-fluid" ng-controller="tupukAdminController">
	<hr>
	<h3>Setup your Tupuk Sample Widget</h3>
	<hr>
		<toggle-switch ng-model="widgetActive" on-label="Enabled" off-label="Disabled"></toggle-switch>
	<hr>
	<accordion close-others="'true'">
		<accordion-group heading="Display" is-open="'true'">
			<div class="container">
				<?php 
					//If the template has been updated and stored in the database,pick it up from there
					//otherwise, pick it up from the 
					
					//consolidate this variable later
					$tupuk_widget_template = get_option( 'tupuk_widget_template' );
					if($tupuk_widget_template)
					{
						include dirname(__FILE__).'/../../widget/decoded_admin_template.php';
					}
					else
					{
						include dirname(__FILE__).'/../../widget/template.php';
					}
					
				?>
			</div>		  
		</accordion-group>

		<accordion-group heading="Settings">
		  <div class="row">
		  	<div class="col-md-6 col-xs-12">
		  		<div class="panel panel-default">
				  <div class="panel-heading">
				    <h3 class="panel-title">Sample</h3>
				  </div>
				  <div class="panel-body">
				    <formly-form ng-if="widgetFields" model="settings.widget" fields="widgetFields">
					</formly-form>
				  </div>
				</div>
		  	</div>

		  	<div class="col-md-6 col-xs-12">
		  		<div class="panel panel-default">
				  <div class="panel-heading">
				    <h3 class="panel-title">General</h3>
				  </div>
				  <div class="panel-body">
				    <formly-form ng-if="widgetFields" model="settings.general" fields="general">
					</formly-form>
				  </div>
				</div>
		  	</div>
		  	
		  </div>
		</accordion-group>

	</accordion>

	<script type="text/ng-template" id="editableInput.html">
	    <div class="modal-header">
	        <h3 class="modal-title">Enter new text</h3>
	    </div>
	    <div class="modal-body">
	        <textarea class="form-control" ng-model="inner" ></textarea>
	    </div>
	    <div class="modal-footer">
	        <button class="btn btn-primary" type="button" ng-click="ok()">OK</button>
	        <button class="btn btn-warning" type="button" ng-click="cancel()">Cancel</button>
	    </div>
	</script>
</div>


<?php include 'options-form.php';?>

