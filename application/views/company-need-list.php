<?php
    $companyInfo = $this -> session -> userdata('companyInfo');

    if(!$companyInfo){
        redirect("company/company_reg");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <base href="<?php echo site_url();?>">;
  <title>媒体咨询公司需求列表</title>
  <link rel="stylesheet" href="css/bootstrap.min.css" />
  <link rel="stylesheet" href="css/font-awesome.min.css" />
  <link rel="stylesheet" href="css/company-need-list.css" />
  <link rel="stylesheet" href="css/material-cards.css" />
  <link rel="stylesheet" href="css/style.css" />
  <link rel="stylesheet" href="css/blue.css" />

  <style>


      .a-tel{
        color: #337ab7;
        text-decoration: none;
      }
      .tag{
        display: inline-block;
        margin-right: 20px;
        
      }
      .label{
        display: inline-block;
        margin-bottom: 10px;
      }
      .tag-bottom{
        margin-bottom: 70px;
      }
      .text{
        margin: 0;
      }
      p.bg-primary{
        margin-bottom: 18px;
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
<!--		  <li><a href="index5.html" target="_blank">媒体咨询公司名称</a></li>-->

          <li><a href="javascript:;"><?php echo  $companyInfo -> company_name;?></a></li>

			    <li class="active"><a href="javascript:;">媒体咨询公司需求列表</a></li>
			  </ul>

        <div class="label labe-tel"><i class="fa fa-phone"></i> <a class="a-tel" href="tel:4006668800">合作咨询：400-666-8800</a></div>

        <ul class='nav navbar-nav navbar-right'>
<!--        <a class="btn btn-success navbar-btn login-btn" href="anchor-need-profile.html">账号信息</a>-->
<!--        <a class="btn btn-primary navbar-btn login-btn" href="ader-setting.html">账号管理</a>-->
<!--        <a class="btn btn-default navbar-btn login-btn"  href="#">退出登录</a>-->

            <a class="btn btn-success navbar-btn login-btn" href="company/company_need_profile">账号信息</a>
            <a class="btn btn-primary navbar-btn login-btn" href="company/company_setting/<?php echo $companyInfo -> company_id; ?>">账号管理</a>
            <a class="btn btn-default navbar-btn login-btn"  href="company/login_out">退出登录</a>

        <a class="btn navbar-btn js-login-btn" href="#">Register</a>

        </ul>
			</nav>
		</div>
	</header>



  <div class="container cate-container">
    	<div class="row">
        <div class="form-group">
            <label for="region" class="col-sm-2 control-label label-warning tag">广告主行业分类</label>
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
      <a href="company/company_need_list" class="label label-danger">全部</a>
      <a href="company/search_needs_by_aderCate?aderCate_id=1" class="label label-primary">快消</a>
      <a href="company/search_needs_by_aderCate?aderCate_id=2" class="label label-primary">日化</a>
      <a href="company/search_needs_by_aderCate?aderCate_id=3" class="label label-primary">电商</a>
      <a href="company/search_needs_by_aderCate?aderCate_id=4" class="label label-primary">影视</a>
      <a href="company/search_needs_by_aderCate?aderCate_id=5" class="label label-primary">互联网</a>
      <a href="company/search_needs_by_aderCate?aderCate_id=6" class="label label-primary">汽车</a>
      <a href="company/search_needs_by_aderCate?aderCate_id=7" class="label label-primary">金融</a>
      <a href="company/search_needs_by_aderCate?aderCate_id=8" class="label label-primary">医疗</a>
      <a href="company/search_needs_by_aderCate?aderCate_id=9" class="label label-primary">文化艺术</a>
      <a href="company/search_needs_by_aderCate?aderCate_id=10"  class="label label-primary">服装</a>
      <a href="company/search_needs_by_aderCate?aderCate_id=11"  class="label label-primary">珠宝</a>
      <a href="company/search_needs_by_aderCate?aderCate_id=12"  class="label label-primary">数码</a>
      <a href="company/search_needs_by_aderCate?aderCate_id=13"  class="label label-primary">电脑</a>
      <a href="company/search_needs_by_aderCate?aderCate_id=14"  class="label label-primary">APP</a>
      <a href="company/search_needs_by_aderCate?aderCate_id=15"  class="label label-primary">地产</a>
      <a href="company/search_needs_by_aderCate?aderCate_id=16"  class="label label-primary">旅行</a>
      <a href="company/search_needs_by_aderCate?aderCate_id=17"  class="label label-primary">教育</a>
      <a href="company/search_needs_by_aderCate?aderCate_id=18"  class="label label-primary">餐饮</a>
      </div>





        <div class="form-group">
            <label for="region" class="col-sm-2 control-label label-info tag">广告主要求硬广渠道</label>
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
              <a href="company/company_need_list" class="label label-danger">全部</a>
              <a href="company/search_needs_by_resource?resourceCate_id=1" class="label label-warning">楼宇</a>
              <a href="company/search_needs_by_resource?resourceCate_id=2" class="label label-warning">公交</a>
              <a href="company/search_needs_by_resource?resourceCate_id=3" class="label label-warning">机场</a>
              <a href="company/search_needs_by_resource?resourceCate_id=4" class="label label-warning">户外楼体LED大屏</a>
              <a href="company/search_needs_by_resource?resourceCate_id=5" class="label label-warning">校园</a>
              <a href="company/search_needs_by_resource?resourceCate_id=6" class="label label-warning">地铁</a>
              <a href="company/search_needs_by_resource?resourceCate_id=7" class="label label-warning">院线</a>
              <a href="company/search_needs_by_resource?resourceCate_id=8" class="label label-warning">擎天柱</a>
              <a href="company/search_needs_by_resource?resourceCate_id=9" class="label label-warning">自媒体</a>
        </div>


        <div class="form-group">
            <label for="region" class="col-sm-2 control-label label-success tag tag-bottom">广告主投放地域</label>
              <!-- <select name="country" id="country" class="form-control type-select">
                <option value="">地域城市</option>
                <option value="北京">北京</option>
                <option value="上海">上海</option>
                <option value="广州">广州</option>
                <option value="深圳">深圳</option>
                <option value="天津">天津</option>
                <option value="重庆">重庆</option>
                <option value="石家庄">石家庄</option>
                <option value="太原">太原</option>
                <option value="沈阳">沈阳</option>
                <option value="长春">长春</option>
                <option value="哈尔滨">哈尔滨</option>
                <option value="南京">南京</option>
                <option value="杭州">杭州</option>
                <option value="合肥">合肥</option>
                <option value="福州">福州</option>
                <option value="南昌">南昌</option>
                <option value="济南">济南</option>
                <option value="郑州">郑州</option>
                <option value="武汉">武汉</option>
                <option value="长沙">长沙</option>
                <option value="成都">成都</option>
                <option value="贵阳">贵阳</option>
                <option value="昆明">昆明</option>
                <option value="西安">西安</option>
                <option value="南宁">南宁</option>
                <option value="呼和浩特">呼和浩特</option>
                <option value="乌鲁木齐">乌鲁木齐</option>
                <option value="大连">大连</option>
                <option value="青岛">青岛</option>
              </select> -->
        <a href="company/company_need_list" class="label label-danger">全部</a>
        <a href="company/search_needs_by_city?city_id=1" class="label label-success">北京</a>
        <a href="company/search_needs_by_city?city_id=2" class="label label-success">上海</a>
        <a href="company/search_needs_by_city?city_id=3" class="label label-success">广州</a>
        <a href="company/search_needs_by_city?city_id=4" class="label label-success">深圳</a>
        <a href="company/search_needs_by_city?city_id=5" class="label label-success">天津</a>
        <a href="company/search_needs_by_city?city_id=6" class="label label-success">重庆</a>
        <a href="company/search_needs_by_city?city_id=7" class="label label-success">太原</a>
        <a href="company/search_needs_by_city?city_id=8" class="label label-success">沈阳</a>
        <a href="company/search_needs_by_city?city_id=9" class="label label-success">长春</a>
        <a href="company/search_needs_by_city?city_id=10" class="label label-success">南京</a>
        <a href="company/search_needs_by_city?city_id=11" class="label label-success">杭州</a>
        <a href="company/search_needs_by_city?city_id=12" class="label label-success">合肥</a>
        <a href="company/search_needs_by_city?city_id=13" class="label label-success">福州</a>
        <a href="company/search_needs_by_city?city_id=14" class="label label-success">南昌</a>
        <a href="company/search_needs_by_city?city_id=15" class="label label-success">济南</a>
        <a href="company/search_needs_by_city?city_id=16" class="label label-success">郑州</a>
        <a href="company/search_needs_by_city?city_id=17" class="label label-success">武汉</a>
        <a href="company/search_needs_by_city?city_id=18" class="label label-success">长沙</a>
        <a href="company/search_needs_by_city?city_id=19" class="label label-success">成都</a>
        <a href="company/search_needs_by_city?city_id=20" class="label label-success">贵阳</a>
        <a href="company/search_needs_by_city?city_id=21" class="label label-success">昆明</a>
        <a href="company/search_needs_by_city?city_id=22" class="label label-success">西安</a>
        <a href="company/search_needs_by_city?city_id=23" class="label label-success">南宁</a>
        <a href="company/search_needs_by_city?city_id=24" class="label label-success">大连</a>
        <a href="company/search_needs_by_city?city_id=25" class="label label-success">青岛</a>
        <a href="company/search_needs_by_city?city_id=26" class="label label-success">石家庄</a>
        <a href="company/search_needs_by_city?city_id=27" class="label label-success">哈尔滨</a>
        <a href="company/search_needs_by_city?city_id=28" class="label label-success">乌鲁木齐</a>
        <a href="company/search_needs_by_city?city_id=29" class="label label-success">呼和浩特</a>
        <a href="company/search_needs_by_city?city_id=30" class="label label-success">其他</a>
          </div>

    </div>
</div>

<div class="container need-container">
  <div class="panel panel-info">
    <div class="panel-heading">
      <h3 class="panel-title">需求列表</h3>

    </div>
    <div class="panel-body">
      <blockquote>
      <p>如需了解详情,请拨打客服电话</p>
      <footer>客服电话：<i class="fa fa-phone"></i> <a class="tel" href="tel:400-8800-8800">400-8800-8800</a> <cite title="Source Title">feelingsmedie.com</cite></footer>
      </blockquote>


      <div class="row active-with-click">
    <?php
      foreach($companys as $company){
    ?>
      <div class="col-md-4 col-sm-6 col-xs-12">
        <article class="material-card Red">
          <h2>
            <span><?php echo $company -> companyNeed_brand;?></span>
            <strong>
              <i class="fa fa-fw fa-star"></i>
              <?php echo $company -> companyNeed_pro;?>
            </strong>
          </h2>
          <div class="mc-content">
            <div class="img-container">
              <img 
              data-toggle="modal" 
              data-target="#companyNeed<?php echo $company -> companyNeed_id;?>" 
              class="img-responsive" 
              src="<?php echo $company -> companyNeed_photo;?>">
            </div>
            <div class="mc-description">
                    <p class="bg-primary">投放时间：<?php echo $company -> companyNeed_time;?></p>
                    <p class="bg-primary">投放周期：<?php echo $company -> companyNeed_cycle;?></p>
                    <p class="bg-primary">投放预算：<?php echo $company -> companyNeed_bud;?></p>
                    <p class="bg-primary">广告主行业：<?php echo mb_substr($company -> aderCateString,0,12)."......"?></span></p>
            </div>
          </div>
          <a class="mc-btn-action">
            <i class="fa fa-bars"></i>
          </a>
          <div class="mc-footer">
            <p class="text text-sucess">投放渠道： <span class="label label-info"><?php echo mb_substr($company -> aderResourceCateString,0,20)."......";?></span></p>
            <p class="text text-sucess">投放城市：<span class="label label-warning"><?php echo mb_substr($company -> aderCityString,0,20)."......";?></span></p>
                  
          </div>
        </article>
      </div>
   

    <!-- Modal -->
<div class="modal fade" id="companyNeed<?php echo $company -> companyNeed_id;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">媒体公司需求</h4>
      </div>
      <div class="modal-body">
        <blockquote>
        <p>如需了解详情,请拨打客服电话</p>
        <footer>客服电话：<i class="fa fa-phone"></i> <a class="tel" href="tel:400-8800-8800">400-8800-8800</a> <cite title="Source Title">feelingsmedie.com</cite></footer>
        </blockquote>
        <fieldset disabled>
          <div class="form-group">
            <div class="input-group col-md-11">
              <span  class="input-group-addon" id="aderBrand"><i class="fa fa-copyright"></i> 广告主品牌 <i class="fa fa-asterisk"></i></span>
              <input type="text"  class="form-control" aria-describedby="aderBrand" value="<?php echo $company -> companyNeed_brand;?>">
            </div>
          </div>

          <div class="form-group">
            <div class="input-group col-md-11">
              <span class="input-group-addon" id="aderPro"><i class="fa fa-briefcase"></i> 广告主宣传产品 <i class="fa fa-asterisk"></i></span>
              <input type="text" class="form-control" aria-describedby="aderPro" value="<?php echo $company -> companyNeed_pro;?>">
            </div>
          </div>

          <div class="form-group">
            <div class="input-group col-md-11">
              <span class="input-group-addon" id="aderInd"><i class="fa fa-building"></i> 广告主产品行业 <i class="fa fa-asterisk"></i></span>
              <input type="text" class="form-control" aria-describedby="aderInd" value="<?php echo $company -> aderCateString;?>">
            </div>
          </div>

          <div class="form-group">
            <div class="input-group col-md-11">
              <span class="input-group-addon" id="aderTime"><i class="fa fa-clock-o"></i> 预计投放时间 <i class="fa fa-asterisk"></i></span>
              <input type="text" class="form-control" aria-describedby="aderTime" value="<?php echo $company -> companyNeed_time;?>">
            </div>
          </div>

          <div class="form-group">
            <div class="input-group col-md-11">
              <span class="input-group-addon" id="aderCycle"><i class="fa fa-calendar-check-o"></i> 预计投放周期</span>
              <input type="text" class="form-control" aria-describedby="aderCycle" value="<?php echo $company -> companyNeed_cycle;?>">
            </div>
          </div>

          <div class="form-group">
            <div class="input-group col-md-11">
              <span class="input-group-addon" id="aderBud"><i class="fa fa-cny"></i> 投放预算</span>
              <input type="text" class="form-control" aria-describedby="aderBud" value="<?php echo $company -> companyNeed_bud;?>">
            </div>
          </div>

          <div class="form-group">
            <div class="input-group col-md-11">
              <span class="input-group-addon" id="anchorCate"><i class="fa fa-navicon"></i> 需要资源渠道类型 <i class="fa fa-asterisk"></i></span>
              <input type="text" class="form-control" aria-describedby="anchorCate" value="<?php echo $company -> aderResourceCateString;?>">
            </div>
          </div>

          <div class="form-group">
            <div class="input-group col-md-11">
              <span class="input-group-addon" id="aderCity"><i class="fa fa-plane"></i> 投放城市 <i class="fa fa-asterisk"></i></span>
              <input type="text" class="form-control" aria-describedby="aderCity" value="<?php echo $company -> aderCityString;?>">
            </div>
          </div>

          <div class="form-group">
            <div class="input-group col-md-11">
              <span class="input-group-addon" id="otherNeed"><i class="fa fa-file-text-o"></i> 其他需求</span>
              <textarea class="form-control" rows="5" aria-describedby="otherNeed"><?php echo $company -> companyNeed_others;?></textarea>
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
?>
</div>
    </div>


    <div class="panel-footer">
    <kbd>共有<?php echo $count;?>条记录</kbd>
      <nav>
      <?php echo $this -> pagination -> create_links();?>
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
<div class="modal fade" id="companyNeed1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">熊猫TV媒体公司需求</h4>
      </div>
      <div class="modal-body">
        <blockquote>
        <p>如需了解详情,请拨打客服电话</p>
        <footer>客服电话：<i class="fa fa-phone"></i> <a class="tel" href="tel:400-8800-8800">400-8800-8800</a> <cite title="Source Title">feelingsmedie.com</cite></footer>
        </blockquote>
        <fieldset disabled>
          <div class="form-group">
            <div class="input-group col-md-11">
              <span  class="input-group-addon" id="aderBrand"><i class="fa fa-copyright"></i> 广告主品牌 <i class="fa fa-asterisk"></i></span>
              <input type="text"  class="form-control" aria-describedby="aderBrand" value="熊猫TV">
            </div>
          </div>

          <div class="form-group">
            <div class="input-group col-md-11">
              <span class="input-group-addon" id="aderPro"><i class="fa fa-briefcase"></i> 广告主宣传产品 <i class="fa fa-asterisk"></i></span>
              <input type="text" class="form-control" aria-describedby="aderPro" value="自媒体">
            </div>
          </div>

          <div class="form-group">
            <div class="input-group col-md-11">
              <span class="input-group-addon" id="aderInd"><i class="fa fa-building"></i> 广告主产品行业 <i class="fa fa-asterisk"></i></span>
              <input type="text" class="form-control" aria-describedby="aderInd" value="快消、数码、电商">
            </div>
          </div>

          <div class="form-group">
            <div class="input-group col-md-11">
              <span class="input-group-addon" id="aderTime"><i class="fa fa-clock-o"></i> 预计投放时间 <i class="fa fa-asterisk"></i></span>
              <input type="text" class="form-control" aria-describedby="aderTime" value="2016年9月">
            </div>
          </div>

          <div class="form-group">
            <div class="input-group col-md-11">
              <span class="input-group-addon" id="aderCycle"><i class="fa fa-calendar-check-o"></i> 预计投放周期</span>
              <input type="text" class="form-control" aria-describedby="aderCycle" value="9个月">
            </div>
          </div>

          <div class="form-group">
            <div class="input-group col-md-11">
              <span class="input-group-addon" id="aderBud"><i class="fa fa-cny"></i> 投放预算</span>
              <input type="text" class="form-control" aria-describedby="aderBud" value="50000元">
            </div>
          </div>

          <div class="form-group">
            <div class="input-group col-md-11">
              <span class="input-group-addon" id="anchorCate"><i class="fa fa-navicon"></i> 需要资源渠道类型 <i class="fa fa-asterisk"></i></span>
              <input type="text" class="form-control" aria-describedby="anchorCate" value="地铁、学校、擎天柱">
            </div>
          </div>

          <div class="form-group">
            <div class="input-group col-md-11">
              <span class="input-group-addon" id="aderCity"><i class="fa fa-plane"></i> 投放城市 <i class="fa fa-asterisk"></i></span>
              <input type="text" class="form-control" aria-describedby="aderCity" value="广州、上海、深圳、杭州、乌鲁木齐、北京、哈尔滨、贵阳、天津、呼和浩特、成都、福州、昆明、太原、郑州、沈阳">
            </div>
          </div>

          <div class="form-group">
            <div class="input-group col-md-11">
              <span class="input-group-addon" id="otherNeed"><i class="fa fa-file-text-o"></i> 其他需求</span>
              <textarea class="form-control" rows="5" aria-describedby="otherNeed">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Temporibus odio vitae, velit modi facere. Minus nulla saepe nobis eius consequuntur nisi perferendis ex. Esse, magni eligendi libero ullam est beatae.</textarea>
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
		// 	console.log(event.type, event.namespace, $(this));
		// });
	});
</script>
<!-- <script src="js/animitter.js"></script>
<script src="js/dat-gui.js"></script>
<script src="js/toxiclibs.js"></script>
<script src="js/slogan-4.js"></script> -->





</body>
</html>
