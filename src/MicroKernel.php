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

    private function initRoutes(): void
    {
        //$this->routes->add('route_name', new Route('/', ['_controller' => 'App\Controller\MyController']));

        // Category
        $this->routes->add('category_find_all', new Route('/categories', ['_controller' => 'App\Controller\Category\FindAllController']));

        // Command
        $this->routes->add('command_add_menu', new Route('/commands/{commandId}/menu/{menuId}', ['_controller' => 'App\Controller\Command\AddMenuController']));
        $this->routes->add('command_add_product', new Route('/commands/{commandId}/product/{productId}', ['_controller' => 'App\Controller\Command\AddProductController']));
        $this->routes->add('command_get_one', new Route('/commands/{id}', ['_controller' => 'App\Controller\Command\GetOneController']));
        $this->routes->add('command_validate', new Route('/commands/{id}/validate', ['_controller' => 'App\Controller\Command\ValidateController']));

        // Menu
        $this->routes->add('menu_find_all', new Route('/menus', ['_controller' => 'App\Controller\Menu\FindAllController']));
        $this->routes->add('menu_get_one', new Route('/menus/{id}', ['_controller' => 'App\Controller\Menu\GetOneController']));

        // Product
        $this->routes->add('product_find_all', new Route('/products', ['_controller' => 'App\Controller\Product\FindAllController']));
        $this->routes->add('product_get_one', new Route('/products/{id}', ['_controller' => 'App\Controller\Product\GetOneController']));
    }

    private function initServices(): void
    {
        $this->containerBuilder->register('debug', 'App\Util\Debugger');
        $this->containerBuilder->register('entity.manager', 'App\ORM\EntityManager');
        // Add your Services here. documentation here https://symfony.com/doc/4.2/components/dependency_injection.html
    }

    private function resolveController(Request $request)
    {
        $context = new RequestContext('/');
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
