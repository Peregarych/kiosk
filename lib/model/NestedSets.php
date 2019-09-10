<?php

class NestedSets {
    //наименование таблицы
    private $table = '';
    
    //поля, которые обязательно должны присутствовать в таблице (можно переименовать)
    private $requireFields = [
        'id', 'level', 'left', 'right', 'title'
    ];
    
    //свои поля
    private $fields = NULL;
    private $DB = NULL;
    
    public function __construct($DBconnection, $tableName = NULL, $fields = NULL) {
        if(!is_null($tableName)){
            $this->table = $tableName;
        }
        if(!is_null($fields)) {
            $this->fields = $fields;
        }
        $this->DB = $DBconnection;
    }
    
    public function getById($id, $fields=NULL){
        if(is_null($fields)){
            $fields = '*';
        }
        $sql = 'SELECT '.$fields.' FROM '.$this->table.' WHERE id='.$id;
        $result = pg_query($this->DB, $sql);
        $return = [];
        while ($row = pg_fetch_array($result)) {
            $return = $row;
        }
        return $return;
    }
    
    public function add() {
        
    }
    public function insert() {
        
    }
    
    public function delete() {
        
    }
    
    public function getByIds($id, $fields = NULL) {
        
    }
    
    public function move() {
        
    }
    
    public function edit() {
        
    }
    
    public function excecute($sql) {
        $result = pg_query($this->DB, $sql);
        return $result;
    }
}