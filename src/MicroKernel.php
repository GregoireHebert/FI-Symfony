<?php

declare(strict_types=1);

namespace App;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Matcher\UrlMatcher;
use Symfony\Component\Routing\RequestContext;
use Symfony\Component\Routing\Route;
use Symfony\Component\Routing\RouteCollection;

final class MicroKernel
{
    private $routes;
    private $containerBuilder;

    public function __construct()
    {
        $this->routes = new RouteCollection();
        $this->containerBuilder = new ContainerBuilder();

        $this->initRoutes();
        $this->initServices();
    }

    public static function createRoute(string $path, string $method, string $controller) : Route
    {
        return new Route(
            $path,
            ['_controller' => $controller],
            [],
            [],
            '',
            [],
            $method
        );
    }

    private function initRoutes(): void
    {
        $this->routes->add('menus.index', self::createRoute('/menus', 'GET', 'App\Controller\Menu\IndexController'));
        $this->routes->add('menus.store', self::createRoute('/menus', 'POST', 'App\Controller\Menu\StoreController'));
        $this->routes->add('menus.show', self::createRoute('/menus/{id}', 'GET', 'App\Controller\Menu\ShowController'));

        $this->routes->add('products.index', self::createRoute('/products', 'GET', 'App\Controller\Products\IndexController'));
        $this->routes->add('products.store', self::createRoute('/products', 'POST', 'App\Controller\Products\CreateController'));
        $this->routes->add('products.show', self::createRoute('/products/{id}', 'GET', 'App\Controller\Products\ShowController'));
        $this->routes->add('products.update', self::createRoute('/products/{id}', 'PUT', 'App\Controller\Products\UpdateController'));
        $this->routes->add('products.destroy', self::createRoute('/products/{id}', 'DELETE', 'App\Controller\Products\DeleteController'));
        // Add your Routes here. documentation here https://symfony.com/doc/4.2/components/routing.html

        //Adding commands route
        $this->routes->add('command_route', new Route('/commands', ['_controller' => 'App\Controller\Command\CommandListController'])); 
    }

    private function initServices(): void
    {
        $this->containerBuilder->register('debug', 'App\Util\Debugger');
        $this->containerBuilder->register('entity.manager', 'App\ORM\EntityManager');
        // Add your Services here. documentation here https://symfony.com/doc/4.2/components/dependency_injection.html
    }

    private function resolveController(Request $request)
    {
        $context = new RequestContext('/', $request->getRealMethod());
        $matcher = new UrlMatcher($this->routes, $context);

        $parameters = $matcher->match($request->getPathInfo());
        if (!isset($parameters['_controller'])) {
            return false;
        }

        return $parameters;
    }

    public function handleRequest(Request $request): Response
    {
        // load controller
        if (false === $arguments = $this->resolveController($request)) {
            throw new \RuntimeException(sprintf('Unable to find the controller for path "%s". The route is wrongly configured.', $request->getPathInfo()));
        }

        $controllerClass = $arguments['_controller'];

        unset($arguments['_route'], $arguments['_controller']);
        array_unshift($arguments, $request, $this->containerBuilder);

        $controller = new $controllerClass();

        if (!is_callable($controller)) {
            throw new \InvalidArgumentException(sprintf('The controller for URI "%s" is not callable.', $request->getPathInfo()));
        }

        return $controller(...array_values($arguments));
    }
}
