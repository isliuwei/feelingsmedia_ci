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
            <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">主播信息录入界面</strong> / <small>Add Anchor</small></div>
        </div>

        <div class="am-tabs am-margin" data-am-tabs>
            <ul class="am-tabs-nav am-nav am-nav-tabs">
                
            </ul>

            <div class="am-tabs-bd">
                <div class="am-tab-panel am-fade am-in am-active" id="tab1">
<form class="am-form am-form-horizontal" action="admin/save_enter_anchor_info" method="post" enctype="multipart/form-data">

<input type="hidden" value="1" name="isEnter">

<div class="am-form-group">
    <label for="doc-ipt-3" class="am-u-sm-2 am-form-label">真实姓名</label>
    <div class="am-u-sm-10">
    <input  name="anchor_name" type="text" id="doc-ipt-3">
    </div>
</div>

<div class="am-form-group">
      <label for="doc-ipt-3" class="am-u-sm-2 am-form-label">性别</label>
      <div class="am-u-sm-2">
      <select id="doc-select-1" name="anchor_gender">
        <option value="option1">请选择</option>
        <option value="男" >男</option>
        <option value="女" >女</option>
      </select>
      </div>
      <span class="am-form-caret"></span>
    </div>

  <div class="am-form-group">
    <label for="doc-ipt-3" class="am-u-sm-2 am-form-label">账户名</label>
    <div class="am-u-sm-10">
      <input name="anchor_username" type="text" id="doc-ipt-3">
    </div>
  </div>

  <div class="am-form-group">
    <label for="doc-ipt-pwd-2" class="am-u-sm-2 am-form-label">密码</label>
    <div class="am-u-sm-10">
      <input name="anchor_password" type="text" id="doc-ipt-pwd-2">
    </div>
  </div>



<div class="am-g am-margin-top">
    <label class="am-u-sm-4 am-u-md-2 am-text-right am-form-label">用户头像</label>
    <div class="am-u-sm-8 am-u-md-4 am-u-end">
        <!--              文件上传-->
        <div class="am-form-group am-form-file">
            <button type="button" class="am-btn am-btn-danger am-btn-sm">
                <i class="am-icon-cloud-upload"></i> 选择新的头像文件</button>
            <input id="doc-form-file" type="file" multiple name="anchor_photo">
            <!--图片预览-->
            <br/>
            <small class="am-badge am-badge-success am-radius">预览图</small>
            <div id="imgdiv"><img id="imgShow" width="50%" height="50%" /></div>
            <!--图片预览-->
        </div>
        <div id="file-list"></div>
        <!--              文件上传-->
    </div>
