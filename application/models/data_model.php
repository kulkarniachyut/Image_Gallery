<?php 

class Data_model extends CI_Model{
    
//    function getall(){
//        
//        $q = $this->db->query("SELECT * FROM data");
//        if($q->num_rows()>0){
//            
//            foreach($q->result() as $row){
//                
//                $data[] = $row;
//            }
//            return $data;
//        }
//        
//    }
//    
    
    
      
//    function getAll(){
//        
//        $q = $this->db->get("data");
//        if($q->num_rows()>0){
//            
//            foreach($q->result() as $row) {
//                
//                $data[] = $row;
//            }
//            return $data;
//        }
//        
//    }
    
    
    function getAll(){
        
        $q = $this->db->select('title');
        $q = $this->db->get('data');
        if($q->num_rows()>0){
            
            foreach($q->result() as $row) {
                
                $data[] = $row;
            }
            return $data;
        }
        
    
        
        
        
    }
}

?>