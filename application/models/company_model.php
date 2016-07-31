<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
    

class Company_model extends CI_Model{


	public function save_by_all($username,$pwd1,$tel,$email,$company,$website,$catesString,$citysString,$resourceCate,$resourceCity)
	{
	
		$data = array(
			'company_username' => $username,
			'company_password' => $pwd1,
			'company_tel' => $tel,
			'company_email' => $email,
			'company_name' => $company,
			'company_website' => $website,
			'company_resourceCate' => $catesString,
			'compnay_resourceCity' => $citysString
		);



		$this -> db -> insert('t_company',$data);
		$save_row = $this -> db -> affected_rows();
		$company_id = $this -> db -> insert_id();

		if($save_row>0)
		{
			$one_info = array();
			$insert_cate_data = array();
			$one_info['company_id'] = $company_id;
			for($i = 0; $i < count($resourceCate); $i++) {
	            $one_info['companyResourceCate_id'] = (int)($resourceCate[$i]);
	            $insert_cate_data[] = $one_info;
			}

			$this -> db -> insert_batch("t_r_company_companyResourceCate",$insert_cate_data); 
  			//return $this -> db -> affected_rows();

			$two_info = array();
			$insert_city_data = array();
			$two_info['company_id'] = $company_id;
  			for($i = 0; $i < count($resourceCity); $i++) {
	            $two_info['companyCity_id'] = (int)($resourceCity[$i]);
	            $insert_city_data[] = $two_info;
			}


			$this -> db -> insert_batch("t_r_company_companyCity",$insert_city_data);

			return $this -> db -> affected_rows();

		}




	}

	public function get_by_username($username){
		$data = array(
			'company_username' => $username
		);
		return $this -> db -> get_where('t_company',$data) -> row();
	}

	public function get_by_email($email){
		$data = array(
			'company_email' => $email
		);

		return $this -> db -> get_where('t_company',$data) -> row();
	}

	

	public function get_by_username_password($username,$password)
	{
		$data = array(
			'company_username' => $username,
			'company_password' => $password
		);
		$query = $this -> db -> get_where('t_company',$data);
		return $query -> row();

	}

	public function update_tel_email($company_id,$tel,$email)
	{
		$data = array(
			'company_tel' => $tel,
			'company_email' => $email,
		);

		$this -> db -> where('company_id',$company_id);
		$this -> db -> update('t_company',$data);

	}

	public function getCates($catesql)
	{
		if($catesql)
		{
			$sql = 'select tb.aderResourceName from t_aderResourceCate as tb where tb.aderResourceCate_id in('.$catesql.')';
			return $this -> db -> query($sql) -> result();

		}
		
	}


	public function getCitys($citysql)
	{
		if($citysql)
		{
			$sql = 'select tb.aderCity_name from t_aderCity as tb where tb.aderCity_id in('.$citysql.')';
			return $this -> db -> query($sql) -> result();
		}
		
	}

	public function get_by_company_id($company_id)
	{
		$data = array(
			'company_id' => $company_id
		);

		return $this -> db -> get_where('t_company',$data) -> row();
	}

	public function update_by_email_tel($id,$email,$tel)
	{
		$data = array(
          'company_email' => $email,
		  'company_tel' => $tel
    	);

	    $this -> db -> where('company_id', $id);
	    $this -> db -> update('t_company', $data);

	    return $this -> db -> affected_rows();
	}

	public function get_by_username_and_password($username,$password)
	{
        $data = array(
            'company_username' => $username,
            'company_password' => $password
        );

        $query = $this -> db -> get_where('t_company',$data);

        return $query -> row();

	}

	public function update_password_by_id($company_id,$password)
	{
		$data = array(
        	'company_password' => $password
    	);

	    $this->db->where('company_id', $company_id);
	    $this->db->update('t_company', $data);
    	return $this -> db -> affected_rows();

	}

