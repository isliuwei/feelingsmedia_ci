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


	// public function company_need_list()
	// {
	// 	$this -> load -> view('company-need-list');
	// }

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

		$username = $this -> input -> post('companyUsername');
		$password = $this -> input -> post('companyPassword');

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

	// public function company_list()
	// {
	// 	$this -> load -> view('company-list');
	// }

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

	public function forget_password()
	{
		$this -> load -> view('company-forget-password');
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



		$email_obj = $this -> company_model -> get_email_by_username($username);

		

		$email_reg = $email_obj -> company_email;


		
		$row0 = $this -> company_model -> get_company_by_username_email($username,$email);


		if($row0){

			$myEmail =  $row0 -> company_email;

			$password = getRandPwd(12);

			$row = $this -> company_model -> update_password_by_username($username,$password);
			

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
					'url' => 'company/company_reg'
				);
				$this -> load -> view('redirect-null',$data);

			}

			
		}else{
			$username = $this -> input -> post('username');

			$email = $this -> input -> post('email');



			$email_obj = $this -> company_model -> get_email_by_username($username);

			$email_reg = $email_obj -> company_email;

			//$myEmail =  $info -> anchor_email;


			$password = getRandPwd(12);

			$row = $this -> company_model -> update_password_by_username($username,$password);
			

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
			$this -> email -> initialize($config);

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
				'url' => 'company/company_reg'
			);
			$this -> load -> view('redirect-null',$data);


		}


	}

	public function check_company_username()
	{
		$username = $this -> input -> get('username');


		$result = $this -> company_model -> get_by_username($username);
		if($result){
			echo "success";
		}else{
			echo "fail";
		}
	}

	public function company_need_list()
	{


		$count = $this -> company_model -> get_company_count();
		
		$offset = $this -> uri -> segment(3) == NULL?0 : $this -> uri -> segment(3);
        $this->load->library('pagination');

        $config['base_url'] = 'company/company_need_list';
        $config['total_rows'] = $count;
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

        $result = $this -> company_model -> get_company_by_page($config['per_page'],$offset);

        if($result)
        {

			$data = array(
				'companys' => $result,
				'count' => $count
			);
			
			$this -> load -> view('company-need-list',$data);
		   
		}
		else
		{
			$this -> load -> view('company-search-null');
		}

	}

	public function search_needs_by_aderCate()
	{
		$aderCate_id = $this -> input -> get('aderCate_id');
		$count = $this -> company_model -> get_company_count_by_aderCate($aderCate_id);
		$companyCount = $count[0] -> {'count(*)'};

		$offset = $this -> input -> get('per_page') == NULL?0 : $this -> input -> get('per_page');
        $this->load->library('pagination');

        $config['base_url'] = 'company/search_needs_by_aderCate?aderCate_id='.$aderCate_id;
        $config['total_rows'] = $companyCount;
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

        $result = $this -> company_model -> get_company_by_aderCate($aderCate_id,$config['per_page'],$offset);

        // $this -> pre($result);
        // die();

        if($result)
        {

			$data = array(
				'companys' => $result,
				'count' => $companyCount
			);
			
			$this -> load -> view('company-search-sheet',$data);
		   
		}
		else
		{
			$this -> load -> view('company-search-null');
		}


	}

	public function search_needs_by_resource()
	{
		$resourceCate_id = $this -> input -> get('resourceCate_id');
		$count = $this -> company_model -> get_company_count_by_resourceCate($resourceCate_id);
		$companyCount = $count[0] -> {'count(*)'};

		$offset = $this -> input -> get('per_page') == NULL?0 : $this -> input -> get('per_page');
        $this->load->library('pagination');

        $config['base_url'] = 'company/search_needs_by_resource?resourceCate_id='.$resourceCate_id;
        $config['total_rows'] = $companyCount;
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

        $result = $this -> company_model -> get_company_by_resourceCate($resourceCate_id,$config['per_page'],$offset);

        // $this -> pre($result);
        // die();

        if($result)
        {

			$data = array(
				'companys' => $result,
				'count' => $companyCount
			);
			
			$this -> load -> view('company-search-sheet',$data);
		   
		}
		else
		{
			$this -> load -> view('company-search-null');
		}



	}


	public function search_needs_by_city()
	{
		$city_id = $this -> input -> get('city_id');
		$count = $this -> company_model -> get_company_count_by_city($city_id);
		$companyCount = $count[0] -> {'count(*)'};

		$offset = $this -> input -> get('per_page') == NULL?0 : $this -> input -> get('per_page');
		// echo $offset;
		// die();
        $this->load->library('pagination');

        $config['base_url'] = 'company/search_needs_by_city?city_id='.$city_id;
        $config['total_rows'] = $companyCount;
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

        $result = $this -> company_model -> get_company_by_city($city_id,$config['per_page'],$offset);

        // $this -> pre($result);
        // die();

        if($result)
        {

			$data = array(
				'companys' => $result,
				'count' => $companyCount
			);
			
			$this -> load -> view('company-search-sheet',$data);
		   
		}
		else
		{
			$this -> load -> view('company-search-null');
		}



	}

	public function company_list()
	{
		$result = $this -> company_model -> get_all();

		$data = array(
			'companyInfo' => $result 
		);

		$this -> load -> view('company-list',$data);
	}

	










}
