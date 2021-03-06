<!DOCTYPE html>
<html lang="en" ng-app="myApp" ng-controller="FormController">

<head>
  <meta charset="utf-8">
  <title>feelngsmedia 慧灵思</title>
  <base href="<?php echo site_url(); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no" />
  <link rel="stylesheet" href="css/particles.css" />
  <link rel="stylesheet" href="css/bootstrap.min.css" />
  <link rel="stylesheet" href="css/btn.css" />
  <link rel="stylesheet" href="css/footer.css" />
  <link rel="stylesheet" href="css/font-awesome.min.css" />
  <link rel="stylesheet" href="css/lrtk.css" />
  <link rel="stylesheet" href="css/lrtk1.css" />
  <link rel="stylesheet" href="css/index.css" />
  <link rel="stylesheet" href="css/bootstrap-responsive.min.css" />
  <link rel="stylesheet" href="css/index-login.css" />
  <link rel="stylesheet" href="css/index-login1.css" />
  <link rel="stylesheet" href="css/login-sfq.css" />

  <link rel="stylesheet" href="assets/css/slider.css" />
  <link rel="stylesheet" href="css/contact.css" />


  <link rel="stylesheet" href="css/portfolio.jquery.css" />

  



  <style>
    .about-us{
      font-size: 30px;
    }
    .contact{
      text-decoration: none;
    }
    .contact:hover{
      text-decoration: none;
      color: #fff;
      font-weight: 900;
    }
    .desc{
      text-indent: 2em;
      text-align: left;
    }
    .am-slider{
      height: 80%;
    }
    .strip__content{
      position: relative;
    }
    .strip__content .imgBox{
      position: absolute;
      top: 0;
      left: -100px;
      opacity: 0.7;
    }
    .strip__content .img-open{
      position: absolute;
      top: 60px;
      left: 40px;
      opacity: 1;
      transition: all 5s cubic-bezier(0.23, 1, 0.32, 1);
    }
    .link{
      display: none;
    }
    .open-btn{
      display: block;
    }
    .fa-index {
      font-size: 30px;
      color: white;
    }
    /*.slider-box{
      height: 450px;
    }
*/

footer{
  background-color: #2b2d2e;
  background-image: url(../feelingsmedia/img/footerbg.png);
  padding: 20px;
}

.footer-contact-info li{
  color: #fff;
  font-size: 14px;
  text-align: left;
  font-weight: 900;
  line-height: 30px;
}

.footer-contact-info li a{
  color: #fff;
}
.footer-logo{
  text-align: left;
  margin-left: 40px;
  margin-bottom: 40px;
}
.map-title{
  font-size: 18px;
  background: none;
  font-weight: 900;
  
}
.page-header{
  text-align: left;
}

.footer-partner-title{
  margin-top: 90px;
  text-align: left;
  margin-left: 30px;
  margin-bottom: 20px;


}
.footer-partner li{
  list-style-type: none;
  float: left;
  margin-right: 10px;
  margin-bottom: 30px;
}

.partner-img{
  opacity: 0.6;
}
.partner-img:hover{
  opacity: 1;
  border-radius: 10%;
  /*transform:  rotate(360deg);*/
  transform:  scale(1.5,1.5);
}
.case-container{
  margin-top: -200px;
  margin-bottom: 50px;
}







  </style>

</head>
<body>

<header class='navbar navbar-fixed-top' id='main-navbar' role='banner'>
    <div>
      <div class='navbar-header'>
        <button type="button" class="navbar-toggle navbar-default collapsed" data-toggle="collapse" data-target=".navbar-collapse">
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
        </button>
        <!-- <a href="index5.html" target="_blank">广告主公司名称</a> -->
        <img class="logo" style="width: 50px;" alt="" src="img/favicon.ico">
      </div>
      <nav class='collapse navbar-collapse' role='navigation'>
        <ul class='nav navbar-nav navbar-left'>
          <li><a href="welcome/index">首页</a></li>
          <li class="active"><a href="javascript:;" class="about">关于我们</a></li>
          <li><a data-toggle="modal" data-target="#contact-form">联系我们</a></li>
        </ul>

        <div class="label labe-tel"><i class="fa fa-phone"></i> <a class="a-tel" href="tel:4006668800">合作咨询：400-666-8800</a></div>

        

        
      </nav>
    </div>
