<?php 
/*
* @author : Dhananjay Vaidya
* @document : Database Library of CWFramework
*/
class DB extends PDO{
    public $tb_name;
    private $ins_flag;
    function __construct($t){
        /**
         * @init model
         * Here we need to check whether the table i.e model exist in the database, 
         * if not exist then need to create it. 
         * 
         *  */
        
        parent::__construct(_DNS_, _USER_, _PASS_);
        $this->createTable($t->TableName, $t->Schema);
    }
    public function createTable($tableName,$schema){
        $state = "SHOW TABLES";
        $query = $this->prepare($state);
        $query->execute();
        $tables = $query->fetchAll(PDO::FETCH_ASSOC);
        if (count($tables) == 0){
            return $this->_setupTable($schema,$tableName);
        }else{
            if ($this->_checkTable($tables, $tableName) ){
                return true;
            }else{
                return $this->_setupTable($schema,$tableName);
            }
        }
    }
    public function _checkTable($_tables, $_tableName){
        foreach($_tables as $table){
            if ($table['Tables_in_'._DB_] == $_tableName){
                return true;
            }else{
                return false;
            }
        }
    }
    public function _setupTable($schema,$tableName){
        //create the table here
        $tableDef = "";
        foreach($schema as $key=>$s){
            $tableDef .=  "`".$key."` ".
            ($s['dataType'] == 'string'?'varchar':$s['dataType'])."(".$s['dataSize'].") ". 
            ($s['not_null'] == true ? "NOT NULL ": "" ). 
            ($s['primary_key'] == true ? 'PRIMARY KEY ':"").
            ($s['auto_increment'] == true ? 'AUTO_INCREMENT ':"").
            ($s['default'] ? "DEFAULT '".$s['default']."'" : "").",";
        } 
        $tableDef = rtrim($tableDef,",");
        $state = "CREATE TABLE `".$tableName."` (
                    ".$tableDef."
           ) ENGINE=InnoDB DEFAULT CHARSET=latin1;";
           //echo $state;
        $query = $this->prepare($state);
        return $query->execute();
    }
    //old functions
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