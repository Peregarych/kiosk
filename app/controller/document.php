<?php
require_once __DIR__ . '/../model/documents.php';

class Document extends Controller{
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
    
    public function viewByUri($uri){
        $path = $_SERVER['REQUEST_URI'];
        $breadcrambs = $this->getBreadcrumbs($path);
        $model = new Model();
        $model->setConnection();
        $DB = $model->getConnect();
        if(!$DB){
            echo 'Connect fail';
        }

        $result = pg_query($DB, 'SELECT * FROM document WHERE uri LIKE \''.$uri.'\' AND show IS TRUE');
        $document = [];
        while($row = pg_fetch_array($result, NULL, PGSQL_ASSOC)){
            $document[] = $row;
        }
        
        $scripts = [
            ['src'=>'/script/pdfobject.min.js']
        ];
        require_once __DIR__ . '/../view/document.php';
    }
    
    public function viewByLastExplodeUri(){
        $path = $_SERVER['REQUEST_URI'];
        $uri = explode('/', $path);
        $lastExplodeUri = end($uri);
        $this->viewByUri($lastExplodeUri);
    }
    
    public function viewById($id){
        $path = $_SERVER['REQUEST_URI'];
        $breadcrambs = $this->getBreadcrumbs($path);
        $model = new Model();
        $model->setConnection();
        $DB = $model->getConnect();
        if(!$DB){
            echo 'Connect fail';
        }

        $result = pg_query($DB, 'SELECT * FROM document WHERE id='.$id.' AND show IS TRUE');
        $document = [];
        while($row = pg_fetch_array($result, NULL, PGSQL_ASSOC)){
            $document[] = $row;
        }
        
        $scripts = [
            'src'=>'/script/pdfobject.min.js'
        ];
        require_once __DIR__ . '/../view/document.php';
    }
}

