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
            <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">平台主播注册列表</strong> / <small>anchor list</small></div>
        </div>



<div class="admin-content">       
<div class="am-g">
<div class="am-u-sm-12">
<table class="am-table am-table-striped am-table-bordered am-table-compact" id="example">
<thead>
  	<tr>
    	<th class="table-id">序号</th>
        <th class="table-type">个人信息</th>
        <th class="table-type">平台信息</th>
        <th class="table-type">联系方式</th>
        
        <th class="table-type">其他信息</th>
        
       <th class="table-type">操作</th>
  	</tr>
</thead>
<tbody>
<?php
	$num = 0;
	foreach($anchors as $anchor){
	$num++;
?>

  <tr class="<?php echo $num%2==0?'odd' : 'even' ;?>">
    <td><?php echo $num; ?></td>
    <td>
    	<p class="am-text-success">
    		<span class="am-icon-copyright"></span>
    		<?php echo $anchor -> anchor_username; ?>
    	</p>
    	<p class="am-text-success">
    		<span class="am-icon-user"></span>
    		<?php echo $anchor -> anchor_name; ?>
    	</p>
    	<p class="am-text-success">
    		<span class="am-icon-venus-mars"></span>
    		<?php echo $anchor -> anchor_gender; ?>
    	</p>

    	
    </td>
    <td>
    	<p class="am-text-danger">
    		<span class="am-icon-briefcase"></span>
    		<?php echo $anchor -> anchor_platformName; ?>
    	</p>
    	<p class="am-text-danger">
    		<span class="am-icon-qrcode"></span>
    		<?php echo $anchor -> anchor_platformID; ?>
    	</p>
    	<p class="am-text-danger">
    		<span class="am-icon-language"></span>
    		<?php echo $anchor -> anchor_platformNickname; ?>
    	</p>


    </td>
    <td>
    	<p>
    		<a href="tel:<?php echo $anchor -> anchor_tel; ?>">
    		<span class="am-icon-phone"></span>
    		<?php echo $anchor -> anchor_tel; ?>
    		</a>
    	</p>
    	
    	<p>
    		
    		<a href="mailto:<?php echo $anchor -> anchor_email; ?>">
    		<span class="am-icon-envelope-o"></span>
    		<?php echo $anchor -> anchor_email; ?>
    		</a>
    	</p>
    	
    	<p>	
    		<a href="javascript:;">
    		<span class="am-icon-qq"></span>
    		<?php echo $anchor -> anchor_qqNum; ?>
    		</a>
    	</p>
    </td>
    
    <td>
    	<p class="am-text-default">
    		<span class="am-icon-users"></span>
    		<?php echo $anchor -> anchor_fansNumber; ?>
    	</p>

    	<p class="am-text-default">
    		<span class="am-icon-terminal"></span>
    		<?php echo $anchor -> anchor_attr; ?>
    	</p>

    	<p class="am-text-default">
    		<span class="am-icon-credit-card-alt"></span>
    		<?php echo $anchor -> anchor_bankAccount; ?>
    	</p>

    	
    </td>
    
<td>
    <div class="am-btn-toolbar" >
        <div class="am-btn-group am-btn-group-xs">
        	<button data-id="<?php echo $anchor -> anchor_id; ?>" class="am-btn am-btn-warning am-btn-xs  am-hide-sm-only am-radius am-btn-block"><span class="am-icon-zoom"></span> 查看</button>
            <button data-id="<?php echo $anchor -> anchor_id; ?>" class="am-btn am-btn-success am-btn-xs  am-hide-sm-only am-radius am-btn-block"><span class="am-icon-trash-o"></span> 删除</button>

            <button data-id="<?php echo $anchor -> anchor_id; ?>" class="am-btn am-btn-primary am-btn-xs  am-hide-sm-only am-radius am-btn-block"><span class="am-icon-pencil"></span> 编辑</button>

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
            var $offOrder_id = $(this).data('id');
            var $tr = $('tr[selector*='+$offOrder_id+']');
            //alert($offOrder_id);
            $.get('admin/admin_delete_offOrder',{'offOrder_id':$offOrder_id},function(res){
                if(res=='success'){
                    $tr.remove();
                    alert('删除成功！');
                    location.reload();
                    
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

<script type="text/template" id="tmpl">
    

        <!-- <tr  class="<%= offOrder_color %>" selector="offOrder-tr<%= offOrder_id %>" data-id="<%= offOrder_id %>">
            <td><%= offOrder_id %></td>
            <td><%= offOrder_name %></td>
            <td><%= offOrder_type %></td>
            <td><%= offOrder_address %></td>
            <td><%= offOrder_tel %></td>
            <td><%= offOrder_time %></td>
            <td> 
                <input class="offOrder_id" type="hidden" value="<%= offOrder_id %>">
                <select data-id="<%= offOrder_id %>" class="offOrder-status my-select" name="offOrder_status" data-placeholder="订单状态" style="width:140px;">
                    <option data-id="<%= offOrder_id %>" value="am-active" <%= offOrder_color  == 'am-active'?'selected="selected"':''%>>已接单</option>
                    <option data-id="<%= offOrder_id %>" value="am-warning" <%= offOrder_color == 'am-warning'?'selected="selected"':''%>>施工中</option>
                    <option data-id="<%= offOrder_id %>" value="am-disabled" <%= offOrder_color == 'am-disabled'?'selected="selected"':''%>>失败</option>
                    <option data-id="<%= offOrder_id %>" value="am-success" <%= offOrder_color == 'am-success'?'selected="selected"':''%>>已完成</option>

                </select>
            </td>
            <td>
                <div class="am-btn-toolbar" >
                    <div class="am-btn-group am-btn-group-xs">
                        <button href="admin/delete_admin" data-id="<%= offOrder_id %>" class="am-btn am-btn-default am-btn-xs am-text-danger am-hide-sm-only am-btn-delete am-disabled"><span class="am-icon-trash-o"></span> 删除</button>
                        <button class="am-btn am-btn-default am-btn-xs am-text-danger am-hide-sm-only am-btn-success" data-am-offcanvas="{target: '#doc-oc-demo<%= offOrder_id %>'}"><span class="am-icon-pencil"></span>备注</button>
                        <div id="doc-oc-demo<%= offOrder_id %>" class="am-offcanvas">
                          <div class="am-offcanvas-bar am-offcanvas-bar-flip">
                            <div class="am-offcanvas-content">
                                <input type="hidden" name="offOrder_id" value="<%= offOrder_id %>">
                                <fieldset>
                                    <legend style="color: #fff;">订单备注</legend>
                                    <div class="am-form-group">
                                      <label for="doc-ta-1">请输入订单备注信息</label>
                                      <textarea  name="remark_content" class="remark_content" cols="30" rows="5" id="doc-ta-1" selector="offOrder-remark<%= offOrder_id %>"><%= offOrder_remark %></textarea>
                                    </div>
                                    <button type="button" class="am-btn remark" data-id= "<%= offOrder_id %>">保存</button>
                                </fieldset>
                            </div>
                          </div>
                        </div>
                    </div>
                </div>
            </td>   
        </tr> -->
        
   
</script>


<script>
    // $(function(){
    //     var $keyword = $('#keyword');
    //     $('#search-btn').on('click',function(){
            
            
    //         $.get('admin/admin_offOrder_search',{'keyword':$keyword.val()},function(res){
    //             $('#count').html(res.count);
    //             $('#tbody').empty();
                
    //             for(var i=0; i<res.data.length;i++){
    //                  //console.log(_.template);
    //                 var order = res.data[i];
                    
                   
    //                 $('#tbody').append(_.template( $('#tmpl').html() )(order));

    //             }

    //         },'json');
    //     });

    // });  
</script>



<script>
    // $('#tbody').on('change','.offOrder-status',function(){
    //     var $offOrder_color = $(this).find('option:selected').val();
    //     var $offOrder_id = $(this).data('id');
    //     var $tr = $('tr[selector*='+$offOrder_id+']');
    //     $.get('admin/update_offOrder_status',{'offOrder_color':$offOrder_color,'offOrder_id':$offOrder_id},function(res){
    //         if(res){
    //             $tr.removeClass().addClass(res.data[0].offOrder_color);
    //         }
    //     },'json');
           
    // });
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


<script>
    // $(function(){

    //     $('#tbody').on('click','.remark',function(){
    //         $offOrder_id = $(this).data('id');
    //         $offOrder_remark = $('textarea[selector*='+$offOrder_id+']').val();

    //         $.get('admin/update_offOrder_remark',{'offOrder_id':$offOrder_id,'offOrder_remark':$offOrder_remark},function(res){
    //             if(res=="success"){
    //                 alert("修改成功");
    //             }
    //         });
            

    //     });

    // });
    
</script>







</body>
</html>
