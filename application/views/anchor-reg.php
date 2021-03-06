
<!DOCTYPE html>
<html lang="en" ng-app="myApp" ng-controller="FormController">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <base href="<?php echo site_url(); ?>">
  <title>主播注册页面</title>
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/font-awesome.min.css">
  <link rel="stylesheet" href="css/anchor-reg.css">
  <link rel="stylesheet" href="css/style.css">
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
			    <li><a href="welcome/index">首页</a></li>
			    <li class="active"><a href="#">我是主播 | 注册</a></li>
			  </ul>

        <ul class='nav navbar-nav navbar-right'>

        <a class="btn btn-success navbar-btn login-btn" data-toggle="modal" data-target="#anchor-reg" href="#">登录</a>

        <a class="btn navbar-btn js-login-btn" href="#">Register</a>

        </ul>
			</nav>
		</div>
	</header>



  <div class="container col-sx-10">
    <h2 class="title">主播注册</h2>
    <div class="row">

      <form action="anchor/save_anchor" method="post" class="form col-md-8 col-md-offset-2" name="signUpForm" ng-submit="submitForm()">

        <!-- 登录名验证逻辑 -->
        <div class="form-group">
          <label for="username"><i class="fa fa-asterisk"></i> 登录名</label>
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
          <label for="email"><i class="fa fa-asterisk"></i> 邮箱</label>
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
            <label for="pwd1"><i class="fa fa-asterisk"></i> 密码</label>
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
          <label for="pwd2"><i class="fa fa-asterisk"></i> 确认密码</label>
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
          <label for="tel"><i class="fa fa-asterisk"></i> 手机号码</label>
          <div class="wrap">
            <input
              type="number"
              class="form-control"
              id="tel"
              placeholder="请输入联系人手机号"
              ng-model="userdata.tel"
              name="tel"
              ng-class="{
                'error': signUpForm.tel.$invalid && signUpForm.tel.$touched,
                'success':signUpForm.tel.$valid }"
              required
              ng-pattern="/^1[3|4|5|7|8][0-9]{9}$/"
            >
            <i class="fa fa-check tip right" ng-if="signUpForm.tel.$valid && signUpForm.tel.$touched"></i>
            <i class="fa fa-remove tip wrong" ng-if="signUpForm.tel.$invalid && signUpForm.tel.$touched"></i>


            <!-- 验证必填 $error.required -->
            <p
              class="error-info"
              ng-if="signUpForm.tel.$touched && signUpForm.tel.$error.required"
            >手机号不能为空</p>
            <!-- 验证必填 $error.required -->
            <p
              class="error-info"
              ng-if="signUpForm.tel.$touched && signUpForm.tel.$error.pattern"
            >手机号格式不正确</p>

          </div>

        </div>

        <div class="form-group">
          <label for="trueName"><i class="fa fa-asterisk"></i> 真实姓名</label>
          <div class="wrap">
            <input
              type="text"
              class="form-control"
              id="trueName"
              placeholder="请输入联系人的真实姓名，以免影响收款"
              name="trueName"
              ng-model="userdata.trueName"
              ng-class="{
                'error': signUpForm.trueName.$invalid && signUpForm.trueName.$touched,
                'success':signUpForm.trueName.$valid }"
              required
            >
            <i class="fa fa-check tip right" ng-if="signUpForm.trueName.$valid && signUpForm.trueName.$touched"></i>
            <i class="fa fa-remove tip wrong" ng-if="signUpForm.trueName.$invalid && signUpForm.trueName.$touched"></i>
            <p
              class="error-info"
              ng-if="signUpForm.trueName.$touched && signUpForm.trueName.$error.required"
              >真实姓名不能为空</p>
          </div>

        </div>
        <div class="form-group">
          <label for="qqNum"><i class="fa fa-asterisk"></i> QQ号码</label>
          <div class="wrap">
            <input
              type="number"
              class="form-control"
              id="qqNum"
              placeholder="请输入联系人QQ号码"
              ng-model="userdata.qqNum"
              name="qqNum"
              ng-class="{
                'error': signUpForm.qqNum.$invalid && signUpForm.qqNum.$touched,
                'success':signUpForm.qqNum.$valid }"
              required
            >
            <i class="fa fa-check tip right" ng-if="signUpForm.qqNum.$valid && signUpForm.qqNum.$touched"></i>
            <i class="fa fa-remove tip wrong" ng-if="signUpForm.qqNum.$invalid && signUpForm.qqNum.$touched"></i>


            <!-- 验证必填 $error.required -->
            <P
              class="error-info"
              ng-if="signUpForm.qqNum.$touched && signUpForm.qqNum.$error.required"
            >QQ号码不能为空</P>

          </div>

        </div>
        <div class="form-group">
          <label for="alipayAccount"><i class="fa fa-asterisk"></i> 银行账号</label>
          <div class="wrap">
            <input
              type="number"
              class="form-control"
              id="bankAccount"
              placeholder="请填写正确的银行账号，以免影响收款"
              ng-model="userdata.bankAccount"
              ng-pattern=" /^(\d{16}|\d{19})$/"
              name="bankAccount"
              ng-class="{
                'error': signUpForm.bankAccount.$invalid && signUpForm.bankAccount.$touched,
                'success':signUpForm.bankAccount.$valid }"
              required
            >
            <i class="fa fa-check tip right" ng-if="signUpForm.bankAccount.$valid && signUpForm.bankAccount.$touched"></i>
            <i class="fa fa-remove tip wrong" ng-if="signUpForm.bankAccount.$invalid && signUpForm.bankAccount.$touched"></i>


            <!-- 验证必填 $error.required -->
            <P
              class="error-info"
              ng-if="signUpForm.bankAccount.$touched && signUpForm.bankAccount.$error.required"
            >银行账号不能为空</P>

          </div>

        </div>
        <div class="form-group">
          <label for="alipayAccount"><i class="fa fa-asterisk"></i> 确认银行账号</label>
          <div class="wrap">
            <input
              type="number"
              class="form-control"
              id="bankAccount1"
              placeholder="请再次填写正确的银行账号，以免影响收款"
              ng-model="userdata.bankAccount1"
              ng-pattern=" /^(\d{16}|\d{19})$/"
              name="bankAccount1"
              ng-class="{
                'error': signUpForm.bankAccount1.$invalid && signUpForm.bankAccount1.$touched,
                'success':signUpForm.bankAccount1.$valid }"
              required
              compare="userdata.bankAccount"
            >
            <i class="fa fa-check tip right" ng-if="signUpForm.bankAccount1.$valid && signUpForm.bankAccount1.$touched"></i>
            <i class="fa fa-remove tip wrong" ng-if="signUpForm.bankAccount1.$invalid && signUpForm.bankAccount1.$touched"></i>


            <!-- 验证必填 $error.required -->
            <P
              class="error-info"
              ng-if="signUpForm.bankAccount1.$touched && signUpForm.bankAccount1.$error.required"
            >银行账号不能为空</P>
            <p
              class="error-info"
              ng-if="signUpForm.bankAccount1.$error.compare && signUpForm.bankAccount1.$touched">
              两次输入银行账号不一致</p>

          </div>

        </div>
        <div class="form-group">
          <label for="captcha"><i class="fa fa-asterisk"></i> 验证码</label>
          <input
            type="number"
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
          <span id="captcha-tip"><i class="fa fa-refresh"></i> 看不清?换一张</span>
          <p
            class="error-info"
            ng-if="signUpForm.captcha.$error.compare && signUpForm.captcha.$touched">
            验证码输入错误</p>
        </div>


        <button id="sub-btn" type="submit" ng-disabled="signUpForm.$invalid" class="btn  btn-success">提交并完善主播个人信息</button>
      </form>
    </div>
  </div>



  <div class="modal fade" id="anchor-reg" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog" role="document">
      <button type="button" id="close-btn" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <div class="login">
                <form action="anchor/check_login" method="post" name="loginForm" class="container offset1 loginform">
                    <div class="owl-login">
                        <div class="hand"></div>
                        <div class="hand hand-r"></div>
                        <div class="arms">
                            <div class="arm"></div>
                            <div class="arm arm-r"></div>
                        </div>
                    </div>
                    <br>
                    <h3>主播登录</h3>
                    <div class="pad">


                          <div class="control-group">
                              <div class="controls">
                                  <label for="anchorUsername" class="control-label fa fa-user"></label>
                                  <input ng-model="logindata.anchorUsername" ng-class="{
                                    'error': loginForm.anchorUsername.$invalid && loginForm.anchorUsername.$touched,
                                    'success':loginForm.anchorUsername.$valid }" required id="anchorUsername" type="text" name="anchorUsername" placeholder="用户名" tabindex="1"  class="form-control input-medium">
                              </div>
                          </div>

                          <div class="control-group">
                              <div class="controls">
                                  <label for="anchorPassword" class="control-label fa fa-key"></label>
                                  <input ng-model="logindata.anchorPassword" ng-class="{
                                    'error': loginForm.anchorPassword.$invalid && loginForm.anchorPassword.$touched,
                                    'success':loginForm.anchorPassword.$valid }" required id="anchorPassword" type="password" name="anchorPassword" placeholder="密码" tabindex="2" class="form-control input-medium">
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
                        <p><a href="anchor/forget_password" tabindex="5" class=" pull-left btn-link text-muted">忘记密码?</a></p>
                        <br>
                        <button type="submit" tabindex="4" class="btn btn-primary" ng-disabled="loginForm.$invalid">登录</button>
                        <button type="button" tabindex="4" class="btn btn-warning"><a href="anchor/anchor_reg" style="display:block;color:#fff;">注册</a></button>
                    </div>

                </form>
          </div>
      </div>
  </div>



  <script src="js/jquery-1.11.3.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/angular.js"></script>
  <script src="js/anchor-reg.js"></script>



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
      var $emailInput = $('#email');
      $emailInput.on('blur',function(){
        var $email = $emailInput.val().trim();
        if($email==""){
            return;
        }else{
            $.get('anchor/check_anchor_email',{email:$email},function(result){
                if(result=='success'){
                    $emailInput.val('');
                    $emailInput.after("<p class='error-info'>邮箱重复，请重新输入！</p>");
                    alert("邮箱重复");
                    location.reload();

                }
            },'text');
        }
      });
  </script>
  <script>

    var $userInput = $('#username');
    $userInput.on('blur',function(){
      var $username = $userInput.val().trim();
        if($username==""){
            return;
        }else{
          $.get('anchor/check_anchor_username',{username:$username},function(result){
              if(result=='success'){
                  $userInput.val('');
                  $userInput.after("<p class='error-info'>用户名重复，请重新输入！</p>");
                  alert("用户名重复");
                  location.reload();
              }
          },'text');

        }

    });
  </script>

</body>
</html>
