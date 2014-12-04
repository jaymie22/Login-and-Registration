<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->date_now = date('Y-m-d H:i:s');
	}

	public function index()
	{	
		
		$data['register_error'] = ($this->session->flashdata('register_error')) ? $this->session->flashdata('register_error') : FALSE;
		$data['login_error'] = ($this->session->flashdata('login_error')) ? $this->session->flashdata('login_error') : FALSE;
		$this->load->view('login_register', $data);
	}

	public function register_process()
	{
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');

		$this->form_validation->set_rules('first_name', 'First name', 'trim|required');
		$this->form_validation->set_rules('last_name', 'Last name', 'trim|required');
		$this->form_validation->set_rules('reg_email', 'Email', 'required|valid_email|is_unique[user.email]');
		$this->form_validation->set_rules('reg_password', 'Password', 'required|min_length[8]');
		$this->form_validation->set_rules('cpassword', 'Confirm Pasword', 'required|min_length[8]|matches[reg_password]');

		if($this->form_validation->run() === FALSE)	
		{
			$post_value = array(
							'firstname' => $this->input->post('first_name'),
							'lastname' => $this->input->post('last_name'),
							'email' => $this->input->post('reg_email'),
							'error' => validation_errors()
			);

			$this->session->set_flashdata('register_error', $post_value);
		}
		else
		{
			$this->load->model('users_model');

			$user_data = array(
				'firstname' => $this->input->post('first_name'),
				'lastname' => $this->input->post('last_name'),
				'email' => $this->input->post('reg_email'),
				'password' => $this->input->post('reg_password'),
				'created_at' => $this->date_now,
				'updated_at' => $this->date_now
			);

			$inserted_data = $this->users_model->insert_new_user($user_data);
			$insert_message = ($inserted_data === TRUE) ? "Registration Success. You may now log in." : "Registration Failed. Please try again.";
			$this->session->set_flashdata('register_error', $insert_message );
			
		}
		redirect('/login/index');
	}

	public function login_process()
	{
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');

		$this->form_validation->set_rules('log_email', 'Email', 'required|valid_email');
		$this->form_validation->set_rules('log_password', 'Password', 'required|min_length[8]');

		if($this->form_validation->run() === FALSE)
		{
			$post_value = array(
							'email' => $this->input->post('log_email'),
							'error' => validation_errors()
			);

			$this->session->set_flashdata('login_error', $post_value);
		}
		else
		{
			$this->load->model('users_model');

			$email_input = $this->input->post('log_email');
			$password_input = $this->input->post('log_password');

			$user = $this->users_model->get_email($email_input);

			if($user && $user['password'] == $password_input)
			{
				$user_login_data = array(
					'user_id' => $user['id'],
					'first_name' => $user['firstname'], 
					'last_name' =>	$user['lastname'],
					'email' => $user['email'],
					'is_logged_in' => true
				);

				$this->session->set_userdata($user_login_data);
				redirect('/login/confirm_login');
			}
			else
			{
				$this->session->set_flashdata('login_error', 'Invalid email and password.');	
			}
		}
		redirect(base_url());
	} 

	public function confirm_login()
	{
		if($this->session->userdata('is_logged_in') === TRUE)
			$this->load->view('welcome_user');
		else
			redirect('login/index');
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('login/index');
	}



}

/* End of file Students.php */
/* Location: ./application/controllers/Students.php */