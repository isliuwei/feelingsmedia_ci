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
            <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">媒体公司信息编辑界面</strong> / <small>Updata Company</small></div>
        </div>

        <div class="am-tabs am-margin" data-am-tabs>
            <ul class="am-tabs-nav am-nav am-nav-tabs">
                
            </ul>

            <div class="am-tabs-bd">
                <div class="am-tab-panel am-fade am-in am-active" id="tab1">
<form class="am-form am-form-horizontal" action="admin/update_company_info" method="post" enctype="multipart/form-data">

<input name="company_id" type="hidden" value="<?php echo $company[0] -> company_id ;?>">

<div class="am-form-group">
    <label for="doc-ipt-3" class="am-u-sm-2 am-form-label">账户名</label>
    <div class="am-u-sm-10">
    <input  name="company_username" type="text" id="doc-ipt-3" value="<?php echo $company[0] -> company_username ;?>">
    </div>
</div>


<div class="am-form-group">
    <label for="doc-ipt-3" class="am-u-sm-2 am-form-label">邮箱</label>
    <div class="am-u-sm-10">
    <input  name="company_email" type="email" id="doc-ipt-3" value="<?php echo $company[0] -> company_email ;?>">
    </div>
</div>

<div class="am-form-group">
    <label for="doc-ipt-pwd-2" class="am-u-sm-2 am-form-label">密码</label>
    <div class="am-u-sm-10">
      <input name="company_password" type="text" id="doc-ipt-pwd-2" value="<?php echo $company[0] -> company_password ;?>">
    </div>
</div>

<div class="am-form-group">
    <label for="doc-ipt-3" class="am-u-sm-2 am-form-label">联系电话</label>
    <div class="am-u-sm-10">
      <input name="company_tel" type="number" id="doc-ipt-3" value="<?php echo $company[0] -> company_tel ;?>">
    </div>
</div>

<div class="am-form-group">
    <label for="doc-ipt-3" class="am-u-sm-2 am-form-label">公司名称</label>
    <div class="am-u-sm-10">
      <input name="company_name" type="text" id="doc-ipt-3" value="<?php echo $company[0] -> company_name ;?>">
    </div>
</div>

<div class="am-form-group">
    <label for="doc-ipt-3" class="am-u-sm-2 am-form-label">公司网址</label>
    <div class="am-u-sm-10">
      <input name="company_website" type="text" id="doc-ipt-3" value="<?php echo $company[0] -> company_website ;?>">
    </div>
</div>

<div class="am-form-group">
    <label for="doc-ipt-3" class="am-u-sm-2 am-form-label">资源类型<br><small>(已选)</small></label>
    <div class="am-u-sm-10">
    <?php
     
      foreach($cates as $cate){
    ?>
      <input name="resourceCate[]" checked="checked" type="checkbox" value="<?php echo $cate -> aderResourceCate_id; ?>" disabled>  <?php echo $cate -> aderResourceName ?>&nbsp;
    <?php
      }
    ?>
      
    </div>
</div>

<div class="am-form-group">
  <label for="doc-ipt-3" class="am-u-sm-2 am-form-label">资源类型<br><small>(重新选择)</small></label>
  <div class="am-u-sm-10">
      <input type="checkbox" name="resourceCate[]" value="1">  楼&nbsp;宇
      <input type="checkbox" name="resourceCate[]" value="2">  公&nbsp;交
      <input type="checkbox" name="resourceCate[]" value="3">  机&nbsp;场
      <input type="checkbox" name="resourceCate[]" value="4">  校&nbsp;园
      <input type="checkbox" name="resourceCate[]" value="5">  地&nbsp;铁
      <input type="checkbox" name="resourceCate[]" value="6">  院&nbsp;线
      <br>
      <input type="checkbox" name="resourceCate[]" value="7">  擎&nbsp;天&nbsp;柱
      <input type="checkbox" name="resourceCate[]" value="8">  自&nbsp;媒&nbsp;体
      <input type="checkbox" name="resourceCate[]" value="9">  户外楼体LED大屏
  </div>
</div>


<div class="am-form-group">
    <label for="doc-ipt-3" class="am-u-sm-2 am-form-label">资源分布城市<br><small>(已选)</small></label>
    <div class="am-u-sm-10">
    <?php
      if($citys){
      foreach($citys as $city){
    ?>
      <input name="resourceCity[]" checked="checked" type="checkbox" value="<?php echo $city -> aderCity_id; ?>" disabled>  <?php echo $city -> aderCity_name ?>&nbsp;
    <?php
      }}
    ?>
      
    </div>
</div>

<div class="am-form-group">
    <label for="doc-ipt-3" class="am-u-sm-2 am-form-label">资源分布城市<br><small>(重新选择)</small></label>
    <div class="am-u-sm-10">
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
        <br>
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
        <br>
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



  <!-- <div class="am-form-group">
    <label for="doc-ipt-3" class="am-u-sm-2 am-form-label">审核意见</label>
    <div class="am-u-sm-10">
      <input type="radio"  name="verify">  通过
      <input type="radio"  name="verify">  不通过
    </div>
  </div> -->


  <div class="am-form-group">
    <div class="am-u-sm-10 am-u-sm-offset-2">
      <button type="submit" class="am-btn am-btn-success">保存更改</button>
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
<script src="js/icheck.js"></script>
<script>
    $('input').iCheck({ checkboxClass: 'icheckbox_square-blue', radioClass: 'iradio_square-blue', increaseArea: '20%'  });
</script>





</body>
</html>
