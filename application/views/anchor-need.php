<?php
    $aderInfo = $this -> session -> userdata('aderInfo');
    if(!$aderInfo){
        redirect('ader/ader_reg');
    }
?>
<!DOCTYPE html>
<html lang="en" ng-app="myApp">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <base href="<?php echo site_url(); ?>">
  <title>主播需求发布</title>
  <link rel="stylesheet" href="css/bootstrap.min.css" />
  <link rel="stylesheet" href="css/font-awesome.min.css" />
  <link rel="stylesheet" href="css/anchor-need.css" />
  <link rel="stylesheet" href="css/blue.css">
  <style>

      .icheckbox_square-blue{
        width: 20px;
        height: 20px;
        margin-bottom: 10px;
      }
  </style>



</head>
<body>


  <!-- <div id="header" class="main-wrap">
      <h2 class="title">首&nbsp;&nbsp;&nbsp;&nbsp;页</h2>
      <div class="form-btn">
        <span><a href="#">登&nbsp;&nbsp;&nbsp;&nbsp;录</a></span>
        <span><a href="#">注&nbsp;&nbsp;&nbsp;&nbsp;册</a></span>
      </div>
  </div> -->

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
			    <li class="active"><a href="#">主播需求填写</a></li>
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





  <div class="container main-wrap">
    <h2 class="title">主播需求发布</h2>
    <div class="row" ng-controller="FormController">


      <form action="ader/save_anchor_need" method="post" class="form-horizontal col-md-9 col-md-offset-2" name="needForm" enctype="multipart/form-data">


      <input type="hidden" name="ader_id" value="<?php echo  $aderInfo -> ader_id ;?>">
      <div class="form-group">
        <div class="input-group col-md-11">
          <span  class="input-group-addon" id="aderBrand"><i class="fa fa-copyright"></i> 广告主品牌 <i class="fa fa-asterisk"></i></span>
          <input
            name="aderBrand"
            ng-model="anchorNeed.aderBrand"
            type="text"
            class="form-control"
            placeholder="广告主品牌"
            aria-describedby="aderBrand"
            required
            ng-class="{
              'error': needForm.aderBrand.$invalid && needForm.aderBrand.$touched,
              'success': needForm.aderBrand.$valid }"
            >
        </div>
        <P
          class="error-info"
          ng-if="needForm.aderBrand.$touched && needForm.aderBrand.$error.required"
        ><i class="fa fa-exclamation"></i> 广告主品牌名不能为空</P>
      </div>




      <div class="form-group">
        <div class="input-group col-md-11">
          <span class="input-group-addon" id="aderPro"><i class="fa fa-briefcase"></i> 广告主宣传产品 <i class="fa fa-asterisk"></i></span>
          <input
            name="aderPro"
            ng-model="anchorNeed.aderPro"
            type="text"
            class="form-control"
            placeholder="广告主宣传产品"
            aria-describedby="aderPro"
            required
            ng-class="{
              'error': needForm.aderPro.$invalid && needForm.aderPro.$touched,
              'success': needForm.aderPro.$valid }"
            >
        </div>
        <p
          class="error-info"
          ng-if="needForm.aderPro.$touched && needForm.aderPro.$error.required"
        ><i class="fa fa-exclamation"></i> 广告主宣传产品名不能为空</P>


      </div>

      <div class="form-group">
        <div class="input-group col-md-11">
          <span class="input-group-addon" id="aderCate"><i class="fa fa-connectdevelop"></i> 广告主行业 <i class="fa fa-asterisk"></i></span>
          <div class="col-md-12 input-border0">
            <div class="checkbox">
                <input type="checkbox" value="1" name="aderCate[]" value1="快消">&nbsp;快&nbsp;消
                <input type="checkbox" value="2" name="aderCate[]" value1="日化">&nbsp;日&nbsp;化
                <input type="checkbox" value="3" name="aderCate[]" value1="电商">&nbsp;电&nbsp;商
                <input type="checkbox" value="4" name="aderCate[]" value1="影视">&nbsp;影&nbsp;视
                <input type="checkbox" value="5" name="aderCate[]" value1="汽车">&nbsp;汽&nbsp;车
                <input type="checkbox" value="6" name="aderCate[]" value1="金融">&nbsp;金&nbsp;融
                <input type="checkbox" value="7" name="aderCate[]" value1="医疗">&nbsp;医&nbsp;疗
                <input type="checkbox" value="8" name="aderCate[]" value1="服装">&nbsp;服&nbsp;装
                <input type="checkbox" value="9" name="aderCate[]" value1="珠宝">&nbsp;珠&nbsp;宝
                <input type="checkbox" value="10" name="aderCate[]" value1="数码">&nbsp;数&nbsp;码
                <input type="checkbox" value="11" name="aderCate[]" value1="电脑">&nbsp;电&nbsp;脑
                <input type="checkbox" value="12" name="aderCate[]" value1="地产">&nbsp;地&nbsp;产
                <input type="checkbox" value="13" name="aderCate[]" value1="旅行">&nbsp;旅&nbsp;行
                <input type="checkbox" value="14" name="aderCate[]" value1="教育">&nbsp;教&nbsp;育
                <input type="checkbox" value="15" name="aderCate[]" value1="餐饮">&nbsp;餐&nbsp;饮
                <input type="checkbox" value="16" name="aderCate[]" value1="App">&nbsp;A&nbsp;p&nbsp;p
                <input type="checkbox" value="17" name="aderCate[]" value1="互联网">互联网
                <input type="checkbox" value="18" name="aderCate[]" value1="文化艺术">&nbsp;文&nbsp;化&nbsp;艺&nbsp;术
            </div>
          </div>
        </div>
      </div>




      <div class="form-group">
        <div class="input-group col-md-11">
          <span class="input-group-addon" id="aderTime"><i class="fa fa-clock-o"></i> 预计投放时间 <i class="fa fa-asterisk"></i></span>
          <input
            name="aderTime"
            ng-model="anchorNeed.aderTime"
            type="text"
            class="form-control"
            placeholder="预计投放时间"
            aria-describedby="aderTime"
            required
            ng-class="{
              'error': needForm.aderTime.$invalid && needForm.aderTime.$touched,
              'success': needForm.aderTime.$valid }"
          >
        </div>
        <p
          class="error-info"
          ng-if="needForm.aderTime.$touched && needForm.aderTime.$error.required"
        ><i class="fa fa-exclamation"></i> 预计投放时间不能为空</P>
      </div>

      <div class="form-group">
        <div class="input-group col-md-11">
          <span class="input-group-addon" id="aderCycle"><i class="fa fa-calendar-check-o"></i> 预计投放周期</span>
          <input name="aderCycle" type="text" class="form-control" placeholder="预计投放周期" aria-describedby="aderCycle">
        </div>
      </div>

      <div class="form-group">
        <div class="input-group col-md-11">
          <span class="input-group-addon" id="anchorNum"><i class="fa fa-users"></i> 需要主播数量</span>
          <input name="anchorNum" type="number" class="form-control" placeholder="需要主播数量" aria-describedby="anchorNum">
        </div>
      </div>



      <div class="form-group">
        <div class="input-group col-md-11">
          <span class="input-group-addon" id="fansNum"><i class="fa fa-smile-o"></i> 要求主播粉丝量 <i class="fa fa-asterisk"></i></span>
          <input
            name="fansNum"
            ng-model="anchorNeed.fansNum"
            type="number"
            class="form-control"
            placeholder="要求主播粉丝量"
            aria-describedby="fansNum"
            required
            ng-class="{
              'error': needForm.fansNum.$invalid && needForm.fansNum.$touched,
              'success': needForm.fansNum.$valid }"
            >
        </div>
        <p
          class="error-info"
          ng-if="needForm.fansNum.$touched && needForm.fansNum.$error.required"
        ><i class="fa fa-exclamation"></i> 要求主播粉丝量不能为空</p>
      </div>

      <div class="form-group">
        <div class="input-group col-md-11">
          <span class="input-group-addon" id="CoopCate"><i class="fa fa-comments-o"></i> 希望主播合作形式</span>
          <input name="anchorCoop" type="text" class="form-control" placeholder="希望主播合作形式" aria-describedby="CoopCate">
        </div>
      </div>

      <div class="form-group">
        <div class="input-group col-md-11">
          <span class="input-group-addon" id="aderPro"><i class="fa fa-file-image-o"></i> 品牌LOGO <i class="fa fa-asterisk"></i></span>
          <div class="col-md-12 input-border">
           <!--文件上传-->
            <input id="doc-form-file" type="file" multiple name="aderLogo">
            <p class="help-block"><span class="label label-danger">图片格式必须为：bmp,jpeg,jpg,gif;不可大于3M</span></p>
            <p class="help-block"><span class="label label-primary">预览图</span></p>
            <div id="imgdiv"><img id="imgShow" width="25%" height="25%" /></div>
            <!--图片预览-->
            <div id="file-list"></div>
            <!--文件上传-->
          </div>
        </div>


      </div>

      <div class="form-group">
        <div class="input-group col-md-11">
          <span class="input-group-addon" id="anchorCate"><i class="fa fa-navicon"></i> 要求主播行业 <i class="fa fa-asterisk"></i></span>
          <div class="col-md-12 input-border">
            <div class="checkbox">
                <input type="checkbox" name="anchorCate[]" value="体育">体&nbsp;育
                <input type="checkbox" name="anchorCate[]" value="游戏">游&nbsp;戏
                <input type="checkbox" name="anchorCate[]" value="影视">影&nbsp;视
                <input type="checkbox" name="anchorCate[]" value="搞笑">搞&nbsp;笑
                <input type="checkbox" name="anchorCate[]" value="音乐">音&nbsp;乐
                <input type="checkbox" name="anchorCate[]" value="舞蹈">舞&nbsp;蹈
                <input type="checkbox" name="anchorCate[]" value="艺术">艺&nbsp;术
                <input type="checkbox" name="anchorCate[]" value="音乐">汽&nbsp;车
                <input type="checkbox" name="anchorCate[]" value="潮品">潮&nbsp;品
                <input type="checkbox" name="anchorCate[]" value="旅游">旅&nbsp;游
                <input type="checkbox" name="anchorCate[]" value="数码">数&nbsp;码
                <input type="checkbox" name="anchorCate[]" value="健康">健&nbsp;康
                <input type="checkbox" name="anchorCate[]" value="美食">美&nbsp;食
                <input type="checkbox" name="anchorCate[]" value="文学">文&nbsp;学
                <input type="checkbox" name="anchorCate[]" value="军事">军&nbsp;事
                <input type="checkbox" name="anchorCate[]" value="法律">法&nbsp;律
                <input type="checkbox" name="anchorCate[]" value="萌宠">萌&nbsp;宠
                <input type="checkbox" name="anchorCate[]" value="动漫">动&nbsp;漫
                <input type="checkbox" name="anchorCate[]" value="财务">财&nbsp;务
                <input type="checkbox" name="anchorCate[]" value="秀场">秀&nbsp;场
            </div>
          </div>
        </div>
      </div>

      <div class="form-group">
        <div class="input-group col-md-11">
          <span class="input-group-addon" id="otherNeed"><i class="fa fa-file-text-o"></i> 其他需求</span>
          <textarea name="otherNeed" class="form-control" rows="5" aria-describedby="otherNeed"></textarea>
        </div>
      </div>


      <br>


      <div class="form-group">
        <div class="col-sm-offset-2 col-sm-4">
          <button type="submit" class="btn btn-success btn-lg btn-block" ng-disabled="needForm.$invalid">提交完成</button>
        </div>
      </div>







    </form>


































    </div>
  </div>


  <script src="js/jquery-1.11.3.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/angular.js"></script>
  <script src="js/anchor-reg.js"></script>
  <script src="js/icheck.js"></script>
  <script src="js/anchor-need.js"></script>
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




</body>
</html>
