<?php
    require __DIR__ . '/Request.php';

    class Controller extends Request{
        private $controllersPath;
        
        public function __construct() {
            $base = new Base();
            //Подгружаем конфиг
            $baseConfig = $base->getConfigBase();
            $this->routes = require $baseConfig['path']['routes'];
            $this->controllersPath = $baseConfig['path']['controllers'];
        }
        
        /*
         * Получаем URI
         */
        private function getUri(){
            if(!empty($_SERVER['REQUEST_URI'])){
                return trim($_SERVER['REQUEST_URI'], '/');
            }
        }
        
        /*
         * Вызывакм в случае отсутствия роута
         */
        private function error404(){
            echo 'error 404';
        }
        
        /*
         * проверяем создан ли файл контроллера
         */
        private function checkControllerFile($fileName){
            $fileName = mb_strtolower($fileName);
            if(file_exists($this->controllersPath . $fileName . '.php')){
                require_once $this->controllersPath . $fileName . '.php';
                return TRUE;
            }else{
                return FALSE;
            }
        }
        
        /*
         * Преобразовывает роут в паттерн для сравнения ч ЧПУ
         */
        private function routeToPattern($route){
            $elements = explode('/', $route);
            $pattern = '';
            $varable = [];
            foreach($elements AS $key => $elem){
                $pattern .= '/'; 
                if($elem !== '' && $elem[0] === ':'){
                    $varable[] = substr($elem, 1);
                    $elem = '[0-9a-zA-Z_-]+';
                }
                $pattern .= $elem; 
            }
            return [
                'pattern' => '/^'.str_replace('/', '\/', substr($pattern, 1)).'\z/', 
                'varable' => $varable
                ];
        }
        
        /*
         * Разбиваем роут на составные части. Вытаскиваем имена переменных
         */
        private function getNameVarsByRoute($route){
            $explode = explode('/', $route);
            $varNames = [];
            foreach($explode AS $key=>$varName){
                if($varName !== '' && $varName[0] === ':'){
                    $varNames[$key] = substr($varName, 1);
                }
            }
            return $varNames;
        }
        
        /*
         * Получаем значений переменных, прописанных в роуте для методов контроллера  из ЧПУ
         */
        private function getArgByUri($route, $uri){
            $uriVar = explode('/', $uri);
            $varNames = $this->getNameVarsByRoute($route);
            $params = [];
            foreach($varNames AS $key=>$name){
                $params[$name] = $uriVar[$key];
            }
            return $params;
        }
        
        /*
         * Вызов метода по ЧПУ
         */
        private function callAction($controllerAction, $paramArr){
            $arr = explode('@', $controllerAction);
            list($controller, $action) = $arr;
            
            if($this->checkControllerFile($controller)){
                $controllerObject = new $controller;
                call_user_func_array([$controllerObject, $action], $paramArr);
            }else{
                return false;
            }
        }
        
        /*
         * 
         */
        public function selectController(){
            $uri = $this->getUri();
            foreach($this->routes AS $route=>$controllerAction){
                list('pattern' => $pattern, 'varable' => $varable) = $this->routeToPattern($route);
                if($match = preg_match($pattern, $uri) === 1){
                    $paramArr = $this->getArgByUri($route, $uri);
                    $this->callAction($controllerAction, $paramArr);
                    break;
                }
            }
        }
        public function run(){
            $this->selectController();
        }
        
    }