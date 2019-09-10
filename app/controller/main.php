<?php
require_once __DIR__ . '/../model/menu.php';
class Main extends Controller{
    public function index(){
        $model = new Model();
        $model->setConnection();
        $DB = $model->getConnect();
        if(!$DB){
            echo 'Connect fail';
        }
        $result = pg_query($DB, 'SELECT * FROM menu WHERE level=1 AND show IS TRUE ORDER BY sort ASC');
        $menu = [];
        while($row = pg_fetch_array($result, NULL, PGSQL_ASSOC)){
            $menu[] = $row;
        }
        
        require_once __DIR__ . '/../view/main.php';
    }
    
    public function getBreadcrums($path){
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
            $breadcrumbs[] = $crumb;
            if($elem !== ''){
                $find .= '/';
            }
        }
        return $breadcrumbs;
    }
    
    public function sub(){
        $path = $_SERVER['REQUEST_URI'];
        $model = new Model();
        $model->setConnection();
        $DB = $model->getConnect();
        if(!$DB){
            echo 'Connect fail';
        }
        if ($path{strlen($path)-1} == '/') {
            $path = substr($path,0,-1);
        }
        $query = pg_query($DB, 'SELECT id FROM menu WHERE uri LIKE \'' . $path . '\' AND show IS TRUE');
        $parent = pg_fetch_row($query);
        
        $result = pg_query($DB, 'SELECT * FROM menu WHERE parent_id='. $parent[0] .' AND show IS TRUE ORDER BY sort ASC');
        $menu = [];
        while($row = pg_fetch_array($result, NULL, PGSQL_ASSOC)){
            $menu[] = $row;
        }
        $breadcrambs = $this->getBreadcrums($path);
        require_once __DIR__ . '/../view/main.php';
    }
}