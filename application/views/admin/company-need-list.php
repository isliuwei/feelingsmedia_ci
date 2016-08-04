<!doctype html>
<html class="no-js">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>feelingsmedia后台管理</title>
    <meta name="description" content="这是一个 table 页面">
    <meta name="keywords" content="table">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="renderer" content="webkit">
    <meta http-equiv="Cache-Control" content="no-siteapp" />
    <base href="<?php echo site_url();?>">
    <link rel="icon" type="image/png" href="assets/i/favicon.png">
    <link rel="apple-touch-icon-precomposed" href="assets/i/app-icon72x72@2x.png">
    <meta name="apple-mobile-web-app-title" content="Amaze UI" />
    <link rel="stylesheet" href="assets/css/amazeui.min.css"/>
    <link rel="stylesheet" href="assets/css/admin.css">
    <link rel="stylesheet" href="assets/css/amazeui.chosen.css"/>
    <link rel="stylesheet" href="assets/css/amazeui.datatables.min.css"/>
    <style>
        #search{
            float: right;
            padding-right: 30px;
            padding-bottom: 20px;
        }
        #result{
            float: left;
            margin-left: 20px;
            margin-top: 10px;
        }
        #page{
            float: right;
            margin-right: 20px;
        }
        p{
        	margin: 5px !important;
        }
        td{
        	vertical-align: middle !important;
        }
        .am-offcanvas-content {
		     padding: 0px; 
		     
		}
		.am-offcanvas-content a{
			/*color: #0e90d2;*/
			color: #e0690c;
		}
		.am-panel-footer{
			color: #e0690c;
		}
		#alert{
			visibility: hidden;
		}
		
    </style>
</head>
<body>
<!--[if lte IE 9]>
<p class="browsehappy">你正在使用<strong>过时</strong>的浏览器，Amaze UI 暂不支持。 请 <a href="http://browsehappy.com/" target="_blank">升级浏览器</a>
    以获得更好的体验！</p>
<![endif]-->

<?php include 'admin-header.php'; ?>

<div class="am-cf admin-main">
    <?php include 'admin-sidebar.php'; ?>

    <!-- content start -->
    <div class="admin-content">

        <div class="am-cf am-padding">
            <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">媒体公司需求信息列表</strong> / <small>anchor need list</small></div>
        </div>



<div class="admin-content">       
<div class="am-g">
<div class="am-u-sm-12">
<table class="am-table am-table-striped am-table-bordered am-table-compact" id="example">
<thead>
  	<tr>
    	<th class="table-type">添加时间</th>
        <th class="table-type">广告主资料</th>
        <th class="table-type">投放信息</th>
        <th class="table-type">媒体公司需求信息</th>
        <th class="table-type">其他需求</th>
        <th class="table-type">操作</th>
  	</tr>
</thead>
<tbody id="tbody">
<?php
	$num = 0;
	foreach($companyNeeds as $need){
	$num++;
?>

  <tr class="<?php echo $num%2==0?'odd' : 'even' ;?>">
    <td><?php echo $need -> add_time; ?></td>
    <td>
    	<p class="am-text-success">
    		<span class="am-icon-copyright"></span>
    		<?php echo $need -> companyNeed_brand; ?>
    	</p>
    	<p class="am-text-success">
    		<span class="am-icon-briefcase"></span>
    		<?php echo $need -> companyNeed_pro; ?>
    	</p>
    	

    	
    </td>
    <td>
    	<p class="am-text-danger">
    		<span class="am-icon-clock-o"></span>
    		<?php echo $need -> companyNeed_time; ?>
    	</p>
    	<p class="am-text-danger">
    		<span class="am-icon-calendar-check-o"></span>
    		<?php echo $need -> companyNeed_cycle; ?>
    	</p>
    	<p class="am-text-danger">
    		<span class="am-icon-money"></span>
    		<?php echo $need -> companyNeed_bud; ?>
    	</p>
    </td>
    <td>
    	
    	<p class="am-text-success">
    		<span class="am-icon-navicon"></span>
    		<?php echo mb_substr($need -> aderResourceCateString, 0,6)."......"; ?>
    	</p>
    	<p class="am-text-success">
    		<span class="am-icon-plane"></span>
    		<?php echo mb_substr($need -> aderCityString, 0,6)."......"; ?>
    	</p>
    	
    </td>
    
    <td>
    	<p class="am-text-default">
    		<span class="am-icon-file-text-o"></span>
    		<?php echo mb_substr($need -> companyNeed_others, 0,30)."......"; ?>
    	</p>


    	
    </td>
    
<td selector="<?php echo $need -> companyNeed_id; ?>">
    <div class="am-btn-toolbar" >
        <div class="am-btn-group am-btn-group-xs">
        	<button data-id="<?php echo $need -> companyNeed_id; ?>" class="am-btn am-btn-default am-btn-xs  am-hide-sm-only am-radius am-btn-block" data-am-modal="{target: '#my-popup<?php echo $need -> companyNeed_id ;?>'}" ><span class="am-icon-search"></span> 查&nbsp;&nbsp;&nbsp;&nbsp;看</button>
            

            <button data-id="<?php echo $need -> companyNeed_id; ?>" class="am-btn am-btn-default am-btn-xs  am-hide-sm-only am-radius am-btn-block"><a style="display:block;" href="admin/companyNeed_edit/<?php echo $need -> companyNeed_id ;?>"> <span class="am-icon-pencil"></span> 编辑审核</a></button>

            <button data-id="<?php echo $need -> companyNeed_id; ?>" class="am-btn am-btn-default am-btn-xs  am-hide-sm-only am-radius am-btn-block am-btn-delete"><span class="am-icon-trash-o"></span> 删&nbsp;&nbsp;&nbsp;&nbsp;除</button>

           

<!-- 侧边栏内容 -->



<div class="am-popup" id="my-popup<?php echo $need -> companyNeed_id; ?>">
  <div class="am-popup-inner">
    <div class="am-popup-hd">
      <h4 class="am-popup-title">主播需求详细信息</h4>
      <span data-am-modal-close
            class="am-close">&times;</span>
    </div>
    <div class="am-popup-bd">
      <div class="am-panel-bd" style="text-align:center;">
			    <img class="am-circle" src="<?php echo $need -> companyNeed_photo ;?>" width="100" height="100"/>
		</div>

    	<ul class="am-list am-list-border">
			<li>
			  	<a href="javascript:;"><span class="am-icon-copyright"></span>
			    广告主品牌：<?php echo $need -> companyNeed_brand; ?>
			    </a>
			</li>
		  	<li>
			  	<a href="javascript:;"><span class="am-icon-briefcase"></span>
			    广告主宣传产品：<?php echo $need -> companyNeed_pro; ?>
			    </a>
			</li>
			<li>
			  	<a href="javascript:;"><span class="am-icon-connectdevelop"></span>
			    广告主行业：<?php echo $need -> aderCateString; ?>
			    </a>
			</li>
			<li>
			  	<a href="javascript:;"><span class="am-icon-clock-o"></span>
			    预计投放时间：<?php echo $need -> companyNeed_time; ?>
			    </a>
			</li>

			<li>
			  	<a href="javascript:;"><span class="am-icon-calendar-check-o"></span>
			    预计投放周期：<?php echo $need -> companyNeed_cycle; ?>
			    </a>
			</li>

			<li>
			  	<a href="javascript:;"><span class="am-icon-cny"></span>
			    投放预算：<?php echo $need -> companyNeed_bud; ?>
			    </a>
			</li>
			<li>
			  	<a href="javascript:;"><span class="am-icon-navicon"></span>
			    需要资源渠道类型：<?php echo $need -> aderResourceCateString; ?>
			    </a>
			</li>
			<li>
			  	<a href="javascript:;"><span class="am-icon-smile-o"></span>
			    投放城市：<?php echo $need -> aderCityString; ?>
			    </a>
			</li>
            <li>
                <a href="javascript:;"><span class="am-icon-file-text-o"></span>
                其他需求：
                <?php echo $need -> companyNeed_others; ?>
                </a>
            </li>
		</ul>

    	
    
    </div>
  </div>
</div>




        </div>
    </div>
</td>   

  </tr>
  <?php 
  	}
  ?>
  </tbody>