</header>

<div class="modal fade" id="contact-form" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button> 
    <div id="wrap">
      <h1>联系我们</h1>
      <div id='form_wrap'>
        <form class="contact-form" action="admin/save_contact" method="post" name="contactForm">
          <label for="message">内容 : </label>
          <textarea
            ng-model="message.content"  
            class="textarea-field" 
            name="content" 
            id="message"
            required
            
            ></textarea>

            <p
              class="error-info"
              ng-if="contactForm.content.$invalid && contactForm.content.$touched">
              内容不能为空</p>

          <label class="contact-label" for="name">姓名: </label>
          <input 
            ng-model="message.name"
            class="text-input" 
            type="text" 
            name="name" 
            id="name" 
            required
           
            />

            <p
              class="error-info"
              ng-if="contactForm.name.$invalid && contactForm.name.$touched">
              联系人姓名不能为空</p>
          <label class="contact-label" for="email">邮箱: </label>
          <input 
            ng-model="message.email"
            class="text-input" 
            type="email" 
            name="email" 
            id="email" 
            required
            />

            <p
              class="error-info"
              ng-if="contactForm.email.$invalid && contactForm.email.$touched">
              联系人邮箱不能为空</p>
          
            <input type="submit"   class="btn btn-primary" ng-disabled="contactForm.$invalid">提交
         
        </form>
      </div>
    </div>
  </div>
</div>



  

<div class="slider-box">
  <div data-am-widget="slider" class="am-slider am-slider-d2" data-am-slider='{&quot;directionNav&quot;:false}' >
  <div id="particles-js" style="z-index: 1;"></div>
    <ul class="am-slides">

        <li >

            <img class="slider-img" src="img/index-bg1.jpg">
            

            <!-- <div class="am-slider-desc"><div class="am-slider-content"><h2 class="am-slider-title">黑龙江国众建筑装饰工程有限公司</h2><p>一个愉悦的空间、一种尊贵的生活、一方独享的天地，都在这里寻求最合适的表达</p></div><a class="am-slider-more">微信公众号已上线，搜索“国众装饰”立即关注</a></div> -->
           
        </li>
        <li >
            <img class="slider-img" src="img/index-bg2.jpg">
            <!-- <div class="am-slider-desc"><div class="am-slider-content"><h2 class="am-slider-title">黑龙江国众建筑装饰工程有限公司</h2><p>室内外装修改造、设计、施工，17年团队！已有万家用户选择我们，关注一下，尽享多重好礼</p></div><a class="am-slider-more">微信公众号已上线，搜索“国众装饰”立即关注</a></div> -->
           
        </li>
       <li >
            <img class="slider-img" src="img/index-bg3.jpg">
            <!-- <div class="am-slider-desc"><div class="am-slider-content"><h2 class="am-slider-title">黑龙江国众建筑装饰工程有限公司</h2><p>一个愉悦的空间、一种尊贵的生活、一方独享的天地，都在这里寻求最合适的表达</p></div><a class="am-slider-more">微信公众号已上线，搜索“国众装饰”立即关注</a></div> -->
           
        </li>
       <li >
            <img class="slider-img" src="img/index-bg3.jpg">
            <!-- <div class="am-slider-desc"><div class="am-slider-content"><h2 class="am-slider-title">黑龙江国众建筑装饰工程有限公司</h2><p>一个愉悦的空间、一种尊贵的生活、一方独享的天地，都在这里寻求最合适的表达</p></div><a class="am-slider-more">微信公众号已上线，搜索“国众装饰”立即关注</a></div> -->
           
        </li>
    </ul>
  </div>
