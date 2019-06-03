<?php 
/*
* @author : Dhananjay Vaidya
* @document : Database Library of CWFramework
*/
class DB extends PDO{
    public $tb_name;
    private $ins_flag;
    function __construct(){
         parent::__construct(_DNS_, _USER_, _PASS_);
    }
    
    public function insert($tb_name){
        $this->tb_name = $tb_name;
        $this->ins_flag = true;
        return $this;
    }
    public function items($data){
        if($this->ins_flag == true && $this->tb_name){
            $cols = "";
            $vals = "";
            foreach($data as $key=>$value){
                $cols .= "`".$key."`";
                $cols .= ",";
                $vals .="'".$value."'";
                $vals .=",";
            }
            //remove last ,
            rtrim($vals,",");
            rtrim($cols,",");
            $state = "INSERT INTO `".$this->tb_name."` (".$cols.") VALUES (".$vals.")";
            $query = $this->prepare($state);
            $query->execute();
            return $this;
            
        }
    }
    public function lookUp(){
        
    }
    public function merge(){
        
    }
    
    public function select(){
        
    }
    public function update(){
        
    }
    public function remove(){
        
    }
    public function etms(){
        
    }
    public function draft(){
        
    }
    
    
}

?>