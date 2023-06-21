<?php
    class Route {

        public function __construct() {
            spl_autoload_register([$this, 'autoload']);
        }

        public function start() {
            $controller_name = 'Main';
            $action_name     = 'index';

            $routes = explode('/', $_SERVER['REQUEST_URI']);

            if (!empty($routes[1])) {
                $controller_name = $routes[1];
            }

            if (!empty($routes[2])) {
                $action_name = $routes[2];
            }

            $model_name      = 'Model_' . $controller_name;
            $controller_name = 'Controller_' . $controller_name;
            $action_name     = 'action_' . $action_name;

            if (!class_exists($controller_name)) {
                $this->errorPage404();
            } else {
                $controller = new $controller_name;

                if (method_exists($controller, $action_name)) {
                    $controller->{$action_name}();
                } else {
                    $this->errorPage404();
                }
            }
        }

        private function autoload($class) {
            $dirs = [
                'app/models/',
                'app/controllers/',
            ];

            $class_file = $class . '.php';
            foreach ($dirs as $dir) {
                $path = $dir . $class_file;

                if (file_exists($path)) {
                    require_once $path;
                }
            }
        }

        private function errorPage404() {
            header('HTTP/1.1 404 Not Found');
            header('Status: 404 Not Found');
            header('Location: /404');
            exit;
        }
    }
?>