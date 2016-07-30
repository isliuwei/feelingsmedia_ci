
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
			    <li><a href="index5.html" target="_blank">广告主公司名称</a></li>
			    <li class="active"><a href="#">媒体咨询公司需求填写</a></li>
			  </ul>

        <div class="label labe-tel"><i class="fa fa-phone"></i> <a class="a-tel" href="tel:4006668800">合作咨询：400-666-8800</a></div>

        <ul class='nav navbar-nav navbar-right'>
        <a class="btn btn-success navbar-btn login-btn" data-toggle="modal" data-target="#anchor-reg" href="anchor-need-profile.html">账号信息</a>
        <a class="btn btn-primary navbar-btn login-btn" data-toggle="modal" data-target="#anchor-reg" href="ader-setting.html">账号管理</a>
        <a class="btn btn-default navbar-btn login-btn" data-toggle="modal" data-target="#anchor-reg" href="#">退出登录</a>

        <a class="btn navbar-btn js-login-btn" href="#">Register</a>

        </ul>
			</nav>
		</div>
	</header>

  <div class="container main-wrap">
    <h2 class="title">媒体资源需求发布</h2>
    <div class="row" ng-controller="FormController">


      <form class="form-horizontal col-md-9 col-md-offset-2" name="signUpForm" ng-submit="submitForm()">



      <div class="form-group">
        <div class="input-group col-md-11">
          <span  class="input-group-addon" id="aderBrand"><i class="fa fa-copyright"></i> 广告主品牌 <i class="fa fa-asterisk"></i></span>
          <input type="text"  class="form-control" placeholder="广告主品牌" aria-describedby="aderBrand">
        </div>
      </div>




      <div class="form-group">
        <div class="input-group col-md-11">
          <span class="input-group-addon" id="aderPro"><i class="fa fa-briefcase"></i> 广告主宣传产品 <i class="fa fa-asterisk"></i></span>
          <input type="text" class="form-control" placeholder="广告主宣传产品" aria-describedby="aderPro">
        </div>
      </div>

      <div class="form-group">
        <div class="input-group col-md-11">
          <span class="input-group-addon" id="aderInd"><i class="fa fa-building"></i> 广告主产品行业 <i class="fa fa-asterisk"></i></span>
          <div class="col-md-12 input-border0">
            <div class="checkbox">
                <input type="checkbox" value="快消">&nbsp;快&nbsp;消
                <input type="checkbox" value="日化">&nbsp;日&nbsp;化
                <input type="checkbox" value="电商">&nbsp;电&nbsp;商
                <input type="checkbox" value="影视">&nbsp;影&nbsp;视
                <input type="checkbox" value="汽车">&nbsp;汽&nbsp;车
                <input type="checkbox" value="金融">&nbsp;金&nbsp;融
                <input type="checkbox" value="医疗">&nbsp;医&nbsp;疗
                <input type="checkbox" value="服装">&nbsp;服&nbsp;装
                <input type="checkbox" value="珠宝">&nbsp;珠&nbsp;宝
                <input type="checkbox" value="数码">&nbsp;数&nbsp;码
                <input type="checkbox" value="电脑">&nbsp;电&nbsp;脑
                <input type="checkbox" value="地产">&nbsp;地&nbsp;产
                <input type="checkbox" value="旅行">&nbsp;旅&nbsp;行
                <input type="checkbox" value="教育">&nbsp;教&nbsp;育
                <input type="checkbox" value="餐饮">&nbsp;餐&nbsp;饮
                <input type="checkbox" value="App">&nbsp;A&nbsp;p&nbsp;p
                <input type="checkbox" value="互联网">互联网
                <br>
                <input type="checkbox" value="文化艺术">&nbsp;文&nbsp;化&nbsp;艺&nbsp;术
            </div>
          </div>
        </div>
      </div>


      <div class="form-group">
        <div class="input-group col-md-11">
          <span class="input-group-addon" id="aderPro"><i class="fa fa-file-image-o"></i> 品牌LOGO <i class="fa fa-asterisk"></i></span>
          <div class="col-md-12 input-border">
           <!--文件上传-->
            <input id="doc-form-file" type="file" multiple name="photo">
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
          <input type="text" class="form-control" placeholder="预计投放时间" aria-describedby="aderTime">
        </div>
      </div>

      <div class="form-group">
        <div class="input-group col-md-11">
          <span class="input-group-addon" id="aderCycle"><i class="fa fa-calendar-check-o"></i> 预计投放周期</span>
          <input type="text" class="form-control" placeholder="预计投放周期" aria-describedby="aderCycle">
        </div>
      </div>

      <div class="form-group">
        <div class="input-group col-md-11">
          <span class="input-group-addon" id="aderBud"><i class="fa fa-cny"></i> 投放预算</span>
          <input type="text" class="form-control" placeholder="投放预算" aria-describedby="aderBud">
        </div>
      </div>




      <div class="form-group">
        <div class="input-group col-md-11">
          <span class="input-group-addon" id="anchorCate"><i class="fa fa-navicon"></i> 需要资源渠道类型 <i class="fa fa-asterisk"></i></span>
          <div class="col-md-12 input-border0">
            <div class="checkbox">
                <input type="checkbox" value="楼宇">&nbsp;楼&nbsp;宇
                <input type="checkbox" value="公交">&nbsp;公&nbsp;交
                <input type="checkbox" value="机场">&nbsp;机&nbsp;场
                <input type="checkbox" value="校园">&nbsp;校&nbsp;园
                <input type="checkbox" value="地铁">&nbsp;地&nbsp;铁
                <input type="checkbox" value="院线">&nbsp;院&nbsp;线
                <input type="checkbox" value="擎天柱">擎天柱
                <input type="checkbox" value="自媒体">自媒体
                <br>
                <input type="checkbox" value="户外楼体LED大屏">户外楼体LED大屏

            </div>
          </div>
        </div>
      </div>

      <div class="form-group">
        <div class="input-group col-md-11">
          <span class="input-group-addon" id="aderCity"><i class="fa fa-plane"></i> 投放城市 <i class="fa fa-asterisk"></i></span>
          <div class="col-md-12 input-border0">
            <div class="checkbox">
                <input type="checkbox" value="北京">  北&nbsp;京
                <input type="checkbox" value="上海">  上&nbsp;海
                <input type="checkbox" value="广州">  广&nbsp;州
                <input type="checkbox" value="深圳">  深&nbsp;圳
                <input type="checkbox" value="天津">  天&nbsp;津
                <input type="checkbox" value="重庆">  重&nbsp;庆
                <input type="checkbox" value="太原">  太&nbsp;原
                <input type="checkbox" value="沈阳">  沈&nbsp;阳
                <input type="checkbox" value="长春">  长&nbsp;春
                <input type="checkbox" value="南京">  南&nbsp;京
                <input type="checkbox" value="杭州">  杭&nbsp;州
                <input type="checkbox" value="合肥">  合&nbsp;肥
                <input type="checkbox" value="福州">  福&nbsp;州
                <input type="checkbox" value="南昌">  南&nbsp;昌
                <input type="checkbox" value="济南">  济&nbsp;南
                <input type="checkbox" value="郑州">  郑&nbsp;州
                <input type="checkbox" value="武汉">  武&nbsp;汉
                <input type="checkbox" value="长沙">  长&nbsp;沙
                <input type="checkbox" value="成都">  成&nbsp;都
                <input type="checkbox" value="贵阳">  贵&nbsp;阳
                <input type="checkbox" value="昆明">  昆&nbsp;明
                <input type="checkbox" value="西安">  西&nbsp;安
                <input type="checkbox" value="南宁">  南&nbsp;宁
                <input type="checkbox" value="大连">  大&nbsp;连
                <input type="checkbox" value="青岛">  青&nbsp;岛
                <input type="checkbox" value="哈尔滨">  哈&nbsp;尔&nbsp;滨&nbsp;
                <br>
                <input type="checkbox" value="石家庄">  石&nbsp;家&nbsp;庄&nbsp;
                <input type="checkbox" value="乌鲁木齐">  乌&nbsp;鲁&nbsp;木&nbsp;齐&nbsp;
                <input type="checkbox" value="呼和浩特">  呼&nbsp;和&nbsp;浩&nbsp;特&nbsp;
                <input type="checkbox" value="其它">  其&nbsp;它

            </div>
          </div>
        </div>
      </div>

      <div class="form-group">
        <div class="input-group col-md-11">
          <span class="input-group-addon" id="otherNeed"><i class="fa fa-file-text-o"></i> 其他需求</span>
          <textarea class="form-control" rows="5" aria-describedby="otherNeed"></textarea>
        </div>
      </div>


      <br>


      <div class="form-group">
        <div class="col-sm-offset-2 col-sm-4">
          <button type="submit" class="btn btn-success btn-lg btn-block">提交完成</button>
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