</div>

  <div class="am-form-group">
    <label for="doc-ipt-3" class="am-u-sm-2 am-form-label">直播平台</label>
    <div class="am-u-sm-10">
      <input name="anchor_platformName" type="text" id="doc-ipt-3">
    </div>
  </div>

  <div class="am-form-group">
    <label for="doc-ipt-3" class="am-u-sm-2 am-form-label">直播ID</label>
    <div class="am-u-sm-10">
      <input name="anchor_platformID" type="text" id="doc-ipt-3">
    </div>
  </div>

  <div class="am-form-group">
    <label for="doc-ipt-3" class="am-u-sm-2 am-form-label">直播昵称</label>
    <div class="am-u-sm-10">
      <input name="anchor_platformNickname"  type="text" id="doc-ipt-3">
    </div>
  </div>

  <div class="am-form-group">
    <label for="doc-ipt-3" class="am-u-sm-2 am-form-label">联系方式</label>
    <div class="am-u-sm-10">
      <input name="anchor_tel" type="number" id="doc-ipt-3">
    </div>
  </div>

  <div class="am-form-group">
    <label for="doc-ipt-3" class="am-u-sm-2 am-form-label">邮箱</label>
    <div class="am-u-sm-10">
      <input name="anchor_email" type="email" id="doc-ipt-3">
    </div>
  </div>

  

  <div class="am-form-group">
    <label for="doc-ipt-3" class="am-u-sm-2 am-form-label">粉丝数</label>
    <div class="am-u-sm-10">
      <input name="anchor_fansNumber" type="text" id="doc-ipt-3">
    </div>
  </div>

  <div class="am-form-group">
    <label for="doc-ipt-3" class="am-u-sm-2 am-form-label">QQ账号</label>
    <div class="am-u-sm-10">
      <input name="anchor_qqNum"  type="number" id="doc-ipt-3">
    </div>
  </div>

  <div class="am-form-group">
    <label for="doc-ipt-3" class="am-u-sm-2 am-form-label">银行卡号</label>
    <div class="am-u-sm-10">
      <input name="anchor_bankAccount" type="number" id="doc-ipt-3">
    </div>
  </div>

  <div class="am-form-group">
      <label for="doc-ipt-3" class="am-u-sm-2 am-form-label">主播性质</label>
      <div class="am-u-sm-3">
      <select id="doc-select-1" name="anchor_attr">
        <option value="请选择">请选择</option>
        <option value="公会主播">公会主播</option>
        <option value="个人主播">个人主播</option>
      </select>
      </div>
      <span class="am-form-caret"></span>
    </div>

    <div class="am-form-group">
      <label for="doc-ipt-3" class="am-u-sm-2 am-form-label">地域</label>
      <div class="am-u-sm-3">
      <select id="doc-select-1" name="anchor_region">
        <option value="">请选择</option>
        <option value="中国大陆">中国大陆</option>
        <option value="中国香港">中国香港</option>
        <option value="中国澳门">中国澳门</option>
        <option value="中国台湾">中国台湾</option>
      </select>
      </div>

      <div class="am-u-sm-3">
      <select id="doc-select-1" name="anchor_province">
        <option  value="">请选择</option>
            <option value="">请选择</option>
              <option value="北京市">北京市</option>
              <option value="天津市">天津市</option>
              <option value="河北省">河北省</option>
              <option value="山西省">山西省</option>
              <option value="内蒙古自治区">内蒙古自治区</option>
              <option value="辽宁省">辽宁省</option>
              <option value="吉林省">吉林省</option>
              <option value="黑龙江省">黑龙江省</option>
              <option value="上海市">上海市</option>
              <option value="江苏省">江苏省</option>
              <option value="浙江省">浙江省</option>
              <option value="安徽省">安徽省</option>
              <option value="福建省">福建省</option>
              <option value="江西省">江西省</option>
              <option value="山东省">山东省</option>
              <option value="河南省">河南省</option>
              <option value="湖北省">湖北省</option>
              <option value="湖南省">湖南省</option>
              <option value="广东省">广东省</option>
              <option value="广西壮族自治区">广西壮族自治区</option>
              <option value="海南省">海南省</option>
              <option value="重庆市">重庆市</option>
              <option value="四川省">四川省</option>
              <option value="贵州省">贵州省</option>
              <option value="云南省">云南省</option>
              <option value="西藏自治区">西藏自治区</option>
              <option value="陕西省">陕西省</option>
              <option value="甘肃省">甘肃省</option>
              <option value="青海省">青海省</option>
              <option value="宁夏回族自治区">宁夏回族自治区</option>
              <option value="新疆维吾尔自治区">新疆维吾尔自治区</option>
              <option value="香港特别行政区">香港特别行政区</option>
              <option value="澳门特别行政区">澳门特别行政区</option>
              <option value="台湾">台湾</option>
      </select>
      </div>
      <span class="am-form-caret"></span>
    </div>


  <div class="am-form-group">
    <label for="doc-ipt-3" class="am-u-sm-2 am-form-label">账号类别</label>
    <div class="am-u-sm-10">
      <input type="checkbox" value="1" name="cate[]">  体&nbsp;育
      <input type="checkbox" value="2" name="cate[]">  游&nbsp;戏
      <input type="checkbox" value="3" name="cate[]">  影&nbsp;视
      <input type="checkbox" value="4" name="cate[]">  搞&nbsp;笑
      <input type="checkbox" value="5" name="cate[]">  音&nbsp;乐
      <input type="checkbox" value="6" name="cate[]">  舞&nbsp;蹈
      <input type="checkbox" value="7" name="cate[]">  艺&nbsp;术
      <input type="checkbox" value="8" name="cate[]">  汽&nbsp;车
      <input type="checkbox" value="9" name="cate[]">  潮&nbsp;品
      <input type="checkbox" value="10" name="cate[]">  旅&nbsp;游
      <br>
      <input type="checkbox" value="11" name="cate[]">  数&nbsp;码
      <input type="checkbox" value="12" name="cate[]">  健&nbsp;康
      <input type="checkbox" value="13" name="cate[]">  美&nbsp;食
      <input type="checkbox" value="14" name="cate[]">  文&nbsp;学
      <input type="checkbox" value="15" name="cate[]">  军&nbsp;事
      <input type="checkbox" value="16" name="cate[]">  法&nbsp;律
      <input type="checkbox" value="17" name="cate[]">  萌&nbsp;宠
      <input type="checkbox" value="18" name="cate[]">  动&nbsp;漫
      <input type="checkbox" value="19" name="cate[]">  财&nbsp;务
      <input type="checkbox" value="20" name="cate[]">  秀&nbsp;场
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

<!--密码框明文显示-->
<script>
    $(function(){
        // $('#pwd-type').on('click',function(){
        //     $("input[type='password']").attr('type','text');
        // });
        //console.log($('#pwd-type ')checked());
        var $check = $('#pwd-type');
        var $pwd = $("input[type='password']");

        $("input").change(function(){
        	if($check.is(":checked")){
        		$pwd.attr('type','text');
        	}else{
        		$pwd.attr('type','password');
        	}
        });

    });
    

    
    	
   
</script>
<!--密码框明文显示-->

<!--图片上传-->
<script>
    $(function() {
        $('#doc-form-file').on('change', function() {
            var fileNames = '';
            $.each(this.files, function() {
                fileNames += '<span class="am-badge">' + this.name + '</span> ';
            });
            $('#file-list').html(fileNames);
        });
    });
</script>
<!--图片上传-->

<!--图片上传预览-->
<script src="js/uploadPreview.min.js"></script>
<script>
    window.onload = function () {
        new uploadPreview({ UpBtn: "doc-form-file", DivShow: "imgdiv", ImgShow: "imgShow" });
    }
</script>
<!--图片上传预览-->

</body>
</html>
