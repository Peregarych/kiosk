<?php

require_once __DIR__ . '/../model/employee.php';

class Panarama extends Controller{
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
    
    public function readNameByXml($path){
        if(file_exists($path)){
            $xml = simplexml_load_file($path);
            return (string)$xml->attributes()->name;
        }
    }
    public function index(){
        $entries = scandir(__DIR__ . "/../../public/upload/panarama/");
        $filelist = [];
        $panarama = [];
        foreach($entries as $entry) {
            $filelist[] = $entry;
        }
        unset($filelist[0], $filelist[1]);
        
        foreach($filelist AS $file){
            $name = $this->readNameByXml(__DIR__ . "/../../public/upload/panarama/".$file."/pano.xml");
            $panarama[] = ['folder'=>$file, 'title'=>$name];
        }
        $path = $_SERVER['REQUEST_URI'];
        $breadcrambs = $this->getBreadcrumbs($path);
        
        require_once __DIR__ . '/../view/panarama.php';
    }
}