</div>
  



  

<section class="strips" >
  <article class="strips__strip">
  <div class="strip__content">
   <img class="imgBox" src="img/about-index.png" alt="">

   

  
    <h1 class="strip__title" data-name="Lorem" style="font-family:'jdlishujian50387afaf5872';">关于我们</h1>
       <div class="strip__inner-text">
       <p>
      <a href="#" target="_blank"><i class="fa fa-index fa-copyright"></i></a>
    </p>
    <h2><a class="contact" href="tel:10086">合作咨询：400-666-8800</a></h2>
      
      <label class="about-us">关于我们</label> 
     
      <blockquote>
      <p class="desc">北京慧灵思投资管理有限公司前身为北京慧灵思广告传媒有限公司成立于2013年3月。
    公司广告事业部从事于为广告客户提供线上、线下媒体渠道投放策略服务；综合营销策划及执行服务；产品设计服务。
    公司旗下慧播网以智慧传“播”为目标，致力于打造全新的广告营销模式借助当下最流行的传播方式，以投放效果为根本，以直播内容为元素，以主播资源为途径，以直播平台为载体。首次创建了广告+主播+平台的全新营销模式。</p>
     </blockquote> 

      
      
      

      <p><a href="#" target="_blank"></a></p>
    
    </div>
  </div>
  </article>
  <article class="strips__strip">
  <div class="strip__content">
    <img class="imgBox" src="img/ader-index.png" alt="">
    <h1 class="strip__title" data-name="Ipsum" style="font-family:'jdlishujian5038b1d015872';">广&nbsp;告&nbsp;主</h1>
    <div class="strip__inner-text">
    <p>
      <a href="ader/ader_reg" target="_blank"><i class="fa fa-index fa-suitcase"></i></a>
    </p>
    <h2>广告主服务</h2>
    <p>适用浏览器：360、FireFox、Chrome、Safari、Opera、傲游、搜狗、世界之窗. 不支持IE8及以下浏览器。</p>
    <a  href="#" class="link btn btn-2"  data-toggle="modal" data-target="#ader-reg">广告主登录</a>
    <p><a href="#" target="_blank"></a></p>
    
    </div>
  </div>
  </article>
  <article class="strips__strip">
  <div class="strip__content">
  <img class="imgBox" src="img/anchor-index.png" alt="">
    <h1 class="strip__title" data-name="Dolor" style="font-family:'jdlishujian5038f007d5872';" >主&nbsp;&nbsp;播</h1>

    <div class="strip__inner-text">

     <p>
      <a href="anchor/anchor_reg" target="_blank"><i class="fa fa-index fa-female"></i></a>
    </p>
    <h2 >主播服务</h2>


    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officia sapiente deserunt consectetur, quod reiciendis corrupti quo ea aliquid! Repellendus numquam quo, voluptate. Suscipit soluta omnis quibusdam facilis, illo voluptates odit!</p>

    <a  href="#" class="link btn btn-5" data-toggle="modal" data-target="#anchor-reg">主播登录</a>


   
    </div>
  </div>
  </article>
  <article class="strips__strip">
  <div class="strip__content">
  <img class="imgBox" src="img/company-index.png" alt="">
    <h1 class="strip__title" data-name="Sit"  style="font-family:'jdlishujian5039a2bbe5872';" >媒体公司</h1>
    <div class="strip__inner-text">
    <p>
      <a href="company/company_reg" target="_blank"><i class="fa fa-index fa-tv"></i></a>
    </p>
    <h2>媒体公司</h2>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officia sapiente deserunt consectetur, quod reiciendis corrupti quo ea aliquid! Repellendus numquam quo, voluptate. Suscipit soluta omnis quibusdam facilis, illo voluptates odit!</p>
    <a  href="#" class="link btn btn-4" data-toggle="modal" data-target="#company-reg"><span>媒体公司登录</span></a>
    
    </div>
  </div>
  </article>
  <article class="strips__strip">
  <div class="strip__content">
   <img class="imgBox" src="img/admin-index.png" alt="">
    <h1 class="strip__title" data-name="Amet" style="font-family:'jdlishujian5039ad1355872';" >管理员</h1>
    <div class="strip__inner-text">
    <p>
      <a href="admin/login" target="_blank"><i class="fa fa-index fa-key"></i></a>
    </p>
    <h2>管理员</h2>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officia sapiente deserunt consectetur, quod reiciendis corrupti quo ea aliquid! Repellendus numquam quo, voluptate. Suscipit soluta omnis quibusdam facilis, illo voluptates odit!</p>
    
    </div>
  </div>
  </article>
  <i class="fa fa-close strip__close"></i>
