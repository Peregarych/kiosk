<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require_once __DIR__ . '/../model/employee.php';

class Employee extends Controller{
    
    public function getBreadcrumbs($path){
        $uri = explode('/', $path);
        $breadcrumbs = [];
        $model = new Model();
        $model->setConnection();
        $DB = $model->getConnect();
        $find = '/';
        foreach($uri AS $elem){
            if($elem !== ''){
                $find .= $elem;
            }
            $query = pg_query($DB, 'SELECT uri, name, short_title FROM menu WHERE uri LIKE \'' . $find . '\' AND show IS TRUE');
            $crumb = pg_fetch_array($query, NULL, PGSQL_ASSOC);
            if($crumb !== false) {
                $breadcrumbs[] = $crumb;
                if($elem !== ''){
                    $find .= '/';
                }
            }
        }
        return $breadcrumbs;
    }
    
    public function index(){
        $model = new Model();
        $model->setConnection();
        $DB = $model->getConnect();
        $path = $_SERVER['REQUEST_URI'];
        $breadcrambs = $this->getBreadcrumbs($path);
        
        $sql = 'SELECT employee.id, firstname, middlename, lastname, image, post.title AS post_title, rank.title AS rank_title FROM employee LEFT JOIN post ON employee.post_id = post.id LEFT JOIN department ON post.department_id = department.id LEFT JOIN rank ON employee.rank_id = rank.id ORDER BY sort';
        $result = pg_query($DB, $sql);
        $employees = [];
        while($row = pg_fetch_array($result, NULL, PGSQL_ASSOC)){
            $employees[] = $row;
        }
        
        
        require_once __DIR__ . '/../view/employees.php';
    }
    
    public function view($id){
        $model = new Model();
        $model->setConnection();
        $DB = $model->getConnect();
        
        $path = $_SERVER['REQUEST_URI'];
        $breadcrambs = $this->getBreadcrumbs($path);
        
        $sql = 'SELECT employee.id, employee.firstname, employee.middlename, employee.lastname, employee.image, employee.text, post.title AS post_title, rank.title AS rank_title FROM employee LEFT JOIN post ON employee.post_id = post.id LEFT JOIN department ON post.department_id = department.id LEFT JOIN rank ON employee.rank_id = rank.id WHERE employee.id = '.$id.' ORDER BY sort';
        $result = pg_query($DB, $sql);
        $employee = pg_fetch_array($result, NULL, PGSQL_ASSOC);
        
        $breadcrambs[] = ['name'=>$employee['post_title'], 'uri'=>$path, 'short_title'=>NULL];
        
        require_once __DIR__ . '/../view/employee.php';
    }
}
