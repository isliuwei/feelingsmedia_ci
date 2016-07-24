

var myApp = angular.module('myApp',[]);

myApp.controller('updateFormController',['$scope',function($scope){

  $scope.updateInfo = {};

  setTimeout(function(){
    $('#captcha-tip').trigger('click');
  },1000);

  $('#captcha-tip').on('click',function(){
      $.get('ader/change_cap',function(res){
        $('#captcha-img').attr('src',"captcha/"+res.codeinfo.time+".jpg");
        $('#captcha_ci').val(res.codeinfo.word);
        $scope.updateInfo.captcha_ci = res.codeinfo.word;
      },'json');
  });

  // $scope.updateInfo = function(){
  //   $http({
  //       method  : 'POST',
  //       url     : 'ader/update_ader_info',
  //       data    : $.param($scope.updateInfo),  // pass in data as strings
  //       headers : { 'Content-Type': 'application/x-www-form-urlencoded' }  // set the headers so angular passing info as form data (not request payload)
  //   })
  //       .success(function(data) {
  //           console.log(data);
  //
  //           // if (!data.success) {
  //           //     // if not successful, bind errors to error variables
  //           //     $scope.errorName = data.errors.name;
  //           //     $scope.errorSuperhero = data.errors.superheroAlias;
  //           // } else {
  //           //     // if successful, bind success message to message
  //           //     $scope.message = data.message;
  //           // }
  //       });
  //
  // }


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
