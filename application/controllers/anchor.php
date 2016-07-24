<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Anchor extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this -> load -> model('ader_model');
        $this -> load -> model('anchor_model');
        $this -> load -> model('company_model');		
	}

	
	public function index()
	{
		$this -> load -> view('index');	
	}

 
	
}
