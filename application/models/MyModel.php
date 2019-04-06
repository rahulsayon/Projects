<?php

class MyModel  extends CI_Model  {

     public function register($name,$email,$pwd,$mobile,$image_name){

            $this->db->query("insert into register(name , email , pwd , mobile, image)  values('$name', '$email' , '$pwd', '$mobile' , '$image_name' )");

           if($this->db->affected_rows() == 1){

           	   return true;
           }
           else{
           	   return false;
           }
     }

      public function get_result(){
        
          $data = $this->db->get('register');

          if($data->num_rows() > 0 ){

                return $data->result();
          }
      }

      function get_state(){

          $data =    $this->db->get('state');
              if($data->num_rows() > 0 ){
                return $data->result_array();
          }
      }

      function register_user($name,$email,$pwd,$mobile,$image){

        $data = array(
            'name' =>  $name,
            'email' => $email,
            'pwd' =>  $pwd,
            'mobile'  => $mobile,
            'image' => $image
          );

        //  $this->db->insert('register',$data);
        $this->db->query("insert into register (name,email,pwd,mobile,image) values('$name' , '$email' , '$pwd' , '$mobile' , '$image')");

          if($this->db->affected_rows()){

                echo "Inserted";
          }
      }

      function all_details(){

         $all  =  $this->db->get('register'); 
          $data =  $all->result_array();

           if($data){

                 return $data;
           }
      }
  }

?>