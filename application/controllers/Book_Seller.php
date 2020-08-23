<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Book_Seller extends CI_Controller{

	function __construct(){
		parent::__construct();

		$this->load->model('Book_model');
	}

	function index(){
		$this->load->view('header');
		$this->load->view('registration');
		$this->load->view('footer');
	}

	function register_book_seller(){
		$this->form_validation->set_rules('name','Please Enter Name','trim|required');
		$this->form_validation->set_rules('email_id','Email ID','trim|required|valid_email|is_unique[user.email_id]',
				array('required'=>'Please enter %s',
				'valid_email'=>'Please Enter Valid %s',
				'is_unique'=>'%s id already Registered, Please Enter Different %s'));
		$this->form_validation->set_rules('mobile_no','Mobile No','trim|required|numeric|exact_length[10]',
				array('required'=>'Please enter %s',
				'numeric'=>'Please Enter Valid %s',
				'exact_length'=>'Please Enter Valid %s'));
		$this->form_validation->set_rules('address','Please Provide Your Address','trim|required');
		$this->form_validation->set_rules('password','Password','trim|required|min_length[8]',
		array('required'=>'Please enter %s',
				'min_length'=>'%s should be minimum 8 chars'));
		$this->form_validation->set_rules('confirm_password','Confirm Password','trim|required|matches[password]');

		if($this->form_validation->run()==true){

			$result = $this->Book_model->register_user();

			if($result):
				$this->session->set_flashdata('success','Registration is Successfull, Please proceed with login');
				redirect('login');
			else:
				$this->session->set_flashdata('error','Something went wrong, Please try again');
				redirect('register_page');
			endif;	
			
			
		} else{
			$this->session->set_flashdata('error',validation_errors());
			redirect('register_page','refresh');
		}
	}

	function login(){
		$this->load->view('header');
		$this->load->view('login');
		$this->load->view('footer');

	}

	function verify_login(){		

		$this->form_validation->set_rules('username','Username','trim|required|valid_email',
		array('required'=>'%s is required','valid_email'=>'Please enter valid %s'));
		$this->form_validation->set_rules('password','Password','trim|required|min_length[8]',
		array('required'=>'%s is required','min_length'=>'%s must be minimum 8 chars'));
		
		if($this->form_validation->run()==true){

			$result = $this->Book_model->verify_login($this->input->post('username'),$this->input->post('password'));

			if($result['status']):
				$this->session->set_userdata(array('name' => $result['data']->name,'user_login' => true));

				echo $this->session->userdata('name');
				echo $this->session->userdata('user_login');
				redirect('dashboard','refresh');
			else:
				$this->session->set_flashdata('error','Something went wrong, Please try again');
				redirect('login','refresh');
			endif;

		} else{
			$this->session->set_flashdata('error',validation_errors());
			redirect('login','refresh');
		}
	}

	function dashboard(){
		if($this->session->userdata('user_login')){

			$result = $this->Book_model->get_all_book_data();

			if($result['status']):
					$data['books']= $result['data'];
			else:
				$data['books']= '';
			endif;

			$this->load->view('header');
			$this->load->view('dashboard',$data);
			$this->load->view('footer');

		} else{

			redirect('login','refresh');
		}
	}

	function add_book(){
		if($this->session->userdata('user_login')){

			$this->form_validation->set_rules('book_name','Book Name','trim|required');		
			$this->form_validation->set_rules('author_name','Author Name','trim|required');	
			$this->form_validation->set_rules('price','Book Price','trim|required|numeric');		
			$this->form_validation->set_rules('no_of_books','No. of Books','trim|required|integer');

			if($this->form_validation->run()==true){
				$result= $this->Book_model->insert_book();

				if($result):
					$this->session->set_flashdata('success','Book added Successfully');
					redirect('dashboard','refresh');
				else:
					$this->session->set_flashdata('error','Something went wrong , Please try again');
					redirect('dashboard','refresh');
				endif;
			} else{
				$this->session->set_flashdata('error',validation_errors());
				redirect('dashboard','refresh');
			}
			
		} else{

			redirect('login','refresh');
		}
	}

	function edit_book(){
		if($this->session->userdata('user_login')){

			$book_id = $this->uri->segment(2);
			$result= $this->Book_model->get_book_by_id($book_id);

			if($result['status']):				
				$this->load->view('header');
				$this->load->view('edit_book',$result);
				$this->load->view('footer');
			else:
				
				redirect('dashboard','refresh');
			endif;
		} else{

			redirect('login','refresh');
		}
	}

	function update_book(){
		if($this->session->userdata('user_login')){

			$this->form_validation->set_rules('book_name','Book Name','trim|required');		
			$this->form_validation->set_rules('author_name','Author Name','trim|required');	
			$this->form_validation->set_rules('price','Book Price','trim|required|numeric');		
			$this->form_validation->set_rules('no_of_books','No. of Books','trim|required|integer');
			
			$data= $this->Book_model->get_book_by_id($this->input->post('book_id'));
			if($this->form_validation->run()==true){
									
					$result= $this->Book_model->update_book($this->input->post('book_id'));

					if($result):
						$this->session->set_flashdata('success',$this->input->post('book_name').' Book updated Successfully');
						redirect('dashboard','refresh');
					else:
						$this->session->set_flashdata('error',$this->input->post('book_name').' Book not updated , Please try again');
													
							$this->load->view('header');
							$this->load->view('edit_book',$data);
							$this->load->view('footer');
					endif;

			} else{
				$this->session->set_flashdata('error',validation_errors());
										
				$this->load->view('header');
				$this->load->view('edit_book',$data);
				$this->load->view('footer');
			}
		} else{

			redirect('login','refresh');
		}
	}

	function delete_book(){
		if($this->session->userdata('user_login')){
			$result= $this->Book_model->delete_book($this->input->post('book_id'));

			if($result):
				$this->session->set_flashdata('success',$this->input->post('book_name').' Book deleted Successfully');
				redirect('dashboard','refresh');
			else:
				$this->session->set_flashdata('error',$this->input->post('book_name').' Book not deleted , Please try again');
				redirect('dashboard','refresh');
			endif;
		} else{

			redirect('login','refresh');
		}
	}

	function logout(){

		$this->session->sess_destroy();
		redirect('login','refresh');
	}



}

?>