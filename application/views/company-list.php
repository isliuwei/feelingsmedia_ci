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
  <base href="<?php echo site_url();?>">
  <title>媒体公司个人信息编辑列表</title>
  <link rel="stylesheet" href="css/bootstrap.min.css" />
  <link rel="stylesheet" href="css/font-awesome.min.css" />
  <link rel="stylesheet" href="css/style.css" />
  <!-- <link rel="stylesheet" href="css/ace.min.css" />
	<link rel="stylesheet" href="css/ace-rtl.min.css" /> -->
  <link rel="stylesheet" href="css/company-list.css" />
  <style>
    .a-tel{
      color: #337ab7;
      text-decoration: none;
    }
    .center{
      text-align: center;
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
			    <!-- <li><a href="company/company_need_list">广告主公司</a></li> -->
          <li><a href="ader/ader_index"><?php echo $aderInfo -> ader_companyName ; ?></a></li>
			    <li class="active"><a href="#">媒体资源服务</a></li>
			  </ul>

        <div class="label labe-tel"><i class="fa fa-phone"></i> <a class="a-tel" href="tel:4006668800">合作咨询：400-666-8800</a></div>

        <!-- <ul class='nav navbar-nav navbar-right'>
        <a class="btn btn-success navbar-btn login-btn" data-toggle="modal" data-target="#anchor-reg" href="anchor-need-profile.html">账号信息</a>
        <a class="btn btn-primary navbar-btn login-btn"  href="company/company_setting/<?php echo $companyInfo -> company_id; ?>">账号管理</a>
        <a class="btn btn-default navbar-btn login-btn"  href="company/login_out">退出登录</a>

        <a class="btn navbar-btn js-login-btn" href="#">Register</a> -->

        <ul class='nav navbar-nav navbar-right'>
        <a class="btn btn-success navbar-btn login-btn"  href="ader/anchor_need_profile">账号信息</a>
        <a class="btn btn-primary navbar-btn login-btn"  href="ader/ader_setting?ader_id=<?php echo  $aderInfo -> ader_id ;?>">账号管理</a>
        <a class="btn btn-default navbar-btn login-btn" href="ader/logout">退出登录</a>

        <a class="btn navbar-btn js-login-btn" href="#">Register</a>

        </ul>
			</nav>
		</div>
	</header>



<div class="container">
  <div class="row">
  <div class="col-xs-12">
      <div class="table-responsive">
      		<table id="sample-table" class="table table-striped table-bordered table-hover">
      			<thead>
      				<tr>
                <th class="center">序号</th>
      					<th class="center">资源公司</th>
      					<th class="center">资源类型</th>
      					<th class="center">资源地域</th>
      					<th class="center">刊例价</th>
                <th class="center">联系方式</th>
      					<th class="center">注册时间</th>
      				</tr>
      			</thead>
      			<tbody>
            <?php
              $i=0;
              foreach($companyInfo as $companys){
            ?>
      				<tr>
      					<td class="center"><?php echo ++$i; ?></td>
      					<td class="center"><?php echo $companys -> company_name; ?></td>
      					<td><?php echo $companys -> company_resourceCate; ?></td>
      					<td><?php echo $companys -> company_resourceCity; ?></td>
      					<td class="center">待定</td>
      					<td>
                  <i class="fa fa-phone"></i> <a href="tel:<?php echo $companys -> company_tel; ?>"><?php echo $companys -> company_tel; ?></a>
                  <br>
                  <i class="fa fa-envelope-o"></i> <a href="mailto:<?php echo $companys -> company_email; ?>"><?php echo $companys -> company_email; ?></a>
                </td>
      					<td class="center"><?php echo $companys -> add_time; ?></td>
      				</tr>
              <?php
                }
              ?>
              

      			</tbody>
      		</table>
      </div>
  </div>
  </div>

</div>




<script src="js/jquery-1.11.3.min.js"></script>
<script src="js/bootstrap.min.js"></script>

<script src="js/jquery.dataTables.min.js"></script>
<script src="js/jquery.dataTables.bootstrap.js"></script>

<script type="text/javascript">
			jQuery(function($) {
				var oTable1 = $('#sample-table').dataTable( {
				"aoColumns": [
			      { "bSortable": false },
			      null, null,null, null, null,
				  { "bSortable": false }
				] } );


				$('table th input:checkbox').on('click' , function(){
					var that = this;
					$(this).closest('table').find('tr > td:first-child input:checkbox')
					.each(function(){
						this.checked = that.checked;
						$(this).closest('tr').toggleClass('selected');
					});

				});


				$('[data-rel="tooltip"]').tooltip({placement: tooltip_placement});
				function tooltip_placement(context, source) {
					var $source = $(source);
					var $parent = $source.closest('table')
					var off1 = $parent.offset();
					var w1 = $parent.width();

					var off2 = $source.offset();
					var w2 = $source.width();

					if( parseInt(off2.left) < parseInt(off1.left) + parseInt(w1 / 2) ) return 'right';
					return 'left';
				}
			})
		</script>


</body>
</html>
