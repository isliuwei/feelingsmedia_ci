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






}
