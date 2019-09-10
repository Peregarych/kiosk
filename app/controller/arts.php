<?php
require_once __DIR__ . '/../model/page.php';

class Arts extends Controller{
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
            $breadcrumbs[] = $crumb;
            if($elem !== ''){
                $find .= '/';
            }
        }
        return $breadcrumbs;
    }
    
    public function view($uri){
        $path = $_SERVER['REQUEST_URI'];
        $breadcrambs = $this->getBreadcrumbs($path);
        $model = new Model();
        $model->setConnection();
        $DB = $model->getConnect();
        if(!$DB){
            echo 'Connect fail';
        }

        $result = pg_query($DB, 'SELECT * FROM page WHERE uri LIKE \''.$uri.'\' AND show IS TRUE');
        $page = [];
        while($row = pg_fetch_array($result, NULL, PGSQL_ASSOC)){
            $page[] = $row;
        }
        
        require_once __DIR__ . '/../view/page.php';
    }
}