</section>



<section class="case-container">
  <center>
    <h1>平台案例</h1>
     <!-- <a href="welcome/case_show" >查看更多</a> -->
    <hr/>
  </center>
        <ul class="thumbs">
        <?php 
            foreach ($cases as $case) {
        ?>
            <li><a href="#thumb<?php echo $case -> case_id ;?>" class="thumbnail" style="background-image: url('<?php echo $case -> case_img ;?>')">
                <h4><?php echo $case -> case_mainTitle ;?></h4><span class="description"><?php echo $case -> case_desc ;?></span></a>
            </li>
        <?php
            }
        ?>
            
            
        </ul>

        <div class="portfolio-content">
        <?php 
            foreach ($cases as $case) {
        ?>
            <div id="thumb<?php echo $case -> case_id ;?>">
                <h1><?php echo $case -> case_mainTitle ;?></h1>
                <p><?php echo $case -> case_content ;?></p>
            </div>
        <?php 
          }
        ?>

           
        </div>
</section>










<footer class="footer navbar-static-bottom wrap" >
      <div class="container wrap">
        <div class="row">
          <div class="col-md-4 col-sm-12 col-xs-12  footer-section footer-info">
          <div class="footer-logo">
             <img class="logo" style="width: 50px;" alt="" src="img/favicon.ico">
              <span>feelingsmedia.com</<span>
          </div>

         

          <ul class="footer-contact-info">
              <li><h4>联系我们</h4></li>
              <li><span><i class="fa fa-phone"></i></span> 电话: <a href="tel:15765505994">+86 15765505994</a></li>
              <li><span><i class="fa fa-envelope"></i></span> 邮箱: <a href="mailto:lwdgzyx@gmail.com">lwdgzyx@gmail.com</a></li>
              <li><span><i class="fa fa-qq"></i></span> QQ: 445913035</li>
              <li><span><i class="fa fa-map-marker"></i></span> 联系地址: 黑龙江省哈尔滨市南岗区黑龙江大学</li>
              <li>Copyright&nbsp<span><i class="fa fa-copyright"></i></span>&nbsp;2016-2016 | 皖ICP备15024039</li>
            </ul>


        
           
        
          </div>
          <div class="col-md-4 col-sm-6 col-xs-12 footer-section">
            
            <h4 class="footer-partner-title">合作伙伴</h4>
           <ul class="footer-partner">
           <?php 
              foreach($partners as $partner){
           ?>
             <li><a href="<?php echo $partner -> partner_web ;?>" target="_blank"><img class="partner-img" src="<?php echo $partner -> partner_img ;?>" height="30px" width="60" alt="<?php echo $partner -> partner_name ;?>" title="<?php echo $partner -> partner_name ;?>"></a></li>
             
            <?php
              }
            ?>
             
            </ul>
            
          </div>

        <div class="col-md-4 col-sm-6 col-xs-12 footer-section">
            <div class="page-header">
            <span class="map-title"><i class="fa fa-map"></i> 我们的位置</span>
        </div>
        <div id="allmap"  style="height: 250px; width:100%;"></div>
        </div>
          
      </div>

  </footer>
 

