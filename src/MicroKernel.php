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
        //Initialize database
        $initRoute = new Route('/init', ['_controller' => 'App\Controller\MenuListController']);
        $initRoute->setMethods(['GET']);
        // Get all menus
        $menuListRoute = new Route('/menu', ['_controller' => 'App\Controller\MenuListController']);
        $menuListRoute->setMethods(['GET']);

        // Get all commands
        $commandListRoute = Route('/Command', ['_controller' => 'App\Controller\CommandListController']);
        $commandListRoute->setMethods(['GET']);

        $this->routes->add('route_name', new Route('/', ['_controller' => 'App\Controller\MyController']));
        $this->routes->add('initRoute', $initRoute);
        $this->routes->add('menuListRoute', $menuListRoute);
        $this->routes->add('list_command',$commandListRoute);
        // Add your Routes here. documentation here https://symfony.com/doc/4.2/components/routing.html
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

        return $controller(...$arguments);
    }
}
