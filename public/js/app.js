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
    $scope.confirmDelete = function(id) {
        $scope.delete();
        $(".modal-confirmDelete"+$scope.row.id).modal('hide');
    };
});

app.controller('indexCursoController', function($scope, $window) {
    $scope.edit = function() {
        window.location = "editar/"+$scope.atividade.id;
    };
    $scope.delete = function() {
        window.location = "remover/"+$scope.atividade.id;
    };
    $scope.showConfirmDelete = function() {
        $scope.delete();
        $(".modal-confirmDelete").modal('hide');
    };
});

app.controller('atividadesCursoController', function($scope) {
    $scope.edit = function() {
        window.location.href = window.location.origin + '/tcc/public/atividade/editar/' + $scope.row.id;
    };
    $scope.delete = function() {
        window.location.href = window.location.origin + '/tcc/public/atividade/remover/' + $scope.row.id;
    };
    $scope.showConfirmDelete = function() {
        $scope.delete();
        $(".modal-confirmDelete").modal('hide');
    };
});

app.controller('videosCursoController', function($scope) {
    $scope.edit = function() {
        window.location.href = window.location.origin + '/tcc/public/video/editar/' + $scope.row.id;
    };
    $scope.delete = function() {
        window.location.href = window.location.origin + '/tcc/public/video/remover/' + $scope.row.id;
    };
    $scope.showConfirmDelete = function() {
        $scope.delete();
        $(".modal-confirmDelete").modal('hide');
    };
});

app.controller('materiaisCursoController', function($scope) {
    $scope.edit = function() {
        window.location.href = window.location.origin + '/tcc/public/material/editar/' + $scope.row.id;
    };
    $scope.delete = function() {
        window.location.href = window.location.origin + '/tcc/public/material/remover/' + $scope.row.id;
    };
    $scope.showConfirmDelete = function() {
        $scope.delete();
        $(".modal-confirmDelete").modal('hide');
    };
});

app.controller('respostasQuestaoController', function($scope) {
    $scope.edit = function() {
        window.location.href = window.location.origin + '/tcc/public/resposta/editar/' + $scope.row.id;
    };
    $scope.delete = function() {
        window.location.href = window.location.origin + '/tcc/public/resposta/remover/' + $scope.row.id;
    };
    $scope.showConfirmDelete = function() {
        $scope.delete();
        $(".modal-confirmDelete").modal('hide');
    };
});

app.controller('inscricoesCursoController', function($scope) {
    $scope.vercurso = function(curso){
        //if ($scope.naoinscrito($scope.curso.id)) {
            window.location = "inscricao/" + $scope.usuario.id + "/" + $scope.curso.id;
        //} else {
          //  window.location = "meucurso/" + $scope.inscricao.id;
        //}
    };

    $scope.inscrito = function(curso){
        var indexOfRole = $scope.inscricoes.indexOf(curso);
        if (indexOfRole === -1)
            return false;
        else
            return true;
    };

    $scope.naoinscrito = function(curso){
        var indexOfRole = $scope.inscricoes.indexOf(curso);
        if (indexOfRole > -1)
            return false;
        else
            return true;
    };

    $scope.inscrever = function() {
        if ($scope.naoinscrito($scope.curso.id)) {
            window.location = "inscrever/"+$scope.usuario.id+"/"+$scope.curso.id;
        }
    };
});

app.controller('meusCursosController', function($scope) {
    $scope.meucurso = function() {
        window.location = "meucurso/"+$scope.inscricao.id;
    };
});

app.controller('meuCursoController', function($scope) {
    $scope.avaliacao = function() {
        window.location.href = window.location.origin + '/tcc/public/avaliacao/'+$scope.inscricao.id;
    };
});

app.controller('meuCursoUnidadeController', function($scope) {
    $scope.filtroUnidade = function(item) {
        return item.unidade.id === $scope.unidade.id ? true : false;
    };
});

app.controller('meuCursoAtividadeController', function($scope) {
    $scope.meuvideo = function() {
        window.location.href = window.location.origin + '/tcc/public/meuvideo/'+$scope.inscricao.id+'/'+$scope.video.id;
    };
    $scope.minhaatividade = function() {
        window.location.href = window.location.origin + '/tcc/public/minhaatividade/'+$scope.inscricao.id+'/'+$scope.atividade.id;
    };
    $scope.meumaterial = function() {
        window.location.href = window.location.origin + '/tcc/public/meumaterial/'+$scope.inscricao.id+'/'+$scope.material.id;
    };
});

app.controller('certificadosController', function($scope) {
    $scope.certificado = function() {
        window.location = "meucertificado/"+$scope.inscricao.id;
    };
});