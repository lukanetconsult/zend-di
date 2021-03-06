<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/zf2 for the canonical source repository
 * @copyright Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Zend\Di;

use Psr\Container\ContainerInterface;


/**
 * Default ioc container implementation
 *
 * This is using the dependency injector to create instances
 */
class DefaultContainer implements ContainerInterface
{
    /**
     * Dependency injector
     *
     * @var InjectorInterface
     */
    protected $injector;

    /**
     * Registered services and cached values
     *
     * @var array
     */
    protected $services = [];

    /**
     * @param InjectorInterface $di
     */
    public function __construct(InjectorInterface $injector)
    {
        $this->injector = $injector;

        $this->services[InjectorInterface::class] = $injector;
        $this->services[ContainerInterface::class] = $this;
        $this->services[get_class($injector)] = $injector;
        $this->services[get_class($this)] = $this;
    }

    /**
     * Explicitly set a service
     *
     * @param string $name     The name of the service retrievable by get()
     * @param object $service  The service instance
     * @return self
     */
    public function setInstance($name, $service)
    {
        $this->services[$name] = $service;
        return $this;
    }

    /**
     * Check if a service is available
     *
     * @see \Psr\Container\ContainerInterface::has()
     * @param   string  $name
     * @return  mixed
     */
    public function has($name)
    {
        if (isset($this->services[$name])) {
            return true;
        }

        return $this->injector->canCreate($name);
    }

    /**
     * Retrieve a service
     *
     * Tests first if a service is registered, and, if so,
     * returns it.
     *
     * If the service is not yet registered, it is attempted to be created via
     * the dependency injector and then it is stored for further use.
     *
     * @see \Psr\Container\ContainerInterface::get()
     * @param  string $name
     * @return mixed
     */
    public function get($name)
    {
        if (!isset($this->services[$name])) {
            $this->services[$name] = $this->injector->create($name);
        }

        return $this->services[$name];
    }
}
