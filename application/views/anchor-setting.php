<?php
    $anchorInfo = $this -> session -> userdata('anchorInfo');
    if(!$anchorInfo){
        redirect('anchor/anchor_reg');
    }
?>
<!DOCTYPE html>
<html lang="en" ng-app="myApp">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <base href="<?php echo site_url(); ?>">
  <title>主播个人信息编辑</title>
  <link rel="stylesheet" href="css/bootstrap.min.css" />
  <link rel="stylesheet" href="css/font-awesome.min.css" />
  <link rel="stylesheet" href="css/anchor-profile.css" />
  <link rel="stylesheet" href="css/dropzone.min.css" />
  <link rel="stylesheet" href="css/style.css" />
  <link rel="stylesheet" href="css/blue.css" />

  <style>
      .select-group{
        padding-left: 22px;
        margin-top: 8px;
      }

      .country-select{
        width: 100px;
      }

      .province-select{
        width: 150px;
      }
      .checkbox{
        margin-right: 10px;
      }
      .icheckbox_square-blue{
        margin-bottom: 4px;
        margin-right: 2px;
      }
      input[type=text]:focus,input[type=password]:focus{
        transition:border linear .2s,box-shadow linear .5s;
        -moz-transition:border linear .2s,-moz-box-shadow linear .5s;
        -webkit-transition:border linear .2s,-webkit-box-shadow linear .5s;
        outline:none;border-color:rgba(93,149,242,.75);
        box-shadow:0 0 8px rgba(93,149,242,.105);
        -moz-box-shadow:0 0 8px rgba(93,149,242,.5);
        -webkit-box-shadow:0 0 8px rgba(93,149,242,3);
        background-color: #fff;

      }

      input[type=text],input[type=password],input[type=number],input[type=email]{
        /*background: rgb(250, 255, 189);
        background-color: #d9edf7;
        background-color: #f2dede;
        background-color: #dff0d8;
        background-color: #337ab7;*/
        background-color: #fcf8e3;
      }

      .anchorCate{
        width: 100px;
      }
      .text-success{
        text-align: center;
      }

      .tel{
        font-size: 18px;
        font-weight: 900;
      }
      .js-login-btn{
        visibility: hidden;
      }
      .labe-tel{
        font-size: 18px;
        color: #337ab7;
      }
      @media (min-width: 990px){
        .labe-tel{
          display: inline-block;
          width: 200px;
          height: 40px;
          margin-left: 200px;
          line-height: 40px;
        }
      }

      @media (min-width: 840px){
        .labe-tel{
          display: inline-block;
          width: 200px;
          height: 40px;
          /*margin-left: 50px;*/
          line-height: 40px;
        }
      }

      @media (max-width: 840px){
        .labe-tel{
          display: none;

        }
      }

      @media (max-width: 750px){
        .labe-tel{
          display: inline-block;
          width: 100px;
          height: 20px;

          line-height: 20px;
        }
      }
      .a-tel{
        text-decoration: none;
        color: #337ab7;
      }
      .new-checkbox{
        padding: 10px 15px 10px 25px;
      }
      .clear{
        background: #fff !important;
      }
      .fa-exclamation-circle{
      color: #f00;
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
        <!-- <a href="index5.html" target="_blank">广告主公司名称</a> -->
			  <!-- <img class="logo" alt="" src="img/favicon.ico"> -->
			</div>
			<nav class='collapse navbar-collapse' role='navigation'>
			  <ul class='nav navbar-nav navbar-left'>
			    <li><a href="anchor/anchor_need_list"><?php echo $anchorInfo -> anchor_name ; ?></a></li>
			    <li class="active"><a href="#">账号管理</a></li>
			  </ul>

        <div class="label labe-tel"><i class="fa fa-phone"></i> <a class="a-tel" href="tel:4006668800">合作咨询：400-666-8800</a></div>



        <ul class='nav navbar-nav navbar-right'>
        <a class="btn btn-success navbar-btn login-btn" href="anchor/anchor_profile/<?php echo $anchorInfo -> anchor_id; ?>">账号信息</a>
        <a class="btn btn-danger navbar-btn login-btn" data-toggle="modal" data-target="#newPassword">修改密码</a>
        <a class="btn btn-default navbar-btn login-btn" href="anchor/logout">退出登录</a>

        <a class="btn navbar-btn js-login-btn" href="#">Register</a>

        </ul>
			</nav>
		</div>
	</header>


  <div class="container">
    	<div class="row">
	        <div class="col-md-8">
            <div class="panel panel-info">
    					<div class="panel-heading">
    						<h3 class="panel-title">主播信息编辑</h3>
    					</div>
  					  <div class="panel-body">
    						<form class="form-horizontal" action="anchor/update_anchor_info" method="post" enctype="multipart/form-data">
                  <blockquote>
                  <p>如果需要更改其他信息，请与客服联系</p>
                  <!-- <span class="label label-info">400-8800-8800</span> -->
                  <footer>客服电话：<a href="tel:400-8800-8800">400-8800-8800</a> <cite title="Source Title">feelingsmedie.com</cite></footer>
                  </blockquote>
    						    <input name="id" type="hidden" value="<?php echo $anchorInfo -> anchor_id;?>">

      						  <div class="form-group">
      						    <label for="platform" class="col-md-offset-1 col-md-2 control-label">直播平台</label>
      						    <div class="col-md-7">
      						      <input name="platform" type="text" class="form-control" id="platform" placeholder="" value="<?php echo $anchorProfile -> anchor_platformName; ?>">
      						    </div>
      						  </div>

      						  <div class="form-group">
      						    <label for="platformId" class="col-md-offset-1 col-md-2 control-label">直播ID</label>
      						    <div class="col-md-7">
      						      <input name="platformId" type="text" class="form-control" id="platformId" placeholder="" value="<?php echo $anchorProfile -> anchor_platformID; ?>">
      						    </div>
      						  </div>

      						  <div class="form-group">
      						    <label for="tel" class="col-md-offset-1 col-md-2 control-label">联系方式</label>
      						    <div class="col-md-7">
      						      <input name="tel" type="number" class="form-control" id="tel" placeholder="" value="<?php echo $anchorProfile -> anchor_tel; ?>">
      						    </div>
      						  </div>

      						  <div class="form-group">
      						    <label for="email" class="col-md-offset-1 col-md-2 control-label">邮箱</label>
      						    <div class="col-md-7">
      						      <input name="email" type="email" class="form-control" id="email" placeholder="" value="<?php echo $anchorProfile -> anchor_email; ?>">
      						    </div>
      						  </div>

                    <div class="form-group">
                      <label for="photo" class="col-md-offset-1 col-md-2 control-label">头像</label>
                      <div class="col-md-7">
                       <!--文件上传-->
                        <input id="doc-form-file" type="file" multiple name="anchor_photo" >

                        <input type="hidden" name="oldUrl" value="<?php echo $anchorProfile -> anchor_photo;?>">


                        <p class="help-block"><span class="label label-danger">图片格式必须为: bmp, jpeg, jpg, gif; 不可大于3M</span></p>
                        <p class="help-block"><span class="label label-primary">预览图</span></p>
                        <div id="imgdiv"><img id="imgShow" width="25%" height="25%" /></div>
                        <!--图片预览-->
                        <div id="file-list"></div>
                        <!--文件上传-->
                      </div>
                    </div>

      						  <div class="form-group">
                      <div class="form-group">
                        <label for="region" class="col-md-offset-1 col-md-2 control-label">地域</label>
                        <div class="col-md-7 select-group">
                          <select name="country" id="country" class="form-control country-select col-md-8">
                            <option value="">请选择</option>
                            <option <?php echo $anchorProfile -> anchor_region == "中国大陆"?"selected":"";?> value="中国大陆">中国大陆</option>
                            <option <?php echo $anchorProfile -> anchor_region == "中国香港"?"selected":"";?> value="中国香港">中国香港</option>
                            <option <?php echo $anchorProfile -> anchor_region == "中国澳门"?"selected":"";?> value="中国澳门">中国澳门</option>
                            <option <?php echo $anchorProfile -> anchor_region == "中国台湾"?"selected":"";?> value="中国台湾">中国台湾</option>
                          </select>

                          <select name="city" id="province" class="form-control province-select">
                            <option  value="">请选择</option>
                            <option <?php echo $anchorProfile -> anchor_province == "北京市"?"selected":"";?>  value="北京市">北京市</option>
                            <option <?php echo $anchorProfile -> anchor_province == "天津市"?"selected":"";?>  value="天津市">天津市</option>
                            <option <?php echo $anchorProfile -> anchor_province == "河北省"?"selected":"";?>  value="河北省">河北省</option>
                            <option <?php echo $anchorProfile -> anchor_province == "山西省"?"selected":"";?>  value="山西省">山西省</option>
                            <option <?php echo $anchorProfile -> anchor_province == "内蒙古自治区"?"selected":"";?>  value="内蒙古自治区">内蒙古自治区</option>
                            <option <?php echo $anchorProfile -> anchor_province == "辽宁省"?"selected":"";?>  value="辽宁省">辽宁省</option>
                            <option <?php echo $anchorProfile -> anchor_province == "吉林省"?"selected":"";?>  value="吉林省">吉林省</option>
                            <option <?php echo $anchorProfile -> anchor_province == "黑龙江省"?"selected":"";?>  value="黑龙江省">黑龙江省</option>
                            <option <?php echo $anchorProfile -> anchor_province == "上海市"?"selected":"";?>  value="上海市" >上海市</option>
                            <option <?php echo $anchorProfile -> anchor_province == "江苏省"?"selected":"";?>  value="江苏省">江苏省</option>
                            <option <?php echo $anchorProfile -> anchor_province == "浙江省"?"selected":"";?>  value="浙江省">浙江省</option>
                            <option <?php echo $anchorProfile -> anchor_province == "安徽省"?"selected":"";?>  value="安徽省">安徽省</option>
                            <option <?php echo $anchorProfile -> anchor_province == "福建省"?"selected":"";?>  value="福建省">福建省</option>
                            <option <?php echo $anchorProfile -> anchor_province == "江西省"?"selected":"";?>  value="江西省">江西省</option>
                            <option <?php echo $anchorProfile -> anchor_province == "山东省"?"selected":"";?>  value="山东省">山东省</option>
                            <option <?php echo $anchorProfile -> anchor_province == "河南省"?"selected":"";?>  value="河南省">河南省</option>
                            <option <?php echo $anchorProfile -> anchor_province == "湖北省"?"selected":"";?>  value="湖北省">湖北省</option>
                            <option <?php echo $anchorProfile -> anchor_province == "湖南省"?"selected":"";?>  value="湖南省">湖南省</option>
                            <option <?php echo $anchorProfile -> anchor_province == "广东省"?"selected":"";?>  value="广东省">广东省</option>
                            <option <?php echo $anchorProfile -> anchor_province == "广西壮族自治区"?"selected":"";?>  value="广西壮族自治区">广西壮族自治区</option>
                            <option <?php echo $anchorProfile -> anchor_province == "海南省"?"selected":"";?>  value="海南省">海南省</option>
                            <option <?php echo $anchorProfile -> anchor_province == "重庆市"?"selected":"";?>  value="重庆市">重庆市</option>
                            <option <?php echo $anchorProfile -> anchor_province == "四川省"?"selected":"";?>  value="四川省">四川省</option>
                            <option <?php echo $anchorProfile -> anchor_province == "贵州省"?"selected":"";?>  value="贵州省">贵州省</option>
                            <option <?php echo $anchorProfile -> anchor_province == "云南省"?"selected":"";?>  value="云南省">云南省</option>
                            <option <?php echo $anchorProfile -> anchor_province == "西藏自治区"?"selected":"";?>  value="西藏自治区">西藏自治区</option>
                            <option <?php echo $anchorProfile -> anchor_province == "陕西省"?"selected":"";?>  value="陕西省">陕西省</option>
                            <option <?php echo $anchorProfile -> anchor_province == "甘肃省"?"selected":"";?>  value="甘肃省">甘肃省</option>
                            <option <?php echo $anchorProfile -> anchor_province == "青海省"?"selected":"";?>  value="青海省">青海省</option>
                            <option <?php echo $anchorProfile -> anchor_province == "宁夏回族自治区"?"selected":"";?>  value="宁夏回族自治区">宁夏回族自治区</option>
                            <option <?php echo $anchorProfile -> anchor_province == "新疆维吾尔自治区"?"selected":"";?>  value="新疆维吾尔自治区">新疆维吾尔自治区</option>
                            <option <?php echo $anchorProfile -> anchor_province == "香港特别行政区"?"selected":"";?>  value="香港特别行政区">香港特别行政区</option>
                            <option <?php echo $anchorProfile -> anchor_province == "澳门特别行政区"?"selected":"";?>  value="澳门特别行政区">澳门特别行政区</option>
                            <option <?php echo $anchorProfile -> anchor_province == "台湾省"?"selected":"";?>  value="台湾省">台湾省</option>
                          </select>
                        </div>
                      </div>
      						  </div>


                    <div class="form-group">
                      <label for="accountCate" class="col-md-offset-1 col-md-2 control-label">当前分类</label>
                      <div class="col-md-7">
                        <div class="checkbox">
                        <?php
                          if($anchorCates){
                          foreach($anchorCates as $cate){
                        ?>
                          <input name="cate[]" checked="checked" type="checkbox" value="<?php echo $cate -> anchorCate_id ?>" disabled>  <?php echo $cate -> anchorCate_name ?>&nbsp;
                        <?php
                          }}
                        ?>

                            <!-- <input type="checkbox" value="体育">  体&nbsp;育
                            <input type="checkbox" value="游戏">  游&nbsp;戏
                            <input type="checkbox" value="影视">  影&nbsp;视
                            <input type="checkbox" value="搞笑">  搞&nbsp;笑
                            <input type="checkbox" value="音乐" checked="checked">  音&nbsp;乐
                            <input type="checkbox" value="舞蹈">  舞&nbsp;蹈
                            <input type="checkbox" value="艺术" checked="checked">  艺&nbsp;术
                            <input type="checkbox" value="音乐">  汽&nbsp;车
                            <input type="checkbox" value="潮品">  潮&nbsp;品
                            <input type="checkbox" value="旅游">  旅&nbsp;游
                            <input type="checkbox" value="数码">  数&nbsp;码
                            <input type="checkbox" value="健康" checked="checked">  健&nbsp;康
                            <input type="checkbox" value="美食">  美&nbsp;食
                            <input type="checkbox" value="文学">  文&nbsp;学
                            <input type="checkbox" value="军事">  军&nbsp;事
                            <input type="checkbox" value="法律">  法&nbsp;律
                            <input type="checkbox" value="萌宠">  萌&nbsp;宠
                            <input type="checkbox" value="动漫">  动&nbsp;漫
                            <input type="checkbox" value="财务">  财&nbsp;务
                            <input type="checkbox" value="秀场" checked="checked">  秀&nbsp;场 -->

                        </div>
                      </div>
                    </div>


<div class="form-group">
  <label for="accountCate" class="col-md-offset-1 col-md-2 control-label">账号分类</label>
  <div class="dropdown col-md-7">
    <button id="dLabel" type="button" class="btn btn-default" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      重新选择
      <span class="caret"></span>
    </button>
  
    <div class="dropdown-menu" aria-labelledby="dLabel">
      <div class="new-checkbox">
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
  </div>
</div>













                    <div class="form-group">
      						    <label for="fansNumber" class="col-md-offset-1 col-md-2 control-label">粉丝</label>
      						    <div class="col-md-7">
      						      <input name="fansNumber" type="number" class="form-control" id="fansNumber" placeholder="" value="<?php echo $anchorProfile -> anchor_fansNumber; ?>">
      						    </div>
      						  </div>



                    <div class="form-group">
                      <label for="cate" class="col-md-offset-1 col-md-2 control-label">主播性质</label>
                      <div class="col-md-7">
                        <select name="attr" id="cate" class="form-control anchorCate select-group">
                          <option value="">请选择</option>
                          <option value="公会主播" <?php echo $anchorProfile -> anchor_attr == "公会主播"?"selected":"";?>>公会主播</option>
                          <option value="个人主播" <?php echo $anchorProfile -> anchor_attr == "个人主播"?"selected":"";?>>个人主播</option>
                        </select>
                      </div>
                    </div>

                    <div class="form-group">
      						    <label for="bankAccount" class="col-md-offset-1 col-md-2 control-label">银行账号</label>
      						    <div class="col-md-7">
      						      <input name="account" type="text" class="form-control" id="bankAccount" placeholder="" value="<?php echo $anchorProfile -> anchor_bankAccount; ?>">
      						    </div>
      						  </div>

                    <div class="form-group">
      						    <label for="qqNum" class="col-md-offset-1 col-md-2 control-label">QQ号码</label>
      						    <div class="col-md-7">
      						      <input name="qq" type="number" class="form-control" id="qqNum" placeholder="" value="<?php echo $anchorProfile -> anchor_qqNum; ?>">
      						    </div>
      						  </div>

    						  <div class="form-group">
    						    <div class="col-md-offset-3 col-md-10">
    						      <button type="submit" class="btn-lg btn-success">保存修改</button>
    						    </div>
    						  </div>
    						</form>
  					</div>
				</div>
      </div>






           <div class="col-md-4">
              <div class="panel panel-info">
           	    <div class="panel-heading">
                  <h3 class="panel-title">主播照片(当前照片)</h3>
                </div>
           		  <div class="panel-body">
           			  <div class="thumbnail">
           		      	<img class="img img-circle img-thumbnail" src="<?php echo $anchorProfile -> anchor_photo; ?>" alt="主播照片(当前照片)" tilte="主播照片(当前照片)">
           		      	<div class="caption">
             		        <h3 class="name bg-info text-success">@<?php echo $anchorProfile -> anchor_name; ?></h3>
             		        <p class="desc text-info"></p>
           		        </div>
           		    </div>
           	  </div>
             </div>


             <!-- <div class="panel panel-info">
                <div id="dropzone">
                  <form action="#" method="post" class="dropzone needsclick dz-clickable" id="demo-upload" enctype="multipart/form-data">
                      <div class="dz-message needsclick">
                        Drop files here or click to upload.
                        <input type="file" name="file">
                      </div>
                  </form>
                </div>
            </div> -->



<div class="modal fade" id="newPassword" tabindex="-1" role="dialog" aria-labelledby="newPasswordLabel" ng-controller="passwordFormController">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="newPasswordLabel"><i class="fa fa-exclamation-circle"></i> 修改密码</h4>
        </div>
        <div class="modal-body">
          <form action="anchor/update_password" method="post" name="passwordForm">
            <input type="hidden" name="anchor_id" value="<?php echo $this->uri->segment('3'); ?>">
            <div class="form-group">
              <label for="old-password" class="control-label"><i class="fa fa-key"></i>请输入当前密码</label>
              <input
                name="oldPassword"
                ng-model="passwordInfo.oldPassword"
                type="text"
                class="form-control clear"
                id="old-password"
                placeholder="密码由6-22位数字或字母组成"
                required
                ng-class="{
                  'error': passwordForm.oldPassword.$invalid && passwordForm.oldPassword.$touched,
                  'success':passwordForm.oldPassword.$valid }"
                >
            </div>
            <div class="form-group">
              <label for="new-password" class="control-label"><i class="fa fa-unlock-alt"></i> 请输入新密码</label>
              <input
                ng-minlength="6"
                ng-maxlength="22"
                name="newPassword"
                ng-pattern="/^[A-Za-z0-9]+$/"
                ng-model="passwordInfo.newPassword"
                type="text"
                class="form-control clear"
                id="new-password"
                placeholder="密码由6-22位数字或字母组成"
                required
                ng-class="{
                  'error': passwordForm.newPassword.$invalid && passwordForm.newPassword.$touched,
                  'success':passwordForm.newPassword.$valid }"
                >
                <p
                  class="error-info"
                  ng-if="passwordForm.newPassword.$error.required && passwordForm.newPassword.$touched">
                  <i class="fa fa-exclamation"></i> 输入密码不能为空</p>
                <p
                  class="error-info"
                  ng-if="(passwordForm.newPassword.$error.minlength || passwordForm.newPassword.$error.maxlength) && passwordForm.newPassword.$touched">
                  <i class="fa fa-exclamation"></i> 输入密码长度不合法,密码长度6-22位</p>
                <p
                  class="error-info"
                  ng-if="passwordForm.newPassword.$error.pattern && passwordForm.newPassword.$touched">
                  <i class="fa fa-exclamation"></i> 密码含有非法字符，密码由数字或字母组成</p>
            </div>
            <div class="form-group">
              <label for="new-password1" class="control-label"><i class="fa fa-unlock"></i> 确认新密码</label>
              <input
                ng-minlength="6"
                ng-maxlength="22"
                ng-pattern="/^[A-Za-z0-9]+$/"
                name="newPassword1"
                ng-model="passwordInfo.newPassword1"
                type="text"
                class="form-control clear"
                id="new-password1"
                placeholder="请再输入一遍新密码"
                required
                ng-class="{
                  'error': passwordForm.newPassword1.$invalid && passwordForm.newPassword1.$touched,
                  'success':passwordForm.newPassword1.$valid }"
                compare="passwordInfo.newPassword"
                >
                <p
                  class="error-info"
                  ng-if="passwordForm.newPassword1.$error.required && passwordForm.newPassword1.$touched">
                  <i class="fa fa-exclamation"></i> 输入密码不能为空</p>
                <p
                  class="error-info"
                  ng-if="(passwordForm.newPassword1.$error.minlength || passwordForm.newPassword1.$error.maxlength) && passwordForm.newPassword1.$touched">
                  <i class="fa fa-exclamation"></i> 输入密码长度不合法,密码长度6-22位</p>
                <p
                  class="error-info"
                  ng-if="passwordForm.newPassword1.$error.pattern && passwordForm.newPassword1.$touched">
                  <i class="fa fa-exclamation"></i> 密码含有非法字符，密码由数字或字母组成</p>
                <p
                  class="error-info"
                  ng-if="passwordForm.newPassword1.$error.compare && passwordForm.newPassword1.$touched">
                  <i class="fa fa-exclamation"></i> 两次密码输入不一致</p>
            </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">放弃修改</button>
          <button type="submit" class="btn btn-success" ng-disabled="passwordForm.$invalid">确认修改</button>
        </div>
        </form>
      </div>
    </div>
  </div>





<script src="js/jquery-1.11.3.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/angular.js"></script>
<script src="js/dropzone.min.js"></script>
<script src="js/icheck.js"></script>
<script src="js/anchor-setting.js"></script>
<script>
    $('input').iCheck({ checkboxClass: 'icheckbox_square-blue', radioClass: 'iradio_square-blue', increaseArea: '20%'  });
</script>

<script>
    $("#dropzone").dropzone({
        url: "handle-upload.php",
        maxFiles: 10,
        maxFilesize: 512,
        acceptedFiles: ".jpg,.png,.bmp"
    });
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
var $pwdInput = $('#old-password');
$pwdInput.on('blur',function(){
  var $oldPwd = $pwdInput.val().trim();
    if($oldPwd==""){
        return;
    }else{
      $.get('anchor/check_password',{'oldPassword':$oldPwd},function(res){
        if(res=='true'){
          alert('密码验证成功！');
        }else{
          $pwdInput.after("<p class='error-info'>密码验证失败！请重新输入！</p>");
          setTimeout(function(){location.reload()},2000);
        }
      },'text');

    }

});

</script>

</body>
</html>
