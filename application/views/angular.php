<!DOCTYPE html>
<html lang="en" ng-app="bio">
<head>
	<meta charset="UTF-8">
	<title>Belajar Angular</title>
	<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.0-rc.0/angular.min.js"></script>

</head>
<body>
	
	<div ng-controller="dataBio">
		<input type="text" ng-model="hasil" id="">	
		
		<ul>
		<li ng-repeat="d in data | filter : hasil"> Nama{{d.nama}} Kota : {{d.kota}}</li>
		</ul>
	</div>

	<script>

	var test = angular.module('bio', []);

	test.controller('dataBio', function($scope){
		$scope.data = [{nama : 'Pandu aldi p', kota:'brebes'}, {nama:'febri', kota : 'tegal'}];
	});
	</script>
</body>
</html>