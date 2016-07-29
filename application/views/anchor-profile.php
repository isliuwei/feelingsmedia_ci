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
  <title>主播个人信息展示页面</title>
  <link rel="stylesheet" href="css/bootstrap.min.css" />
  <link rel="stylesheet" href="css/font-awesome.min.css" />
  <link rel="stylesheet" href="css/anchor-setting.css" />
  <link rel="stylesheet" href="css/dropzone.min.css" />
  <link rel="stylesheet" href="css/style.css" />
  <link rel="stylesheet" href="css/blue.css" />

  <style>
      .select-group{
        padding-left: 22px;
        margin-top: 8px;
      }

      .country-select{
        width: 100px;
      }

      .province-select{
        width: 150px;
      }
      .checkbox{
        margin-right: 10px;
      }
      .icheckbox_square-blue{
        margin-bottom: 4px;
        margin-right: 2px;
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

      .anchorCate{
        width: 100px;
      }
      .text-success{
        text-align: center;
      }
      .panel-no{
        border: none;

      }
      a{
        text-decoration: none;
        color: #fff;
      }
      .btn.btn-app.btn-light, .btn.btn-app.btn-yellow {
    -webkit-box-shadow: 0 0 0 1px rgba(0,0,0,0.08) inset!important;
    box-shadow: 0 0 0 1px rgba(0,0,0,0.08) inset!important;
}
.list-group-item span{
  display: inline-block;
  width: 150px;
}
.list-group-item a{
  color: #000;
  margin-left: 50px;

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
			    <li><a href="anchor/anchor_need_list"><?php echo $anchorInfo -> anchor_name ; ?></a></li>
			    <li class="active"><a href="#">账号信息</a></li>
			  </ul>



        <ul class='nav navbar-nav navbar-right'>
        <a class="btn btn-primary navbar-btn login-btn" href="anchor/anchor_setting/<?php echo $anchorInfo -> anchor_id; ?>">账号管理</a>
        <a class="btn btn-default navbar-btn login-btn" href="anchor/logout">退出登录</a>

        <a class="btn navbar-btn js-login-btn" href="#">Register</a>

        </ul>
			</nav>
		</div>
	</header>
  


  <div class="container">
    	<div class="row">
        <div class="col-md-12 col-xs-12">
             <div class="panel panel-info">
                 <div class="panel-heading">
                   <h3 class="panel-title">主播个人信息展示</h3>
                 </div>
                <div class="panel-body">
                    <div class="panel panel-info panel-no col-md-4 col-sx-4">
                      <div class="panel-body ">
                        <div class="thumbnail">
                            <img class="img img-circle img-thumbnail" src="<?php echo $anchorProfile -> anchor_photo;?>" alt="...">
                            <div class="caption">
                              <h3 class="name bg-info text-success">@<?php echo $anchorProfile -> anchor_name; ?></h3>
                              <p class="desc text-info"></p>
                            </div>
                        </div>



                          <span class="label label-primary"><i class="fa fa-phone"></i> <a data-toggle="tooltip" data-placement="bottom" title="<?php echo $anchorProfile -> anchor_tel; ?>" href="tel:<?php echo $anchorProfile -> anchor_tel; ?>"> 拨打电话</a></span>
                          <span class="label label-info"><i class="fa fa-envelope"></i> <a data-toggle="tooltip" data-placement="bottom" title="<?php echo $anchorProfile -> anchor_email; ?>" href="mailto:<?php echo $anchorProfile -> anchor_email; ?>"> 发送邮件</a></span>
                          <span class="label label-success"><i class="fa fa-wifi"></i> <a data-toggle="tooltip" data-placement="bottom" title="400-000-888" href="tel:400-000-888"> 联系我们</a></span>


                      </div>

                    </div>

                    <div class="panel panel-info panel-no col-md-8 col-sx-8">
                      <div class="panel-body panel-no">




  <ul class="list-group">
    <li class="list-group-item list-group-item-info"><span>账户名称</span><a href="#">主播账号</a></li>
    <li class="list-group-item"><span>直播平台</span><a href="#"><?php echo $anchorProfile -> anchor_platformName; ?></a></li>
    <li class="list-group-item list-group-item-info"><span>直播ID</span><a href="#"><?php echo $anchorProfile -> anchor_platformID; ?></a></li>
    <li class="list-group-item"><span>直播ID昵称</span><a href="#"><?php echo $anchorProfile -> anchor_platformNickname; ?></a></li>
    <li class="list-group-item list-group-item-info"><span>性别</span><a href="#"><?php echo $anchorProfile -> anchor_gender; ?></a></li>
    <li class="list-group-item"><span>真实姓名</span><a href="#"><?php echo $anchorProfile -> anchor_name; ?></a></li>
    <li class="list-group-item list-group-item-info"><span>联系方式</span><a href="tel:<?php echo $anchorProfile -> anchor_tel; ?>"><?php echo $anchorProfile -> anchor_tel; ?></a></li>
    <li class="list-group-item"><span>邮箱</span><a href="mailto:<?php echo $anchorProfile -> anchor_email; ?>"><?php echo $anchorProfile -> anchor_email; ?></a></li>
    <li class="list-group-item list-group-item-info"><span>地域</span><a href="#"><?php echo $anchorProfile -> anchor_region; ?>/<?php echo $anchorProfile -> anchor_province; ?></a></li>
    <li class="list-group-item"><span>账号分类</span>
      <a href="#">
      <?php
        if($anchorCates){
        foreach($anchorCates as $cate){
      ?>
        <?php echo $cate -> anchorCate_name; ?>&nbsp;
      <?php
        }}
      ?>
        
      </a>
    </li>
    <li class="list-group-item list-group-item-info"><span>粉丝</span><a href="#"><?php echo $anchorProfile -> anchor_fansNumber; ?></a></li>
    <li class="list-group-item"><span>主播性质</span><a href="#"><?php echo $anchorProfile -> anchor_attr; ?></a></li>
    <li class="list-group-item list-group-item-info"><span>银行账号</span><a href="#"><?php echo $anchorProfile -> anchor_bankAccount; ?></a></li>
    <li class="list-group-item"><span>QQ号码</span><a href="#"><?php echo $anchorProfile -> anchor_qqNum; ?></a></li>
  </ul>




                      </div>

                    </div>



               </div>
            </div>



         </div>














<script src="js/jquery-1.11.3.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/dropzone.min.js"></script>
<script src="js/icheck.js"></script>
<script>
    $('input').iCheck({ checkboxClass: 'icheckbox_square-blue', radioClass: 'iradio_square-blue', increaseArea: '20%'  });
</script>


<script>
$(function () {
$('[data-toggle="tooltip"]').tooltip()
})
</script>



</body>
</html>
