<!DOCTYPE html>
<html lang="en" ng-app="myApp">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <base href="<?php echo site_url(); ?>">
  <title>媒体资源公司账号信息管理</title>
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/font-awesome.min.css">
  <link rel="stylesheet" href="css/company-setting.css">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/blue.css">
  <style>
      .a-tel{
        text-decoration: none;
        color: #337ab7;

      }
      .fa-exclamation-circle{
      color: #f00;
    }
  </style>

</head>
<body>


  <!-- <div id="header" class="main-wrap">
      <h2 class="title">首&nbsp;&nbsp;&nbsp;&nbsp;页</h2>
      <div class="form-btn">
        <span><a href="#">登&nbsp;&nbsp;&nbsp;&nbsp;录</a></span>
        <span><a href="#">注&nbsp;&nbsp;&nbsp;&nbsp;册</a></span>
      </div>


  </div> -->

  <header class='navbar navbar-default navbar-fixed-top' id='main-navbar' role='banner'>
		<div class='container-fluid'>
			<div class='navbar-header'>
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
	      </button>
        <!-- <a href="index5.html" target="_blank">广告主公司名称</a> -->
			  <!-- <img class="logo" alt="" src="img/favicon.ico"> -->
			</div>
			<nav class='collapse navbar-collapse' role='navigation'>
			  <ul class='nav navbar-nav navbar-left'>
<!--			    <li><a href="index5.html" target="_blank">媒体咨询公司名称</a></li>-->


            <li><a href="company/company_need_list"><?php echo $companyInfo -> company_name;?></a></li>
			      <li class="active"><a href="javascript:;">账号管理</a></li>
			  </ul>

        <div class="label labe-tel"><i class="fa fa-phone"></i> <a class="a-tel" href="tel:4006668800">合作咨询：400-666-8800</a></div>

        <ul class='nav navbar-nav navbar-right'>
        <a class="btn btn-success navbar-btn login-btn"  href="company/company_need_profile">账号信息</a>
        <a class="btn btn-danger navbar-btn login-btn" data-toggle="modal" data-target="#newPassword">修改密码</a>
        <a class="btn btn-default navbar-btn login-btn"  href="company/login_out">退出登录</a>

        <a class="btn navbar-btn js-login-btn" href="#">Register</a>

        </ul>
			</nav>
		</div>
	</header>

  <div class="container main-wrap">
    <h2 class="title">媒体咨询公司信息管理</h2>
    <div class="row" ng-controller="updateFormController">


      <form action="company/update_company_info" class="form-horizontal col-md-9 col-md-offset-1" name="updateForm"  method="post">
      <input type="hidden" name="company_id" value="<?php echo $this -> uri -> segment(3); ?>">



        <div class="form-group">
          <blockquote>
          <p>如果需要更改资源信息，请与客服联系</p>
          <footer>客服电话：<a href="tel:400-8800-8800">400-8800-8800</a> <cite title="Source Title">feelingsmedie.com</cite></footer>
          </blockquote>

        </div>


        <div class="form-group">
          <label for="tel" class="col-sm-2 control-label">联系方式</label>
          <div class="col-sm-10">
            <input type="number" class="form-control" name="tel" id="tel" placeholder="请输入联系人手机号" value="<?php echo $companyInfo -> company_tel ;?>">
          </div>
        </div>


        <div class="form-group">
          <label for="email" class="col-sm-2 control-label">邮箱</label>
          <div class="col-sm-10">
            <input type="email" class="form-control" id="email" name="email" placeholder="请输入邮箱地址" value="<?php echo $companyInfo -> company_email ;?>">
          </div>
        </div>


        <div class="form-group">
            <label for="captcha" class="col-sm-2 control-label">验证码</label>
            <div class="col-sm-10">
              <input
                type="number"
                class="form-control"
                id="captcha"
                placeholder="请输验证码"
                name="captcha"
                ng-model="updateInfo.captcha"
                ng-class="{
                  'error': updateForm.captcha.$invalid && updateForm.captcha.$touched,
                  'success':updateForm.captcha.$valid }"
                compare="updateInfo.captcha_ci"
                required
                >

                <input
                  id="captcha_ci"
                  type="hidden"
                  name="captcha_ci"
                  ng-model="updateInfo.captcha_ci"
                  class="form-control col-md-2"
                  ng-model="updateForm.captcha_ci"
                  >

              <img id="captcha-img" src="captcha/<?php echo $codeinfo['time']; ?>.jpg" alt="">
              <span id="captcha-tip"><a href="javascript:;"> <i class="fa fa-refresh"></i> 看不清?换一张</a></span>
              <p
                class="error-info"
                ng-if="updateForm.captcha.$error.compare && updateForm.captcha.$touched">
                验证码输入错误</p>
           </div >
        </div>

        <div class="form-group">
          <div class="col-sm-offset-2 col-sm-4">
            <button type="submit" class="btn btn-success btn-lg btn-block" ng-disabled="updateForm.$invalid">完成提交</button>
          </div>
        </div>
    </form>



    </div>
  </div>


