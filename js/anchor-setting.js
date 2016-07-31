var myApp = angular.module('myApp',[]);

myApp.directive('compare',function(){
  var obj = {};
  obj.strict = 'AE';
  obj.scope = {
    orgText: "=compare"
  }
  obj.require = 'ngModel';
  obj.link = function(sco,ele,att,con){
    //console.log(con);
    con.$validators.compare = function(v){
      return v == sco.orgText;
    }
    sco.$watch('orgText',function(){
      con.$validators;
    })
  }
  return obj;
})
.controller('passwordFormController',['$scope',function($scope){
  $scope.passwordInfo = {};
}]);