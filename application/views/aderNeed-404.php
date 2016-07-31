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
  <link rel="stylesheet" href="css/404.css" />
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
			    <li><a href="ader/ader_index"><?php echo $aderInfo -> ader_companyName ; ?></a></li>
			    <!-- <li class="active"><a href="#">账号信息</a></li> -->
          <li class="active"><a href="ader/anchor_need_profile/<?php echo $aderInfo -> ader_id ?>">主播需求</a></li>
          <li><a href="ader/company_need_profile/<?php echo $aderInfo -> ader_id ?>">媒体公司需求</a></li>
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
      
       <h1 class="bg-primary marqueer"> <i class="fa fa-exclamation-circle"> NOT FOUND!</i></h1>
      <img class="rotating" src="img/404.svg" />


    </div>


    <nav>
         <kbd><i class="fa fa-exclamation"></i> 无对应的筛选结果</kbd>

    </nav>
  </div>






































<script src="js/jquery-1.11.3.min.js"></script>
<script src="js/bootstrap.min.js"></script>







</body>
</html>
