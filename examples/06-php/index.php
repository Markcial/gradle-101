<?php

use Symfony\Bundle\FrameworkBundle\Kernel\MicroKernelTrait;
use Symfony\Component\Config\Loader\LoaderInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Kernel as BaseKernel;
use Symfony\Component\Routing\Route;
use Symfony\Component\Routing\RouteCollectionBuilder;

require __DIR__.'/vendor/autoload.php';

class Kernel extends BaseKernel
{
    use MicroKernelTrait;

    public function registerBundles()
    {
        return array(
            new Symfony\Bundle\FrameworkBundle\FrameworkBundle()
        );
    }
    protected function configureContainer(ContainerBuilder $c, LoaderInterface $loader)
    {
        // PHP equivalent of config/packages/framework.yaml
        $c->loadFromExtension('framework', array(
            'secret' => 'S0ME_SECRET'
        ));
    }

    protected function configureRoutes(RouteCollectionBuilder $routes)
    {
        // kernel is a service that points to this class
        // optional 3rd argument is the route name
        $routes->add('/hello', 'kernel:helloAction');
        $routes->add('/hello/{name}', 'kernel:helloAction');
    }

    public function helloAction($name = "unknown")
    {
        return new Response("Hello $name!");
    }
}

$kernel = new Kernel('dev', true);
$request = Request::createFromGlobals();
$response = $kernel->handle($request);
$response->send();
$kernel->terminate($request, $response);
