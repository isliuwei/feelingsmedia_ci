<!DOCTYPE html>
<html lang="en" ng-app="myApp" ng-controller="FormController">

<head>
  <meta charset="utf-8">
  <title>feelngsmedia 慧灵思</title>
  <base href="<?php echo site_url(); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no" />
 
  <link rel="stylesheet" href="css/bootstrap.min.css" />
  
  <link rel="stylesheet" href="css/font-awesome.min.css" />
  
  

  

  <link rel="stylesheet"  href="css/case/demo.css" />

<!--必要样式-->
<link rel="stylesheet"  href="css/case/card-4.css" />
<link rel="stylesheet"  href="css/case/pattern-4.css" />


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
    .slider-box{
      height: 450px;
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
       <!--  <img class="logo" style="width: 50px;" alt="" src="img/favicon.ico"> -->
      </div>
      <nav class='collapse navbar-collapse' role='navigation'>
        <ul class='nav navbar-nav navbar-left'>
          <li><a href="welcome/index">返回首页</a></li>
          
        </ul>

        <!-- <div class="label labe-tel"><i class="fa fa-phone"></i> <a class="a-tel" href="tel:4006668800">合作咨询：400-666-8800</a></div> -->

        

        
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



<link rel="stylesheet"  href="css/case/pattern-4.css" />
<!--[if IE]>
  <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
<script>
if (navigator.userAgent.toLowerCase().indexOf('firefox') > -1) {
	var root = document.getElementsByTagName('html')[0];
	root.setAttribute('class', 'ff');
};
</script>
</head>

<body class="demo-4">
    <div class="container">
			<header class="codrops-header">
				<nav class="codrops-demos">
				<h2>案例展示</h2>
					
				</nav>
			</header>


        <div class="content">
            <!-- trianglify pattern container -->
            <div class="pattern pattern--hidden"></div>
            <!-- cards -->
            <div class="wrapper">
                <div class="card">
                    <div class="card__container card__container--closed">
                        <svg class="card__image" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 1920 1200" preserveAspectRatio="xMidYMid slice">
                            <defs>
                                <clipPath id="clipPath1">
                                    <polygon class="clip" points="0,1200 0,0 1920,0 1920,1200"></polygon>
                                </clipPath>
                            </defs>
                            <image clip-path="url(#clipPath1)" width="1920" height="1200" xlink:href="img/demo1.jpg"></image>
                        </svg>
                        <div class="card__content">
							<i class="card__btn-close fa fa-times"></i>
							<div class="card__caption">
								<h2 class="card__title">搜狐千帆直播</h2>
								<p class="card__subtitle">直播剧广告招商合作</p>
							</div>
							<div class="card__copy">
								<div class="meta">
									<img class="meta__avatar" src="img/authors/1.png" alt="author01" />
									<span class="meta__author">搜狐千帆直播</span>
									<span class="meta__date">07/14/2016</span>
								</div>
								<p>此项目为搜狐千帆直播与慧玲思传媒战略合作项目。搜狐千帆直播负责直播平台、拍摄制作，以及直播剧运营，慧玲思传媒独家享有此项目的广告招商权。</p>
								<p>Release creative social proof influencer iPad crowdsource gamification learning curve network effects monetization. Gamification business plan mass market www.discoverartisans.com direct mailing ecosystem seed round sales long tail vesting period.</p>
								<p>Product management ramen bootstrapping seed round venture holy grail technology backing partner network entrepreneur beta marketing value proposition. Android stealth conversion scrum project network effects. Creative alpha long tail conversion stealth growth hacking iteration investor A/B testing prototype customer. Startup www.discoverartisans.com direct mailing launch party partnership market ramen metrics focus value proposition.</p>
								<p>Stock infrastructure seed round sales paradigm shift technology user experience focus gamification. Partnership metrics business plan stealth business-to-business. Deployment graphical user interface monetization. Twitter incubator scrum project entrepreneur branding burn rate ramen backing paradigm shift virality crowdsource.</p>
								<p>Social proof MVP ecosystem. Ramen launch party pitch deployment stealth. Vesting period MVP equity. Focus creative partnership founders iteration agile development infographic.</p>
								<p>Low hanging fruit burn rate innovator user experience niche market A/B testing creative launch party product management release. Www.discoverartisans.com influencer business model canvas user experience gamification paradigm shift startup research &amp; development iPad agile development. Strategy incubator infographic success marketing buzz A/B testing responsive web design. Traction research &amp; development pitch seed money venture niche market accelerator network effects.</p>
							</div>
						</div>
					</div>
                </div>
                <!-- <div class="card">
                    <div class="card__container card__container--closed">
                        <svg class="card__image" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 1920 1200" preserveAspectRatio="xMidYMid slice">
                            <defs>
                                <clipPath id="clipPath2">
                                    <polygon class="clip" points="0,1200 0,0 1920,0 1920,1200"></polygon>
                                </clipPath>
                            </defs>
                            <image clip-path="url(#clipPath2)" width="1920" height="1200" xlink:href="img/h.jpg"></image>
                        </svg>
                        <div class="card__content">
							<i class="card__btn-close fa fa-times"></i>
							<div class="card__caption">
								<h2 class="card__title">About Helen</h2>
								<p class="card__subtitle">A story about a woman</p>
							</div>
							<div class="card__copy">
								<div class="meta">
									<img class="meta__avatar" src="img/authors/2.png" alt="author02" />
									<span class="meta__author">Frank Posterius</span>
									<span class="meta__date">06/16/2015</span>
								</div>
								<p>Business model canvas bootstrapping deployment startup. In A/B testing pivot niche market alpha conversion startup down monetization partnership business-to-consumer success for investor mass market business-to-business.</p>
								<p>Release creative social proof influencer iPad crowdsource gamification learning curve network effects monetization. Gamification business plan mass market www.discoverartisans.com direct mailing ecosystem seed round sales long tail vesting period.</p>
								<p>Product management ramen bootstrapping seed round venture holy grail technology backing partner network entrepreneur beta marketing value proposition. Android stealth conversion scrum project network effects. Creative alpha long tail conversion stealth growth hacking iteration investor A/B testing prototype customer. Startup www.discoverartisans.com direct mailing launch party partnership market ramen metrics focus value proposition.</p>
								<p>Stock infrastructure seed round sales paradigm shift technology user experience focus gamification. Partnership metrics business plan stealth business-to-business. Deployment graphical user interface monetization. Twitter incubator scrum project entrepreneur branding burn rate ramen backing paradigm shift virality crowdsource.</p>
								<p>Social proof MVP ecosystem. Ramen launch party pitch deployment stealth. Vesting period MVP equity. Focus creative partnership founders iteration agile development infographic.</p>
								<p>Low hanging fruit burn rate innovator user experience niche market A/B testing creative launch party product management release. Www.discoverartisans.com influencer business model canvas user experience gamification paradigm shift startup research &amp; development iPad agile development. Strategy incubator infographic success marketing buzz A/B testing responsive web design. Traction research &amp; development pitch seed money venture niche market accelerator network effects.</p>
							</div>
						</div>
					</div>
                </div>
                <div class="card">
                    <div class="card__container card__container--closed">
                        <svg class="card__image" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 1920 1200" preserveAspectRatio="xMidYMid slice">
                            <defs>
                                <clipPath id="clipPath3">
                                    <polygon class="clip" points="0,1200 0,0 1920,0 1920,1200"></polygon>
                                </clipPath>
                            </defs>
                            <image clip-path="url(#clipPath3)" width="1920" height="1200" xlink:href="img/i.jpg"></image>
                        </svg>
                        <div class="card__content">
							<i class="card__btn-close fa fa-times"></i>
							<div class="card__caption">
								<h2 class="card__title">A mild winter</h2>
								<p class="card__subtitle">Helen's view on wells</p>
							</div>
							<div class="card__copy">
								<div class="meta">
									<img class="meta__avatar" src="img/authors/3.png" alt="author03" />
									<span class="meta__author">Sarah Lester</span>
									<span class="meta__date">06/16/2015</span>
								</div>
								<p>Business model canvas bootstrapping deployment startup. In A/B testing pivot niche market alpha conversion startup down monetization partnership business-to-consumer success for investor mass market business-to-business.</p>
								<p>Release creative social proof influencer iPad crowdsource gamification learning curve network effects monetization. Gamification business plan mass market www.discoverartisans.com direct mailing ecosystem seed round sales long tail vesting period.</p>
								<p>Product management ramen bootstrapping seed round venture holy grail technology backing partner network entrepreneur beta marketing value proposition. Android stealth conversion scrum project network effects. Creative alpha long tail conversion stealth growth hacking iteration investor A/B testing prototype customer. Startup www.discoverartisans.com direct mailing launch party partnership market ramen metrics focus value proposition.</p>
								<p>Stock infrastructure seed round sales paradigm shift technology user experience focus gamification. Partnership metrics business plan stealth business-to-business. Deployment graphical user interface monetization. Twitter incubator scrum project entrepreneur branding burn rate ramen backing paradigm shift virality crowdsource.</p>
								<p>Social proof MVP ecosystem. Ramen launch party pitch deployment stealth. Vesting period MVP equity. Focus creative partnership founders iteration agile development infographic.</p>
								<p>Low hanging fruit burn rate innovator user experience niche market A/B testing creative launch party product management release. Www.discoverartisans.com influencer business model canvas user experience gamification paradigm shift startup research &amp; development iPad agile development. Strategy incubator infographic success marketing buzz A/B testing responsive web design. Traction research &amp; development pitch seed money venture niche market accelerator network effects.</p>
							</div>
						</div>
					</div>
                </div>
                <div class="card">
                    <div class="card__container card__container--closed">
                        <svg class="card__image" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 1920 1200" preserveAspectRatio="xMidYMid slice">
                            <defs>
                                <clipPath id="clipPath4">
                                    <polygon class="clip" points="0,1200 0,0 1920,0 1920,1200"></polygon>
                                </clipPath>
                            </defs>
                            <image clip-path="url(#clipPath4)" width="1920" height="1200" xlink:href="img/l.jpg"></image>
                        </svg>
                        <div class="card__content">
							<i class="card__btn-close fa fa-times"></i>
							<div class="card__caption">
								<h2 class="card__title">Food sources</h2>
								<p class="card__subtitle">What will we eat in 30 years?</p>
							</div>
							<div class="card__copy">
								<div class="meta">
									<img class="meta__avatar" src="img/authors/4.png" alt="author04" />
									<span class="meta__author">Lena Bestofos</span>
									<span class="meta__date">06/14/2015</span>
								</div>
								<p>Business model canvas bootstrapping deployment startup. In A/B testing pivot niche market alpha conversion startup down monetization partnership business-to-consumer success for investor mass market business-to-business.</p>
								<p>Release creative social proof influencer iPad crowdsource gamification learning curve network effects monetization. Gamification business plan mass market www.discoverartisans.com direct mailing ecosystem seed round sales long tail vesting period.</p>
								<p>Product management ramen bootstrapping seed round venture holy grail technology backing partner network entrepreneur beta marketing value proposition. Android stealth conversion scrum project network effects. Creative alpha long tail conversion stealth growth hacking iteration investor A/B testing prototype customer. Startup www.discoverartisans.com direct mailing launch party partnership market ramen metrics focus value proposition.</p>
								<p>Stock infrastructure seed round sales paradigm shift technology user experience focus gamification. Partnership metrics business plan stealth business-to-business. Deployment graphical user interface monetization. Twitter incubator scrum project entrepreneur branding burn rate ramen backing paradigm shift virality crowdsource.</p>
								<p>Social proof MVP ecosystem. Ramen launch party pitch deployment stealth. Vesting period MVP equity. Focus creative partnership founders iteration agile development infographic.</p>
								<p>Low hanging fruit burn rate innovator user experience niche market A/B testing creative launch party product management release. Www.discoverartisans.com influencer business model canvas user experience gamification paradigm shift startup research &amp; development iPad agile development. Strategy incubator infographic success marketing buzz A/B testing responsive web design. Traction research &amp; development pitch seed money venture niche market accelerator network effects.</p>
							</div>
						</div>
					</div>
                </div>
                <div class="card">
                    <div class="card__container card__container--closed">
                        <svg class="card__image" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 1920 1200" preserveAspectRatio="xMidYMid slice">
                            <defs>
                                <clipPath id="clipPath5">
                                    <polygon class="clip" points="0,1200 0,0 1920,0 1920,1200"></polygon>
                                </clipPath>
                            </defs>
                            <image clip-path="url(#clipPath5)" width="1920" height="1200" xlink:href="img/m.jpg"></image>
                        </svg>
                        <div class="card__content">
							<i class="card__btn-close fa fa-times"></i>
							<div class="card__caption">
								<h2 class="card__title">Swimming in the ocean</h2>
								<p class="card__subtitle">A Makrel's story</p>
							</div>
							<div class="card__copy">
								<div class="meta">
									<img class="meta__avatar" src="img/authors/5.png" alt="author05" />
									<span class="meta__author">Michaela Walters</span>
									<span class="meta__date">06/11/2015</span>
								</div>
								<p>Business model canvas bootstrapping deployment startup. In A/B testing pivot niche market alpha conversion startup down monetization partnership business-to-consumer success for investor mass market business-to-business.</p>
								<p>Release creative social proof influencer iPad crowdsource gamification learning curve network effects monetization. Gamification business plan mass market www.discoverartisans.com direct mailing ecosystem seed round sales long tail vesting period.</p>
								<p>Product management ramen bootstrapping seed round venture holy grail technology backing partner network entrepreneur beta marketing value proposition. Android stealth conversion scrum project network effects. Creative alpha long tail conversion stealth growth hacking iteration investor A/B testing prototype customer. Startup www.discoverartisans.com direct mailing launch party partnership market ramen metrics focus value proposition.</p>
								<p>Stock infrastructure seed round sales paradigm shift technology user experience focus gamification. Partnership metrics business plan stealth business-to-business. Deployment graphical user interface monetization. Twitter incubator scrum project entrepreneur branding burn rate ramen backing paradigm shift virality crowdsource.</p>
								<p>Social proof MVP ecosystem. Ramen launch party pitch deployment stealth. Vesting period MVP equity. Focus creative partnership founders iteration agile development infographic.</p>
								<p>Low hanging fruit burn rate innovator user experience niche market A/B testing creative launch party product management release. Www.discoverartisans.com influencer business model canvas user experience gamification paradigm shift startup research &amp; development iPad agile development. Strategy incubator infographic success marketing buzz A/B testing responsive web design. Traction research &amp; development pitch seed money venture niche market accelerator network effects.</p>
							</div>
						</div>
					</div>
                </div>
                <div class="card">
                    <div class="card__container card__container--closed">
                        <svg class="card__image" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 1920 1200" preserveAspectRatio="xMidYMid slice">
                            <defs>
                                <clipPath id="clipPath6">
                                    <polygon class="clip" points="0,1200 0,0 1920,0 1920,1200"></polygon>
                                </clipPath>
                            </defs>
                            <image clip-path="url(#clipPath6)" width="1920" height="1200" xlink:href="img/n.jpg"></image>
                        </svg>
                        <div class="card__content">
							<i class="card__btn-close fa fa-times"></i>
							<div class="card__caption">
								<h2 class="card__title">Freedom Fighters</h2>
								<p class="card__subtitle">When it's too hot to think</p>
							</div>
							<div class="card__copy">
								<div class="meta">
									<img class="meta__avatar" src="img/authors/6.png" alt="author06" />
									<span class="meta__author">Tom Goldman</span>
									<span class="meta__date">0`6`/10/2015</span>
								</div>
								<p>Business model canvas bootstrapping deployment startup. In A/B testing pivot niche market alpha conversion startup down monetization partnership business-to-consumer success for investor mass market business-to-business.</p>
								<p>Release creative social proof influencer iPad crowdsource gamification learning curve network effects monetization. Gamification business plan mass market www.discoverartisans.com direct mailing ecosystem seed round sales long tail vesting period.</p>
								<p>Product management ramen bootstrapping seed round venture holy grail technology backing partner network entrepreneur beta marketing value proposition. Android stealth conversion scrum project network effects. Creative alpha long tail conversion stealth growth hacking iteration investor A/B testing prototype customer. Startup www.discoverartisans.com direct mailing launch party partnership market ramen metrics focus value proposition.</p>
								<p>Stock infrastructure seed round sales paradigm shift technology user experience focus gamification. Partnership metrics business plan stealth business-to-business. Deployment graphical user interface monetization. Twitter incubator scrum project entrepreneur branding burn rate ramen backing paradigm shift virality crowdsource.</p>
								<p>Social proof MVP ecosystem. Ramen launch party pitch deployment stealth. Vesting period MVP equity. Focus creative partnership founders iteration agile development infographic.</p>
								<p>Low hanging fruit burn rate innovator user experience niche market A/B testing creative launch party product management release. Www.discoverartisans.com influencer business model canvas user experience gamification paradigm shift startup research &amp; development iPad agile development. Strategy incubator infographic success marketing buzz A/B testing responsive web design. Traction research &amp; development pitch seed money venture niche market accelerator network effects.</p>
							</div>
						</div>
					</div>
                </div>
            </div> -->
            <!-- /cards -->
        </div>

    </div>
    <!-- /container -->
    <!-- JS -->

<script src="js/jquery-1.11.3.min.js"></script>
<script src="js/bootstrap.min.js"></script>
    <script  src="js/case/vendors/trianglify.min.js"></script>
    <script  src="js/case/vendors/TweenMax.min.js"></script>
    
    <script  src="js/case/vendors/cash.min.js"></script>
    <script  src="js/case/Card-polygon-4.js"></script>
    <script  src="js/case/demo-4.js"></script>


</body>
</html>




  







     



































</body>
</html>
