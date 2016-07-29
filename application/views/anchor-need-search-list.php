<?php
    $anchorInfo = $this -> session -> userdata('anchorInfo');
    if(!$anchorInfo){
        redirect('anchor/anchor_reg');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <base href="<?php echo site_url(); ?>">
  <title>主播需求信息分类页面</title>
  <link rel="stylesheet" href="css/bootstrap.min.css" />
  <link rel="stylesheet" href="css/font-awesome.min.css" />
  <link rel="stylesheet" href="css/anchor-need-list.css" />
  <link rel="stylesheet" href="css/material-cards.css" />
  <link rel="stylesheet" href="css/style.css" />
  <link rel="stylesheet" href="css/blue.css" />

  <style>
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
      .control-label{
        color: #fff;
      }
      .img-responsive{
        cursor: pointer;
        width: 100%;
        /*height: 100%;*/
      }

      .need-container{
        margin-top: 50px;

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

      .tag{
        display: inline-block;
        margin-right: 20px;
        margin-bottom: 70px;
      }

      .tag-city{
        margin-bottom: 60px;
      }
      .type-select{
        width: 150px;
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
          <li><a href="#" target="_blank">首页</a></li>
          <li class="active" ><a href="anchor/anchor_need_list"><?php echo $anchorInfo -> anchor_name ; ?></a></li>
          <!-- <li class="active"><a href="#">主播资源合作</a></li> -->
        </ul>

        <div class="label labe-tel"><i class="fa fa-phone"></i> <a class="a-tel" href="tel:4006668800">合作咨询：400-666-8800</a></div>

        <ul class='nav navbar-nav navbar-right'>
          <a class="btn btn-success navbar-btn login-btn" href="anchor/anchor_profile/<?php echo $anchorInfo -> anchor_id; ?>">账号信息</a>
          <a class="btn btn-primary navbar-btn login-btn" href="anchor/anchor_setting/<?php echo $anchorInfo -> anchor_id; ?>">账号管理</a>
          <a class="btn btn-default navbar-btn login-btn"  href="anchor/logout">退出登录</a>
          <a class="btn navbar-btn js-login-btn" href="#">Register</a>

        </ul>
      </nav>
    </div>
  </header>


  <div class="container">
    	<div class="row">
        <div class="form-group">
            <label for="region" class="col-sm-2 control-label label-success tag">广告主行业分类</label>
              <!-- <select name="country" id="country" class="form-control type-select">
                <option value="">行业分类</option>
                <option value="1">快消</option>
                <option value="2">日化</option>
                <option value="3">电商</option>
                <option value="4">影视</option>
                <option value="5">互联网</option>
                <option value="6">汽车</option>
                <option value="7">金融</option>
                <option value="8">医疗</option>
                <option value="9">文化艺术</option>
                <option value="10">服装</option>
                <option value="11">珠宝</option>
                <option value="12">数码</option>
                <option value="13">电脑</option>
                <option value="14">APP</option>
                <option value="15">地产</option>
                <option value="16">旅行</option>
                <option value="17">教育</option>
                <option value="18">餐饮</option>
              </select> -->
            <div id="link">
              <a href="anchor/anchor_need_list" class="label label-danger">全部</a>
              <a href="anchor/search_needs?aderCate_id=1" class="label label-primary">快消</a>
              <a href="anchor/search_needs?aderCate_id=2" class="label label-primary">日化</a>
              <a href="anchor/search_needs?aderCate_id=3" class="label label-primary">电商</a>
              <a href="anchor/search_needs?aderCate_id=4" class="label label-primary">影视</a>
              <a href="anchor/search_needs?aderCate_id=5" class="label label-primary">互联网</a>
              <a href="anchor/search_needs?aderCate_id=6" class="label label-primary">汽车</a>
              <a href="anchor/search_needs?aderCate_id=7" class="label label-primary">金融</a>
              <a href="anchor/search_needs?aderCate_id=8" class="label label-primary">医疗</a>
              <a href="anchor/search_needs?aderCate_id=9" class="label label-primary">文化艺术</a>
              <a href="anchor/search_needs?aderCate_id=10"  class="label label-primary">服装</a>
              <a href="anchor/search_needs?aderCate_id=11"  class="label label-primary">珠宝</a>
              <a href="anchor/search_needs?aderCate_id=12"  class="label label-primary">数码</a>
              <a href="anchor/search_needs?aderCate_id=13"  class="label label-primary">电脑</a>
              <a href="anchor/search_needs?aderCate_id=14"  class="label label-primary">APP</a>
              <a href="anchor/search_needs?aderCate_id=15"  class="label label-primary">地产</a>
              <a href="anchor/search_needs?aderCate_id=16"  class="label label-primary">旅行</a>
              <a href="anchor/search_needs?aderCate_id=17"  class="label label-primary">教育</a>
              <a href="anchor/search_needs?aderCate_id=18"  class="label label-primary">餐饮</a>
            </div>
              
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
          if($anchorNeeds){
          foreach($anchorNeeds as $needs){ 
      ?>

			<div class="col-md-4 col-sm-6 col-xs-12" data-toggle="modal" data-target="#anchorNeed<?php echo $needs -> anchorNeed_id ?>">
				<article class="material-card Red">
					<h2 data-toggle="modal" data-target="#anchorNeed<?php echo $needs -> anchorNeed_id ?>">
						<span><?php echo $needs -> anchorNeed_brand ;?></span>
						<strong>
							<i class="fa fa-fw fa-star"></i>
							<?php echo $needs -> anchorNeed_pro ;?>
						</strong>
					</h2>
					<div class="mc-content">
						<div class="img-container">
							<img data-toggle="modal" data-target="#anchorNeed<?php echo $needs -> anchorNeed_id ?>" class="img-responsive" src="<?php echo $needs -> anchorNeed_logo ;?>">
						</div>
						<div class="mc-description">
              <p class="bg-primary">投放时间：<?php echo $needs -> anchorNeed_time ;?></p>
              <p class="bg-primary">投放周期：<?php echo $needs -> anchorNeed_cycle ;?></p>
              <p class="bg-primary">需要主播数量：<?php echo $needs -> anchorNeed_number ;?></p>
						</div>
					</div>
					<a class="mc-btn-action">
						<i class="fa fa-bars"></i>
					</a>
					<div class="mc-footer">
            <p class="text-sucess">主播粉丝数: <span class="label label-info"><?php echo $needs -> anchorNeed_fansNumber ;?></span></p>
            <p class="text-sucess">主播行业: <span class="label label-warning"><?php echo $needs -> anchorNeed_anchorCates ;?></span></p>

					</div>
				</article>
			</div>


<div class="modal fade" id="anchorNeed<?php echo $needs -> anchorNeed_id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">主播需求</h4>
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
            <input type="text"  class="form-control"  aria-describedby="aderBrand" value="<?php echo $needs -> anchorNeed_brand ;?>">
          </div>
        </div>
        <div class="form-group">
          <div class="input-group col-md-11">
            <span class="input-group-addon" id="aderPro"><i class="fa fa-briefcase"></i> 广告主宣传产品 <i class="fa fa-asterisk"></i></span>
            <input type="text" class="form-control"  aria-describedby="aderPro" value="<?php echo $needs -> anchorNeed_pro ;?>">
          </div>
        </div>
        <div class="form-group">
          <div class="input-group col-md-11">
            <span class="input-group-addon" id="anchorCate"><i class="fa fa-connectdevelop"></i> 广告主行业 <i class="fa fa-asterisk"></i></span>
            <input type="text" class="form-control"  aria-describedby="aderPro" value="<?php echo $needs -> anchorNeed_aderCates ;?>">
          </div>
        </div>
        <div class="form-group">
          <div class="input-group col-md-11">
            <span class="input-group-addon" id="aderTime"><i class="fa fa-clock-o"></i> 预计投放时间 <i class="fa fa-asterisk"></i></span>
            <input type="text" class="form-control" aria-describedby="aderTime" value="<?php echo $needs -> anchorNeed_time ;?>">
          </div>
        </div>
        <div class="form-group">
          <div class="input-group col-md-11">
            <span class="input-group-addon" id="aderCycle"><i class="fa fa-calendar-check-o"></i> 预计投放周期</span>
            <input type="text" class="form-control"  aria-describedby="aderCycle" value="<?php echo $needs -> anchorNeed_cycle ;?>">
          </div>
        </div>
        <div class="form-group">
          <div class="input-group col-md-11">
            <span class="input-group-addon" id="anchorNum"><i class="fa fa-users"></i> 需要主播数量</span>
            <input type="text" class="form-control"  aria-describedby="anchorNum" value="<?php echo $needs -> anchorNeed_number ;?>">
          </div>
        </div>
        <div class="form-group">
          <div class="input-group col-md-11">
            <span class="input-group-addon" id="anchorCate"><i class="fa fa-navicon"></i> 要求主播行业 <i class="fa fa-asterisk"></i></span>
            <input type="text" class="form-control"  aria-describedby="anchorCate" value="<?php echo $needs -> anchorNeed_anchorCates ;?>">
          </div>
        </div>
        <div class="form-group">
          <div class="input-group col-md-11">
            <span class="input-group-addon" id="fansNum"><i class="fa fa-smile-o"></i> 要求主播粉丝量 <i class="fa fa-asterisk"></i></span>
            <input type="text" class="form-control"  aria-describedby="fansNum" value="<?php echo $needs -> anchorNeed_fansNumber ;?>">
          </div>
        </div>
        <div class="form-group">
          <div class="input-group col-md-11">
            <span class="input-group-addon" id="CoopCate"><i class="fa fa-comments-o"></i> 希望主播合作形式</span>
            <input type="text" class="form-control"  aria-describedby="CoopCate" value="<?php echo $needs -> anchorNeed_coopCate ;?>">
          </div>
        </div>
        <div class="form-group">
          <div class="input-group col-md-11">
            <span class="input-group-addon" id="otherNeed"><i class="fa fa-file-text-o"></i> 其他需求</span>
            <textarea class="form-control" rows="6" aria-describedby="otherNeed"><?php echo $needs -> anchorNeed_otherNeed ;?></textarea>
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
      <nav>
        <!-- <ul class="pagination">
            <li class="disabled"><a href="#" aria-label="Previous"><span aria-hidden="true">«</span></a></li>
            <li class="active"><a href="#">1 </a></li>
            <li><a href="#">2</a></li>
            <li><a href="#">3</a></li>
            <li><a href="#">4</a></li>
            <li class="active"><a href="#">5</a></li>
            <li><a href="#">...</a></li>
            <li><a href="#" aria-label="Next"><span aria-hidden="true">»</span></a></li>
         </ul> -->
         <?php echo $this -> pagination -> create_links();?>

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
<!-- <div class="modal fade" class="anchorNeed3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">来疯啦主播需求</h4>
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
            <input type="text"  class="form-control"  aria-describedby="aderBrand" value="来疯啦">
          </div>
        </div>
        <div class="form-group">
          <div class="input-group col-md-11">
            <span class="input-group-addon" id="aderPro"><i class="fa fa-briefcase"></i> 广告主宣传产品 <i class="fa fa-asterisk"></i></span>
            <input type="text" class="form-control"  aria-describedby="aderPro" value="户外体育">
          </div>
        </div>
        <div class="form-group">
          <div class="input-group col-md-11">
            <span class="input-group-addon" id="anchorCate"><i class="fa fa-connectdevelop"></i> 广告主行业 <i class="fa fa-asterisk"></i></span>
            <input type="text" class="form-control"  aria-describedby="aderPro" value="搞笑、秀场、体育">
          </div>
        </div>
        <div class="form-group">
          <div class="input-group col-md-11">
            <span class="input-group-addon" id="aderTime"><i class="fa fa-clock-o"></i> 预计投放时间 <i class="fa fa-asterisk"></i></span>
            <input type="text" class="form-control" aria-describedby="aderTime" value="2016年8月">
          </div>
        </div>
        <div class="form-group">
          <div class="input-group col-md-11">
            <span class="input-group-addon" id="aderCycle"><i class="fa fa-calendar-check-o"></i> 预计投放周期</span>
            <input type="text" class="form-control"  aria-describedby="aderCycle" value="半年">
          </div>
        </div>
        <div class="form-group">
          <div class="input-group col-md-11">
            <span class="input-group-addon" id="anchorNum"><i class="fa fa-users"></i> 需要主播数量</span>
            <input type="text" class="form-control"  aria-describedby="anchorNum" value="5人">
          </div>
        </div>
        <div class="form-group">
          <div class="input-group col-md-11">
            <span class="input-group-addon" id="anchorCate"><i class="fa fa-navicon"></i> 要求主播行业 <i class="fa fa-asterisk"></i></span>
            <input type="text" class="form-control"  aria-describedby="anchorCate" value="搞笑、秀场、萌宠">
          </div>
        </div>
        <div class="form-group">
          <div class="input-group col-md-11">
            <span class="input-group-addon" id="fansNum"><i class="fa fa-smile-o"></i> 要求主播粉丝量 <i class="fa fa-asterisk"></i></span>
            <input type="text" class="form-control"  aria-describedby="fansNum" value="5000以上">
          </div>
        </div>
        <div class="form-group">
          <div class="input-group col-md-11">
            <span class="input-group-addon" id="CoopCate"><i class="fa fa-comments-o"></i> 希望主播合作形式</span>
            <input type="text" class="form-control"  aria-describedby="CoopCate" value="第三方合作平台">
          </div>
        </div>
        <div class="form-group">
          <div class="input-group col-md-11">
            <span class="input-group-addon" id="otherNeed"><i class="fa fa-file-text-o"></i> 其他需求</span>
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
</div> -->





























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







</body>
</html>
