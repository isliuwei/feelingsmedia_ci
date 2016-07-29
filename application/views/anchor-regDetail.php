<!DOCTYPE html>
<html lang="en" ng-app="myApp">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <base href="<?php echo site_url(); ?>">
  <title>主播详细信息</title>
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/font-awesome.min.css">
  <link rel="stylesheet" href="css/anchor-regDetail.css">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/blue.css">
  <link rel="stylesheet" href="css/lrtk.css" />
  <link rel="stylesheet" href="css/lrtk1.css" />
  <style>
    .icheckbox_square-blue{
      width: 20px;
      height: 20px;
      margin-bottom: 10px;
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
			  <!-- <img class="logo" alt="" src="img/favicon.ico"> -->
			</div>
			<nav class='collapse navbar-collapse' role='navigation'>
			  <ul class='nav navbar-nav navbar-left'>
			    <li><a href="index.html" target="_blank">首页</a></li>
			    <li class="active"><a href="#">我是主播 | 完善注册信息</a></li>
			  </ul>

        <ul class='nav navbar-nav navbar-right'>

        <a class="btn btn-success navbar-btn login-btn" href="anchor/anchor_reg">返回</a>

        <a class="btn navbar-btn js-login-btn" href="#">Register</a>

        </ul>
			</nav>
		</div>
	</header>



  <div class="container main-wrap">
    <h2 class="title">主播详细信息填写</h2>
    <div class="row" ng-controller="FormController">
        <?php
//        $arr = $_POST['type'];
//        echo "您选定的地区为: ";
//        for ($i=0;$i<count($_POST['type']);$i++){
//            echo $_POST['type'][$i]." ";
//        }

        ?>
<!--        --><?php
//            $x = $this->session->userdata('anchor_qqNum');
//            var_dump( $x);
//        ?>

        <form  action="anchor/save_anchor2"  method="post" class="form-horizontal col-md-9 col-md-offset-1" name="signUpForm" ng-submit="submitForm()" enctype="multipart/form-data">
        <div class="form-group">
          <label for="platform" class="col-sm-2 control-label">直播平台</label>
          <div class="col-sm-10">
            <input
              ng-model="userdata.platform"
              name="platform"
              type="text"
              class="form-control"
              id="platform"
              placeholder="填写正确的直播平台名"
              ng-class="{
                'error': signUpForm.platform.$touched && signUpForm.platform.$invalid,
                'success': signUpForm.platform.$touched && signUpForm.platform.$valid}"
              required
            >
            <i class="fa fa-check tip right" ng-if="signUpForm.platform.$valid && signUpForm.platform.$touched"></i>
            <p
              class="error-info"
              ng-if="signUpForm.platform.$touched && signUpForm.platform.$error.required"
            ><i class="fa fa-exclamation"></i> 直播平台名不能为空</p>
          </div>

        </div>

        <div class="form-group">
          <label for="platformId" class="col-sm-2 control-label">直播平台ID号</label>
          <div class="col-sm-10">
            <input
              ng-model="userdata.platformId"
              name="platformId"
              type="text"
              class="form-control"
              id="platformId"
              placeholder="填写正确的直播平台ID号"
              ng-class="{
                'error': signUpForm.platformId.$touched && signUpForm.platformId.$invalid,
                'success': signUpForm.platformId.$touched && signUpForm.platformId.$valid}"
              required
            >
            <i class="fa fa-check tip right" ng-if="signUpForm.platformId.$valid && signUpForm.platformId.$touched"></i>
            <p
              class="error-info"
              ng-if="signUpForm.platformId.$touched && signUpForm.platformId.$error.required"
            ><i class="fa fa-exclamation"></i> 直播平台ID号不能为空</p>
          </div>
        </div>

        <div class="form-group">
          <label for="photo" class="col-sm-2 control-label">头像</label>
          <div class="col-sm-10">
           <!--文件上传-->
            <input id="doc-form-file" type="file" multiple name="anchor_photo">
            <p class="help-block"><span class="label label-danger">图片格式必须为：bmp,jpeg,jpg,gif;不可大于3M</span></p>
            <p class="help-block"><span class="label label-primary">预览图</span></p>
            <div id="imgdiv"><img id="imgShow" width="25%" height="25%" /></div>
            <!--图片预览-->
            <div id="file-list"></div>
            <!--文件上传-->
          </div>
        </div>

        <div class="form-group">
          <label for="platformNickname" class="col-sm-2 control-label">昵称</label>
          <div class="col-sm-10">
            <input
              ng-model="userdata.nickname"
              name="nickname"
              type="text"
              class="form-control"
              id="platformNickname"
              placeholder="填写正确的直播平台ID号昵称"
              ng-class="{
                'error': signUpForm.nickname.$touched && signUpForm.nickname.$invalid,
                'success': signUpForm.nickname.$touched && signUpForm.nickname.$valid}"
              required
            >
            <i class="fa fa-check tip right" ng-if="signUpForm.nickname.$valid && signUpForm.nickname.$touched"></i>
            <p
              class="error-info"
              ng-if="signUpForm.nickname.$touched && signUpForm.nickname.$error.required"
            ><i class="fa fa-exclamation"></i> 直播平台ID号昵称不能为空</p>
          </div>
        </div>

        <div class="form-group">
          <label for="fansNumber" class="col-sm-2 control-label">粉丝数</label>
          <div class="col-sm-10">
            <input
              ng-model="userdata.fansNumber"
              name="fansNumber"
              type="number"
              class="form-control"
              id="fansNumber"
              placeholder="填写粉丝数，阿拉伯数字"
              ng-class="{
                'error': signUpForm.fansNumber.$touched && signUpForm.fansNumber.$invalid,
                'success': signUpForm.fansNumber.$touched && signUpForm.fansNumber.$valid}"
              required
            >
            <i class="fa fa-check tip right" ng-if="signUpForm.fansNumber.$valid && signUpForm.fansNumber.$touched"></i>
            <p
              class="error-info"
              ng-if="signUpForm.fansNumber.$touched && signUpForm.fansNumber.$error.required"
            ><i class="fa fa-exclamation"></i> 粉丝数量不能为空</p>
          </div>
        </div>

        <div class="form-group">
          <label for="gender" class="col-sm-2 control-label">性别</label>
          <div class="col-sm-10">
            <select name="gender" id="gender" class="form-control gender-select" required>
              <option value="请选择">请选择</option>
              <option value="男">男</option>
              <option value="女">女</option>
            </select>
          </div>
        </div>

        <!-- <div class="form-group">
          <label for="region" class="col-sm-2 control-label">地域</label>
          <div class="col-sm-10">
            <select name="country" id="country" class="form-control country-select">
              <option value="">请选择</option>
              <option value="中国大陆">中国大陆</option>
              <option value="中国香港">中国香港</option>
              <option value="中国澳门">中国澳门</option>
              <option value="中国台湾">中国台湾</option>
            </select>

            <select name="country" id="country" class="form-control province-select">
              <option value="">请选择</option><option value="北京市">北京市</option><option value="天津市">天津市</option><option value="河北省">河北省</option><option value="山西省">山西省</option><option value="内蒙古自治区">内蒙古自治区</option><option value="辽宁省">辽宁省</option><option value="吉林省">吉林省</option><option value="黑龙江省">黑龙江省</option><option value="上海市">上海市</option><option value="江苏省">江苏省</option><option value="浙江省">浙江省</option><option value="安徽省">安徽省</option><option value="福建省">福建省</option><option value="江西省">江西省</option><option value="山东省">山东省</option><option value="河南省">河南省</option><option value="湖北省">湖北省</option><option value="湖南省">湖南省</option><option value="广东省">广东省</option><option value="广西壮族自治区">广西壮族自治区</option><option value="海南省">海南省</option><option value="重庆市">重庆市</option><option value="四川省">四川省</option><option value="贵州省">贵州省</option><option value="云南省">云南省</option><option value="西藏自治区">西藏自治区</option><option value="陕西省">陕西省</option><option value="甘肃省">甘肃省</option><option value="青海省">青海省</option><option value="宁夏回族自治区">宁夏回族自治区</option><option value="新疆维吾尔自治区">新疆维吾尔自治区</option><option value="香港特别行政区">香港特别行政区</option><option value="澳门特别行政区">澳门特别行政区</option><option value="台湾">台湾</option>
            </select>


          </div>
        </div> -->

        <div class="form-group">
          <label for="region" class="col-sm-2 control-label">地域</label>
          <div class="col-sm-10">
            <select name="country" id="country" class="form-control country-select">
              <option value="">请选择</option>
              <option value="中国大陆">中国大陆</option>
              <option value="中国香港">中国香港</option>
              <option value="中国澳门">中国澳门</option>
              <option value="中国台湾">中国台湾</option>
            </select>

            <select name="city" id="city" class="form-control province-select">
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
        </div>

        <div class="form-group">
          <label for="accountCate" class="col-sm-2 control-label">账号分类</label>
          <div class="col-sm-10">
            <div class="checkbox">
                <!-- <?php
                    foreach($anchorCates as $cates){
                ?>
                  <input type="checkbox" value="<?php echo $cates -> anchorCate_id; ?>" name="anchorCate[]">&nbsp;&nbsp;<?php echo $cates -> anchorCate_name; ?>&nbsp;&nbsp;
                <?php
                  }
                ?> -->
                <input type="checkbox" value="1" name="anchorCate[]"  ng-model="userdata.cate">  体&nbsp;育
                <input type="checkbox" value="2" name="anchorCate[]"  ng-model="userdata.cate">  游&nbsp;戏
                <input type="checkbox" value="3" name="anchorCate[]"  ng-model="userdata.cate">  影&nbsp;视
                <input type="checkbox" value="4" name="anchorCate[]"  ng-model="userdata.cate">  搞&nbsp;笑
                <input type="checkbox" value="5" name="anchorCate[]"  ng-model="userdata.cate">  音&nbsp;乐
                <input type="checkbox" value="6" name="anchorCate[]"  ng-model="userdata.cate">  舞&nbsp;蹈
                <input type="checkbox" value="7" name="anchorCate[]"  ng-model="userdata.cate">  艺&nbsp;术
                <input type="checkbox" value="8" name="anchorCate[]"  ng-model="userdata.cate">  汽&nbsp;车
                <input type="checkbox" value="9" name="anchorCate[]"  ng-model="userdata.cate">  潮&nbsp;品
                <input type="checkbox" value="10" name="anchorCate[]"  ng-model="userdata.cate">  旅&nbsp;游
                <br>
                <input type="checkbox" value="11" name="anchorCate[]"  ng-model="userdata.cate">  数&nbsp;码
                <input type="checkbox" value="12" name="anchorCate[]"  ng-model="userdata.cate">  健&nbsp;康
                <input type="checkbox" value="13" name="anchorCate[]"  ng-model="userdata.cate">  美&nbsp;食
                <input type="checkbox" value="14" name="anchorCate[]"  ng-model="userdata.cate">  文&nbsp;学
                <input type="checkbox" value="15" name="anchorCate[]"  ng-model="userdata.cate">  军&nbsp;事
                <input type="checkbox" value="16" name="anchorCate[]"  ng-model="userdata.cate">  法&nbsp;律
                <input type="checkbox" value="17" name="anchorCate[]"  ng-model="userdata.cate">  萌&nbsp;宠
                <input type="checkbox" value="18" name="anchorCate[]"  ng-model="userdata.cate">  动&nbsp;漫
                <input type="checkbox" value="19" name="anchorCate[]"  ng-model="userdata.cate">  财&nbsp;务
                <input type="checkbox" value="20" name="anchorCate[]"  ng-model="userdata.cate">  秀&nbsp;场

            </div>
          </div>
        </div>


          <div class="form-group">
          <label for="cate" class="col-sm-2 control-label">主播性质</label>
          <div class="col-sm-10">
            <select name="anchorAttr" id="cate" class="form-control gender-select">
              <option value="">请选择</option>
              <option value="公会主播">公会主播</option>
              <option value="个人主播">个人主播</option>
            </select>
          </div>
        </div>


        <div class="form-group">
          <div class="col-sm-offset-2 col-sm-4">
            <button type="submit" class="btn btn-success btn-lg btn-block" ng-disabled="signUpForm.$invalid">提交完成</button>
          </div>
        </div>
    </form>



    </div>
  </div>



  <div class="modal fade" id="anchor-reg" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog" role="document">
      <button type="button" class="close close-btn" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <div class="login">
                <form action="anchor/check_login" method="post" class="container offset1 loginform">
                    <div class="owl-login">
                        <div class="hand"></div>
                        <div class="hand hand-r"></div>
                        <div class="arms">
                            <div class="arm"></div>
                            <div class="arm arm-r"></div>
                        </div>
                    </div>
                    <br>
                    <h3>主播登录</h3>
                    <div class="pad">
                        <input type="hidden" name="" value="">
                        <div class="control-group">
                            <div class="controls">
                                <label for="username" class="control-label fa fa-user"></label>
                                <input id="username" type="text" name="username" placeholder="用户名" tabindex="1" autofocus="autofocus" class="form-control input-medium">
                            </div>
                        </div>

                        <div class="control-group">
                            <div class="controls">
                                <label for="password" class="control-label fa fa-key"></label>
                                <input id="password" type="password" name="password" placeholder="密码" tabindex="2" class="form-control input-medium">
                            </div>
                        </div>

                        <div class="control-group">
                            <div class="controls">
                              <label for="captcha" class="control-label fa fa-key"></label>
                                <input id="captcha1" type="number" name="captcha" placeholder="验证码" tabindex="2" class="form-control col-md-2">
                                <img id="captcha-img" src="img/demo.jpg" alt="">
                                <span id="captcha-tip"><a href="#"> &nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-refresh"></i>换一张</a></span>
                            </div>

                        </div>


                    </div>
                    <div class="form-actions">
                        <p><a href="#" tabindex="5" class=" pull-left btn-link text-muted">忘记密码?</a></p>
                        <br>
                        <button type="submit" tabindex="4" class="btn btn-primary">登录</button>
                        <button type="button" tabindex="4" class="btn btn-warning"><a href="anchor-reg.php" style="display:block;color:#fff;">注册</a></button>
                    </div>

                </form>
          </div>
      </div>
  </div>


  <script src="js/jquery-1.11.3.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/angular.js"></script>
  <script src="js/anchor-regDetail.js"></script>
  <script src="js/icheck.js"></script>
<script>
  $('input').iCheck({ checkboxClass: 'icheckbox_square-blue', radioClass: 'iradio_square-blue', increaseArea: '20%'  });
</script>
  <!--图片上传预览-->
<script src="js/uploadPreview.min.js"></script>
<script>
  window.onload = function () {
    new uploadPreview({ UpBtn: "doc-form-file", DivShow: "imgdiv", ImgShow: "imgShow" });
  }
</script>
<!--图片上传预览-->

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


<script>
  $(function() {

      $('.login #password').focus(function() {
          $('.owl-login').addClass('password');
      }).blur(function() {
          $('.owl-login').removeClass('password');
      });


  });
</script>

</body>
</html>
