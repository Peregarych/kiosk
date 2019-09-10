<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once __DIR__ . '/Component.php';
/**
 * Description of Model
 *
 * @author sichkov_a
 */
class Model extends Component{
    private $dbConfigs;
    private $connection;
    public function __construct() {
        $base = new Base();
        //Подгружаем конфиг
        $baseConfig = $base->getConfigDb();
        $this->dbConfigs = $baseConfig;
    }
    
    public function setConnection($dbName=NULL){
        
        if(is_null($dbName)){
            $arr = array_shift($this->dbConfigs);
        }else if(is_array($this->dbConfigs) && array_key_exists($dbName, $this->dbConfigs)){
            $arr = $this->dbConfigs[$dbName];
        }/*else{
            echo 'DB name not find in config file.';
        }*/
        
        switch ($arr['type']) {
            case 'pgsql':
                $this->connection = pg_pconnect('host=' . $arr['host'] . ' port=' . $arr['port'] . ' dbname=' . $arr['dbname'] . ' user=' . $arr['user'] . ' password=' . $arr['password']);
                break;
            case 'mysql':
                $this->connection = mysqli_connect($arr['host'], $arr['user'], $arr['password'], $arr['dbname'], $arr['port']);
                break;
        }
    }
    
    public function getConnect(){
        return $this->connection;
    }
}
