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
    <base href="<?php echo site_url();?>">
  <title>媒体资源需求发布</title>
  <link rel="stylesheet" href="css/bootstrap.min.css" />
  <link rel="stylesheet" href="css/font-awesome.min.css" />
  <link rel="stylesheet" href="css/anchor-need.css" />
  <link rel="stylesheet" href="css/blue.css" />
  <style>


      span.input-group-addon{
        width: 167px;
        text-align: left;
      }


      textarea{
        resize: none;
      }
      .fa-asterisk{
        font-weight: 0;
        color: red;
        font-size: 5px;
      }

      .input-border0{
        padding-right: 30px;

        border-left: none;
        border-top-left-radius: 0;
        border-bottom-left-radius: 0;
        border-top-right-radius: 4px;
        border-bottom-right-radius: 4px;
        border: 1px solid #ccc;

      }

      .icheckbox_square-blue{
        width: 25px;
        height: 25px;
        margin-bottom: 10px;
      }
      .input-border{
        padding-top: 15px;
        border-left: none;
        border-top-left-radius: 0;
        border-bottom-left-radius: 0;
        border-top-right-radius: 4px;
        border-bottom-right-radius: 4px;
        border: 1px solid #ccc;


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
			    <li><a href="ader/ader_index"><?php echo $aderInfo -> ader_companyName ; ?></a></li>
			    <li class="active"><a href="javascript:;">媒体咨询公司需求填写</a></li>
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
    <h2 class="title">媒体资源需求发布</h2>
    <div class="row" ng-controller="FormController">


      <form action="ader/save_company_need" method="post" class="form-horizontal col-md-9 col-md-offset-2" name="needForm" ng-submit="submitForm()" enctype="multipart/form-data">



      <input type="hidden" name="aderId" value="<?php echo  $aderInfo -> ader_id ;?>">
      <div class="form-group">



      <div class="form-group">
        <div class="input-group col-md-11">
          <span  class="input-group-addon" id="aderBrand"><i class="fa fa-copyright"></i> 广告主品牌 <i class="fa fa-asterisk"></i></span>
          <input 
            ng-model="needInfo.aderBrand"
            name="aderBrand"
            type="text"  
            class="form-control" 
            placeholder="广告主品牌" 
            aria-describedby="aderBrand"
            required
            ng-class="{
              'error':needForm.aderBrand.$touched && needForm.aderBrand.$invalid,
              'success': needForm.aderBrand.$valid}"
          >
        </div>
        <p
          class="error-info"
          ng-if="needForm.aderBrand.$touched && needForm.aderBrand.$error.required"
        ><i class="fa fa-exclamation"></i> 广告主品牌名不能为空</p>
      </div>




      <div class="form-group">
        <div class="input-group col-md-11">
          <span class="input-group-addon" id="aderPro"><i class="fa fa-briefcase"></i> 广告主宣传产品 <i class="fa fa-asterisk"></i></span>
          <input 
            name="aderPro"
            ng-model="needInfo.aderPro"
            required
            type="text" 
            class="form-control" 
            placeholder="广告主宣传产品" 
            aria-describedby="aderPro"
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
          <span class="input-group-addon" id="aderInd"><i class="fa fa-building"></i> 广告主产品行业 <i class="fa fa-asterisk"></i></span>
          <div class="col-md-12 input-border0">
            <div class="checkbox">
                <!-- <input name="aderCate[]" type="checkbox" value="1">&nbsp;快&nbsp;消
                <input name="aderCate[]" type="checkbox" value="2">&nbsp;日&nbsp;化
                <input name="aderCate[]" type="checkbox" value="3">&nbsp;电&nbsp;商
                <input name="aderCate[]" type="checkbox" value="4">&nbsp;影&nbsp;视
                <input name="aderCate[]" type="checkbox" value="5">&nbsp;汽&nbsp;车
                <input name="aderCate[]" type="checkbox" value="6">&nbsp;金&nbsp;融
                <input name="aderCate[]" type="checkbox" value="7">&nbsp;医&nbsp;疗
                <input name="aderCate[]" type="checkbox" value="8">&nbsp;服&nbsp;装
                <input name="aderCate[]" type="checkbox" value="9">&nbsp;珠&nbsp;宝
                <input name="aderCate[]" type="checkbox" value="10">&nbsp;数&nbsp;码
                <input name="aderCate[]" type="checkbox" value="11">&nbsp;电&nbsp;脑
                <input name="aderCate[]" type="checkbox" value="12">&nbsp;地&nbsp;产
                <input name="aderCate[]" type="checkbox" value="13">&nbsp;旅&nbsp;行
                <input name="aderCate[]" type="checkbox" value="14">&nbsp;教&nbsp;育
                <input name="aderCate[]" type="checkbox" value="15">&nbsp;餐&nbsp;饮
                <input name="aderCate[]" type="checkbox" value="16">&nbsp;A&nbsp;p&nbsp;p
                <input name="aderCate[]" type="checkbox" value="17">互联网
                <br>
                <input name="aderCate[]" type="checkbox" value="18">&nbsp;文&nbsp;化&nbsp;艺&nbsp;术 -->

                <input name="aderCate[]" type="checkbox" value="1">&nbsp;快&nbsp;消
                <input name="aderCate[]" type="checkbox" value="2">&nbsp;日&nbsp;化
                <input name="aderCate[]" type="checkbox" value="3">&nbsp;电&nbsp;商
                <input name="aderCate[]" type="checkbox" value="4">&nbsp;影&nbsp;视
                <input name="aderCate[]" type="checkbox" value="5">互联网
                <input name="aderCate[]" type="checkbox" value="6">&nbsp;汽&nbsp;车
                <input name="aderCate[]" type="checkbox" value="7">&nbsp;金&nbsp;融
                <input name="aderCate[]" type="checkbox" value="8">&nbsp;医&nbsp;疗
                <br>
                <input name="aderCate[]" type="checkbox" value="9">文化艺术
                <input name="aderCate[]" type="checkbox" value="10">&nbsp;服&nbsp;装
                <input name="aderCate[]" type="checkbox" value="11">&nbsp;珠&nbsp;宝
                <input name="aderCate[]" type="checkbox" value="12">&nbsp;数&nbsp;码
                <input name="aderCate[]" type="checkbox" value="13">&nbsp;电&nbsp;脑
                <input name="aderCate[]" type="checkbox" value="14">&nbsp;A&nbsp;p&nbsp;p
                <input name="aderCate[]" type="checkbox" value="15">&nbsp;地&nbsp;产&nbsp;
                <input name="aderCate[]" type="checkbox" value="16">&nbsp;旅&nbsp;行
                <br>
                <input name="aderCate[]" type="checkbox" value="17">&nbsp;教&nbsp;育
                <input name="aderCate[]" type="checkbox" value="18">餐&nbsp;饮

            </div>
          </div>
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
          <span class="input-group-addon" id="aderTime"><i class="fa fa-clock-o"></i> 预计投放时间 <i class="fa fa-asterisk"></i></span>
          <input
            name="aderTime" 
            ng-model="needInfo.aderTime"
            required
            type="text" 
            class="form-control" 
            placeholder="预计投放时间" 
            aria-describedby="aderTime"
            ng-class="{
              'error': needForm.aderTime.$touched && needForm.aderTime.$invalid,
              'success': needForm.aderTime.$valid}"
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
          <input type="text" name="aderCycle" class="form-control" placeholder="预计投放周期" aria-describedby="aderCycle">
        </div>
      </div>

      <div class="form-group">
        <div class="input-group col-md-11">
          <span class="input-group-addon" id="aderBud"><i class="fa fa-cny"></i> 投放预算</span>
          <input type="text" name="aderBud" class="form-control" placeholder="投放预算" aria-describedby="aderBud">
        </div>
      </div>




      <div class="form-group">
        <div class="input-group col-md-11">
          <span class="input-group-addon" id="anchorCate"><i class="fa fa-navicon"></i> 需要资源渠道类型 <i class="fa fa-asterisk"></i></span>
          <div class="col-md-12 input-border0">
            <div class="checkbox">
                <input name="resourceCate[]" type="checkbox" value="1">&nbsp;楼&nbsp;宇
                <input name="resourceCate[]" type="checkbox" value="2">&nbsp;公&nbsp;交
                <input name="resourceCate[]" type="checkbox" value="3">&nbsp;机&nbsp;场
                <input name="resourceCate[]" type="checkbox" value="4">&nbsp;校&nbsp;园
                <input name="resourceCate[]" type="checkbox" value="5">&nbsp;地&nbsp;铁
                <input name="resourceCate[]" type="checkbox" value="6">&nbsp;院&nbsp;线
                <input name="resourceCate[]" type="checkbox" value="7">擎天柱
                <input name="resourceCate[]" type="checkbox" value="8">自媒体
                <br>
                <input name="resourceCate[]" type="checkbox" value="9">户外楼体LED大屏

            </div>
          </div>
        </div>
      </div>

      <div class="form-group">
        <div class="input-group col-md-11">
          <span class="input-group-addon" id="aderCity"><i class="fa fa-plane"></i> 投放城市 <i class="fa fa-asterisk"></i></span>
          <div class="col-md-12 input-border0">
            <div class="checkbox">
                <input name="city[]" type="checkbox" value="1">  北&nbsp;京
                <input name="city[]" type="checkbox" value="2">  上&nbsp;海
                <input name="city[]" type="checkbox" value="3">  广&nbsp;州
                <input name="city[]" type="checkbox" value="4">  深&nbsp;圳
                <input name="city[]" type="checkbox" value="5">  天&nbsp;津
                <input name="city[]" type="checkbox" value="6">  重&nbsp;庆
                <input name="city[]" type="checkbox" value="7">  太&nbsp;原
                <input name="city[]" type="checkbox" value="8">  沈&nbsp;阳
                <input name="city[]" type="checkbox" value="9">  长&nbsp;春
                <input name="city[]" type="checkbox" value="10">  南&nbsp;京
                <input name="city[]" type="checkbox" value="11">  杭&nbsp;州
                <input name="city[]" type="checkbox" value="12">  合&nbsp;肥
                <input name="city[]" type="checkbox" value="13">  福&nbsp;州
                <input name="city[]" type="checkbox" value="14">  南&nbsp;昌
                <input name="city[]" type="checkbox" value="15">  济&nbsp;南
                <input name="city[]" type="checkbox" value="16">  郑&nbsp;州
                <input name="city[]" type="checkbox" value="17">  武&nbsp;汉
                <input name="city[]" type="checkbox" value="18">  长&nbsp;沙
                <input name="city[]" type="checkbox" value="19">  成&nbsp;都
                <input name="city[]" type="checkbox" value="20">  贵&nbsp;阳
                <input name="city[]" type="checkbox" value="21">  昆&nbsp;明
                <input name="city[]" type="checkbox" value="22">  西&nbsp;安
                <input name="city[]" type="checkbox" value="23">  南&nbsp;宁
                <input name="city[]" type="checkbox" value="24">  大&nbsp;连
                <input name="city[]" type="checkbox" value="25">  青&nbsp;岛
                <input name="city[]" type="checkbox" value="26">  石&nbsp;家&nbsp;庄&nbsp; 
                <br>
                <input name="city[]" type="checkbox" value="27">  哈&nbsp;尔&nbsp;滨&nbsp;
                <input name="city[]" type="checkbox" value="28">  乌&nbsp;鲁&nbsp;木&nbsp;齐&nbsp;
                <input name="city[]" type="checkbox" value="29">  呼&nbsp;和&nbsp;浩&nbsp;特&nbsp;
                <input name="city[]" type="checkbox" value="30">  其&nbsp;它

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
  <script src="js/company-need.js"></script>
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




</body>
</html>
