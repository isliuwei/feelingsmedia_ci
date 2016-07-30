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




}