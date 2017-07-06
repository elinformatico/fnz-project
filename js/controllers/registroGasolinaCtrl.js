angular.module("mobieApp")
.controller("registroGasolinaCtrl", 
	     ["$rootScope","$scope","$http","$compile","$q","$uibModal","$log","apiFactoryRest","growlService",  
function ( $rootScope,  $scope,  $http,  $compile,  $q,  $uibModal,  $log,  apiFactoryRest,  growlService ) {

	// Dato por default
	$scope.tipoGasolina = 'magna';
	$scope.ultimoKilometraje = '0';

	$scope.datos = {};

	$scope.fn = {
		init : function(){
			this.getKilometraje();
		},
		validarFormulario : function(){
			return (($scope.litros != undefined && 
				    $scope.tipoGasolina != undefined && 
				    $scope.montoGasolina != undefined && 
				    $scope.kilometraje != undefined) &&

					$scope.litros != '' && 
				    $scope.tipoGasolina != '' && 
				    $scope.montoGasolina != '' && 
				    $scope.kilometraje != ''
			);
		},
		getKilometraje : function() {
			
			apiFactoryRest.getMaximoKilometraje()
			.success(function(rs){
				if(rs.status === 'success'){
					$scope.ultimoKilometraje = rs.kilometraje;

				} else if(rs.status === 'error'){
					$scope.ultimoKilometraje = 'Error Sistema';
				}
			})
			.error(function(err){
				$scope.ultimoKilometraje = 'Error Conexión';
			});	

		},
		guardar : function() {
			
			$scope.datos = {
				litros : $scope.litros,
				tipoGasolina : $scope.tipoGasolina,
				montoGasolina : $scope.montoGasolina,
				kilometraje : $scope.kilometraje
			}

			if(this.validarFormulario()){
				apiFactoryRest.storeGasolina( $scope.datos )
				.success(function(rs){
					if(rs.status === 'success'){
						growlService.notice('Mensaje Sistema', rs.msg);

						$scope.litros = '';
					    $scope.tipoGasolina = 'magna';
					    $scope.montoGasolina = '';
						$scope.kilometraje = '';

					} else if(rs.status === 'error'){
						growlService.error('Mensaje Sistema', rs.msg);
					}
				})
				.error(function(err){
					growlService.error('Mensaje Sistema', err);
				});
			} else {
				growlService.warning('Mensaje Sistema', '¡Por favor llene todos los campos!');
			}
		}
	};
	$scope.fn.init();
}]);