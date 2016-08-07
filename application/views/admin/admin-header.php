<?php
    $adminInfo = $this -> session -> userdata('adminInfo');
    if(!$adminInfo){
        redirect('admin/login');
    }
?>


<header class="am-topbar am-topbar-inverse admin-header">

    <div class="am-topbar-brand">
        <small>慧灵思后台管理</small>
    </div>
    
    <button class="am-topbar-btn am-topbar-toggle am-btn am-btn-sm am-btn-success am-show-sm-only" data-am-collapse="{target: '#topbar-collapse'}"><span class="am-sr-only">导航切换</span> <span class="am-icon-bars"></span></button>
    
    <div class="am-collapse am-topbar-collapse" id="topbar-collapse">

        <ul class="am-nav am-nav-pills am-topbar-nav am-topbar-right admin-header-list">
            <li class="am-dropdown" data-am-dropdown>
                <a class="am-dropdown-toggle" data-am-dropdown-toggle href="javascript:;">
                    <span class="am-icon-users"></span> 管理员 | <img src="<?php echo $adminInfo -> admin_photo;?>" style="width: 20px;height: 20px;"alt="">&nbsp;<?php echo $adminInfo -> admin_username;?> <span class="am-icon-caret-down"></span>
                </a>
                <ul class="am-dropdown-content">
                    <!-- <li><a href="#"><span class="am-icon-user"></span> 资料</a></li> -->
                    <li><a href="admin/admin_setting?admin_id=<?php echo $adminInfo -> admin_id;?>"><span class="am-icon-cog"></span> 设置</a></li>
                    <li><a href="admin/logout"><span class="am-icon-power-off"></span> 退出</a></li>
                </ul>
            </li>
            <li class="am-hide-sm-only"><a href="javascript:;" id="admin-fullscreen"><span class="am-icon-arrows-alt"></span> <span class="admin-fullText">开启全屏</span></a></li>
        </ul>
    </div>
</header>



