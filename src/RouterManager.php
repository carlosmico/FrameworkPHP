<?php
namespace App;

use DI\Container;

class RouterManager
{
    private $container;

    public function __construct(Container $container)
    {
        $this->container = $container;
    }

    public function dispatch(string $requestMethod, string $requestUri, \FastRoute\Dispatcher $dispatcher)
    {
        $route = $dispatcher->dispatch($requestMethod, $requestUri);

        var_dump($requestMethod);

        switch ($route[0]) {
            case \FastRoute\Dispatcher::NOT_FOUND:
                $this->container->call(["App\controllers\NotFoundController", "index"], [0]);
                break;

            case \FastRoute\Dispatcher::METHOD_NOT_ALLOWED:
                $this->container->call(["App\controllers\MethodNotAllowedController", "index"], [0]);
                break;

            case \FastRoute\Dispatcher::FOUND:
                $controller = $route[1];
                $method = $route[2];
                $this->container->call($controller, $method);
                break;
        }
    }
}