<script src="http://api.map.baidu.com/api?v=2.0&ak=AMt1vrxwTqGzf1I94PMx7K0u" type="text/javascript"></script>

<script type="text/javascript">
  // 百度地图API功能
  var map = new BMap.Map("allmap");
  var point = new BMap.Point(126.637828, 45.714955);
  map.centerAndZoom(point, 16);
  var marker = new BMap.Marker(point);  // 创建标注
  map.addOverlay(marker);               // 将标注添加到地图中
  marker.setAnimation(BMAP_ANIMATION_BOUNCE); //跳动的动画
  map.addControl(new BMap.MapTypeControl());   //添加地图类型控件
  //map.setCurrentCity("北京");          // 设置地图显示的城市 此项是必须设置的
  map.enableScrollWheelZoom(true);     //开启鼠标滚轮缩放
</script>









     










<div class="modal fade" id="ader-reg" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <div id="login">
              <form action="ader/check_login" method="post" class="container offset1 loginform" name="aderForm">
                  <div id="owl-login">
                      <div class="hand"></div>
                      <div class="hand hand-r"></div>
                      <div class="arms">
                          <div class="arm"></div>
                          <div class="arm arm-r"></div>
                      </div>
                  </div>
                  <br>
                  <h3>广告主登录</h3>
                  <div class="pad">
                      <input type="hidden" name="" value="">
                      <div class="control-group">
                          <div class="controls">
                              <label for="ader-username" class="control-label fa fa-user"></label>
                              <input
                                ng-model="aderInfo.aderUsername"
                                id="ader-username"
                                type="text"
                                name="username"
                                placeholder="用户名"
                                tabindex="1"  class="form-control input-medium"
                                ng-class="{
                                  'error': aderForm.username.$invalid && aderForm.username.$touched,
                                  'success':aderForm.username.$valid }"
                                required
                                >

                          </div>
                      </div>

                      <div class="control-group">
                          <div class="controls">
                              <label for="ader-password" class="control-label fa fa-key"></label>
                              <input
                                ng-model="aderInfo.aderPassword"
                                id="ader-password"
                                type="password"
                                name="password"
                                placeholder="密码"
                                tabindex="2" class="form-control input-medium"
                                ng-class="{
                                  'error': aderForm.password.$invalid && aderForm.password.$touched,
                                  'success':aderForm.password.$valid }"
                                required
                                >
                          </div>
                      </div>

                      <div class="control-group">
                          <div class="controls">
                            <label for="ader-captcha" class="control-label fa fa-qrcode"></label>
                              <input
                                ng-model="aderInfo.aderCaptcha"
                                id="ader-captcha"
                                type="number"
                                name="aderCaptcha"
                                placeholder="验证码" tabindex="2"
                                class="form-control col-md-2 captcha"
                                ng-class="{
                                  'error': aderForm.aderCaptcha.$invalid && aderForm.aderCaptcha.$touched,
                                  'success':aderForm.aderCaptcha.$valid }"
                                required
                                compare="loginInfo.captcha_ci"
                                >

                                <input
                                  type="hidden"
                                  ng-model="loginInfo.captcha_ci"
                                  name="captcha_ci"
                                  class="captcha_ci"
                                >


                              <img class="captcha-img" id="ader-captcha-img" src="captcha/<?php echo $codeinfo['time']; ?>.jpg" alt="">
                              <span id="captcha-tip" class="captcha-tip"> &nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-refresh"></i>换一换</span>
                              <p
                                class="error-info"
                                ng-if="aderForm.aderCaptcha.$error.compare && aderForm.aderCaptcha.$touched">
                                验证码输入错误</p>

                          </div>

                      </div>


                  </div>
                  <div class="form-actions">
                      <p><a href="ader/forget_password" tabindex="5" class=" pull-left btn-link text-muted">忘记密码?</a></p>
                      <br>
                      <button type="submit" tabindex="4" class="btn btn-primary modal-btn" ng-disabled="aderForm.$invalid">登录</button>
                      <button type="button" tabindex="4" class="btn btn-warning modal-btn"><a href="ader/ader_reg" style="display:block;color:#fff;">注册</a></button>
                  </div>

              </form>
        </div>
    </div>
