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
		// echo $username;
		// die();


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

	// public function check_ader_by_username_and_email()
	// {
	// 	$username = $this -> input -> get('username');
	// 	$email = $this -> input -> get('email');

	// 	$row = $this -> ader_model -> get_ader_by_username_email($username,$email);

	// 	if($row){
	// 		echo "success";
	// 	}





	// }

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
				$data = array(
					'info'=>'注册成功',
					'url' => 'ader/ader_reg'
				);
				// echo "<script>alert('注册成功！请点击登录按钮进行登录！')</script>";
				// redirect('ader/ader_reg');
				//$this -> load -> view('redirect-reg');
				$this -> load -> view('redirect-null',$data);
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
			'href' => 'ader/ader_reg'
		];


		$data = array(
			'info' => $url
		);

		if($row==0){
				echo "<script>alert('未修改任何信息！')</script>";
				echo "<script>location.href='ader_setting?ader_id='+$id;</script>";
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

		$email_obj = $this -> ader_model -> get_email_by_username($username);

		$email_reg = $email_obj -> ader_email;
		
		$row0 = $this -> ader_model -> get_ader_by_username_email($username,$email);

		

		if($row0){

			$myEmail =  $row0 -> ader_email;

			$password = getRandPwd(12);

			$row = $this -> ader_model -> update_password_by_username($username,$password);
			

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
				$this->email->to($myEmail);
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

			}

			
		}else{
			$username = $this -> input -> post('username');

			$email = $this -> input -> post('email');



			$email_obj = $this -> ader_model -> get_email_by_username($username);

			$email_reg = $email_obj -> ader_email;

			//$myEmail =  $info -> ader_email;


			$password = getRandPwd(12);

			$row = $this -> ader_model -> update_password_by_username($username,$password);
			

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
				$this->email->to($email_reg);
				$this->email->subject('找回密码');
				$this->email->message(
					'亲爱的用户：您好！请您使用该密码进行登录
					<font color=red>'.$password.'</font>,
					为保证您的账户安全，请您尽快前往个人中心修改密码！
					若不修改，请您牢记当前密码，您可以使用当前密码作为您的登录密码！
					若未收到邮件,请您拨打我们的客服电话:400-0000-0000,与我们取得联系。
					我们将第一时间为您提供服务。
					请勿直接回复该邮件！谢谢您的合作！from feelingsmedia.com'
				);
				$this->email->send();
				$this -> load -> view('redirect-pwd');

			}

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
				'亲爱的用户：您好！我们已经将动态密码发送至您注册的邮箱:
				<font color=red>'.$email_reg.'</font>,请您登录该邮箱,
				查看我们发送的动态密码邮件,使用动态密码进行登录。
				为保证您的账户安全，请您在登录成功后,尽快前往个人中心修改密码！
				若不修改，请您牢记当前密码，您可以使用当前密码作为您的登录密码！
				如果您无法登录您的注册邮箱,或者未收到验证邮件,
				请您拨打我们的客服电话:400-0000-0000,与我们取得联系。
				我们将第一时间为您提供服务。
				请勿直接回复该邮件！谢谢您的合作！from isliuwei.com'
			);
			$this->email->send();
			$this -> load -> view('redirect-pwd');


		}
		
		

		






	}


	public function check_password()
	{
		$oldPassword = $this -> input -> get('oldPassword');
	    $aderInfo = $this -> session -> userdata('aderInfo');
	    $username = $aderInfo -> ader_username;

	    $row = $this -> ader_model -> get_by_username_and_password($username,$oldPassword);

	    if($row){
	        echo "true";

	    }else{
	        echo "false";
	    }
	}

	public function update_password()
	{
			$ader_id = $this -> input -> post('ader_id');
			$password = $this -> input -> post('newPassword1');

			$row = $this -> ader_model -> update_password_by_id($ader_id,$password);
			if($row==0){
					echo "<script>alert('未修改密码信息！')</script>";
					echo "<script>location.href='ader_setting?ader_id='+$ader_id;</script>";
			}else{
					$this -> load -> view('redirect-oldpwd');
			}

	}



	public function anchor_need()
	{
		$this -> load -> view('anchor-need');
	}

	public function save_anchor_need()
	{
      $config['upload_path'] = './uploads/';
      $config['allowed_types'] = 'gif|jpg|png';
      $config['max_size'] = '3072';
      $config['file_name'] = date("YmdHis") . '_' . rand(10000, 99999);

      $this -> load -> library('upload', $config);
      $this -> upload -> do_upload('aderLogo');

      $upload_data = $this -> upload -> data();

      if ( $upload_data['file_size'] > 0 ) {
          $aderLogo_url = 'uploads/'.$upload_data['file_name'];
      }else{
          $aderLogo_url = 'img/anchorLogo.jpg';
      }


			$ader_id = $this -> input -> post('ader_id');
			$aderBrand = $this -> input -> post('aderBrand');
			$aderPro = $this -> input -> post('aderPro');
			$aderTime = $this -> input -> post('aderTime');
			$aderCycle = $this -> input -> post('aderCycle');
			$anchorNum = $this -> input -> post('anchorNum');
			$fansNum = $this -> input -> post('fansNum');
			$anchorCoop = $this -> input -> post('anchorCoop');
			$otherNeed = $this -> input -> post('otherNeed');
			$anchorCate = $this -> input -> post('anchorCate');
			$aderCate = $this -> input -> post('aderCate');

			$aderCates = $this -> ader_model -> get_aderCate_by_idArr($aderCate);

			$anchorCateStr = "";
			
			for($i=0;$i<count($anchorCate);$i++){
					$anchorCateStr=$anchorCateStr.$anchorCate[$i]."、";
			}

			$anchorCates =  substr($anchorCateStr,0,-1);

			$row = $this -> ader_model -> save_anchorNeed_by_all($aderBrand,$aderPro,$aderTime,$aderCycle,$anchorNum,$fansNum,$anchorCoop,$aderLogo_url,$otherNeed,$anchorCate,$aderCate,$anchorCates,$aderCates,$ader_id);

			if($row>0){
				$data = array(
					'ader_id' => $ader_id
				);
				$this -> load -> view('redirect-add',$data);
			}

	}

	public function anchor_need_profile()
	{/*增加判断*/

		$aderInfo = $this -> session -> userdata('aderInfo');

		// var_dump($aderInfo);
		// die();

		$ader_id = $aderInfo -> ader_id;

		$count = $this -> ader_model -> get_anchorNeed_count($ader_id);

		$aderNeeds_count = (int)($count[0] -> {'count(*)'});

		if($aderNeeds_count==0){
			$this -> load -> view('aderNeed-404');
		}


		$offset = $this -> input -> get('per_page') == NULL?0 : $this -> input -> get('per_page');
		//$offset = $this -> uri -> segment(3) == NULL?0 : $this -> uri -> segment(3);
		//$config['base_url'] = 'ader/company_need_profile';
		//$offset = $this -> uri -> segment(3)==NULL?0 : $this -> uri ->segment(3);
		$this -> load -> library('pagination');
        //$config['base_url'] = 'ader/anchor_need_profile';
        $config['base_url'] = 'ader/anchor_need_profile?ader_id='.$ader_id;
        $config['total_rows'] = $aderNeeds_count;
        $config['per_page'] = 3;
        $config['page_query_string'] = TRUE;
		$config['full_tag_open'] = '<ul class="pagination">';
		$config['full_tag_close'] = '</ul>';
        $config['last_link'] = FALSE;
		$config['first_link'] = FALSE;
        $config['prev_link'] = '«';//上一页
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';
        $config['next_link'] = '»';//下一页
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['num_tag_open'] = '<li>';//每个数字页
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a href="'.$config['base_url'].'">';//当前页
        $config['cur_tag_close'] = '</a></li>';

        $this -> pagination -> initialize($config);

		$result = $this -> ader_model -> get_anchorNeed_by_aderId_and_page($ader_id,$config['per_page'],$offset);

		$data = array(
			'anchorNeeds' => $result,
			'count' => $aderNeeds_count
		);

		if($result){
		    $this -> load -> view('anchor-need-profile',$data);
		}

	}

	public function anchor()
	{	
		$material = $this -> anchor_model -> get_all_material();
		$anchorCount = $this -> anchor_model -> get_anchor_count();
		$offset = $this -> uri -> segment(3) == NULL?0 : $this -> uri -> segment(3);
        $this->load->library('pagination');
        $config['base_url'] = 'ader/anchor';
        $config['total_rows'] = $anchorCount;
        $config['per_page'] = 6;
		$config['full_tag_open'] = '<ul class="pagination">';
		$config['full_tag_close'] = '</ul>';
        $config['last_link'] = FALSE;
		$config['first_link'] = FALSE;
        $config['prev_link'] = '«';//上一页
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';
        $config['next_link'] = '»';//下一页
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['num_tag_open'] = '<li>';//每个数字页
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a href="'.$config['base_url'].'">';//当前页
        $config['cur_tag_close'] = '</a></li>';

        $this -> pagination -> initialize($config);

        $result = $this -> anchor_model -> get_anchor_by_page($config['per_page'],$offset);

		$data = array(
			'anchors' => $result,
			'count' => $anchorCount,
			'material' => $material
		);

		if($result){
		    $this -> load -> view('anchor',$data);
		}

	}


	public function search_by_fansNumber()
	{
		$range = $this -> input -> get('numRange');
		switch ($range) {
			case '0':
				$condition = '> 0';
				break;
			case '1':
				$condition = 'between 0 and 10000';
				break;
			case '2':
				$condition = 'between 10001 and 50000';
				break;
			case '3':
				$condition = 'between 50001 and 100000';
				break;
			case '4':
				$condition = 'between 100001 and 150000';
				break;
			case '5':
				$condition = 'between 150001 and 250000';
				break;
			case '6':
				$condition = 'between 250001 and 400000';
				break;	
			case '7':
				$condition = 'between 400001 and 600000';
				break;	
			case '8':
				$condition = 'between 600001 and 1000000';
				break;
			case '9':
				$condition = '> 1000000';
				break;		
			
			default:
				$condition = '> 0';
				break;
		}



		$result = $this -> anchor_model -> get_anchor_count_by_range($condition);
		
		$anchorCount = $result[0] -> {'count(*)'};
	
		$offset = $this -> input -> get('per_page') == NULL?0 : $this -> input -> get('per_page');
        $this->load->library('pagination');
        $config['base_url'] = 'ader/search_by_fansNumber?numRange='.$range;
        $config['total_rows'] = $anchorCount;
        $config['per_page'] = 3;
        $config['page_query_string'] = TRUE;
		$config['full_tag_open'] = '<ul class="pagination">';
		$config['full_tag_close'] = '</ul>';
        $config['last_link'] = FALSE;
		$config['first_link'] = FALSE;
        $config['prev_link'] = '«';//上一页
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';
        $config['next_link'] = '»';//下一页
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['num_tag_open'] = '<li>';//每个数字页
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a href="'.$config['base_url'].'">';//当前页
        $config['cur_tag_close'] = '</a></li>';

        $this -> pagination -> initialize($config);



        $result = $this -> anchor_model -> get_anchor_by_range_and_page($condition,$config['per_page'],$offset);
		
		//$result = $this -> anchor_model -> search_anchor_by_range($condition);

		


		if($result){

			$data = array(
				'anchors' => $result,
				'count' => $anchorCount
			);
			
			$this -> load -> view('anchor-by-fansNumber',$data);
		   
		}else{
			$this -> load -> view('anchor-search-null');
		}


	}

	public function search_by_anchorCate()
	{
		
		$anchorCate_id = $this -> input -> get('anchorCate_id');

		$count = $this -> anchor_model -> get_anchor_count_by_anchorCate($anchorCate_id);
		
		$anchorCount = $count[0] -> {'count(*)'};


		$offset = $this -> input -> get('per_page') == NULL?0 : $this -> input -> get('per_page');
        $this->load->library('pagination');
        $config['base_url'] = 'ader/search_by_anchorCate?anchorCate_id='.$anchorCate_id;
        $config['total_rows'] = $anchorCount;
        $config['per_page'] = 3;
        $config['page_query_string'] = TRUE;
		$config['full_tag_open'] = '<ul class="pagination">';
		$config['full_tag_close'] = '</ul>';
        $config['last_link'] = FALSE;
		$config['first_link'] = FALSE;
        $config['prev_link'] = '«';//上一页
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';
        $config['next_link'] = '»';//下一页
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['num_tag_open'] = '<li>';//每个数字页
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a href="'.$config['base_url'].'">';//当前页
        $config['cur_tag_close'] = '</a></li>';

        $this -> pagination -> initialize($config);


        $result = $this -> anchor_model -> get_anchor_by_anchorCate($anchorCate_id,$config['per_page'],$offset);

		// $this -> pre($result);
		// die();



        if($result){

			$data = array(
				'anchors' => $result,
				'count' => $anchorCount
			);
			
			$this -> load -> view('anchor-by-fansNumber',$data);
		   
		}else{
			$this -> load -> view('anchor-search-null');
		}


		
	}

	public function search_by_anchor_province()
	{
		$province = $this -> input -> get('province');
		$count = $this -> anchor_model -> get_anchor_count_by_province($province);
		$anchorCount = $count[0] -> {'count(*)'};

		$offset = $this -> input -> get('per_page') == NULL?0 : $this -> input -> get('per_page');
        $this->load->library('pagination');
        $config['base_url'] = 'ader/search_by_anchor_province?anchor_province='.$province;
        $config['total_rows'] = $anchorCount;
        $config['per_page'] = 3;
        $config['page_query_string'] = TRUE;
		$config['full_tag_open'] = '<ul class="pagination">';
		$config['full_tag_close'] = '</ul>';
        $config['last_link'] = FALSE;
		$config['first_link'] = FALSE;
        $config['prev_link'] = '«';//上一页
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';
        $config['next_link'] = '»';//下一页
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['num_tag_open'] = '<li>';//每个数字页
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a href="'.$config['base_url'].'">';//当前页
        $config['cur_tag_close'] = '</a></li>';

        $this -> pagination -> initialize($config);


        $result = $this -> anchor_model -> get_anchor_by_province($province,$config['per_page'],$offset);


        if($result){

			$data = array(
				'anchors' => $result,
				'count' => $anchorCount
			);
			
			$this -> load -> view('anchor-by-fansNumber',$data);
		   
		}else{
			$this -> load -> view('anchor-search-null');
		}









		
	}

	public function company_need()
	{
		$this -> load -> view('company-need');
	}

	public function save_company_need()
	{

		$config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size'] = '3072';
		$config['file_name'] = date("YmdHis") . '_' . rand(10000, 99999);

		$this -> load -> library('upload', $config);
		$this -> upload -> do_upload('aderLogo');

		$upload_data = $this -> upload -> data();

		if($upload_data['file_size'] > 0)
		{
		  $aderLogoUrl = 'uploads/'.$upload_data['file_name'];
		}
		else
		{
		  $aderLogoUrl = 'img/anchorLogo.jpg';
		}

		$aderId = $this -> input -> post('aderId',true);
		$aderBrand = $this -> input -> post('aderBrand',true);
		$aderPro = $this -> input -> post('aderPro',true);
		$aderCate = $this -> input -> post('aderCate',true);
		$aderTime = $this -> input -> post('aderTime',true);
		$aderCycle = $this -> input -> post('aderCycle',true);
		$aderBud = $this -> input -> post('aderBud',true);
		$resourceCate = $this -> input -> post('resourceCate',true);
		$city = $this -> input -> post('city',true);
		$otherNeed = $this -> input -> post('otherNeed',true);


		function createStr($array,$attr)
		{
			$string = "";
			for($i=0;$i<count($array);$i++){
				$string.=$array[$i]->$attr.',';
			};
			return substr($string,0,-1);

		}

		$companyNeedInfo = array(
			'aderId' => $aderId,
			'aderBrand' => $aderBrand,
			'aderPro' => $aderPro,
			'aderLogoUrl' => $aderLogoUrl,
			'aderCate' => $aderCate,
			'aderTime' => $aderTime,
			'aderCycle' => $aderCycle,
			'aderBud' => $aderBud,
			'resourceCate' => $resourceCate,
			'city' => $city,
			'otherNeed' => $otherNeed
		);


		$aderCateArr = $companyNeedInfo['aderCate'];
		$resourceCateArr = $companyNeedInfo['resourceCate'];
		$resourceCityArr = $companyNeedInfo['city'];





		if($aderCateArr)
		{
			$catesql = implode(',',$aderCateArr);
			$cates = $this -> company_model -> getAderCates($catesql);
			$catesString = createStr($cates,'aderCate_name');
		}
		else
		{
			$catesString="";
		}



		if($resourceCateArr)
		{
			$resourcesql = implode(',',$resourceCateArr); 
			$resource = $this -> company_model -> getCates($resourcesql);
			$resourceString = createStr($resource,'aderResourceName');
		}
		else
		{
			$resourceString="";
		}

		if($resourceCityArr)
		{
			$citysql = implode(',',$resourceCityArr);
			$citys = $this -> company_model -> getCitys($citysql);
			$citysString = createStr($citys,'aderCity_name');
		}
		else
		{
			$citysString="";
		}

		$companyNeedInfo['aderCateString'] = $catesString;
		$companyNeedInfo['aderResourceCateString'] = $resourceString;
		$companyNeedInfo['aderCityString'] = $citysString;


		//$companyNeedInfo.push($catesString,$resourceString,$citysString);

		//$this -> pre($companyNeedInfo);
		//die();

		$row = $this -> company_model -> save_company_need_by_all($companyNeedInfo);
		// if($row>0)
		// {
		// 	$data = array(
		// 		'info'=>'需求发布成功',
		// 		'url' => 'company/company_reg'
		// 	);
		// 	$this -> load -> view('redirect-null',$data);
		// }
		// else
		// {
		// 	$data = array(
		// 		'info'=>'需求发布失败',
		// 		'url' => 'company/company_reg'
		// 	);
		// 	$this -> load -> view('redirect-null',$data);
		// }

		if($row>0)
		{
			$data = array(
				'ader_id' => $aderId
			);
			$this -> load -> view('redirect-add',$data);
		}








	}


	public function company_need_profile()
	{
		$aderInfo = $this -> session -> userdata('aderInfo');
		$ader_id = $aderInfo -> ader_id;


		$aderNeeds_count = $this -> ader_model -> get_companyNeed_count($ader_id);

		$count = (int)($aderNeeds_count[0] -> {'count(*)'});

		if($count==0){
			$this -> load -> view('aderNeed-404');
		}


		$offset = $this -> input -> get('per_page') == NULL?0 : $this -> input -> get('per_page');
		//$offset = $this -> uri -> segment(3) == NULL?0 : $this -> uri -> segment(3);
		$this -> load -> library('pagination');
		//$config['base_url'] = 'ader/company_need_profile';
        $config['base_url'] = 'ader/company_need_profile?ader_id='.$ader_id;
        $config['total_rows'] = $count;
        $config['page_query_string'] = TRUE;
        $config['per_page'] = 3;
		$config['full_tag_open'] = '<ul class="pagination">';
		$config['full_tag_close'] = '</ul>';
        $config['last_link'] = FALSE;
		$config['first_link'] = FALSE;
        $config['prev_link'] = '«';//上一页
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';
        $config['next_link'] = '»';//下一页
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['num_tag_open'] = '<li>';//每个数字页
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a href="'.$config['base_url'].'">';//当前页
        $config['cur_tag_close'] = '</a></li>';

        $this -> pagination -> initialize($config);

        $result = $this -> ader_model -> get_companyNeed_by_aderId_and_page($ader_id,$config['per_page'],$offset);

		$data = array(
			'companyNeeds' => $result,
			'count' => $count
		);
		// var_dump($data);
		// die();

		if($result){
		    $this -> load -> view('company-needlist-profile',$data);
		}

		// $this -> pre($data);
		// die();



		

	}


	public function company_slogan()
	{
		$this -> load -> view('slogan-4');
	}

	public function slogan()
	{
		$this -> load -> view('slogan');
	}

	






}
