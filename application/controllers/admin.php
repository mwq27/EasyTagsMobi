<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {

	
	public function index()
	{
		$this->load->model("user");	
		$this->load->helper(array('form', 'encode'));
		$this->load->library('form_validation');
		$tid = $this->uri->segment(2);
		$data['title'] = "EasyTags Mobile";
		if($tid="") $tid = "0";
		$data['tagid'] = $tid;
		 		
		
		$this->load->view('admin/index', $data);
		
	}
	
	public function management(){
		$this->load->model("user");	
		
		$data['title'] = "EasyTags Mobile";
		//Need to grab user information
		$user_info = $this->user->get_all_info($uid);
		$user_social = $this->user->get_social($uid);
		
		$this->load->view('admin/profile', $data);
	}
	
	
	public function login(){
		$this->load->helper(array('form', 'encode'));
		$this->load->model('user');
		$this->load->library('form_validation');
		$this->form_validation->set_rules('email-log', 'Email', 'trim|required');
		$this->form_validation->set_rules('password-log', 'Password', 'trim|required');
    
		if ($this->form_validation->run() == FALSE){
			
			 $data['title'] = 'Home | Barcodes Max';
			 $this->load->view('admin/index', $data);
		}else{
			$username = $this->input->post('email-log', TRUE);
			$password = $this->input->post('password-log', TRUE);
     
			//Try and log the user in
			$log_res = $this->user->login_user($username, $password);
			
			if($log_res){
				
								$user_array = $log_res[0];
								$login_time = date("Y-m-d g:i:s");
								$user_info = array(
							   	'email'  => $username,
							  	'login_time' => $login_time,
							 	'tag_id' => $user_array->tag_id,
							 	'username' => $user_array->username,
							  	'logged_in' => TRUE
							  );
						       		$this->session->set_userdata($user_info);
								  //$month = 2592000 + time(); 
						      //set_cookie('LCVIP', $user_array->firstname, $month);
						      redirect("http://".$_SERVER['SERVER_NAME']."/".$user_array->username);

				}else{
				
				  $data['login_error'] = "<p class='login-error'>Username and password do not match</p>";
				  //$this->session->set_flashdata('login',"<p class='error'>Username and password do not match</p>" );
						  
			    	$data['title'] = 'Home | EasyTags';
					$this->load->view('admin/index', $data);
				
				}
			
		}
		
	}

	function logout(){
			
			$this->load->helper(array('form', 'url'));
      		$this->session->unset_userdata('id');
			$this->session->unset_userdata('username');
			$this->session->unset_userdata('tag_id');
			$this->session->unset_userdata('logged_in');
     	  	$this->session->sess_destroy();
		    redirect("/");
	}

	function register(){
		$this->load->helper(array('form', 'url', 'encode'));
		$this->load->model('user');
		$this->load->library('form_validation');
		$email = $this->input->post("email", TRUE);
		$password = $this->input->post("password", TRUE);
		$name = $this->input->post("name", TRUE);
		$bname = $this->input->post("bname", TRUE);
		
		$tagline = $this->input->post("tagline", TRUE);
		
	
		$tagid = $this->input->post("tagid");
		
		
		$this->form_validation->set_rules('name', 'Name', 'trim|required');
		$this->form_validation->set_rules('email', 'Email address', 'trim|required');
		$this->form_validation->set_rules('password', 'password', 'trim|required');
		$this->form_validation->set_rules('password_conf', 'Password confirmation', 'trim|required|matches[password]');
		if ($this->form_validation->run() == FALSE){
			
			 $data['title'] = 'Register | EasyTags Mobile';
			 //$this->session->set_flashdata('reg-error', 'Oops, something went wrong.  Please check your entries and try again');
			 $this->load->view('admin/index');
			 
		}else{
			
			$reg = $this->user->register($email, $password, $name, $bname, $about_short, $about_long, $tagline, $tagid, $networks);
			if($reg != "fail"){
									
									$login_time = date("Y-m-d g:i:s");
									$user_info = array(
								   'username'  => $email,
								 
								   'user_id' => $reg,
								  'login_time' => $login_time,
								 'login_type' => 'site',
								  'logged_in' => TRUE
								  );
								 
						  
					$this->session->set_userdata($user_info);
					$redirect = "http://".$_SERVER['SERVER_NAME']."/".$tagid;
					
					redirect($redirect);
				
			}
		}
		
	}


	function edit(){
		$this->load->helper(array('form', 'url', 'encode'));
		$this->load->model('user');
		$this->load->library('form_validation');
		$email = $this->input->post("email", TRUE);
		$password = $this->input->post("password", TRUE);
		$name = $this->input->post("name", TRUE);
		$bname = $this->input->post("bname", TRUE);
		$about_short = $this->input->post("about-short", TRUE);
		$about_long = $this->input->post("about-long", TRUE);
		$tagline = $this->input->post("tagline", TRUE);
		//$code = generate_qr(base_url()."/content/profile/".$tag);
		$tagid = $this->uri->segment(3);
		$this->form_validation->set_rules('name', 'Name', 'trim|required');
		$this->form_validation->set_rules('email', 'Email address', 'trim|required');
		$this->form_validation->set_rules('password', 'password', 'trim|required');
		$user_info = $this->user->get_all_info($tagid);
		$data['info'] = $user_info;
		if ($this->form_validation->run() == FALSE){
			
			 $data['title'] = 'Register | EasyTags Mobile';
			 //$this->session->set_flashdata('reg-error', 'Oops, something went wrong.  Please check your entries and try again');
			 $this->load->view('admin/edit_info', $data);
			 
		}else{
			
			$reg = $this->user->update_user($email, $name, $bname, $about_short, $about_long, $tagline, $tagid, $networks);
			if($reg != "fail"){
									
									
					$redirect = "http://".$_SERVER['SERVER_NAME']."/".$tagid;
					
					redirect($redirect);
				
			}
		}
		
	}


	function profile_info(){
		$this->load->helper(array('form', 'url', 'encode'));
		$this->load->model('user');
		$this->load->library('form_validation');
		
		$post = array();
		$hours = array();
		$arr = array();
		foreach ( $_POST as $key => $value )
		{
			if(substr($key, -6) == "-start" || substr($key, -4) == "-end"){
				$hours[$key] = $value;
				
				foreach($hours as $key => $val){
					$day = substr($key, 0, 3);
					$arr[$day] = array("open" => $hours[$day."-start"], "close"=> $hours[$day."-end"]);
				}
				
			}elseif(substr($key, -4) == "_url"){
				//remove the social urls
				
					$social[$key] = $value;
				
			}else{
				$post[$key] = $this->input->post($key);
			}
		}
		/*print_r($post); 
		print_r($arr);
		exit;
		 * 
		 * 
		 * 
		 * 
		$username = $this->input->post("username", TRUE);
		$address1 = $this->input->post("address1", TRUE);
		$address2 = $this->input->post("address2", TRUE);
		$city = $this->input->post("city", TRUE);
		$state = $this->input->post("state", TRUE);
		$zip = $this->input->post("zip", TRUE);
		$phone = $this->input->post("phone", TRUE);
		$fax = $this->input->post("fax", TRUE);
		
		$facebook = $this->input->post("fb", TRUE);
		$twitter = $this->input->post("tw", TRUE);
		$about_long = $this->input->post("about-long", TRUE);
		$tagline = $this->input->post("tagline", TRUE);
		*/
		$this->form_validation->set_rules('address1', 'Address', 'trim|required');
		
		if ($this->form_validation->run() == FALSE){
			
			 $data['title'] = 'Register | EasyTags Mobile';
			 //$this->session->set_flashdata('reg-error', 'Oops, something went wrong.  Please check your entries and try again');
			 $this->load->view('admin/edit_info', $data);
			 
		}else{
			
			$reg = $this->user->update_profile($post, $arr, $social);
			if($reg != "fail"){
									
									
					$redirect = "http://".$_SERVER['SERVER_NAME']."/".$reg;
					
					redirect($redirect);
				
			}
		}
		
	}

	function uploadify(){
		
		$this->load->library(array('encrypt', 'email', 'upload', 'PhpThumbFactory'));
		$this->load->model('user');
		$this->load->helper(array('form', 'url'));
		
		$tempFile = $_FILES['Filedata']['tmp_name'];
		$pid = $this->input->post('tagid');
		
		if(!is_dir($_SERVER['DOCUMENT_ROOT'] . '/images/uploads/'.$pid.'/')){
				$res = mkdir($_SERVER['DOCUMENT_ROOT'] . '/images/uploads/'.$pid.'/', 0777);
				$targetPath = $_SERVER['DOCUMENT_ROOT'] . '/images/uploads/'.$pid.'/';
			}else{
				$targetPath = $_SERVER['DOCUMENT_ROOT'] . '/images/uploads/'.$pid.'/';
				$targetPaththmb = $_SERVER['DOCUMENT_ROOT'] . '/images/uploads/'.$pid.'/';
			}
			
		
            
	
		$targetPath = $_SERVER['DOCUMENT_ROOT'] . '/images/uploads/'.$pid.'/';
		$targetPaththmb = $_SERVER['DOCUMENT_ROOT'] .'/images/uploads/'.$pid.'/';
		//Rename the file
		$targetFile =  str_replace('//','/',$targetPath).'original_'.$_FILES['Filedata']['name'];
		$targetFilethmb = str_replace('//','/',$targetPaththmb).'thumb_'.$_FILES['Filedata']['name'];
		
		//Shorter paths for the DB
		$shortpath = "/images/uploads/".$pid."/"."original_".$_FILES['Filedata']['name'];
		$shortpathThmb = "/images/uploads/".$pid."/"."thumb_".$_FILES['Filedata']['name'];
		//echo $targetFile; exit;
		move_uploaded_file($tempFile,$targetFile);
		try
			{
			     $thumb = PhpThumbFactory::create($targetFile);
			}
			catch (Exception $e)
			{
				print_r($e);	
			     // handle error here however you'd like
			}
			
						
			$thumb->adaptiveResize(80, 80);
			$thumb->save($targetFilethmb);
			
			$thmb_name = 'thumb_'.$_FILES['Filedata']['name'];
			
			
			$update = $this->user->update_logo($pid, "/images/uploads/".$pid."/".$thmb_name);
			
			
			
	
		echo $shortpathThmb;
		//echo "$shortpath"1;
	}
	

}

/* End of file home.php */
/* Location: ./application/controllers/home.php */