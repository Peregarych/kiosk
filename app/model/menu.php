<?php
require_once __DIR__ . '/../../lib/base/Model.php';
class Menu extends Model{
    public $id;
    public $name;
    public $url;
    public $sort;
    public $parent;
    public $lvl;
    
    public function getMain(){
        
    }
    
}