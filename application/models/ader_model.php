<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Ader_model extends CI_Model{


	public function get_by_username($username)
	{

    $data = array(
        'ader_username' => $username
    );

    $query = $this -> db -> get_where('t_ader',$data);

    return $query -> row();

	}


  public function get_by_email($email)
	{

    $data = array(
        'ader_email' => $email
    );

    $query = $this -> db -> get_where('t_ader',$data);

    return $query -> row();

	}


  public function save_by_all($username,$password,$email,$tel,$company,$website)
	{

    $data = array(
        'ader_username' => $username,
        'ader_password' => $password,
        'ader_email' => $email,
        'ader_tel' => $tel,
        'ader_companyName' => $company,
        'ader_website' => $website
    );

    $this -> db -> insert('t_ader',$data);

	return $this -> db -> affected_rows();

	}

  public function get_by_username_and_password($username,$password)
  {
        $data = array(
            'ader_username' => $username,
            'ader_password' => $password
        );

        $query = $this -> db -> get_where('t_ader',$data);

        return $query -> row();

  }

  public function get_by_ader_id($ader_id)
  {

    $data = array(
        'ader_id' => $ader_id
    );

    $query = $this -> db -> get_where('t_ader',$data);

    return $query -> row();

  }

	public function update_by_email_tel($id,$email,$tel)
	{
		$data = array(
          'ader_email' => $email,
					'ader_tel' => $tel
    );

    $this->db->where('ader_id', $id);
    $this->db->update('t_ader', $data);

    return $this -> db -> affected_rows();
	}


	public function update_password_by_username($username,$password)
	{
		$data = array(
        'ader_password' => $password
    );

    $this->db->where('ader_username', $username);
    $this->db->update('t_ader', $data);

    return $this -> db -> affected_rows();

	}

	public function update_password_by_id($ader_id,$password)
	{
		$data = array(
        'ader_password' => $password
    );

    $this->db->where('ader_id', $ader_id);
    $this->db->update('t_ader', $data);

    return $this -> db -> affected_rows();

	}

	public function save_anchorNeed_by_all($aderBrand,$aderPro,$aderTime,$aderCycle,$anchorNum,$fansNum,$anchorCoop,$aderLogo_url,$otherNeed,$anchorCate,$aderCate,$anchorCates,$aderCates,$ader_id)
	{
			$data = array(
				'anchorNeed_brand' => $aderBrand,
				'anchorNeed_pro' => $aderPro,
				'anchorNeed_time' => $aderTime,
				'anchorNeed_cycle' => $aderCycle,
				'anchorNeed_number' => $anchorNum,
				'anchorNeed_fansNumber' => $fansNum,
				'anchorNeed_coopCate' => $anchorCoop,
				'anchorNeed_logo' => $aderLogo_url,
				'anchorNeed_anchorCates' => $anchorCates,
				'anchorNeed_aderCates' => $aderCates,
				'anchorNeed_otherNeed' => $otherNeed,
				'ader_id' => $ader_id
			);

			$this -> db -> insert('t_anchorNeed',$data);

			return $this -> db -> affected_rows();
	}

	public function get_anchorNeed_by_aderId($ader_id)
	{
			$data = array(
	        'ader_id' => $ader_id
	    );
	    $query = $this -> db -> get_where('t_anchorNeed',$data);
			//$query = $this -> db -> query('select * from t_anchorNeed where ader_id = '.$ader_id);
			return $query -> result();
	}

	public function get_anchorNeed_count(){
		return $this->db->count_all('t_anchorNeed');
	}

	public function get_anchorNeed_by_aderId_and_page($ader_id,$per_page,$offset)
	{
			//$this -> db -> order_by('add_time','desc');
			$query = $this -> db -> query( 'select * from t_anchorNeed need where need.ader_id = '.$ader_id.' order by add_time desc limit '.$offset.','.$per_page );
			return $query -> result();
	}













}