</table>

                
</div>
</div>
</div>


<button
	id="alert"
  type="button"
  class="am-btn am-btn-primary"
  data-am-modal="{target: '#my-alert'}">
 
</button>

<div class="am-modal am-modal-alert" tabindex="-1" id="my-alert">
  <div class="am-modal-dialog">
    <div class="am-modal-hd">提示</div>
    <div class="am-modal-bd">
     删除成功！
    </div>
    <div class="am-modal-footer">
      <span class="am-modal-btn">确定</span>
    </div>
  </div>
</div>





        




<footer>
    <hr>
    <p class="am-padding-left">© 2014 AllMobilize, Inc. Licensed under MIT license.</p>
</footer>

<!--[if lt IE 9]>
<script src="http://libs.baidu.com/jquery/1.11.1/jquery.min.js"></script>
<script src="http://cdn.staticfile.org/modernizr/2.8.3/modernizr.js"></script>
<script src="assets/js/amazeui.ie8polyfill.min.js"></script>
<![endif]-->

<!--[if (gte IE 9)|!(IE)]><!-->
<script src="assets/js/jquery.min.js"></script>
<!--<![endif]-->
<script src="assets/js/amazeui.min.js"></script>
<script src="assets/js/app.js"></script>
<script src="assets/js/amazeui.chosen.min.js"></script>
<script src="assets/js/underscore.min.js"></script>
<script src="assets/js/amazeui.datatables.min.js"></script>
<script>
	jQuery.extend(jQuery.fn.dataTableExt.oSort, {
		  "chinese-string-asc": function(s1, s2) {
		    return s1.localeCompare(s2);
	  	},

		  "chinese-string-desc": function(s1, s2) {
		    return s2.localeCompare(s1);
	  	}
	});


	
	$(function() {
    	$('#example').DataTable();
  	});

</script>
<script>
    
    $(function(){
        $('#tbody').on('click','.am-btn-delete', function(){
            var $companyNeed_id = $(this).data('id');
            var $tr = $('tr[selector='+$companyNeed_id+']');
            
            $.get('admin/companyNeed_delete',{'companyNeed_id':$companyNeed_id},function(res){
                if(res=='success'){
                    $tr.remove();
                    $('#alert').trigger('click');
                   
                    setTimeout(function(){
                    	location.reload();
                    },3000);
                }
            },'text');

        });

    });
</script>

<script>
    $(function() {
      $('.my-select').chosen();

      $('.chosen-select').chosen({disable_search_threshold: 10});
    });
</script>











<script>
    // $(function() {
    //   $('#doc-prompt-toggle').on('click', function() {
    //     $('#my-prompt').modal({
    //       relatedTarget: this,
    //       onConfirm: function(e) {
    //         $.get('admin/check_delete',{'pwd':e.data},function(res){
    //             if(res == "true"){
    //                 alert('你的密码输入正确！');
    //                 $('.am-btn-delete').removeClass('am-disabled');
    //             }else{
    //                 alert('你的密码输入错误，无法进行后续操作！');
    //             }
    //         });
    //       },
    //       onCancel: function(e) {
    //         alert('你的输入有误!');
    //       }
    //     });
    //   });
    // });
</script>










</body>
</html>
