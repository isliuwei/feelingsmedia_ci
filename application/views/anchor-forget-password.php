<!DOCTYPE html>
<html lang="en" ng-app>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>找回密码</title>
  <base href="<?php echo site_url(); ?>">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/font-awesome.min.css">
  <link rel="stylesheet" href="css/ader-setting.css">
  <link rel="stylesheet" href="css/style.css">
  <style>
    .a-tel{
      color: #337ab7;
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

			</div>
			<nav class='collapse navbar-collapse' role='navigation'>
			  <ul class='nav navbar-nav navbar-left'>
			    <li><a href="index5.html" target="_blank"></a></li>
			    <li class="active"><a href="#">找回密码</a></li>
			  </ul>

        <div class="label labe-tel"><i class="fa fa-phone"></i> <a class="a-tel" href="tel:4006668800">合作咨询：400-666-8800</a></div>

        <!-- <ul class='nav navbar-nav navbar-right'>
        <a class="btn btn-success navbar-btn login-btn" data-toggle="modal" >账号信息</a>
        <a class="btn btn-primary navbar-btn login-btn" data-toggle="modal"  href="#">账号管理</a>
        <a class="btn btn-default navbar-btn login-btn" data-toggle="modal"  href="#">退出登录</a>

        <a class="btn navbar-btn js-login-btn" href="#">Register</a>

        </ul> -->
			</nav>
		</div>
	</header>

  <div class="container">
    <h2 class="title">找回密码</h2>
    <div class="row">

      <form action="anchor/find_password" method="post" class="form-horizontal col-md-9 col-md-offset-1" name="findForm">

        <div class="form-group">
          <blockquote>
          <p>输入用户名和邮箱找回密码,如果忘记请联系客服</p>
          <footer>客服电话：<a href="tel:400-8800-8800">400-8800-8800</a> <cite title="Source Title">feelingsmedie.com</cite></footer>
          </blockquote>
        </div>

        <div class="form-group">
          <label for="tel" class="col-sm-2 control-label">用户名</label>
          <div class="col-sm-6">
            <input
              type="text"
              name="username"
              class="form-control"
              id="username"
              placeholder="请输入正确的用户名"
              ng-model="userdata.username"
              required>
          </div>
        </div>




        <div class="form-group">
          <label for="email" class="col-sm-2 control-label">邮箱</label>
          <div class="col-sm-6">
            <input
              type="email"
              name="email"
              class="form-control"
              id="email"
              placeholder="请输入正确的邮箱地址"
              ng-model="userdata.email"
              required>
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-offset-2 col-sm-4">
            <button type="submit" class="btn btn-success btn-lg btn-block" ng-disabled="findForm.$invalid"><i class="fa fa-envelope-o"></i> 发送验证邮件</button>
          </div>
        </div>
      </form>



    </div>
  </div>


  <script src="js/jquery-1.11.3.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/angular.js"></script>
  <script>
  var $userInput = $('#username');
  $userInput.on('blur',function(){
    var $username = $userInput.val().trim();
      if($username==""){
          return;
      }else{
        $.get('anchor/check_anchor_username',{username:$username},function(result){
            if(result=='fail'){
                $userInput.val('');
                alert("用户名不存在,请检查您的用户名！");
                location.reload();
            }
        },'text');

      }

  });


  // var $emailInput = $('#email');
  // $emailInput.on('blur',function(){
  //   var $email = $emailInput.val().trim();
  //   if($email==""){
  //       return;
  //   }else{
  //       $.get('ader/check_ader_email',{email:$email},function(result){
  //           if(result=='fail'){
  //               $emailInput.val('');
  //               alert("邮箱地址不存在,请检查您的邮箱地址！");
  //           }
  //       },'text');
  //   }
  // });


  </script>

</body>
</html>
