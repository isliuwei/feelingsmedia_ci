<?php
    $aderInfo = $this -> session -> userdata('aderInfo');
    if(!$aderInfo){
        redirect('ader/ader_reg');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>feelngsmedia 慧灵思</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no" />
  <base href="<?php echo site_url(); ?>">
  <link rel="stylesheet" media="screen" href="css/bootstrap.min.css" />
	<link rel="stylesheet" media="screen" href="css/slogan-btn.css" />
  <!-- <link rel="stylesheet" type="text/css" href="css/slogan-default.css" /> -->
  <!-- <link rel="stylesheet" type="text/css" href="css/adaptive-modal.css" /> -->
  <link rel="stylesheet" type="text/css" href="css/slogan-style.css" />
  <link rel="stylesheet" type="text/css" href="css/slogan-4.css" />
  <style>

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
        <!-- <a href="index5.html" target="_blank">广告主公司名称</a> -->
        <!-- <img class="logo" alt="" src="img/favicon.ico"> -->
      </div>
      <nav class='collapse navbar-collapse' role='navigation'>
          <ul class='nav navbar-nav navbar-left'>
            <li><a href="ader/ader_index"><?php echo $aderInfo -> ader_companyName ; ?></a></li>
            <li class="active"><a href="#">媒体资源投放策略服务</a></li>
          </ul>

          <div class="label labe-tel"><i class="fa fa-phone"></i> <a class="a-tel" href="tel:4006668800">合作咨询：400-666-8800</a></div>

          <ul class='nav navbar-nav navbar-right'>
            <a class="btn btn-success navbar-btn login-btn" href="ader/anchor_need_profile">账号信息</a>
            <a class="btn btn-primary navbar-btn login-btn" href="ader/ader_setting?ader_id=<?php echo  $aderInfo -> ader_id ;?>">账号管理</a>
            <a class="btn btn-default navbar-btn login-btn" href="ader/logout">退出登录</a>
            <a class="btn navbar-btn js-login-btn" href="#">Register</a>

          </ul>
      </nav>
    </div>
  </header>




<div class="container">

  <div class="main clearfix slogan slogan1">
    <div class="circle">
      <h1>策略分析</h1>
      <p class="title">策略分析</p>
    </div>
    <!-- <div class="btns">
        <a href="#"
        data-toggle="adaptive-modal"
        data-title="
        <h1>策略分析</h1>
        <p>
          品牌形象：
        </p>
        <p>
          受众分析：
        </p>
        <p>
          传播规划：
        </p>
        <p>
          数据预估：
        </p>
        "
        >策略分析</a>
    </div> -->
  </div>

  <div class="main clearfix slogan slogan2">

    <div class="circle">
      <!-- <h1> -->
      <div class="slogan-text">
        <p>品牌形象</p>
        <p>受众分析</p>
        <p>传播规划</p>
        <p>数据预估</p>
      </div>

      <!-- </h1> -->
    </div>
    <!-- <div class="btns">
        <a href="#"
        data-toggle="adaptive-modal"
        data-title="
        <h1>内容策划</h1>
        <p>
          内容创意：
        </p>
        <p>
          话题策划：
        </p>
        <p>
          事件策划：
        </p>
        <p>
          执行策划：
        </p>
        "
        >内容策划</a>
    </div> -->
  </div>


  <div class="main clearfix slogan slogan3">

    <div class="circle">
      <!-- <h1>资源整合</h1> -->
      <div class="slogan-text">
        <p>品牌形象</p>
        <p>受众分析</p>
        <p>传播规划</p>
        <p>数据预估</p>
      </div>
    </div>
    <!-- <div class="btns">
        <a href="#"
        data-toggle="adaptive-modal"
        data-title="
        <h1>资源整合</h1>
        <p>
          直播平台：
        </p>
        <p>
          主播资源：
        </p>"
        >资源整合</a>
    </div> -->
  </div>


  <div class="main clearfix slogan slogan4">

    <div class="circle">
      <h1>渠道选择</h1>
      <p class="title">渠道选择</p>
    </div>
    <div class="btns">
        <a href="#"
        data-toggle="adaptive-modal"
        data-title="
        <h1>渠道选择</h1>
        <p>
          直播平台：
        </p>
        <p>
          主播资源：
        </p>"
        >资源整合</a>
    </div>
  </div>



</div>



<!-- <h1>资源整合 -->

<!-- </h1> -->











<script src="js/jquery-1.11.3.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/modernizr.custom.js"></script>
<script src="js/jquery.adaptive-modal.js"></script>
<script src="js/animitter.js"></script>
<script src="js/dat-gui.js"></script>
<script src="js/toxiclibs.js"></script>
<script src="js/slogan-4.js"></script>

</script>













</div>
</body>
</html>


</body>
</html>
