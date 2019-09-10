<?php
require_once __DIR__ . '/../model/menu.php';
class Message extends Controller{
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
    
    public function nocontent(){
        $path = $_SERVER['REQUEST_URI'];
        $icon = '/upload/icon/writer.svg';
        $message = 'Извините, раздел находится в стадии наполнения.';
        $breadcrambs = $this->getBreadcrums($path);
        require_once __DIR__ . '/../view/nocontent.php';
    }
}
