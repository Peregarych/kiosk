<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Base{
    private $config;
    
    public function __construct() {
        $this->loadConfig();
    }
    /*
     * Инициализация конфигов. Загрузка в приватную переменную $config
     * из файла config/init.php
     */
    public function loadConfig(){
        $config = require __DIR__ . '/../../config/init.php';
        $this->config = $config;
    }
    public function getConfigBase(){
        return $this->config['base'];
    }
    
    public function getConfigDb(){
        return $this->config['db'];
    }
}