<!DOCTYPE html>
<html lang="en" ng-app="myApp" ng-controller="FormController">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <base href="<?php echo site_url(); ?>">
  <title>媒体咨询公司注册页面</title>
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/font-awesome.min.css">
  <link rel="stylesheet" href="css/company-reg.css">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/blue.css">
  <link rel="stylesheet" href="css/lrtk.css" />
  <link rel="stylesheet" href="css/lrtk1.css" />


  <style>
    #captcha-tip{
      cursor: pointer;
    }
    .fa-asterisk{
      color: #d9534f;
    }
    #captcha_login{
      margin-right: 20px;
    }
    #captcha-img-login{
      padding-top: 5px;
    }
    a:hover{
      text-decoration: none;
    }
    .icheckbox_square-blue{
      width: 25px;
      height: 25px;
      margin-bottom: 10px;
    }
  </style>

</head>
<body>
  <header class='navbar navbar-default navbar-fixed-top' id='main-navbar' role='banner'>
		<div class='container-fluid'>
			<div class='navbar-header'>
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
	      </button>
			  <!-- <img class="logo" alt="" src="img/favicon.ico"> -->
			</div>
			<nav class='collapse navbar-collapse' role='navigation'>
			  <ul class='nav navbar-nav navbar-left'>
			    <li><a href="welcome/index" >首页</a></li>
			    <li class="active"><a href="#">我是媒体咨询公司 | 注册</a></li>
			  </ul>

        <ul class='nav navbar-nav navbar-right'>

        <a class="btn btn-success navbar-btn login-btn" data-toggle="modal" data-target="#company-reg" href="#">登录</a>

        <a class="btn navbar-btn js-login-btn" href="#">Register</a>

        </ul>
			</nav>
		</div>
	</header>

  <div class="container">
    <h2 class="title">媒体咨询公司注册</h2>
    <div class="row">

      <form class="form col-md-8 col-md-offset-2" name="signUpForm" ng-submit="submitForm()"
        method="post" action="company/save_company" 
      >



          <!-- 登录名验证逻辑 -->
        <div class="form-group">
          <label for="username"><i class="fa fa-asterisk"></i>登录名</label>
          <div class="wrap">
            <input
              type="text"
              class="form-control"
              id="username"
              placeholder="登录名由6-22位数字或字母组成"
              name="username"
              ng-pattern="/^[A-Za-z0-9]+$/"
              ng-model="userdata.username"
              ng-class="{
                'error': signUpForm.username.$invalid && signUpForm.username.$touched,
                'success':signUpForm.username.$valid }"
              ng-minlength="6"
              ng-maxlength="22"
              required
            >
            <i class="fa fa-check tip right" ng-if="signUpForm.username.$valid && signUpForm.username.$touched"></i>
            <i class="fa fa-remove tip wrong" ng-if="signUpForm.username.$invalid && signUpForm.username.$touched"></i>
          </div>




          <!-- 验证必填 $error.required -->
          <P
            class="error-info"
            ng-if="signUpForm.username.$touched && signUpForm.username.$error.required"
          >登录名不能为空</P>


          <!-- 验证长度 $error.minlength $error.maxlength-->
          <P
            class="error-info"
            ng-if="signUpForm.username.$touched && (signUpForm.username.$error.minlength || signUpForm.username.$error.maxlength)"
          >登录名长度不合法，登录名长度6-22位</P>



          <!-- 验证格式 $error.pattern-->
          <P
            class="error-info"
            ng-if="signUpForm.username.$error.pattern && signUpForm.username.$touched"
          >登录名含有非法字符，登录名由数字或字母组成</P>

        </div>


        <div class="form-group">
          <label for="email">邮箱</label>
          <div class="wrap">
          <input
            name="email"
            ng-model="userdata.email"
            ng-pattern ="/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/"
            ng-class="{
              'error': signUpForm.email.$invalid && signUpForm.email.$touched,
              'success':signUpForm.email.$valid }"
            required
            type="email"
            class="form-control"
            id="email"
            placeholder="请输入联系人邮箱"
          >
          <i class="fa fa-check tip right" ng-if="signUpForm.email.$valid && signUpForm.email.$touched"></i>
          <i class="fa fa-remove tip wrong" ng-if="signUpForm.email.$invalid && signUpForm.email.$touched"></i>
          </div>

          <p
            class="error-info"
            ng-if="signUpForm.email.$touched && signUpForm.email.$error.required"
            >邮箱不能为空</p>

          <p
            class="error-info"
            ng-if="signUpForm.email.$touched && signUpForm.email.$error.pattern"
            >邮箱格式不正确</p>
        </div>




        <div class="form-group">
            <label for="pwd1">密码</label>
            <div class="wrap">
              <input
                type="password"
                ng-minlength="6"
                ng-maxlength="22"
                class="form-control"
                id="pwd1"
                placeholder="密码由6-22位数字或字母组成"
                required
                ng-pattern="/^[A-Za-z0-9]+$/"
                name="pwd1"
                ng-model="userdata.pwd1"
                ng-class="{
                    'error': signUpForm.pwd1.$invalid && signUpForm.pwd1.$touched,
                    'success': signUpForm.pwd1.$valid
                }"
              >
              <i class="fa fa-check tip right" ng-if="signUpForm.pwd1.$valid && signUpForm.pwd1.$touched"></i>
              <i class="fa fa-remove tip wrong" ng-if="signUpForm.pwd1.$invalid && signUpForm.pwd1.$touched"></i>
          </div>
          <p
            class="error-info"
            ng-if="signUpForm.pwd1.$error.required && signUpForm.pwd1.$touched">
            输入密码不能为空</p>
          <p
            class="error-info"
            ng-if="(signUpForm.pwd1.$error.minlength || signUpForm.pwd1.$error.maxlength) && signUpForm.pwd1.$touched">
            输入密码长度不合法,密码长度6-22位</p>
          <p
            class="error-info"
            ng-if="signUpForm.pwd1.$error.pattern && signUpForm.pwd1.$touched">
            密码含有非法字符，密码由数字或字母组成</p>
        </div>
        <div class="form-group">
          <label for="pwd2">确认密码</label>
          <div class="wrap">
            <input
              type="password"
              ng-minlength="6"
              ng-maxlength="22"
              class="form-control"
              id="pwd2"
              placeholder="请再输入一遍密码,密码由6-22位数字或字母组成"
              ng-pattern="/^[A-Za-z0-9]+$/"
              name="pwd2"
              ng-model="userdata.pwd2"
              required
              ng-class="{
                'error': signUpForm.pwd2.$invalid && signUpForm.pwd2.$touched,
                'success': signUpForm.pwd2.$valid
              }"
              compare="userdata.pwd1"

              >
              <i class="fa fa-check tip right" ng-if="signUpForm.pwd2.$valid && signUpForm.pwd2.$touched"></i>
              <i class="fa fa-remove tip wrong" ng-if="signUpForm.pwd2.$invalid && signUpForm.pwd2.$touched"></i>
          </div>
          <p
            class="error-info"
            ng-if="signUpForm.pwd2.$error.required && signUpForm.pwd2.$touched">
            输入密码不能为空</p>
          <p
            class="error-info"
            ng-if="(signUpForm.pwd2.$error.minlength || signUpForm.pwd2.$error.maxlength) && signUpForm.pwd2.$touched">
            输入密码长度不合法,密码长度6-22位</p>
          <p
            class="error-info"
            ng-if="signUpForm.pwd2.$error.pattern && signUpForm.pwd2.$touched">
            密码含有非法字符，密码由数字或字母组成</p>
          <p
            class="error-info"
            ng-if="signUpForm.pwd2.$error.compare && signUpForm.pwd2.$touched">
            两次输入密码不一致</p>

        </div>



        <div class="form-group">
          <label for="tel">公司联系电话</label>
          <div class="wrap">
            <input
              type="number"
              class="form-control"
              id="tel"
              placeholder="请输入公司联系电话"
              ng-model="userdata.tel"
              name="tel"
              ng-pattern ="/^1[3|4|5|7|8][0-9]{9}$/"
              ng-class="{
                'error': signUpForm.tel.$invalid && signUpForm.tel.$touched,
                'success':signUpForm.tel.$valid }"
              required
            >
            <i class="fa fa-check tip right" ng-if="signUpForm.tel.$valid && signUpForm.tel.$touched"></i>
            <i class="fa fa-remove tip wrong" ng-if="signUpForm.tel.$invalid && signUpForm.tel.$touched"></i>


            <!-- 验证必填 $error.required -->
            <P
              class="error-info"
              ng-if="signUpForm.tel.$touched && signUpForm.tel.$error.required"
            >联系电话不能为空</P>

          </div>

        </div>

        

        <div class="form-group">
          <label for="company">公司名称</label>
          <div class="wrap">
            <input
              type="text"
              class="form-control"
              id="company"
              placeholder="请输入正确的公司名称"
              name="company"
              ng-model="userdata.company"
              ng-class="{
                'error': signUpForm.company.$invalid && signUpForm.company.$touched,
                'success':signUpForm.company.$valid }"
              required
            >
            <i class="fa fa-check tip right" ng-if="signUpForm.company.$valid && signUpForm.company.$touched"></i>
            <i class="fa fa-remove tip wrong" ng-if="signUpForm.company.$invalid && signUpForm.company.$touched"></i>
            <p
              class="error-info"
              ng-if="signUpForm.company.$touched && signUpForm.company.$error.required"
              >公司名称不能为空</p>

          </div>

        </div>
        <div class="form-group">
          <label for="website">公司网址</label>
          <div class="wrap">
            <input
              name="website"
              ng-model="userdata.website"
              ng-class="{
                'error': signUpForm.website.$invalid && signUpForm.website.$touched,
                'success':signUpForm.website.$valid }"
              type="url"
              class="form-control"
              id="website"
              placeholder="请输入您的公司网址，以http://开头"
              required
            >


            <i class="fa fa-check tip right" ng-if="signUpForm.website.$valid && signUpForm.website.$touched"></i>
            <i class="fa fa-remove tip wrong" ng-if="signUpForm.website.$invalid && signUpForm.website.$touched"></i>
            <p
              class="error-info"
              ng-if="signUpForm.website.$touched && signUpForm.website.$error.required"
              >公司网站名称不能为空</p>

              <p
                class="error-info"
                ng-if="signUpForm.website.$touched && signUpForm.website.$error.url"
                >公司网站格式不正确</p>

          </div>
        </div>



        <div class="form-group">
          <label for="resourceCate" class="col-sm-3 control-label">公司资源类型</label>
          <br>
          <div class="col-sm-9">
            <div class="checkbox">
                <input type="checkbox" name="resourceCate[]" value="1">  楼&nbsp;宇
                <input type="checkbox" name="resourceCate[]" value="2">  公&nbsp;交
                <input type="checkbox" name="resourceCate[]" value="3">  机&nbsp;场
                <input type="checkbox" name="resourceCate[]" value="4">  校&nbsp;园
                <input type="checkbox" name="resourceCate[]" value="5">  地&nbsp;铁
                <input type="checkbox" name="resourceCate[]" value="6">  院&nbsp;线
                <input type="checkbox" name="resourceCate[]" value="7">  擎&nbsp;天&nbsp;柱
                <br>
                <input type="checkbox" name="resourceCate[]" value="8">  自&nbsp;媒&nbsp;体
                <input type="checkbox" name="resourceCate[]" value="9">  户外楼体LED大屏
            </div>
          </div>
        </div>


        <div class="form-group">
          <label for="resourceCity" class="col-sm-3 control-label">公司资源分布城市</label>
          <br>
          <div class="col-sm-9">
            <div class="checkbox">
                <input type="checkbox" name="resourceCity[]" value="1">  北&nbsp;京
                <input type="checkbox" name="resourceCity[]" value="2">  上&nbsp;海
                <input type="checkbox" name="resourceCity[]" value="3">  广&nbsp;州
                <input type="checkbox" name="resourceCity[]" value="4">  深&nbsp;圳
                <input type="checkbox" name="resourceCity[]" value="5">  天&nbsp;津
                <input type="checkbox" name="resourceCity[]" value="6">  重&nbsp;庆
                <input type="checkbox" name="resourceCity[]" value="7">  太&nbsp;原
                <input type="checkbox" name="resourceCity[]" value="8">  沈&nbsp;阳
                <input type="checkbox" name="resourceCity[]" value="9">  长&nbsp;春
                <input type="checkbox" name="resourceCity[]" value="10">  南&nbsp;京
                <input type="checkbox" name="resourceCity[]" value="11">  杭&nbsp;州
                <input type="checkbox" name="resourceCity[]" value="12">  合&nbsp;肥
                <input type="checkbox" name="resourceCity[]" value="13">  福&nbsp;州
                <input type="checkbox" name="resourceCity[]" value="14">  南&nbsp;昌
                <input type="checkbox" name="resourceCity[]" value="15">  济&nbsp;南
                <input type="checkbox" name="resourceCity[]" value="16">  郑&nbsp;州
                <input type="checkbox" name="resourceCity[]" value="17">  武&nbsp;汉
                <input type="checkbox" name="resourceCity[]" value="18">  长&nbsp;沙
                <input type="checkbox" name="resourceCity[]" value="19">  成&nbsp;都
                <input type="checkbox" name="resourceCity[]" value="20">  贵&nbsp;阳
                <input type="checkbox" name="resourceCity[]" value="21">  昆&nbsp;明
                <input type="checkbox" name="resourceCity[]" value="22">  西&nbsp;安
                <input type="checkbox" name="resourceCity[]" value="23">  南&nbsp;宁
                <input type="checkbox" name="resourceCity[]" value="24">  大&nbsp;连
                <input type="checkbox" name="resourceCity[]" value="25">  青&nbsp;岛
                <input type="checkbox" name="resourceCity[]" value="26">  石&nbsp;家&nbsp;庄
                <input type="checkbox" name="resourceCity[]" value="27">  哈&nbsp;尔&nbsp;滨
                <input type="checkbox" name="resourceCity[]" value="28"> 乌&nbsp;鲁&nbsp;木&nbsp;齐
                <input type="checkbox" name="resourceCity[]" value="29"> 呼&nbsp;和&nbsp;浩&nbsp;特
                <input type="checkbox" name="resourceCity[]" value="30">  其&nbsp;它

            </div>
          </div>
        </div>


        <div class="form-group">
          <label for="captcha">验证码</label>
          <input
            type="text"
            class="form-control"
            id="captcha"
            placeholder="请输验证码"
            required
            ng-model="userdata.captcha"
            name="captcha"
            ng-class="{
              'error': signUpForm.captcha.$invalid && signUpForm.captcha.$touched,
              'success':signUpForm.captcha.$valid }"
            compare="userdata.captcha_ci"

          >

          <input
            type="hidden"
            ng-model="userdata.captcha_ci"
            name="captcha_ci"
            id="captcha_ci"
          >


          <img id="captcha-img" src="captcha/<?php echo $codeinfo['time']; ?>.jpg" alt="">
          <span id="captcha-tip"> <i class="fa fa-refresh"></i> 看不清?换一张</span>
          <p
            class="error-info"
            ng-if="signUpForm.captcha.$error.compare && signUpForm.captcha.$touched">
            验证码输入错误</p>
        </div>


        <button id="sub-btn" type="submit" ng-disabled="signUpForm.$invalid" class="btn btn-lg btn-success">完成注册</button>
      </form>
    </div>
  </div>


  <div class="modal fade" id="company-reg" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog" role="document">
      <button type="button" id="close-btn" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <div class="login">
                <form action="company/check_login" name="loginForm" method="post" class="container offset1 loginform" >
                    <div class="owl-login">
                        <div class="hand"></div>
                        <div class="hand hand-r"></div>
                        <div class="arms">
                            <div class="arm"></div>
                            <div class="arm arm-r"></div>
                        </div>
                    </div>
                    <br>
                    <h3>媒体资源公司登录</h3>
                    <div class="pad">
                        <div class="control-group">
                            <div class="controls">
                                <label for="companyUsername" class="control-label fa fa-user"></label>
                                <input ng-model="logindata.companyUsername" ng-class="{
                                  'error': loginForm.companyUsername.$invalid && loginForm.companyUsername.$touched,
                                  'success':loginForm.companyUsername.$valid }" required id="companyUsername" type="text" name="companyUsername" placeholder="用户名" tabindex="1"  class="form-control input-medium">
                            </div>
                        </div>

                        <div class="control-group">
                            <div class="controls">
                                <label for="companyPassword" class="control-label fa fa-key"></label>
                                <input ng-model="logindata.companyPassword" ng-class="{
                                  'error': loginForm.companyPassword.$invalid && loginForm.companyPassword.$touched,
                                  'success':loginForm.companyPassword.$valid }" required id="companyPassword" type="password" name="companyPassword" placeholder="密码" tabindex="2" class="form-control input-medium">
                            </div>
                        </div>

                        <div class="control-group">
                            <div class="controls">
                                <label for="captcha" class="control-label fa fa-qrcode"></label>
                                <input
                                  id="captcha_login"
                                  type="number"
                                  name="captcha_login"
                                  placeholder="验证码"
                                  tabindex="2"
                                  class="form-control col-md-2"
                                  ng-model="logindata.captcha_login"
                                  ng-class="{
                                    'error': loginForm.captcha_login.$invalid && loginForm.captcha_login.$touched,
                                    'success':loginForm.captcha_login.$valid }"
                                  compare="logindata.captcha_ci_login"
                                  required
                                  >



                                  <input
                                    type="hidden"
                                    ng-model="logindata.captcha_ci_login"
                                    name="captcha_ci_login"
                                    id="captcha_ci_login"
                                  >

                                <img id="captcha-img-login" src="captcha/<?php echo $codeinfo['time']; ?>.jpg" alt="">
                                <span id="captcha-tip-login"><a href="javascript:;"> &nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-refresh"></i>换一换</a></span>
                            </div>
                          </div>
                    </div>
                    <div class="form-actions">
                        <p><a href="company/forget_password" tabindex="5" class=" pull-left btn-link text-muted">忘记密码?</a></p>
                        <br>

                        <button type="submit" tabindex="4" class="btn btn-primary" ng-disabled="loginForm.$invalid">登录</button>
                        <button type="button" tabindex="4" class="btn btn-warning"><a style="display:block;color:#fff;">注册</a></button>
                    
                    </div>

                </form>
          </div>
      </div>
  </div>


  <script src="js/jquery-1.11.3.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/angular.js"></script>
  <script src="js/company-reg.js"></script>

  <script src="js/icheck.js"></script>
  <script>
    $('input').iCheck({ checkboxClass: 'icheckbox_square-blue', radioClass: 'iradio_square-blue', increaseArea: '20%'  });
  </script>


  <script>
    $(function() {

        $('.login #password').focus(function() {
            $('.owl-login').addClass('password');
        }).blur(function() {
            $('.owl-login').removeClass('password');
        });


    });
  </script>

  <script>
      $userInput = $('#username');
          $userInput.on('blur',function(){
              $username = $(this).val().trim();
              if($username==""){
                  return;
              }else{
                  $.get('company/check_username',{'user':$username},function(res){
                      if(res == 'true'){
                          //$userInput.after("<p class='error-info'>用户名重复，请重新输入！</p>");
                          alert("用户名重复，请重新输入！");
                          $userInput.empty();
                          location.reload();
                      }
                  },'text');
              }
         });
  </script>

  <script>
      $emailInput = $('#email');
      $emailInput.on('blur',function(){
          $email = $(this).val().trim();
          if($email == ""){
              return ;
          }else {
              $.get("company/check_email",{'email':$email},function(res){
                  if(res == 'true'){
                      //$emailInput.after("<p class='error-info'>邮箱重复，请重新输入！</p>");
                      alert("邮箱重复，请重新输入！");
                      location.reload();
                  }
              },"text");
          }
      })
  </script>
</body>
</html>