<div class="modal fade" id="newPassword" tabindex="-1" role="dialog" aria-labelledby="newPasswordLabel" ng-controller="passwordFormController">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="newPasswordLabel"><i class="fa fa-exclamation-circle"></i> 修改密码</h4>
        </div>
        <div class="modal-body">
          <form action="company/update_password" method="post" name="passwordForm">
            <input type="hidden" name="company_id" value="<?php echo $this -> uri -> segment(3); ?>">
            <div class="form-group">
              <label for="old-password" class="control-label"><i class="fa fa-key"></i>请输入当前密码</label>
              <input
                name="oldPassword"
                ng-model="passwordInfo.oldPassword"
                type="text"
                class="form-control"
                id="old-password"
                placeholder="密码由6-22位数字或字母组成"
                required
                ng-class="{
                  'error': passwordForm.oldPassword.$invalid && passwordForm.oldPassword.$touched,
                  'success':passwordForm.oldPassword.$valid }"
                >
            </div>
            <div class="form-group">
              <label for="new-password" class="control-label"><i class="fa fa-unlock-alt"></i> 请输入新密码</label>
              <input
                ng-minlength="6"
                ng-maxlength="22"
                name="newPassword"
                ng-pattern="/^[A-Za-z0-9]+$/"
                ng-model="passwordInfo.newPassword"
                type="text"
                class="form-control"
                id="new-password"
                placeholder="密码由6-22位数字或字母组成"
                required
                ng-class="{
                  'error': passwordForm.newPassword.$invalid && passwordForm.newPassword.$touched,
                  'success':passwordForm.newPassword.$valid }"
                >
                <p
                  class="error-info"
                  ng-if="passwordForm.newPassword.$error.required && passwordForm.newPassword.$touched">
                  <i class="fa fa-exclamation"></i> 输入密码不能为空</p>
                <p
                  class="error-info"
                  ng-if="(passwordForm.newPassword.$error.minlength || passwordForm.newPassword.$error.maxlength) && passwordForm.newPassword.$touched">
                  <i class="fa fa-exclamation"></i> 输入密码长度不合法,密码长度6-22位</p>
                <p
                  class="error-info"
                  ng-if="passwordForm.newPassword.$error.pattern && passwordForm.newPassword.$touched">
                  <i class="fa fa-exclamation"></i> 密码含有非法字符，密码由数字或字母组成</p>
            </div>
            <div class="form-group">
              <label for="new-password1" class="control-label"><i class="fa fa-unlock"></i> 确认新密码</label>
              <input
                ng-minlength="6"
                ng-maxlength="22"
                ng-pattern="/^[A-Za-z0-9]+$/"
                name="newPassword1"
                ng-model="passwordInfo.newPassword1"
                type="text"
                class="form-control"
                id="new-password1"
                placeholder="请再输入一遍新密码"
                required
                ng-class="{
                  'error': passwordForm.newPassword1.$invalid && passwordForm.newPassword1.$touched,
                  'success':passwordForm.newPassword1.$valid }"
                compare="passwordInfo.newPassword"
                >
                <p
                  class="error-info"
                  ng-if="passwordForm.newPassword1.$error.required && passwordForm.newPassword1.$touched">
                  <i class="fa fa-exclamation"></i> 输入密码不能为空</p>
                <p
                  class="error-info"
                  ng-if="(passwordForm.newPassword1.$error.minlength || passwordForm.newPassword1.$error.maxlength) && passwordForm.newPassword1.$touched">
                  <i class="fa fa-exclamation"></i> 输入密码长度不合法,密码长度6-22位</p>
                <p
                  class="error-info"
                  ng-if="passwordForm.newPassword1.$error.pattern && passwordForm.newPassword1.$touched">
                  <i class="fa fa-exclamation"></i> 密码含有非法字符，密码由数字或字母组成</p>
                <p
                  class="error-info"
                  ng-if="passwordForm.newPassword1.$error.compare && passwordForm.newPassword1.$touched">
                  <i class="fa fa-exclamation"></i> 两次密码输入不一致</p>
            </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">放弃修改</button>
          <button type="submit" class="btn btn-success" ng-disabled="passwordForm.$invalid">确认修改</button>
        </div>
        </form>
      </div>
    </div>
  </div>


<script src="js/jquery-1.11.3.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/angular.js"></script>
<script src="js/icheck.js"></script>
<script src="js/company-setting.js"></script>
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
                      $emailInput.val("");
                      //location.reload();
                  }
              },"text");
          }
      })
  </script>
  <script>
    var $pwdInput = $('#old-password');
      $pwdInput.on('blur',function(){
        var $oldPwd = $pwdInput.val().trim();
          if($oldPwd==""){
              return;
          }else{
            $.get('company/check_password',{'oldPassword':$oldPwd},function(res){
              if(res=='true'){
                alert('密码验证成功！');
              }else{
                $pwdInput.after("<p class='error-info'>密码验证失败！请重新输入！</p>");
                setTimeout(function(){location.reload()},2000);
              }
            },'text');

          }

  });
  </script>



</body>
</html>
