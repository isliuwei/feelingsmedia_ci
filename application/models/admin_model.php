<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_model extends CI_Model {

    
    public function get_by_username_password($admin_username, $admin_password)
    {
        $data = array(
            'admin_username' => $admin_username,
            'admin_password' => $admin_password
        );
        $query = $this -> db -> get_where('t_admin',$data);

        return $query -> row();
    }


    public function get_all()
    {
    	return $this -> db -> get('t_admin') -> result();
    }


    public function save_admin_by_name_pwd_photo($name, $pwd,$photo_url)
    {
        $data = array(
            'admin_username' => $name,
            'admin_password' => $pwd,
            'admin_photo' => $photo_url
        );
        $this -> db -> insert('t_admin',$data);
        return $this -> db -> affected_rows();
    }

    public function get_by_username($admin_username)
    {
    	$data = array(
            'admin_username' => $admin_username
        );
        return $this -> db -> get_where('t_admin',$data) -> row();
    }

    public function get_admin_by_id($admin_id)
    {
    	$data = array(
    		'admin_id' => $admin_id
    	);
    	return $this -> db -> get_where('t_admin',$data) -> row();
    }

    public function updata_admin($admin_id,$admin_username,$admin_password,$url)
    {
    	$data = array(
            'admin_username' => $admin_username,
            'admin_password' => $admin_password,
            'admin_photo' => $url
        );

        $this -> db -> where('admin_id', $admin_id);
        $this -> db -> update('t_admin', $data);
        return $this -> db -> affected_rows();
    }

    


    

    

    

    




}