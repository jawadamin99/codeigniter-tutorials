<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class User extends CI_Controller {
	
	public function __construct()
    {
		parent::__construct();
	}
	public function index()
	{
		redirect("user/login");
	}
	public function signup()
	{
		
		if($_POST)
		{
			$first_name = $this->input->post('first_name');
			$last_name = $this->input->post('last_name');
			$email = $this->input->post('email');
			$password = $this->input->post('password');
			$confirm_password = $this->input->post('confirm_password');
			
			$this->form_validation->set_rules('first_name','First Name','required');			
			$this->form_validation->set_rules('last_name','Last Name','required');			
			$this->form_validation->set_rules("email","Email","required|valid_email|is_unique[users.email]",array(
                'is_unique'     => 'This %s already exists.'
        	));			
			$this->form_validation->set_rules('password','Password','required|min_length[5]|max_length[32]');
			$this->form_validation->set_rules('confirm_password','Confirm Password','required|matches[password]');
			
			
			if(!$this->form_validation->run())
			{
				$data['validation_errors'] = validation_errors();
				$this->session->set_flashdata($data);
				$this->load->view('user/signup',$data);
			}
			else
			{
				$user_data = array(
					'first_name' => $first_name,
					'last_name' => $last_name,
					'email' => $email,
					'password' => $password,
				);
				$signup = $this->user_model->add_user($user_data);
				if($signup)
				{
					$this->session->set_flashdata('success','Signup Successful. Please confirm your email');
					redirect("user/login");
				}
				else
				{
					$this->session->set_flashdata('message','Signup Failed');
					redirect("user/signup");
				}
			}
		}
		else
		{
			$this->load->view('user/signup');
		}
	
	}
	
	public function login()
	{
		if($this->session->is_logged_in and $this->session->role == "customer")
		{
			redirect("dashboard");
		}
		
		if($_POST)
		{
			$email = $this->input->post('email');
			$password = $this->input->post('password');
			
			$this->form_validation->set_rules("email","Email","required|valid_email");			
			$this->form_validation->set_rules('password','Password','required');
			
			if(!$this->form_validation->run())
			{
				$this->session->set_flashdata('validation_errors',validation_errors());
				$this->load->view('user/login');
			}
			else
			{
				$user = $this->user_model->verify_login($email,$password);
				if($user)
				{
					$user_data = array(
						'email' => $user->email,
						'userID' => $user->id,
						'first_name' => $user->first_name,
						'is_logged_in' => TRUE,
						'role' => 'customer'
					);
					$this->session->set_userdata($user_data);
					redirect("dashboard");
				}
				else
				{
					$this->session->set_flashdata('message','Login failed');
					redirect("user/login");
				}
			}
		}
		else
		{
			$this->load->view('user/login');
		}
	}
	public function logout()
	{
		$this->session->sess_destroy();
		redirect("user/login");
	}
	
}
