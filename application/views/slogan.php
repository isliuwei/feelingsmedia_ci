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
  <link rel="stylesheet" type="text/css" href="css/slogan-default1.css" />
  <link rel="stylesheet" type="text/css" href="css/slogan-style.css" />
  <link rel="stylesheet" media="screen" href="css/slogan-btn.css" />
  <link rel="stylesheet" type="text/css" href="css/slogan-4.css" />
  <style>

    .body--ready{
      background: -webkit-linear-gradient(top, rgb(203, 235, 219) 0%, rgb(55, 148, 192) 120%);
    background: -moz-linear-gradient(top, rgb(203, 235, 219) 0%, rgb(55, 148, 192) 120%);
    background: -o-linear-gradient(top, rgb(203, 235, 219) 0%, rgb(55, 148, 192) 120%);
    background: -ms-linear-gradient(top, rgb(203, 235, 219) 0%, rgb(55, 148, 192) 120%);
    background: linear-gradient(top, rgb(203, 235, 219) 0%, rgb(55, 148, 192) 120%);
    }
    .help
      {
        display: none;
      }
  </style>

</head>
<body class="body--ready">

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
            <li class="active"><a href="#">直播策划合作</a></li>
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




<div style="text-align:center;clear:both;position:absolute;top:0;left:260px">
<script src="/gg_bd_ad_720x90.js" type="text/javascript"></script>
<script src="/follow.js" type="text/javascript"></script>
</div>
<canvas class="canvas"></canvas>

<div class="help">?</div>

<div class="ui">
  <input class="ui-input" type="hidden" />
</div>

<div class="overlay">
  <div class="tabs">
    <div class="tabs-labels"><span class="tabs-label"></span><span class="tabs-label"></span><span class="tabs-label"></span></div>

    <div class="tabs-panels">
      <ul class="tabs-panel commands">
        
      </ul>

      <div class="tabs-panel ui-details">
        <div class="ui-details-content">
          
        </div>
      </div>

      <div class="tabs-panel ui-share">
        
      </div>
    </div>
  </div>
</div>

  <script src="js/canvas.js"></script>











<script src="js/jquery-1.11.3.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/modernizr.custom.js"></script>
<script src="js/jquery.adaptive-modal.js"></script>










</div>
</body>
</html>


</body>
</html>