	public function get_email_by_username($username)
	{

		$sql = "select t_company.company_email from t_company where t_company.company_username = '$username'";

    	return $this -> db -> query($sql) -> row() ;

	}

	


	
	public function get_company_by_username_email($username,$email)
  	{

    	$data = array(
            'company_username' => $username,
            'company_email' => $email
        );

        $query = $this -> db -> get_where('t_company',$data);

        return $query -> row();

  	}

  	public function update_password_by_username($username,$password)
  	{
  		$data = array(
          	'company_password' => $password
      	);

  	    $this ->db -> where('company_username', $username);
  	    $this ->db -> update('t_company', $data);

  	    return $this -> db -> affected_rows();

  	}


  	public function getAderCates($catesql)
	{
		if($catesql)
		{
			$sql = 'select tb.aderCate_name from t_aderCate as tb where tb.aderCate_id in('.$catesql.')';
			return $this -> db -> query($sql) -> result();
		}
		
	}

	public function save_company_need_by_all($companyNeedInfo)
	{
		$data = array(
			'companyNeed_brand' => $companyNeedInfo['aderBrand'],
			'companyNeed_pro' => $companyNeedInfo['aderPro'],
			'companyNeed_photo' => $companyNeedInfo['aderLogoUrl'],
			'aderCateString' => $companyNeedInfo['aderCateString'],
			'companyNeed_time' => $companyNeedInfo['aderTime'],
			'companyNeed_cycle' => $companyNeedInfo['aderCycle'],
			'companyNeed_bud' => $companyNeedInfo['aderBud'],
			'aderResourceCateString' => $companyNeedInfo['aderResourceCateString'],
			'aderCityString' => $companyNeedInfo['aderCityString'],
			'companyNeed_others' => $companyNeedInfo['otherNeed'],
			'ader_id' => $companyNeedInfo['aderId']
		);


		$this -> db -> insert('t_companyNeed',$data);





		
		$save_row = $this -> db -> affected_rows();
		$companyNeed_id = $this -> db -> insert_id();
		//echo $save_row."------".$company_id;
		//die();

		if($save_row > 0)
		{
			$one_info = array();
			$insert_cate_data = array();
			$one_info['companyNeed_id'] = $companyNeed_id;
			for($i = 0; $i < count($companyNeedInfo['aderCate']); $i++) 
			{
	            $one_info['aderCate_id'] = (int)($companyNeedInfo['aderCate'][$i]);
	            $insert_cate_data[] = $one_info;
			}

			
			
			if( $companyNeedInfo['aderCate'] )
			{

				$this -> db -> insert_batch("t_r_companyNeed_aderCate",$insert_cate_data); 

			}
			

  			//return $this -> db -> affected_rows();


			$two_info = array();
			$insert_resource_data = array();
			$two_info['companyNeed_id'] = $companyNeed_id;
  			for($i = 0; $i < count($companyNeedInfo['resourceCate']); $i++) 
  			{
	            $two_info['aderResourceCate_id'] = (int)($companyNeedInfo['resourceCate'][$i]);
	            $insert_resource_data[] = $two_info;
			}
			
			if( $companyNeedInfo['resourceCate'] )
			{

				$this -> db -> insert_batch("t_r_companyNeed_aderResourceCate",$insert_resource_data);

			}



		// 	return $this -> db -> affected_rows();

			
			$three_info = array();
			$insert_city_data = array();
			$three_info['companyNeed_id'] = $companyNeed_id;
  			for($i = 0; $i < count($companyNeedInfo['city']); $i++) 
  			{
	            $three_info['aderCity_id'] = (int)($companyNeedInfo['city'][$i]);
	            $insert_city_data[] = $three_info;
			}

			// echo count($insert_city_data,1);
			// die();
			if( $companyNeedInfo['city'] )
			{

				$this -> db -> insert_batch("t_r_companyNeed_aderCity",$insert_city_data);

			}


			


			// print_r($insert_cate_data);
			// print_r($insert_resource_data);
			// print_r($insert_city_data);
			// die();
			


		}
		return $this -> db -> affected_rows();

	}
	




}