</div>


<div class="modal fade" id="anchor-reg" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <div class="login">
              <form action="anchor/check_login" method="post" class="container offset1 loginform" name="anchorForm">
                  <div class="owl-login">
                      <div class="hand"></div>
                      <div class="hand hand-r"></div>
                      <div class="arms">
                          <div class="arm"></div>
                          <div class="arm arm-r"></div>
                      </div>
                  </div>
                  <br>
                  <h3>主播登录</h3>
                  <div class="pad">
                      <div class="control-group">
                          <div class="controls">
                              <label for="anchor-username" class="control-label fa fa-user"></label>
                              <input
                                ng-model="anchorInfo.anchorUsername"
                                name="anchorUsername"
                                id="anchor-username"
                                type="text"
                                placeholder="用户名" tabindex="1"  class="form-control input-medium"
                                ng-class="{
                                  'error': anchorForm.anchorUsername.$invalid && anchorForm.anchorUsername.$touched,
                                  'success':anchorForm.anchorUsername.$valid }"
                                required
                                >
                          </div>
                      </div>

                      <div class="control-group">
                          <div class="controls">
                              <label for="anchor-password" class="control-label fa fa-key"></label>
                              <input
                                ng-model="anchorInfo.anchorPassword"
                                name="anchorPassword"
                                id="anchor-password"
                                type="password"
                                placeholder="密码" tabindex="2" class="form-control input-medium"
                                ng-class="{
                                  'error': anchorForm.anchorPassword.$invalid && anchorForm.anchorPassword.$touched,
                                  'success':anchorForm.anchorPassword.$valid }"
                                required
                                >
                          </div>
                      </div>

                      <div class="control-group">
                          <div class="controls">
                            <label for="anchor-captcha" class="control-label fa fa-qrcode"></label>
                              <input
                                ng-model="anchorInfo.anchorCaptcha"
                                name="anchorCaptcha"
                                id="anchor-captcha"
                                type="number"
                                placeholder="验证码" tabindex="2" class="form-control col-md-2 captcha"
                                ng-class="{
                                  'error': anchorForm.anchorCaptcha.$invalid && anchorForm.anchorCaptcha.$touched,
                                  'success':anchorForm.anchorCaptcha.$valid }"
                                required
                                compare="loginInfo.captcha_ci"
                                >

                                <input
                                  type="hidden"
                                  ng-model="loginInfo.captcha_ci"
                                  name="captcha_ci"
                                  class="captcha_ci"
                                >

                              <img class="captcha-img" id="anchor-captcha-img" src="captcha/<?php echo $codeinfo['time']; ?>.jpg" alt="">
                              <span id="captcha-tip" class="captcha-tip"> &nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-refresh"></i>换一换</span>
                              <p
                                class="error-info"
                                ng-if="anchorForm.anchorCaptcha.$error.compare && anchorForm.anchorCaptcha.$touched">
                                验证码输入错误</p>
                          </div>

                      </div>


                  </div>
                  <div class="form-actions">
                      <p><a href="anchor/forget_password" tabindex="5" class=" pull-left btn-link text-muted">忘记密码?</a></p>
                      <br>
                      <button type="submit" tabindex="4" class="btn btn-primary modal-btn" ng-disabled="anchorForm.$invalid">登录</button>
                      <button type="button" tabindex="4" class="btn btn-warning modal-btn"><a href="anchor/anchor_reg" style="display:block;color:#fff;">注册</a></button>
                  </div>

              </form>
        </div>
    </div>
</div>



