<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

	function __construct() {
		parent::__construct();
        $this-> load -> helper('file');
		$this -> load -> helper('captcha');

	}


	public function index()
	{

        $hit = read_file('hit.txt');
        $hit++;
        write_file('hit.txt', $hit);
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


		$this -> load -> view('index',$data);

	}



}
