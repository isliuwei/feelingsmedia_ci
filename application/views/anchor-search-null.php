<?php
    $aderInfo = $this -> session -> userdata('aderInfo');
    if(!$aderInfo){
        redirect('ader/ader_reg');
    }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <base href="<?php echo site_url(); ?>">
    <title>主播页面</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/anchor.css" >
    <link rel="stylesheet" href="css/404.css" />

    <style>
      #owl-demo .item{
        margin: 3px;
      }
      #owl-demo .item img{
        display: block;
        width: 100%;
        height: auto;
      }
      .cate-container{
        margin-top: 50px;

      }
      .tag{
        display: inline-block;
        margin-right: 20px;
      }
      .label-city{
        display: inline-block;
        margin-bottom: 10px;
      }
      .tag-city{
        margin-bottom: 100px;
      }
      .city-select{
        width: 150px;
        margin-bottom: 10px;
      }
      .list-container{
        margin-top: 50px;
      }
      span.input-group-addon{
        width: 155px;
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
      .modal-body{
        margin-left: 20px;
      }

      .select-group{
        padding-left: 22px;
        margin-top: 8px;
      }

      .type-select{
        width: 150px;
      }
      .mc-description p{
        margin: 14px 0;
      }
      .marqueer{
        -webkit-animation: show 10s ease infinite;
        padding: 10px 20px;
      }


    @-webkit-keyframes show{
      from{
        margin-left: 0;
      }
      to{
        margin-left: 72%;
      }
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
  			    <li><a href="ader/ader_index" target="_blank"><?php echo $aderInfo -> ader_companyName ; ?></a></li>
  			    <li class="active"><a href="#">主播资源合作</a></li>
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

    

    <!--轮播-->
    <div class="container">
      <div class="row">
        <div class="banner col-md-12">
          <ul class="img">
            <li><a href="#"><img src="img/yyTV.png" alt="YY直播"></a></li>
            <li><a href="#"><img src="img/yingkeTV.png" alt="映客直播"></a></li>
            <li><a href="#"><img src="img/zhanqiTV.png" alt="战旗直播"></a></li>
            <li><a href="#"><img src="img/douyuTV.png" alt="斗鱼TV"></a></li>
            <li><a href="#"><img src="img/laifenlaTV.png" alt="来疯啦"></a></li>
            <li><a href="#"><img src="img/qixiuTV.png" alt="奇秀"></a></li>
            <li><a href="#"><img src="img/huyaTV.png" alt="虎牙直播"></a></li>
            <li><a href="#"><img src="img/quanminTV.png" alt="全民TV"></a></li>
            <li><a href="#"><img src="img/longzhuTV.png" alt="龙珠直播"></a></li>
            <li><a href="#"><img src="img/pandaTV.png" alt="熊猫TV"></a></li>
          </ul>
          <div class="carousel-btn">
            <span class="prev"><i class="fa fa-angle-left"></i></span>
            <span class="next"><i class="fa fa-angle-right"></i></span>
          </div>
        </div>

      </div>
    </div>
    <div class="container cate-container">
      	<div class="row">
          <div class="form-group">
              <label for="region" class="col-sm-2 control-label label-warning tag">粉丝数量</label>
                <!-- <a class="label label-danger" href="ader/search_by_fansNumber?numRange=0">全部</a> -->
                <a class="label label-danger" href="ader/anchor">全部</a>
                <a class="label label-danger" href="ader/search_by_fansNumber?numRange=1">1万以下</a>
                <a class="label label-danger" href="ader/search_by_fansNumber?numRange=2">1万-5万</a>
                <a class="label label-danger" href="ader/search_by_fansNumber?numRange=3">5万-10万</a>
                <a class="label label-danger" href="ader/search_by_fansNumber?numRange=4">10万-15万</a>
                <a class="label label-danger" href="ader/search_by_fansNumber?numRange=5">15万-25万</a>
                <a class="label label-danger" href="ader/search_by_fansNumber?numRange=6">25万-40万</a>
                <a class="label label-danger" href="ader/search_by_fansNumber?numRange=7">40万-60万</a>
                <a class="label label-danger" href="ader/search_by_fansNumber?numRange=8">60万-100万</a>
                <a class="label label-danger" href="ader/search_by_fansNumber?numRange=9">100万以上</a>

        </div>







          <div class="form-group">
              <label for="region" class="col-sm-2 control-label label-info tag">主播行业分类</label>
              <a class="label label-success" href="ader/anchor">全部</a>
              <a class="label label-success" href="ader/search_by_anchorCate?anchorCate_id=1">体育</a>
              <a class="label label-success" href="ader/search_by_anchorCate?anchorCate_id=2">游戏</a>
              <a class="label label-success" href="ader/search_by_anchorCate?anchorCate_id=3">影视</a>
              <a class="label label-success" href="ader/search_by_anchorCate?anchorCate_id=4">搞笑</a>
              <a class="label label-success" href="ader/search_by_anchorCate?anchorCate_id=5">音乐</a>
              <a class="label label-success" href="ader/search_by_anchorCate?anchorCate_id=6">舞蹈</a>
              <a class="label label-success" href="ader/search_by_anchorCate?anchorCate_id=7">艺术</a>
              <a class="label label-success" href="ader/search_by_anchorCate?anchorCate_id=8">汽车</a>
              <a class="label label-success" href="ader/search_by_anchorCate?anchorCate_id=9">潮品</a>
              <a class="label label-success" href="ader/search_by_anchorCate?anchorCate_id=10">旅游</a>
              <a class="label label-success" href="ader/search_by_anchorCate?anchorCate_id=11">数码</a>
              <a class="label label-success" href="ader/search_by_anchorCate?anchorCate_id=12">健康</a>
              <a class="label label-success" href="ader/search_by_anchorCate?anchorCate_id=13">美食</a>
              <a class="label label-success" href="ader/search_by_anchorCate?anchorCate_id=14">文学</a>
              <a class="label label-success" href="ader/search_by_anchorCate?anchorCate_id=15">军事</a>
              <a class="label label-success" href="ader/search_by_anchorCate?anchorCate_id=16">法律</a>
              <a class="label label-success" href="ader/search_by_anchorCate?anchorCate_id=17">萌宠</a>
              <a class="label label-success" href="ader/search_by_anchorCate?anchorCate_id=18">动漫</a>
              <a class="label label-success" href="ader/search_by_anchorCate?anchorCate_id=19">财经</a>
              <a class="label label-success" href="ader/search_by_anchorCate?anchorCate_id=20">秀场</a>
          </div>


          <div class="form-group">
              <label for="region" class="col-sm-2 control-label label-success tag tag-city">主播地域</label>
              <!-- <select name="country" id="country" class="form-control city-select">
              <option value="">省市</option>
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
              <option value="台湾">台湾省</option>
              </select> -->
                <a href="ader/anchor" class="label label-primary label-city">全部</a>
                <a href="ader/search_by_anchor_province?province=北京市" class="label label-primary label-city">北京市</a>
                <a href="ader/search_by_anchor_province?province=天津市" class="label label-primary label-city">天津市</a>
                <a href="ader/search_by_anchor_province?province=河北省" class="label label-primary label-city">河北省</a>
                <a href="ader/search_by_anchor_province?province=山西省" class="label label-primary label-city">山西省</a>
                <a href="ader/search_by_anchor_province?province=内蒙古自治区" class="label label-primary label-city">内蒙古自治区</a>
                <a href="ader/search_by_anchor_province?province=辽宁省" class="label label-primary label-city">辽宁省</a>
                <a href="ader/search_by_anchor_province?province=吉林省" class="label label-primary label-city">吉林省</a>
                <a href="ader/search_by_anchor_province?province=黑龙江省" class="label label-primary label-city">黑龙江省</a>
                <a href="ader/search_by_anchor_province?province=上海市" class="label label-primary label-city">上海市</a>
                <a href="ader/search_by_anchor_province?province=江苏省" class="label label-primary label-city">江苏省</a>
                <a href="ader/search_by_anchor_province?province=浙江省" class="label label-primary label-city">浙江省</a>
                <a href="ader/search_by_anchor_province?province=安徽省" class="label label-primary label-city">安徽省</a>
                <a href="ader/search_by_anchor_province?province=福建省" class="label label-primary label-city">福建省</a>
                <a href="ader/search_by_anchor_province?province=山西省" class="label label-primary label-city">江西省</a>
                <a href="ader/search_by_anchor_province?province=山东省" class="label label-primary label-city">山东省</a>
                <a href="ader/search_by_anchor_province?province=河南省" class="label label-primary label-city">河南省</a>
                <a href="ader/search_by_anchor_province?province=湖北省" class="label label-primary label-city">湖北省</a>
                <a href="ader/search_by_anchor_province?province=湖南省" class="label label-primary label-city">湖南省</a>
                <a href="ader/search_by_anchor_province?province=广东省" class="label label-primary label-city">广东省</a>
                <a href="ader/search_by_anchor_province?province=广西壮族自治区" class="label label-primary label-city">广西壮族自治区</a>
                <a href="ader/search_by_anchor_province?province=海南省" class="label label-primary label-city">海南省</a>
                <a href="ader/search_by_anchor_province?province=重庆市" class="label label-primary label-city">重庆市</a>
                <a href="ader/search_by_anchor_province?province=四川省" class="label label-primary label-city">四川省</a>
                <a href="ader/search_by_anchor_province?province=贵州省" class="label label-primary label-city">贵州省</a>
                <a href="ader/search_by_anchor_province?province=云南省" class="label label-primary label-city">云南省</a>
                <a href="ader/search_by_anchor_province?province=西藏自治区" class="label label-primary label-city">西藏自治区</a>
                <a href="ader/search_by_anchor_province?province=陕西省" class="label label-primary label-city">陕西省</a>
                <a href="ader/search_by_anchor_province?province=甘肃省" class="label label-primary label-city">甘肃省</a>
                <a href="ader/search_by_anchor_province?province=青海省" class="label label-primary label-city">青海省</a>
                <a href="ader/search_by_anchor_province?province=宁夏回族自治区" class="label label-primary label-city">宁夏回族自治区</a>
                <a href="ader/search_by_anchor_province?province=新疆维吾尔自治区" class="label label-primary label-city">新疆维吾尔自治区</a>
                <a href="ader/search_by_anchor_province?province=香港特别行政区" class="label label-primary label-city">香港特别行政区</a>
                <a href="ader/search_by_anchor_province?province=澳门特别行政区" class="label label-primary label-city">澳门特别行政区</a>
                <a href="ader/search_by_anchor_province?province=台湾省" class="label label-primary label-city">台湾省</a>


            </div>

      </div>
  </div>

    


<div class="container list-container">
  <div class="panel panel-info">
    <div class="panel-heading">
      <h3 class="panel-title">平台主播资源列表</h3>

    </div>
    <div class="panel-body"> 
      <blockquote>
      <p>如需了解详情,请拨打客服电话</p>
      <footer>客服电话：<i class="fa fa-phone"></i> <a class="tel" href="tel:400-8800-8800">400-8800-8800</a> <cite title="Source Title">feelingsmedie.com</cite></footer>
      </blockquote>


      <h1 class="bg-primary marqueer"> <i class="fa fa-exclamation-circle"> NOT FOUND! </i></h1>
      <img class="rotating" src="img/404.svg" />
      
    </div>
   

    <div class="panel-footer">
      <kbd><i class="fa fa-exclamation"></i> 无对应的筛选结果</kbd>
    </div>

  </div>



    

</div>












<script src="js/jquery-1.11.3.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/anchor.js"></script>







  </body>
</html>
