<?php 

class Gallery_model extends CI_Model {
    
    var $gallery_path;
    
    function __construct() {
        
        parent::__construct();
//        $this->gallery_path = realpath(APPPATH . '../images/');
        $this->gallery_path = base_url().'images/';
//        echo $this->gallery_path; die();
    }
    
    
    function do_upload() {
        
        $config['upload_path'] = '/Library/WebServer/Documents/codeigniter_new/images/';
		$config['allowed_types'] = 'gif|jpg|png';
        $this->load->library('upload',$config);
//        echo $config['upload_path'] ;die();
        $this->upload->do_upload();
        $image_data = $this->upload->data();
        
        $config['source_image'] = $image_data['full_path'];
//        $config['image_library'] = 'gd2';
//        echo $config['source_image'];
        $config['new_image'] = '/Library/WebServer/Documents/codeigniter_new/images/thumbs/';
        $config['maintain_ratio'] =TRUE;
        $config['width'] = 250;
        $config['height'] = 250;
//        $config['create_thumb'] = TRUE;
        
        $this->load->library('image_lib',$config);
        $this->image_lib->resize();
        
        
        
    }
    
    function get_images() {
        
            $files = scandir('/Library/WebServer/Documents/codeigniter_new/images/');
//        $files = scandir($this->gallery_path);
            $files = array_diff($files, array('.','..','thumbs','.DS_Store'));
            $images = array();
          
            foreach($files as $file) {
                
                $images [] = array (
                        
//                        'url' => '/Library/WebServer/Documents/codeigniter_new/images/'.$file,
                    'url' => $this->gallery_path .$file,
                    'thumb_url' => $this->gallery_path . 'thumbs/' . $file
//                        'thumb_url' => '/Library/WebServer/Documents/codeigniter_new/images/thumbs/'.$file
                );
                 
                
            }
        
//        
//            $files = scandir('/Library/WebServer/Documents/codeigniter_new/images/thumbs/');
//            $files = array_diff($files, array('.','..'));
//            $images_thumb = array();
//            foreach($files as $file) {
//                
//                $images_thumb [] = array ('url' => '/Library/WebServer/Documents/codeigniter_new/images/thumbs/'.$file
//                        
//                );
//                 
//                
//            }
//                               
             return $images ;
                               
        
    }
    
    
    
}