<script src="//ajax.googleapis.com/ajax/libs/angularjs/1.4.7/angular.min.js"></script>

<div ng-app>
  <label>Name:</label>
  <input type="text" ng-model="yourName" placeholder="Enter a name here">
  <hr>
  <h1>Hello {{yourName}}!</h1>
</div>

<?php include 'options-form.php';?>