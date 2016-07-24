

angular.module('myApp',[])
  .controller('FormController', ['$scope','$http',function($scope,$http){
    $scope.userdata = {};
    $scope.logindata = {};

    setTimeout(function(){
      $('#captcha-tip').trigger('click');
    },1000);

    $('#captcha-tip').on('click',function(){
        $.get('ader/change_cap',function(res){
          //console.log(res.codeinfo);
          $('#captcha-img').attr('src',"captcha/"+res.codeinfo.time+".jpg");
          $('#captcha-img-login').attr('src',"captcha/"+res.codeinfo.time+".jpg");
          $('#captcha_ci').val(res.codeinfo.word);
          $('#captcha_ci_login').val(res.codeinfo.word);
          $scope.userdata.captcha_ci = res.codeinfo.word;
          $scope.logindata.captcha_ci_login = res.codeinfo.word;
        },'json');
    });

    $('#captcha-tip-login').on('click',function(){
        $('#captcha-tip').trigger('click');
    });

    // $scope.check = function(){
    //
    //   $http({
    //     method: "GET",
    //     url: "ader/check_ader_username",
    //     data:{
    //         'username':$scope.userdata.username
    //     }
    //   }).
    //   success(function(data, status) {
    //      return "success";
    //   }).
    //   error(function(data, status) {
    //     //$scope.data = data || "Request failed";
    //     //$scope.status = status;
    //   });
    //
    // }















      //setInterval(function(){console.log($scope.userdata.captcha)},2000);



      // $scope.submitForm = function(){
      //   $username = $scope.userdata.username;
      //   $password = $scope.userdata.password;
      //   $email = $scope.userdata.email;
      //   $companyName = $scope.userdata.companyName;
      //   $tel = $scope.userdata.tel;
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
