

angular.module('myApp',[])
  .controller('FormController', ['$scope',function($scope){
    $scope.message = {};

    $scope.loginInfo = {};

    setTimeout(function(){
      $('.captcha-tip').trigger('click');
    },1000);

    $('.captcha-tip').on('click',function(){
        $.get('ader/change_cap',function(res){
          //console.log(res.codeinfo);
          $('.captcha-img').attr('src',"captcha/"+res.codeinfo.time+".jpg");
          $('.captcha_ci').val(res.codeinfo.word);
          $scope.loginInfo.captcha_ci = res.codeinfo.word;
        },'json');
    });


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
