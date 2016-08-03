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

	public function pre($data)
	{
		echo "<pre>";
		var_dump($data);
		echo "</pre>";
	}

	// public function x()
	// {
	// 	$this -> load -> view('anchor-need-list');
	// }

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
		$result = $this -> anchor_model -> get_all_anchorCates();
		$data = array(
			'anchorCates' => $result
		);
		$this -> load -> view('anchor-regDetail',$data);
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


		

		$anchorAccountCates = $this -> anchor_model -> get_anchorCate_by_idArr($anchorCate);


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


		

		$row = $this -> anchor_model-> save_anchor_by_all($username,$pwd1,$tel,$email,$trueName, $qqNum,$bankAccount,$fansNumber,$country,$city,$gender,$nickname,$anchorPhotoUrl,$platform,$platformId,$anchorCate,$anchorAttr,$anchorAccountCates);
		

		if($row>0){
			$data = array(
				'info'=>'注册成功',
				'url' => 'anchor/anchor_reg'
			);
			$this -> load -> view('redirect-null',$data);
		}

		


	}

	public function anchor_need_list()
	{
		$anchorNeeds_count = $this -> anchor_model -> get_anchorNeed_count();
		$offset = $this -> uri -> segment(3) == NULL?0 : $this -> uri -> segment(3);
        $this->load->library('pagination');
        $config['base_url'] = 'anchor/anchor_need_list';
        $config['total_rows'] = $anchorNeeds_count;
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

		$result = $this -> anchor_model -> get_anchorNeed_by_page($config['per_page'],$offset);

		$data = array(
			'anchorNeeds' => $result,
			'total' => $anchorNeeds_count
		);

		

		if($result){
		    $this -> load -> view('anchor-need-list',$data);
		}
		
	}
	


	/**
      @author: liuwei
      @time: 2016/07/27
      @task: 主播登录验证
  	*/


	public function check_login()
	{
		$username = $this -> input -> post('anchorUsername',true);
		$password = $this -> input -> post('anchorPassword',true);

		$row = $this -> anchor_model -> get_by_username_and_password($username,$password);

		
		$data = array(
			'anchorInfo' => $row
		);

		
		if($row){
			$this -> session -> set_userdata($data);
			redirect('anchor/anchor_need_list');
			
		}else{
			$data = array(
				'info'=>'登录失败!',
				'tip' => '请检查用户名或密码！',
				'url' => 'anchor/anchor_reg'
			);
			$this -> load -> view('redirect-null',$data);
		}
	} 


	public function logout()
	{
      $this -> session -> unset_userdata('anchorInfo');
      redirect('anchor/anchor_reg');
	}

	public function anchor_profile()
	{
      	$anchor_id = $this -> uri -> segment(3);

      	$row = $this -> anchor_model -> get_anchor_by_id($anchor_id);

      	$anchorCates = $this -> anchor_model -> get_anchorCates_by_id($anchor_id);

      	

      	$data =  array(
      		'anchorProfile' => $row,
      		'anchorCates' => $anchorCates
      	);

      	// $this -> pre($data);
      	// die();


      	$this -> load -> view('anchor-profile',$data);

	}

	public function anchor_setting()
	{

		$anchor_id = $this -> uri -> segment(3);

      	$row = $this -> anchor_model -> get_anchor_by_id($anchor_id);

      	$anchorCates = $this -> anchor_model -> get_anchorCates_by_id($anchor_id);

      	$data =  array(
      		'anchorProfile' => $row,
      		'anchorCates' => $anchorCates
      	);

      	$this -> load -> view('anchor-setting',$data);

	}




	public function forget_password()
	{
		$this -> load -> view('anchor-forget-password');
	}

	/**

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

	*/




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

		$email_obj = $this -> anchor_model -> get_email_by_username($username);

		$email_reg = $email_obj -> anchor_email;
		
		$row0 = $this -> anchor_model -> get_anchor_by_username_email($username,$email);

		

		if($row0){

			$myEmail =  $row0 -> anchor_email;

			$password = getRandPwd(12);

			$row = $this -> anchor_model -> update_password_by_username($username,$password);
			

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
				$data = array(
					'info'=>'密码修改成功',
					'url' => 'anchor/anchor_reg'
				);
				$this -> load -> view('redirect-null',$data);

			}

			
		}else{
			$username = $this -> input -> post('username');

			$email = $this -> input -> post('email');



			$email_obj = $this -> anchor_model -> get_email_by_username($username);

			$email_reg = $email_obj -> anchor_email;

			//$myEmail =  $info -> anchor_email;


			$password = getRandPwd(12);

			$row = $this -> anchor_model -> update_password_by_username($username,$password);
			

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
				
				// $data = array(
				// 	'info'=>'密码修改成功',
				// 	'url' => 'anchor/anchor_reg'
				// );
				// $this -> load -> view('redirect-null',$data);

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
			$data = array(
				'info' => '密码已经修改！',
				'tip'=>'密码验证邮件已经发送!请注意查收',
				'url' => 'anchor/anchor_reg'
			);
			$this -> load -> view('redirect-null',$data);


		}


	}


	public function update_anchor_info()
	{

		$id = $this -> input -> post('id',true);
		$platform = $this -> input -> post('platform',true);
		$platformId = $this -> input ->post('platformId',true);
		$tel = $this -> input -> post('tel',true);
		$email = $this -> input -> post('email',true);
		$country = $this -> input -> post('country',true);
		$city = $this -> input -> post('city',true);
		$cate = $this -> input -> post('cate',true);
		$fansNumber = $this -> input -> post('fansNumber',true);
		$attr = $this -> input -> post('attr',true);
		$account = $this -> input -> post('account',true);
		$qq = $this -> input -> post('qq',true);
		$oldUrl = $this -> input -> post('oldUrl',true);

		// var_dump($cate);
		// die();

		


		$config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size'] = '3072';
		$config['file_name'] = date("YmdHis") . '_' . rand(10000, 99999);
		$this -> load -> library('upload', $config);
		$this -> upload -> do_upload('anchor_photo');
		$upload_data = $this -> upload -> data();
		if ( $upload_data['file_size'] > 0 ) {
			$url = 'uploads/'.$upload_data['file_name'];
		}else{
			$url = $oldUrl;
		}



		$result = $this -> anchor_model -> update_anchor_info_by_all($id,$platform,$platformId,$tel,$email,$country,$city,$cate,$fansNumber,$attr,$account,$qq,$url);



		if($result>0){

			$data = array(
				'info'=>'信息更新成功！',
				'url' => 'anchor/anchor_reg'
			);
			$this -> load -> view('redirect-null',$data);
			
		}else{
			$data = array(
				'info'=>'信息未修改！',
				'page' => '账号管理页面',
				'url' => 'anchor/anchor_setting/'.$id
			);
			$this -> load -> view('redirect-null',$data);
		}



		

	}


	public function check_password()
	{
		$oldPassword = $this -> input -> get('oldPassword');
	    $anchorInfo = $this -> session -> userdata('anchorInfo');
	    $username = $anchorInfo -> anchor_username;

	    $row = $this -> anchor_model -> get_by_username_and_password($username,$oldPassword);

	    if($row){
	        echo "true";

	    }else{
	        echo "false";
	    }
	}


	public function update_password()
	{
		$anchor_id = $this -> input -> post('anchor_id');
		$password = $this -> input -> post('newPassword1');

		$row = $this -> anchor_model -> update_password_by_id($anchor_id,$password);
		if($row==0){
				echo "<script>alert('未修改密码信息！')</script>";
				echo "<script>location.href='anchor_setting/'+$anchor_id;</script>";
		}else{
				$data = array(
					'info'=>'密码修改成功！',
					'url' => 'anchor/anchor_reg'
				);
				$this -> load -> view('redirect-null',$data);
		}

	}

	public function search_needs()
	{
		$aderCate_id = $this -> input -> get('aderCate_id');
		$searchNeeds_count = $this -> anchor_model -> get_searchNeed_count($aderCate_id);
		$offset = $this -> input -> get('per_page') == NULL?0 : $this -> input -> get('per_page');
        $this->load->library('pagination');
        $config['base_url'] = 'anchor/search_needs?aderCate_id='.$aderCate_id;
        $config['total_rows'] = $searchNeeds_count;
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

        $result = $this -> anchor_model -> get_anchorNeed_by_aderCateId_and_page($aderCate_id,$config['per_page'],$offset);
	    

		

		

		if($result){
			$data = array(
				'anchorNeeds' => $result,
				'total' => $searchNeeds_count
			);
		    $this -> load -> view('anchor-need-search-list',$data);
		}else{
			$this -> load -> view('ader-search-null');
		}


	}



	

	



	











}
