angular.module("mobieApp")
.controller("registroGasolinaCtrl", 
	     ["$rootScope","$scope","$http","$compile","$q","$uibModal","$log","apiFactoryRest","growlService",  
function ( $rootScope,  $scope,  $http,  $compile,  $q,  $uibModal,  $log,  apiFactoryRest,  growlService ) {

	// Dato por default
	$scope.tipoGasolina = 'magna';

	$scope.datos = {};

	$scope.fn = {
		init : function(){
			console.log('Init Registrar Gasolina');
		},
		guardar : function() {
			
			$scope.datos = {
				litros : $scope.litros,
				tipoGasolina : $scope.tipoGasolina,
				montoGasolina : $scope.montoGasolina,
				kilometraje : $scope.kilometraje
			}

			apiFactoryRest.storeGasolina( $scope.datos )
			.success(function(rs){
				if(rs.status === 'success'){
					growlService.notice('Mensaje Sistema', rs.msg);

					$scope.litros = '';
				    $scope.tipoGasolina = '';
				    $scope.montoGasolina = '';
					$scope.kilometraje = '';

				} else if(rs.status === 'error'){
					growlService.error('Mensaje Sistema', rs.msg);
				}
			})
			.error(function(err){
				growlService.error('Mensaje Sistema', err);
			});	
		}
	};
	$scope.fn.init();
}]);