<div class="modal fade" id="company-reg" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <div class="login">
              <form action="company/check_login" method="post" class="container offset1 loginform" name="companyForm">
                  <div class="owl-login">
                      <div class="hand"></div>
                      <div class="hand hand-r"></div>
                      <div class="arms">
                          <div class="arm"></div>
                          <div class="arm arm-r"></div>
                      </div>
                  </div>
                  <br>
                  <h3>媒体资源公司登录</h3>
                  <div class="pad">
                      <input type="hidden" name="" value="">
                      <div class="control-group">
                          <div class="controls">
                              <label for="company-username" class="control-label fa fa-user"></label>
                              <input
                                ng-model="companyInfo.companyUsername"
                                name="companyUsername"
                                id="company-username"
                                type="text"
                                placeholder="用户名" tabindex="1"  class="form-control input-medium"
                                ng-class="{
                                  'error': companyForm.companyUsername.$invalid && companyForm.companyUsername.$touched,
                                  'success':companyForm.companyUsername.$valid }"
                                required
                                >
                          </div>
                      </div>

                      <div class="control-group">
                          <div class="controls">
                              <label for="company-password" class="control-label fa fa-key"></label>
                              <input
                                ng-model="companyInfo.companyPassword"
                                name="companyPassword"
                                id="company-password"
                                type="password"
                                placeholder="密码" tabindex="2" class="form-control input-medium"
                                ng-class="{
                                  'error': companyForm.companyPassword.$invalid && companyForm.companyPassword.$touched,
                                  'success':companyForm.companyPassword.$valid }"
                                required
                                >
                          </div>
                      </div>

                      <div class="control-group">
                          <div class="controls">
                            <label for="company-captcha" class="control-label fa fa-qrcode"></label>
                              <input
                                ng-model="companyInfo.companyCaptcha"
                                name="companyCaptcha"
                                id="company-captcha"
                                type="number"
                                placeholder="验证码" tabindex="2" class="form-control col-md-2 captcha"
                                ng-class="{
                                  'error': companyForm.companyCaptcha.$invalid && companyForm.companyCaptcha.$touched,
                                  'success':companyForm.companyCaptcha.$valid }"
                                required
                                compare="loginInfo.captcha_ci"
                                >

                                <input
                                  type="hidden"
                                  ng-model="loginInfo.captcha_ci"
                                  name="captcha_ci"
                                  class="captcha_ci"
                                >

                              <img class="captcha-img" id="company-captcha-img" src="captcha/<?php echo $codeinfo['time']; ?>.jpg" alt="">
                              <span id="captcha-tip" class="captcha-tip"> &nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-refresh"></i>换一换</span>
                              <p
                                class="error-info"
                                ng-if="companyForm.companyCaptcha.$error.compare && companyForm.companyCaptcha.$touched">
                                验证码输入错误</p>
                          </div>

                      </div>


                  </div>
                  <div class="form-actions">
                      <p><a href="company/forget_password" tabindex="5" class=" pull-left btn-link text-muted">忘记密码?</a></p>
                      <br>
                      <button type="submit" tabindex="4" class="btn btn-primary modal-btn" ng-disabled="companyForm.$invalid">登录</button>
                      <button type="button" tabindex="4" class="btn btn-warning modal-btn"><a href="company/company_reg" style="display:block;color:#fff;">注册</a></button>
                  </div>

              </form>
        </div>
    </div>
</div>


<script src="js/jquery-1.11.3.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<!-- scripts -->
<script src="js/particles.js"></script>
<script src="js/app.js"></script>

<!-- stats.js -->
<script src="js/stats.js"></script>
<script src="js/angular.js"></script>
<script src="js/index.js"></script>
<script src="js/index-login.js"></script>


<script>
  $(function() {
      $('#login #ader-password').focus(function() {
          $('#owl-login').addClass('password');
      }).blur(function() {
          $('#owl-login').removeClass('password');
      });




      $('.login #anchor-password').focus(function() {
          $('.owl-login').addClass('password');
      }).blur(function() {
          $('.owl-login').removeClass('password');
      });

      $('.login #company-password').focus(function() {
          $('.owl-login').addClass('password');
      }).blur(function() {
          $('.owl-login').removeClass('password');
      });



  });
