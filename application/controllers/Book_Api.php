<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use LibraryApplication\Libraries\REST_Controller;
require APPPATH . 'libraries/REST_Controller.php';

class Book_Api extends REST_Controller{

	function __construct(){
		parent::__construct();

		$this->load->model('Book_model');
	}

	
	/**
	* Fetching All Books Data
	* @method : GET
	* @url : Book_Api/getBooks
	* API key name: x-api-key
	* API key: bookapp454
	*/
	function getBooks_get(){

		header("Access-Control-Allow-Origin: *");
		
			$result = $this->Book_model->get_all_book_data();

			if($result['status']):

				$this->response(['status'=>true,'books'=>$result['data']],REST_Controller::HTTP_OK);

			else:
				$this->response(['status'=>false,'message'=>'Invalid Request'],REST_Controller::HTTP_NOT_FOUND);
			endif;
	}

	/**
	* Fetching All Books Data
	* @method : GET
	* @url : Book_Api/getSingleBook_get/book_id
	* API key name: x-api-key
	* API key: bookapp454
	*/

	function getSingleBook_get($book_id = 0){

		header("Access-Control-Allow-Origin: *");
		
			$result = $this->Book_model->get_book_by_id($book_id);

			if($result['status']):

				$this->response(['status'=>true,'books'=>$result['data']],REST_Controller::HTTP_OK);

			else:
				$this->response(['status'=>false,'message'=>'Invalid Request'],REST_Controller::HTTP_NOT_FOUND);
			endif;
	}

	
}

?>