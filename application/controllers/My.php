<?php

class My extends CI_Controller {
 

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->helper(array('form', 'url'));
        $this->load->library(array('form_validation','session'));
        $this->load->model('MyModel');    
    }
   
     public function index(){

                  //   print($_POST);exit();
       $this->form_validation->set_rules('name','name','required');
       $this->form_validation->set_rules('pwd','pwd','required|min_length[3]');
       $this->form_validation->set_rules('cpwd','cpwd','required|matches[pwd]');

     	   if ($this->form_validation->run() == true)
                {
                    $config['upload_path'] = './uploads/';
                    $config['allowed_types'] = 'gif|jpg|png';
                    $config['max_size']     = '100';
                    $config['max_width'] = '1024';
                    $config['max_height'] = '768';
                    $this->load->library('upload', $config);

                    if (!$this->upload->do_upload('image'))
                     {
                        $error = array('error' => $this->upload->display_errors());

                        $this->load->view('upload_form', $error);
                    }
                     else
                     {
                        $image =  $this->upload->data();
                        $image_name =   $image['file_name'];    
                     }

                    $name  = $this->input->post('name');
                    $email  = $this->input->post('email');
                    $pwd  = $this->input->post('pwd');
                    $cpwd  = $this->input->post('cpwd');
                    $mobile  = $this->input->post('mobile');
                    $status =    $this->MyModel->register($name,$email,$pwd,$mobile,$image_name);

                     if($status){
                           $this->session->set_tempdata('scuccess', '1', 60);
                               redirect( base_url() . "my");
                     }
                }
                else
                {
				    $this->load->view('register');
                }
    }

      public function home(){
        $data['data'] = $this->MyModel->get_result();
          $this->load->view('home' , $data);
      }

      public function ajax(){
         $data['data'] = $this->MyModel->get_state();
          $this->load->view('newajax',$data);
      }

      public function dist($id){

          $this->load->database();
          $res = $this->db->get_where("city",array("sid"=>$id));   
          ?>
           <option> -- District-- </option>

          <?php

           foreach ($res->result() as $dist)
                {
                   echo "<option value='". $dist->name ."'>". $dist->name ."</option>";
                }
      }

      function  reg(){

           $this->form_validation->set_rules('name','name','required');
           $this->form_validation->set_rules('pwd','pwd','required|min_length[3]');
           $this->form_validation->set_rules('cpwd','cpwd','required|matches[pwd]');

         if ($this->form_validation->run() == true)
         {
               $config['upload_path']          = './uploads/';
                $config['allowed_types']        = 'gif|jpg|png';
                $config['max_size']             = 100;
                $config['max_width']            = 1024;
                $config['max_height']           = 768;

                $this->load->library('upload', $config);
                if (!$this->upload->do_upload('image'))
                {
                        $error = array('error' => $this->upload->display_errors());
                        $this->load->view('register', $error);
                }
                else
                {
                          $data = $this->upload->data();
                        //  print_r($data);exit();
                          $name  = $this->input->post('name');
                          $email  = $this->input->post('email');
                          $pwd  = $this->input->post('pwd');
                          $cpwd  = $this->input->post('cpwd');
                          $mobile  = $this->input->post('mobile');
                          $image =   $data['file_name'];

                          $this->MyModel->register_user($name,$email,$pwd,$mobile,$image);

                }

         }
         else{
               $this->load->view('register');
         }
      }

      function uview(){

         $data['data'] = $this->MyModel->all_details();

          $this->load->view('user_home',$data);
      }
}





?>