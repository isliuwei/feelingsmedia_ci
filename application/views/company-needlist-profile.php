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
  <title>广告主主播需求信息列表</title>
  <base href="<?php echo site_url(); ?>">
  <link rel="stylesheet" href="css/bootstrap.min.css" />
  <link rel="stylesheet" href="css/font-awesome.min.css" />
  <link rel="stylesheet" href="css/anchor-need-profile.css" />
  <link rel="stylesheet" href="css/style.css" />
  <style>
  .col-lg-1, .col-lg-10, .col-lg-11, .col-lg-12, .col-lg-2, .col-lg-3, .col-lg-4, .col-lg-5, .col-lg-6, .col-lg-7, .col-lg-8, .col-lg-9, .col-md-1, .col-md-10, .col-md-11,
  .col-md-12, .col-md-2, .col-md-3, .col-md-4, .col-md-5, .col-md-6, .col-md-7, .col-md-8, .col-md-9, .col-sm-1, .col-sm-10, .col-sm-11, .col-sm-12, .col-sm-2, .col-sm-3,
  .col-sm-4, .col-sm-5, .col-sm-6, .col-sm-7, .col-sm-8, .col-sm-9, .col-xs-1, .col-xs-10, .col-xs-11, .col-xs-12, .col-xs-2, .col-xs-3, .col-xs-4, .col-xs-5, .col-xs-6,
  .col-xs-7, .col-xs-8, .col-xs-9{
    padding-right: 0px;
    padding-left: 0px;
  }
  .container{
    /*margin-left: 100px;*/
  }
  .a-tel{
    color: #337ab7;
    text-decoration: none;
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
  .search{
    cursor: pointer;
  }
  p.kbd{
    margin-left: 15px;
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
			    <!-- <li class="active"><a href="#">账号信息</a></li> -->
          <li><a href="ader/anchor_need_profile?ader_id=<?php echo $aderInfo -> ader_id ?>">主播需求</a></li>
          <li  class="active"><a href="ader/company_need_profile?ader_id=<?php echo $aderInfo -> ader_id ?>">媒体公司需求</a></li>
			  </ul>

        <div class="label labe-tel"><i class="fa fa-phone"></i> <a class="a-tel" href="tel:4006668800">合作咨询：400-666-8800</a></div>

        <ul class='nav navbar-nav navbar-right'>
        <!-- <a class="btn btn-success navbar-btn login-btn">账号信息</a> -->
        <a class="btn btn-primary navbar-btn login-btn" href="ader/ader_setting?ader_id=<?php echo  $aderInfo -> ader_id ;?>">账号管理</a>
        <a class="btn btn-default navbar-btn login-btn" href="ader/logout">退出登录</a>
        <a class="btn navbar-btn js-login-btn" href="#">Register</a>

        </ul>
			</nav>
		</div>
	</header>





  <div class="container">
    <div class="row">
      <?php
        foreach($companyNeeds as $need){ 
      ?>
        <div class="panel panel-primary col-md-3 col-md-offset-1">
          <div class="panel-heading">
            <h3 class="panel-title"><i class="fa fa-paint-brush"></i> 发布需求 </h3>
          </div>
          <div class="panel-body">
            <ul class="list-group">
              <li class="list-group-item list-group-item-warning">品牌：<?php echo $need -> companyNeed_brand;?></li>
              <li class="list-group-item">产品：<?php echo $need -> companyNeed_pro;?></li>
              <li class="list-group-item list-group-item-warning">行业：<?php echo mb_substr($need -> aderCateString,0,10)."......";?></li>
              <li class="list-group-item">投放时间：<?php echo $need -> companyNeed_time;?></li>
              <li class="list-group-item list-group-item-warning">资源投放类型：<?php echo mb_substr($need -> aderResourceCateString,0,8)."......";?></li>
              <li class="list-group-item">资源投放城市：<?php echo mb_substr($need -> aderCityString,0,8)."......";?></li>
            </ul>
            <p class="search" data-toggle="modal" data-target="#companyNeed<?php echo $need -> companyNeed_id; ?>">
              <i class="fa fa-search"></i> 查看详情
            </p>
          </div>
          <div class="panel-footer"><i class="fa fa-calendar"></i>发布时间：<?php echo $need -> add_time ?></div>
        </div>

        <div class="modal fade" id="companyNeed<?php echo $need -> companyNeed_id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">主播需求详情</h4>
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
                    <input type="text"  class="form-control"  aria-describedby="aderBrand" value="<?php echo $need -> companyNeed_brand;?>">
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group col-md-11">
                    <span class="input-group-addon" id="aderPro"><i class="fa fa-briefcase"></i> 广告主宣传产品 <i class="fa fa-asterisk"></i></span>
                    <input type="text" class="form-control"  aria-describedby="aderPro" value="<?php echo $need -> companyNeed_pro;?>">
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group col-md-11">
                    <span class="input-group-addon" id="anchorCate"><i class="fa fa-connectdevelop"></i> 广告主行业 <i class="fa fa-asterisk"></i></span>
                    <input type="text" class="form-control"  aria-describedby="aderPro" value="<?php echo $need -> aderCateString;?>">
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group col-md-11">
                    <span class="input-group-addon" id="aderTime"><i class="fa fa-clock-o"></i> 预计投放时间 <i class="fa fa-asterisk"></i></span>
                    <input type="text" class="form-control" aria-describedby="aderTime" value="<?php echo $need -> companyNeed_time;?>">
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group col-md-11">
                    <span class="input-group-addon" id="aderCycle"><i class="fa fa-calendar-check-o"></i> 预计投放周期</span>
                    <input type="text" class="form-control"  aria-describedby="aderCycle" value="<?php echo $need -> companyNeed_cycle;?>">
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group col-md-11">
                    <span class="input-group-addon" id="anchorNum"><i class="fa fa-users"></i> 投放预算</span>
                    <input type="text" class="form-control"  aria-describedby="anchorNum" value="<?php echo $need -> companyNeed_bud;?>">
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group col-md-11">
                    <span class="input-group-addon" id="anchorCate"><i class="fa fa-navicon"></i> 需要资源渠道类型 <i class="fa fa-asterisk"></i></span>
                    <input type="text" class="form-control"  aria-describedby="anchorCate" value="<?php echo $need -> aderResourceCateString;?>">
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group col-md-11">
                    <span class="input-group-addon" id="fansNum"><i class="fa fa-smile-o"></i> 投放城市 <i class="fa fa-asterisk"></i></span>
                    <input type="text" class="form-control"  aria-describedby="fansNum" value="<?php echo $need -> aderCityString;?>">
                  </div>
                </div>
                
                <div class="form-group">
                  <div class="input-group col-md-11">
                    <span class="input-group-addon" id="otherNeed"><i class="fa fa-file-text-o"></i> 其他需求</span>
                    <textarea class="form-control" rows="6" aria-describedby="otherNeed"><?php echo $need -> companyNeed_others;?></textarea>
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

      <?php }?>

	<p class="kbd"><kbd>共有<?php echo $count;?>条记录</kbd></p>
    </div>


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






































<script src="js/jquery-1.11.3.min.js"></script>
<script src="js/bootstrap.min.js"></script>







</body>
</html>