</script>


<script>
var Expand = function () {
  
  var imgbox = $('.imgBox');
  var linkbtn = $('.link');
  var tile = $('.strips__strip');
  var tileLink = $('.strips__strip > .strip__content');
  var tileText = tileLink.find('.strip__inner-text');
  var stripClose = $('.strip__close');
  var expanded = false;
  var open = function () {
    var tile = $(this).parent();
    if (!expanded) {
      linkbtn.addClass('open-btn');
      imgbox.addClass('img-open');
      tile.addClass('strips__strip--expanded');
      tileText.css('transition', 'all .6s 1s cubic-bezier(0.23, 1, 0.32, 1)');
      stripClose.addClass('strip__close--show');
      stripClose.css('transition', 'all .6s 1s cubic-bezier(0.23, 1, 0.32, 1)');
      expanded = true;
    }
  };
  var close = function () {
    if (expanded) {
      linkbtn.removeClass('open-btn');
      imgbox.removeClass('img-open');
      tile.removeClass('strips__strip--expanded');
      tileText.css('transition', 'all 0.15s 0 cubic-bezier(0.23, 1, 0.32, 1)');
      stripClose.removeClass('strip__close--show');
      stripClose.css('transition', 'all 0.2s 0s cubic-bezier(0.23, 1, 0.32, 1)');
      expanded = false;
    }
  };
  var bindActions = function () {
    tileLink.on('click', open);
    stripClose.on('click', close);
  };
  var init = function () {
    bindActions();
  };
  return { init: init };
}();
Expand.init();





</script>
<script>

    var imgbox = $('.imgBox').first();
    var linkbtn = $('.link').first();
    var tile = $('.strips__strip').first();
    var tileLink = $('.strips__strip > .strip__content').first();
    var tileText = tileLink.find('.strip__inner-text').first();
    var stripClose = $('.strip__close').first();

  $('.about').on('click',function(){
    linkbtn.addClass('open-btn').first();
    imgbox.addClass('img-open').first();
    tile.addClass('strips__strip--expanded').first();
    tileText.css('transition', 'all .6s 1s cubic-bezier(0.23, 1, 0.32, 1)').first();
    stripClose.addClass('strip__close--show').first();
    stripClose.css('transition', 'all .6s 1s cubic-bezier(0.23, 1, 0.32, 1)').first();
  });
  stripClose.on('click',function(){
      linkbtn.removeClass('open-btn').first();
      imgbox.removeClass('img-open').first();
      tile.removeClass('strips__strip--expanded').first();
      tileText.css('transition', 'all 0.15s 0 cubic-bezier(0.23, 1, 0.32, 1)').first();
      stripClose.removeClass('strip__close--show').first();
      stripClose.css('transition', 'all 0.2s 0s cubic-bezier(0.23, 1, 0.32, 1)').first();
  });





</script>


<script type="text/javascript" src="//api.youziku.com/wwwroot/js/g_webfont.min.js"></script>
<script type="text/javascript">
  WebFont.load({
  custom: {
  urls: ['//api.youziku.com/webfont/CSS/57a5786cf629d80ce0143a8c','//api.youziku.com/webfont/CSS/57a5794df629d80ce0143a8d','//api.youziku.com/webfont/CSS/57a57a4bf629d80ce0143a90','//api.youziku.com/webfont/CSS/57a57d27f629d80ce0143a96','//api.youziku.com/webfont/CSS/57a57d52f629d80ce0143a97']
  }
});
</script>

<script src="assets/js/amazeui.min.js"></script>
<script src="assets/js/app.js"></script>


<script src="js/portfolio.jquery.js"></script>

<script>
  $(document).ready(function() {
      $('.thumbs').portfolio({
          cols: 4,
          transition: 'slideDown'
      });
  });
</script>


















</body>
</html>
