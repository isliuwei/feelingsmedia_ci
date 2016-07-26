<?php
    $aderInfo = $this -> session -> userdata('aderInfo');
    if(!$aderInfo){
        redirect('ader/ader_reg');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <base href="<?php echo site_url(); ?>">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/ader-index.css">
  <title>广告主主页</title>

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
        <!-- <a href="index5.html" target="_blank">广告主公司名称</a> -->
			  <!-- <img class="logo" alt="" src="img/favicon.ico"> -->
			</div>
			<nav class='collapse navbar-collapse' role='navigation'>
			  <ul class='nav navbar-nav navbar-left'>
			    <li><a href="ader/ader_index"><?php echo $aderInfo -> ader_companyName ; ?></a></li>
			    <li class="active"><a href="#">账号信息</a></li>
			  </ul>

        <div class="label labe-tel"><i class="fa fa-phone"></i> <a class="a-tel" href="tel:4006668800">合作咨询：400-666-8800</a></div>

        <ul class='nav navbar-nav navbar-right'>
        <a class="btn btn-success navbar-btn login-btn"  href="ader/anchor_need_profile">账号信息</a>
        <a class="btn btn-primary navbar-btn login-btn"  href="ader/ader_setting?ader_id=<?php echo  $aderInfo -> ader_id ;?>">账号管理</a>
        <a class="btn btn-default navbar-btn login-btn" href="ader/logout">退出登录</a>

        <a class="btn navbar-btn js-login-btn" href="#">Register</a>

        </ul>
			</nav>
		</div>
	</header>
<div id="gcontainer">
	<div class="header">
		<a class="first"></a>
		<h3 class="tel"></h3>
		<div class="menu">
			<a href="#"></a>
			<a href="#"></a>
			<a href="#"></a>
		</div>
	</div>
	<div class="content">
		<div class="left">
			<div class="list source">平台主播资源</div>
			<div class="list service">直播内容策划服务</div>
			<div class="list need"><a href="ader/anchor_need">发布主播需求</a></div>
		</div>
		<div class="right">
			<div class="list source">媒体资源服务</div>
			<div class="list service">媒体资源投放策略服务</div>
			<div class="list need">发布媒体资源需求</div>
		</div>
	</div>
</div>



<script src="js/jquery-1.11.3.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>
