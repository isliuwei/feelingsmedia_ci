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
  <title>主播需求信息列表</title>
  <link rel="stylesheet" href="css/bootstrap.min.css" />
  <link rel="stylesheet" href="css/font-awesome.min.css" />
  <link rel="stylesheet" href="css/anchor-need-list.css" />
  <link rel="stylesheet" href="css/material-cards.css" />
  <link rel="stylesheet" href="css/style.css" />
  <link rel="stylesheet" href="css/blue.css" />
  <link rel="stylesheet" href="css/404.css" />

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
      h2{
        cursor: pointer;
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
          <li><a href="welcome/index" target="_blank">首页</a></li>
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

      <h1 class="bg-primary marqueer"> <i class="fa fa-exclamation-circle"> NOT FOUND!</i></h1>
      <img class="rotating" src="img/404.svg" />





    </div>

    <div class="panel-footer">

      <kbd><i class="fa fa-exclamation"></i> 无对应的筛选结果</kbd>


    </div>

  </div>

































<script src="js/jquery-1.11.3.min.js"></script>
<script src="js/bootstrap.min.js"></script>








</body>
</html>
