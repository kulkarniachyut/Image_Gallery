<?php


class Email extends CI_Controller{
    
    function __construct(){
        
        parent::__construct();
    }
    
    
    function index(){
        
        $this->load->view('newsletter');
        
    }
    function send(){
        
        $this->load->library('form_validation');
        $this->form_validation->set_rules('name',"Name", "trim|required");
        $this->form_validation->set_rules('email',"Email", "trim|required|valid_email");
        
        if($this->form_validation->run() == FALSE){
            
            $this->load->view('newsletter');
        }
        else{
            
           $name = $this->input->post('name');
            $email = $this->input->post('email');
//             $config = Array ('protocol' =>'smtp',
//                        'smtp_host' => 'ssl://smtp.googlemail.com',
//                        'smtp_port' => 465,
//                        'smtp_user' => 'achikulkarni@gmail.com',
//                        'smtp_pass' => 'ggmunsaf');
        
//        $this->load->library('email', $config);
        $this->load->library('email');
        $this->email->set_newline("\r\n");
        $this->email->from("achikulkarni@gmail.com");
        $this->email->to($email);
        $this->email->subject('this is a test mail');
        $this->email->message('this is working fine !');
        $path = $this->config->item('server_root');
        $file = $path . '/codeigniter/attachments/info.txt';
        $this->email->attach($file);
        
        if($this->email->send()) {
            
            $this->load->view('signup_confirmation');
        }
        else {
            
            show_error($this->email->print_debugger());
        }
        
            
        }
       
        
        
    }
}