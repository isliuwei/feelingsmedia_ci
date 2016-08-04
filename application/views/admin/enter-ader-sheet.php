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
    <link rel="stylesheet" href="css/blue.css">
    <style>
    .icheckbox_square-blue{
      width: 24px;
      height: 24px;
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
            <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">广告主信息录入界面</strong> / <small>Add Ader</small></div>
        </div>

        <div class="am-tabs am-margin" data-am-tabs>
            <ul class="am-tabs-nav am-nav am-nav-tabs">
                
            </ul>

            <div class="am-tabs-bd">
                <div class="am-tab-panel am-fade am-in am-active" id="tab1">
<form class="am-form am-form-horizontal" action="admin/save_enter_ader_info" method="post">
<input type="hidden" value="1" name="isEnter">


  <div class="am-form-group">
    <label for="doc-ipt-3" class="am-u-sm-2 am-form-label">账户名</label>
    <div class="am-u-sm-10">
      <input name="ader_username" type="text" id="doc-ipt-3">
    </div>
  </div>

  <div class="am-form-group">
    <label for="doc-ipt-pwd-2" class="am-u-sm-2 am-form-label">密码</label>
    <div class="am-u-sm-10">
      <input name="ader_password" type="text" id="doc-ipt-pwd-2">
    </div>
  </div>


  <div class="am-form-group">
    <label for="doc-ipt-3" class="am-u-sm-2 am-form-label">邮箱</label>
    <div class="am-u-sm-10">
      <input name="ader_email" type="email" id="doc-ipt-3">
    </div>
  </div>

  <div class="am-form-group">
    <label for="doc-ipt-3" class="am-u-sm-2 am-form-label">电话</label>
    <div class="am-u-sm-10">
      <input name="ader_tel" type="number" id="doc-ipt-3">
    </div>
  </div>

   <div class="am-form-group">
    <label for="doc-ipt-3" class="am-u-sm-2 am-form-label">公司名称</label>
    <div class="am-u-sm-10">
      <input name="ader_companyName" type="text" id="doc-ipt-3">
    </div>
  </div>


  <div class="am-form-group">
    <label for="doc-ipt-3" class="am-u-sm-2 am-form-label">公司网站</label>
    <div class="am-u-sm-10">
      <input name="ader_website" type="text" id="doc-ipt-3">
    </div>
  </div>

  

  

 

  <!-- <div class="am-form-group">
    <label for="doc-ipt-3" class="am-u-sm-2 am-form-label">审核意见</label>
    <div class="am-u-sm-10">
      <input type="radio"  name="verify">  通过
      <input type="radio"  name="verify">  不通过
    </div>
  </div> -->


  <div class="am-form-group">
    <div class="am-u-sm-10 am-u-sm-offset-2">
      <button type="submit" class="am-btn am-btn-success">保存添加</button>
    </div>
  </div>
</form>
</div>



</div>
</div>


</div>
   

</div>

<a href="#" class="am-icon-btn am-icon-th-list am-show-sm-only admin-menu" data-am-offcanvas="{target: '#admin-offcanvas'}"></a>


<button
	id="alert"
  type="button"
  class="am-btn am-btn-primary"
  data-am-modal="{target: '#my-alert'}">
  Alert
</button>

<div class="am-modal am-modal-alert" tabindex="-1" id="my-alert">
  <div class="am-modal-dialog">
    <div class="am-modal-hd">Amaze UI</div>
    <div class="am-modal-bd">
      Hello world！
    </div>
    <div class="am-modal-footer">
      <span class="am-modal-btn">确定</span>
    </div>
  </div>
</div>

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
