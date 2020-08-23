<?php
  class Book_model extends CI_Model
  {
    function register_user(){
      $arrayData = array('name' => ucwords(strtolower($this->input->post('name'))),
                        'email_id' => $this->input->post('email_id'),
                        'mobile_no' => $this->input->post('mobile_no'),
                        'address' => $this->input->post('address'),
                        'password' => md5($this->input->post('password')),
                        'created' => date('Y-m-d H:i:s')
                      );

      $this->db->insert('user',$arrayData);
      return ($this->db->affected_rows()==1)? true :false;
    }

    function verify_login($username, $password){
      $this->db->where('email_id',$username);
      $this->db->where('password',md5($password));
      $query = $this->db->get('user');

      if($query->num_rows()==1){
        return  array('status' => true,'data'=>$query->row());
      } else{
        return array('status' => false);
      }

    }

    function get_all_book_data(){
        $query = $this->db->get('books');

        if($query){
            return  array('status' => true,'data'=>$query->result_array());
        } else{
            return array('status' => false);
        }

    }

    function insert_book(){
      $arrayData = array('book_name' =>ucwords(strtolower($this->input->post('book_name'))), 
                        'author' =>ucwords(strtolower($this->input->post('author_name'))),
                        'price' =>$this->input->post('price'),
                        'no_of_books' =>$this->input->post('no_of_books'),
                        'created' =>date('Y-m-d H:i:s')
                      );
      $this->db->insert('books',$arrayData);

      return ($this->db->affected_rows()>0)? true:false;
    }

    function get_book_by_id($book_id){
      $this->db->where('book_id',$book_id);
       $query = $this->db->get('books');

        if($query){
            return  array('status' => true,'data'=>$query->row_array());
        } else{
            return array('status' => false);
        }
    }

    function update_book($book_id){
      $arrayData = array('book_name' =>ucwords(strtolower($this->input->post('book_name'))) , 
                        'author' =>ucwords(strtolower($this->input->post('author_name'))),
                        'price' =>$this->input->post('price'),
                        'no_of_books' =>$this->input->post('no_of_books')                        
                      );
      $this->db->where('book_id',$book_id);
      $query=$this->db->update('books',$arrayData);

      if($query){
            return  true;
        } else{
            return false;
        }
    }

    function delete_book($book_id){
      $this->db->where('book_id',$book_id);
      $this->db->delete('books');

      return ($this->db->affected_rows()>0)? true : false;
    }
  }
?>
