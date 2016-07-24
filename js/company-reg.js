

angular.module('myApp',[])
  .controller('FormController', ['$scope',function($scope){

      $scope.userdata = {};



      //setInterval(function(){console.log($scope.userdata.captcha)},2000);



      // $scope.submitForm = function(){
      //   // console.log('表单提交了！');
      //
      //   // console.log(userdata);
      // }
      $scope.userdata.captcha1 ="bb";


  }])
  .directive('compare',function(){
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
