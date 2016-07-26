<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Anchor_model extends CI_Model{

	public function save_anchor($username, $pwd1, $tel, $email, $trueName, $qqNum, $bankAccount,$fansNumber,$country,$gender,$nickname,$photo_url,$platform,$platformId){
		$arr = array(
			"anchor_username"=>$username,
			"anchor_password"=>$pwd1,
			"anchor_tel"=>$tel,
			"anchor_email"=>$email,
			"anchor_name"=>$trueName,
			"anchor_qqNum"=>$qqNum,
			"anchor_bankAccount"=>$bankAccount,
			"anchor_platformName"=>$platform,
			"anchor_platformID"=>$platformId,
			"anchor_photo"=>$photo_url,
			"anchor_fansNumber"=>$fansNumber,
			"anchor_gender"=>$gender,
			"anchor_region"=>$country,
			"anchor_fansNumber"=>$fansNumber
		);
		return $this->db->insert("t_anchor",$arr) ->row();
	}
	public function get_by_name_pwd($username, $password){
		$arr = array(
				"anchor_username"=>$username,
				"anchor_password"=>$password
		);
		$query = $this ->db ->get_where('t_anchor',$arr);
		return $query ->row();
	}

	public function get_by_email($email)
	{
		$data = array(
      "anchor_email"=>$email
    );

    $query = $this -> db -> get_where('t_anchor',$data);

		return $query -> row();

	}

  public function get_by_username($username)
  {
    $data = array(
      "anchor_username" => $username
    );

    $query = $this -> db -> get_where('t_anchor',$data);

		return $query -> row();

  }
















}
