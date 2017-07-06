angular.module('mobieApp')
.factory('apiFactoryRest', ['$rootScope', '$http',  function( $rootScope, $http ){

    var restUrl = $rootScope.api;
    var dataFactory = {};

    var transform = function(data){
        return jQuery.param(data);
    }

    // ----------------------- Ejemplos -------------------------
    dataFactory.storeExample = function(data){
      return $http.post(restUrl + '/store/example', data, {
          headers : { 'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'},
          transformRequest : transform
      });
    }
    dataFactory.deleteExample = function(data){
        return $http.delete(restUrl + '/delete/example/'+ data);
    }

    dataFactory.updateExample = function(data){
       return $http.put(restUrl + '/update/example', data, {
            headers: { 'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'},
            transformRequest: transform
        });  
    }

    // --------------- Rest Utilizables -------------------
    dataFactory.getCountries = function(){
        return $http.get(restUrl + '/get/countries');
    } 

    dataFactory.getMovies = function(){
        return $http.get(restUrl + '/get/movies');
    }

    dataFactory.getActorsMovie = function(movieId){
        return $http.get( restUrl + '/movies/actors/' + movieId );
    }

    dataFactory.getMaximoKilometraje = function(){
        return $http.get( restUrl + '/get/kilometraje');
    }

    dataFactory.storeGasolina = function(data){
      return $http.post(restUrl + '/registrar/gasolina', data, {
          headers : { 'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'},
          transformRequest: transform
      });
    }
    
    return dataFactory;
}]);