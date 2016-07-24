<!DOCTYPE html>
<html lang="en" ng-app="myApp">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>广告主账号信息管理</title>
  <base href="<?php echo site_url(); ?>">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/font-awesome.min.css">
  <link rel="stylesheet" href="css/ader-setting.css">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/blue.css">
  <style>
    .a-tel{
      color: #337ab7;
      text-decoration: none;
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
			    <li><a href="index5.html" target="_blank"><?php echo $aderInfo -> ader_companyName ; ?></a></li>
			    <li class="active"><a href="#">账号管理</a></li>
			  </ul>

        <div class="label labe-tel"><i class="fa fa-phone"></i> <a class="a-tel" href="tel:4006668800">合作咨询：400-666-8800</a></div>

        <ul class='nav navbar-nav navbar-right'>
        <a class="btn btn-success navbar-btn login-btn" data-toggle="modal" >账号信息</a>
        <a class="btn btn-primary navbar-btn login-btn" data-toggle="modal"  href="ader/ader_setting?ader_id=<?php echo  $aderInfo -> ader_id ;?>">账号管理</a>
        <a class="btn btn-default navbar-btn login-btn" data-toggle="modal"  href="ader/logout">退出登录</a>

        <a class="btn navbar-btn js-login-btn" href="#">Register</a>

        </ul>
			</nav>
		</div>
	</header>

  <div class="container">
    <h2 class="title">广告主账号信息管理</h2>
    <div class="row" ng-controller="updateFormController">

      <form action="ader/update_ader_info" method="post" class="form-horizontal col-md-9 col-md-offset-1" name="updateForm">
        <div class="form-group">
          <!-- ng-submit="updateInfo() -->
          <input type="hidden" name="ader_id" value="<?php echo $this -> input -> get('ader_id') ?>">
          <label for="tel" class="col-sm-2 control-label">联系方式</label>
          <div class="col-sm-10">
            <input type="text" name="tel"  class="form-control" id="tel" placeholder="请输入联系人手机号" value="<?php echo $aderInfo -> ader_tel ?>">
          </div>
        </div>


        <div class="form-group">
          <label for="email" class="col-sm-2 control-label">邮箱</label>
          <div class="col-sm-10">
            <input type="email" name="email"  class="form-control" id="email" placeholder="请输入邮箱地址" value="<?php echo $aderInfo -> ader_email ?>">
          </div>
        </div>


        <div class="form-group">
            <label for="captcha" class="col-sm-2 control-label">验证码</label>
            <div class="col-sm-10">
              <input
                type="text"
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
              <span id="captcha-tip"><a href="javascript:;"> <i class="fa fa-refresh"></i> 看不清？换一张</a></span>
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


  <script src="js/jquery-1.11.3.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/angular.js"></script>
  <script src="js/icheck.js"></script>
  <script src="js/ader-setting.js"></script>
<script>
  $('input').iCheck({ checkboxClass: 'icheckbox_square-blue', radioClass: 'iradio_square-blue', increaseArea: '20%'  });
</script>
<!-- <script src="js/animitter.js"></script>
<script src="js/dat-gui.js"></script>
<script src="js/toxiclibs.js"></script>
<script src="js/slogan-4.js"></script> -->
</body>
</html>
