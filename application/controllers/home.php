<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

	
	public function index()
	{
		$this->load->model("user");	
		$tid = $this->uri->segment(1);
		$this->load->helper("form");
		$data['title'] = "EasyTags Mobile";
		if(!is_numeric($tid)){
			//URL is using the username
			$user_info = $this->user->get_all_info($tid);
			$tid = $user_info[0]->tag_id;  
			
		}else{
			$user_info = $this->user->get_all_info($tid);
		}
			
		
		
		$this->session->unset_userdata("tag_id");
		$this->session->set_userdata("tag_id", $tid);
		
		$hours = $this->user->get_hours($tid);
		$social = $this->user->get_social($tid);
		$data['info'] = $user_info;
		$data['hours'] = $hours;
		$data['social'] = $social;
		if($user_info == null){
		
			redirect("http://".$_SERVER['SERVER_NAME']."/admin/".$tid);
		}
		
		//$user_social = $this->user->get_social($uid);
		$this->load->view('home', $data);
	}
	
	private function allqr()
	{
		$root = $_SERVER['DOCUMENT_ROOT'];	
		if ($handle = opendir($root.'/qr/')) {
		  		
		   $filearr = array();
		    while (false !== ($file = readdir($handle))) {
		        $filearr[] = "$file\n";
		    }
		
		  
		
		    closedir($handle);
		}
		$data['files'] = $filearr;
		$this->load->view('allqr', $data);
	}
}

/* End of file home.php */
/* Location: ./application/controllers/home.php */