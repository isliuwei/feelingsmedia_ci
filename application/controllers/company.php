<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Company extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this -> load-> library('email');
		$this -> load -> helper('captcha');
		$this -> load -> model('ader_model');
        $this -> load -> model('anchor_model');
        $this -> load -> model('company_model');
	}

	public function pre($data)
	{
		echo "<pre>";
		var_dump($data);
		echo "</pre>";
	}

	
	public function index()
	{
		$this -> load -> view('index');	
	}

	public function company_reg()
	{
		//验证码配置项
		$vals = array(
			'word'      => rand(1000,9999),
			'img_path'  => './captcha/',
			'img_url'   => 'http://localhost/feelingsmedia/captcha/',
			'font_path' => './path/to/fonts/texb.ttf',
			'img_width' => '100',
			'img_height'    => 30,
			'expiration'    => 7200,
			'word_length'   => 8,
			'font_size' => 16,
		);

		$cap = create_captcha($vals);

		$data = array(
				'codeinfo' => $cap
		);
		$this -> load -> view('company-reg',$data);	
	}

	public function save_company()
	{
		//1.接收数据
		$username = htmlspecialchars($this -> input -> post('username')) ;
		$pwd1 = htmlspecialchars($this -> input -> post('pwd1'));
		$tel = htmlspecialchars($this -> input -> post('tel'));
		$email = htmlspecialchars($this -> input -> post('email')) ;
		$company = htmlspecialchars($this -> input -> post('company'));
		$website = htmlspecialchars($this -> input -> post('website')) ;

		$resourceCate = $this -> input -> post('resourceCate',true);

		$resourceCity = $this -> input -> post('resourceCity',true);

		function createStr($array,$attr)
		{
			$string = "";
			for($i=0;$i<count($array);$i++){
				$string.=$array[$i]->$attr.',';
			};
			return substr($string,0,-1);

		}

		if($resourceCate)
		{
			$catesql = implode(',',$resourceCate); 
			$cates = $this -> company_model -> getCates($catesql);
			$catesString = createStr($cates,'aderResourceName');
		}
		else
		{
			$catesString="";
		}

		if($resourceCity)
		{
			$citysql = implode(',',$resourceCity);
			$citys = $this -> company_model -> getCitys($citysql);
			$citysString = createStr($citys,'aderCity_name');
		}
		else
		{
			$citysString="";
		}


		 //2.连接数据库,存数据
		$rows = $this -> company_model -> save_by_all($username,$pwd1,$tel,$email,$company,$website,$catesString,$citysString,$resourceCate,$resourceCity);

		if($rows>0)
		{
			$data = array(
				'info'=>'注册成功',
				'url' => 'company/company_reg'
			);
			$this -> load -> view('redirect-null',$data);
		}
		else
		{
			$data = array(
				'info'=>'注册失败',
				'url' => 'company/company_reg'
			);
			$this -> load -> view('redirect-null',$data);
		}		
	}


	public function company_need_list()
	{
		$this -> load -> view('company-need-list');
	}

	public function check_username()
	{
		$username = $this->input->get('user');
		$row = $this->company_model->get_by_username($username);
		if ($row) {
			echo "true";
		} else {
			echo "false";
		}
	}

	public function check_email()
	{
		$email = $this -> input -> get('email');
		$email_row = $this -> company_model -> get_by_email($email);
		if($email_row){
			echo 'true';
		}else{
			echo 'false';
		}
	}





	public function check_login()
	{

		$username = $this -> input -> post('username');
		$password = $this -> input -> post('password');

		$row = $this -> company_model -> get_by_username_password($username,$password);

		$data = array(
			'companyInfo' => $row
		);
		
		if($row)
		{
			$this -> session -> set_userdata($data);
			redirect('company/company_need_list');

		}
		else
		{
			$data = array(
				'info'=>'登录失败!',
				'tip' => '请检查用户名或密码！',
				'url' => 'company/company_reg'
			);
			$this -> load -> view('redirect-null',$data);
		}
			

			


	}

	public function company_setting()
	{//账号信息管理
		//验证码配置项
		$vals = array(
			'word'      => rand(1000,9999),
			'img_path'  => './captcha/',
			'img_url'   => 'http://localhost/feelingsmedia/captcha/',
			'font_path' => './path/to/fonts/texb.ttf',
			'img_width' => '100',
			'img_height'    => 30,
			'expiration'    => 7200,
			'word_length'   => 8,
			'font_size' => 16
		);

		$cap = create_captcha($vals);

		$company_id = $this -> uri ->segment(3);

		$row = $this -> company_model -> get_by_company_id($company_id);

		if($row){
			$data = array(
				'companyInfo' => $row,
				'codeinfo' => $cap
			);
		}
		
		$this -> load -> view('company-setting',$data);
	}

	public function update_tel_email()//用户信息管理
	{
		$companyInfo = $this -> session -> userdata('companyInfo')-> company_id;
		echo $companyInfo -> company_id;


//		$company_id = $this -> input -> post('company_id');
		$tel = $this -> input -> post('tel');
		$email = $this -> input -> post('email');

		$old_tel = $this -> session -> userdata('company_tel');
		$old_email = $this -> session -> userdata('company_email');

		if($tel !== $old_tel || $email !== $old_email)
		{
			$this -> load -> model('company_model');
			$this -> company_model -> update_tel_email($company_id,$tel,$email);
		}
	}

	public function company_list()
	{
		$this -> load -> view('company-list');
	}

	public function login_out()
	{
		$this -> session -> unset_userdata('companyInfo');
		redirect('company/company_reg');
	}



	public function company_need_profile()//需求信息列表
	{
		$this -> load -> view('company-need-profile');
	}

	public function update_company_info()
	{
		$id = $this -> input -> post('company_id');
		$email = $this -> input -> post('email');
		$tel = $this -> input -> post('tel');

		$row = $this -> company_model -> update_by_email_tel($id,$email,$tel);

		$url = (object)[
			'tip' => '修改成功!',
			'href' => 'company/company_reg'
		];


		$data = array(
			'info' => $url
		);

		if($row==0){
			echo "<script>alert('未修改任何信息！')</script>";
			echo "<script>location.href='company_setting/'+$id;</script>";
		}else{

			$data = array(
				'info'=>'信息更新成功！',
				'url' => 'company/company_reg'
			);
			$this -> load -> view('redirect-null',$data);
		}



	}


	public function check_password()
	{
		$oldPassword = $this -> input -> get('oldPassword');
	    $companyInfo = $this -> session -> userdata('companyInfo');
	    $username = $companyInfo -> company_username;
	    $row = $this -> company_model -> get_by_username_and_password($username,$oldPassword);

	    if($row){
	        echo "true";

	    }else{
	        echo "false";
	    }
	}


	public function update_password()
	{
		$company_id = $this -> input -> post('company_id');
		$password = $this -> input -> post('newPassword1');


		$row = $this -> company_model -> update_password_by_id($company_id,$password);
		
		if($row==0){
			echo "<script>alert('未修改任何信息！')</script>";
			echo "<script>location.href='company_setting/'+$company_id;</script>";
		}else{
			$data = array(
				'info'=>'密码修改成功！',
				'url' => 'company/company_reg'
			);
			$this -> load -> view('redirect-null',$data);
		}

	}






}
