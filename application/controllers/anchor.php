<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Anchor extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this -> load-> library('email');
		$this -> load -> helper('captcha');
		$this -> load -> model('ader_model');
	    $this -> load -> model('anchor_model');
	    $this -> load -> model('company_model');
	}

	public function index()
	{
		$this -> load -> view('index');
	}

	public function anchor_reg(){
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
		$this -> load -> view('anchor-reg',$data);

	}

	public function check_anchor_username()
	{
		$username = $this -> input -> get('username');

		$result = $this -> anchor_model -> get_by_username($username);
		if($result){
			echo "success";
		}else{
			echo "fail";
		}
	}

	public function check_anchor_email()
	{
			$email = $this -> input -> get('email');
			$result = $this -> anchor_model -> get_by_email($email);
			if($result){
				echo "success";
			}else{
				echo "fail";
			}
	}

	//第一张注册表
	public function save_anchor(){
		// 接收数据
		$username = htmlspecialchars($this -> input -> post('username'));
		$pwd1=htmlspecialchars( $this -> input -> post('pwd1'));
		$tel=htmlspecialchars( $this -> input -> post('tel'));
		$email= htmlspecialchars($this -> input -> post('email'));
		$trueName=htmlspecialchars( $this -> input -> post('trueName'));
		$qqNum= htmlspecialchars($this -> input -> post('qqNum'));
		$bankAccount=htmlspecialchars( $this -> input -> post('bankAccount'));

//		$obj = (object)[
//				"anchor_username"=>$username,
//				"anchor_password"=>$pwd1,
//				"anchor_tel"=>$tel,
//				"anchor_email"=>$email,
//				"anchor_name"=>$trueName,
//				"anchor_qqNum"=>$qqNum,
//				"anchor_bankAccount"=>$bankAccount
//		];
//		$data = array(
//				"anchorInfo" => $obj
//		);

		$data = array(
				"anchor_username"=>$username,
				"anchor_password"=>$pwd1,
				"anchor_tel"=>$tel,
				"anchor_email"=>$email,
				"anchor_name"=>$trueName,
				"anchor_qqNum"=>$qqNum,
				"anchor_bankAccount"=>$bankAccount
		);
		$this ->session ->set_userdata($data);
		$this -> load -> view('anchor-regDetail');
	}

	public function regDetail()
	{
		$this -> load -> view('anchor-regDetail');
	}
	//第二张注册表
	public function save_anchor2(){

		$username = $this->session->userdata('anchor_username');
		$pwd1 = $this->session->userdata('anchor_password');
		$tel = $this->session->userdata('anchor_tel');
		$email = $this->session->userdata('anchor_email');
		$trueName = $this->session->userdata('anchor_name');
		$bankAccount = $this->session->userdata('anchor_bankAccount');
		$qqNum = $this->session->userdata('anchor_qqNum');
		$platform = htmlspecialchars($this -> input -> post('platform'));
		$platformId = htmlspecialchars($this -> input -> post('platformId'));
		$nickname = htmlspecialchars($this -> input -> post('nickname'));
		$fansNumber = htmlspecialchars($this -> input -> post('fansNumber'));
		$gender = htmlspecialchars($this -> input -> post('gender'));
		$country = htmlspecialchars($this -> input -> post('country'));
		$city = htmlspecialchars($this -> input -> post('city'));
		$anchorCate = $this -> input -> post('anchorCate');
		$anchorAttr = $this -> input -> post('anchorAttr');


		$config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size'] = '3072';
		$config['file_name'] = date("YmdHis") . '_' . rand(10000, 99999);
		$this -> load -> library('upload', $config);
		$this -> upload -> do_upload('anchor_photo');
		$upload_data = $this -> upload -> data();
		if ( $upload_data['file_size'] > 0 ) {
			$anchorPhotoUrl = 'uploads/'.$upload_data['file_name'];
		}else{
			$anchorPhotoUrl = 'img/anchor.jpg';
		}


		

		$row = $this -> anchor_model-> save_anchor_by_all($username,$pwd1,$tel,$email,$trueName, $qqNum,$bankAccount,$fansNumber,$country,$city,$gender,$nickname,$anchorPhotoUrl,$platform,$platformId,$anchorCate,$anchorAttr);
		

		if($row>0){
			$data = array(
				'info'=>'注册成功',
				'url' => 'anchor/anchor_reg'
			);
			$this -> load -> view('redirect-null',$data);
		}

		


	}
	//登录验证
	public function check_login(){
		$username = htmlspecialchars($this -> input -> post('username')) ;
		$password=htmlspecialchars( $this -> input -> post('password'));

		$row = $this->anchor_model->get_by_name_pwd($username,$password);
		if($row){
			$this -> load ->view('anchor-need-list');
		}else{
			$this -> load ->view('anchor-reg');
		}
	}



	public function forget_password()
	{
		$this -> load -> view('anchor-forget-password');
	}


	public function find_password()
	{
		//生成随机密码
		function getRandPwd($length){
		   $str = null;
		   $strPol = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789abcdefghijklmnopqrstuvwxyz";
		   $max = strlen($strPol)-1;
		   for($i=0;$i<$length;$i++){
		    	$str.=$strPol[rand(0,$max)];//rand($min,$max)生成介于min和max两个数之间的一个随机整数
		   }
		   	return $str;
		}

		$username = $this -> input -> post('username');
		$email = $this -> input -> post('email');
		$password = getRandPwd(12);

		$row = $this -> anchor_model -> update_password_by_username($username,$password);
		// var_dump($row);
		// die();

		if($row>0){
			//以下设置Email参数
			$config['protocol'] = 'smtp';
			$config['smtp_host'] = 'smtp.163.com';
			$config['smtp_user'] = 'lw.588';
			$config['smtp_pass'] = 'wyyx16220811';
			$config['smtp_port'] = '25';
			$config['charset'] = 'utf-8';
			$config['wordwrap'] = TRUE;
			$config['mailtype'] = 'html';
			$this->email->initialize($config);

			//以下设置Email内容
			$this->email->from('lw.588@163.com', '北京慧灵思投资管理有限公司');
			$this->email->to($email);
			$this->email->subject('找回密码');
			$this->email->message(
				'亲爱的用户：您好！请您使用该密码进行登录
				<font color=red>'.$password.'</font>,
				为保证您的账户安全，请您尽快前往个人中心修改密码！
				若不修改，请您牢记当前密码，您可以使用当前密码作为您的登录密码！
				请勿直接回复该邮件！谢谢您的合作！from feelingsmedia.com'
			);
			$this -> email -> send();
			$data = array(
				'info'=>'密码修改成功',
				'url' => 'anchor/anchor_reg'
			);
			$this -> load -> view('redirect-null',$data);

		}else{
			echo "fail";
		}

	}


	











}
