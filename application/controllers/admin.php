<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this -> load-> library('email');
		$this -> load -> helper('captcha');
		$this -> load -> model('ader_model');
		$this -> load -> model('admin_model');
        $this -> load -> model('anchor_model');
        $this -> load -> model('company_model');

	}

	public function pre($data)
	{
		echo "<pre>";
		var_dump($data);
		echo "</pre>";
	}

	public function login()
	{
		$this -> load -> view('admin/login');
	}

	public function logout()
	{
		$this -> session -> unset_userdata('adminInfo');
      	redirect('admin/login');
	}

	public function index()
	{
		$this -> load -> view('admin/admin-index');
	}

	public function check_login()
	{
        
        $admin_username = $this -> input -> post('admin_username');
        $admin_password = $this -> input -> post('admin_password');

        $row = $this -> admin_model -> get_by_username_password($admin_username, $admin_password);

        $data = array(
            'adminInfo' => $row
        );

        if($row)
        {
            $this -> session -> set_userdata($data);
            //$this -> load -> view('admin/admin-index');
            redirect('admin/index');
        }
        else
        {
            $this -> load -> view('admin/login');
        }

    }

    public function admin_mgr()
    {

        $result = $this -> admin_model -> get_all();
        if($result)
        {
            $data = array(
              'admins' => $result
            );
            $this -> load -> view('admin/admin-mgr',$data);
        }

    }

    public function add_admin()
    {
        $this -> load -> view('admin/admin-add');
    }

    public function save_admin()
    {
    	$admin_username = $this -> input -> post('admin_username');
    	$admin_password = $this -> input -> post('admin_password');


    	$config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '3072';
        $config['file_name'] = date("YmdHis") . '_' . rand(10000, 99999);

        //图片上传操作
        $this -> load -> library('upload', $config);
        $this -> upload -> do_upload('admin_photo');
        $upload_data = $this -> upload -> data();

        if ( $upload_data['file_size'] > 0 ) {
            //数据库中存photo的路径
            $photo_url = 'uploads/'.$upload_data['file_name'];
        }else{
            //如果不上传图片,则使用默认图片
            $photo_url = 'img/avatar.png';
        }

        $rows = $this -> admin_model -> save_admin_by_name_pwd_photo($admin_username,$admin_password, $photo_url);
        if($rows > 0)
        {
        	$data = array(
				'info'=>'注册成功',
				'url' => 'admin/admin_mgr'
			);
			$this -> load -> view('redirect-null',$data);
        }
        else
        {

        }


    }

    public function check_username()
    {
    	$admin_username = $this -> input -> get('admin_username');


        $result = $this -> admin_model -> get_by_username($admin_username);

        
        
        if($result)
        {
            echo 'success';
        }
        else
        {
            echo 'fail';
        }
    }

    public function admin_setting()
    {
    	$admin_id = $this -> input -> get('admin_id');
    	$row = $this -> admin_model -> get_admin_by_id($admin_id);

    	if($row)
    	{

    		$data = array(
    			'admin' => $row
    		);
    		$this -> load -> view('admin/admin-profile',$data);

    	}
    	
    }

    public function upload($filename,$default)
    {

    	$config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '3072';
        $config['file_name'] = date("YmdHis") . '_' . rand(10000, 99999);

        $this -> load -> library('upload', $config);
        $this -> upload -> do_upload($filename);
        $upload_data = $this -> upload -> data();

        if ( $upload_data['file_size'] > 0 ) 
        {
            $photo_url = 'uploads/'.$upload_data['file_name'];
        }
        else
        {
            $photo_url = $default;
        }

        return $photo_url;

    }

    public function updata_admin()
    {
    	$admin_id = $this -> input -> post('admin_id');
        $admin_username = $this -> input -> post('admin_username');
        $admin_password = $this -> input -> post('admin_password');
        $photo_old_url = $this -> input -> post('photo_old_url');
        $this -> upload('admin_photo',$photo_old_url);
        $url = $this -> upload('admin_photo',$photo_old_url);
       
        
        $row = $this -> admin_model -> updata_admin($admin_id,$admin_username,$admin_password,$url);

        if( $row == 0 )
        {
        	echo "<script>alert('未修改任何信息！')</script>";
			echo "<script>location.href='admin_setting?admin_id='+$admin_id;</script>";
        }
        else
        {
        	$data = array(
				'info'=>'信息更新成功！',
				'tip' => '请重新登录！',
				'page' => '登录页面',
				'url' => 'admin/login'
			);
			$this -> load -> view('redirect-null',$data);
        }
       
    }



    public function anchor_reg()
    {
    	$result = $this -> anchor_model -> get_all();

    	$data = array(
    		'anchors' => $result
    	);

    	$this -> load -> view('admin/anchor-enter-list',$data);

    }


    public function enter_anchor_mgr()
    {
        $result = $this -> anchor_model -> get_by_enter();

        $data = array(
            'anchors' => $result
        );

        $this -> load -> view('admin/anchor-list',$data);

    }

    public function admin_delete()
    {
    	$anchor_id = $this -> input -> get('anchor_id');
    	$row = $this -> anchor_model -> delete_by_id($anchor_id);
    	if( $row > 0 )
    	{
    		echo "success";
    	}
    	else
    	{
    		echo "fail";
    	}
    }


    public function anchor_edit()
    {
    	$anchor_id = $this -> uri -> segment(3);
    	
    	$row = $this -> anchor_model -> get_anchor_by_id($anchor_id);

      	$anchorCates = $this -> anchor_model -> get_anchorCates_by_id($anchor_id);

      	$data =  array(
      		'anchor' => $row,
      		'anchorCates' => $anchorCates
      	);

    	$this -> load -> view('admin/anchor-edit',$data);


    	
    }


    public function update_anchor_info()
    {
        $id = $this -> input -> post('anchor_id',true);
        $name = $this -> input -> post('anchor_name',true);
        $sex = $this -> input -> post('anchor_gender',true);
        $username = $this -> input -> post('anchor_username',true);
        $password = $this -> input -> post('anchor_password',true);
        $platform = $this -> input -> post('anchor_platformName',true);
        $platformId = $this -> input ->post('anchor_platformID',true);
        $nickname = $this -> input ->post('anchor_platformNickname',true);
        $tel = $this -> input -> post('anchor_tel',true);
        $email = $this -> input -> post('anchor_email',true);
        $fansNumber = $this -> input -> post('anchor_fansNumber',true);
        $qq = $this -> input -> post('anchor_qqNum',true);
        $bank = $this -> input -> post('anchor_bankAccount',true);
        $attr = $this -> input -> post('anchor_attr',true);
        $region = $this -> input -> post('anchor_region',true);
        $province = $this -> input -> post('anchor_province',true);
        $cate = $this -> input -> post('cate',true);
        //$verify = $this -> input -> post('verify',true);
        $photo_old_url = $this -> input -> post('photo_old_url');
        $this -> upload('anchor_photo',$photo_old_url);
        $url = $this -> upload('anchor_photo',$photo_old_url);






        $info = array(
            'id' => $id,
            'name' => $name,
            'sex' => $sex,
            'username' => $username,
            'password' => $password,
            'platform' => $platform,
            'platformId' => $platformId,
            'nickname' => $nickname,
            'tel' => $tel,
            'email' => $email,
            'fansNumber' => $fansNumber,
            'qq' => $qq,
            'bank' => $bank,
            'attr' => $attr,
            'region' => $region,
            'province' => $province,
            'cate' => $cate,
            'url' => $url
        );

       

        $row = $this -> anchor_model -> update_anchor_info_by_admin($info);


        if( $row > 0 )
        {

            $data = array(
                'info'=>'信息更新成功！',
                'tip' => '请重新登录！',
                'page' => '登录页面',
                'url' => 'admin/anchor_reg'
            );
            $this -> load -> view('redirect-null',$data);
            
        }
        else
        {
            $data = array(
                'info'=>'信息未修改！',
                'page' => '信息编辑页面',
                'url' => 'admin/anchor_edit/'.$id
            );
            $this -> load -> view('redirect-null',$data);
        }

        
    }

    public function enter_anchor()
    {
        $this -> load -> view('admin/enter-anchor-sheet');
    }

    public function save_enter_anchor_info()
    {
        $isEnter = $this -> input -> post('isEnter',true);
        $name = $this -> input -> post('anchor_name',true);
        $sex = $this -> input -> post('anchor_gender',true);
        $username = $this -> input -> post('anchor_username',true);
        $password = $this -> input -> post('anchor_password',true);
        $platform = $this -> input -> post('anchor_platformName',true);
        $platformId = $this -> input ->post('anchor_platformID',true);
        $nickname = $this -> input ->post('anchor_platformNickname',true);
        $tel = $this -> input -> post('anchor_tel',true);
        $email = $this -> input -> post('anchor_email',true);
        $fansNumber = $this -> input -> post('anchor_fansNumber',true);
        $qq = $this -> input -> post('anchor_qqNum',true);
        $bank = $this -> input -> post('anchor_bankAccount',true);
        $attr = $this -> input -> post('anchor_attr',true);
        $region = $this -> input -> post('anchor_region',true);
        $province = $this -> input -> post('anchor_province',true);
        $cate = $this -> input -> post('cate',true);
        $this -> upload('anchor_photo',"");
        $url = $this -> upload('anchor_photo',"");


        $info = array(
            'isEnter' => $isEnter,
            'name' => $name,
            'sex' => $sex,
            'username' => $username,
            'password' => $password,
            'platform' => $platform,
            'platformId' => $platformId,
            'nickname' => $nickname,
            'tel' => $tel,
            'email' => $email,
            'fansNumber' => $fansNumber,
            'qq' => $qq,
            'bank' => $bank,
            'attr' => $attr,
            'region' => $region,
            'province' => $province,
            'cate' => $cate,
            'url' => $url
        );

        
        $row = $this -> anchor_model -> save_anchor_by_admin($info);

        if( $row > 0 )
        {
            $data = array(
                'info'=>'信息更新成功！',
                'tip' => '请重新登录！',
                'page' => '登录页面',
                'url' => 'admin/anchor_reg'
            );
            $this -> load -> view('redirect-null',$data);
        }
        else
        {
            $data = array(
                'info'=>'信息未修改！',
                'page' => '信息编辑页面',
                'url' => 'admin/anchor_edit/'.$id
            );
            $this -> load -> view('redirect-null',$data);

        }

    }

    public function ader_reg()
    {
        $result = $this -> ader_model -> get_all();

        $data = array(
            'aders' => $result
        );

        //$this -> pre($data);


        $this -> load -> view('admin/ader-list',$data);



    }



	



}