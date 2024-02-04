<?php

namespace app\core;

class Router
{

    public Request $request;
    protected array $routes = [
        //it will be like this
        // 'get' => [
        //     '/'=>Callback,
        //     'contact=>callback2
        // ],
        // 'post'=> [
        //      ...
        // ]
    ];

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function get($path, $callback)
    {

        $this->routes['get'][$path] = $callback;
    }

    public function resolve()
    {
        $path = $this->request->getPath();
        $method = $this->request->getMethod();
        $callback = $this->routes[$method][$path] ?? false;
        if (!$callback) {
            return "Not found";
        }
        if (is_string($callback)) {
            return $this->renderView($callback);
        }
        return call_user_func($callback);
    }

    public function renderView($view)
    {
        $layoutContent = $this->layoutContent();
        include_once Application::$ROOT_DIR . "/App/Views/$view.php";
    }

    protected function layoutContent()
    {
        ob_start();
        include_once Application::$ROOT_DIR . "/App/Views/layouts/main.php";
        ob_get_clean();
    }

    protected function renderOnlyView($view)
    {
    }
}
