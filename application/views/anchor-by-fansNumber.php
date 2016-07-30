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
    <link rel="stylesheet" href="css/material-cards.css" />
    <!-- <link rel="stylesheet" href="css/owl.carousel.css">
    <link rel="stylesheet" href="css/owl.theme.css"> -->
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

    <!-- <div id="owl-demo">

      <div class="item"><img src="img/carousel-1.png" alt="Owl Image"></div>
      <div class="item"><img src="img/carousel-2.png" alt="Owl Image"></div>
      <div class="item"><img src="img/carousel-3.png" alt="Owl Image"></div>
      <div class="item"><img src="img/carousel-4.png" alt="Owl Image"></div>
      <div class="item"><img src="img/carousel-5.png" alt="Owl Image"></div>
      <div class="item"><img src="img/carousel-6.png" alt="Owl Image"></div>
      <div class="item"><img src="img/carousel-7.png" alt="Owl Image"></div>
      <div class="item"><img src="img/carousel-8.png" alt="Owl Image"></div>

    </div> -->

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
                <!-- <select name="country" id="country" class="form-control type-select">
                  <option value="">行业分类</option>
                  <option value="快消">快消</option>
                  <option value="日化">日化</option>
                  <option value="电商">电商</option>
                  <option value="影视">影视</option>
                  <option value="互联网">互联网</option>
                  <option value="汽车">汽车</option>
                  <option value="金融">金融</option>
                  <option value="医疗">医疗</option>
                  <option value="文化艺术">文化艺术</option>
                  <option value="服装">服装</option>
                  <option value="珠宝">珠宝</option>
                  <option value="数码">数码</option>
                  <option value="电脑">电脑</option>
                  <option value="APP">APP</option>
                  <option value="地产">地产</option>
                  <option value="旅行">旅行</option>
                  <option value="教育">教育</option>
                  <option value="餐饮">餐饮</option>
                </select> -->

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
                <!-- <select name="country" id="country" class="form-control type-select">
                  <option value="">渠道类型</option>
                  <option value="楼宇">楼宇</option>
                  <option value="公交">公交</option>
                  <option value="机场">机场</option>
                  <option value="户外楼体LED大屏">户外楼体LED大屏</option>
                  <option value="校园">校园</option>
                  <option value="地铁">地铁</option>
                  <option value="院线">院线</option>
                  <option value="擎天柱">擎天柱</option>
                  <option value="自媒体">自媒体</option>
                </select> -->

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

    <!--分类筛选-->
    <!-- <div class="classify">
      <div class="anc-fans">
        <span class="anc-title">粉丝数量</span>
        <span class="anc-span">
          <a href="#">10000以下</a>/
          <a href="#">10000~50000</a>/
          <a href="#">50000~100000</a>/
          <a href="#">100000~150000</a>/
          <a href="#">150000~200000</a>/
          <a href="#">200000~250000</a>/
          <a href="#">250000~500000</a>
        </span>
      </div>
      <div class="anc-business">
        <span class="anc-title">行业分类</span>
        <span class="anc-span">
          <a href="#">体育</a>/
          <a href="#">音乐</a>/
          <a href="#">影视</a>/
          <a href="#">搞笑</a>/
          <a href="#">旅游</a>/
          <a href="#">数码</a>/
          <a href="#">动漫</a>/
          <a href="#">美学</a>/
          <a href="#">文学</a>/
          <a href="#">萌宠</a>/
          <a href="#">美食</a>/
          <a href="#">军事</a>
        </span>
      </div>
      <div class="anc-area">
        <span class="anc-title">所在地</span>
        <select  class="anc-span">
          <option>请选择</option>
        </select>
      </div>
    </div>

    <div class="anchors">
      <div class="anchor">
        <img src="img/anchor.jpg">
        <div class="anc-meg">
          <div>粉丝数<span>12万</span></div>
          <div>地域<span>北京</span></div>
          <div>在线人数<span>5万</span></div>
        </div>
      </div>
      <div class="anchor">
        <img src="img/anchor.jpg">
        <div class="anc-meg">
          <div>粉丝数<span>12万</span></div>
          <div>地域<span>北京</span></div>
          <div>在线人数<span>5万</span></div>
        </div>
      </div>
      <div class="anchor">
        <img src="img/anchor.jpg">
        <div class="anc-meg">
          <div>粉丝数<span>12万</span></div>
          <div>地域<span>北京</span></div>
          <div>在线人数<span>5万</span></div>
        </div>
      </div>
      <div class="anchor">
        <img src="img/anchor.jpg">
        <div class="anc-meg">
          <div>粉丝数<span>12万</span></div>
          <div>地域<span>北京</span></div>
          <div>在线人数<span>5万</span></div>
        </div>
      </div>
      <div class="anchor">
        <img src="img/anchor.jpg">
        <div class="anc-meg">
          <div>粉丝数<span>12万</span></div>
          <div>地域<span>北京</span></div>
          <div>在线人数<span>5万</span></div>
        </div>
      </div>
      <div class="anchor">
        <img src="img/anchor.jpg">
        <div class="anc-meg">
          <div>粉丝数<span>12万</span></div>
          <div>地域<span>北京</span></div>
          <div>在线人数<span>5万</span></div>
        </div>
      </div>
      <div class="anchor">
        <img src="img/anchor.jpg">
        <div class="anc-meg">
          <div>粉丝数<span>12万</span></div>
          <div>地域<span>北京</span></div>
          <div>在线人数<span>5万</span></div>
        </div>
      </div>
      <div class="anchor">
        <img src="img/anchor.jpg">
        <div class="anc-meg">
          <div>粉丝数<span>12万</span></div>
          <div>地域<span>北京</span></div>
          <div>在线人数<span>5万</span></div>
        </div>
      </div>
      <div class="anchor">
        <img src="img/anchor.jpg">
        <div class="anc-meg">
          <div>粉丝数<span>12万</span></div>
          <div>地域<span>北京</span></div>
          <div>在线人数<span>5万</span></div>
        </div>
      </div>
      <div class="anchor">
        <img src="img/anchor.jpg">
        <div class="anc-meg">
          <div>粉丝数<span>12万</span></div>
          <div>地域<span>北京</span></div>
          <div>在线人数<span>5万</span></div>
        </div>
      </div>
    </div>
  </div> -->


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


    <div class="row active-with-click">
    <?php
        if($anchors){

          foreach($anchors as $anchor){
    ?>
      <div class="col-md-4 col-sm-6 col-xs-12">
        <article class="material-card Red">
          <h2 data-toggle="modal" data-target="#anchor<?php echo $anchor -> anchor_id ?>">
            <span><?php echo $anchor -> anchor_name ;?></span>
            <strong>
              <i class="fa fa-fw fa-star"></i>
              <?php echo $anchor -> anchor_platformName ;?> @ID: <?php echo $anchor -> anchor_platformID ;?>
            </strong>
          </h2>
          <div class="mc-content">
            <div class="img-container">
              <img class="img-responsive" src="<?php echo $anchor -> anchor_photo ;?>" data-toggle="modal" data-target="#anchor<?php echo $anchor -> anchor_id ?>">
            </div>
            <div class="mc-description">

              <p class="bg-primary">地域：<?php echo $anchor -> anchor_region ;?> <?php echo $anchor -> anchor_province ;?></p>
              <p class="bg-primary">性别：<?php echo $anchor -> anchor_gender ;?></p>
              <p class="bg-primary">昵称：<?php echo $anchor -> anchor_platformNickname ;?></p>
              <p class="bg-primary">性质：<?php echo $anchor -> anchor_attr ;?></p>


            </div>
          </div>
          <a class="mc-btn-action">
            <i class="fa fa-bars"></i>
          </a>
          <div class="mc-footer">
            <p class="text-sucess">主播粉丝数: <span class="label label-info"><?php echo $anchor -> anchor_fansNumber ;?></span></p>
            <p class="text-sucess">主播行业: <span class="label label-warning"><?php echo $anchor -> anchor_accountCate ;?></span></p>

          </div>
        </article>
      </div>


<div class="modal fade" id="anchor<?php echo $anchor -> anchor_id ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">主播详细信息</h4>
      </div>
      <div class="modal-body">
        <blockquote>
        <p>如需了解详情,请拨打客服电话</p>
        <footer>客服电话：<i class="fa fa-phone"></i> <a class="tel" href="tel:400-8800-8800">400-8800-8800</a> <cite title="Source Title">feelingsmedie.com</cite></footer>
        </blockquote>
        <fieldset disabled>
        <div class="form-group">
          <div class="input-group col-md-11">
            <span  class="input-group-addon" id="aderBrand"><i class="fa fa-copyright"></i> 账户名称 </span>
            <input type="text"  class="form-control"  aria-describedby="aderBrand" value="<?php echo $anchor -> anchor_username ;?>">
          </div>
        </div>
        <div class="form-group">
          <div class="input-group col-md-11">
            <span class="input-group-addon" id="aderPro"><i class="fa fa-briefcase"></i> 直播平台 </span>
            <input type="text" class="form-control"  aria-describedby="aderPro" value="<?php echo $anchor -> anchor_platformName ;?>">
          </div>
        </div>
        <div class="form-group">
          <div class="input-group col-md-11">
            <span class="input-group-addon" id="anchorCate"><i class="fa fa-qrcode"></i> 直播平台ID </span>
            <input type="text" class="form-control"  aria-describedby="aderPro" value="<?php echo $anchor -> anchor_platformID ;?>">
          </div>
        </div>
        <div class="form-group">
          <div class="input-group col-md-11">
            <span class="input-group-addon" id="aderTime"><i class="fa fa-language"></i> 直播ID昵称 </span>
            <input type="text" class="form-control" aria-describedby="aderTime" value="<?php echo $anchor -> anchor_platformNickname ;?>">
          </div>
        </div>
        <div class="form-group">
          <div class="input-group col-md-11">
            <span class="input-group-addon" id="aderCycle"><i class="fa fa-venus-mars"></i> 性别</span>
            <input type="text" class="form-control"  aria-describedby="aderCycle" value="<?php echo $anchor -> anchor_gender ;?>">
          </div>
        </div>
        <div class="form-group">
          <div class="input-group col-md-11">
            <span class="input-group-addon" id="anchorNum"><i class="fa fa-file-pdf-o"></i> 真实姓名</span>
            <input type="text" class="form-control"  aria-describedby="anchorNum" value="<?php echo $anchor -> anchor_name ;?>">
          </div>
        </div>
        <div class="form-group">
          <div class="input-group col-md-11">
            <span class="input-group-addon" id="anchorCate"><i class="fa fa-phone"></i> 联系方式 </span>
            <input type="text" class="form-control"  aria-describedby="anchorCate" value="<?php echo $anchor -> anchor_tel ;?>">
          </div>
        </div>
        <div class="form-group">
          <div class="input-group col-md-11">
            <span class="input-group-addon" id="fansNum"><i class="fa fa-envelope-o"></i> 邮箱 </span>
            <input type="text" class="form-control"  aria-describedby="fansNum" value="<?php echo $anchor -> anchor_email ;?>">
          </div>
        </div>
        <div class="form-group">
          <div class="input-group col-md-11">
            <span class="input-group-addon" id="CoopCate"><i class="fa fa-plane"></i> 地域</span>
            <input type="text" class="form-control"  aria-describedby="CoopCate" value="<?php echo $anchor -> anchor_region ;?>  <?php echo $anchor -> anchor_province ;?>">
          </div>
        </div>

        <div class="form-group">
          <div class="input-group col-md-11">
            <span class="input-group-addon" id="CoopCate"><i class="fa fa-tags"></i> 账号分类</span>
            <input type="text" class="form-control"  aria-describedby="CoopCate" value="<?php echo $anchor -> anchor_accountCate ;?>">
          </div>
        </div>

        <div class="form-group">
          <div class="input-group col-md-11">
            <span class="input-group-addon" id="CoopCate"><i class="fa fa-users"></i> 粉丝数</span>
            <input type="text" class="form-control"  aria-describedby="CoopCate" value="<?php echo $anchor -> anchor_fansNumber ;?>">
          </div>
        </div>

        <div class="form-group">
          <div class="input-group col-md-11">
            <span class="input-group-addon" id="CoopCate"><i class="fa fa-terminal"></i> 主播性质</span>
            <input type="text" class="form-control"  aria-describedby="CoopCate" value="<?php echo $anchor -> anchor_attr ;?>">
          </div>
        </div>

        <div class="form-group">
          <div class="input-group col-md-11">
            <span class="input-group-addon" id="CoopCate"><i class="fa fa-credit-card-alt"></i> 银行账号</span>
            <input type="text" class="form-control"  aria-describedby="CoopCate" value="<?php echo $anchor -> anchor_bankAccount ;?>">
          </div>
        </div>


        <div class="form-group">
          <div class="input-group col-md-11">
            <span class="input-group-addon" id="otherNeed"><i class="fa fa-file-text-o"></i> 其他信息</span>
            <textarea class="form-control" rows="6" aria-describedby="otherNeed">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate, dolorum est? Soluta id repellendus porro, non tempore, voluptas laudantium tenetur facilis inventore enim qui, quis doloribus repudiandae nobis! Rem, qui.</textarea>
          </div>
        </div>
      </fieldset>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>
<?php
  }
    }
