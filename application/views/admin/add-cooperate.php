<!doctype html>
<html class="no-js">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>feelingsmedia后台管理</title>
  <meta name="description" content="这是一个form页面">
  <meta name="keywords" content="form">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
  <meta name="renderer" content="webkit">
  <meta http-equiv="Cache-Control" content="no-siteapp" />
  <base href="<?php echo site_url();?>">
  <link rel="icon" type="image/png" href="assets/i/favicon.png">
  <link rel="apple-touch-icon-precomposed" href="assets/i/app-icon72x72@2x.png">
  <meta name="apple-mobile-web-app-title" content="Amaze UI" />
  <link rel="stylesheet" href="assets/css/amazeui.min.css"/>
  <link rel="stylesheet" href="assets/css/admin.css">
  <style>
    .am-reset{
      visibility: hidden;
    }
  </style>
</head>
<body>
<!--[if lte IE 9]>
<p class="browsehappy">你正在使用<strong>过时</strong>的浏览器，Amaze UI 暂不支持。 请 <a href="http://browsehappy.com/" target="_blank">升级浏览器</a>
  以获得更好的体验！</p>
<![endif]-->


<?php include 'admin-header.php'; ?>

<div class="am-cf admin-main">
  <!-- sidebar start -->
  <?php include 'admin-sidebar.php'; ?>
  <!-- sidebar end -->

<!-- content start -->
<div class="admin-content">

  <div class="am-cf am-padding">
    <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">新增合作信息界面</strong> / <small>Add Cooperate</small></div>
  </div>

  <div class="am-tabs am-margin" data-am-tabs>
    <ul class="am-tabs-nav am-nav am-nav-tabs">
     
     
    </ul>

    <div class="am-tabs-bd">
      

      <div class="am-tab-panel am-fade am-in am-active" id="tab1">
        <form action="admin/save_cooperate" method="post" class="am-form am-form-inline">

          <input type="hidden" name="cooperate_id" value="<?php echo $this -> uri -> segment(3);?>">
          <div class="am-g am-margin-top">
            <div class="am-u-sm-4 am-u-md-2 am-text-right">客&nbsp;户&nbsp;公&nbsp;司</div>
            <div class="am-u-sm-8 am-u-md-4 am-u-end">
              <input type="text" name="cooperate_company" >
            </div>
          </div>

          <div class="am-g am-margin-top">
            <div class="am-u-sm-4 am-u-md-2 am-text-right">合&nbsp;作&nbsp;资&nbsp;源</div>
            <div class="am-u-sm-8 am-u-md-4 am-u-end">
              <input  type="text" name="cooperate_resource">
            </div>
          </div>

          <div class="am-g am-margin-top">
            <div class="am-u-sm-4 am-u-md-2 am-text-right">投&nbsp;放&nbsp;地&nbsp;域</div>
            <div class="am-u-sm-8 am-u-md-4 am-u-end">
              <input  type="text" name="cooperate_region">
            </div>
          </div>

          <div class="am-g am-margin-top">
            <div class="am-u-sm-4 am-u-md-2 am-text-right">合&nbsp;作&nbsp;总&nbsp;额</div>
            <div class="am-u-sm-8 am-u-md-4 am-u-end">
              <input  type="text" name="cooperate_bud">
            </div>
          </div>

          <div class="am-g am-margin-top">
            <div class="am-u-sm-4 am-u-md-2 am-text-right">合&nbsp;作&nbsp;时&nbsp;间</div>
            <div class="am-u-sm-8 am-u-md-4 am-u-end">
              <input  type="text" name="cooperate_time">
            </div>
          </div>

          

          

          <div class="am-margin">
            <input type="reset" class="am-btn am-btn-primary am-btn-xs am-reset" value="重置">
            <input type="submit" class="am-btn am-btn-primary am-btn-xs" value="提交保存">
            <button type="button" class="am-btn am-btn-primary am-btn-xs">放弃保存</button>
          </div>

        </form>
      </div>

      



    </div>
  </div>





</div>
<!-- content end -->

</div>

<a href="#" class="am-icon-btn am-icon-th-list am-show-sm-only admin-menu" data-am-offcanvas="{target: '#admin-offcanvas'}"></a>

<footer>
  <hr>
  <p class="am-padding-left">© 2014 AllMobilize, Inc. Licensed under MIT license.</p>
</footer>




<!--[if lt IE 9]>
<script src="http://libs.baidu.com/jquery/1.11.1/jquery.min.js"></script>
<script src="http://cdn.staticfile.org/modernizr/2.8.3/modernizr.js"></script>
<script src="assets/js/amazeui.ie8polyfill.min.js"></script>
<![endif]-->

<!--[if (gte IE 9)|!(IE)]><!-->
<script src="assets/js/jquery.min.js"></script>
<!--<![endif]-->
<script src="assets/js/amazeui.min.js"></script>
<script src="assets/js/app.js"></script>






</body>
</html>
