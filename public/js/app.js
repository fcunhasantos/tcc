/**
 * Created by Felipe on 23/07/2016.
 */
var app = angular.module( 'app', [] );

app.controller('indexController', function($scope) {
    $scope.add = function() {
        window.location = "adicionar";
    };
});

app.controller('indexRowController', function($scope, $window) {
    $scope.selectRow = function() {
        if ($('#'+$scope.row.id).hasClass('active')) {
            $('#'+$scope.row.id).removeClass('active');
        } else {
            $('#'+$scope.row.id).addClass('active').siblings().removeClass('active');
        }
    };
    $scope.edit = function() {
        window.location = "editar/"+$scope.row.id;
    };
    $scope.delete = function() {
        window.location = "remover/"+$scope.row.id;
    };
    $scope.showConfirmDelete = function() {
        /*if ($window.confirm('Deseja excluir?')) {
            $scope.delete();
        }*/
        $scope.delete();
        $(".modal-confirmDelete").modal('hide');
    };
});