?>
      <!-- <div class="col-md-4 col-sm-6 col-xs-12">
        <article class="material-card Pink">
          <h2>
            <span>映客直播</span>
            <strong>
              <i class="fa fa-fw fa-star"></i>
              网络直播平台
            </strong>
          </h2>
          <div class="mc-content">
            <div class="img-container">
              <img class="img-responsive" src="img/anchorimg2.png">
            </div>
            <div class="mc-description">
              <p class="bg-primary">投放时间：2016年8月</p>
              <p class="bg-primary">投放周期：半年</p>
              <p class="bg-primary">需要主播数量：5人</p>
            </div>
          </div>
          <a class="mc-btn-action">
            <i class="fa fa-bars"></i>
          </a>
          <div class="mc-footer">
            <p class="text-sucess">主播粉丝数: <span class="label label-info">5000以上</span></p>
            <p class="text-sucess">主播行业: <span class="label label-warning">搞笑、秀场、萌宠、影视</span></p>
          </div>
        </article>
      </div>
      <div class="col-md-4 col-sm-6 col-xs-12">
        <article class="material-card Purple">
          <h2>
            <span>来疯啦</span>
            <strong>
              <i class="fa fa-fw fa-star"></i>
              优酷旗下直播平台
            </strong>
          </h2>
          <div class="mc-content">
            <div class="img-container">
              <img data-toggle="modal" data-target="#anchorNeed3" class="img-responsive" src="img/anchorimg3.png">
            </div>
            <div class="mc-description">
              <p class="bg-primary">投放时间：2016年8月</p>
              <p class="bg-primary">投放周期：半年</p>
              <p class="bg-primary">需要主播数量：5人</p>


            </div>
          </div>
          <a class="mc-btn-action">
            <i class="fa fa-bars"></i>
          </a>
          <div class="mc-footer">
            <p class="text-sucess">主播粉丝数: <span class="label label-info">5000以上</span></p>
            <p class="text-sucess">主播行业: <span class="label label-warning">搞笑、秀场、萌宠、影视</span></p>
          </div>
        </article>
      </div>
      <div class="col-md-4 col-sm-6 col-xs-12">
        <article class="material-card Deep-Purple">
          <h2>
            <span>YY直播</span>
            <strong>
              <i class="fa fa-fw fa-star"></i>
              游戏直播第一平台
            </strong>
          </h2>
          <div class="mc-content">
            <div class="img-container">
              <img class="img-responsive" src="img/anchorimg4.png">
            </div>
            <div class="mc-description">
              <p class="bg-primary">投放时间：2016年8月</p>
              <p class="bg-primary">投放周期：半年</p>
              <p class="bg-primary">需要主播数量：5人</p>
            </div>
          </div>
          <a class="mc-btn-action">
            <i class="fa fa-bars"></i>
          </a>
          <div class="mc-footer">
            <p class="text-sucess">主播粉丝数: <span class="label label-info">5000以上</span></p>
            <p class="text-sucess">主播行业: <span class="label label-warning">搞笑、秀场、萌宠、影视</span></p>
          </div>
        </article>
      </div>
      <div class="col-md-4 col-sm-6 col-xs-12">
        <article class="material-card Indigo">
          <h2>
            <span>战旗TV</span>
            <strong>
              <i class="fa fa-fw fa-star"></i>
              美女主播等你来秀
            </strong>
          </h2>
          <div class="mc-content">
            <div class="img-container">
              <img class="img-responsive" src="img/anchorimg5.png">
            </div>
            <div class="mc-description">
              <p class="bg-primary">投放时间：2016年8月</p>
              <p class="bg-primary">投放周期：半年</p>
              <p class="bg-primary">需要主播数量：5人</p>
            </div>
          </div>
          <a class="mc-btn-action">
            <i class="fa fa-bars"></i>
          </a>
          <div class="mc-footer">
            <p class="text-sucess">主播粉丝数: <span class="label label-info">5000以上</span></p>
            <p class="text-sucess">主播行业: <span class="label label-warning">搞笑、秀场、萌宠、影视</span></p>
          </div>
        </article>
      </div>
      <div class="col-md-4 col-sm-6 col-xs-12">
        <article class="material-card Blue">
          <h2>
            <span>斗鱼TV</span>
            <strong>
              <i class="fa fa-fw fa-star"></i>
              第一直播平台
            </strong>
          </h2>
          <div class="mc-content">
            <div class="img-container">
              <img class="img-responsive" src="img/anchorimg6.png">
            </div>
            <div class="mc-description">
              <p class="bg-primary">投放时间：2016年8月</p>
              <p class="bg-primary">投放周期：半年</p>
              <p class="bg-primary">需要主播数量：5人</p>
            </div>
          </div>
          <a class="mc-btn-action">
            <i class="fa fa-bars"></i>
          </a>
          <div class="mc-footer">
            <p class="text-sucess">主播粉丝数: <span class="label label-info">5000以上</span></p>
            <p class="text-sucess">主播行业: <span class="label label-warning">搞笑、秀场、萌宠、影视</span></p>
          </div>
        </article>
      </div> -->
    </div>
    </div>

    <div class="panel-footer">
    <kbd>共有<?php echo $count;?>条记录</kbd>
      <nav>
          <!-- <ul class="pagination">
              <li class="disabled"><a href="#" aria-label="Previous"><span aria-hidden="true">«</span></a></li>
              <li class="active"><a href="#">1 <span class="sr-only">(current)</span></a></li>
              <li><a href="#">2</a></li>
              <li><a href="#">3</a></li>
              <li><a href="#">4</a></li>
              <li><a href="#">5</a></li>
              <li><a href="#">...</a></li>
              <li><a href="#" aria-label="Next"><span aria-hidden="true">»</span></a></li>
           </ul> -->


           <?php echo $this -> pagination -> create_links();?>

           <!-- <code><span class="label label-primary"><?php echo $count; ;?></span></code>

           <kbd><?php echo $count; ;?></kbd> -->


      </nav>
    </div>

  </div>



    <!-- <nav>
        <ul class="pagination">
            <li class="disabled"><a href="#" aria-label="Previous"><span aria-hidden="true">«</span></a></li>
            <li class="active"><a href="#">1 <span class="sr-only">(current)</span></a></li>
            <li><a href="#">2</a></li>
            <li><a href="#">3</a></li>
            <li><a href="#">4</a></li>
            <li><a href="#">5</a></li>
            <li><a href="#">...</a></li>
            <li><a href="#" aria-label="Next"><span aria-hidden="true">»</span></a></li>
         </ul>
    </nav> -->

