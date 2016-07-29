<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Anchor_model extends CI_Model{

	// public function save_anchor($username, $pwd1, $tel, $email, $trueName, $qqNum, $bankAccount,$fansNumber,$country,$gender,$nickname,$photo_url,$platform,$platformId){
	// 	$arr = array(
	// 		"anchor_username"=>$username,
	// 		"anchor_password"=>$pwd1,
	// 		"anchor_tel"=>$tel,
	// 		"anchor_email"=>$email,
	// 		"anchor_name"=>$trueName,
	// 		"anchor_qqNum"=>$qqNum,
	// 		"anchor_bankAccount"=>$bankAccount,
	// 		"anchor_platformName"=>$platform,
	// 		"anchor_platformID"=>$platformId,
	// 		"anchor_photo"=>$photo_url,
	// 		"anchor_fansNumber"=>$fansNumber,
	// 		"anchor_gender"=>$gender,
	// 		"anchor_region"=>$country,
	// 		"anchor_fansNumber"=>$fansNumber
	// 	);
	// 	return $this->db->insert("t_anchor",$arr) ->row();
	// }


  /**
      @author: liuwei
      @time: 2016/07/27
      @task: 获取主播所有分类
  */
  public function get_all_anchorCates()
  {
      return $this -> db -> get('t_anchorCate') -> result();
  }


  /**
      @author: liuwei
      @time: 2016/07/27
      @task: 登录验证
  */


	public function get_by_username_and_password($username, $password)
  {

		$data = array(
				"anchor_username" => $username,
				"anchor_password" => $password
		);

		$query = $this ->db ->get_where('t_anchor',$data);

		return $query ->row();
	}

  public function get_email_by_username($username)
  {

    $sql = "select t_anchor.anchor_email from t_anchor where t_anchor.anchor_username = '$username'";

    return $this -> db -> query($sql) -> row() ;

    

  }

  public function get_anchor_by_username_email($username,$email)
  {

    $data = array(
            'anchor_username' => $username,
            'anchor_email' => $email
        );

        $query = $this -> db -> get_where('t_anchor',$data);

        return $query -> row();

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


  public function get_anchor_by_id($anchor_id)
  {

      $data = array(
        "anchor_id" => $anchor_id
      );

      $query = $this -> db -> get_where('t_anchor',$data);

      return $query -> row();

  }


  public function get_anchorCates_by_id($anchor_id)
  {
      $data = array(
        "anchor_id" => $anchor_id
      );

      $query = $this -> db -> get_where('t_r_anchor_anchorCate',$data);

      $arr = $query -> result();

      $str = "";
      while(list($key,$val)= each($arr)) { 
        $str.=$val->anchorCate_id."," ;
      } 
      $ids = substr($str,0,-1);

      if($ids){
        $sql = "select * from t_anchorCate cate where cate.anchorCate_id in".'('.$ids.')';
        return $this -> db -> query($sql) -> result();
      }else{
        return;
      }

      



      

  }





  public function save_anchor_by_all($username,$pwd1,$tel,$email,$trueName,$qqNum,$bankAccount,$fansNumber,$country,$city,$gender,$nickname,$anchorPhotoUrl,$platform,$platformId,$anchorCate,$anchorAttr,$anchorAccountCates)
  {
  		$data = array(
  			'anchor_username' => $username,
  			'anchor_password' => $pwd1,
  			'anchor_tel' => $tel,
  			'anchor_email' => $email,
  			'anchor_name' => $trueName,
  			'anchor_qqNum' => $qqNum,
  			'anchor_bankAccount' => $bankAccount,
  			'anchor_fansNumber' => $fansNumber,
  			'anchor_region' => $country,
  			'anchor_province' => $city,
  			'anchor_gender' => $gender,
  			'anchor_platformNickname' => $nickname,
  			'anchor_photo' => $anchorPhotoUrl,
  			'anchor_platformName' => $platform,
  			'anchor_platformID' => $platformId,
  			'anchor_attr' => $anchorAttr,
        'anchor_accountCate' => $anchorAccountCates
  		);

  		$this -> db -> insert("t_anchor",$data);

  		$row = $this -> db -> affected_rows();

  		$anchor_id =  $this -> db -> insert_id();
		
  		if($row>0)
  		{	
  			// $data = array(
  			// 	array(
  			// 		'anchor_id' => $anchor_id,
  			// 		'anchorCate_id' => 2
  			// 	),
  			// 	array(
  			// 		'anchor_id' => $anchor_id,
  			// 		'anchorCate_id' => 3
  			// 	)
  			// );

		  $one_info = array();
			$insert_data = array();
			$one_info['anchor_id'] = $anchor_id;

			for($i = 0; $i < count($anchorCate); $i++) {
	            $one_info['anchorCate_id'] = $anchorCate[$i];
	            $insert_data[] = $one_info;
			}

  			$this -> db -> insert_batch("t_r_anchor_anchorCate",$insert_data); 
  			return $this -> db -> affected_rows();
  		}



  }
  	public function update_password_by_username($username,$password)
  	{
  		$data = array(
          	'anchor_password' => $password
      	);

  	    $this ->db -> where('anchor_username', $username);
  	    $this ->db -> update('t_anchor', $data);

  	    return $this -> db -> affected_rows();

  	}

  public function update_anchor_info_by_all($id,$platform,$platformId,$tel,$email,$country,$city,$cate,$fansNumber,$attr,$account,$qq,$url)
  {

      $data = array(
        'anchor_platformName' => $platform,
        'anchor_platformID' => $platformId,
        'anchor_tel' => $tel,
        'anchor_email' => $email,
        'anchor_region' => $country,
        'anchor_province' => $city,
        'anchor_fansNumber' => $fansNumber,
        'anchor_attr' => $attr,
        'anchor_bankAccount' => $account,
        'anchor_qqNum' => $qq,
        'anchor_photo' => $url,
      );

        $this ->db -> where('anchor_id', $id);
        $this ->db -> update('t_anchor', $data);

        /*更新主播基础信息*/
        $row = $this -> db -> affected_rows();



        if($cate){

          $cateStr = $this -> get_anchorCate_by_idArr($cate);

          


          $data = array(
            'anchor_accountCate' =>  $cateStr
          );

          $this -> db -> where('anchor_id', $id);
          $this -> db -> update('t_anchor', $data);

          


          /*删除原有的主播分类信息*/
          $this -> db -> delete('t_r_anchor_anchorCate', array('anchor_id' => $id));
          //die();

          /*insert_batch新的主播分类信息*/
          $one_info = array();
          $insert_data = array();
          $one_info['anchor_id'] = $id;

          for($i = 0; $i < count($cate); $i++) {
            $one_info['anchorCate_id'] = $cate[$i];
            $insert_data[] = $one_info;
          }

          $this -> db -> insert_batch("t_r_anchor_anchorCate",$insert_data); 
          //die();



        }

        

        

        return $this -> db -> affected_rows(); 
 
  }

    

    public function update_password_by_id($anchor_id,$password)
    {
        $data = array(
            'anchor_password' => $password
        );

        $this -> db -> where('anchor_id', $anchor_id);
        $this -> db -> update('t_anchor', $data);

        return $this -> db -> affected_rows();

    }

    public function get_anchorNeed_count()
    {
      return $this->db->count_all('t_anchorNeed');
    }

    public function get_anchorNeed_by_page($per_page,$offset)
    {
        $query = $this -> db -> query( 'select * from t_anchorNeed need order by add_time desc limit '.$offset.','.$per_page );
        return $query -> result();
    }

    public function get_searchNeed_count($aderCate_id)
    {
      $query = $this->db->query('select * from t_r_anchorNeed_aderCate where aderCate_id='.$aderCate_id);
      return $query->num_rows();
    }

    public function get_anchorNeed_by_aderCateId_and_page($aderCate_id,$per_page,$offset)
    { 

        $sql ='select t_r_anchorNeed_aderCate.anchorNeed_id from t_r_anchorNeed_aderCate where aderCate_id ='.$aderCate_id.' limit '.$offset.','.$per_page;
        $aderCates = $this -> db -> query($sql) -> result();
        $str = "";
        while(list($key,$val)= each($aderCates)) { 
          $str.=($val->anchorNeed_id)."," ;
        }
        $needIds =  substr($str,0,-1);
        if($needIds){
          $sql = 'select * from t_anchorNeed where anchorNeed_id in'.'('.$needIds.')';
          return $this -> db -> query($sql) -> result();
        }
        
  
    }

    public function get_all()
    {
      return $this -> db -> get('t_anchor') -> result();
    }

    public function get_anchor_count()
    {
      return $this->db->count_all('t_anchor');
    }


    public function get_anchor_by_page($per_page,$offset)
    {
        $query = $this -> db -> query( 'select * from t_anchor order by add_time desc limit '.$offset.','.$per_page );
        return $query -> result();
    }

    public function get_anchorCate_by_idArr($anchorCate)
    { 

      $str = "";
      while(list($key,$val)= each($anchorCate)) { 
        $str.=$val."," ;
      } 
      $ids = substr($str,0,-1);
      $sql = 'select * from t_anchorCate where anchorCate_id in'.'('.$ids.')';
      $cateNames =  $this -> db -> query($sql) -> result();
      $str1 = "";
      while(list($key,$val)= each($cateNames)) 
      { 
          $str1.=($val->anchorCate_name)."、" ;
      }
      $cates =  substr($str1,0,-1);
      return $cates;
    }

    public function search_anchor_by_range($condition)
    {
      $sql = 'select * from t_anchor where t_anchor.anchor_fansNumber '.$condition;

      return $this -> db -> query($sql) -> result();
      
    }

    public function get_anchor_by_range_and_page($condition,$per_page,$offset)
    {
      $sql = 'select * from t_anchor where t_anchor.anchor_fansNumber '.$condition
      .' limit '.$offset.','.$per_page;

      return $this -> db -> query($sql) -> result();
    }

    public function get_anchor_count_by_range($condition)
    {
      $sql = 'select count(*) from t_anchor where t_anchor.anchor_fansNumber '.$condition;

      return $this -> db -> query($sql) -> result();

    }

    public function get_anchor_by_anchorCate($anchorCate_id,$per_page,$offset)
    {
        $sql = 'SELECT
                t_anchor.*
              FROM
                t_r_anchor_anchorCate
              LEFT JOIN t_anchor ON t_anchor.anchor_id = t_r_anchor_anchorCate.anchor_id
              JOIN t_anchorCate ON t_anchorCate.anchorCate_id = t_r_anchor_anchorCate.anchorCate_id
              WHERE
                t_r_anchor_anchorCate.anchorCate_id = '.$anchorCate_id.
                ' limit '.$offset.','.$per_page;

        return $this -> db -> query($sql) -> result();

    }


    public function get_anchor_count_by_anchorCate($anchorCate_id)
    {
        $sql = 'SELECT
                count(*)
              FROM
                t_r_anchor_anchorCate
              LEFT JOIN t_anchor ON t_anchor.anchor_id = t_r_anchor_anchorCate.anchor_id
              JOIN t_anchorCate ON t_anchorCate.anchorCate_id = t_r_anchor_anchorCate.anchorCate_id
              WHERE
                t_r_anchor_anchorCate.anchorCate_id = '.$anchorCate_id;
                
        return $this -> db -> query($sql) -> result();

    }


    public function get_anchor_count_by_province($province)
    {
      $sql = "select count(*) from t_anchor where anchor_province = '$province'";
      return $this -> db -> query($sql) -> result();
    }


    public function get_anchor_by_province($province,$per_page,$offset)
    {
      $sql = "select * from t_anchor where anchor_province = '$province'".' limit '.$offset.','.$per_page;
      return $this -> db -> query($sql) -> result();
    }

    

















}
