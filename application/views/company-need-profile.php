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
    <base href="<?php echo site_url();?>">
  <title>媒体咨询公司需求信息列表</title>
  <link rel="stylesheet" href="css/bootstrap.min.css" />
  <link rel="stylesheet" href="css/font-awesome.min.css" />
  <link rel="stylesheet" href="css/anchor-need-profile.css" />
  <link rel="stylesheet" href="css/style.css" />
  <style>
  .a-tel{
    text-decoration: none;
    color: #337ab7;

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
			    <li><a href="company/company_need_list"><?php echo $companyInfo -> company_name;?></a></li>
			    <li class="active"><a href="javascript:;">账号信息</a></li>
			  </ul>

        <div class="label labe-tel"><i class="fa fa-phone"></i> <a class="a-tel" href="tel:4006668800">合作咨询：400-666-8800</a></div>

        <ul class='nav navbar-nav navbar-right'>
        <!-- <a class="btn btn-success navbar-btn login-btn" href="anchor-need-profile.html">账号信息</a> -->
        <a class="btn btn-primary navbar-btn login-btn" href="company/company_setting/<?php echo $companyInfo -> company_id; ?>">账号管理</a>
        <a class="btn btn-default navbar-btn login-btn" href="company/login_out">退出登录</a>

        <a class="btn navbar-btn js-login-btn" href="#">Register</a>

        </ul>
			</nav>
		</div>
	</header>





<div class="container">
  <div class="row">
    <div class="panel panel-default">
      <div class="panel-heading">合作信息列表</div>
          <table class="table">
            <thead>
              <tr>
                <th>序号</th>
                <th>客户公司</th>
                <th>合作资源</th>
                <th>投放地域</th>
                <th>合作总额</th>
                <th>合作时间</th>
              </tr>
            </thead>
            <tbody>
            <?php
              $num = 0;
              foreach ($cooperateInfo as $coop) {
            ?>
              <tr>
                <th scope="row"><?php echo ++$num;?></th>
                <td><?php echo $coop  -> cooperate_company; ?></td>
                <td><?php echo $coop  -> cooperate_resource; ?></td>
                <td><?php echo $coop  -> cooperate_region; ?></td>
                <td><?php echo $coop  -> cooperate_bud; ?></td>
                <td><?php echo $coop  -> cooperate_time; ?></td>
              </tr>
              <?php
                }
              ?>
              
            </tbody>
          </table>
        </div>
    </div>


  <!--
  <nav>
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
  </nav>
  -->
</div>






































<script src="js/jquery-1.11.3.min.js"></script>
<script src="js/bootstrap.min.js"></script>







</body>
</html>