</div>






<!-- Modal -->
<div class="modal fade" id="anchorNeed3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">主播详细信息</h4>
      </div>
      <div class="modal-body">
        <blockquote>
        <p>如需了解详情,请拨打客服电话</p>
        <footer>客服电话：<i class="fa fa-phone"></i> <a class="tel" href="tel:400-8800-8800">400-8800-8800</a> <cite title="Source Title">feelingsmedie.com</cite></footer>
        </blockquote>
        <fieldset disabled>
        <div class="form-group">
          <div class="input-group col-md-11">
            <span  class="input-group-addon" id="aderBrand"><i class="fa fa-copyright"></i> 账户名称 </span>
            <input type="text"  class="form-control"  aria-describedby="aderBrand" value="来疯啦">
          </div>
        </div>
        <div class="form-group">
          <div class="input-group col-md-11">
            <span class="input-group-addon" id="aderPro"><i class="fa fa-briefcase"></i> 直播平台 </span>
            <input type="text" class="form-control"  aria-describedby="aderPro" value="斗鱼TV">
          </div>
        </div>
        <div class="form-group">
          <div class="input-group col-md-11">
            <span class="input-group-addon" id="anchorCate"><i class="fa fa-qrcode"></i> 直播平台ID </span>
            <input type="text" class="form-control"  aria-describedby="aderPro" value="DY023630">
          </div>
        </div>
        <div class="form-group">
          <div class="input-group col-md-11">
            <span class="input-group-addon" id="aderTime"><i class="fa fa-language"></i> 直播ID昵称 </span>
            <input type="text" class="form-control" aria-describedby="aderTime" value="@奔跑的脆皮肠">
          </div>
        </div>
        <div class="form-group">
          <div class="input-group col-md-11">
            <span class="input-group-addon" id="aderCycle"><i class="fa fa-venus-mars"></i> 性别</span>
            <input type="text" class="form-control"  aria-describedby="aderCycle" value="女">
          </div>
        </div>
        <div class="form-group">
          <div class="input-group col-md-11">
            <span class="input-group-addon" id="anchorNum"><i class="fa fa-file-pdf-o"></i> 真实姓名</span>
            <input type="text" class="form-control"  aria-describedby="anchorNum" value="皇甫小乔">
          </div>
        </div>
        <div class="form-group">
          <div class="input-group col-md-11">
            <span class="input-group-addon" id="anchorCate"><i class="fa fa-phone"></i> 联系方式 </span>
            <input type="text" class="form-control"  aria-describedby="anchorCate" value="15765505994">
          </div>
        </div>
        <div class="form-group">
          <div class="input-group col-md-11">
            <span class="input-group-addon" id="fansNum"><i class="fa fa-envelope-o"></i> 邮箱 </span>
            <input type="text" class="form-control"  aria-describedby="fansNum" value="lw.588@163.com">
          </div>
        </div>
        <div class="form-group">
          <div class="input-group col-md-11">
            <span class="input-group-addon" id="CoopCate"><i class="fa fa-plane"></i> 地域</span>
            <input type="text" class="form-control"  aria-describedby="CoopCate" value="中国大陆 江苏省">
          </div>
        </div>

        <div class="form-group">
          <div class="input-group col-md-11">
            <span class="input-group-addon" id="CoopCate"><i class="fa fa-tags"></i> 账号分类</span>
            <input type="text" class="form-control"  aria-describedby="CoopCate" value="体育 艺术 健康 财经">
          </div>
        </div>

        <div class="form-group">
          <div class="input-group col-md-11">
            <span class="input-group-addon" id="CoopCate"><i class="fa fa-users"></i> 粉丝数</span>
            <input type="text" class="form-control"  aria-describedby="CoopCate" value="5009923">
          </div>
        </div>

        <div class="form-group">
          <div class="input-group col-md-11">
            <span class="input-group-addon" id="CoopCate"><i class="fa fa-terminal"></i> 主播性质</span>
            <input type="text" class="form-control"  aria-describedby="CoopCate" value="个人主播">
          </div>
        </div>

        <div class="form-group">
          <div class="input-group col-md-11">
            <span class="input-group-addon" id="CoopCate"><i class="fa fa-credit-card-alt"></i> 银行账号</span>
            <input type="text" class="form-control"  aria-describedby="CoopCate" value="6222023500031676733">
          </div>
        </div>


        <div class="form-group">
          <div class="input-group col-md-11">
            <span class="input-group-addon" id="otherNeed"><i class="fa fa-file-text-o"></i> 其他信息</span>
            <textarea class="form-control" rows="6" aria-describedby="otherNeed">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate, dolorum est? Soluta id repellendus porro, non tempore, voluptas laudantium tenetur facilis inventore enim qui, quis doloribus repudiandae nobis! Rem, qui.</textarea>
          </div>
        </div>
      </fieldset>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>





<script src="js/jquery-1.11.3.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/anchor.js"></script>
<script src="js/owl.carousel.min.js"></script>



<script src="js/jquery.material-cards.min.js"></script>
<script>
  $(function() {


    function getRandom(n){
        return Math.floor(Math.random()*n+1);
    }





    $('.material-card').materialCard({
      icon_close: 'fa-chevron-left',
      icon_open: 'fa-search',
      icon_spin: 'fa-spin-fast',
      card_activator: 'click'
    });

//        $('.active-with-click .material-card').materialCard();
    window.setTimeout(function() {
      $('.material-card:eq('+getRandom(6)+')').materialCard('open');
    }, 2000);

    window.setTimeout(function() {
      $('.material-card:eq('+getRandom(6)+')').materialCard('open');
    }, 2000);

    window.setTimeout(function() {
      $('.material-card:eq('+getRandom(6)+')').materialCard('open');
    }, 2000);


    // $('.material-card').on('shown.material-card show.material-card hide.material-card hidden.material-card', function (event) {
    //  console.log(event.type, event.namespace, $(this));
    // });
  });
</script>




  </body>
</html>
