<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ader extends CI_Controller {

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

	public function redirect()
	{
		$this -> load -> view('redirect');
	}


	public function ader_index()
	{
		$this -> load -> view('ader-index');
	}


	/**  广告主注册页面  **/

	public function ader_reg()
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

        $this -> load -> view('ader-reg',$data);


	}

	public function change_cap()
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

        echo json_encode($data);

	}

	public function check_ader_username()
	{
		$username = $this -> input -> get('username');



		$result = $this -> ader_model -> get_by_username($username);

		if($result){
			echo "success";
		}else{
			echo "fail";
		}
	}


	public function check_ader_email()
	{
		$email =  $this -> input -> get('email');

		$result = $this -> ader_model -> get_by_email($email);
		if($result){
			echo "success";
		}else{
			echo "fail";
		}
	}

	public function save_ader()
	{

		  $username = htmlspecialchars($this -> input -> post('username'));
		  $password = htmlspecialchars($this -> input -> post('pwd1'));
		  $email = htmlspecialchars($this -> input -> post('email'));
			$tel = htmlspecialchars($this -> input -> post('tel'));
		  $company = htmlspecialchars($this -> input -> post('company'));
		  $website = htmlspecialchars($this -> input -> post('website'));

			$result = $this -> ader_model -> save_by_all($username,$password,$email,$tel,$company,$website);

			if($result>0){
				// echo "<script>alert('注册成功！请点击登录按钮进行登录！')</script>";
				// redirect('ader/ader_reg');
				$this -> load -> view('redirect-reg');
				//$this -> load -> view('ader-reg');
			}else{
				echo "<script>alert('注册失败！')</script>";
			}

	}

	public function check_login()
	{
		$username = htmlspecialchars($this -> input -> post('username'));
		$password = htmlspecialchars($this -> input -> post('password'));

		$row = $this -> ader_model -> get_by_username_and_password($username,$password);

		$data = array(
				'aderInfo' => $row
		);

		//3. 跳转
		if($row){
				$this -> session -> set_userdata($data);
				redirect('ader/ader_index');
		}else{
				$this -> load -> view('redirect-login');
		}
	}

	public function logout()
	{
      $this -> session -> unset_userdata('aderInfo');
      redirect('ader/ader_reg');
	}


	public function ader_setting()
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



			$ader_id = $this -> input -> get('ader_id');
			$row = $this -> ader_model -> get_by_ader_id($ader_id);

			if($row){
				$data = array(
					'aderInfo' => $row,
					'codeinfo' => $cap
				);
			}
			// var_dump($data);
			// die();

			$this -> load -> view('ader-setting',$data);


	}


	public function update_ader_info()
	{
		$id = $this -> input -> post('ader_id');
		$email = $this -> input -> post('email');
		$tel = $this -> input -> post('tel');

		$row = $this -> ader_model -> update_by_email_tel($id,$email,$tel);

		$url = (object)[
			'tip' => '修改成功!',
			'href' => 'ader_reg'
		];


		$data = array(
			'info' => $url
		);

		if($row==0){
				echo "<script>alert('未修改任何信息！')</script>";
				redirect('ader/ader_setting');
		}else{
				$this -> load -> view('redirect',$data);
		}



	}

	public function forget_password()
	{
		$this -> load -> view('ader-forget-password');
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

		$row = $this -> ader_model -> update_password_by_username($username,$password);
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
			$this->email->from('lw.588@163.com', 'lw.588');
			$this->email->to($email);
			$this->email->subject('找回密码');
			$this->email->message(
				'亲爱的用户：您好！请您使用该密码进行登录
				<font color=red>'.$password.'</font>,
				为保证您的账户安全，请您尽快前往个人中心修改密码！
				若不修改，请您牢记当前密码，您可以使用当前密码作为您的登录密码！
				请勿直接回复该邮件！谢谢您的合作！from feelingsmedia.com'
			);
			$this->email->send();
			$this -> load -> view('redirect-pwd');

		}else{
			echo "fail";
		}






	}




}
