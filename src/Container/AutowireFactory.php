<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/zf2 for the canonical source repository
 * @copyright Copyright (c) 2005-2016 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Zend\Di\Container;

use Psr\Container\ContainerInterface;
use Zend\Di\Exception;
use Zend\Di\InjectorInterface;

/**
 * Create instances with autowiring
 */
class AutowireFactory
{
    /**
     * Retrieves the injector from a container
     *
     * @param   ContainerInterface  $container  The container context for this factory
     * @return  InjectorInterface               The dependency injector
     * @throws  \Zend\Di\Exception\RuntimeException When no dependency injector is available
     */
    private function getInjector(ContainerInterface $container)
    {
        $injector = $container->get(InjectorInterface::class);

        if (!$injector instanceof InjectorInterface) {
            throw new Exception\RuntimeException('Could not get a dependency injector form the container implementation');
        }

        return $injector;
    }

    public function canCreate(ContainerInterface $container, $requestedName)
    {
        if (!$container->has(InjectorInterface::class)) {
            return false;
        }

        return $this->getInjector($container)->canCreate($requestedName);
    }

    public function create(ContainerInterface $container, $requestedName, array $options = null)
    {
        return $this->getInjector($container)->create($requestedName, $options? : []);
    }

    /**
     * Make this factory invokable
     */
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        $this->create($container, $requestedName, $options);
    }
}
